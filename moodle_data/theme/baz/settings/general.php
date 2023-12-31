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
 * @package   theme_baz
 * @copyright Copyright © 2021 onwards Marcin Czaja (https://rosea.io)
 * @license   Commercial https://themeforest.net/licenses
 *
 */


defined('MOODLE_INTERNAL') || die();

$page = new admin_settingpage('theme_baz_general', get_string('generalsettings', 'theme_baz'));

$name = 'theme_baz/hintro';
$heading = get_string('hintro', 'theme_baz');
$setting = new baz_setting_specialsettingheading($name, $heading, format_text(get_string('hintro_desc', 'theme_baz'), FORMAT_MARKDOWN));
$page->add($setting);

$name = 'theme_baz/darkmodetheme';
$title = get_string('darkmodetheme', 'theme_baz');
$description = get_string('darkmodetheme_desc', 'theme_baz');
$default = 1;
$setting = new admin_setting_configcheckbox($name, $title, $description, $default);
$page->add($setting);

$name = 'theme_baz/darkmodefirst';
$title = get_string('darkmodefirst', 'theme_baz');
$description = get_string('darkmodefirst_desc', 'theme_baz');
$default = 0;
$setting = new admin_setting_configcheckbox($name, $title, $description, $default);
$page->add($setting);

$name = 'theme_baz/sdarkmode';
$title = get_string('sdarkmode', 'theme_baz');
$description = get_string('sdarkmode_desc', 'theme_baz');
$default = 'Dark Mode';
$setting = new admin_setting_configtextarea($name, $title, $description, $default);
$page->add($setting);

$name = 'theme_baz/fontawesome';
$title = get_string('fontawesome', 'theme_baz');
$description = get_string('fontawesome_desc', 'theme_baz');
$default = 0;
$setting = new admin_setting_configcheckbox($name, $title, $description, $default);
$page->add($setting);

$name = 'theme_baz/themeauthor';
$title = get_string('themeauthor', 'theme_baz');
$description = get_string('themeauthor_desc', 'theme_baz');
$default = 1;
$setting = new admin_setting_configcheckbox($name, $title, $description, $default);
$page->add($setting);

$name = 'theme_baz/wrappermdfw';
$title = get_string('wrappermdfw', 'theme_baz');
$description = get_string('wrappermdfw_desc', 'theme_baz');
$setting = new admin_setting_configcheckbox($name, $title, $description, 'no', 'yes', 'no');
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Setting: Show hint for switched role.
$name = 'theme_baz/showswitchedroleincourse';
$title = get_string('showswitchedroleincoursesetting', 'theme_baz');
$description = get_string('showswitchedroleincoursesetting_desc', 'theme_baz');
$default = 0;
$setting = new admin_setting_configcheckbox($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Setting: Show hint in hidden courses.
$name = 'theme_baz/showhintcoursehidden';
$title = get_string('showhintcoursehiddensetting', 'theme_baz');
$description = get_string('showhintcoursehiddensetting_desc', 'theme_baz');
$default = 0;
$setting = new admin_setting_configcheckbox($name, $title, $description, $default);
$page->add($setting);

// Setting: Show hint guest for access.
$name = 'theme_baz/showhintcourseguestaccess';
$title = get_string('showhintcoursguestaccesssetting', 'theme_baz');
$description = get_string('showhintcourseguestaccesssetting_desc', 'theme_baz');
$default = 0;
$setting = new admin_setting_configcheckbox($name, $title, $description, $default);
$page->add($setting);

// Setting: Show hint for self enrolment without enrolment key.
$name = 'theme_baz/showhintcourseselfenrol';
$title = get_string('showhintcourseselfenrolsetting', 'theme_baz');
$description = get_string('showhintcourseselfenrolsetting_desc', 'theme_baz');
$default = 0;
$setting = new admin_setting_configcheckbox($name, $title, $description, $default);
$page->add($setting);

$settings->add($page);
