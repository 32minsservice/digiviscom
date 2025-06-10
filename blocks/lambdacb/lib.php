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

function block_lambdacb_pluginfile($course, $birecord_or_cm, $context, $filearea, $args, $forcedownload, array $options=array()) {
    global $DB, $CFG, $USER;

    if ($context->contextlevel != CONTEXT_BLOCK) {
        send_file_not_found();
    }

    if ($context->get_course_context(false)) {
        require_course_login($course);
    } else if ($CFG->forcelogin) {
        require_login();
    } else {
        $parentcontext = $context->get_parent_context();
        if ($parentcontext->contextlevel === CONTEXT_COURSECAT) {
            if (!core_course_category::get($parentcontext->instanceid, IGNORE_MISSING)) {
                send_file_not_found();
            }
        } else if ($parentcontext->contextlevel === CONTEXT_USER && $parentcontext->instanceid != $USER->id) {
            send_file_not_found();
        }
    }

    if ($filearea !== 'content' && $filearea !== 'bgimage' && $filearea !== 'slides' && $filearea !== 'gallery') {
        send_file_not_found();
    }

    $fs = get_file_storage();
    if (count($args) != 2) {
        $filename = array_pop($args);
        $filepath = $args ? '/' . implode('/', $args) . '/' : '/';
    }

    if (((!$file = $fs->get_file($context->id, 'block_lambdacb', 'slides', $args[0], '/', $args[1])) && (!$file = $fs->get_file($context->id, 'block_lambdacb', 'bgimage', 0, $filepath, $filename)) && (!$file = $fs->get_file($context->id, 'block_lambdacb', 'content', 0, $filepath, $filename)) && (!$file = $fs->get_file($context->id, 'block_lambdacb', 'gallery', 0, $filepath, $filename))) or ($file->is_directory())) {
        send_file_not_found();
    }

    if ($parentcontext = context::instance_by_id($birecord_or_cm->parentcontextid, IGNORE_MISSING)) {
        if ($parentcontext->contextlevel == CONTEXT_USER) {
            $forcedownload = true;
        }
    } else {
        $forcedownload = true;
    }

    \core\session\manager::write_close();
    send_stored_file($file, null, 0, $forcedownload, $options);
}

/**
 * Perform global search replace such as when migrating site to new URL.
 * @param  $search
 * @param  $replace
 * @return void
 */
function block_lambdacb_global_db_replace($search, $replace) {
    global $DB;

    $instances = $DB->get_recordset('block_instances', array('blockname' => 'pluginname'));
    foreach ($instances as $instance) {
        // TODO: intentionally hardcoded until MDL-26800 is fixed
        $config = unserialize(base64_decode($instance->configdata));
        if (isset($config->text) and is_string($config->text)) {
            $config->text = str_replace($search, $replace, $config->text);
            $DB->update_record('block_instances', ['id' => $instance->id,
                    'configdata' => base64_encode(serialize($config)), 'timemodified' => time()]);
        }
    }
    $instances->close();
}

/**
 * Given an array with a file path, it returns the itemid and the filepath for the defined filearea.
 *
 * @param  string $filearea The filearea.
 * @param  array  $args The path (the part after the filearea and before the filename).
 * @return array The itemid and the filepath inside the $args path, for the defined filearea.
 */
function block_lambdacb_get_path_from_pluginfile(string $filearea, array $args) : array {
    array_shift($args);
    if (empty($args)) {
        $filepath = '/';
    } else {
        $filepath = '/' . implode('/', $args) . '/';
    }

    return [
        'itemid' => 0,
        'filepath' => $filepath,
    ];
}
