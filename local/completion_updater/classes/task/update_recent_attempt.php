<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

namespace local_completion_updater\task;

defined('MOODLE_INTERNAL') || die();

/**
 * A schedule task for local_completion_updater cron.
 *
 * @package   local_completion_updater
 * @copyright 2023 Baljit Singh {@link https://www.upwork.com/o/profiles/users/~01ebb57e7f358b8d6e/}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class update_recent_attempt extends \core\task\scheduled_task {
    /**
     * Get a descriptive name for this task (shown to admins).
     *
     * @return string
     */
    public function get_name() {
        return get_string('crontask', 'local_completion_updater');
    }

    /**
     * Run local_completion_updater cron.
     */
    public function execute() {
        global $CFG, $DB;
        $courseid = get_string('courseid', 'local_completion_updater');
        $mid_scorm = get_string('mid_scorm', 'local_completion_updater');
        $mid_customcert = get_string('mid_customcert', 'local_completion_updater');
		
		$query = 'SELECT DISTINCT sst.userid
		FROM {scorm_scoes_track} AS sst
		JOIN {scorm} AS ms ON ms.id = sst.scormid
		JOIN {scorm_scoes} AS mss ON mss.id = sst.scoid
		WHERE ms.course = ? AND sst.attempt > 1';
		$params = array($courseid);
	    $users = $DB->get_records_sql($query, $params);
		
		$query = "SELECT * FROM {course_modules} WHERE course = ? AND visible = ? AND module IN (?, ?)";
		$params = array($courseid, 1, $mid_scorm, $mid_customcert);
		$modules = $DB->get_records_sql($query, $params);
		
		if(count($users)>0){
			
			foreach($users as $user){
				
				$query = "SELECT sst.attempt, sst.element, sst.value, sst.timemodified
				FROM {scorm_scoes_track} AS sst		
				JOIN {scorm} AS ms ON ms.id = sst.scormid		
				JOIN {scorm_scoes} AS mss ON mss.id = sst.scoid		
				WHERE ms.course=? AND sst.userid=? AND sst.element=? AND (sst.value=? OR sst.value=?) ORDER BY attempt DESC LIMIT 1";
				$params = array($courseid, $user->userid, 'cmi.core.lesson_status', 'completed', 'passed');
				$lastattempt = $DB->get_record_sql($query, $params);
				
				if(!empty($lastattempt)){
					
					$query = "UPDATE {course_completions} SET timecompleted = ? WHERE course = ? AND userid = ?";
					$params = array($lastattempt->timemodified, $courseid, $user->userid);
					$DB->execute($query, $params);

					foreach($modules as $module){
						$query = "UPDATE {course_modules_completion} SET completionstate = ?, timemodified = ? WHERE coursemoduleid = ? AND userid = ?";
						$params = array(1, $lastattempt->timemodified, $module->id, $user->userid);
						$DB->execute($query, $params);
						
						if($module->module == $mid_customcert){
							$query = "UPDATE {customcert_issues} SET timecreated = ? WHERE userid = ? AND customcertid = ?";
							$params = array($lastattempt->timemodified, $user->userid, $module->instance);
							$DB->execute($query, $params);
						}
					}
					
					$query = "UPDATE {course_completion_crit_compl} SET timecompleted = ? WHERE course = ? AND userid = ? AND criteriaid = ?";
					$criteriaid = get_string('criteriaid', 'local_completion_updater');
					$params = array($lastattempt->timemodified, $courseid, $user->userid, $criteriaid);
					$DB->execute($query, $params);
				}
			}
		}
    }
}