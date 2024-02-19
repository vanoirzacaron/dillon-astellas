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

/**
 * @created    03/08/2023 11:56AM
 * @package    local_completion_updater
 * @copyright  2023 Baljit Singh {@link https://www.upwork.com/o/profiles/users/~01ebb57e7f358b8d6e/}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
 
defined('MOODLE_INTERNAL') || die();
 
class local_completion_updater {
	public function get_course_by_id($courseid) {
		global $DB;	
	    $query = 'SELECT * FROM {course} WHERE id=?';
		$params = array($courseid);
	    $course_name = $DB->get_record_sql($query, $params);
		return $course_name;
	}
	
	public function get_completions($courseid){
		global $DB;	
	    $query = 'SELECT cc.id, cc.userid, cc.course, cc.timecompleted, u.id as uid, u.firstname, u.lastname, u.email FROM {course_completions} cc JOIN {user} AS u ON u.id = cc.userid WHERE cc.course=? AND u.deleted=? ORDER BY timecompleted DESC';
		$params = array($courseid, 0);
	    $completions = $DB->get_records_sql($query, $params);
		return $completions;
	}
	
	public function get_completion($completionid){
		global $DB;	
	    $query = 'SELECT * FROM {course_completions} WHERE id=?';
		$params = array($completionid);
	    $completion = $DB->get_record_sql($query, $params);
		return $completion;
	}
	
	public function get_user($userid){
		global $DB;	
	    $query = 'SELECT * FROM {user} WHERE id=?';
		$params = array($userid);
	    $user = $DB->get_record_sql($query, $params);
		return $user;
	}
	
	public function get_attempts($courseid, $userid){
		global $DB;	
	    $query = "SELECT DISTINCT sst.attempt, sst.timemodified AS attemptedon
		FROM {scorm_scoes_track} AS sst
		JOIN {scorm} AS ms ON ms.id = sst.scormid
		JOIN {scorm_scoes} AS mss ON mss.id = sst.scoid
		WHERE ms.course = ? AND sst.userid = ? AND sst.element=? AND (sst.value=? OR sst.value=?)";
		$params = array($courseid, $userid, 'cmi.core.lesson_status', 'completed', 'passed');
	    $attempts = $DB->get_records_sql($query, $params);
		return $attempts;
	}
	
	public function get_course_modules($courseid, $userid){
		global $DB;	
	    $query = "SELECT cm.id AS 'cmid',
		m.name AS 'activitytype',
		CASE
			WHEN m.name = 'assign'      THEN (SELECT name FROM {assign}      	WHERE id = cm.instance)
			WHEN m.name = 'book'        THEN (SELECT name FROM {book}	      	WHERE id = cm.instance)
			WHEN m.name = 'chat'        THEN (SELECT name FROM {chat}	        WHERE id = cm.instance)
			WHEN m.name = 'choice'      THEN (SELECT name FROM {choice}		    WHERE id = cm.instance)
			WHEN m.name = 'customcert'  THEN (SELECT name FROM {customcert}		WHERE id = cm.instance)
			WHEN m.name = 'data'        THEN (SELECT name FROM {data}	        WHERE id = cm.instance)
			WHEN m.name = 'feedback'    THEN (SELECT name FROM {feedback}	    WHERE id = cm.instance)
			WHEN m.name = 'folder'      THEN (SELECT name FROM {folder}		    WHERE id = cm.instance)
			WHEN m.name = 'forum'       THEN (SELECT name FROM {forum}		    WHERE id = cm.instance)
			WHEN m.name = 'glossary'    THEN (SELECT name FROM {glossary}    	WHERE id = cm.instance)
			WHEN m.name = 'h5pactivity' THEN (SELECT name FROM {h5pactivity} 	WHERE id = cm.instance)
			WHEN m.name = 'imscp'       THEN (SELECT name FROM {imscp}       	WHERE id = cm.instance)
			WHEN m.name = 'label'       THEN (SELECT name FROM {label}       	WHERE id = cm.instance)
			WHEN m.name = 'lesson'      THEN (SELECT name FROM {lesson}      	WHERE id = cm.instance)
			WHEN m.name = 'lti'         THEN (SELECT name FROM {lti}         	WHERE id = cm.instance)
			WHEN m.name = 'page'        THEN (SELECT name FROM {page}        	WHERE id = cm.instance)
			WHEN m.name = 'quiz'        THEN (SELECT name FROM {quiz}        	WHERE id = cm.instance)
			WHEN m.name = 'resource'    THEN (SELECT name FROM {resource}    	WHERE id = cm.instance)
			WHEN m.name = 'scorm'       THEN (SELECT name FROM {scorm}       	WHERE id = cm.instance)
			WHEN m.name = 'survey'      THEN (SELECT name FROM {survey}      	WHERE id = cm.instance)
			WHEN m.name = 'url'         THEN (SELECT name FROM {url}         	WHERE id = cm.instance)
			WHEN m.name = 'wiki'        THEN (SELECT name FROM {wiki}        	WHERE id = cm.instance)
			WHEN m.name = 'workshop'    THEN (SELECT name FROM {workshop}    	WHERE id = cm.instance)
		   ELSE 'Other activity'
		END AS 'activityname',
		CASE
		   WHEN cmc.completionstate = 0 THEN 'In Progress'
		   WHEN cmc.completionstate = 1 THEN 'Completed'
		   WHEN cmc.completionstate = 2 THEN 'Completed with Pass'
		   WHEN cmc.completionstate = 3 THEN 'Completed with Fail'
		   ELSE 'Unknown'
		END AS 'progress',
		cmc.timemodified AS 'lastmodified'
		FROM {course_modules} cm
		JOIN {modules} m ON m.id = cm.module
		JOIN {course_modules_completion} cmc ON cmc.coursemoduleid = cm.id
		WHERE cm.course = ? AND cm.visible = ? AND cmc.userid = ?;";
		$params = array($courseid, 1, $userid);
	    $modules = $DB->get_records_sql($query, $params);
		return $modules;
	}
}