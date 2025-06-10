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

defined('MOODLE_INTERNAL') || die();

class block_lambdacb_edit_form extends block_edit_form {
 
    protected function specific_definition($mform) {
        global $CFG;

        if (!empty($this->block->config) && is_object($this->block->config)) {
            $numberslides = $this->block->config->block_slides;
        } else {
            $numberslides = 4;
        }

        $options = array(
            0 => get_string('block_type_00', 'block_lambdacb'),
            1 => get_string('block_type_01', 'block_lambdacb'),
            2 => get_string('block_type_02', 'block_lambdacb'),
            3 => get_string('block_type_03', 'block_lambdacb'),
            4 => get_string('block_type_04', 'block_lambdacb'),
            5 => get_string('block_type_05', 'block_lambdacb')
        );
        $select = $mform->addElement('select', 'config_block_type', get_string('block_type', 'block_lambdacb'), $options, 'onchange="cbchangetype(event)"');
        $mform->setDefault('config_block_type', 0);

        $logodir = $CFG->wwwroot.'/blocks/lambdacb/pix/logo.png';
        if ($CFG->version >= 2023042400) {
            $mform->addElement('html', '<img src="'.$logodir.'" class="lambdacb-logo" onload="cbinittype()">');
        } else {
            $mform->addElement('html', '<img src="'.$logodir.'" class="lambdacb-logo">');
        }

        // Content
        $editoroptions = array('maxfiles' => EDITOR_UNLIMITED_FILES, 'noclean'=>true, 'context'=>$this->block->context);
        $mform->addElement('editor', 'config_text', get_string('content', 'block_lambdacb'), null, $editoroptions);
        $mform->setDefault('config_text', '');
        $mform->setType('config_text', PARAM_RAW);

        $options = array(
            2 => '2',
            3 => '3',
            4 => '4',
            5 => '5',
            6 => '6',
            7 => '7',
            8 => '8',
            9 => '9',
            10 => '10'
        );
        $mform->addElement('select', 'config_block_slides', get_string('block_slides', 'block_lambdacb'), $options);
        $mform->setDefault('config_block_slides', 4);
        $mform->hideIf('config_block_slides', 'config_block_type', 'in', [0, 1, 4]);
		
        // Text and Media
        require_once('blocktypes/text_media/editform.php');

        // Course contacts settings
        require_once('blocktypes/contacts/editform.php');

        // Slideshow - General slideshow settings
        require_once('blocktypes/slideshow/editform.php');

        // Slider - General slider settings
        require_once('blocktypes/slider/editform.php');

        // Slideshow/Slider - Slides
        require_once('blocktypes/slider/slides.php');

        // Gallery settings
        require_once('blocktypes/gallery/editform.php');
    }

    function set_data($defaults) {
        if (!empty($this->block->config) && is_object($this->block->config)) {
            $numberslides = $this->block->config->block_slides;
            $text = $this->block->config->text;
            $draftid_editor = file_get_submitted_draft_itemid('config_text');
            if (empty($text)) {
                $currenttext = '';
            } else {
                $currenttext = $text;
            }
            $defaults->config_text['text'] = file_prepare_draft_area($draftid_editor, $this->block->context->id, 'block_lambdacb', 'content', 0, array('subdirs'=>true), $currenttext);
            $defaults->config_text['itemid'] = $draftid_editor;
            $defaults->config_text['format'] = $this->block->config->format;
        } else {
            $text = '';
            $numberslides = 4;
        }

        unset($this->block->config->text);
        parent::set_data($defaults);
        if (!isset($this->block->config)) {
            $this->block->config = new stdClass();
        }
        $this->block->config->text = $text;

        if (empty($entry->id)) {
            $entry = new stdClass;
            $entry->id = null;
        }
        $draftitemid = file_get_submitted_draft_itemid('config_block_bgimage');
        file_prepare_draft_area($draftitemid, $this->block->context->id, 'block_lambdacb', 'bgimage', 0, array('subdirs' => true));
        $entry->attachments = $draftitemid;
        parent::set_data($defaults);
        if ($data = parent::get_data()) {
            file_save_draft_area_files($data->config_block_bgimage, $this->block->context->id, 'block_lambdacb', 'bgimage', 0, array('subdirs' => true));
        }
        for($i = 1; $i <= $numberslides; $i++) {
            $current_slide = 'config_block_slide_image'.$i;
            $draftitemid = file_get_submitted_draft_itemid($current_slide);
            file_prepare_draft_area($draftitemid, $this->block->context->id, 'block_lambdacb', 'slides', $i, array('subdirs'=>false));
            $entry->attachments = $draftitemid;
            parent::set_data($defaults);
            if ($data = parent::get_data()) {
                file_save_draft_area_files($data->$current_slide, $this->block->context->id, 'block_lambdacb', 'slides', $i, array('subdirs' => false));
            }
        }
        $draftitemid = file_get_submitted_draft_itemid('config_gallery');
        file_prepare_draft_area($draftitemid, $this->block->context->id, 'block_lambdacb', 'gallery', 0, array('subdirs' => true));
        $entry->attachments = $draftitemid;
        parent::set_data($defaults);
        if ($data = parent::get_data()) {
            file_save_draft_area_files($data->config_gallery, $this->block->context->id, 'block_lambdacb', 'gallery', 0, array('subdirs' => true));
        }
    }
}