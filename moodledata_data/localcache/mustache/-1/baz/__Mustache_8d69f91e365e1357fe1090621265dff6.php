<?php

class __Mustache_8d69f91e365e1357fe1090621265dff6 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '
';
        $buffer .= $indent . '<nav id="topBar" class="text-black rui-topbar moodle-has-zindex ';
        $value = $context->findDot('output.custom_menu');
        $buffer .= $this->section010aa6f4e08815ab4a342e2589c47bc0($context, $indent, $value);
        $buffer .= '" aria-label="';
        $value = $context->find('str');
        $buffer .= $this->section1880a930791c830b67e23ff34b5a4123($context, $indent, $value);
        $buffer .= '">
';
        $buffer .= $indent . '
';
        $value = $context->find('isnotloggedin');
        if (empty($value)) {
            
            $value = $context->find('topbarhamburgermenu');
            $buffer .= $this->section79ab49d5eeea9892806d578b867da947($context, $indent, $value);
        }
        $buffer .= $indent . '
';
        $buffer .= $indent . '    <a id="logo" href="';
        $value = $this->resolveValue($context->findDot('config.wwwroot'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '" class="d-none d-md-inline-flex rui-navbar-brand ';
        $value = $context->find('customlogo');
        $buffer .= $this->section78809003afd3b387d5b09e8f52115182($context, $indent, $value);
        $buffer .= ' aabtn ';
        $value = $context->findDot('output.should_display_navbar_logo');
        $buffer .= $this->sectionE1b7734efa381e40cb6792ff2d8c4194($context, $indent, $value);
        $buffer .= '">
';
        $value = $context->find('customlogo');
        $buffer .= $this->section0b7b8e3a051bcc63b50be2e4bafd4cea($context, $indent, $value);
        $buffer .= $indent . '
';
        $value = $context->find('customlogo');
        if (empty($value)) {
            
            $buffer .= $indent . '            <span class="site-name">';
            $value = $this->resolveValue($context->find('sitename'), $context);
            $buffer .= ($value === null ? '' : $value);
            $buffer .= '</span>
';
        }
        $buffer .= $indent . '    </a>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    ';
        $value = $this->resolveValue($context->findDot('output.render_lang_menu'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $value = $context->findDot('output.custom_menu');
        $buffer .= $this->section3e5f3a10dc2d557988d98d435f30b5ff($context, $indent, $value);
        $buffer .= $indent . '
';
        $buffer .= $indent . '        <div id="topbarRight" class="rui-navbar--right d-inline-flex ml-auto pl-3 rui-navbar-nav--sep">
';
        $buffer .= $indent . '            
';
        $value = $context->find('isnotloggedin');
        if (empty($value)) {
            
            $buffer .= $indent . '            <div class="rui-navbar-nav">
';
            $buffer .= $indent . '                ';
            $value = $this->resolveValue($context->findDot('output.search_box'), $context);
            $buffer .= ($value === null ? '' : $value);
            $buffer .= '
';
            $buffer .= $indent . '            </div>
';
        }
        $buffer .= $indent . '            <ul class="rui-navbar-nav d-inline-flex m-0 p-0">
';
        $buffer .= $indent . '                <span class="nav-item mobile-sticky-nav">
';
        $value = $context->find('darkmodetheme');
        $buffer .= $this->section75e3dcceef3f169be5787d598304b4e4($context, $indent, $value);
        $buffer .= $indent . '                    ';
        $value = $context->findDot('output.adminheaderlink');
        $buffer .= $this->sectionD4d56e064b3d3c17b17413a7738f541b($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '                </span>
';
        $buffer .= $indent . '                <!-- navbar_plugin_output -->
';
        $buffer .= $indent . '                <li class="nav-item mr-1">
';
        $buffer .= $indent . '                    ';
        $value = $this->resolveValue($context->findDot('output.navbar_plugin_output'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '                </li>
';
        $buffer .= $indent . '                <!-- user_menu -->
';
        $buffer .= $indent . '                <li class="nav-item align-items-center ml-1 ml-md-0">
';
        $buffer .= $indent . '                    ';
        $value = $this->resolveValue($context->findDot('output.user_menu'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '                </li>
';
        $value = $context->find('isnotloggedin');
        $buffer .= $this->sectionD81a90272a0205dfa4cf3483d4992af9($context, $indent, $value);
        $buffer .= $indent . '            </ul>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '</nav>';

        return $buffer;
    }

    private function section010aa6f4e08815ab4a342e2589c47bc0(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'rui-topbar--custom-menu';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'rui-topbar--custom-menu';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section1880a930791c830b67e23ff34b5a4123(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'sitemenubar, admin';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'sitemenubar, admin';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section79ab49d5eeea9892806d578b867da947(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            <div class="rui-main-menu-container dropdown mr-2 text-black">
                <a href="#" class="rui-main-menu-btn" id="mainNav" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.75 5.75H14.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M4.75 18.25H14.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M4.75 12H19.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </a>

                <div aria-labelledby="mainNav" class="dropdown-menu rui-dropdown-main-menu">
                    <div class="rui-main-menu-wrapper" data-simplebar data-simplebar-auto-hide="false">{{> theme_baz/flat_navigation }}</div>
                </div>
            </div>
        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '            <div class="rui-main-menu-container dropdown mr-2 text-black">
';
                $buffer .= $indent . '                <a href="#" class="rui-main-menu-btn" id="mainNav" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="icon">
';
                $buffer .= $indent . '                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
';
                $buffer .= $indent . '                        <path d="M4.75 5.75H14.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
';
                $buffer .= $indent . '                        <path d="M4.75 18.25H14.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
';
                $buffer .= $indent . '                        <path d="M4.75 12H19.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
';
                $buffer .= $indent . '                    </svg>
';
                $buffer .= $indent . '                </a>
';
                $buffer .= $indent . '
';
                $buffer .= $indent . '                <div aria-labelledby="mainNav" class="dropdown-menu rui-dropdown-main-menu">
';
                $buffer .= $indent . '                    <div class="rui-main-menu-wrapper" data-simplebar data-simplebar-auto-hide="false">';
                if ($partial = $this->mustache->loadPartial('theme_baz/flat_navigation')) {
                    $buffer .= $partial->renderInternal($context);
                }
                $buffer .= '</div>
';
                $buffer .= $indent . '                </div>
';
                $buffer .= $indent . '            </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section78809003afd3b387d5b09e8f52115182(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'rui-navbar-brand--img';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'rui-navbar-brand--img';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionE1b7734efa381e40cb6792ff2d8c4194(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'has-logo';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'has-logo';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionEdc9335cdea4f16da50b5f541bcc47c3(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'rui-logo-box';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'rui-logo-box';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section0b7b8e3a051bcc63b50be2e4bafd4cea(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            <span class="rui-logo {{#logocontainer}}rui-logo-box{{/logocontainer}} {{^logocontainer}}rui-logo-ml{{/logocontainer}}">
                <img src="{{customlogo}}" alt="{{sitename}}" />
            </span>
        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '            <span class="rui-logo ';
                $value = $context->find('logocontainer');
                $buffer .= $this->sectionEdc9335cdea4f16da50b5f541bcc47c3($context, $indent, $value);
                $buffer .= ' ';
                $value = $context->find('logocontainer');
                if (empty($value)) {
                    
                    $buffer .= 'rui-logo-ml';
                }
                $buffer .= '">
';
                $buffer .= $indent . '                <img src="';
                $value = $this->resolveValue($context->find('customlogo'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" alt="';
                $value = $this->resolveValue($context->find('sitename'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" />
';
                $buffer .= $indent . '            </span>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionE8d02550eef8dd78cfe22b730ceb5426(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'tablist';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'tablist';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section5749c750acb0d7477dd5257d00cc6d53(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'active';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'active';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionC225dbeabea012d1739058de23648ffe(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'tab';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'tab';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionB14b1a0b78635b6bb0b8dff1f96c6ec8(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            require([\'core/moremenu\'], function(moremenu) {
            moremenu(document.querySelector(\'#moremenu-topbar\'));
            });
        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '            require([\'core/moremenu\'], function(moremenu) {
';
                $buffer .= $indent . '            moremenu(document.querySelector(\'#moremenu-topbar\'));
';
                $buffer .= $indent . '            });
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section3e5f3a10dc2d557988d98d435f30b5ff(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
        <div class="primary-navigation">
            <nav class="moremenu navigation">
                <ul id="moremenu-topbar" role="{{#istablist}}tablist{{/istablist}}{{^istablist}}menubar{{/istablist}}" class="d-inline-flex align-items-center nav more-nav">
                    {{{.}}}
                    <li role="none" class="dropdown dropdownmoremenu morebutton d-none" data-region="morebutton">
                        <a class="btn btn-icon btn--more nav-link p-0 {{#isactive}}active{{/isactive}}" href="#" id="moremenu-dropdown-topbar" role="{{#istablist}}tab{{/istablist}}{{^istablist}}menuitem{{/istablist}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" tabindex="-1">
                            <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M13 12C13 12.5523 12.5523 13 12 13C11.4477 13 11 12.5523 11 12C11 11.4477 11.4477 11 12 11C12.5523 11 13 11.4477 13 12Z"></path>
                                <path fill="currentColor" d="M13 8C13 8.55228 12.5523 9 12 9C11.4477 9 11 8.55228 11 8C11 7.44772 11.4477 7 12 7C12.5523 7 13 7.44772 13 8Z"></path>
                                <path fill="currentColor" d="M13 16C13 16.5523 12.5523 17 12 17C11.4477 17 11 16.5523 11 16C11 15.4477 11.4477 15 12 15C12.5523 15 13 15.4477 13 16Z"></path>
                            </svg>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-left" data-region="moredropdown" aria-labelledby="moremenu-dropdown-topbar" role="menu">
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
        {{#js}}
            require([\'core/moremenu\'], function(moremenu) {
            moremenu(document.querySelector(\'#moremenu-topbar\'));
            });
        {{/js}}
        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '        <div class="primary-navigation">
';
                $buffer .= $indent . '            <nav class="moremenu navigation">
';
                $buffer .= $indent . '                <ul id="moremenu-topbar" role="';
                $value = $context->find('istablist');
                $buffer .= $this->sectionE8d02550eef8dd78cfe22b730ceb5426($context, $indent, $value);
                $value = $context->find('istablist');
                if (empty($value)) {
                    
                    $buffer .= 'menubar';
                }
                $buffer .= '" class="d-inline-flex align-items-center nav more-nav">
';
                $buffer .= $indent . '                    ';
                $value = $this->resolveValue($context->last(), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '                    <li role="none" class="dropdown dropdownmoremenu morebutton d-none" data-region="morebutton">
';
                $buffer .= $indent . '                        <a class="btn btn-icon btn--more nav-link p-0 ';
                $value = $context->find('isactive');
                $buffer .= $this->section5749c750acb0d7477dd5257d00cc6d53($context, $indent, $value);
                $buffer .= '" href="#" id="moremenu-dropdown-topbar" role="';
                $value = $context->find('istablist');
                $buffer .= $this->sectionC225dbeabea012d1739058de23648ffe($context, $indent, $value);
                $value = $context->find('istablist');
                if (empty($value)) {
                    
                    $buffer .= 'menuitem';
                }
                $buffer .= '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" tabindex="-1">
';
                $buffer .= $indent . '                            <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
';
                $buffer .= $indent . '                                <path fill="currentColor" d="M13 12C13 12.5523 12.5523 13 12 13C11.4477 13 11 12.5523 11 12C11 11.4477 11.4477 11 12 11C12.5523 11 13 11.4477 13 12Z"></path>
';
                $buffer .= $indent . '                                <path fill="currentColor" d="M13 8C13 8.55228 12.5523 9 12 9C11.4477 9 11 8.55228 11 8C11 7.44772 11.4477 7 12 7C12.5523 7 13 7.44772 13 8Z"></path>
';
                $buffer .= $indent . '                                <path fill="currentColor" d="M13 16C13 16.5523 12.5523 17 12 17C11.4477 17 11 16.5523 11 16C11 15.4477 11.4477 15 12 15C12.5523 15 13 15.4477 13 16Z"></path>
';
                $buffer .= $indent . '                            </svg>
';
                $buffer .= $indent . '                        </a>
';
                $buffer .= $indent . '                        <ul class="dropdown-menu dropdown-menu-left" data-region="moredropdown" aria-labelledby="moremenu-dropdown-topbar" role="menu">
';
                $buffer .= $indent . '                        </ul>
';
                $buffer .= $indent . '                    </li>
';
                $buffer .= $indent . '                </ul>
';
                $buffer .= $indent . '            </nav>
';
                $buffer .= $indent . '        </div>
';
                $value = $context->find('js');
                $buffer .= $this->sectionB14b1a0b78635b6bb0b8dff1f96c6ec8($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section3d4b7e3adb9917c66a0b9d5567227f40(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' data-title="{{{sdarkmode}}}" ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' data-title="';
                $value = $this->resolveValue($context->find('sdarkmode'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '" ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section75e3dcceef3f169be5787d598304b4e4(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                        <li class="nav-item rui-icon-menu-darkmode mx-1">
                            <button id="darkModeBtn" class="nav-link btn--darkmode" aria-checked="false" type="button" data-preference="darkmode-on" data-toggle="tooltip" data-placement="bottom" {{^sdarkmode}}data-title="Dark Mode" {{/sdarkmode}} {{#sdarkmode}} data-title="{{{sdarkmode}}}" {{/sdarkmode}}>
                                <div class="rui-dark-mode-status--on"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16ZM12 18C15.3137 18 18 15.3137 18 12C18 8.68629 15.3137 6 12 6C8.68629 6 6 8.68629 6 12C6 15.3137 8.68629 18 12 18Z" fill="currentColor" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11 0H13V4.06189C12.6724 4.02104 12.3387 4 12 4C11.6613 4 11.3276 4.02104 11 4.06189V0ZM7.0943 5.68018L4.22173 2.80761L2.80752 4.22183L5.6801 7.09441C6.09071 6.56618 6.56608 6.0908 7.0943 5.68018ZM4.06189 11H0V13H4.06189C4.02104 12.6724 4 12.3387 4 12C4 11.6613 4.02104 11.3276 4.06189 11ZM5.6801 16.9056L2.80751 19.7782L4.22173 21.1924L7.0943 18.3198C6.56608 17.9092 6.09071 17.4338 5.6801 16.9056ZM11 19.9381V24H13V19.9381C12.6724 19.979 12.3387 20 12 20C11.6613 20 11.3276 19.979 11 19.9381ZM16.9056 18.3199L19.7781 21.1924L21.1923 19.7782L18.3198 16.9057C17.9092 17.4339 17.4338 17.9093 16.9056 18.3199ZM19.9381 13H24V11H19.9381C19.979 11.3276 20 11.6613 20 12C20 12.3387 19.979 12.6724 19.9381 13ZM18.3198 7.0943L21.1923 4.22183L19.7781 2.80762L16.9056 5.6801C17.4338 6.09071 17.9092 6.56608 18.3198 7.0943Z" fill="currentColor" />
                                    </svg></div>
                                <div class="rui-dark-mode-status--off"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2256 2.00253C9.59172 1.94346 6.93894 2.9189 4.92893 4.92891C1.02369 8.83415 1.02369 15.1658 4.92893 19.071C8.83418 22.9763 15.1658 22.9763 19.0711 19.071C21.0811 17.061 22.0565 14.4082 21.9975 11.7743C21.9796 10.9772 21.8669 10.1818 21.6595 9.40643C21.0933 9.9488 20.5078 10.4276 19.9163 10.8425C18.5649 11.7906 17.1826 12.4053 15.9301 12.6837C14.0241 13.1072 12.7156 12.7156 12 12C11.2844 11.2844 10.8928 9.97588 11.3163 8.0699C11.5947 6.81738 12.2094 5.43511 13.1575 4.08368C13.5724 3.49221 14.0512 2.90664 14.5935 2.34046C13.8182 2.13305 13.0228 2.02041 12.2256 2.00253ZM17.6569 17.6568C18.9081 16.4056 19.6582 14.8431 19.9072 13.2186C16.3611 15.2643 12.638 15.4664 10.5858 13.4142C8.53361 11.362 8.73568 7.63895 10.7814 4.09281C9.1569 4.34184 7.59434 5.09193 6.34315 6.34313C3.21895 9.46732 3.21895 14.5326 6.34315 17.6568C9.46734 20.781 14.5327 20.781 17.6569 17.6568Z" fill="currentColor" />
                                    </svg></div>
                            </button>
                        </li>
                    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                        <li class="nav-item rui-icon-menu-darkmode mx-1">
';
                $buffer .= $indent . '                            <button id="darkModeBtn" class="nav-link btn--darkmode" aria-checked="false" type="button" data-preference="darkmode-on" data-toggle="tooltip" data-placement="bottom" ';
                $value = $context->find('sdarkmode');
                if (empty($value)) {
                    
                    $buffer .= 'data-title="Dark Mode" ';
                }
                $buffer .= ' ';
                $value = $context->find('sdarkmode');
                $buffer .= $this->section3d4b7e3adb9917c66a0b9d5567227f40($context, $indent, $value);
                $buffer .= '>
';
                $buffer .= $indent . '                                <div class="rui-dark-mode-status--on"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
';
                $buffer .= $indent . '                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16ZM12 18C15.3137 18 18 15.3137 18 12C18 8.68629 15.3137 6 12 6C8.68629 6 6 8.68629 6 12C6 15.3137 8.68629 18 12 18Z" fill="currentColor" />
';
                $buffer .= $indent . '                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11 0H13V4.06189C12.6724 4.02104 12.3387 4 12 4C11.6613 4 11.3276 4.02104 11 4.06189V0ZM7.0943 5.68018L4.22173 2.80761L2.80752 4.22183L5.6801 7.09441C6.09071 6.56618 6.56608 6.0908 7.0943 5.68018ZM4.06189 11H0V13H4.06189C4.02104 12.6724 4 12.3387 4 12C4 11.6613 4.02104 11.3276 4.06189 11ZM5.6801 16.9056L2.80751 19.7782L4.22173 21.1924L7.0943 18.3198C6.56608 17.9092 6.09071 17.4338 5.6801 16.9056ZM11 19.9381V24H13V19.9381C12.6724 19.979 12.3387 20 12 20C11.6613 20 11.3276 19.979 11 19.9381ZM16.9056 18.3199L19.7781 21.1924L21.1923 19.7782L18.3198 16.9057C17.9092 17.4339 17.4338 17.9093 16.9056 18.3199ZM19.9381 13H24V11H19.9381C19.979 11.3276 20 11.6613 20 12C20 12.3387 19.979 12.6724 19.9381 13ZM18.3198 7.0943L21.1923 4.22183L19.7781 2.80762L16.9056 5.6801C17.4338 6.09071 17.9092 6.56608 18.3198 7.0943Z" fill="currentColor" />
';
                $buffer .= $indent . '                                    </svg></div>
';
                $buffer .= $indent . '                                <div class="rui-dark-mode-status--off"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
';
                $buffer .= $indent . '                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2256 2.00253C9.59172 1.94346 6.93894 2.9189 4.92893 4.92891C1.02369 8.83415 1.02369 15.1658 4.92893 19.071C8.83418 22.9763 15.1658 22.9763 19.0711 19.071C21.0811 17.061 22.0565 14.4082 21.9975 11.7743C21.9796 10.9772 21.8669 10.1818 21.6595 9.40643C21.0933 9.9488 20.5078 10.4276 19.9163 10.8425C18.5649 11.7906 17.1826 12.4053 15.9301 12.6837C14.0241 13.1072 12.7156 12.7156 12 12C11.2844 11.2844 10.8928 9.97588 11.3163 8.0699C11.5947 6.81738 12.2094 5.43511 13.1575 4.08368C13.5724 3.49221 14.0512 2.90664 14.5935 2.34046C13.8182 2.13305 13.0228 2.02041 12.2256 2.00253ZM17.6569 17.6568C18.9081 16.4056 19.6582 14.8431 19.9072 13.2186C16.3611 15.2643 12.638 15.4664 10.5858 13.4142C8.53361 11.362 8.73568 7.63895 10.7814 4.09281C9.1569 4.34184 7.59434 5.09193 6.34315 6.34313C3.21895 9.46732 3.21895 14.5326 6.34315 17.6568C9.46734 20.781 14.5327 20.781 17.6569 17.6568Z" fill="currentColor" />
';
                $buffer .= $indent . '                                    </svg></div>
';
                $buffer .= $indent . '                            </button>
';
                $buffer .= $indent . '                        </li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionD4d56e064b3d3c17b17413a7738f541b(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '<li class="nav-item rui-icon-menu-admin mr-1">{{{output.adminheaderlink}}}</li>';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= '<li class="nav-item rui-icon-menu-admin mr-1">';
                $value = $this->resolveValue($context->findDot('output.adminheaderlink'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '</li>';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section43cb3d58add12d9f8e000f480c4e85ee(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                    <a class="rui-topbar-btn rui-signup-btn" href="{{topbaradditionalbtnurl}}">
                        <span class="rui-login-btn-txt">{{{stopbaradditionalbtn}}}</span>
                    </a>
                    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                    <a class="rui-topbar-btn rui-signup-btn" href="';
                $value = $this->resolveValue($context->find('topbaradditionalbtnurl'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '">
';
                $buffer .= $indent . '                        <span class="rui-login-btn-txt">';
                $value = $this->resolveValue($context->find('stopbaradditionalbtn'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '</span>
';
                $buffer .= $indent . '                    </a>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section86770cae47d1ccfea1ee227cf9e5679a(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                <li class="ml-1">
                    {{#topbaradditionalbtnurl}}
                    <a class="rui-topbar-btn rui-signup-btn" href="{{topbaradditionalbtnurl}}">
                        <span class="rui-login-btn-txt">{{{stopbaradditionalbtn}}}</span>
                    </a>
                    {{/topbaradditionalbtnurl}}
                    {{{topbaradditionalbtnhtml}}}
                </li>
                ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                <li class="ml-1">
';
                $value = $context->find('topbaradditionalbtnurl');
                $buffer .= $this->section43cb3d58add12d9f8e000f480c4e85ee($context, $indent, $value);
                $buffer .= $indent . '                    ';
                $value = $this->resolveValue($context->find('topbaradditionalbtnhtml'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '                </li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionD81a90272a0205dfa4cf3483d4992af9(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                {{#topbaradditionalbtn}}
                <li class="ml-1">
                    {{#topbaradditionalbtnurl}}
                    <a class="rui-topbar-btn rui-signup-btn" href="{{topbaradditionalbtnurl}}">
                        <span class="rui-login-btn-txt">{{{stopbaradditionalbtn}}}</span>
                    </a>
                    {{/topbaradditionalbtnurl}}
                    {{{topbaradditionalbtnhtml}}}
                </li>
                {{/topbaradditionalbtn}}
                ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $value = $context->find('topbaradditionalbtn');
                $buffer .= $this->section86770cae47d1ccfea1ee227cf9e5679a($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
