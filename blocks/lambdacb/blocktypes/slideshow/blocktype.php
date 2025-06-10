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
$block_text = '';
if ($this->config->text) {
	$this->config->text = file_rewrite_pluginfile_urls($this->config->text, 'pluginfile.php', $this->context->id, 'block_lambdacb', 'content', NULL);
	$block_text = format_text($this->config->text, FORMAT_HTML, array('filter' => true));
}
$slideshow_items = '';
$autoplay = '';
$arrows = '';
$pagination = '';

if ($this->config->block_slideshownav > 1) {
	$arrows = ' uk-visible-toggle';
}
if ($this->config->block_slideshownav == 3) {
	$pagination = '<ul class="uk-slideshow-nav uk-dotnav justify-content-center"></ul>';
}
if ($this->config->block_slideshowautoplay) {
	$autoplay = '; autoplay: true; pause-on-hover: true; autoplay-interval: '.$this->config->block_slideshowinterval;
}

for($i = 1; $i <= $this->config->block_slides; $i++) {
	$current_slide = '<li>';
	$url = '';
	$overlay = '';
	$overlay_heading = '';
	$overlay_txt = '';
	$current_heading = 'block_slide_heading'.$i;
	$current_txt = 'block_slide_txt'.$i;
	$current_overlaypos = 'block_overlaypos'.$i;
	$current_overlaystyle = 'block_overlaystyle'.$i;
	$current_buttontxt = 'block_slide_btntxt'.$i;
	$current_buttonurl = 'block_slide_btnurl'.$i;
	
	if (isset($this->config->$current_heading)) {
		if ($this->config->$current_overlaypos == 2) {
			$overlay = 'uk-position-bottom text-center py-3 px-5 ';
			if ($this->config->$current_overlaystyle == 1) {
				$overlay .= 'uk-light';
			} else {
				$overlay .= 'uk-dark';
			}
		} else if ($this->config->$current_overlaypos == 3) {
			$overlay = 'uk-overlay uk-position-left text-center uk-transition-slide-left uk-width-medium d-flex flex-column justify-content-center ';
			if ($this->config->$current_overlaystyle == 1) {
				$overlay .= 'uk-overlay-default';
			} else {
				$overlay .= 'uk-overlay-primary';
			}
		} else if ($this->config->$current_overlaypos == 4) {
			$overlay = 'uk-overlay uk-position-right text-center uk-transition-slide-right uk-width-medium d-flex flex-column justify-content-center ';
			if ($this->config->$current_overlaystyle == 1) {
				$overlay .= 'uk-overlay-default';
			} else {
				$overlay .= 'uk-overlay-primary';
			}
		} else if ($this->config->$current_overlaypos == 5) {
			$overlay = 'uk-overlay uk-position-bottom text-center uk-transition-slide-bottom ';
			if ($this->config->$current_overlaystyle == 1) {
				$overlay .= 'uk-overlay-default';
			} else {
				$overlay .= 'uk-overlay-primary';
			}
		} else if ($this->config->$current_overlaypos == 6) {
			$overlay = 'uk-overlay uk-position-bottom-right uk-transition-slide-right m-4 ';
			if ($this->config->$current_overlaystyle == 1) {
				$overlay .= 'uk-overlay-default';
			} else {
				$overlay .= 'uk-overlay-primary';
			}
		} else {
			$overlay = 'uk-position-center-center text-center w-75 ';
			if ($this->config->$current_overlaystyle == 1) {
				$overlay .= 'uk-light';
			} else {
				$overlay .= 'uk-dark';
			}
		}
		$overlay_heading = format_text($this->config->$current_heading, FORMAT_HTML, array('filter' => true));
		$overlay_txt = format_text($this->config->$current_txt, FORMAT_HTML, array('filter' => true));

		if ($this->config->$current_buttontxt != '') {
			$buttontxt = format_text($this->config->$current_buttontxt, FORMAT_HTML, array('filter' => true));
			$buttonclass = 'btn btn-primary';
			$overlay_txt .= '<br><a href ="'.$this->config->$current_buttonurl.'" class="'.$buttonclass.'">'.$buttontxt.'</a>';
		}
	}
	
	$fs = get_file_storage();				
	$files = $fs->get_area_files($this->context->id, 'block_lambdacb', 'slides', $i);
	foreach ($files as $file) {
		$filename = $file->get_filename();
		if ($filename <> '.') {
			$url = moodle_url::make_file_url("$CFG->wwwroot/pluginfile.php", "/{$this->context->id}/block_lambdacb/slides/" . $i . '/' . $filename);
		}
	}
	if ($url == '') {
		$url = $CFG->wwwroot .'/blocks/lambdacb/pix/sample_slide.jpg';
	}
	
	$current_slide .= '<img src="'.$url.'" alt="slide" uk-cover>';
	$current_slide .= '<div class="'.$overlay.'">';
	$current_slide .= '<h2 class="m-0">'.$overlay_heading.'</h2>';
	$current_slide .= '<p class="m-0 plus">'.$overlay_txt.'</p>';
	$current_slide .= '</div>';
	$current_slide .= '</li>';
	$slideshow_items .= $current_slide;
}

$this->content->text = '
<div class="content">
	'.$block_text.'
</div>
<div class="uk-position-relative'.$arrows.'" tabindex="-1" uk-slideshow="ratio: '.$this->config->block_slideshowratiox.':'.$this->config->block_slideshowratioy.'; animation: '.$this->config->block_slideshowanim.''.$autoplay.'">
	<ul class="uk-slideshow-items">'.$slideshow_items.'</ul>
	<div class="uk-light">
		<a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous uk-slideshow-item="previous"></a>
		<a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next uk-slideshow-item="next"></a>
	</div>
	'.$pagination.'
</div>';