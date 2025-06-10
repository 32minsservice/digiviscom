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
for($i = 1; $i <= $numberslides; $i++) {
    $mform->addElement('header', 'config_header_slide_'.$i , get_string('header_slide', 'block_lambdacb').' '.$i);

    $mform->addElement('filemanager', 'config_block_slide_image'.$i, get_string('block_slide_image', 'block_lambdacb'), null,
            array('subdirs' => 0, 'maxbytes' => $CFG->maxbytes, 'areamaxbytes' => 10485760, 'maxfiles' => 1,
            'accepted_types' => array('.png', '.jpg', '.jpeg', '.gif', '.svg') ));

    $mform->addElement('text', 'config_block_slide_heading'.$i, get_string('block_slide_heading', 'block_lambdacb'));
    $mform->setDefault('config_block_slide_heading'.$i, '');
    $mform->setType('config_block_slide_heading'.$i, PARAM_RAW);

    $mform->addElement('textarea', 'config_block_slide_txt'.$i, get_string('block_slide_txt', 'block_lambdacb'), 'wrap="virtual" rows="4" cols="50"');
    $mform->setDefault('config_block_slide_txt'.$i, '');
    $mform->setType('config_block_slide_txt'.$i, PARAM_RAW);

    $mform->addElement('text', 'config_block_slide_btntxt'.$i, get_string('block_slide_btntxt', 'block_lambdacb'));
    $mform->setDefault('config_block_slide_btntxt'.$i, '');
    $mform->setType('config_block_slide_btntxt'.$i, PARAM_RAW);

    $mform->addElement('text', 'config_block_slide_btnurl'.$i, get_string('block_slide_btnurl', 'block_lambdacb'));
    $mform->setDefault('config_block_slide_btnurl'.$i, '');
    $mform->setType('config_block_slide_btnurl'.$i, PARAM_RAW);

    $options = array(
        1 => get_string('block_overlaypos_01', 'block_lambdacb'),
        2 => get_string('block_overlaypos_02', 'block_lambdacb'),
        3 => get_string('block_overlaypos_03', 'block_lambdacb'),
        4 => get_string('block_overlaypos_04', 'block_lambdacb'),
        5 => get_string('block_overlaypos_05', 'block_lambdacb'),
        6 => get_string('block_overlaypos_06', 'block_lambdacb')
    );
    $select = $mform->addElement('select', 'config_block_overlaypos'.$i, get_string('block_overlaypos', 'block_lambdacb'), $options);
    $mform->setDefault('config_block_overlaypos'.$i, 1);
    $mform->hideIf('config_block_overlaypos'.$i, 'config_block_type', 'eq', 3);

    $options = array(
        1 => get_string('block_overlaystyle_01', 'block_lambdacb'),
        2 => get_string('block_overlaystyle_02', 'block_lambdacb')
    );
    $select = $mform->addElement('select', 'config_block_overlaystyle'.$i, get_string('block_overlaystyle', 'block_lambdacb'), $options);
    $mform->setDefault('config_block_overlaystyle'.$i, 1);
    $mform->hideIf('config_block_overlaystyle'.$i, 'config_block_type', 'eq', 3);
} 