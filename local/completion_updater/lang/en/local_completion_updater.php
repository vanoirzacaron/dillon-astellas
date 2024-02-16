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
 * @created    03/08/2023 11:52AM
 * @package    local_completion_updater
 * @language   EN(English)
 * @copyright  2023 Baljit Singh {@link https://www.upwork.com/o/profiles/users/~01ebb57e7f358b8d6e/}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Plugin Name.
$string['pluginname'] = 'Completion Updater';
$string['admin_access'] = 'Only site admin can access this page';
$string['courseid'] = 2;
$string['courselabel'] = 'Course : {$a}';
$string['userlabel'] = 'User : {$a}';
$string['col_name'] = 'Participant';
$string['col_email'] = 'Email';
$string['col_status'] = 'Course Status';
$string['col_action'] = 'Action';
$string['col_label'] = 'Label';
$string['col_detail'] = 'Details';
$string['col_aname'] = 'Activity name';
$string['col_atype'] = 'Activity type';
$string['col_astatus'] = 'Status';
$string['col_lastmodified'] = 'Last updated on';
$string['crontask'] = 'Background processing for local_completion_updater plugin';
$string['btnview'] = 'View details';
$string['btnback'] = 'Back';
$string['btnviewcerti'] = 'View certificate';
$string['btnviewattempt'] = 'View attempt ';
$string['progress'] = ' - Progress detail';
$string['completed'] = 'Completed on <br>';
$string['notcompleted'] = 'Not Completed';
$string['noactivity'] = 'No activity started yet';
$string['noaction'] = 'No action';
$string['nop'] = 'Showing {$a} participant(s)';

//course completion criteria
$string['criteriaid'] = 1;

//module id for SCORM
//$string['mid_scorm'] = 20;//local
$string['mid_scorm'] = 19;//live

//module id for Custom Certificate module
//$string['mid_customcert'] = 25;//local
$string['mid_customcert'] = 24;//live