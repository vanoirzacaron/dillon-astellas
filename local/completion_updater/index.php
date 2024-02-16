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

$heading = get_string("pluginname", "local_completion_updater");
$courseid = get_string("courseid", "local_completion_updater");

$PAGE->requires->css(new moodle_url($CFG->wwwroot.'/local/completion_updater/css/custom.css'));
$PAGE->requires->jquery();
$PAGE->requires->js(new moodle_url($CFG->wwwroot. '/local/completion_updater/js/custom.js'));
$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_pagelayout('standard');
$PAGE->set_url('/local/completion_updater/index.php');
$PAGE->set_title($heading);
$PAGE->set_heading($heading);
echo $OUTPUT->header();

$completion_updater = new local_completion_updater();
$allcompletions = $completion_updater->get_completions($courseid);
$course = $completion_updater->get_course_by_id($courseid);

//course as heading
$courseheading = html_writer::tag('h3', get_string("courselabel", "local_completion_updater", $course->fullname), array('class'=>'cu_coursetitle col-12'));
echo html_writer::div($courseheading,'col-12 cu-viewdetail-header alert alert-info');

//search bar
$searcharea = html_writer::tag('input', '', array('class'=>'form-control searchuser','type'=>'text','placeholder'=>'Search user by name or email' ,'aria-label'=> 'Search', 'aria-describedby'=>'searchuser'));
$searcharea .= html_writer::tag('span', '', array('id'=>'resultsearchuser'));
echo html_writer::div($searcharea,'input-group mb-3');

//showing number of participants
$students= html_writer::tag('small', get_string("nop", "local_completion_updater" ,count($allcompletions)));
echo html_writer::div($students,'col-12 nop');

// Columns to display.
$columns = array(
	'name' => get_string('col_name', 'local_completion_updater'),
	'email' => get_string('col_email', 'local_completion_updater'),
    'status' => get_string('col_status', 'local_completion_updater'),
    'action' => get_string('col_action', 'local_completion_updater')
);

$table = new flexible_table('completions');
$table->define_columns(array_keys($columns));
$table->define_headers(array_values($columns));
$table->define_baseurl($PAGE->url);
$table->set_attribute('class', 'resultusers');

$table->setup();

foreach($allcompletions as $completion){
	$userurl = new moodle_url('/user/view.php', array('id'=> $completion->userid ,'course'=> $completion->course));
	$row[0] = html_writer::link($userurl, $completion->firstname . " " . $completion->lastname, array('target'=>'_blank'));
	$row[1] = $completion->email;
	if($completion->timecompleted != NULL){
		$status = get_string('completed', 'local_completion_updater') . html_writer::tag('small', userdate($completion->timecompleted));
	}
	else{
		$status = get_string('notcompleted', 'local_completion_updater');
	}
	$row[2] = $status;
	$viewurl = new moodle_url('/local/completion_updater/view.php', array('id'=> $completion->id));
	$row[3] = html_writer::link($viewurl, get_string('btnview', 'local_completion_updater'), array('class'=>'btn btn-primary btn-sm'));
	$table->add_data($row, "trcr");
}

$table->finish_output();

echo $OUTPUT->footer();
?>