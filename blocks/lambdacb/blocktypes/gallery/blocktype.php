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

$this->content->text = '
<div class="content">
	'.$block_text.'
</div>
<div class="uk-child-width-1-2@s uk-child-width-1-3@m js-grid-masonry" uk-grid="masonry: pack">';
	$fs = get_file_storage();
	$files = $fs->get_area_files($this->context->id, 'block_lambdacb', 'gallery');
	foreach ($files as $file) {
		$filename = $file->get_filename();
		if ($filename <> '.') {
			$url = moodle_url::make_pluginfile_url($file->get_contextid(), $file->get_component(), $file->get_filearea(), null, $file->get_filepath(), $filename);
			$this->content->text .= '
			<div>
				<div uk-lightbox>
					<a class="uk-inline uk-img-hover" href="'.$url.'" data-caption="'.strip_tags($filename).'">
						<img class="img-fluid p-2" src="'.$url.'" alt="'.strip_tags($filename).'">
					</a>
				</div>
			</div>';
		}
	}
	$this->content->text .= '
</div>';