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
$style_outer = '';
$style_bgimg = '';
$style_inner = '';
$classes_outer = '';
$classes_inner = '';
if ($this->config->block_bgcolor) {
	$style_outer .= 'background-color: '.$this->config->block_bgcolor.';';
}
if ($this->config->block_px) {
	$classes_inner .= ' '.$this->config->block_px;
}
if ($this->config->block_py) {
	$classes_inner .= ' '.$this->config->block_py;
}
if ($this->config->block_my) {
	$classes_outer .= ' '.$this->config->block_my;
}

$fs = get_file_storage();
$files = $fs->get_area_files($this->context->id, 'block_lambdacb', 'bgimage');
foreach ($files as $file) {
	$filename = $file->get_filename();
	if ($filename <> '.') {
		$url = moodle_url::make_pluginfile_url($file->get_contextid(), $file->get_component(), $file->get_filearea(), null, $file->get_filepath(), $filename);
		$this->config->block_bgimage = $url;
		$style_bgimg .= ' background-image: url('.$url.');';
		if ($this->config->block_border_radius > 0) {
			$style_bgimg .= ' border-radius: '.$this->config->block_border_radius.'rem;';
		}
		if ($this->config->block_bgimage_style == 1) {
			$style_bgimg .= ' background-size: contain; background-repeat: no-repeat;';
		}
		if ($this->config->block_bgimage_style == 2) {
			$style_bgimg .= ' background-size: cover;';
		}
		if ($this->config->block_bgimage_style == 3) {
			$style_bgimg .= ' background-repeat: repeat;';
		}
		if ($this->config->block_bgimage_style == 4) {
			$style_bgimg .= ' background-attachment: fixed; background-position: center; background-repeat: no-repeat; background-size: cover;';
		}
		if ($this->config->block_img_opacity != '1') {
			$style_bgimg .= ' opacity: '.$this->config->block_img_opacity.';';
		}
		$style_bgimg .= ' background-position-x: '.$this->config->block_bgimage_posx.';';
		$style_bgimg .= ' background-position-y: '.$this->config->block_bgimage_posy.';';
	}
}

if ($this->config->block_border_radius > 0) {
	$style_outer .= ' border-radius: '.$this->config->block_border_radius.'rem;';
}

$this->content->text = '
<div class="lambdacb wrapper'.$classes_outer.'" style="'.$style_outer.'">
	<div class="bgimg" style="'.$style_bgimg.'"></div>
	<div class="content'.$classes_inner.'" style="'.$style_inner.'">
		'.$block_text.'
	</div>
</div>';