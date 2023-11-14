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

$page = new admin_settingpage('theme_baz_block12', get_string('settingsblock12', 'theme_baz'));

$name = 'theme_baz/displayblock12';
$title = get_string('turnon', 'theme_baz');
$description = get_string('displayblock12_desc', 'theme_baz');
$default = 1;
$setting = new admin_setting_configcheckbox($name, $title, $description, $default);
$page->add($setting);

$name = 'theme_baz/displayhrblock12';
$title = get_string('displayblockhr', 'theme_baz');
$description = get_string('displayblockhr_desc', 'theme_baz');
$default = 1;
$setting = new admin_setting_configcheckbox($name, $title, $description, $default);
$page->add($setting);

$name = 'theme_baz/block12class';
$title = get_string('additionalclass', 'theme_baz');
$description = get_string('additionalclass_desc', 'theme_baz');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$page->add($setting);

$name = 'theme_baz/block12introtitle';
$title = get_string('blockintrotitle', 'theme_baz');
$description = get_string('blockintrotitle_desc', 'theme_baz');
$default = '';
$setting = new admin_setting_configtextarea($name, $title, $description, $default);
$page->add($setting);

$name = 'theme_baz/block12introcontent';
$title = get_string('blockintrocontent', 'theme_baz');
$description = get_string('blockintrocontent_desc', 'theme_baz');
$default = '';
$setting = new admin_setting_configtextarea($name, $title, $description, $default);
$page->add($setting);

$name = 'theme_baz/block12htmlcontent';
$title = get_string('blockhtmlcontent', 'theme_baz');
$description = get_string('blockhtmlcontent_desc', 'theme_baz');
$default = '<div class="row">

          <!-- Start item -->
          <div class="col-12 col-md-3 px-3 my-3 my-lg-0 text-center">
              <div class="display-3 mb-2">$99<sup class="text-muted">/ $3k</sup></div>
              <p class="text-light">Standard / Extended License</p>
          </div>
          <!-- End item -->

          <!-- Start item -->
          <div class="col-12 col-md-3 px-3 my-3 my-lg-0 text-center">
              <div class="display-3 mb-2">Free</div>
              <p class="text-light">Updates and bug fixes</p>
          </div>
          <!-- End item -->

          <!-- Start item -->
          <div class="col-12 col-md-3 px-3 my-3 my-lg-0 text-center">
              <div class="display-3 mb-2">1900+</div>
              <p class="text-light">Trusted users</p>
          </div>
          <!-- End item -->

          <!-- Start item -->
          <div class="col-12 col-md-3 px-3 my-3 my-lg-0 text-center">
              <div class="display-3 mb-2">Moodle</div>
              <p class="text-light">Compatible with Moodle 3.11 and later e.g Moodle 4.0</p>
          </div>
          <!-- End item -->
      </div>';
$setting = new baz_setting_confightmleditor($name, $title, $description, $default);
$page->add($setting);

$name = 'theme_baz/block12footercontent';
$title = get_string('blockfootercontent', 'theme_baz');
$description = get_string('blockfootercontent_desc', 'theme_baz');
$default = '';
$setting = new admin_setting_configtextarea($name, $title, $description, $default);
$page->add($setting);

$settings->add($page);
