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
 *
 * @package   block_lambdacb
 * @copyright 2024 redPIthemes
 *
 */
use core_table\local\filter\integer_filter;
use core_user\table\participants_filterset;
use core_user\table\participants_search;

$content = '<h5 class="card-title d-inline">'.get_string('coursecontact', 'admin').'</h5>';
$currentcontext = $PAGE->context;
$roles = get_config('', 'coursecontact');
if (!empty($roles)) {
	$teacherroles = explode(',', $roles);
	$teachers = get_role_users($teacherroles,
			$currentcontext,
			true,
			'ra.id AS raid, r.id AS roleid, r.sortorder, u.id, u.lastname, u.firstname, u.firstnamephonetic,
					u.lastnamephonetic, u.middlename, u.alternatename, u.picture, u.imagealt, u.email, u.suspended',
			'r.sortorder ASC, u.lastname ASC, u.firstname ASC');
} else {
	$teachers = array();
}
$rolenames = role_get_names($currentcontext, ROLENAME_ALIAS, true);
$multipleroles = FALSE;
$content .= html_writer::start_tag('div', array('class' => 'teachers'));
$teacherrole = null;
$displayedteachers = array();
$number_of_teachers = 0;
foreach ($teachers as $teacher) {
	if ($teacher->suspended == true) {
		continue;
	}
	if (!$multipleroles) {
		if (isset($displayedteachers[$teacher->id])) {
			continue;
		}
		$displayedteachers[$teacher->id] = 1;
	} else {
		if (isset($displayedteachers[$teacher->id][$teacher->roleid])) {
			continue;
		}
		$displayedteachers[$teacher->id][$teacher->roleid] = 1;
	}
	if ($teacherrole != $teacher->roleid) {
		if ($teacherrole != null) {
			$content .= html_writer::end_tag('ul');
		}
		$teacherrole = $teacher->roleid;
		$content .= html_writer::tag('h6', $rolenames[$teacherrole]);
		$content .= html_writer::start_tag('ul');
	}
	$content .= html_writer::start_tag('li');
	$user = new stdClass();
	$user->id = $teacher->id;
	$user->lastname = $teacher->lastname;
	$user->firstname = $teacher->firstname;
	$user->lastnamephonetic = $teacher->lastnamephonetic;
	$user->firstnamephonetic = $teacher->firstnamephonetic;
	$user->middlename = $teacher->middlename;
	$user->alternatename = $teacher->alternatename;
	$user->picture = $teacher->picture;
	$user->imagealt = $teacher->imagealt;
	$user->email = $teacher->email;
	$content .= html_writer::start_tag('div', array('class' => 'image'));
	$content .= $OUTPUT->user_picture($user, array('size' => 50, 'link' => false, 'courseid' => $COURSE->id, 'includefullname' => false));
	$content .= html_writer::end_tag('div');
	$content .= html_writer::start_tag('div', array('class' => 'details'));
	$content .= html_writer::start_tag('div', array('class' => 'name'));
	$content .= fullname($teacher);
	if ($this->config->block_contactlink) {
		$content .= '<br>';
		$content .= '<a href="'.new moodle_url('/user/profile.php', ['id' => $teacher->id, 'course' => $COURSE->id]).'">';
		$content .= '<i class="fa fa-angle-right" aria-hidden="true"></i> ';
		$content .= get_string('viewprofile');
		$content .= '</a>';
	}            
	$content .= html_writer::end_tag('div');
	$content .= html_writer::start_tag('div', array('class' => 'icons'));
	if ($CFG->messaging && has_capability('moodle/site:sendmessage', $currentcontext) && $teacher->id != $USER->id && \core_message\api::can_send_message($teacher->id, $USER->id)) {
		$content .= html_writer::start_tag('a', array('href'  => new moodle_url('/message/index.php', array('id' => $teacher->id)), 'title' => get_string('sendmessageto', 'core_message', fullname($teacher))));
		$content .= '<i class="fa fa-comment" aria-hidden="true"></i>';
		$content .= html_writer::end_tag('a');
	}
	$content .= html_writer::end_tag('div');
	$content .= html_writer::end_tag('div');
	$content .= html_writer::end_tag('li');
	$number_of_teachers = $number_of_teachers + 1;
}
if ($teacherrole != null) {
	$content .= html_writer::end_tag('ul');
}
$content .= html_writer::end_tag('div');
$content .= '<hr>';
$content .= html_writer::start_tag('div', array('class' => 'participants'));
$content .= html_writer::tag('h6', get_string('participants'));
if (course_can_view_participants($currentcontext)) {
	$content .= html_writer::start_tag('a', array('href'  => new moodle_url('/user/index.php', array('contextid' => $currentcontext->id)), 'title' => get_string('participants')));
	$content .= '<i class="fa fa-user-o" aria-hidden="true"></i>';
	$content .= get_string('participantslist');
	$content .= html_writer::end_tag('a');
} else {
	require_once($CFG->dirroot . '/user/lib.php');
	$coursecontext = context_course::instance($COURSE->id);
	$filterset = new participants_filterset();
	$filterset->add_filter(new integer_filter('courseid', null, [(int) $COURSE->id]));
	$search = new participants_search($COURSE, $coursecontext, $filterset);
	$number_of_students = $search->get_total_participants_count() - $number_of_teachers;
	$content .= html_writer::start_tag('div', array('class' => 'existingstudents'));
	$content .= '<i class="fa fa-user-o" aria-hidden="true"></i>';
	$content .= get_string('existingstudents').': '.$number_of_students;
	$content .= html_writer::end_tag('div');
}
$content .= html_writer::end_tag('div');
$this->content->text = '
<div class="lambdacb wrapper">
	<div class="content">
		'.$content.'
	</div>
</div>';