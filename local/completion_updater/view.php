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
 * @created    03/08/2023 11:59AM
 * @package    local_completion_updater
 * @copyright  2023 Baljit Singh {@link https://www.upwork.com/o/profiles/users/~01ebb57e7f358b8d6e/}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

global $CFG, $PAGE, $DB, $OUTPUT, $USER;

require_once("../../config.php");
require_once("locallib.php");
require_once($CFG->libdir . '/tablelib.php');
require_once($CFG->libdir . '/moodlelib.php');

$homeurl = new moodle_url('/');
require_login();
if (!is_siteadmin()) {
    redirect($homeurl, get_string("admin_access", "local_completion_updater"), 5);
}

$heading = get_string("pluginname", "local_completion_updater") . get_string("progress", "local_completion_updater");
$completionid = required_param('id', PARAM_INT);
$PAGE->requires->jquery();
$PAGE->requires->css(new moodle_url($CFG->wwwroot.'/local/completion_updater/css/custom.css'));
$PAGE->requires->js(new moodle_url($CFG->wwwroot. '/local/completion_updater/js/custom.js'));
$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_pagelayout('standard');
$PAGE->set_url('/local/completion_updater/view.php', array('id'=> $completionid));
$PAGE->set_title($heading);
$PAGE->set_heading($heading);
echo $OUTPUT->header();

$completion_updater = new local_completion_updater();
$completion = $completion_updater->get_completion($completionid);
$course = $completion_updater->get_course_by_id($completion->course);
$user = $completion_updater->get_user($completion->userid);	
$userfullname = $user->firstname . " " . $user->lastname;

//course as heading
$courseheading = html_writer::tag('h3', get_string("courselabel", "local_completion_updater", $course->fullname), array('class'=>'cu_coursetitle col-6'));
$courseheading .= html_writer::tag('h3', get_string("userlabel", "local_completion_updater", $userfullname), array('class'=>'cu_coursetitle col-6'));
echo html_writer::div($courseheading,'col-12 cu-viewdetail-header alert alert-info');

// Columns to display.
$columns = array(
	'activityname' => get_string('col_aname', 'local_completion_updater'),
    'activitytype' => get_string('col_atype', 'local_completion_updater'),
    'status' => get_string('col_astatus', 'local_completion_updater'),
    'lastmodified' => get_string('col_lastmodified', 'local_completion_updater'),
    'action' => get_string('col_action', 'local_completion_updater')
);

$table = new flexible_table('viewcompletion');
$table->define_columns(array_keys($columns));
$table->define_headers(array_values($columns));
$table->define_baseurl($PAGE->url);
$table->set_attribute('class', 'table table-hover viewcompletion');

$table->setup();

$modules = $completion_updater->get_course_modules($course->id, $user->id);

if(count($modules)>0){
	foreach($modules as $module){
		$row[0] = $module->activityname;
		$row[1] = $module->activitytype;
		$row[2] = $module->progress;		
		$row[3] = userdate($module->lastmodified);
		if($module->activitytype == 'customcert' && $module->progress == 'Completed'){
			$certiurl = new moodle_url('/mod/customcert/view.php', array('id'=>$module->cmid,'downloadissue'=>$user->id));
			$row[4] = html_writer::link($certiurl, get_string('btnviewcerti', 'local_completion_updater'), array('class'=>'btn btn-primary btn-sm btnviewattempt', 'target'=>'_blank'));
		}
		else if($module->activitytype == 'scorm' && $module->progress == 'Completed'){
			$attempts = $completion_updater->get_attempts($course->id, $user->id);
			if(count($attempts)>0){
				$btn_attempts = "";
				foreach($attempts as $attempt){
					$atturl = new moodle_url('/mod/scorm/report/userreport.php', array('id'=>$module->cmid,'user'=>$user->id, 'attempt'=> $attempt->attempt));
					$btn_attempts .= html_writer::link($atturl, get_string('btnviewattempt', 'local_completion_updater') . $attempt->attempt . " : ". userdate($attempt->attemptedon), array('class'=>'btn btn-primary btn-sm btnviewattempt', 'target'=>'_blank'));
					$btn_attempts .= "<br>";
				}
				$row[4] = $btn_attempts;
			}
		}
		else{
			$row[4] = get_string("noaction", "local_completion_updater");
		}
		
		$table->add_data($row);
	}
}
else{
	$row[0] = get_string("noactivity", "local_completion_updater");
	$row[1] = "";
	$row[2] = "";
	$row[3] = "";
	$row[4] = "";
	$table->add_data($row);
}

$table->finish_output();

$backurl = new moodle_url('/local/completion_updater/index.php');
$backlink = html_writer::link($backurl, get_string('btnback', 'local_completion_updater'), array('class'=>'btn btn-primary'));

echo html_writer::div($backlink,'col-12');

echo $OUTPUT->footer();
?>