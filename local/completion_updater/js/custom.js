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
 * @created    03/08/2023 11:53AM
 * @package    local_completion_updater
 * @copyright  2023 Baljit Singh {@link https://www.upwork.com/o/profiles/users/~01ebb57e7f358b8d6e/}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require(['core/first', 'jquery', 'jqueryui', 'core/ajax'], function(core, $, bootstrap, ajax) {

  $(document).ready(function() {

    $(".searchuser").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		value = value.trim();
		
		$(".resultusers tr.trcr").filter(function() {
			$(this).toggle( $(this).text().toLowerCase().indexOf(value) > -1);
		});
		
		var s=0; var h=0;//s for shown, h for hidden
		
		$(".resultusers tr.trcr").each(function(){
			var n = $(this).attr("style");
			if(n == "display: none;"){
				h++;
			}
			else{
				s++;
			}
		});
		
		$(".nop").html("");
		$(".nop").html("<small>Showing "+s+" participant(s)</small>");
		//$(".nop").html("<small>Shown:"+s+", Hidden:"+h+"</small>");
	  });
  });
});