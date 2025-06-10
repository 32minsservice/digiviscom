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
		
// Text and Media - Background
$mform->addElement('header', 'config_header_bg', get_string('header_bg', 'block_lambdacb'));

$colorarray=array();
$colorarray[] =& $mform->createElement('html', '<input type="color" id="favcolor" name="favcolor" value="#ffffff" onchange="cbchangecolor()">');
$colorarray[] =& $mform->createElement('text', 'config_block_bgcolor', get_string('block_bgcolor', 'block_lambdacb'));
$mform->setDefault('config_block_bgcolor', '#ffffff');
$mform->setType('config_block_bgcolor', PARAM_RAW);
$mform->addGroup($colorarray, 'colorselect', get_string('block_bgcolor', 'block_lambdacb'), array(' '), false);

$mform->addElement('filemanager', 'config_block_bgimage', get_string('block_bgimage', 'block_lambdacb'), null,
        array('subdirs' => 0, 'maxbytes' => $CFG->maxbytes, 'areamaxbytes' => 10485760, 'maxfiles' => 1,
        'accepted_types' => array('.png', '.jpg', '.jpeg', '.gif', '.svg') ));

$options = array(
    1 => get_string('block_bgimage_style_01', 'block_lambdacb'),
    2 => get_string('block_bgimage_style_02', 'block_lambdacb'),
    3 => get_string('block_bgimage_style_03', 'block_lambdacb'),
    4 => get_string('block_bgimage_style_04', 'block_lambdacb')
);
$select = $mform->addElement('select', 'config_block_bgimage_style', get_string('block_bgimage_style', 'block_lambdacb'), $options);
$mform->setDefault('config_block_bgimage_style', 1);

$options = array(
    'center' => get_string('block_bgimage_pos_center', 'block_lambdacb'),
    'left' => get_string('block_bgimage_pos_left', 'block_lambdacb'),
    'right' => get_string('block_bgimage_pos_right', 'block_lambdacb')
);
$select = $mform->addElement('select', 'config_block_bgimage_posx', get_string('block_bgimage_posx', 'block_lambdacb'), $options);
$mform->setDefault('config_block_bgimage_posx', 'center');

$options = array(
    'center' => get_string('block_bgimage_pos_center', 'block_lambdacb'),
    'top' => get_string('block_bgimage_pos_top', 'block_lambdacb'),
    'bottom' => get_string('block_bgimage_pos_bottom', 'block_lambdacb')
);
$select = $mform->addElement('select', 'config_block_bgimage_posy', get_string('block_bgimage_posy', 'block_lambdacb'), $options);
$mform->setDefault('config_block_bgimage_posy', 'center');

$options = array(
    '1' => '1',
    '0.85' => '0.85',
    '0.7' => '0.7',
    '0.55' => '0.55',
    '0.4' => '0.4',
    '0.25' => '0.25'
);
$mform->setDefault('config_block_img_opacity', '1');
$select = $mform->addElement('select', 'config_block_img_opacity', get_string('block_img_opacity', 'block_lambdacb'), $options);

$options = array(
    '0' => '0',
    '.2' => '0.2',
    '.4' => '0.4',
    '0.6' => '0.6',
    '0.8' => '0.8',
    '1' => '1',
    '2' => '2',
    '3' => '3',
    '4' => '4',
    '6' => '6',
    '8' => '8',
    '10' => '10',
    '12' => '12'
);
$mform->setDefault('config_block_border_radius', '0');
$select = $mform->addElement('select', 'config_block_border_radius', get_string('block_border_radius', 'block_lambdacb'), $options);

// Text and Media - Width & margins
$mform->addElement('header', 'config_header_width', get_string('header_width', 'block_lambdacb'));

$mform->addElement('selectyesno', 'config_block_fullwidth', get_string('block_fullwidth', 'block_lambdacb'));
$mform->setDefault('config_block_fullwidth', 0);

$options = array(
    'px-0' => '0',
    'px-1' => '1',
    'px-2' => '2',
    'px-3' => '3',
    'px-4' => '4',
    'px-5' => '5'
);
$select = $mform->addElement('select', 'config_block_px', get_string('block_px', 'block_lambdacb'), $options);
$mform->setDefault('config_block_px', 'px-3');

$options = array(
    'py-0' => '0',
    'py-1' => '1',
    'py-2' => '2',
    'py-3' => '3',
    'py-4' => '4',
    'py-5' => '5'
);
$select = $mform->addElement('select', 'config_block_py', get_string('block_py', 'block_lambdacb'), $options);
$mform->setDefault('config_block_py', 'py-3');

$options = array(
    'my-0' => '0',
    'my-1' => '1',
    'my-2' => '2',
    'my-3' => '3',
    'my-4' => '4',
    'my-5' => '5'
);
$select = $mform->addElement('select', 'config_block_my', get_string('block_my', 'block_lambdacb'), $options);
$mform->setDefault('config_block_my', 'my-0');