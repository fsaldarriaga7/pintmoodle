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
 * A two column layout for the baz theme.
 *
 * @package   theme_baz
 * @copyright Copyright © 2021 onwards Marcin Czaja (https://rosea.io)
 * @license   Commercial https://themeforest.net/licenses
 */

defined('MOODLE_INTERNAL') || die();

user_preference_allow_ajax_update('sidepre-open', PARAM_ALPHA);
user_preference_allow_ajax_update('darkmode-on', PARAM_ALPHA);
require_once($CFG->libdir . '/behat/lib.php');

$draweropenright = false;
$isnotloggedin = false;
$extraclasses = [];

// Moodle 4.0 - Add block button in editing mode.
$addblockbutton = $OUTPUT->addblockbutton();

if (isloggedin()) {
    if (theme_baz_get_setting('darkmodetheme') == '1') {
        $darkmodeon = (get_user_preferences('darkmode-on', 'false') == 'true'); //return 1
        if ($darkmodeon) {
            $extraclasses[] = 'theme-dark';
        }
        $darkmodetheme = true;
    } else {
        $darkmodeon = false;
    }
} else {
    $isnotloggedin = true;
    $darkmodeon = false;
}

if (theme_baz_get_setting('darkmodefirst') == '1') {
    $extraclasses[] = 'theme-dark';
    $darkmodetheme = false;
}

$blockshtml = $OUTPUT->blocks('side-pre');
$blockshtml2 = $OUTPUT->blocks('dtopblocks');
$blockshtml3 = $OUTPUT->blocks('dbottomblocks');
$blockshtml4 = $OUTPUT->blocks('dleftblocks');
$blockshtml5 = $OUTPUT->blocks('drightblocks');
$blockshtml6 = $OUTPUT->blocks('dmiddleblocks');

$hasblocks = (strpos($blockshtml, 'data-block=') !== false || !empty($addblockbutton));

// Moodle 4.0
$hasblocks = (strpos($blockshtml, 'data-block=') !== false || !empty($addblockbutton));
$PAGE->set_secondary_navigation(false);
$renderer = $PAGE->get_renderer('core');

$header = $PAGE->activityheader;
$headercontent = $header->export_for_template($renderer);
// Don't display new moodle 4.0 secondary menu if old settings region is available
$secondarynavigation = false;
$overflow = '';

if ($PAGE->has_secondary_navigation()) {
    $tablistnav = $PAGE->has_tablist_secondary_navigation();
    $moremenu = new \core\navigation\output\more_menu($PAGE->secondarynav, 'nav-tabs', true, $tablistnav);
    $secondarynavigation = $moremenu->export_for_template($OUTPUT);
    $overflowdata = $PAGE->secondarynav->get_overflow_menu_data();
    if (!is_null($overflowdata)) {
        $overflow = $overflowdata->export_for_template($OUTPUT);
    }
}
// End

if ($draweropenright && $hasblocks) {
    $extraclasses[] = 'drawer-open-right';
}
// Check navigation style
if (theme_baz_get_setting('topbarhamburgermenu') == '1') {
    $extraclasses[] = 'rui-hamburger-menu';
}
// end

//Course Card Desc Limit
$coursecarddesclimit = $PAGE->theme->settings->coursecarddesclimit;

$buildregionmainsettings = !$PAGE->include_region_main_settings_in_header_actions();
// If the settings menu will be included in the header then don't add it here.
$regionmainsettingsmenu = $buildregionmainsettings ? $OUTPUT->region_main_settings_menu() : false;
$siteurl = $CFG->wwwroot;
$bodyattributes = $OUTPUT->body_attributes($extraclasses);
$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    'output' => $OUTPUT,
    'bodyattributes' => $bodyattributes,
    'darkmodeon' => !empty($darkmodeon),
    'darkmodetheme' => !empty($darkmodetheme),
    'siteurl' => $siteurl,
    'sidepreblocks' => $blockshtml,
    'dtopblocks' => $blockshtml2,
    'dbottomblocks' => $blockshtml3,
    'dleftblocks' => $blockshtml4,
    'drightblocks' => $blockshtml5,
    'dmiddleblocks' => $blockshtml6,
    'hasblocks' => $hasblocks,
    'hasdtopblocks' => !empty($blockshtml2),
    'hasdbottomblocks' => !empty($blockshtml3),
    'hasdleftblocks' => !empty($blockshtml4),
    'hasdrightblocks' => !empty($blockshtml5),
    'hasdmiddleblocks' => !empty($blockshtml6),
    'bodyattributes' => $bodyattributes,
    'coursecarddesclimit' => $coursecarddesclimit,
    'regionmainsettingsmenu' => $regionmainsettingsmenu,
    'hasregionmainsettingsmenu' => !empty($regionmainsettingsmenu),
    'isnotloggedin' => $isnotloggedin,
    // Moodle 4.0
    'headercontent' => $headercontent,
    'overflow' => $overflow,
    'addblockbutton' => $addblockbutton
];
// Get and use the course page information banners HTML code, if any course page hints are configured.

$coursepageinformationbannershtml = theme_baz_get_course_information_banners();
if ($coursepageinformationbannershtml) {
    $templatecontext['coursepageinformationbanners'] = $coursepageinformationbannershtml;
}
// End.

// Load theme settings
$themesettings = new \theme_baz\util\theme_settings();

$templatecontext = array_merge($templatecontext, $themesettings->global_settings());
$templatecontext = array_merge($templatecontext, $themesettings->dashboard_settings());
$templatecontext = array_merge($templatecontext, $themesettings->footer_settings());

$PAGE->requires->js_call_amd('theme_baz/rui', 'init');
$PAGE->requires->js_call_amd('theme_baz/moremenu', 'init');
echo $OUTPUT->render_from_template('theme_baz/tmpl-dashboard', $templatecontext);
