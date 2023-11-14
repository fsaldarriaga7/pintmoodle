<?php

class __Mustache_47553ca3bda5629d3119294075b29560 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<div class="d-md-inline-flex w-100">
';
        $buffer .= $indent . '    <div class="rui-nav--admin-container">
';
        $buffer .= $indent . '        <ul class="rui-nav--admin nav nav-column flex-md-column" role="tablist">
';
        $buffer .= $indent . '        <!-- First the top most node and immediate children -->
';
        $buffer .= $indent . '            <li class="nav-item">
';
        $buffer .= $indent . '                <a class="nav-link active" href="#link';
        $value = $this->resolveValue($context->findDot('node.key'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '" data-toggle="tab" role="tab" aria-selected="true">';
        $value = $this->resolveValue($context->findDot('node.text'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '</a>
';
        $buffer .= $indent . '            </li>
';
        $buffer .= $indent . '        <!-- Now the first level children with sub nodes -->
';
        $value = $context->findDot('node.children');
        $buffer .= $this->section3ec6b444648e9400078ed1673345a94f($context, $indent, $value);
        $buffer .= $indent . '        </ul>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    <div class="col tab-content px-0">
';
        $buffer .= $indent . '        <div class="tab-pane active" id="link';
        $value = $this->resolveValue($context->findDot('node.key'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '" role="tabpanel">
';
        $buffer .= $indent . '            <div class="rui-settings-container ml-md-4 px-0">
';
        $buffer .= $indent . '                <div class="row">
';
        $buffer .= $indent . '                    <div class="col-sm-12 col-md-3 pt-5">
';
        $buffer .= $indent . '                    </div>
';
        $buffer .= $indent . '                    <div class="col">
';
        $buffer .= $indent . '                        <ul class="list-unstyled rui-list-admin-links">
';
        $value = $context->findDot('node.children');
        $buffer .= $this->section36d38874b141b882b8109709daaa9926($context, $indent, $value);
        $buffer .= $indent . '                        </ul>
';
        $buffer .= $indent . '                    </div>
';
        $buffer .= $indent . '                </div>
';
        $buffer .= $indent . '
';
        $value = $context->findDot('node.children');
        $buffer .= $this->sectionBf08ae9773a4b09789b43a05d9acf483($context, $indent, $value);
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '        </div>
';
        $value = $context->findDot('node.children');
        $buffer .= $this->section1ae0386bbd73a1c2487e4af8df3e4c24($context, $indent, $value);
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '</div>
';

        return $buffer;
    }

    private function section25e708e678a90153ddf2c70b6a90e9f7(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                    {{^is_short_branch}}
                        <li class="nav-item">
                            <a class="nav-link" href="#link{{key}}" data-toggle="tab" role="tab" aria-selected="false" tabindex="-1">{{text}}</a>
                        </li>
                    {{/is_short_branch}}
                ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $value = $context->find('is_short_branch');
                if (empty($value)) {
                    
                    $buffer .= $indent . '                        <li class="nav-item">
';
                    $buffer .= $indent . '                            <a class="nav-link" href="#link';
                    $value = $this->resolveValue($context->find('key'), $context);
                    $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                    $buffer .= '" data-toggle="tab" role="tab" aria-selected="false" tabindex="-1">';
                    $value = $this->resolveValue($context->find('text'), $context);
                    $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                    $buffer .= '</a>
';
                    $buffer .= $indent . '                        </li>
';
                }
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionCfc2ab05a77f9ab5f6662c004c3b99cb(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                {{#display}}
                    {{^is_short_branch}}
                        <li class="nav-item">
                            <a class="nav-link" href="#link{{key}}" data-toggle="tab" role="tab" aria-selected="false" tabindex="-1">{{text}}</a>
                        </li>
                    {{/is_short_branch}}
                {{/display}}
            ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $value = $context->find('display');
                $buffer .= $this->section25e708e678a90153ddf2c70b6a90e9f7($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section3ec6b444648e9400078ed1673345a94f(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            {{#children.count}}
                {{#display}}
                    {{^is_short_branch}}
                        <li class="nav-item">
                            <a class="nav-link" href="#link{{key}}" data-toggle="tab" role="tab" aria-selected="false" tabindex="-1">{{text}}</a>
                        </li>
                    {{/is_short_branch}}
                {{/display}}
            {{/children.count}}
        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $value = $context->findDot('children.count');
                $buffer .= $this->sectionCfc2ab05a77f9ab5f6662c004c3b99cb($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section906410a0ec191fc2f21c801d97817b2e(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                        <li><a href="{{{action}}}">{{text}}</a></li>
                                    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                                        <li><a href="';
                $value = $this->resolveValue($context->find('action'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '">';
                $value = $this->resolveValue($context->find('text'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '</a></li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section36d38874b141b882b8109709daaa9926(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                {{^children.count}}
                                    {{#display}}
                                        <li><a href="{{{action}}}">{{text}}</a></li>
                                    {{/display}}
                                {{/children.count}}
                            ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $value = $context->findDot('children.count');
                if (empty($value)) {
                    
                    $value = $context->find('display');
                    $buffer .= $this->section906410a0ec191fc2f21c801d97817b2e($context, $indent, $value);
                }
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionC358db87c391e8a7ec3850f44764ad2d(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '<h4><a class="btn btn-xs btn-secondary" href="{{action}}">{{text}}</a></h4>';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= '<h4><a class="btn btn-xs btn-secondary" href="';
                $value = $this->resolveValue($context->find('action'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '">';
                $value = $this->resolveValue($context->find('text'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '</a></h4>';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionE2636ed0abcb943510fd2f38963a0af5(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                                {{> core/settings_link_page_single }}
                                            ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                if ($partial = $this->mustache->loadPartial('core/settings_link_page_single')) {
                    $buffer .= $partial->renderInternal($context, $indent . '                                                ');
                }
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section56025acf9694305a0fda5f499f758d59(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12 col-md-3">
                                        {{#action}}<h4><a class="btn btn-xs btn-secondary" href="{{action}}">{{text}}</a></h4>{{/action}}
                                        {{^action}}<h4 class="btn btn-xs btn-disabled">{{text}}</h4>{{/action}}
                                    </div>
                                    <div class="col">
                                        <ul class="list-unstyled rui-list-admin-links">
                                            {{#children}}
                                                {{> core/settings_link_page_single }}
                                            {{/children}}
                                        </ul>
                                    </div>
                                </div>
                            ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                                <hr>
';
                $buffer .= $indent . '                                <div class="row">
';
                $buffer .= $indent . '                                    <div class="col-sm-12 col-md-3">
';
                $buffer .= $indent . '                                        ';
                $value = $context->find('action');
                $buffer .= $this->sectionC358db87c391e8a7ec3850f44764ad2d($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '                                        ';
                $value = $context->find('action');
                if (empty($value)) {
                    
                    $buffer .= '<h4 class="btn btn-xs btn-disabled">';
                    $value = $this->resolveValue($context->find('text'), $context);
                    $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                    $buffer .= '</h4>';
                }
                $buffer .= '
';
                $buffer .= $indent . '                                    </div>
';
                $buffer .= $indent . '                                    <div class="col">
';
                $buffer .= $indent . '                                        <ul class="list-unstyled rui-list-admin-links">
';
                $value = $context->find('children');
                $buffer .= $this->sectionE2636ed0abcb943510fd2f38963a0af5($context, $indent, $value);
                $buffer .= $indent . '                                        </ul>
';
                $buffer .= $indent . '                                    </div>
';
                $buffer .= $indent . '                                </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionF0cc2a451caaa3987af5f83c794d7fb0(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                            {{#is_short_branch}}
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12 col-md-3">
                                        {{#action}}<h4><a class="btn btn-xs btn-secondary" href="{{action}}">{{text}}</a></h4>{{/action}}
                                        {{^action}}<h4 class="btn btn-xs btn-disabled">{{text}}</h4>{{/action}}
                                    </div>
                                    <div class="col">
                                        <ul class="list-unstyled rui-list-admin-links">
                                            {{#children}}
                                                {{> core/settings_link_page_single }}
                                            {{/children}}
                                        </ul>
                                    </div>
                                </div>
                            {{/is_short_branch}}
                        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $value = $context->find('is_short_branch');
                $buffer .= $this->section56025acf9694305a0fda5f499f758d59($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section281def8522b70c593cbed07a93d1bd9f(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                        {{#children.count}}
                            {{#is_short_branch}}
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12 col-md-3">
                                        {{#action}}<h4><a class="btn btn-xs btn-secondary" href="{{action}}">{{text}}</a></h4>{{/action}}
                                        {{^action}}<h4 class="btn btn-xs btn-disabled">{{text}}</h4>{{/action}}
                                    </div>
                                    <div class="col">
                                        <ul class="list-unstyled rui-list-admin-links">
                                            {{#children}}
                                                {{> core/settings_link_page_single }}
                                            {{/children}}
                                        </ul>
                                    </div>
                                </div>
                            {{/is_short_branch}}
                        {{/children.count}}
                    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $value = $context->findDot('children.count');
                $buffer .= $this->sectionF0cc2a451caaa3987af5f83c794d7fb0($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionBf08ae9773a4b09789b43a05d9acf483(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                    {{#display}}
                        {{#children.count}}
                            {{#is_short_branch}}
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12 col-md-3">
                                        {{#action}}<h4><a class="btn btn-xs btn-secondary" href="{{action}}">{{text}}</a></h4>{{/action}}
                                        {{^action}}<h4 class="btn btn-xs btn-disabled">{{text}}</h4>{{/action}}
                                    </div>
                                    <div class="col">
                                        <ul class="list-unstyled rui-list-admin-links">
                                            {{#children}}
                                                {{> core/settings_link_page_single }}
                                            {{/children}}
                                        </ul>
                                    </div>
                                </div>
                            {{/is_short_branch}}
                        {{/children.count}}
                    {{/display}}
                ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $value = $context->find('display');
                $buffer .= $this->section281def8522b70c593cbed07a93d1bd9f($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section9bea4e2a2c8e34e8326486ead858734c(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                            {{^children.count}}
                                                <li><a href="{{{action}}}">{{text}}</a></li>
                                            {{/children.count}}
                                        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $value = $context->findDot('children.count');
                if (empty($value)) {
                    
                    $buffer .= $indent . '                                                <li><a href="';
                    $value = $this->resolveValue($context->find('action'), $context);
                    $buffer .= ($value === null ? '' : $value);
                    $buffer .= '">';
                    $value = $this->resolveValue($context->find('text'), $context);
                    $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                    $buffer .= '</a></li>
';
                }
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionFdb1978ed2df2d5daa0368e707ed63c6(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                        {{#display}}
                                            {{^children.count}}
                                                <li><a href="{{{action}}}">{{text}}</a></li>
                                            {{/children.count}}
                                        {{/display}}
                                    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $value = $context->find('display');
                $buffer .= $this->section9bea4e2a2c8e34e8326486ead858734c($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionD515a2da18fbbccd4f69b486e89c6f10(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                                    {{> core/settings_link_page_single }}
                                                ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                if ($partial = $this->mustache->loadPartial('core/settings_link_page_single')) {
                    $buffer .= $partial->renderInternal($context, $indent . '                                                    ');
                }
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section49cc152cc41a8dfdbe76518de376920d(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-3 mt-1">
                                            {{#action}}<h4><a class="btn btn-xs btn-secondary" href="{{action}}">{{text}}</a></h4>{{/action}}
                                            {{^action}}<h4 class="btn btn-xs btn-disabled">{{text}}</h4>{{/action}}
                                        </div>
                                        <div class="col-sm-12 col-md-9">
                                            <ul class="list-unstyled rui-list-admin-links">
                                                {{#children}}
                                                    {{> core/settings_link_page_single }}
                                                {{/children}}
                                            </ul>
                                        </div>
                                    </div>
                                ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                                    <hr>
';
                $buffer .= $indent . '                                    <div class="row">
';
                $buffer .= $indent . '                                        <div class="col-sm-12 col-md-3 mt-1">
';
                $buffer .= $indent . '                                            ';
                $value = $context->find('action');
                $buffer .= $this->sectionC358db87c391e8a7ec3850f44764ad2d($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '                                            ';
                $value = $context->find('action');
                if (empty($value)) {
                    
                    $buffer .= '<h4 class="btn btn-xs btn-disabled">';
                    $value = $this->resolveValue($context->find('text'), $context);
                    $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                    $buffer .= '</h4>';
                }
                $buffer .= '
';
                $buffer .= $indent . '                                        </div>
';
                $buffer .= $indent . '                                        <div class="col-sm-12 col-md-9">
';
                $buffer .= $indent . '                                            <ul class="list-unstyled rui-list-admin-links">
';
                $value = $context->find('children');
                $buffer .= $this->sectionD515a2da18fbbccd4f69b486e89c6f10($context, $indent, $value);
                $buffer .= $indent . '                                            </ul>
';
                $buffer .= $indent . '                                        </div>
';
                $buffer .= $indent . '                                    </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section2f0655e537d85d272084f221c7385254(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                {{#children.count}}
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-3 mt-1">
                                            {{#action}}<h4><a class="btn btn-xs btn-secondary" href="{{action}}">{{text}}</a></h4>{{/action}}
                                            {{^action}}<h4 class="btn btn-xs btn-disabled">{{text}}</h4>{{/action}}
                                        </div>
                                        <div class="col-sm-12 col-md-9">
                                            <ul class="list-unstyled rui-list-admin-links">
                                                {{#children}}
                                                    {{> core/settings_link_page_single }}
                                                {{/children}}
                                            </ul>
                                        </div>
                                    </div>
                                {{/children.count}}
                            ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $value = $context->findDot('children.count');
                $buffer .= $this->section49cc152cc41a8dfdbe76518de376920d($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionCc2b346304965f79749d2207656669af(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                            {{#display}}
                                {{#children.count}}
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-3 mt-1">
                                            {{#action}}<h4><a class="btn btn-xs btn-secondary" href="{{action}}">{{text}}</a></h4>{{/action}}
                                            {{^action}}<h4 class="btn btn-xs btn-disabled">{{text}}</h4>{{/action}}
                                        </div>
                                        <div class="col-sm-12 col-md-9">
                                            <ul class="list-unstyled rui-list-admin-links">
                                                {{#children}}
                                                    {{> core/settings_link_page_single }}
                                                {{/children}}
                                            </ul>
                                        </div>
                                    </div>
                                {{/children.count}}
                            {{/display}}
                        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $value = $context->find('display');
                $buffer .= $this->section2f0655e537d85d272084f221c7385254($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section50dd493bcf8acdee36f7172a43e5e8ad(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                <div class="tab-pane" id="link{{key}}" role="tabpanel">
                    <div class="rui-settings-container ml-md-4 px-0">
                        <div class="row">
                            <div class="col-sm-12 col-md-3 mt-1">
                                {{#action}}<h4><a class="btn btn-xs btn-secondary" href="{{action}}">{{text}}</a></h4>{{/action}}
                                {{^action}}<h4 class="btn btn-xs btn-disabled">{{text}}</h4>{{/action}}
                            </div>
                            <div class="col-sm-12 col-md-9">
                                <ul class="list-unstyled rui-list-admin-links">
                                    {{#children}}
                                        {{#display}}
                                            {{^children.count}}
                                                <li><a href="{{{action}}}">{{text}}</a></li>
                                            {{/children.count}}
                                        {{/display}}
                                    {{/children}}
                                </ul>
                            </div>
                        </div>
                        {{#children}}
                            {{#display}}
                                {{#children.count}}
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-3 mt-1">
                                            {{#action}}<h4><a class="btn btn-xs btn-secondary" href="{{action}}">{{text}}</a></h4>{{/action}}
                                            {{^action}}<h4 class="btn btn-xs btn-disabled">{{text}}</h4>{{/action}}
                                        </div>
                                        <div class="col-sm-12 col-md-9">
                                            <ul class="list-unstyled rui-list-admin-links">
                                                {{#children}}
                                                    {{> core/settings_link_page_single }}
                                                {{/children}}
                                            </ul>
                                        </div>
                                    </div>
                                {{/children.count}}
                            {{/display}}
                        {{/children}}
                    </div>
                </div>
            ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                <div class="tab-pane" id="link';
                $value = $this->resolveValue($context->find('key'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" role="tabpanel">
';
                $buffer .= $indent . '                    <div class="rui-settings-container ml-md-4 px-0">
';
                $buffer .= $indent . '                        <div class="row">
';
                $buffer .= $indent . '                            <div class="col-sm-12 col-md-3 mt-1">
';
                $buffer .= $indent . '                                ';
                $value = $context->find('action');
                $buffer .= $this->sectionC358db87c391e8a7ec3850f44764ad2d($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '                                ';
                $value = $context->find('action');
                if (empty($value)) {
                    
                    $buffer .= '<h4 class="btn btn-xs btn-disabled">';
                    $value = $this->resolveValue($context->find('text'), $context);
                    $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                    $buffer .= '</h4>';
                }
                $buffer .= '
';
                $buffer .= $indent . '                            </div>
';
                $buffer .= $indent . '                            <div class="col-sm-12 col-md-9">
';
                $buffer .= $indent . '                                <ul class="list-unstyled rui-list-admin-links">
';
                $value = $context->find('children');
                $buffer .= $this->sectionFdb1978ed2df2d5daa0368e707ed63c6($context, $indent, $value);
                $buffer .= $indent . '                                </ul>
';
                $buffer .= $indent . '                            </div>
';
                $buffer .= $indent . '                        </div>
';
                $value = $context->find('children');
                $buffer .= $this->sectionCc2b346304965f79749d2207656669af($context, $indent, $value);
                $buffer .= $indent . '                    </div>
';
                $buffer .= $indent . '                </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section1ae0386bbd73a1c2487e4af8df3e4c24(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            {{#children.count}}
                <div class="tab-pane" id="link{{key}}" role="tabpanel">
                    <div class="rui-settings-container ml-md-4 px-0">
                        <div class="row">
                            <div class="col-sm-12 col-md-3 mt-1">
                                {{#action}}<h4><a class="btn btn-xs btn-secondary" href="{{action}}">{{text}}</a></h4>{{/action}}
                                {{^action}}<h4 class="btn btn-xs btn-disabled">{{text}}</h4>{{/action}}
                            </div>
                            <div class="col-sm-12 col-md-9">
                                <ul class="list-unstyled rui-list-admin-links">
                                    {{#children}}
                                        {{#display}}
                                            {{^children.count}}
                                                <li><a href="{{{action}}}">{{text}}</a></li>
                                            {{/children.count}}
                                        {{/display}}
                                    {{/children}}
                                </ul>
                            </div>
                        </div>
                        {{#children}}
                            {{#display}}
                                {{#children.count}}
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-3 mt-1">
                                            {{#action}}<h4><a class="btn btn-xs btn-secondary" href="{{action}}">{{text}}</a></h4>{{/action}}
                                            {{^action}}<h4 class="btn btn-xs btn-disabled">{{text}}</h4>{{/action}}
                                        </div>
                                        <div class="col-sm-12 col-md-9">
                                            <ul class="list-unstyled rui-list-admin-links">
                                                {{#children}}
                                                    {{> core/settings_link_page_single }}
                                                {{/children}}
                                            </ul>
                                        </div>
                                    </div>
                                {{/children.count}}
                            {{/display}}
                        {{/children}}
                    </div>
                </div>
            {{/children.count}}
        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $value = $context->findDot('children.count');
                $buffer .= $this->section50dd493bcf8acdee36f7172a43e5e8ad($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
