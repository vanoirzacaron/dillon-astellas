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
 * @created    03/08/2023 11:57AM
 * @package    local_completion_updater
 * @copyright  2023 Baljit Singh {@link https://www.upwork.com/o/profiles/users/~01ebb57e7f358b8d6e/}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

function local_completion_updater_extend_navigation(global_navigation $navigation){
	
	//restrict access to admin only
	if(!has_capability('moodle/site:config', context_system::instance())){
		return;
	}
	
	$main_node = $navigation->add(get_string('pluginname','local_completion_updater'), '/local/completion_updater/', navigation_node::TYPE_SITE_ADMIN, null, null, new pix_icon('i/users', ''));
	$main_node->nodetype = 1 ;
	$main_node->collaspe = false ;
	$main_node->forceopen = true ;
	$main_node->isexpandable = false;
	$main_node->showinflatnavigation = true;
	
	local_completion_updater_render_navbar_output();
}

function local_completion_updater_render_navbar_output(){
	
}