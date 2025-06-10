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
$mform->addElement('header', 'config_header_slideshow', get_string('header_slideshow', 'block_lambdacb'));

$mform->addElement('advcheckbox', 'config_block_slideshowautoplay', get_string('block_slideshowautoplay', 'block_lambdacb'), get_string('block_slideshowautoplaytxt', 'block_lambdacb'));

$mform->addElement('text', 'config_block_slideshowinterval', get_string('block_slideshowinterval', 'block_lambdacb'));
$mform->setDefault('config_block_slideshowinterval', '7000');
$mform->setType('config_block_slideshowinterval', PARAM_RAW);

$options = array(
    'slide' => get_string('block_slideshowanim_01', 'block_lambdacb'),
    'fade' => get_string('block_slideshowanim_02', 'block_lambdacb'),
    'scale' => get_string('block_slideshowanim_03', 'block_lambdacb'),
    'pull' => get_string('block_slideshowanim_04', 'block_lambdacb')
);
$select = $mform->addElement('select', 'config_block_slideshowanim', get_string('block_slideshowanim', 'block_lambdacb'), $options);
$mform->setDefault('config_block_slideshowanim', 'slide');

$options = array(
    1 => get_string('block_slideshownav_01', 'block_lambdacb'),
    2 => get_string('block_slideshownav_02', 'block_lambdacb'),
    3 => get_string('block_slideshownav_03', 'block_lambdacb')
);
$select = $mform->addElement('select', 'config_block_slideshownav', get_string('block_slideshownav', 'block_lambdacb'), $options);
$mform->setDefault('config_block_slideshownav', 1);

$ratiogroup = array();
$ratiogroup[] =& $mform->createElement('text', 'config_block_slideshowratiox');
$mform->setDefault('config_block_slideshowratiox', '7');
$mform->setType('config_block_slideshowratiox', PARAM_RAW);
$ratiogroup[] =& $mform->createElement('html', '<span>:</span>');
$ratiogroup[] =& $mform->createElement('text', 'config_block_slideshowratioy');
$mform->setDefault('config_block_slideshowratioy', '3');
$mform->setType('config_block_slideshowratioy', PARAM_RAW);
$mform->addGroup($ratiogroup, 'config_block_slideshowratio', get_string('block_slideshowratio', 'block_lambdacb'), ' ', false);