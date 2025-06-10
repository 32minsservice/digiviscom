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

class block_lambdacb extends block_base {
	public function init() {
		$this->title = get_string('pluginname', 'block_lambdacb');
	}
	
	public function get_content() {
		global $COURSE, $CFG, $OUTPUT, $USER, $PAGE;
		require_once($CFG->libdir.'/filelib.php');		
		$this->content = new stdClass();

		if ((empty($this->config) && !is_object($this->config)) || ($this->config->block_type == 0)) {
	    	$this->content->text = '<p class="plus">'.get_string('no_blocktype', 'block_lambdacb').'</p>';
		} else if ($this->config->block_type == 1) {
			require('blocktypes/text_media/blocktype.php');
		} else if ($this->config->block_type == 2) {
			require('blocktypes/slideshow/blocktype.php');
		} else if ($this->config->block_type == 3) {
			require('blocktypes/slider/blocktype.php');
		} else if ($this->config->block_type == 4) {
			require('blocktypes/contacts/blocktype.php');
		} else if ($this->config->block_type == 5) {
			require('blocktypes/gallery/blocktype.php');
		} else {
			$this->content->text = '
			<div class="block_lambda_course_contacts wrapper">
				<div class="content">
					<h5>undefined</h5>
				</div>
			</div>';
		}
	    return $this->content;
	}
	
	public function html_attributes() {
    	$attributes = parent::html_attributes(); // Get default values
		if (!empty($this->config) && is_object($this->config)) {
			$attributes['class'] .= ' custom';
			if ($this->config->block_fullwidth) {
				$attributes['class'] .= ' block_full';
			}
		}
    	return $attributes;
	}

	function instance_config_save($data, $nolongerused = false) {
        global $DB;
        $config = clone($data);
        $config->text = file_save_draft_area_files($data->text['itemid'], $this->context->id, 'block_lambdacb', 'content', 0, array('subdirs'=>true), $data->text['text']);
        $config->format = $data->text['format'];
        parent::instance_config_save($config, $nolongerused);
    }

    function instance_delete() {
        global $DB;
        $fs = get_file_storage();
        $fs->delete_area_files($this->context->id, 'block_lambdacb');
        return true;
    }

	public function instance_allow_multiple() {
		return true;
	}

    public function has_config() {
        return false;
    }

	public function applicable_formats() {
		return array('all' => true);
	}

    public function hide_header() {
        if ($this->page->user_is_editing()) {
            return false;
        } else {
            return true;
        }
    }
}
