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

global $PAGE, $OUTPUT;

// Variables - Settings
$block20introtitle = format_text(theme_baz_get_setting('block20introtitle'),FORMAT_HTML, array('noclean' => true));
$block20introcontent = format_text(theme_baz_get_setting('block20introcontent'),FORMAT_HTML, array('noclean' => true));
$block20html = format_text(theme_baz_get_setting('block20htmlcontent'),FORMAT_HTML, array('noclean' => true));
$block20footer = format_text(theme_baz_get_setting('block20footercontent'),FORMAT_HTML, array('noclean' => true));
$block20class = theme_baz_get_setting('block20class');

echo '<!-- Start Block 20 -->';
echo '<div class="rui-fp-block--20 '.$block20class.'">';
          if(!empty($block20introtitle) || !empty($block20introcontent)) {
          echo '<div class="wrapper-md">';
          }
          if(!empty($block20introtitle)) {
          echo '<h3 class="rui-block-title">'.$block20introtitle.'</h3>';
          }
          if(!empty($block20introcontent)) {
          echo '<div class="rui-block-desc">'.$block20introcontent.'</div>';
          }
          if(!empty($block20introtitle) || !empty($block20introcontent)) {
          echo '</div>';
          }
          echo $block20html;
          if(!empty($block20footer)) {
          echo '<div class="rui-block-footer wrapper-md">'.$block20footer.'</div>';
          }
echo '</div>';
if(theme_baz_get_setting("displayhrblock20") == '1') {
          echo '<hr class="rui-block-hr wrapper-md" />';
}
echo '<!-- End Block 20 -->';