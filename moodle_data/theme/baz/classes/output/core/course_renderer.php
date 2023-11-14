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
 * Course renderer.
 *
 * @package   theme_baz
 * @copyright Copyright © 2021 onwards Marcin Czaja (https://rosea.io)
 * @license   Commercial https://themeforest.net/licenses
 */

namespace theme_baz\output\core;

use moodle_url;
use html_writer;
use core_course_category;
use coursecat_helper;
use stdClass;
use core_course_list_element;
use single_select;
use lang_string;
use cm_info;
use core_text;
use completion_info;


/**
 * @package    theme_baz
 * @copyright  Copyright © 2021 onwards Marcin Czaja - Rosea Themes - rosea.io
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class course_renderer extends \core_course_renderer {
    /**
     * Renders HTML to display one course module for display within a section.
     *
     * This function calls:
     * {@link core_course_renderer::course_section_cm()}
     *
     * @param stdClass $course
     * @param completion_info $completioninfo
     * @param cm_info $mod
     * @param int|null $sectionreturn
     * @param array $displayoptions
     * @return String
     */
    public function course_section_cm_list_item(
        $course,
        &$completioninfo,
        cm_info $mod,
        $sectionreturn,
        $displayoptions = array()
    ) {
        $output = '';
        if ($modulehtml = $this->course_section_cm($course, $completioninfo, $mod, $sectionreturn, $displayoptions)) {
            $infoclass = '';
            if ((($course->enablecompletion == COMPLETION_ENABLED) &&
                ($course->showcompletionconditions == COMPLETION_SHOW_CONDITIONS)) || !empty($course->showactivitydates)) {
                // This will apply styles to the course homepage when the activity information output component is displayed.
                $infoclass .= 'rui-hasinfo';
            }

            if ($mod->uservisible) {
                $conditionalhidden = $this->is_cm_conditionally_hidden($mod);

                if ($conditionalhidden) {
                    $infoclass .= ' rui-conditionalhidden';
                }
            }

            $modclasses = 'activity ' . $mod->modname . ' modtype_' . $mod->modname . ' ' . $mod->extraclasses . ' ' . $infoclass;
            $output .= html_writer::tag('li', $modulehtml, array('class' => $modclasses, 'id' => 'module-' . $mod->id));
        }
        return $output;
    }


    /**
     * Renders HTML for the menus to add activities and resources to the current course
     *
     * @param stdClass $course
     * @param int $section relative section number (field course_sections.section)
     * @param int $sectionreturn The section to link back to
     * @param array $displayoptions additional display options, for example blocks add
     *     option 'inblock' => true, suggesting to display controls vertically
     * @return string
     */
    public function course_section_add_cm_control($course, $section, $sectionreturn = null, $displayoptions = array()) {
        // The returned control HTML can be one of the following:
        // - Only the non-ajax control (select menus of activities and resources) with a noscript fallback for non js clients.
        // Please note that non-ajax control has been deprecated and it will be removed in the future.

        // - Only the ajax control (the link which when clicked produces the activity chooser modal). No noscript fallback.

        $courseajaxenabled = course_ajax_enabled($course);

        // Non ajax control is under deprecated, $rendernonajaxcontrol will be removed in later versions.
        $rendernonajaxcontrol = !$courseajaxenabled || $course->id != $this->page->course->id;
        if ($rendernonajaxcontrol) {
        } else {
            // The ajax control - the 'Add an activity or resource' link.
            // The module chooser link.
            $straddeither = get_string('addresourceoractivity');

            $ajaxcontrol = html_writer::start_tag('div', array('class' => 'section-modchooser'));
            $icon = '<svg class="mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4.75 6.75V8.25C4.75 9.35457 5.64543 10.25 6.75 10.25H8.25C9.35457 10.25 10.25 9.35457 10.25 8.25V6.75C10.25 5.64543 9.35457 4.75 8.25 4.75H6.75C5.64543 4.75 4.75 5.64543 4.75 6.75Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M14.75 7H19.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M17 4.75L17 9.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M4.75 15.75V17.25C4.75 18.3546 5.64543 19.25 6.75 19.25H8.25C9.35457 19.25 10.25 18.3546 10.25 17.25V15.75C10.25 14.6454 9.35457 13.75 8.25 13.75H6.75C5.64543 13.75 4.75 14.6454 4.75 15.75Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M13.75 15.75V17.25C13.75 18.3546 14.6454 19.25 15.75 19.25H17.25C18.3546 19.25 19.25 18.3546 19.25 17.25V15.75C19.25 14.6454 18.3546 13.75 17.25 13.75H15.75C14.6454 13.75 13.75 14.6454 13.75 15.75Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>';
            $span = html_writer::tag('span', $straddeither, array('class' => 'section-modchooser-text'));
            $ajaxcontrol .= html_writer::tag(
                'button',
                $icon . $span,
                [
                    'class' => 'section-modchooser-link btn btn-sm btn-primary w-100',
                    'data-action' => 'open-chooser',
                    'data-sectionid' => $section,
                    'data-sectionreturnid' => $sectionreturn,
                ]
            );
            $ajaxcontrol .= html_writer::end_tag('div');
        }
    }
    /**
     * Renders html to display a name with the link to the course module on a course page
     *
     * If module is unavailable for user but still needs to be displayed
     * in the list, just the name is returned without a link
     *
     * Note, that for course modules that never have separate pages (i.e. labels)
     * this function return an empty string
     *
     * @param cm_info $mod
     * @param array $displayoptions
     * @return string
     */
    public function course_section_cm_name_title(cm_info $mod, $displayoptions = array()) {
        $output = '';
        $url = $mod->url;
        if (!$mod->is_visible_on_course_page() || !$url) {
            // Nothing to be displayed to the user.
            return $output;
        }

        //Accessibility: for files get description via icon, this is very ugly hack!
        $instancename = $mod->get_formatted_name();
        $altname = $mod->modfullname;
        // Avoid unnecessary duplication: if e.g. a forum name already
        // includes the word forum (or Forum, etc) then it is unhelpful
        // to include that in the accessible description that is added.
        if (false !== strpos(
            core_text::strtolower($instancename),
            core_text::strtolower($altname)
        )) {
            $altname = '';
        }
        // File type after name, for alphabetic lists (screen reader).
        if ($altname) {
            $altname = get_accesshide(' ' . $altname);
        }

        list($linkclasses, $textclasses) = $this->course_section_cm_classes($mod);

        // Get on-click attribute value if specified and decode the onclick - it
        // has already been encoded for display (puke).
        $onclick = htmlspecialchars_decode($mod->onclick, ENT_QUOTES);

        // Display link itself.
        $activitylink = html_writer::empty_tag('img', array(
            'src' => $mod->get_icon_url(),
            'class' => 'rui-activityicon', 'alt' => '', 'role' => 'presentation', 'aria-hidden' => 'true'
        )) .
            html_writer::tag('span', $instancename . $altname, array('class' => 'rui-instancename'));
        if ($mod->uservisible) {
            $output .= html_writer::link($url, $activitylink, array('class' => 'aalink' . $linkclasses, 'onclick' => $onclick));
        } else {
            // We may be displaying this just in order to show information
            // about visibility, without the actual link ($mod->is_visible_on_course_page()).
            $output .= html_writer::tag('div', $activitylink, array('class' => $textclasses));
        }
        return $output;
    }

    /**
     * Renders HTML to display one course module in a course section
     *
     * This includes link, content, availability, completion info and additional information
     * that module type wants to display (i.e. number of unread forum posts)
     *
     * This function calls:
     * {@link core_course_renderer::course_section_cm_name()}
     * {@link core_course_renderer::course_section_cm_text()}
     * {@link core_course_renderer::course_section_cm_availability()}
     * {@link course_get_cm_edit_actions()}
     * {@link core_course_renderer::course_section_cm_edit_actions()}
     *
     * @param stdClass $course
     * @param completion_info $completioninfo
     * @param cm_info $mod
     * @param int|null $sectionreturn
     * @param array $displayoptions
     * @return string
     */
    public function course_section_cm($course, &$completioninfo, cm_info $mod, $sectionreturn, $displayoptions = array()) {
        global $USER;

        $output = '';
        $tempclass = '';

        if (!$mod->is_visible_on_course_page()) {
            return $output;
        }

        $ruiindentclasses = '';
        $indentclasses = 'mod-indent';
        if (!empty($mod->indent)) {
            $indentclasses .= ' mod-indent-' . $mod->indent;
            $ruiindentclasses .= 'rui-mod-indent rui-mod-indent--' . $mod->indent;
            if ($mod->indent > 15) {
                $indentclasses .= ' mod-indent-huge';
            }
        }

        $output .= html_writer::start_tag('div', array('class' => 'rui-activity-wrapper m-0'));

        if ($this->page->user_is_editing()) {
            $output .= html_writer::start_tag('div', array('class' => 'rui-activity-edit-wrapper'));
            if ($this->page->user_is_editing()) {
                $output .= course_get_cm_move($mod, $sectionreturn);
            }

            $modicons = '';
            if ($this->page->user_is_editing()) {
                $editactions = course_get_cm_edit_actions($mod, $mod->indent, $sectionreturn);
                $modicons .= ' ' . $this->course_section_cm_edit_actions($editactions, $mod, $displayoptions);
                $modicons .= $mod->afterediticons;
            }

            if (!empty($modicons)) {
                $output .= html_writer::div($modicons, 'rui-activity-actions actions');
            }
            $output .= html_writer::end_tag('div');
        }

        // Fetch activity dates.
        $activitydates = [];
        if ($course->showactivitydates) {
            $activitydates = \core\activity_dates::get_dates_for_module($mod, $USER->id);

            if (!empty($activitydates)) {
                $tempclass .= ' rui--activity-hasdates';
            }
        }


        // Fetch completion details.
        $showcompletionconditions = $course->showcompletionconditions == COMPLETION_SHOW_CONDITIONS;
        $completiondetails = \core_completion\cm_completion_details::get_instance($mod, $USER->id, $showcompletionconditions);
        $isautomaticcompletion = $completiondetails->has_completion() && $completiondetails->is_automatic();
        $ismanualcompletion = $completiondetails->has_completion() && !$completiondetails->is_automatic();

        if ($isautomaticcompletion == 1) {
            $tempclass .= ' rui--activity-is-automatic';
        } else if ($ismanualcompletion == 1) {
            $tempclass .= ' rui--activity-is-manual';
        } else {
            $tempclass .= ' rui--activity-is-turnedoff';
        }

        // end

        $output .= html_writer::start_tag('div', array('class' => 'rui-activity-content mod-indent-outer' . $tempclass . ' ' . $ruiindentclasses));

        // This div is used to indent the content.
        $output .= html_writer::div('', $indentclasses);

        // Start a wrapper for the actual content to keep the indentation consistent
        $output .= html_writer::start_tag('div');

        // Show the activity information if:
        // - The course's showcompletionconditions setting is enabled; or
        // - The activity tracks completion manually; or
        // - There are activity dates to be shown.
        if ($showcompletionconditions || $ismanualcompletion || $activitydates) {
            $output .= $this->output->activity_information($mod, $completiondetails, $activitydates);
        }

        // Display the link to the module (or do nothing if module has no url)
        $cmname = $this->course_section_cm_name($mod, $displayoptions);

        if (!empty($cmname)) {
            // Start the div for the activity title, excluding the edit icons.
            $output .= html_writer::start_tag('div', array('class' => 'rui-activityinstance activityinstance'));
            $output .= $cmname;


            // Module can put text after the link (e.g. forum unread)
            $output .= $mod->afterlink;

            // Closing the tag which contains everything but edit icons. Content part of the module should not be part of this.
            $output .= html_writer::end_tag('div'); // .activityinstance
        }

        // If there is content but NO link (eg label), then display the
        // content here (BEFORE any icons). In this case cons must be
        // displayed after the content so that it makes more sense visually
        // and for accessibility reasons, e.g. if you have a one-line label
        // it should work similarly (at least in terms of ordering) to an
        // activity.
        $contentpart = $this->course_section_cm_text($mod, $displayoptions);
        $url = $mod->url;
        if (empty($url)) {
            $output .= $contentpart;
        }

        // Show availability info (if module is not available).
        $output .= $this->course_section_cm_availability($mod, $displayoptions);

        // If there is content AND a link, then display the content here
        // (AFTER any icons). Otherwise it was displayed before
        if (!empty($url)) {
            $output .= $contentpart;
        }

        $output .= html_writer::end_tag('div'); // $indentclasses

        // End of indentation div.
        $output .= html_writer::end_tag('div');

        $output .= html_writer::end_tag('div');
        return $output;
    }


    /**
     * Renders HTML to display a list of course modules in a course section
     * Also displays "move here" controls in Javascript-disabled mode
     *
     * This function calls {@link core_course_renderer::course_section_cm()}
     *
     * @param stdClass $course course object
     * @param int|stdClass|section_info $section relative section number or section object
     * @param int $sectionreturn section number to return to
     * @param int $displayoptions
     * @return void
     */
    public function course_section_cm_list($course, $section, $sectionreturn = null, $displayoptions = array()) {
        global $USER;

        $output = '';
        $modinfo = get_fast_modinfo($course);
        if (is_object($section)) {
            $section = $modinfo->get_section_info($section->section);
        } else {
            $section = $modinfo->get_section_info($section);
        }
        $completioninfo = new completion_info($course);

        // check if we are currently in the process of moving a module with JavaScript disabled
        $ismoving = $this->page->user_is_editing() && ismoving($course->id);
        if ($ismoving) {
            $strmovefull = strip_tags(get_string("movefull", "", "'$USER->activitycopyname'"));
        }

        // Get the list of modules visible to user (excluding the module being moved if there is one)
        $moduleshtml = array();
        if (!empty($modinfo->sections[$section->section])) {
            foreach ($modinfo->sections[$section->section] as $modnumber) {
                $mod = $modinfo->cms[$modnumber];

                if ($ismoving and $mod->id == $USER->activitycopy) {
                    // do not display moving mod
                    continue;
                }

                if ($modulehtml = $this->course_section_cm_list_item(
                    $course,
                    $completioninfo,
                    $mod,
                    $sectionreturn,
                    $displayoptions
                )) {
                    $moduleshtml[$modnumber] = $modulehtml;
                }
            }
        }

        $sectionoutput = '';
        if (!empty($moduleshtml) || $ismoving) {
            foreach ($moduleshtml as $modnumber => $modulehtml) {
                if ($ismoving) {
                    $movingurl = new moodle_url('/course/mod.php', array('moveto' => $modnumber, 'sesskey' => sesskey()));
                    $sectionoutput .= html_writer::tag(
                        'li',
                        html_writer::link($movingurl, '', array('title' => $strmovefull, 'class' => 'movehere')),
                        array('class' => 'movehere')
                    );
                }

                $sectionoutput .= $modulehtml;
            }

            if ($ismoving) {
                $movingurl = new moodle_url('/course/mod.php', array('movetosection' => $section->id, 'sesskey' => sesskey()));
                $sectionoutput .= html_writer::tag(
                    'li',
                    html_writer::link($movingurl, '', array('title' => $strmovefull, 'class' => 'movehere')),
                    array('class' => 'movehere')
                );
            }
        }

        // Always output the section module list.
        $output .= html_writer::tag('ul', $sectionoutput, array('class' => 'rui-section section img-text'));

        return $output;
    }

    /**
     * Renders html to display the module content on the course page (i.e. text of the labels)
     *
     * @param cm_info $mod
     * @param array $displayoptions
     * @return string
     */
    public function course_section_cm_text(cm_info $mod, $displayoptions = array()) {
        $output = '';
        if (!$mod->is_visible_on_course_page()) {
            // nothing to be displayed to the user
            return $output;
        }
        $content = $mod->get_formatted_content(array('overflowdiv' => false, 'noclean' => true));
        list($linkclasses, $textclasses) = $this->course_section_cm_classes($mod);
        if ($mod->url && $mod->uservisible) {
            if ($content) {
                // If specified, display extra content after link.
                $output = html_writer::tag('div', $content, array('class' =>
                trim('rui-contentafterlink contentafterlink ' . $textclasses)));
            }
        } else {
            $groupinglabel = $mod->get_grouping_label($textclasses);

            // No link, so display only content.
            $output = html_writer::tag(
                'div',
                $content . $groupinglabel,
                array('class' => 'rui-contentwithoutlink contentwithoutlink ' . $textclasses)
            );
        }
        return $output;
    }


    /**
     * Renders html to display a course search form
     *
     * @param string $value default value to populate the search field
     * @return string
     */
    public function course_search_form($value = '') {

        $data = [
            'action' => \core_search\manager::get_course_search_url(),
            'btnclass' => 'btn-primary',
            'inputname' => 'q',
            'searchstring' => get_string('searchcourses'),
            'hiddenfields' => (object) ['name' => 'areaids', 'value' => 'core_course-course'],
            'query' => $value
        ];
        return $this->render_from_template('core/search_input_fw', $data);
    }


    /**
     * Renders the list of courses
     *
     * This is internal function, please use core_course_renderer::courses_list() or another public
     * method from outside of the class
     *
     * If list of courses is specified in $courses; the argument $chelper is only used
     * to retrieve display options and attributes, only methods get_show_courses(),
     * get_courses_display_option() and get_and_erase_attributes() are called.
     *
     * @param coursecat_helper $chelper various display options
     * @param array $courses the list of courses to display
     * @param int|null $totalcount total number of courses (affects display mode if it is AUTO or pagination if applicable),
     *     defaulted to count($courses)
     * @return string
     *
     * @throws \coding_exception
     * @throws \dml_exception
     * @throws \moodle_exception
     */
    protected function coursecat_courses(coursecat_helper $chelper, $courses, $totalcount = null) {
        global $CFG;

        $theme = \theme_config::load('baz');

        if (!empty($theme->settings->courselistview)) {
            return parent::coursecat_courses($chelper, $courses, $totalcount);
        }

        if ($totalcount === null) {
            $totalcount = count($courses);
        }

        if (!$totalcount) {
            // Courses count is cached during courses retrieval.
            return '';
        }

        if ($chelper->get_show_courses() == self::COURSECAT_SHOW_COURSES_AUTO) {
            // In 'auto' course display mode we analyse if number of courses is more or less than $CFG->courseswithsummarieslimit.
            if ($totalcount <= $CFG->courseswithsummarieslimit) {
                $chelper->set_show_courses(self::COURSECAT_SHOW_COURSES_EXPANDED);
            } else {
                $chelper->set_show_courses(self::COURSECAT_SHOW_COURSES_COLLAPSED);
            }
        }

        // Prepare content of paging bar if it is needed.
        $paginationurl = $chelper->get_courses_display_option('paginationurl');
        $paginationallowall = $chelper->get_courses_display_option('paginationallowall');
        if ($totalcount > count($courses)) {
            // There are more results that can fit on one page.
            if ($paginationurl) {
                // The option paginationurl was specified, display pagingbar.
                $perpage = $chelper->get_courses_display_option('limit', $CFG->coursesperpage);
                $page = $chelper->get_courses_display_option('offset') / $perpage;
                $pagingbar = $this->paging_bar(
                    $totalcount,
                    $page,
                    $perpage,
                    $paginationurl->out(false, array('perpage' => $perpage))
                );
                if ($paginationallowall) {
                    $pagingbar .= html_writer::tag('div', html_writer::link(
                        $paginationurl->out(false, array('perpage' => 'all')),
                        get_string('showall', '', $totalcount)
                    ), array('class' => 'paging paging-showall'));
                }
            }
        } else if (($totalcount > $CFG->coursesperpage) && $paginationurl && $paginationallowall) {
            // There are more than one page of results and we are in 'view all' mode, suggest to go back to paginated view mode.
            $pagingbar = html_writer::tag(
                'div',
                html_writer::link(
                    $paginationurl->out(
                        false,
                        array('perpage' => $CFG->coursesperpage)
                    ),
                    get_string('showperpage', '', $CFG->coursesperpage)
                ),
                array('class' => 'paging paging-showperpage')
            );
        }

        // Display list of courses.
        $attributes = $chelper->get_and_erase_attributes('courses');
        $content = html_writer::start_tag('div', $attributes);


        if (!empty($pagingbar)) {
            $content .= $pagingbar;
        }

        $coursecount = 1;
        $content .= html_writer::start_tag('div', array('class' => 'rui-course-card-deck rui-course-card-deck--4 mt-2'));
        foreach ($courses as $course) {
            $content .= $this->coursecat_coursebox($chelper, $course);

            if ($coursecount % 4 == 0) {
                $content .= html_writer::end_tag('div');
                $content .= html_writer::start_tag('div', array('class' => 'rui-course-card-deck rui-course-card-deck--4 mt-2'));
            }

            $coursecount++;
        }

        $content .= html_writer::end_tag('div');

        if (!empty($pagingbar)) {
            $content .= $pagingbar;
        }

        if (!empty($morelink)) {
            $content .= $morelink;
        }

        $content .= html_writer::end_tag('div'); // End courses.

        return $content;
    }

    protected function coursecat_subcategories(coursecat_helper $chelper, $coursecat, $depth) {
        global $CFG;
        $subcategories = array();
        if (!$chelper->get_categories_display_option('nodisplay')) {
            $subcategories = $coursecat->get_children($chelper->get_categories_display_options());
        }
        $totalcount = $coursecat->get_children_count();
        if (!$totalcount) {
            // Note that we call core_course_category::get_children_count() AFTER core_course_category::get_children()
            // to avoid extra DB requests.
            // Categories count is cached during children categories retrieval.
            return '';
        }

        // prepare content of paging bar or more link if it is needed
        $paginationurl = $chelper->get_categories_display_option('paginationurl');
        $paginationallowall = $chelper->get_categories_display_option('paginationallowall');
        if ($totalcount > count($subcategories)) {
            if ($paginationurl) {
                // the option 'paginationurl was specified, display pagingbar
                $perpage = $chelper->get_categories_display_option('limit', $CFG->coursesperpage);
                $page = $chelper->get_categories_display_option('offset') / $perpage;
                $pagingbar = $this->paging_bar(
                    $totalcount,
                    $page,
                    $perpage,
                    $paginationurl->out(false, array('perpage' => $perpage))
                );
                if ($paginationallowall) {
                    $pagingbar .= html_writer::tag('div', html_writer::link(
                        $paginationurl->out(false, array('perpage' => 'all')),
                        get_string('showall', '', $totalcount)
                    ), array('class' => 'paging paging-showall'));
                }
            } else if ($viewmoreurl = $chelper->get_categories_display_option('viewmoreurl')) {
                // the option 'viewmoreurl' was specified, display more link (if it is link to category view page, add category id)
                if ($viewmoreurl->compare(new moodle_url('/course/index.php'), URL_MATCH_BASE)) {
                    $viewmoreurl->param('categoryid', $coursecat->id);
                }
                $viewmoretext = $chelper->get_categories_display_option('viewmoretext', new lang_string('viewmore'));
                $morelink = html_writer::tag(
                    'div',
                    html_writer::link($viewmoreurl, $viewmoretext, array('class' => 'btn btn-secondary w-100')),
                    array('class' => 'paging paging-morelink wrapper-md')
                );
            }
        } else if (($totalcount > $CFG->coursesperpage) && $paginationurl && $paginationallowall) {
            // there are more than one page of results and we are in 'view all' mode, suggest to go back to paginated view mode
            $pagingbar = html_writer::tag('div', html_writer::link(
                $paginationurl->out(false, array('perpage' => $CFG->coursesperpage)),
                get_string('showperpage', '', $CFG->coursesperpage)
            ), array('class' => 'paging paging-showperpage'));
        }

        // display list of subcategories
        $content = html_writer::start_tag('div', array('class' => 'subcategories'));

        if (!empty($pagingbar)) {
            $content .= $pagingbar;
        }

        foreach ($subcategories as $subcategory) {
            $content .= $this->coursecat_category($chelper, $subcategory, $depth);
        }

        if (!empty($pagingbar)) {
            $content .= $pagingbar;
        }
        if (!empty($morelink)) {
            $content .= $morelink;
        }

        $content .= html_writer::end_tag('div');
        return $content;
    }

    /**
     * Displays one course in the list of courses.
     *
     * This is an internal function, to display an information about just one course
     * please use core_course_renderer::course_info_box()
     *
     * @param coursecat_helper $chelper various display options
     * @param core_course_list_element|stdClass $course
     * @param string $additionalclasses additional classes to add to the main <div> tag (usually
     *    depend on the course position in list - first/last/even/odd)
     * @return string
     */
    protected function coursecat_coursebox(coursecat_helper $chelper, $course, $additionalclasses = '') {
        $theme = \theme_config::load('baz');

        if (!empty($theme->settings->courselistview)) {
            return parent::coursecat_coursebox($chelper, $course, $additionalclasses);
        }

        if (!isset($this->strings->summary)) {
            $this->strings->summary = get_string('summary');
        }

        if ($chelper->get_show_courses() <= self::COURSECAT_SHOW_COURSES_COUNT) {
            return '';
        }

        if ($course instanceof stdClass) {
            $course = new core_course_list_element($course);
        }

        //
        $additionalclass = '';
        $courselink = new moodle_url('/course/view.php', array('id' => $course->id));
        if ($this->get_course_summary_image($course, $courselink) == '') {
            $additionalclass .= 'rui-course-card--noimg';
        }
        if ($course->visible === '0') {
            $additionalclass .= ' rui-course-card--dimmed';
        }
        //


        $classes = trim('rui-course-card ' . $additionalclass . ' ' . $additionalclasses);
        if ($chelper->get_show_courses() < self::COURSECAT_SHOW_COURSES_EXPANDED) {
            $classes .= ' collapsed';
        }

        // End coursebox.
        $content = html_writer::start_tag('div', array(
            'class' => $classes,
            'data-courseid' => $course->id,
            'data-type' => self::COURSECAT_TYPE_COURSE,
        ));

        $content .= $this->coursecat_coursebox_content($chelper, $course);

        $content .= html_writer::end_tag('div'); // End coursebox.

        return $content;
    }

    /**
     * Returns HTML to display course content (summary, course contacts and optionally category name)
     *
     * This method is called from coursecat_coursebox() and may be re-used in AJAX
     *
     * @param coursecat_helper $chelper various display options
     * @param stdClass|core_course_list_element $course
     *
     * @return string
     *
     * @throws \coding_exception
     * @throws \dml_exception
     * @throws \moodle_exception
     */
    protected function coursecat_coursebox_content(coursecat_helper $chelper, $course) {
        global $PAGE;
        $theme = \theme_config::load('baz');

        if ($course instanceof stdClass) {
            $course = new core_course_list_element($course);
        }

        $coursename = $chelper->get_course_formatted_name($course);
        $courselink = new moodle_url('/course/view.php', array('id' => $course->id));
        $coursenamelink = html_writer::link($courselink, $coursename);

        $content = html_writer::start_tag('div', ['class' => 'rui-course-card-icons']);
        $content .= $this->course_enrolment_icons($course);
        $content .= html_writer::end_tag('div');

        $content .= $this->get_course_summary_image($course, $courselink);
        $content .= $this->course_card_body($chelper, $course, $coursenamelink);

        if ($PAGE->theme->settings->cccteachers == 1) {
            $content .= $this->course_contacts($course);
        }

        if ($PAGE->theme->settings->cccfooter == 1) {
            $content .= $this->course_card_footer($course);
        }

        return $content;
    }

    /**
     * Returns HTML to display course summary.
     *
     * @param coursecat_helper $chelper
     * @param core_course_list_element $course
     * @return string
     */
    protected function course_summary(coursecat_helper $chelper, core_course_list_element $course): string {
        global $PAGE;
        $theme = \theme_config::load('baz');

        if (!empty($theme->settings->courselistview)) {
            return parent::course_summary($chelper, $course);
        }

        $content = '';
        if ($course->has_summary()) {
            //$content .= html_writer::start_tag('div', ['class' => 'rui-course-card-text']);
            $content .= '<div class="rui-course-card-text pr-3" data-simplebar data-simplebar-auto-hide="false">';
            if (!empty($PAGE->theme->settings->coursecarddesclimit)) {
                //info https://github.com/moodle/moodle/blob/master/lib/classes/output/mustache_shorten_text_helper.php
                $content .= shorten_text($chelper->get_course_formatted_summary(
                    $course,
                    array('overflowdiv' => false, 'noclean' => false, 'para' => false)
                ), $PAGE->theme->settings->coursecarddesclimit);
            } else {
                $content .= $chelper->get_course_formatted_summary(
                    $course,
                    array('overflowdiv' => false, 'noclean' => false, 'para' => false)
                );
            }

            $content .= html_writer::end_tag('div'); // End summary.
        }

        return $content;
    }

    /**
     * Returns HTML to display course contacts.
     *
     * @param core_course_list_element $course
     *
     * @return string
     *
     * @throws \coding_exception
     * @throws \dml_exception
     */
    protected function course_contacts(core_course_list_element $course) {
        global $CFG, $DB;

        $theme = \theme_config::load('baz');

        if (!empty($theme->settings->courselistview)) {
            return parent::course_contacts($course);
        }

        $content = '';
        if ($course->has_course_contacts()) {
            $content .= '<div class="rui-card-course-contacts">';

            $instructors = $course->get_course_contacts();
            foreach ($instructors as $key => $instructor) {
                $role = $instructor['rolename'];
                $roleshortname = $instructor['role']->shortname;

                $name = $instructor['username'];
                $url = $CFG->wwwroot . '/user/profile.php?id=' . $key;
                $picture = $this->get_user_picture($DB->get_record('user', array('id' => $key)));

                $content .= "<a href='{$url}' class='rui-card-contact rui-user-{$roleshortname}' data-toggle='tooltip' title='{$name} - {$role}'>";
                $content .= "<img src='{$picture}' class='rui-card-avatar rounded-circle' alt='{$name}'  title='{$name} - {$role}'/>";
                $content .= "</a>";
            }

            $content .= '</div>';
        }

        return $content;
    }

    /**
     * Returns the first course's summary issue
     *
     * @param \core_course_list_element $course
     * @param string $courselink
     *
     * @return string
     */
    public static function get_course_summary_image($course, $courselink) {
        global $CFG;

        $contentimage = '';
        foreach ($course->get_course_overviewfiles() as $file) {
            $isimage = $file->is_valid_image();
            $url = moodle_url::make_file_url(
                "$CFG->wwwroot/pluginfile.php",
                '/' . $file->get_contextid() . '/' . $file->get_component() . '/' .
                    $file->get_filearea() . $file->get_filepath() . $file->get_filename(),
                !$isimage
            );
            if ($isimage) {
                $contentimage .= '<a href="' . $courselink . '"><figure class="rui-course-card-img-top" style="background-image: url(' . $url . ');"></figure></a>';
                break;
            }
        }

        if (empty($contentimage)) {
            //$url = $CFG->wwwroot . "/theme/baz/pix/default_course.jpg";

            /*$contentimage = \html_writer::link($courselink, \html_writer::empty_tag('img', array(
                'src' => $url,
                'alt' => $course->fullname,
                'class' => 'rui-course-card-img-top w-100')))';*/
            $contentimage = '';
        }

        return $contentimage;
    }


    /**
     * Returns the user picture
     *
     * @param null $userobject
     * @param int $imgsize
     *
     * @return \moodle_url
     * @throws \coding_exception
     */
    public static function get_user_picture($userobject = null, $imgsize = 100) {
        global $USER, $PAGE;

        if (!$userobject) {
            $userobject = $USER;
        }

        $userimg = new \user_picture($userobject);

        $userimg->size = $imgsize;

        return $userimg->get_url($PAGE);
    }


    /**
     * Generates the course card body html
     *
     * @param coursecat_helper $chelper
     * @param core_course_list_element $course
     * @param string $coursenamelink
     *
     * @return string
     *
     * @throws \moodle_exception
     */
    protected function course_card_body(coursecat_helper $chelper, core_course_list_element $course, $coursenamelink) {
        $content = html_writer::start_tag('div', ['class' => 'rui-course-card-body']);
        $content .= $this->course_category_name($chelper, $course);
        $content .= html_writer::tag('h4', $coursenamelink, ['class' => 'rui-course-card-title']);
        $content .= $this->course_summary($chelper, $course);
        $content .= html_writer::end_tag('div');

        return $content;
    }


    /**
     * Returns HTML to display course category name.
     *
     * @param coursecat_helper $chelper
     * @param core_course_list_element $course
     *
     * @return string
     *
     * @throws \moodle_exception
     */
    protected function course_category_name(coursecat_helper $chelper, core_course_list_element $course): string {
        $theme = \theme_config::load('baz');

        if (!empty($theme->settings->courselistview)) {
            return parent::course_category_name($chelper, $course);
        }

        $content = '';

        if ($cat = core_course_category::get($course->category, IGNORE_MISSING)) {
            $content .= html_writer::start_tag('div', ['class' => 'rui-course-cat']);
            $content .= html_writer::link(
                new moodle_url('/course/index.php', ['categoryid' => $cat->id]),
                $cat->get_formatted_name(),
                ['class' => $cat->visible ? 'rui-course-cat-badge' : 'dimmed']
            );
            $content .= html_writer::end_tag('div');
        }

        return $content;
    }


    /**
     * Generates the course card footer html
     *
     * @param core_course_list_element $course
     *
     * @return string
     *
     * @throws \coding_exception
     * @throws \moodle_exception
     */
    protected function course_card_footer(core_course_list_element $course) {
        $content = '';

        if (isloggedin()) {
            $stringaccess = theme_baz_get_setting('stringaccess');
            $content .= html_writer::start_tag('div', ['class' => 'rui-course-card-footer']);
            $content .= html_writer::link(
                new moodle_url('/course/view.php', ['id' => $course->id]),
                '<span class="rui-course-card-link-text">' . format_text($stringaccess, FORMAT_HTML, array('noclean' => true)) . '</span><svg width="22" height="22" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.75 6.75L19.25 12L13.75 17.25"></path><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H4.75"></path></svg>',
                ['class' => 'rui-course-card-link']
            );
            $content .= html_writer::end_tag('div'); // End card-footer.
        }

        return $content;
    }


    /**
     * Returns HTML to display course custom fields.
     *
     * @param core_course_list_element $course
     * @return string
     */
    protected function course_custom_fields(core_course_list_element $course): string {
        $theme = \theme_config::load('baz');

        if (!empty($theme->settings->courselistview)) {
            return parent::course_custom_fields($course);
        }

        $content = '';
        if ($course->has_custom_fields()) {
            $handler = \core_course\customfield\course_handler::create();
            $customfields = $handler->display_custom_fields_data($course->get_custom_fields());
            $content .= \html_writer::tag('div', $customfields, ['class' => 'rui-customfields-container']);
        }
        return $content;
    }


    /**
     * Returns HTML to display course enrolment icons.
     *
     * @param core_course_list_element $course
     * @return string
     */
    protected function course_enrolment_icons(core_course_list_element $course): string {
        $content = '';

        if ($icons = enrol_get_course_info_icons($course)) {
            foreach ($icons as $icon) {
                $content .= $this->render($icon);
            }
        }

        return $content;
    }


    /**
     * Returns HTML to display a tree of subcategories and courses in the given category
     *
     * @param coursecat_helper $chelper various display options
     * @param core_course_category $coursecat top category (this category's name and description will NOT be added to the tree)
     * @return string
     */
    protected function coursecat_tree(coursecat_helper $chelper, $coursecat) {
        // Reset the category expanded flag for this course category tree first.
        $this->categoryexpandedonload = false;
        $categorycontent = $this->coursecat_category_content($chelper, $coursecat, 1);
        if (empty($categorycontent)) {
            return '';
        }

        // Start content generation.
        $content = '';
        $attributes = $chelper->get_and_erase_attributes('course_category_tree clearfix');
        $content .= html_writer::start_tag('div', $attributes);

        if ($coursecat->get_children_count()) {
            $classes = array(
                'collapseexpand', 'aabtn'
            );

            // Check if the category content contains subcategories with children's content loaded.
            if ($this->categoryexpandedonload) {
                $classes[] = 'collapse-all';
                $linkname = get_string('collapseall');
            } else {
                $linkname = get_string('expandall');
            }

            // Only show the collapse/expand if there are children to expand.
            $content .= html_writer::start_tag('div', array('class' => 'wrapper-md collapsible-actions position-relative'));
            $content .= html_writer::link('#', $linkname, array('class' => implode(' ', $classes)));
            $content .= html_writer::end_tag('div');
            $this->page->requires->strings_for_js(array('collapseall', 'expandall'), 'moodle');
        }

        $content .= html_writer::tag('div', $categorycontent, array('class' => 'content'));

        $content .= html_writer::end_tag('div'); // .course_category_tree.

        return $content;
    }


    /**
     * Returns HTML to display a course category as a part of a tree
     *
     * This is an internal function, to display a particular category and all its contents
     * use {@link core_course_renderer::course_category()}
     *
     * @param coursecat_helper $chelper various display options
     * @param core_course_category $coursecat
     * @param int $depth depth of this category in the current tree
     * @return string
     */
    protected function coursecat_category(coursecat_helper $chelper, $coursecat, $depth) {
        // open category tag
        $classes = array('category');
        if (empty($coursecat->visible)) {
            $classes[] = 'dimmed_category';
        }
        if ($chelper->get_subcat_depth() > 0 && $depth >= $chelper->get_subcat_depth()) {
            // do not load content
            $categorycontent = '';
            $classes[] = 'notloaded';
            if (
                $coursecat->get_children_count() ||
                ($chelper->get_show_courses() >= self::COURSECAT_SHOW_COURSES_COLLAPSED && $coursecat->get_courses_count())
            ) {
                $classes[] = 'with_children';
                $classes[] = 'collapsed';
            }
        } else {
            // load category content
            $categorycontent = $this->coursecat_category_content($chelper, $coursecat, $depth);
            $classes[] = 'loaded';
            if (!empty($categorycontent)) {
                $classes[] = 'with_children';
                // Category content loaded with children.
                $this->categoryexpandedonload = true;
            }
        }

        // Make sure JS file to expand category content is included.
        $this->coursecat_include_js();

        $content = html_writer::start_tag('div', array(
            'class' => join(' ', $classes),
            'data-categoryid' => $coursecat->id,
            'data-depth' => $depth,
            'data-showcourses' => $chelper->get_show_courses(),
            'data-type' => self::COURSECAT_TYPE_CATEGORY,
        ));

        // category name
        $categoryname = html_writer::link(
            new moodle_url(
                '/course/index.php',
                array('categoryid' => $coursecat->id)
            ),
            $coursecat->get_formatted_name(),
            array('class' => 'rui-category-link')
        );

        $icon = '<svg class="mr-2" width="20" height="20" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.25 5.75C19.25 5.19772 18.8023 4.75 18.25 4.75H14C12.8954 4.75 12 5.64543 12 6.75V19.25L12.8284 18.4216C13.5786 17.6714 14.596 17.25 15.6569 17.25H18.25C18.8023 17.25 19.25 16.8023 19.25 16.25V5.75Z"></path>
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.75 5.75C4.75 5.19772 5.19772 4.75 5.75 4.75H10C11.1046 4.75 12 5.64543 12 6.75V19.25L11.1716 18.4216C10.4214 17.6714 9.40401 17.25 8.34315 17.25H5.75C5.19772 17.25 4.75 16.8023 4.75 16.25V5.75Z"></path>
        </svg>';
        $a = $coursecat->get_courses_count();
        $b = $coursecat->get_children_count();
        $coursesum = $a + $b;

        $coursescount = $icon . $coursesum;

        $content .= html_writer::start_tag('div', array('class' => 'wrapper-md info'));
        $content .= html_writer::start_tag('h5', array('class' => 'categoryname aabtn'));
        $content .= $categoryname;
        $acontent = '';
        if ($viewmoreurl = $chelper->get_courses_display_option('viewmoreurl')) {
            $icon = '<svg class="ml-2" width="20" height="20" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.75 6.75L19.25 12L13.75 17.25"></path>
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H4.75"></path>
                    </svg>';
            // The option for 'View more' link was specified, display more link.
            $viewmoretext = $chelper->get_courses_display_option('viewmoretext', new \lang_string('viewmore'));
            // the option 'viewmoreurl' was specified, display more link (if it is link to category view page, add category id)
            if ($viewmoreurl->compare(new moodle_url('/course/index.php'), URL_MATCH_BASE)) {
                $viewmoreurl->param('categoryid', $coursecat->id);
            }
            $acontent .= html_writer::tag('div', html_writer::link($viewmoreurl, $viewmoretext . $icon, array('class' => 'btn btn-sm btn-info ml-2')));
        }
        $content .= '<div class="rui-number-of-courses d-inline-flex">' . html_writer::tag('span', $coursescount, array('class' => 'badge-sq badge-secondary')) . $acontent . '</div>';

        $content .= html_writer::end_tag('h5');

        $content .= html_writer::end_tag('div'); // .info

        // add category content to the output
        $content .= html_writer::tag('div', $categorycontent, array('class' => 'content'));

        $content .= html_writer::end_tag('div'); // .category

        // Return the course category tree HTML
        return $content;
    }
}
