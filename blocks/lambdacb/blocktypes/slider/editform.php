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
$mform->addElement('header', 'config_header_slider', get_string('header_slider', 'block_lambdacb'));

$mform->addElement('advcheckbox', 'config_block_slidergap', get_string('block_slidergap', 'block_lambdacb'), get_string('block_slidergaptxt', 'block_lambdacb'));

$options = array(
    1 => '1',
    2 => '2',
    3 => '3',
    4 => '4',
    5 => '5',
    6 => '6'
);
$mform->addElement('select', 'config_block_sliderset', get_string('block_sliderset', 'block_lambdacb'), $options);
$mform->setDefault('config_block_sliderset', 4);

$options = array(
    1 => get_string('block_slidernav_01', 'block_lambdacb'),
    2 => get_string('block_slidernav_02', 'block_lambdacb'),
    3 => get_string('block_slidernav_03', 'block_lambdacb')
);
$select = $mform->addElement('select', 'config_block_slidernav', get_string('block_slidernav', 'block_lambdacb'), $options);
$mform->setDefault('config_block_slidernav', 1);

$options = array(
    1 => get_string('block_slidercontent_01', 'block_lambdacb'),
    2 => get_string('block_slidercontent_02', 'block_lambdacb'),
    3 => get_string('block_slidercontent_03', 'block_lambdacb'),
    4 => get_string('block_slidercontent_04', 'block_lambdacb'),
    5 => get_string('block_slidercontent_05', 'block_lambdacb'),
    6 => get_string('block_slidercontent_06', 'block_lambdacb'),
    7 => get_string('block_slidercontent_07', 'block_lambdacb'),
    8 => get_string('block_slidercontent_08', 'block_lambdacb'),
    9 => get_string('block_slidercontent_09', 'block_lambdacb'),
    10 => get_string('block_slidercontent_10', 'block_lambdacb'),
    11 => get_string('block_slidercontent_11', 'block_lambdacb')
);
$select = $mform->addElement('select', 'config_block_slidercontent', get_string('block_slidercontent', 'block_lambdacb'), $options);
$mform->setDefault('config_block_slidercontent', 1);