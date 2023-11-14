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

namespace theme_baz\output;

use html_writer;
use stdClass;
use moodle_url;
use context_course;
use context_system;
use core_course_list_element;
use custom_menu;
use action_menu_filler;
use action_menu_link_secondary;
use action_menu;
use action_link;
use core_text;
use coding_exception;
use navigation_node;
use context_header;
use pix_icon;
use renderer_base;
use theme_config;
use get_string;

/**
 * Renderers to align Moodle's HTML with that expected by Bootstrap
 *
 * @package    theme_baz
 * @copyright  Copyright © 2021 onwards Marcin Czaja (https://rosea.io)
 * @license    Commercial https://themeforest.net/licenses
 */
class core_renderer extends \core_renderer {

    public function edit_button(moodle_url $url, string $method = 'post') {
        if ($this->page->theme->haseditswitch) {
            return;
        }
        $url->param('sesskey', sesskey());
        if ($this->page->user_is_editing()) {
            $url->param('edit', 'off');
            $editstring = get_string('turneditingoff');
        } else {
            $url->param('edit', 'on');
            $editstring = get_string('turneditingon');
        }
        $button = new \single_button($url, $editstring, 'post', ['class' => 'btn btn-primary']);
        return $this->render_single_button($button);
    }

    /**
     * The standard tags (meta tags, links to stylesheets and JavaScript, etc.)
     * that should be included in the <head> tag. Designed to be called in theme
     * layout.php files.
     *
     * @return string HTML fragment.
     */
    public function standard_end_of_body_html() {
        $output = parent::standard_end_of_body_html();

        $googleanalyticscode = "<script
        async
        src='https://www.googletagmanager.com/gtag/js?id=GOOGLE-ANALYTICS-CODE'>
        </script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
        dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'GOOGLE-ANALYTICS-CODE');
        </script>";

        $theme = theme_config::load('baz');

        if (!empty($theme->settings->googleanalytics)) {
            $output .= str_replace(
                "GOOGLE-ANALYTICS-CODE",
                trim($theme->settings->googleanalytics),
                $googleanalyticscode
            );
        }

