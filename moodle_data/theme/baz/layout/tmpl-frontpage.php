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
 * A front page layout for the baz theme.
 *
 * @package   theme_baz
 * @copyright Copyright © 2021 onwards Marcin Czaja (https://rosea.io)
 * @license   Commercial https://themeforest.net/licenses
 */

defined('MOODLE_INTERNAL') || die();

user_preference_allow_ajax_update('sidepre-open', PARAM_ALPHA);
user_preference_allow_ajax_update('darkmode-on', PARAM_ALPHA);
user_preference_allow_ajax_update('drawer-open-nav', PARAM_ALPHA);
user_preference_allow_ajax_update('drawer-open-index', PARAM_BOOL);
user_preference_allow_ajax_update('drawer-open-block', PARAM_BOOL);

require_once($CFG->libdir . '/behat/lib.php');

$draweropenright = false;
$isnotloggedin = false;
$extraclasses = [];

// Moodle 4.0 - Add block button in editing mode.
$addblockbutton = $OUTPUT->addblockbutton();
if (isloggedin()) {
    $courseindexopen = (get_user_preferences('drawer-open-index', true) == true);
    $blockdraweropen = (get_user_preferences('drawer-open-block') == true);
    $draweropenright = (get_user_preferences('sidepre-open', 'true') == 'true');

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
    $courseindexopen = false;
    $blockdraweropen = false;
    $isnotloggedin = true;
    $darkmodeon = false;
}

if (theme_baz_get_setting('darkmodefirst') == '1') {
    $extraclasses[] = 'theme-dark';
    $darkmodetheme = false;
}

if (defined('BEHAT_SITE_RUNNING')) {
    $blockdraweropen = true;
}

// Check navigation style
if (theme_baz_get_setting('topbarhamburgermenu') == '1') {
    $extraclasses[] = 'rui-hamburger-menu';
}
// end

$blockshtml = $OUTPUT->blocks('side-pre');
$hasblocks = strpos($blockshtml, 'data-block=') !== false;

$sidecourseblocks = $OUTPUT->blocks('sidecourseblocks');

if ($draweropenright && $hasblocks) {
    $extraclasses[] = 'drawer-open-right';
}

$bodyattributes = $OUTPUT->body_attributes($extraclasses);
$forceblockdraweropen = $OUTPUT->firstview_fakeblocks();
$hassidecourseblocks = strpos($sidecourseblocks, 'data-block=') !== false;

// Start - Simple Content Builder.
$ruiscb = '';
$total = 19;
for ($i = 0; $i <= $total; $i++) {
    ${"block" . $i} = theme_baz_get_setting("block" . $i);
}

$array = array();

for ($i = 0; $i <= $total; $i++) {
    if (theme_baz_get_setting("displayblock" . $i) == '1') {
        $array[$i] = ${"block" . $i};
    }
    $array[0] = $block0;
}

asort($array);
foreach ($array as $key => $value) {
    $ruiscb .= $OUTPUT->theme_part('block' . $key);
}
// End - Simple Content Builder.

// Moodle 4.0
$courseindex = core_course_drawer();
if (!$courseindex) {
    $courseindexopen = false;
}
$hasblocks = (strpos($blockshtml, 'data-block=') !== false || !empty($addblockbutton));

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
// end

$primary = new core\navigation\output\primary($PAGE);
$renderer = $PAGE->get_renderer('core');
$primarymenu = $primary->export_for_template($renderer);

$header = $PAGE->activityheader;
$headercontent = $header->export_for_template($renderer);
// end


$siteurl = $CFG->wwwroot;

$buildregionmainsettings = !$PAGE->include_region_main_settings_in_header_actions();
// If the settings menu will be included in the header then don't add it here.
$regionmainsettingsmenu = $buildregionmainsettings ? $OUTPUT->region_main_settings_menu() : false;

$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    'output' => $OUTPUT,
    'sidepreblocks' => $blockshtml,
    'hasblocks' => $hasblocks,
    'bodyattributes' => $bodyattributes,
    'draweropenright' => $draweropenright,
    'regionmainsettingsmenu' => $regionmainsettingsmenu,
    'hasregionmainsettingsmenu' => !empty($regionmainsettingsmenu),
    'ruiscb' => $ruiscb,
    'darkmodeon' => !empty($darkmodeon),
    'darkmodetheme' => !empty($darkmodetheme),
    'siteurl' => $siteurl,
    'isnotloggedin' => $isnotloggedin,
    // Moodle 4.0
    'courseindexopen' => $courseindexopen,
    'blockdraweropen' => $blockdraweropen,
    'courseindex' => $courseindex,
    'primarymoremenu' => $primarymenu['moremenu'],
    //Moodle 4.0 settings menu only on the front-page
    'secondarymoremenu' => $secondarynavigation ?: false,
    //end
    'mobileprimarynav' => $primarymenu['mobileprimarynav'],
    'usermenu' => $primarymenu['user'],
    'langmenu' => $primarymenu['lang'],
    'headercontent' => $headercontent,
    'overflow' => $overflow,
    'addblockbutton' => $addblockbutton
];

// MODIFICATION START: Get and use the course page information banners HTML code, if any course page hints are configured.
$coursepageinformationbannershtml = theme_baz_get_course_information_banners();
if ($coursepageinformationbannershtml) {
    $templatecontext['coursepageinformationbanners'] = $coursepageinformationbannershtml;
}
// MODIFICATION END.

//Load theme settings
$themesettings = new \theme_baz\util\theme_settings();
$templatecontext = array_merge($templatecontext, $themesettings->global_settings());
$templatecontext = array_merge($templatecontext, $themesettings->footer_settings());

$PAGE->requires->js_call_amd('theme_baz/rui', 'init');
$PAGE->requires->js_call_amd('theme_baz/moremenu', 'init');
echo $OUTPUT->render_from_template('theme_baz/tmpl-frontpage', $templatecontext);
