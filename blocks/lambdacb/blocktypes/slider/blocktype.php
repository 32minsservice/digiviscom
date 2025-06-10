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

$slider_items = '';
$sliderattr = '';
$sliderclasses = '';
$slideritemsclasses = '';
$slidernavclasses = '';
$additionaldiv = '';
$additionalclosingdiv = '';
$panelclasses = '';

switch ($this->config->block_sliderset) {
	case 1:
		$slideritemsclasses = ' uk-grid';
		$sliderattr = '="center: true"';
		break;
	case 2:
		$slideritemsclasses = ' uk-child-width-1-2@s';
		break;
	case 3:
		$slideritemsclasses = ' uk-child-width-1-2 uk-child-width-1-3@m';
		break;
	case 4:
		$slideritemsclasses = ' uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m';
		break;
	case 5:
		$slideritemsclasses = ' uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-5@m';
		break;
	case 6:
		$slideritemsclasses = ' uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m uk-child-width-1-6@l';
		break;
	default:
		$slideritemsclasses = ' uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m';
}

switch ($this->config->block_slidernav) {
	case 1:
		$sliderclasses = ' uk-slider-container';
		$slidernavclasses = ' uk-position-small';
		break;
	case 2:
		$sliderclasses = ' uk-slider-container uk-visible-toggle';
		$slidernavclasses = ' uk-position-small uk-hidden-hover';
		break;
	case 3:
		$sliderclasses = ' nav-outside';
		$additionaldiv = '<div class="uk-position-relative"><div class="uk-slider-container">';
		$additionalclosingdiv = '</div></div>';
		$slidernavclasses = '-out outer btn btn-primary';
		break;
	default:
		$sliderclasses = ' uk-slider-container uk-visible-toggle';
}

switch ($this->config->block_slidercontent) {
	case 1:
		$panelclasses = ' uk-light';
		break;
	case 2:
		break;
	case 3:
		$panelclasses = ' panel-bg-light';
		break;
	case 4:
		$panelclasses = ' uk-light panel-bg-dark';
		break;
	case 5:
		$panelclasses = ' uk-light panel-bg-main';
		break;
	case 6:
		$panelclasses = ' panel-hover uk-light';
		break;
	case 7:
		$panelclasses = ' panel-hover';
		break;
	case 8:
		$panelclasses = ' panel-hover panel-bg-light';
		break;
	case 9:
		$panelclasses = ' panel-hover uk-light panel-bg-dark';
		break;
	case 10:
		$panelclasses = ' panel-hover uk-light panel-bg-main';
		break;
	case 11:
		$panelclasses = ' panel-hover';
		break;
	default:
		$panelclasses = '';
}

if ($this->config->block_slidergap) {
	$slideritemsclasses .= ' uk-grid';
}

for($i = 1; $i <= $this->config->block_slides; $i++) {
	$imgdatasrc = '';
	$visibility = '';
	$panelheading = '';
	$paneltxt = '';
	$button = '';
	$url = '';

	$current_slide = '<li>';
	if ($this->config->block_sliderset == 1) {
		$current_slide = '<li class="uk-width-3-4">';
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
	if (($this->config->block_slidergap) || ($this->config->block_sliderset == 1)) {
		$imgdatasrc = ' data-src="'.$url.'" uk-img="loading: eager"';
		$visibility = ' class="invisible"';
	}

	$current_heading = 'block_slide_heading'.$i;
	$current_txt = 'block_slide_txt'.$i;
	$current_buttontxt = 'block_slide_btntxt'.$i;
	$current_buttonurl = 'block_slide_btnurl'.$i;
	
	if (isset($this->config->$current_heading)) {
		$panelheading = format_text($this->config->$current_heading, FORMAT_HTML, array('filter' => true));
		$paneltxt = format_text($this->config->$current_txt, FORMAT_HTML, array('filter' => true));
		if ($this->config->$current_buttontxt != '') {
			$buttonclass = 'btn btn-primary';
			if (($this->config->block_slidercontent == 5) || ($this->config->block_slidercontent == 10)) {
				$buttonclass = 'btn btn-light';
			}
			$buttontxt = format_text($this->config->$current_buttontxt, FORMAT_HTML, array('filter' => true));
			$button = '<br><a href ="'.$this->config->$current_buttonurl.'" class="'.$buttonclass.'">'.$buttontxt.'</a>';
		}
	}
	if ($this->config->block_slidercontent == 11) {
		$current_slide .= '<div class="uk-card uk-card-default">';
		$current_slide .= '<div class="uk-card-media-top">';
		$current_slide .= '<img src="'.$url.'" alt="slider image">';
		$current_slide .= '</div><div class="uk-card-body">';
		$current_slide .= '<h3 class="uk-card-title">'.$panelheading.'</h3><p>'.$paneltxt.$button.'</p>';
		$current_slide .= '</div></div>';
	} else {
		$current_slide .= '<div class="slide-img-wrapper"'.$imgdatasrc.'><img src="'.$url.'" alt="slider image"'.$visibility.'></div>';
		$current_slide .= '<div class="uk-position-center uk-panel text-center w-100 h-100'.$panelclasses.'">';
		$current_slide .= '<h3>'.$panelheading.'</h3><p>'.$paneltxt.$button.'</p>';
		$current_slide .= '</div></li>';
	}
	
	$slider_items .= $current_slide;
}

$this->content->text = '
<div class="content">
	'.$block_text.'
</div>
<div class="uk-position-relative uk-slider'.$sliderclasses.'" tabindex="-1" uk-slider'.$sliderattr.' loading="lazy">
	'.$additionaldiv.'
	<ul class="uk-slider-items'.$slideritemsclasses.'">
		'.$slider_items.'
	</ul>
	'.$additionalclosingdiv.'
	<div class="slidenav uk-light">
		<a class="uk-position-center-left'.$slidernavclasses.'" href uk-slidenav-previous uk-slider-item="previous"></a>
		<a class="uk-position-center-right'.$slidernavclasses.'" href uk-slidenav-next uk-slider-item="next"></a>
	</div>
</div>';