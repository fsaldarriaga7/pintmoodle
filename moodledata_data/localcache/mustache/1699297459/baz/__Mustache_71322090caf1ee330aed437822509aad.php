<?php

class __Mustache_71322090caf1ee330aed437822509aad extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        if ($partial = $this->mustache->loadPartial('theme_baz/head')) {
            $buffer .= $partial->renderInternal($context);
        }
        $buffer .= $indent . '
';
        $buffer .= $indent . '<body ';
        $value = $this->resolveValue($context->find('bodyattributes'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '>
';
        if ($partial = $this->mustache->loadPartial('core/local/toast/wrapper')) {
            $buffer .= $partial->renderInternal($context, $indent . '    ');
        }
        $buffer .= $indent . '
';
        $buffer .= $indent . '    <div id="page-wrapper" class="d-print-block">
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '        ';
        $value = $this->resolveValue($context->findDot('output.standard_top_of_body_html'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '        <div id="page" class="container-fluid d-print-block p-0">
';
        $buffer .= $indent . '
';
        if ($partial = $this->mustache->loadPartial('theme_baz/navbar')) {
            $buffer .= $partial->renderInternal($context, $indent . '            ');
        }
        if ($partial = $this->mustache->loadPartial('theme_baz/navbar-secondary')) {
            $buffer .= $partial->renderInternal($context, $indent . '            ');
        }
        $buffer .= $indent . '            ';
        $value = $this->resolveValue($context->findDot('output.breadcrumbs'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '            <div id="page-content" class="page-content wrapper-xxl d-print-block">
';
        $value = $context->find('secondarymoremenu');
        $buffer .= $this->section4f721713009e54f14c799fa89336f6ee($context, $indent, $value);
        $buffer .= $indent . '                ';
        $value = $this->resolveValue($context->findDot('output.simple_header'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                <div id="region-main-box" class="region-main-wrapper">
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                    <section id="region-main" class="';
        $value = $context->find('hasblocks');
        $buffer .= $this->section8ae768dbd9f60a7f7df4aaf3cee7aa89($context, $indent, $value);
        $buffer .= ' region-main-content" aria-label="';
        $value = $context->find('str');
        $buffer .= $this->section6b403a6a78537640b9e04a931aeb6463($context, $indent, $value);
        $buffer .= '">
';
        $buffer .= $indent . '
';
        $value = $context->find('hasregionmainsettingsmenu');
        $buffer .= $this->sectionBfb58dd1d13a295db43bf0266e3aa6ee($context, $indent, $value);
        $buffer .= $indent . '                        ';
        $value = $this->resolveValue($context->findDot('output.course_content_header'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $value = $context->find('headercontent');
        $buffer .= $this->section72a93137fa43b727f40759a358d07ffb($context, $indent, $value);
        $value = $context->find('overflow');
        $buffer .= $this->sectionF3f40c79a313808a205c3cdaa8a00f38($context, $indent, $value);
        $buffer .= $indent . '                        ';
        $value = $this->resolveValue($context->findDot('output.main_content'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '                        ';
        $value = $this->resolveValue($context->findDot('output.activity_navigation'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '                        ';
        $value = $this->resolveValue($context->findDot('output.course_content_footer'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                    </section>
';
        $buffer .= $indent . '                </div>
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '
';
        if ($partial = $this->mustache->loadPartial('theme_baz/hasblocks-tmpl')) {
            $buffer .= $partial->renderInternal($context, $indent . '        ');
        }
        $buffer .= $indent . '
';
        $buffer .= $indent . '        ';
        $value = $this->resolveValue($context->findDot('output.standard_after_main_region_html'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        if ($partial = $this->mustache->loadPartial('theme_baz/footer')) {
            $buffer .= $partial->renderInternal($context, $indent . '        ');
        }
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $value = $context->find('js');
        $buffer .= $this->section1115999cab4f58732a50c8960bcafdb1($context, $indent, $value);
        $buffer .= $indent . '
';
        $buffer .= $indent . '    <script>
';
        $buffer .= $indent . '        if (document.getElementsByTagName("body")[0].id.match(/page-admin-setting-themesettingbaz/)) {
';
        $buffer .= $indent . '            for (let i = 1; i <= 19; i++) {
';
        $buffer .= $indent . '                var tempID = \'id_s_theme_baz_displayblock\' + i; // Checkboxes.
';
        $buffer .= $indent . '                var tempItemID = \'[data-settings-name="theme_baz_block\' + i + \'"]\'; // Navigation items.
';
        $buffer .= $indent . '                var tempFCBID = \'admin-block\' + i; // Content Builder Items.
';
        $buffer .= $indent . '                var checkBox = document.getElementById(tempID);
';
        $buffer .= $indent . '                var navItem = document.querySelector(tempItemID);
';
        $buffer .= $indent . '                var fcbItem = document.getElementById(tempFCBID);
';
        $buffer .= $indent . '                if (checkBox.checked == true) {
';
        $buffer .= $indent . '                    navItem.classList.add("rui--turnedon");
';
        $buffer .= $indent . '                    fcbItem.classList.add("rui--turnedon");
';
        $buffer .= $indent . '                } else {
';
        $buffer .= $indent . '                    navItem.style.opacity = "0.3";
';
        $buffer .= $indent . '                    fcbItem.style.opacity = "0.3";
';
        $buffer .= $indent . '                }
';
        $buffer .= $indent . '            }
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '            for (let i = 0; i <= 19; i++) {
';
        $buffer .= $indent . '                var selectID = \'id_s_theme_baz_block\' + i; // Select value.
';
        $buffer .= $indent . '                var tempFCBID = \'admin-block\' + i; // Content Builder Items.
';
        $buffer .= $indent . '                var fcbItem = document.getElementById(tempFCBID);
';
        $buffer .= $indent . '                var selectValue = document.getElementById(selectID).value;
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                fcbItem.dataset.blockPosition = selectValue;
';
        $buffer .= $indent . '                fcbItem.dataset.blockIndex = i;
';
        $buffer .= $indent . '                document.getElementById(selectID).dataset.blockIndex = i;
';
        $buffer .= $indent . '            }
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '            const buttons = document.getElementsByTagName("select");
';
        $buffer .= $indent . '            const buttonPressed = e => {
';
        $buffer .= $indent . '                var selectID = e.target.id; // Get ID of clicked element -> select
';
        $buffer .= $indent . '                var selectByID = document.getElementById(selectID).value; // Get ID of clicked element -> select
';
        $buffer .= $indent . '                var blIndex = document.getElementById(selectID).dataset.blockIndex; // Block number
';
        $buffer .= $indent . '                var wrapperID = \'admin-block\' + blIndex; // Wrapper ID
';
        $buffer .= $indent . '                var wrapperByID = document.getElementById(wrapperID);
';
        $buffer .= $indent . '                var selectValue = document.getElementById(selectID).value; // Get value - select
';
        $buffer .= $indent . '                wrapperByID.dataset.blockPosition = selectByID;
';
        $buffer .= $indent . '            }
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '            for (let button of buttons) {
';
        $buffer .= $indent . '                button.addEventListener("change", buttonPressed);
';
        $buffer .= $indent . '            }
';
        $buffer .= $indent . '        }
';
        $buffer .= $indent . '    </script>
';
        $value = $context->find('js');
        $buffer .= $this->section11dfeec789c88d76d6b38b4dd322477c($context, $indent, $value);
        $buffer .= $indent . '</body>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '</html>
';
        $value = $context->find('js');
        $buffer .= $this->section00b309a601825f82dc4c5195215b2a6a($context, $indent, $value);

        return $buffer;
    }

    private function section4f721713009e54f14c799fa89336f6ee(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                    <div class="secondary-navigation d-print-none">
                        {{> core/moremenu}}
                    </div>
                ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                    <div class="secondary-navigation d-print-none">
';
                if ($partial = $this->mustache->loadPartial('core/moremenu')) {
                    $buffer .= $partial->renderInternal($context, $indent . '                        ');
                }
                $buffer .= $indent . '                    </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section8ae768dbd9f60a7f7df4aaf3cee7aa89(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'has-blocks';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'has-blocks';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section6b403a6a78537640b9e04a931aeb6463(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'content';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'content';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionBfb58dd1d13a295db43bf0266e3aa6ee(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                            <div class="region_main_settings_menu_proxy"></div>
                        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                            <div class="region_main_settings_menu_proxy"></div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section72a93137fa43b727f40759a358d07ffb(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                            {{> core/activity_header }}
                        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                if ($partial = $this->mustache->loadPartial('core/activity_header')) {
                    $buffer .= $partial->renderInternal($context, $indent . '                            ');
                }
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionF3f40c79a313808a205c3cdaa8a00f38(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                            {{> core/url_select}}
                        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                if ($partial = $this->mustache->loadPartial('core/url_select')) {
                    $buffer .= $partial->renderInternal($context, $indent . '                            ');
                }
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section1115999cab4f58732a50c8960bcafdb1(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
        $(document).ready(function(){
        $("#page-admin-setting-themesettingbaz .tab-pane .rui-setting-heading-wrapper").nextUntil("#page-admin-setting-themesettingbaz .tab-pane .rui-setting-heading-wrapper").addClass("hidden");
        });
        $("#page-admin-setting-themesettingbaz .tab-pane .rui-setting-heading-wrapper").click(function() {
        $(this).nextUntil("#page-admin-setting-themesettingbaz .rui-setting-heading-wrapper").toggleClass("hidden");
        $(this).toggleClass("active");
        });
    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '        $(document).ready(function(){
';
                $buffer .= $indent . '        $("#page-admin-setting-themesettingbaz .tab-pane .rui-setting-heading-wrapper").nextUntil("#page-admin-setting-themesettingbaz .tab-pane .rui-setting-heading-wrapper").addClass("hidden");
';
                $buffer .= $indent . '        });
';
                $buffer .= $indent . '        $("#page-admin-setting-themesettingbaz .tab-pane .rui-setting-heading-wrapper").click(function() {
';
                $buffer .= $indent . '        $(this).nextUntil("#page-admin-setting-themesettingbaz .rui-setting-heading-wrapper").toggleClass("hidden");
';
                $buffer .= $indent . '        $(this).toggleClass("active");
';
                $buffer .= $indent . '        });
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section11dfeec789c88d76d6b38b4dd322477c(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
        var $wrapper = $(\'#theme_baz_scb\');
        $wrapper.find(\'.rui-settings-item\').sort(function (a, b) {
        return +a.dataset.blockPosition - +b.dataset.blockPosition;
        }).appendTo( $wrapper );


        $( \'[id^="id_s_theme_baz_block"]\' ).on( "change", function() {
        var $wrapper = $(\'#theme_baz_scb\');
        $wrapper.find(\'.rui-settings-item\').sort(function (a, b) {
        return +a.dataset.blockPosition - +b.dataset.blockPosition;
        }).appendTo( $wrapper );
        });
    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '        var $wrapper = $(\'#theme_baz_scb\');
';
                $buffer .= $indent . '        $wrapper.find(\'.rui-settings-item\').sort(function (a, b) {
';
                $buffer .= $indent . '        return +a.dataset.blockPosition - +b.dataset.blockPosition;
';
                $buffer .= $indent . '        }).appendTo( $wrapper );
';
                $buffer .= $indent . '
';
                $buffer .= $indent . '
';
                $buffer .= $indent . '        $( \'[id^="id_s_theme_baz_block"]\' ).on( "change", function() {
';
                $buffer .= $indent . '        var $wrapper = $(\'#theme_baz_scb\');
';
                $buffer .= $indent . '        $wrapper.find(\'.rui-settings-item\').sort(function (a, b) {
';
                $buffer .= $indent . '        return +a.dataset.blockPosition - +b.dataset.blockPosition;
';
                $buffer .= $indent . '        }).appendTo( $wrapper );
';
                $buffer .= $indent . '        });
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section00b309a601825f82dc4c5195215b2a6a(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
    M.util.js_pending(\'theme_baz/loader\');
    require([\'theme_baz/loader\', \'theme_baz/drawer\'], function(Loader, Drawer) {
    Drawer.init();
    M.util.js_complete(\'theme_baz/loader\');
    });
';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '    M.util.js_pending(\'theme_baz/loader\');
';
                $buffer .= $indent . '    require([\'theme_baz/loader\', \'theme_baz/drawer\'], function(Loader, Drawer) {
';
                $buffer .= $indent . '    Drawer.init();
';
                $buffer .= $indent . '    M.util.js_complete(\'theme_baz/loader\');
';
                $buffer .= $indent . '    });
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