        return $output;
    }

    /**
     *
     * Method to load theme element form 'layout/parts' folder
     *
     */
    public function theme_part($name, $vars = array()) {

        global $CFG;

        $element = $name . '.php';
        $candidate1 = $this->page->theme->dir . '/layout/parts/' . $element;

        // Require for child theme.
        if (file_exists($candidate1)) {
            $candidate = $candidate1;
        } else {
            $candidate = $CFG->dirroot . theme_baz_theme_dir() . '/baz/layout/parts/' . $element;
        }

        if (!is_readable($candidate)) {
            debugging("Could not include element $name.");
            return;
        }

        ob_start();
        include($candidate);
        $output = ob_get_clean();
        return $output;
    }

    /**
     * Renders the custom menu
     *
     * @param custom_menu $menu
     * @return mixed
     */
    protected function render_custom_menu(custom_menu $menu) {
        if (!$menu->has_children()) {
            return '';
        }

        $content = '';
        foreach ($menu->get_children() as $item) {
            $context = $item->export_for_template($this);
            $content .= $this->render_from_template('core/moremenu_children', $context);
        }

        return $content;
    }

    /**
     * Outputs the favicon urlbase.
     *
     * @return string an url
     */
    public function favicon() {
        global $CFG;
        $theme = theme_config::load('baz');
        $favicon = $theme->setting_file_url('favicon', 'favicon');

        if (!empty(($favicon))) {
            $urlreplace = preg_replace('|^https?://|i', '//', $CFG->wwwroot);
            $favicon = str_replace($urlreplace, '', $favicon);

            return new moodle_url($favicon);
        }

        return parent::favicon();
    }

    public function render_lang_menu() {
        $langs = get_string_manager()->get_list_of_translations();
        $haslangmenu = $this->lang_menu() != '';
        $menu = new custom_menu;

        if ($haslangmenu) {
            $strlang = get_string('language');
            $currentlang = current_language();
            if (isset($langs[$currentlang])) {
                $currentlang = $langs[$currentlang];
            } else {
                $currentlang = $strlang;
            }
            $this->language = $menu->add($currentlang, new moodle_url('#'), $strlang, 10000);
            foreach ($langs as $langtype => $langname) {
                $this->language->add($langname, new moodle_url($this->page->url, array('lang' => $langtype)), $langname);
            }
            foreach ($menu->get_children() as $item) {
                $context = $item->export_for_template($this);
            }

            $context->currentlangname = array_search($currentlang, $langs);

            if (isset($context)) {
                return $this->render_from_template('theme_baz/lang_menu', $context);
            }
        }
    }

    public function render_lang_menu_login() {
        $langs = get_string_manager()->get_list_of_translations();
        $haslangmenu = $this->lang_menu() != '';
        $menu = new custom_menu;

        if ($haslangmenu) {
            $strlang = get_string('language');
            $currentlang = current_language();
            if (isset($langs[$currentlang])) {
                $currentlang = $langs[$currentlang];
            } else {
                $currentlang = $strlang;
            }
            $this->language = $menu->add($currentlang, new moodle_url('#'), $strlang, 10000);
            foreach ($langs as $langtype => $langname) {
                $this->language->add($langname, new moodle_url($this->page->url, array('lang' => $langtype)), $langname);
            }
            foreach ($menu->get_children() as $item) {
                $context = $item->export_for_template($this);
            }

            $context->currentlangname = array_search($currentlang, $langs);

            if (isset($context)) {
                return $this->render_from_template('theme_baz/lang_menu_login', $context);
            }
        }
    }

    public static function get_course_progress_count($course, $userid = 0) {
        global $USER;

        // Make sure we continue with a valid userid.
        if (empty($userid)) {
            $userid = $USER->id;
        }

        $completion = new \completion_info($course);

        // First, let's make sure completion is enabled.
        if (!$completion->is_enabled()) {
            return null;
        }

        if (!$completion->is_tracked_user($userid)) {
            return null;
        }

        // Before we check how many modules have been completed see if the course has.
        if ($completion->is_course_complete($userid)) {
            return 100;
        }

        // Get the number of modules that support completion.
        $modules = $completion->get_activities();
        $count = count($modules);
        if (!$count) {
            return null;
        }

        // Get the number of modules that have been completed.
        $completed = 0;
        foreach ($modules as $module) {
            $data = $completion->get_data($module, true, $userid);
            $completed += $data->completionstate == COMPLETION_INCOMPLETE ? 0 : 1;
        }

        return ($completed / $count) * 100;
    }

    /**
     *
     * Outputs the course progress if course completion is on.
     *
     * @return string Markup.
     */
    protected function courseprogress($course) {
        global $USER;
        $theme = \theme_config::load('baz');

        $output = '';
        $courseformat = course_get_format($course);

        if (get_class($courseformat) != 'format_tiles') {
            $completion = new \completion_info($course);

            // Start Course progress count.
            // Make sure we continue with a valid userid.
            if (empty($userid)) {
                $userid = $USER->id;
            }
            $completion = new \completion_info($course);

            // Get the number of modules that support completion.
            $modules = $completion->get_activities();
            $count = count($modules);
            if (!$count) {
                return null;
            }

            // Get the number of modules that have been completed.
            $completed = 0;
            foreach ($modules as $module) {
                $data = $completion->get_data($module, true, $userid);
                $completed += $data->completionstate == COMPLETION_INCOMPLETE ? 0 : 1;
            }
            $progresscountc = $completed;
            $progresscounttotal = $count;
            // End progress count.

            if ($completion->is_enabled()) {
                $templatedata = new \stdClass;
                $templatedata->progress = \core_completion\progress::get_course_progress_percentage($course);
                $templatedata->progresscountc = $progresscountc;
                $templatedata->progresscounttotal = $progresscounttotal;

                if (!is_null($templatedata->progress)) {
                    $templatedata->progress = floor($templatedata->progress);
                } else {
                    $templatedata->progress = 0;
                }
                if (get_config('theme_baz', 'courseprogressbar') == 1) {
                    $progressbar = '<div class="rui-course-progresschart">' . $this->render_from_template('theme_baz/progress-chart', $templatedata) . '</div>';
                    if (has_capability('report/progress:view',  \context_course::instance($course->id))) {
                        $courseprogress = new \moodle_url('/report/progress/index.php');
                        $courseprogress->param('course', $course->id);
                        $courseprogress->param('sesskey', sesskey());
                        $output .= html_writer::link($courseprogress, $progressbar, array('class' => 'rui-course-progressbar'));
                    } else {
                        $output .= $progressbar;
                    }
                }
            }
        }

        return $output;
    }

    /**
     * Get the user profile pic
     *
     * @param null $userobject
     * @param int $imgsize
     * @return moodle_url
     * @throws \coding_exception
     */
    protected function get_user_picture($userobject = null, $imgsize = 60) {
        global $USER, $PAGE;

        if (!$userobject) {
            $userobject = $USER;
        }

        $userimg = new \user_picture($userobject);

        $userimg->size = $imgsize;

        return  $userimg->get_url($PAGE);
    }

    /**
     *
     * Returns HTML to display course contacts.
     *
     */
    protected function course_contacts() {
        global $CFG, $COURSE, $DB;
        $course = $DB->get_record('course', ['id' => $COURSE->id]);
        $course = new core_course_list_element($course);
        $instructors = $course->get_course_contacts();

        if (!empty($instructors)) {
            $content = html_writer::start_div('course-teachers-box');

            foreach ($instructors as $key => $instructor) {
                $name = $instructor['username'];
                $role = $instructor['rolename'];
                $roleshortname = $instructor['role']->shortname;

                $url = $CFG->wwwroot . '/user/profile.php?id=' . $key;
                $picture = $this->get_user_picture($DB->get_record('user', array('id' => $key)));

                $content .= "<div class='course-contact-title-item'><a href='{$url}'
                    'title='{$name}' class='course-contact rui-user-{$roleshortname}'>";
                $content .= "<img src='{$picture}' class='course-teacher-avatar'
                    alt='{$name}' title='{$name} - {$role}' data-toggle='tooltip'/>";
                $content .= "</a></div>";
            }

            $content .= html_writer::end_div(); // Teachers-box.
            return $content;
        }
    }

    /**
     *
     * Returns HTML to display course summary.
     *
     */
    protected function course_summary($courseid = 0, $content = '') {
        global $COURSE, $CFG;
        $output = '';

        require_once($CFG->libdir . '/filelib.php');

        $iscourseid = $courseid ? $courseid : $COURSE->id;
        $iscontent = $content ? $content : $COURSE->summary;
        $context = context_course::instance($iscourseid);
        $desc = file_rewrite_pluginfile_urls($iscontent, 'pluginfile.php', $context->id, 'course', 'summary', null);

        $output .= html_writer::start_div('rui-course-desc mt-3');
        $output .= format_text($desc, FORMAT_HTML);
        $output .= html_writer::end_div();

        return $output;
    }

    /**
     * Outputs the pix url base
     *
     * @return string an URL.
     */
    public function get_pix_image_url_base() {
        global $CFG;

        return $CFG->wwwroot . "/theme/baz/pix";
    }

    /**
     *
     * Returns HTML to display course hero.
     *
     */
    public function course_hero() {
        global $CFG, $COURSE, $DB;

        $course = $DB->get_record('course', ['id' => $COURSE->id]);

        $course = new core_course_list_element($course);

        $courseimage = '';
        $imageindex = 1;
        foreach ($course->get_course_overviewfiles() as $file) {
            $isimage = $file->is_valid_image();

            $url = new moodle_url("$CFG->wwwroot/pluginfile.php" . '/' . $file->get_contextid() . '/' . $file->get_component() . '/' .
                $file->get_filearea() . $file->get_filepath() . $file->get_filename(), ['forcedownload' => !$isimage]);

            if ($isimage) {
                $courseimage = $url;
            }

            if ($imageindex == 2) {
                break;
            }

            $imageindex++;
        }

        $html = '';
        // Create html for header.
        if (!empty($courseimage)) {
            $html .= '<img src=' . $courseimage . ' class="course-hero-img img-fluid w-100" alt="">';
        }
        return $html;
    }


    /**
     * Breadcrumbs
     *
     */
    public function breadcrumbs() {
        global $USER, $COURSE, $CFG;

        $header = new stdClass();
        $header->hasnavbar = empty($this->page->layout_options['nonavbar']);
        $header->navbar = $this->navbar();
        $header->courseheader = $this->course_header();
        $header->hastopbarhamburgermenu = theme_baz_get_setting('topbarhamburgermenu');
        $html = $this->render_from_template('theme_baz/breadcrumbs', $header);

        return $html;
    }


    /**
     * Wrapper for header elements.
     *
     * @return string HTML to display the main header.
     */
    public function simple_header() {

        global $USER, $COURSE, $CFG, $PAGE;
        $html = null;

        if (
            $this->page->include_region_main_settings_in_header_actions() &&
            !$this->page->blocks->is_block_present('settings')
        ) {
            // Only include the region main settings if the page has requested it and it doesn't already have
            // the settings block on it. The region main settings are included in the settings block and
            // duplicating the content causes behat failures.
            $this->page->add_header_action(html_writer::div(
                $this->region_main_settings_menu(),
                'd-print-none',
                ['id' => 'region-main-settings-menu']
            ));
        }

        $header = new stdClass();
        $header->settingsmenu = $this->context_header_settings_menu();
        $header->contextheader = $this->context_header();
        $header->hasnavbar = empty($this->page->layout_options['nonavbar']);
        $header->navbar = $this->navbar();
        $header->pageheadingbutton = $this->page_heading_button();
        $header->courseheader = $this->course_header();
        $header->headeractions = $this->page->get_header_actions();

        if ($PAGE->pagelayout != 'admin') {
            $html .= $this->render_from_template('theme_baz/header', $header);
        }
        if ($PAGE->pagelayout == 'admin') {
            $html .= $this->render_from_template('theme_baz/header_admin', $header);
        }

        return $html;
    }


    /**
     * Wrapper for header elements.
     *
     * @return string HTML to display the main header.
     */
    public function full_header() {
        global $USER, $COURSE, $CFG, $PAGE;
        $theme = \theme_config::load('baz');
        $html = null;
        $pagetype = $this->page->pagetype;
        $homepage = get_home_page();
        $homepagetype = null;
        // Add a special case since /my/courses is a part of the /my subsystem.
        if ($homepage == HOMEPAGE_MY || $homepage == HOMEPAGE_MYCOURSES) {
            $homepagetype = 'my-index';
        } else if ($homepage == HOMEPAGE_SITE) {
            $homepagetype = 'site-index';
        }
        if (
            $this->page->include_region_main_settings_in_header_actions() &&
            !$this->page->blocks->is_block_present('settings')
        ) {
            // Only include the region main settings if the page has requested it and it doesn't already have
            // the settings block on it. The region main settings are included in the settings block and
            // duplicating the content causes behat failures.
            $this->page->add_header_action(html_writer::div(
                $this->region_main_settings_menu(),
                'd-print-none',
                ['id' => 'region-main-settings-menu']
            ));
        }

        $header = new stdClass();
        $header->settingsmenu = $this->context_header_settings_menu();
        $header->contextheader = $this->context_header();
        $header->hasnavbar = empty($this->page->layout_options['nonavbar']);
        $header->navbar = $this->navbar();
        $header->pageheadingbutton = $this->page_heading_button();
        $header->courseheader = $this->course_header();
        $header->headeractions = $this->page->get_header_actions();
        // if (!empty($pagetype) && !empty($homepagetype) && $pagetype == $homepagetype) {
        //     $header->welcomemessage = \core_user::welcome_message();
        // }

        $html .= html_writer::start_tag('div', array('class' => 'rui-course-header'));

        $html .= $this->courseprogress($this->page->course);

        if ($PAGE->theme->settings->cccteachers == 1) {
            $html .= $this->course_contacts();
        }
        $html .= $this->render_from_template('theme_baz/header', $header);
        if ($PAGE->theme->settings->ipcoursesummary == 1) {
            $html .= $this->course_summary();
        }
        $html .= html_writer::end_tag('div'); //rui-course-header

        return $html;
    }


    /**
     * Wrapper for header elements.
     *
     * @return string HTML to display the main header.
     */
    public function clean_header() {
        global $USER, $COURSE, $CFG, $PAGE;
        $theme = \theme_config::load('baz');
        $html = null;
        $pagetype = $this->page->pagetype;
        $homepage = get_home_page();
        $homepagetype = null;
        // Add a special case since /my/courses is a part of the /my subsystem.
        if ($homepage == HOMEPAGE_MY || $homepage == HOMEPAGE_MYCOURSES) {
            $homepagetype = 'my-index';
        } else if ($homepage == HOMEPAGE_SITE) {
            $homepagetype = 'site-index';
        }
        if (
            $this->page->include_region_main_settings_in_header_actions() &&
            !$this->page->blocks->is_block_present('settings')
        ) {
            // Only include the region main settings if the page has requested it and it doesn't already have
            // the settings block on it. The region main settings are included in the settings block and
            // duplicating the content causes behat failures.
            $this->page->add_header_action(html_writer::div(
                $this->region_main_settings_menu(),
                'd-print-none',
                ['id' => 'region-main-settings-menu']
            ));
        }

        $header = new stdClass();
        $header->settingsmenu = $this->context_header_settings_menu();
        $header->contextheader = $this->context_header();
        $header->hasnavbar = empty($this->page->layout_options['nonavbar']);
        $header->navbar = $this->navbar();
        $header->pageheadingbutton = $this->page_heading_button();
        $header->courseheader = $this->course_header();
        $header->headeractions = $this->page->get_header_actions();

        $html .= $this->render_from_template('theme_baz/header', $header);

        return $html;
    }


    /**
     * This is an optional menu that can be added to a layout by a theme. It contains the
     * menu for the course administration, only on the course main page.
     *
     * @return string
     */
    public function context_header_settings_menu() {
        $context = $this->page->context;
        $menu = new action_menu();

        $items = $this->page->navbar->get_items();
        $currentnode = end($items);

        $showcoursemenu = false;
        $showfrontpagemenu = false;
        $showusermenu = false;

        // We are on the course home page.
        if (($context->contextlevel == CONTEXT_COURSE) &&
            !empty($currentnode) &&
            ($currentnode->type == navigation_node::TYPE_COURSE || $currentnode->type == navigation_node::TYPE_SECTION)
        ) {
            $showcoursemenu = true;
        }

        $courseformat = course_get_format($this->page->course);
        // This is a single activity course format, always show the course menu on the activity main page.
        if (
            $context->contextlevel == CONTEXT_MODULE &&
            !$courseformat->has_view_page()
        ) {

            $this->page->navigation->initialise();
            $activenode = $this->page->navigation->find_active_node();
            // If the settings menu has been forced then show the menu.
            if ($this->page->is_settings_menu_forced()) {
                $showcoursemenu = true;
            } else if (!empty($activenode) && ($activenode->type == navigation_node::TYPE_ACTIVITY ||
                $activenode->type == navigation_node::TYPE_RESOURCE)) {

                // We only want to show the menu on the first page of the activity. This means
                // the breadcrumb has no additional nodes.
                if ($currentnode && ($currentnode->key == $activenode->key && $currentnode->type == $activenode->type)) {
                    $showcoursemenu = true;
                }
            }
        }

        // This is the site front page.
        if (
            $context->contextlevel == CONTEXT_COURSE &&
            !empty($currentnode) &&
            $currentnode->key === 'home'
        ) {
            $showfrontpagemenu = true;
        }

        // This is the user profile page.
        if (
            $context->contextlevel == CONTEXT_USER &&
            !empty($currentnode) &&
            ($currentnode->key === 'myprofile')
        ) {
            $showusermenu = true;
        }

        if ($showfrontpagemenu) {
            $settingsnode = $this->page->settingsnav->find('frontpage', navigation_node::TYPE_SETTING);
            if ($settingsnode) {
                // Build an action menu based on the visible nodes from this navigation tree.
                $skipped = $this->build_action_menu_from_navigation($menu, $settingsnode, false, true);

                // We only add a list to the full settings menu if we didn't include every node in the short menu.
                if ($skipped) {
                    $text = get_string('morenavigationlinks');
                    $url = new moodle_url('/course/admin.php', array('courseid' => $this->page->course->id));
                    $link = new action_link($url, $text, null, null, new pix_icon('t/edit', $text));
                    $menu->add_secondary_action($link);
                }
            }
        } else if ($showcoursemenu) {
            $settingsnode = $this->page->settingsnav->find('courseadmin', navigation_node::TYPE_COURSE);
            if ($settingsnode) {
                // Build an action menu based on the visible nodes from this navigation tree.
                $skipped = $this->build_action_menu_from_navigation($menu, $settingsnode, false, true);

                // We only add a list to the full settings menu if we didn't include every node in the short menu.
                if ($skipped) {
                    $text = get_string('morenavigationlinks');
                    $url = new moodle_url('/course/admin.php', array('courseid' => $this->page->course->id));
                    $link = new action_link($url, $text, null, null, new pix_icon('t/edit', $text));
                    $menu->add_secondary_action($link);
                }
            }
        } else if ($showusermenu) {
            // Get the course admin node from the settings navigation.
            $settingsnode = $this->page->settingsnav->find('useraccount', navigation_node::TYPE_CONTAINER);
            if ($settingsnode) {
                // Build an action menu based on the visible nodes from this navigation tree.
                $this->build_action_menu_from_navigation($menu, $settingsnode);
            }
        }

        return $this->render($menu);
    }

    public function ismenuactive($x) {
        $pageurl = $this->page->url;

        if (!empty($x)) {
            if (strpos($pageurl, strval($x)) != false) {
                return $class = 'active';
            } else {
                return $class = '';
            }
        } else {
            return $class = '';
        }
    }

    public function mainmenu() {
        global $CFG, $COURSE, $USER, $DB;
        $theme = \theme_config::load('baz');

        // Turn on/off menu items..
        $isitemonsitehome = false;
        $isitemondashboard = false;
        $isitemoncalendar = false;
        $isitemoncontentbank = false;
        $isitemonprivatefiles = false;
        $isitemonmycourses = false;
        $iscustomitem1on = false;
        $iscustomitem2on = false;
        $iscustomitem3on = false;
        $iscustomitem4on = false;
        $iscustomitem5on = false;

        $possitehome = null;
        $posdashboard = null;
        $posprivatefiles = null;
        $poscontentbank = null;
        $posmycourses = null;
        $poscalendar = null;

        $poscustomitem1 = '7';
        $labelcustomitem1 = '';
        $iconcustomitem1 = '';
        $urlcustomitem1 = '';

        $poscustomitem2 = '8';
        $labelcustomitem2 = '';
        $iconcustomitem2 = '';
        $urlcustomitem2 = '';

        $poscustomitem3 = '9';
        $labelcustomitem3 = '';
        $iconcustomitem3 = '';
        $urlcustomitem3 = '';

        $poscustomitem4 = '10';
        $labelcustomitem4 = '';
        $iconcustomitem4 = '';
        $urlcustomitem4 = '';

        $poscustomitem5 = '11';
        $labelcustomitem5 = '';
        $iconcustomitem5 = '';
        $urlcustomitem5 = '';

        if ($this->page->pagelayout == "mydashboard") {
            $isdashboardpage = 'active';
        } else {
            $isdashboardpage = '';
        }

        if (get_config('theme_baz', 'isitemonsitehome') == 1) {
            $isitemonsitehome = true;

            if (!empty(get_config('theme_baz', 'possitehome'))) {
                $possitehome = $theme->settings->possitehome;
            } else {
                $possitehome = '1';
            }
        }
        if (get_config('theme_baz', 'isitemondashboard') == 1) {
            $isitemondashboard = true;

            if (!empty(get_config('theme_baz', 'posdashboard'))) {
                $posdashboard = $theme->settings->posdashboard;
            } else {
                $posdashboard = '2';
            }
        }
        if (get_config('theme_baz', 'isitemoncalendar') == 1) {
            $isitemoncalendar = true;

            if (!empty(get_config('theme_baz', 'poscalendar'))) {
                $poscalendar = $theme->settings->poscalendar;
            } else {
                $poscalendar = '3';
            }
        }
        if (get_config('theme_baz', 'isitemoncontentbank') == 1) {
            $isitemoncontentbank = true;

            if (!empty(get_config('theme_baz', 'poscontentbank'))) {
                $poscontentbank = $theme->settings->poscontentbank;
            } else {
                $poscontentbank = '4';
            }
        }
        if (get_config('theme_baz', 'isitemonprivatefiles') == 1) {
            $isitemonprivatefiles = true;

            if (!empty(get_config('theme_baz', 'posprivatefiles'))) {
                $posprivatefiles = $theme->settings->posprivatefiles;
            } else {
                $posprivatefiles = '5';
            }
        }
        if (get_config('theme_baz', 'isitemonmycourses') == 1) {
            $isitemonmycourses = true;

            if (!empty(get_config('theme_baz', 'posmycourses'))) {
                $posmycourses = $theme->settings->posmycourses;
            } else {
                $posmycourses = '6';
            }
        }
        if (get_config('theme_baz', 'iscustomitem1on') == 1) {
            $iscustomitem1on = true;

            if (get_config('theme_baz', 'poscustomitem1') != null) {
                $poscustomitem1 = $theme->settings->poscustomitem1;
            }
            if (get_config('theme_baz', 'labelcustomitem1') != null) {
                $labelcustomitem1 = format_text(($theme->settings->labelcustomitem1), FORMAT_HTML, array('noclean' => true));
            }

            if (get_config('theme_baz', 'iconcustomitem1') != null) {
                $iconcustomitem1 = format_text(($theme->settings->iconcustomitem1),
                    FORMAT_HTML,
                    array('noclean' => true)
                );
            }

            if (get_config('theme_baz', 'urlcustomitem1') != null) {
                $urlcustomitem1 = $theme->settings->urlcustomitem1;
            }
        }

        if (get_config('theme_baz', 'iscustomitem2on') == 1) {
            $iscustomitem2on = true;

            if (get_config('theme_baz', 'poscustomitem2') != null) {
                $poscustomitem2 = $theme->settings->poscustomitem2;
            }
            if (get_config('theme_baz', 'labelcustomitem2') != null) {
                $labelcustomitem2 = format_text(($theme->settings->labelcustomitem2), FORMAT_HTML, array('noclean' => true));
            }

            if (get_config('theme_baz', 'iconcustomitem2') != null) {
                $iconcustomitem2 = format_text(($theme->settings->iconcustomitem2),
                    FORMAT_HTML,
                    array('noclean' => true)
                );
            }

            if (get_config('theme_baz', 'urlcustomitem2') != null) {
                $urlcustomitem2 = $theme->settings->urlcustomitem2;
            }
        }

        if (get_config('theme_baz', 'iscustomitem3on') == 1) {
            $iscustomitem3on = true;

            if (get_config('theme_baz', 'poscustomitem3') != null) {
                $poscustomitem3 = $theme->settings->poscustomitem3;
            }
            if (get_config('theme_baz', 'labelcustomitem3') != null) {
                $labelcustomitem3 = format_text(($theme->settings->labelcustomitem3), FORMAT_HTML, array('noclean' => true));
            }

            if (get_config('theme_baz', 'iconcustomitem3') != null) {
                $iconcustomitem3 = format_text(($theme->settings->iconcustomitem3),
                    FORMAT_HTML,
                    array('noclean' => true)
                );
            }

            if (get_config('theme_baz', 'urlcustomitem3') != null) {
                $urlcustomitem3 = $theme->settings->urlcustomitem3;
            }
        }

        if (get_config('theme_baz', 'iscustomitem4on') == 1) {
            $iscustomitem4on = true;

            if (get_config('theme_baz', 'poscustomitem4') != null) {
                $poscustomitem4 = $theme->settings->poscustomitem4;
            }
            if (get_config('theme_baz', 'labelcustomitem4') != null) {
                $labelcustomitem4 = format_text(($theme->settings->labelcustomitem4), FORMAT_HTML, array('noclean' => true));
            }

            if (get_config('theme_baz', 'iconcustomitem4') != null) {
                $iconcustomitem4 = format_text(($theme->settings->iconcustomitem4),
                    FORMAT_HTML,
                    array('noclean' => true)
                );
            }

            if (get_config('theme_baz', 'urlcustomitem4') != null) {
                $urlcustomitem4 = $theme->settings->urlcustomitem4;
            }
        }

        if (get_config('theme_baz', 'iscustomitem5on') == 1) {
            $iscustomitem5on = true;

            if (get_config('theme_baz', 'poscustomitem5') != null) {
                $poscustomitem5 = $theme->settings->poscustomitem5;
            }
            if (get_config('theme_baz', 'labelcustomitem5') != null) {
                $labelcustomitem5 = format_text(($theme->settings->labelcustomitem5), FORMAT_HTML, array('noclean' => true));
            }

            if (get_config('theme_baz', 'iconcustomitem5') != null) {
                $iconcustomitem5 = format_text(($theme->settings->iconcustomitem5),
                    FORMAT_HTML,
                    array('noclean' => true)
                );
            }

            if (get_config('theme_baz', 'urlcustomitem5') != null) {
                $urlcustomitem5 = $theme->settings->urlcustomitem5;
            }
        }

        if (
            $this->page->include_region_main_settings_in_header_actions() &&
            !$this->page->blocks->is_block_present('settings')
        ) {
            // Only include the region main settings if the page has requested it and it doesn't already have
            // the settings block on it. The region main settings are included in the settings block and
            // duplicating the content causes behat failures.
            $this->page->add_header_action(html_writer::div(
                $this->region_main_settings_menu(),
                'd-print-none',
                ['id' => 'region-main-settings-menu']
            ));
        }

        $header = new stdClass();

        $course = $this->page->course;
        $context = context_course::instance($course->id);

        if (is_role_switched($course->id)) { // Has switched roles.
            $rolename = '';
            $realuser = \core\session\manager::get_realuser();
            $fullname = fullname($realuser, true);
            if ($role = $DB->get_record('role', array('id' => $USER->access['rsw'][$context->path]))) {
                $rolename = ': ' . role_get_name($role, $context);
            }

            $loggedinas = get_string('loggedinas', 'moodle', $fullname) . $rolename;
        }
        if (\core\session\manager::is_loggedinas()) {
            $header->loginas = $this->login_info();
        }
        if (is_role_switched($course->id) && !\core\session\manager::is_loggedinas()) {
            $header->roleswitch = $loggedinas;
        }
        $hascontentbankpermission = has_capability('contenttype/h5p:access', $context);

        $calendarurl = new moodle_url('/calendar/view.php?view=month');
        $calendarurl = '';
        if (isset($COURSE->id) && $COURSE->id > 1 && isloggedin() && !isguestuser()) {
            $calendarurl = new moodle_url('/calendar/view.php?view=upcoming', array('course' => $this->page->course->id));
        } else {
            $calendarurl = new moodle_url('/calendar/view.php?view=month');
        }

        if (
            !empty($CFG->defaulthomepage) &&
            ($CFG->defaulthomepage == HOMEPAGE_MY || $CFG->defaulthomepage == HOMEPAGE_MYCOURSES)
        ) {
            // We need to stop automatic redirection.
            $sitehomeurl = new moodle_url('/?redirect=0');
        } else {
            $sitehomeurl = new moodle_url('/');
        }

        if ($this->page->pagetype == 'site-index') {
            $isfrontpage = 'active';
        } else {
            $isfrontpage = '';
        }

        // Header links on non course areas.
        if (isloggedin() && !isguestuser()) {

            $headerlinks = array(
                "0" => array(
                    'position' => $possitehome,
                    'status' => $isitemonsitehome && !isguestuser(),
                    'icon' => '<svg
                        width="20"
                        height="20"
                        fill="none"
                        viewBox="0 0 24 24">
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.5"
                            d="M6.75024 19.2502H17.2502C18.3548 19.2502 19.2502
                            18.3548 19.2502 17.2502V9.75025L12.0002
                            4.75024L4.75024 9.75025V17.2502C4.75024 18.3548
                            5.64568 19.2502 6.75024 19.2502Z"></path>
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M9.74963 15.7493C9.74963 14.6447 10.6451
                                13.7493 11.7496 13.7493H12.2496C13.3542 13.7493
                                14.2496 14.6447 14.2496
                                15.7493V19.2493H9.74963V15.7493Z"></path></svg>',
                    'title' => get_string('sitehome', 'moodle'),
                    'url' => $sitehomeurl,
                    'isactiveitem' => $isfrontpage,
                    'itemid' => 'itemHome',
                ),
                "1" => array(
                    'position' => $posdashboard,
                    'status' => $isitemondashboard &&
                        !isguestuser() &&
                        $CFG->enabledashboard,
                    'icon' => '<svg width="20"
                                height="20"
                                fill="none"
                                viewBox="0 0 24 24">
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M4.75 6.75C4.75 5.64543 5.64543 4.75 6.75
                                    4.75H17.25C18.3546 4.75 19.25 5.64543 19.25
                                    6.75V17.25C19.25 18.3546 18.3546 19.25
                                    17.25 19.25H6.75C5.64543 19.25 4.75 18.3546
                                    4.75 17.25V6.75Z"></path>
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M9.75 8.75V19"></path>
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M5 8.25H19"></path>
                                </svg>
                                ',
                    'title' => get_string('myhome', 'moodle'),
                    'url' => new moodle_url('/my/'),
                    'isactiveitem' => $isdashboardpage,
                    'itemid' => 'itemDashboard',
                ),
                "2" => array(
                    'position' => $posprivatefiles,
                    'status' => $isitemonprivatefiles && !isguestuser(),
                    'icon' => '<svg width="20" height="20" fill="none" viewBox="0 0 24 24">
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M19.25 11.75L17.6644 6.20056C17.4191 5.34195 16.6344
                                    4.75 15.7414 4.75H8.2586C7.36564 4.75 6.58087
                                    5.34196 6.33555 6.20056L4.75 11.75"></path>
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M10.2142 12.3689C9.95611 12.0327 9.59467
                                    11.75 9.17085 11.75H4.75V17.25C4.75 18.3546
                                    5.64543 19.25 6.75 19.25H17.25C18.3546 19.25
                                    19.25 18.3546 19.25 17.25V11.75H14.8291C14.4053
                                    11.75 14.0439 12.0327 13.7858 12.3689C13.3745
                                    12.9046 12.7276 13.25 12 13.25C11.2724 13.25
                                    10.6255 12.9046 10.2142 12.3689Z"></path>
                                </svg>
                                ',
                    'title' => get_string('privatefiles', 'moodle'),
                    'url' => new moodle_url('/user/files.php'),
                    'isactiveitem' => $this->ismenuactive('/user/files'),
                    'itemid' => 'itemFiles',
                ),
                "3" => array(
                    'position' => $poscalendar,
                    'status' => $isitemoncalendar && !isguestuser(),
                    'icon' => '<svg width="20" height="20" fill="none" viewBox="0 0 24 24">
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M4.75 8.75C4.75 7.64543 5.64543 6.75 6.75
                                    6.75H17.25C18.3546 6.75 19.25 7.64543 19.25
                                    8.75V17.25C19.25 18.3546 18.3546 19.25 17.25
                                    19.25H6.75C5.64543 19.25 4.75 18.3546 4.75 17.25V8.75Z"></path>
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M8 4.75V8.25"></path>
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M16 4.75V8.25"></path>
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M7.75 10.75H16.25"></path>
                                </svg>
                                ',
                    'title' => get_string('calendar', 'calendar'),
                    'url' => $calendarurl,
                    'isactiveitem' => $this->ismenuactive('/calendar'),
                    'itemid' => 'itemCalendar',
                ),
                "4" => array(
                    'position' => $poscontentbank,
                    'status' => $isitemoncontentbank && $hascontentbankpermission,
                    'icon' => '<svg width="20" height="20" fill="none" viewBox="0 0 24 24">
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M19.25 17.25V9.75C19.25 8.64543 18.3546
                                    7.75 17.25 7.75H4.75V17.25C4.75 18.3546
                                    5.64543 19.25 6.75 19.25H17.25C18.3546
                                    19.25 19.25 18.3546 19.25 17.25Z"></path>
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M13.5 7.5L12.5685 5.7923C12.2181 5.14977
                                    11.5446 4.75 10.8127 4.75H6.75C5.64543 4.75
                                    4.75 5.64543 4.75 6.75V11"></path>
                                </svg>
                                ',
                    'title' => get_string('contentbank', 'moodle'),
                    'url' => new moodle_url('/contentbank/index.php', array('contextid' => $context->id)),
                    'isactiveitem' => $this->ismenuactive('/contentbank'),
                    'itemid' => 'itemContentBank',
                ),
                "5" => array(
                    'position' => $posmycourses,
                    'status' => $isitemonmycourses && !isguestuser(),
                    'icon' => '<svg width="20" height="20" fill="none"
                        viewBox="0 0 24 24">
                    <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.5"
                        d="M19.25 5.75C19.25 5.19772 18.8023 4.75 18.25
                        4.75H14C12.8954 4.75 12 5.64543 12 6.75V19.25L12.8284
                        18.4216C13.5786 17.6714 14.596 17.25 15.6569
                        17.25H18.25C18.8023 17.25 19.25 16.8023 19.25
                        16.25V5.75Z"></path>
                    <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.5"
                        d="M4.75 5.75C4.75 5.19772 5.19772 4.75 5.75
                        4.75H10C11.1046 4.75 12 5.64543 12 6.75V19.25L11.1716
                        18.4216C10.4214 17.6714 9.40401 17.25 8.34315
                        17.25H5.75C5.19772 17.25 4.75 16.8023 4.75
                        16.25V5.75Z"></path>
                    </svg>
                    ',
                    'title' => get_string('mycourses', 'moodle'),
                    'url' => new moodle_url('/my/courses.php'),
                    'isactiveitem' => $this->isMenuActive('/my/courses.php'),
                    'itemid' => 'itemMyCourses',
                ),
                "6" => array(
                    'position' => $poscustomitem1,
                    'status' => $iscustomitem1on,
                    'icon' => $iconcustomitem1,
                    'title' => $labelcustomitem1,
                    'url' => new moodle_url($urlcustomitem1),
                    'isactiveitem' => $this->ismenuactive($urlcustomitem1),
                    'itemid' => 'itemCustomItem1',
                ),
                "7" => array(
                    'position' => $poscustomitem2,
                    'status' => $iscustomitem2on,
                    'icon' => $iconcustomitem2,
                    'title' => $labelcustomitem2,
                    'url' => new moodle_url($urlcustomitem2),
                    'isactiveitem' => $this->ismenuactive($urlcustomitem2),
                    'itemid' => 'itemCustomItem2',
                ),
                "8" => array(
                    'position' => $poscustomitem3,
                    'status' => $iscustomitem3on,
                    'icon' => $iconcustomitem3,
                    'title' => $labelcustomitem3,
                    'url' => new moodle_url($urlcustomitem3),
                    'isactiveitem' => $this->ismenuactive($urlcustomitem3),
                    'itemid' => 'itemCustomItem3',
                ),
                "9" => array(
                    'position' => $poscustomitem4,
                    'status' => $iscustomitem4on,
                    'icon' => $iconcustomitem4,
                    'title' => $labelcustomitem4,
                    'url' => new moodle_url($urlcustomitem4),
                    'isactiveitem' => $this->ismenuactive($urlcustomitem4),
                    'itemid' => 'itemCustomItem4',
                ),
                "10" => array(
                    'position' => $poscustomitem5,
                    'status' => $iscustomitem5on,
                    'icon' => $iconcustomitem5,
                    'title' => $labelcustomitem5,
                    'url' => new moodle_url($urlcustomitem5),
                    'isactiveitem' => $this->ismenuactive($urlcustomitem5),
                    'itemid' => 'itemCustomItem5',
                ),
            );

            $items = count($headerlinks);

            usort($headerlinks, function ($a, $b) {
                return $a['position'] - $b['position'];
            });

            $html = '';

            for ($i = 0; $i < $items; $i++) {
                if ($headerlinks[$i]['status'] == true) {
                    $html .= '<li class="rui-sidebar-nav-item">
                    <a href="' . $headerlinks[$i]['url'] .
                        '" id="' .
                        $headerlinks[$i]['itemid'] .
                        '" class="rui-sidebar-nav-item-link ' .
                        $headerlinks[$i]['isactiveitem'] .
                        '">
                        <span class="rui-sidebar-nav-icon">' .
                        $headerlinks[$i]['icon'] .
                        '</span>
                        <span class="rui-sidebar-nav-text">' .
                        $headerlinks[$i]['title'] .
                        '</span>
                    </a>
                    </li>';
                }
            }

            return $html;
        }
    }


    public function adminheaderlink() {
        global $PAGE, $COURSE, $CFG, $USER, $OUTPUT;

        $course = $this->page->course;
        $context = context_course::instance($course->id);
        $hasadminlink = has_capability('moodle/site:configview', $context);

        if (is_siteadmin() || $hasadminlink) {
            $adminlinktitle = get_string('administrationsite', 'moodle');
            $adminlinkurl = new moodle_url('/admin/search.php');

            // Send to template
            $adminlinkheaderlinktmpl = [
                'admintitle' => $adminlinktitle,
                'adminurl' => $adminlinkurl
            ];

            return $this->render_from_template('theme_baz/btn-admin', $adminlinkheaderlinktmpl);
        }
    }


    // My Course Menu - Inspred by Fordson Theme
    public function baz_allcourseslink() {
        global $CFG;
        $allcourseicon = '<svg width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.75 6.75L19.25 12L13.75 17.25"></path><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 12H4.75"></path></svg>';
        //$allcoursetxt = theme_baz_get_setting('stringallcourses');
        $allcoursetxt = format_text(theme_baz_get_setting('stringallcourses'), FORMAT_HTML, array('noclean' => true));

        if (!empty($allcoursetxt)) {
            $allcourses = "<a class=\"rui-course-menu-list--more justify-content-between w-100\" href=\"$CFG->wwwroot/course/index.php\">" . $allcoursetxt . $allcourseicon . '</a>';
        } else {
            $allcourses = '';
        }

        return $allcourses;
    }

    public function baz_mycourses_heading() {
        global $CFG;
        $url = new moodle_url('/my/courses.php');
        $allcourseicon = '<svg width="24" height="24" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13V15"></path>
        <circle cx="12" cy="9" r="1" fill="currentColor"></circle>
        <circle cx="12" cy="12" r="7.25" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></circle>
      </svg>';

        $html = '<h5 class="rui-course-menu-h"><a class="rui-course-menu-h-l" href="' . $url . '">' . get_string('mycourses', 'moodle') . $allcourseicon . '</a></h5>';
        return $html;
    }



    public function baz_mycourses() {
        global $DB, $USER;


        //$branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort, $branchactive);

        $courses = enrol_get_my_courses(null, 'fullname ASC'); // more info about sorting etc. -> lib/enrollib.php
        //$nomycoursestxt = theme_baz_get_setting('stringnocourses');
        $nomycoursestxt = format_text(theme_baz_get_setting('stringnocourses'), FORMAT_HTML, array('noclean' => true));

        $nomycourses = '<div class="alert alert-info alert-block m-0">' . $nomycoursestxt . '</div>';
        if ($courses) {

            // Determine if we need to query the enrolment and user enrolment tables.
            $enrolquery = false;
            foreach ($courses as $course) {
                if (empty($course->timeaccess)) {
                    $enrolquery = true;
                    break;
                }
            }
            if ($enrolquery) {
                $params = array(
                    'userid' => $USER->id
                );
                $sql = "SELECT ue.id, e.courseid, ue.timestart
                    FROM {enrol} e
                    JOIN {user_enrolments} ue ON (ue.enrolid = e.id AND ue.userid = :userid)";

                $enrolments = $DB->get_records_sql($sql, $params, 0, 0);

                if ($enrolments) {
                    // Sort out any multiple enrolments on the same course.
                    $userenrolments = array();
                    foreach ($enrolments as $enrolment) {
                        if (!empty($userenrolments[$enrolment->courseid])) {
                            if ($userenrolments[$enrolment->courseid] < $enrolment->timestart) {
                                // Replace.
                                $userenrolments[$enrolment->courseid] = $enrolment->timestart;
                            }
                        } else {
                            $userenrolments[$enrolment->courseid] = $enrolment->timestart;
                        }
                    }

                    // We don't need to worry about timeend etc. as our course list will be valid for the user from above.
                    foreach ($courses as $course) {
                        if (empty($course->timeaccess)) {
                            $course->timestart = $userenrolments[$course->id];
                        }
                    }
                }
            }
        } else {
            return $nomycourses;
        }

        $content = '';
        foreach ($courses as $course) {
            if ($course->visible) {
                $url = new moodle_url('/course/view.php?id=' . $course->id);
                $name = '<span class="rui-course-menu-list-text">' . format_string($course->fullname) . '</span>';
                $shortname = format_string($course->shortname);
                $checkactive = $this->isMenuActive('/course/view.php?id=' . $course->id);
                $isactive = '';
                $icon = '<div class="mr-2"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.25 15.25V5.75C19.25 5.19772 18.8023 4.75 18.25 4.75H6.75C5.64543 4.75 4.75 5.64543 4.75 6.75V16.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M19.25 15.25H6.75C5.64543 15.25 4.75 16.1454 4.75 17.25C4.75 18.3546 5.64543 19.25 6.75 19.25H19.25V15.25Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg></div>';
                if ($checkactive == true) {
                    $isactive .= format_string("active");
                }
                $content .= '<li class="rui-course-menu-list"><a href="' . $url . '" class="rui-course-menu-list-item ' . $isactive . '" title="' . $shortname . '">' . $icon . $name  . '</a></li>';
                //$branch->add(format_string($course->fullname), new moodle_url('/course/view.php?id=' . $course->id) , format_string($course->shortname));
            }
        }

        return '<ul class="rui-course-menu">' . $content . '</ul>';
    }

    // Course Menu
    public function baz_thiscourse_menu() {
        global $CFG, $COURSE, $PAGE, $OUTPUT;
        $context = $this->page->context;
        $menu = new custom_menu();

        $branchtitle = get_string('thiscourse', 'theme_baz');
        $branchlabel = '';
        $branchurl = new moodle_url('/my/index.php');
        $branchsort = 10000;
        $thisbranchtitle = get_string('thiscourse', 'theme_baz');


        if (isloggedin() && !isguestuser()) {

            $sections = $this->generate_sections_and_activities($COURSE);
            if ($sections && $COURSE->id > 1) {
                $branchlabel = $thisbranchtitle;
                $branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
                $course = course_get_format($COURSE)->get_course();
                $coursehomelabel = $course->fullname;
                $coursehomeurl = new moodle_url('/course/view.php?', array(
                    'id' => $PAGE->course->id
                ));
                $coursehometitle = $coursehomelabel;
                $branch->add($coursehomelabel, $coursehomeurl, $coursehometitle);

                foreach ($sections[0] as $sectionid => $section) {
                    $sectionname = get_section_name($COURSE, $section);
                    if (isset($course->coursedisplay) && $course->coursedisplay == COURSE_DISPLAY_MULTIPAGE) {
                        $sectionurl = '/course/view.php?id=' . $COURSE->id . '&section=' . $sectionid;
                    } else {
                        $sectionurl = '/course/view.php?id=' . $COURSE->id . '#section-' . $sectionid;
                    }
                    $branch->add(format_string($sectionname), new moodle_url($sectionurl), format_string($sectionname));
                }
            }
        }
        $content = '';
        foreach ($menu->get_children() as $item) {
            $context = $item->export_for_template($this);
            $content .= $this->render_from_template('theme_baz/nav-mycourses', $context);
        }
        return $content;
    }

    /**
     * Renders the context header for the page.
     *
     * @param array $headerinfo Heading information.
     * @param int $headinglevel What 'h' level to make the heading.
     * @return string A rendered context header.
     */
    public function context_header($headerinfo = null, $headinglevel = 1): string {
        global $DB, $USER, $CFG, $SITE;
        require_once($CFG->dirroot . '/user/lib.php');
        $context = $this->page->context;
        $heading = null;
        $imagedata = null;
        $subheader = null;
        $userbuttons = null;

        // Make sure to use the heading if it has been set.
        if (isset($headerinfo['heading'])) {
            $heading = $headerinfo['heading'];
        } else {
            $heading = $this->page->heading;
        }

        // The user context currently has images and buttons. Other contexts may follow.
        if ((isset($headerinfo['user']) || $context->contextlevel == CONTEXT_USER) &&
            $this->page->pagetype !== 'my-index'
        ) {
            if (isset($headerinfo['user'])) {
                $user = $headerinfo['user'];
            } else {
                // Look up the user information if it is not supplied.
                $user = $DB->get_record('user', array('id' => $context->instanceid));
            }

            // If the user context is set, then use that for capability checks.
            if (isset($headerinfo['usercontext'])) {
                $context = $headerinfo['usercontext'];
            }

            // Only provide user information if the user is the current user, or a user which the current user can view.
            // When checking user_can_view_profile(), either:
            // If the page context is course, check the course context (from the page object) or;
            // If page context is NOT course, then check across all courses.
            $course = ($this->page->context->contextlevel == CONTEXT_COURSE) ? $this->page->course : null;

            if (user_can_view_profile($user, $course)) {
                // Use the user's full name if the heading isn't set.
                if (empty($heading)) {
                    $heading = fullname($user);
                }

                $imagedata = $this->user_picture($user, array('size' => 100));

                // Check to see if we should be displaying a message button.
                if (!empty($CFG->messaging) && has_capability('moodle/site:sendmessage', $context)) {
                    $userbuttons = array(
                        'messages' => array(
                            'buttontype' => 'message',
                            'title' => get_string('message', 'message'),
                            'url' => new moodle_url('/message/index.php', array('id' => $user->id)),
                            'image' => 'message',
                            'linkattributes' => \core_message\helper::messageuser_link_params($user->id),
                            'page' => $this->page
                        )
                    );

                    if ($USER->id != $user->id) {
                        $iscontact = \core_message\api::is_contact($USER->id, $user->id);
                        $contacttitle = $iscontact ? 'removefromyourcontacts' : 'addtoyourcontacts';
                        $contacturlaction = $iscontact ? 'removecontact' : 'addcontact';
                        $contactimage = $iscontact ? 'removecontact' : 'addcontact';
                        $userbuttons['togglecontact'] = array(
                            'buttontype' => 'togglecontact',
                            'title' => get_string($contacttitle, 'message'),
                            'url' => new moodle_url(
                                '/message/index.php',
                                array(
                                    'user1' => $USER->id,
                                    'user2' => $user->id,
                                    $contacturlaction => $user->id,
                                    'sesskey' => sesskey()
                                )
                            ),
                            'image' => $contactimage,
                            'linkattributes' => \core_message\helper::togglecontact_link_params($user, $iscontact),
                            'page' => $this->page
                        );
                    }

                    $this->page->requires->string_for_js('changesmadereallygoaway', 'moodle');
                }
            } else {
                $heading = null;
            }
        }

        $prefix = null;
        if ($context->contextlevel == CONTEXT_MODULE) {
            if ($this->page->course->format === 'singleactivity') {
                $heading = $this->page->course->fullname;
            } else {
                $heading = $this->page->cm->get_formatted_name();
                $imagedata = $this->pix_icon('monologo', '', $this->page->activityname, ['class' => 'activityicon']);
                $purposeclass = plugin_supports('mod', $this->page->activityname, FEATURE_MOD_PURPOSE);
                $purposeclass .= ' activityiconcontainer';
                $purposeclass .= ' modicon_' . $this->page->activityname;
                $imagedata = html_writer::tag('div', $imagedata, ['class' => $purposeclass]);
                $prefix = get_string('modulename', $this->page->activityname);
            }
        }
        $contextheader = new \context_header($heading, $headinglevel, $imagedata, $userbuttons, $prefix);
        return $this->render_context_header($contextheader);
    }

    /**
     * Renders the header bar.
     *
     * @param context_header $contextheader Header bar object.
     * @return string HTML for the header bar.
     */
    protected function render_context_header(context_header $contextheader) {
        $heading = null;
        $imagedata = null;
        $html = null;

        // Generate the heading first and before everything else as we might have to do an early return.
        if (!isset($contextheader->heading)) {
            $heading = $this->heading($this->page->heading, $contextheader->headinglevel);
        } else {
            $heading = $this->heading($contextheader->heading, $contextheader->headinglevel);
        }

        $showheader = empty($this->page->layout_options['nocontextheader']);
        if (!$showheader) {
            return '';
        }

        if (isset($contextheader->imagedata)) {
            $html .= html_writer::start_div('page-context-header page-content-header--img flex-wrap');
            // Header specific image.
            $html .= html_writer::div($contextheader->imagedata, 'page-header-image');
        }

        // Headings.
        if (!isset($contextheader->heading)) {
            $html .= html_writer::tag('h3', $heading, array('class' => 'rui-page-title rui-page-title--page'));
        } else if (isset($contextheader->imagedata)) {
            $html .= html_writer::tag('div', $this->heading($contextheader->heading, 4), array('class' => 'rui-page-title rui-page-title--icon'));
        } else {
            $html .= html_writer::tag('h2', $contextheader->heading, array('class' => 'rui-page-title rui-page-title--context'));
        }

        // Buttons.
        if (isset($contextheader->additionalbuttons)) {
            $html .= html_writer::start_div('header-button-group mt-2 mt-md-0 ml-md-2');
            foreach ($contextheader->additionalbuttons as $button) {
                if (!isset($button->page)) {
                    // Include js for messaging.
                    if ($button['buttontype'] === 'togglecontact') {
                        \core_message\helper::togglecontact_requirejs();
                    }
                    if ($button['buttontype'] === 'message') {
                        \core_message\helper::messageuser_requirejs();
                    }
                    $image = $this->pix_icon($button['formattedimage'], $button['title'], 'moodle', array(
                        'class' => 'iconsmall',
                        'role' => 'presentation'
                    ));
                    $image .= html_writer::span($button['title'], 'header-button-title ml-2');
                } else {
                    $image = html_writer::empty_tag('img', array(
                        'src' => $button['formattedimage'],
                        'role' => 'presentation'
                    ));
                }
                $html .= html_writer::link($button['url'], html_writer::tag('span', $image), $button['linkattributes']);
            }
            $html .= html_writer::end_div();
        }

        if (isset($contextheader->imagedata)) {
            $html .= html_writer::end_div();
        }
        return $html;
    }

    /**
     * Construct a user menu, returning HTML that can be echoed out by a
     * layout file.
     *
     * @param stdClass $user A user object, usually $USER.
     * @param bool $withlinks true if a dropdown should be built.
     * @return string HTML fragment.
     */
    public function user_menu($user = null, $withlinks = null) {
        global $USER, $CFG;
        require_once($CFG->dirroot . '/user/lib.php');

        if (is_null($user)) {
            $user = $USER;
        }

        // Note: this behaviour is intended to match that of core_renderer::login_info,
        // but should not be considered to be good practice; layout options are
        // intended to be theme-specific. Please don't copy this snippet anywhere else.
        if (is_null($withlinks)) {
            $withlinks = empty($this->page->layout_options['nologinlinks']);
        }

        // Add a class for when $withlinks is false.
        $usermenuclasses = 'usermenu';
        if (!$withlinks) {
            $usermenuclasses .= ' withoutlinks';
        }

        $returnstr = "";

        // If during initial install, return the empty return string.
        if (during_initial_install()) {
            return $returnstr;
        }

        $loginpage = $this->is_login_page();
        $loginurl = get_login_url();
        // If not logged in, show the typical not-logged-in string.
        if (!isloggedin()) {
            if (!$loginpage) {
                $returnstr .= "<a class=\"rui-topbar-btn rui-login-btn ml-1\" href=\"$loginurl\"><span class=\"rui-login-btn-txt\">" .
                    get_string('login') .
                    '</span>
                <svg class="ml-2" width="20" height="20" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9.75 8.75L13.25 12L9.75 15.25"></path>
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9.75 4.75H17.25C18.3546 4.75 19.25 5.64543 19.25 6.75V17.25C19.25 18.3546 18.3546 19.25 17.25 19.25H9.75">
                </path>
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 12H4.75"></path>
                </svg></a>';
            }
            return html_writer::div(
                html_writer::span(
                    $returnstr,
                    'login'
                ),
                $usermenuclasses
            );
        }

        // If logged in as a guest user, show a string to that effect.
        if (isguestuser()) {
            $icon = '<svg class="mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 12C10 12.5523 9.55228 13 9 13C8.44772 13 8 12.5523 8 12C8 11.4477 8.44772 11 9 11C9.55228 11 10 11.4477 10 12Z" fill="currentColor" /><path d="M15 13C15.5523 13 16 12.5523 16 12C16 11.4477 15.5523 11 15 11C14.4477 11 14 11.4477 14 12C14 12.5523 14.4477 13 15 13Z" fill="currentColor" /><path fill-rule="evenodd" clip-rule="evenodd" d="M12.0244 2.00003L12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.74235 17.9425 2.43237 12.788 2.03059L12.7886 2.0282C12.5329 2.00891 12.278 1.99961 12.0244 2.00003ZM12 20C16.4183 20 20 16.4183 20 12C20 11.3014 19.9105 10.6237 19.7422 9.97775C16.1597 10.2313 12.7359 8.52461 10.7605 5.60246C9.31322 7.07886 7.2982 7.99666 5.06879 8.00253C4.38902 9.17866 4 10.5439 4 12C4 16.4183 7.58172 20 12 20ZM11.9785 4.00003L12.0236 4.00003L12 4L11.9785 4.00003Z" fill="currentColor" /></svg>';
            $returnstr = '<div class="rui-badge-guest">' . $icon . get_string('loggedinasguest') . '</div>';
            if (!$loginpage && $withlinks) {
                $returnstr .= "<a class=\"rui-login-btn\" href=\"$loginurl\"><span class=\"rui-login-btn-txt\">" . get_string('login') . '</span><svg class="ml-2" width="20" height="20" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 8.75L13.25 12L9.75 15.25"></path><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 4.75H17.25C18.3546 4.75 19.25 5.64543 19.25 6.75V17.25C19.25 18.3546 18.3546 19.25 17.25 19.25H9.75"></path><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 12H4.75"></path></svg></a>';
            }

            return html_writer::div(
                html_writer::span(
                    $returnstr,
                    'login'
                ),
                $usermenuclasses
            );
        }

        // Get some navigation opts.
        $opts = user_get_user_navigation_info($user, $this->page, array('avatarsize' => 56));

        $avatarclasses = "avatars";
        $avatarcontents = html_writer::span($opts->metadata['useravatar'], 'avatar current');
        $usertextcontents = '<span class="rui-fullname">' . $opts->metadata['userfullname'] . '</span>';
        $usertextmail = $user->email;
        $usernick = '<svg class="mr-2" width="18" height="18" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13V15"></path>
        <circle cx="12" cy="9" r="1" fill="currentColor"></circle>
        <circle cx="12" cy="12" r="7.25" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></circle>
        </svg>' . $user->username;

        // Other user.
        $usermeta = '';
        if (!empty($opts->metadata['asotheruser'])) {
            $avatarcontents .= html_writer::span(
                $opts->metadata['realuseravatar'],
                'avatar realuser'
            );
            $usermeta .= $opts->metadata['realuserfullname'];
            $usermeta .= html_writer::tag(
                'span',
                get_string(
                    'loggedinas',
                    'moodle',
                    html_writer::span(
                        $opts->metadata['userfullname'],
                        'value'
                    )
                ),
                array('class' => 'meta viewingas')
            );
        }

        // Role.
        if (!empty($opts->metadata['asotherrole'])) {
            $role = core_text::strtolower(preg_replace('#[ ]+#', '-', trim($opts->metadata['rolename'])));
            $usermeta .= html_writer::span(
                $opts->metadata['rolename'],
                'meta role role-' . $role
            );
        }

        // User login failures.
        if (!empty($opts->metadata['userloginfail'])) {
            $usermeta .= html_writer::div(
                '<svg class="mr-1"
                    width="16"
                    height="16"
                    fill="none"
                    viewBox="0 0 24 24">
                    <path stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.5"
                        d="M4.9522 16.3536L10.2152 5.85658C10.9531 4.38481
                        13.0539 4.3852 13.7913 5.85723L19.0495 16.3543C19.7156
                        17.6841 18.7487 19.25 17.2613 19.25H6.74007C5.25234
                        19.25 4.2854 17.6835 4.9522 16.3536Z"></path>
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 10V12"></path>
                            <circle cx="12" cy="16" r="1" fill="currentColor">
                            </circle></svg>' .  $opts->metadata['userloginfail'],
                'meta loginfailures'
            );
        }

        // MNet.
        if (!empty($opts->metadata['asmnetuser'])) {
            $mnet = strtolower(preg_replace('#[ ]+#', '-', trim($opts->metadata['mnetidprovidername'])));
            $usermeta .= html_writer::span(
                $opts->metadata['mnetidprovidername'],
                'meta mnet mnet-' . $mnet
            );
        }

        $returnstr .= html_writer::span(
            html_writer::span($avatarcontents, $avatarclasses),
            'userbutton'
        );

        // Create a divider (well, a filler).
        $divider = new action_menu_filler();
        $divider->primary = false;

        $am = new action_menu();
        $am->set_menu_trigger(
            $returnstr
        );
        $am->set_action_label(get_string('usermenu'));
        $am->set_nowrap_on_items();

        $theme = theme_config::load('baz');
        $turnoffdashboardlink = $theme->settings->turnoffdashboardlink;

        if ($CFG->enabledashboard && $turnoffdashboardlink == 0) {
            $dashboardlink = '<div class="dropdown-item-wrapper"><a class="dropdown-item" href="' .
                new moodle_url('/my/') .
                '" data-identifier="dashboard,moodle" title="dashboard,moodle">' .
                get_string('myhome', 'moodle') .
                '</a></div>';
        } else {
            $dashboardlink = null;
        }

        $am->add(
            '<div class="dropdown-user-wrapper"><div class="dropdown-user">' . $usertextcontents  . '</div>'
                . '<div class="dropdown-user-mail text-truncate" title="' . $usertextmail . '">' . $usertextmail . '</div>'
                . '<span class="dropdown-user-nick badge badge-sm badge-info">' . $usernick . '</span>'
                . '<div class="dropdown-user-meta">' . $usermeta . '</div>'
                . '</div><div class="dropdown-divider dropdown-divider-user"></div>' . $dashboardlink
        );

        if ($withlinks) {
            $navitemcount = count($opts->navitems);
            $idx = 0;
            foreach ($opts->navitems as $key => $value) {

                switch ($value->itemtype) {
                    case 'divider':
                        // If the nav item is a divider, add one and skip link processing.
                        $am->add($divider);
                        break;

                    case 'invalid':
                        // Silently skip invalid entries (should we post a notification?).
                        break;

                    case 'link':
                        $al = '<a class="dropdown-item" href="' .
                            $value->url .
                            '" data-identifier="' .
                            $value->titleidentifier .
                            '" title="' .
                            $value->titleidentifier .
                            '">' .
                            $value->title . '</a>';
                        $am->add($al);
                        break;
                }

                $idx++;

                // Add dividers after the first item and before the last item.
                if ($idx == 1 || $idx == $navitemcount - 1) {
                    $am->add($divider);
                }
            }
        }

        return html_writer::div(
            $this->render($am),
            $usermenuclasses
        );
    }


    /**
     * Returns standard main content placeholder.
     * Designed to be called in theme layout.php files.
     *
     * @return string HTML fragment.
     */
    public function main_content() {
        // This is here because it is the only place we can inject the "main" role over the entire main content area
        // without requiring all theme's to manually do it, and without creating yet another thing people need to
        // remember in the theme.
        // This is an unfortunate hack. DO NO EVER add anything more here.
        // DO NOT add classes.
        // DO NOT add an id.
        return '<div class="main-content" role="main">' . $this->unique_main_content_token . '</div>';
    }

    /**
     * Outputs a heading
     *
     * @param string $text The text of the heading
     * @param int $level The level of importance of the heading. Defaulting to 2
     * @param string $classes A space-separated list of CSS classes. Defaulting to null
     * @param string $id An optional ID
     * @return string the HTML to output.
     */
    public function heading($text, $level = 2, $classes = null, $id = null) {
        $level = (int) $level;
        if ($level < 1 || $level > 6) {
            throw new coding_exception('Heading level must be an integer between 1 and 6.');
        }
        return html_writer::tag('div', html_writer::tag('h' . $level, $text, array('id' => $id, 'class' => renderer_base::prepare_classes($classes) . ' rui-main-content-title rui-main-content-title--h' . $level)), array('class' => 'rui-title-container'));
    }

    public function headingwithavatar($text, $level = 2, $classes = null, $id = null) {
        $level = (int) $level;
        if ($level < 1 || $level > 6) {
            throw new coding_exception('Heading level must be an integer between 1 and 6.');
        }
        return html_writer::tag('div', html_writer::tag('h' . $level, $text, array('id' => $id, 'class' => renderer_base::prepare_classes($classes) . ' rui-main-content-title-with-avatar')), array('class' => 'rui-title-container-with-avatar'));
    }

    /**
     * Renders the login form.
     *
     * @param \core_auth\output\login $form The renderable.
     * @return string
     */
    public function render_login(\core_auth\output\login $form) {
        global $CFG, $SITE;

        $context = $form->export_for_template($this);

        // Override because rendering is not supported in template yet.
        if ($CFG->rememberusername == 0) {
            $context->cookieshelpiconformatted = $this->help_icon('cookiesenabledonlysession');
        } else {
            $context->cookieshelpiconformatted = $this->help_icon('cookiesenabled');
        }
        $context->errorformatted = $this->error_text($context->error);
        $url = $this->get_logo_url();
        if ($url) {
            $url = $url->out(false);
        }
        $context->logourl = $url;
        $context->sitename = format_string(
            $SITE->fullname,
            true,
            ['context' => context_course::instance(SITEID), "escape" => false]
        );

        if ($this->page->theme->settings->setloginlayout == 1) {
            $context->loginlayout1 = 1;
        } else if ($this->page->theme->settings->setloginlayout == 2) {
            $context->loginlayout2 = 1;
            if (isset($this->page->theme->settings->loginbg)) {
                $context->loginlayoutimg = 1;
            }
        } else if ($this->page->theme->settings->setloginlayout == 3) {
            $context->loginlayout3 = 1;
            if (isset($this->page->theme->settings->loginbg)) {
                $context->loginlayoutimg = 1;
            }
        } else if ($this->page->theme->settings->setloginlayout == 4) {
            $context->loginlayout4 = 1;
        } else if ($this->page->theme->settings->setloginlayout == 5) {
            $context->loginlayout5 = 1;
        }

        if (isset($this->page->theme->settings->loginlogooutside)) {
            $context->loginlogooutside = $this->page->theme->settings->loginlogooutside;
        }

        if (isset($this->page->theme->settings->customsignupoutside)) {
            $context->customsignupoutside = $this->page->theme->settings->customsignupoutside;
        }

        if (isset($this->page->theme->settings->loginidprovtop)) {
            $context->loginidprovtop = $this->page->theme->settings->loginidprovtop;
        }

        if (isset($this->page->theme->settings->stringca)) {
            $context->stringca = format_text(($this->page->theme->settings->stringca),
                FORMAT_HTML,
                array('noclean' => true)
            );
        }

        if (isset($this->page->theme->settings->stringca)) {
            $context->stringca = format_text(($this->page->theme->settings->stringca),
                FORMAT_HTML,
                array('noclean' => true)
            );
        }

        if (isset($this->page->theme->settings->loginhtmlcontent1)) {
            $context->loginhtmlcontent1 = format_text(($this->page->theme->settings->loginhtmlcontent1),
                FORMAT_HTML,
                array('noclean' => true)
            );
        }

        if (isset($this->page->theme->settings->loginhtmlcontent2)) {
            $context->loginhtmlcontent2 = format_text(($this->page->theme->settings->loginhtmlcontent2),
                FORMAT_HTML,
                array('noclean' => true)
            );
        }

        if (isset($this->page->theme->settings->loginhtmlcontent3)) {
            $context->loginhtmlcontent3 = format_text(($this->page->theme->settings->loginhtmlcontent3),
                FORMAT_HTML,
                array('noclean' => true)
            );
        }

        if (isset($this->page->theme->settings->loginhtmlcontent2)) {
            $context->loginhtmlcontent2 = format_text(($this->page->theme->settings->loginhtmlcontent2),
                FORMAT_HTML,
                array('noclean' => true)
            );
        }

        if (isset($this->page->theme->settings->logincustomfooterhtml)) {
            $context->logincustomfooterhtml = format_text(($this->page->theme->settings->logincustomfooterhtml),
                FORMAT_HTML,
                array('noclean' => true)
            );
        }

        if (isset($this->page->theme->settings->loginhtmlblockbottom)) {
            $context->loginhtmlblockbottom = format_text(($this->page->theme->settings->loginhtmlblockbottom),
                FORMAT_HTML,
                array('noclean' => true)
            );
        }

        if (isset($this->page->theme->settings->loginfootercontent)) {
            $context->loginfootercontent = format_text(($this->page->theme->settings->loginfootercontent),
                FORMAT_HTML,
                array('noclean' => true)
            );
        }

        if (isset($this->page->theme->settings->footercopy)) {
            $context->footercopy = format_text(($this->page->theme->settings->footercopy),
                FORMAT_HTML,
                array('noclean' => true)
            );
        }

        if (isset($this->page->theme->settings->loginintrotext)) {
            $context->loginintrotext = format_text(($this->page->theme->settings->loginintrotext),
                FORMAT_HTML,
                array('noclean' => true)
            );
        }

        if (isset($this->page->theme->settings->loginintrotext)) {
            $context->loginintrotext = format_text(($this->page->theme->settings->loginintrotext),
                FORMAT_HTML,
                array('noclean' => true)
            );
        }

        if (isset($this->page->theme->settings->customloginlogo)) {
            $context->customloginlogo = $this->page->theme->setting_file_url('customloginlogo', 'customloginlogo');
        }

        if (isset($this->page->theme->settings->customlogindmlogo)) {
            $context->customlogindmlogo = $this->page->theme->setting_file_url('customlogindmlogo', 'customlogindmlogo');
        }

        if (isset($this->page->theme->settings->loginbg)) {
            $context->loginbg = $this->page->theme->setting_file_url('loginbg', 'loginbg');
        }

        if (isset($this->page->theme->settings->hideforgotpassword)) {
            $context->hideforgotpassword = $this->page->theme->settings->hideforgotpassword == 1;
        }

        if (isset($this->page->theme->settings->logininfobox)) {
            $context->logininfobox = format_text(($this->page->theme->settings->logininfobox),
                FORMAT_HTML,
                array('noclean' => true)
            );
        }

        return $this->render_from_template('core/loginform', $context);
    }

    /**
     * Render the login signup form into a nice template for the theme.
     *
     * @param mform $form
     * @return string
     */
    public function render_login_signup_form($form) {
        global $CFG, $SITE;

        $context = $form->export_for_template($this);
        $url = $this->get_logo_url();
        if ($url) {
            $url = $url->out(false);
        }
        $context['logourl'] = $url;
        $context['sitename'] = format_string(
            $SITE->fullname,
            true,
            ['context' => context_course::instance(SITEID), "escape" => false]
        );

        if ($this->page->theme->settings->setloginlayout == 1) {
            $context['loginlayout1'] = 1;
        } else if ($this->page->theme->settings->setloginlayout == 2) {
            $context['loginlayout2'] = 1;
            if (isset($this->page->theme->settings->loginbg)) {
                $context['loginlayoutimg'] = 1;
            }
        } else if ($this->page->theme->settings->setloginlayout == 3) {
            $context['loginlayout3'] = 1;
            if (isset($this->page->theme->settings->loginbg)) {
                $context['loginlayoutimg'] = 1;
            }
        } else if ($this->page->theme->settings->setloginlayout == 4) {
            $context['loginlayout4'] = 1;
        } else if ($this->page->theme->settings->setloginlayout == 5) {
            $context['loginlayout5'] = 1;
        }

        if (isset($this->page->theme->settings->loginlogooutside)) {
            $context['loginlogooutside'] = $this->page->theme->settings->loginlogooutside;
        }

        if (isset($this->page->theme->settings->stringbacktologin)) {
            $context['stringbacktologin'] = format_text(($this->page->theme->settings->stringbacktologin),
                FORMAT_HTML,
                array('noclean' => true)
            );
        }
        if (isset($this->page->theme->settings->signupintrotext)) {
            $context['signupintrotext'] = format_text(($this->page->theme->settings->signupintrotext),
                FORMAT_HTML,
                array('noclean' => true)
            );
        }
        if (isset($this->page->theme->settings->signuptext)) {
            $context['signuptext'] = format_text(($this->page->theme->settings->signuptext),
                FORMAT_HTML,
                array('noclean' => true)
            );
        }

        if (!empty($this->page->theme->settings->customloginlogo)) {
            $url = $this->page->theme->setting_file_url('customloginlogo', 'customloginlogo');
            $context['customloginlogo'] = $url;
        }

        if (!empty($this->page->theme->settings->customlogindmlogo)) {
            $url = $this->page->theme->setting_file_url('customlogindmlogo', 'customlogindmlogo');
            $context['customlogindmlogo'] = $url;
        }

        if (!empty($this->page->theme->settings->loginbg)) {
            $url = $this->page->theme->setting_file_url('loginbg', 'loginbg');
            $context['loginbg'] = $url;
        }

        if (isset($this->page->theme->settings->loginfootercontent)) {
            $context['loginfootercontent'] = format_text(($this->page->theme->settings->loginfootercontent),
                FORMAT_HTML,
                array('noclean' => true)
            );
        }

        return $this->render_from_template('core/signup_form_layout', $context);
    }

    public function header() {
        global $USER, $COURSE;
        $context = context_course::instance($COURSE->id);
        $roles = get_user_roles($context, $USER->id, true);

        if (is_array($roles) && !empty($roles)) {
            foreach ($roles as $role) {
                $this->page->add_body_class('role-' . $role->shortname);
            }
        } else {
            $this->page->add_body_class('role-none');
        }
        return parent::header();
    }
    
    /**
     * See if this is the first view of the current cm in the session if it has fake blocks.
     *
     * (We track up to 100 cms so as not to overflow the session.)
     * This is done for drawer regions containing fake blocks so we can show blocks automatically.
     *
     * @return boolean true if the page has fakeblocks and this is the first visit.
     */
    public function firstview_fakeblocks(): bool {
        global $SESSION;

        $firstview = false;
        if ($this->page->cm) {
            if (!$this->page->blocks->region_has_fakeblocks('side-pre')) {
                return false;
            }
            if (!property_exists($SESSION, 'firstview_fakeblocks')) {
                $SESSION->firstview_fakeblocks = [];
            }
            if (array_key_exists($this->page->cm->id, $SESSION->firstview_fakeblocks)) {
                $firstview = false;
            } else {
                $SESSION->firstview_fakeblocks[$this->page->cm->id] = true;
                $firstview = true;
                if (count($SESSION->firstview_fakeblocks) > 100) {
                    array_shift($SESSION->firstview_fakeblocks);
                }
            }
        }
        return $firstview;
    }
}
