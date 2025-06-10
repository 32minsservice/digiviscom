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
$mform->addElement('header', 'config_header_gallery', get_string('header_gallery', 'block_lambdacb'));

$mform->addElement('filemanager', 'config_gallery', get_string('block_gallery_imgages', 'block_lambdacb'), null, array('subdirs' => 0, 'maxbytes' => 10485760, 'areamaxbytes' => 10485760, 'maxfiles' => null ));