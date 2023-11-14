<?php

class __Mustache_ee0683c4ce4d4a9fc406d114a2ab9fcd extends Mustache_Template
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
        $buffer .= $indent . '    <div id="page-wrapper" class="d-print-block ';
        $value = $context->findDot('output.courseheadermenu');
        $buffer .= $this->section074790dc1144afd4e123c57768aa2ba7($context, $indent, $value);
        $buffer .= ' ';
        $value = $context->findDot('output.courseheadermenu');
        if (empty($value)) {
            
            $buffer .= 'rui--course-witout-nav';
        }
        $buffer .= '">
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '        ';
        $value = $this->resolveValue($context->findDot('output.standard_top_of_body_html'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '        ';
        $value = $context->find('hidecourseindexnav');
        if (empty($value)) {
            
            if ($partial = $this->mustache->loadPartial('theme_baz/courseindex-tmpl')) {
                $buffer .= $partial->renderInternal($context);
            }
        }
        $buffer .= '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '        <div id="page" data-region="mainpage" data-usertour="scroller" class="container-fluid d-print-block p-0 drawers ';
        $value = $context->find('courseindexopen');
        $buffer .= $this->section6b40e2748488de16028fd4032111cc9b($context, $indent, $value);
        $buffer .= ' ';
        $value = $context->find('blockdraweropen');
        $buffer .= $this->section05ab28b93094b30436e1224de5468efa($context, $indent, $value);
        $buffer .= ' drag-container">
';
        $buffer .= $indent . '
';
        if ($partial = $this->mustache->loadPartial('theme_baz/navbar')) {
            $buffer .= $partial->renderInternal($context, $indent . '            ');
        }
        if ($partial = $this->mustache->loadPartial('theme_baz/navbar-secondary')) {
            $buffer .= $partial->renderInternal($context, $indent . '            ');
        }
        $buffer .= $indent . '
';
        $buffer .= $indent . '            ';
        $value = $this->resolveValue($context->findDot('output.breadcrumbs'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '            <div id="topofscroll" class="main-inner">
';
        $buffer .= $indent . '                <div id="page-content" class="page-course-content">
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                    <div class="wrapper-md mt-3">
';
        $buffer .= $indent . '                        ';
        $value = $this->resolveValue($context->find('coursepageinformationbanners'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $value = $context->find('secondarymoremenu');
        $buffer .= $this->sectionA501d6821a65630aef1bb511db45b1e9($context, $indent, $value);
        $buffer .= $indent . '                    </div>
';
        $buffer .= $indent . '                    ';
        $value = $this->resolveValue($context->findDot('output.full_header'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '
';
        $value = $context->find('ipcourseimage');
        $buffer .= $this->sectionA6aea2b5a35eaed1714a0a1f1260be36($context, $indent, $value);
        $buffer .= $indent . '
';
        $value = $context->find('hasctopbl');
        $buffer .= $this->sectionE765ec706efb78d1163c88ee17eb1328($context, $indent, $value);
        $buffer .= $indent . '
';
        $buffer .= $indent . '                    <div id="region-main-box" class="region-main-wrapper page-margin-top--xl">
';
        $value = $context->find('hasregionmainsettingsmenu');
        $buffer .= $this->sectionC256d8b68326a7220c375a3be0ecbe19($context, $indent, $value);
        $buffer .= $indent . '
';
        $buffer .= $indent . '                        <section id="region-main" class="';
        $value = $context->find('hassidecourseblocks');
        $buffer .= $this->section79beb5cfa7b89bb67e7da9a67f96d7d7($context, $indent, $value);
        $buffer .= ' ';
        $value = $context->find('hassidecourseblocks');
        if (empty($value)) {
            
            $buffer .= 'wrapper-md';
        }
        $buffer .= '" aria-label="';
        $value = $context->find('str');
        $buffer .= $this->section6b403a6a78537640b9e04a931aeb6463($context, $indent, $value);
        $buffer .= '">
';
        $buffer .= $indent . '                            <div ';
        $value = $context->find('hassidecourseblocks');
        $buffer .= $this->sectionD8905ccc04d728da18e2b7776a7a7837($context, $indent, $value);
        $buffer .= '>
';
        $buffer .= $indent . '                                <div class="';
        $value = $context->find('hassidecourseblocks');
        $buffer .= $this->section8ce6577f7e0e34d379fdcf89cda2c95e($context, $indent, $value);
        $buffer .= '">
';
        $buffer .= $indent . '
';
        $value = $context->find('hascstopbl');
        $buffer .= $this->section58fb8a1fbe0deabfea41ffe1f0fd1e93($context, $indent, $value);
        $buffer .= $indent . '
';
        $buffer .= $indent . '                                    ';
        $value = $context->find('ipcourseimage');
        $buffer .= $this->section7d56fd5bb9bcde9753f989a16cebeaf8($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '
';
        $value = $context->find('hasregionmainsettingsmenu');
        $buffer .= $this->section47d38be224579d1e8081a7bd18f7754f($context, $indent, $value);
        $buffer .= $indent . '                                    ';
        $value = $this->resolveValue($context->findDot('output.course_content_header'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '
';
        $value = $context->find('headercontent');
        $buffer .= $this->section8e607540d8df0c21e13b683f47f49981($context, $indent, $value);
        $value = $context->find('overflow');
        $buffer .= $this->sectionDb044c4ea2ac5e922c6cab73a1513678($context, $indent, $value);
        $buffer .= $indent . '
';
        $buffer .= $indent . '                                    ';
        $value = $this->resolveValue($context->findDot('output.main_content'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '                                    ';
        $value = $this->resolveValue($context->findDot('output.activity_navigation'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '                                    ';
        $value = $this->resolveValue($context->findDot('output.course_content_footer'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '
';
        $value = $context->find('hascsbottombl');
        $buffer .= $this->section5da400aeb9adba436e24b2a0debe3f3c($context, $indent, $value);
        $buffer .= $indent . '
';
        $buffer .= $indent . '                                </div>
';
        $value = $context->find('hassidecourseblocks');
        $buffer .= $this->section7db7f9e5e29e17c4ada4d6777917e1d0($context, $indent, $value);
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                            </div>
';
        $buffer .= $indent . '                        </section>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                    </div>
';
        $buffer .= $indent . '
';
        $value = $context->find('hascbottombl');
        $buffer .= $this->sectionFecc850856e32c4b180a3ce9a1cd7bd3($context, $indent, $value);
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

    private function section074790dc1144afd4e123c57768aa2ba7(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'rui--course-with-nav';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'rui--course-with-nav';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section6b40e2748488de16028fd4032111cc9b(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'show-drawer-left';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'show-drawer-left';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section05ab28b93094b30436e1224de5468efa(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'show-drawer-right';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'show-drawer-right';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionA501d6821a65630aef1bb511db45b1e9(Mustache_Context $context, $indent, $value)
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
                
                $buffer .= $indent . '                            <div class="secondary-navigation d-print-none">
';
                if ($partial = $this->mustache->loadPartial('core/moremenu')) {
                    $buffer .= $partial->renderInternal($context, $indent . '                                ');
                }
                $buffer .= $indent . '                            </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section597bbff2e5b8fdb9105dd07241b40959(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                            <div class="rui-course-cover wrapper-xxl page-margin-top--xl">{{{ output.course_hero }}}</div>
                        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                            <div class="rui-course-cover wrapper-xxl page-margin-top--xl">';
                $value = $this->resolveValue($context->findDot('output.course_hero'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '</div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionA6aea2b5a35eaed1714a0a1f1260be36(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                        {{#courseimagefw}}
                            <div class="rui-course-cover wrapper-xxl page-margin-top--xl">{{{ output.course_hero }}}</div>
                        {{/courseimagefw}}
                    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $value = $context->find('courseimagefw');
                $buffer .= $this->section597bbff2e5b8fdb9105dd07241b40959($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionE765ec706efb78d1163c88ee17eb1328(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                        <div class="my-4 wrapper-xxl">
                            <section id="ctopbl" data-region="tmpl-course-blocks" class="rui-blocks-area">
                                {{{ ctopbl }}}
                            </section>
                        </div>
                    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                        <div class="my-4 wrapper-xxl">
';
                $buffer .= $indent . '                            <section id="ctopbl" data-region="tmpl-course-blocks" class="rui-blocks-area">
';
                $buffer .= $indent . '                                ';
                $value = $this->resolveValue($context->find('ctopbl'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '                            </section>
';
                $buffer .= $indent . '                        </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionC396334c8d01cbbc9c3fe11fdd5408e5(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'has-sidecourseblocks';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'has-sidecourseblocks';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionC256d8b68326a7220c375a3be0ecbe19(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                            <div id="region-main-settings-menu" class="rui-blocks-area {{#hassidecourseblocks}}has-sidecourseblocks{{/hassidecourseblocks}}">
                                <div> {{{ output.region_main_settings_menu }}} </div>
                            </div>
                        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                            <div id="region-main-settings-menu" class="rui-blocks-area ';
                $value = $context->find('hassidecourseblocks');
                $buffer .= $this->sectionC396334c8d01cbbc9c3fe11fdd5408e5($context, $indent, $value);
                $buffer .= '">
';
                $buffer .= $indent . '                                <div> ';
                $value = $this->resolveValue($context->findDot('output.region_main_settings_menu'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= ' </div>
';
                $buffer .= $indent . '                            </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section79beb5cfa7b89bb67e7da9a67f96d7d7(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'has-sidecourseblocks wrapper-has-blocks';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'has-sidecourseblocks wrapper-has-blocks';
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

    private function sectionD8905ccc04d728da18e2b7776a7a7837(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'class="blocks-wrapper d-inline-flex flex-wrap justify-content-between w-100" ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'class="blocks-wrapper d-inline-flex flex-wrap justify-content-between w-100" ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section8ce6577f7e0e34d379fdcf89cda2c95e(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'wrapper-blocks mx-0';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'wrapper-blocks mx-0';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section58fb8a1fbe0deabfea41ffe1f0fd1e93(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                        <section id="cstopbl" data-region="tmpl-course-blocks" class="rui-blocks-area">
                                            {{{ cstopbl }}}
                                        </section>
                                    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                                        <section id="cstopbl" data-region="tmpl-course-blocks" class="rui-blocks-area">
';
                $buffer .= $indent . '                                            ';
                $value = $this->resolveValue($context->find('cstopbl'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '                                        </section>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section3b211d3cb3a198f4bd0444ce782ad31b(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                            <div class="rui-course-cover mb-4">{{{ output.course_hero }}}</div>
                                        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= '
';
                $buffer .= $indent . '                                            <div class="rui-course-cover mb-4">';
                $value = $this->resolveValue($context->findDot('output.course_hero'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '</div>
';
                $buffer .= $indent . '                                        ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section7d56fd5bb9bcde9753f989a16cebeaf8(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '{{#courseimagecontent}}
                                            <div class="rui-course-cover mb-4">{{{ output.course_hero }}}</div>
                                        {{/courseimagecontent}}';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $value = $context->find('courseimagecontent');
                $buffer .= $this->section3b211d3cb3a198f4bd0444ce782ad31b($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section47d38be224579d1e8081a7bd18f7754f(Mustache_Context $context, $indent, $value)
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
                
                $buffer .= $indent . '                                        <div class="region_main_settings_menu_proxy"></div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section8e607540d8df0c21e13b683f47f49981(Mustache_Context $context, $indent, $value)
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
                    $buffer .= $partial->renderInternal($context, $indent . '                                        ');
                }
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionDb044c4ea2ac5e922c6cab73a1513678(Mustache_Context $context, $indent, $value)
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
                    $buffer .= $partial->renderInternal($context, $indent . '                                        ');
                }
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section5da400aeb9adba436e24b2a0debe3f3c(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                        <div>
                                            <section id="csbottombl" data-region="tmpl-course-blocks" class="rui-blocks-area">
                                                {{{ csbottombl }}}
                                            </section>
                                        </div>
                                    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                                        <div>
';
                $buffer .= $indent . '                                            <section id="csbottombl" data-region="tmpl-course-blocks" class="rui-blocks-area">
';
                $buffer .= $indent . '                                                ';
                $value = $this->resolveValue($context->find('csbottombl'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '                                            </section>
';
                $buffer .= $indent . '                                        </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section7db7f9e5e29e17c4ada4d6777917e1d0(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                    <div class="tmpl-course-blocks">
                                        <section id="sidecourseblocks" data-region="tmpl-incourse-blocks" class="rui-blocks-area">
                                            {{{ sidecourseblocks }}}
                                        </section>
                                    </div>
                                ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                                    <div class="tmpl-course-blocks">
';
                $buffer .= $indent . '                                        <section id="sidecourseblocks" data-region="tmpl-incourse-blocks" class="rui-blocks-area">
';
                $buffer .= $indent . '                                            ';
                $value = $this->resolveValue($context->find('sidecourseblocks'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '                                        </section>
';
                $buffer .= $indent . '                                    </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionFecc850856e32c4b180a3ce9a1cd7bd3(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                        <div class="mt-4 wrapper-xxl">
                            <section id="cbottombl" data-region="tmpl-course-blocks" class="rui-blocks-area">
                                {{{ cbottombl }}}
                            </section>
                        </div>
                    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                        <div class="mt-4 wrapper-xxl">
';
                $buffer .= $indent . '                            <section id="cbottombl" data-region="tmpl-course-blocks" class="rui-blocks-area">
';
                $buffer .= $indent . '                                ';
                $value = $this->resolveValue($context->find('cbottombl'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '                            </section>
';
                $buffer .= $indent . '                        </div>
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
