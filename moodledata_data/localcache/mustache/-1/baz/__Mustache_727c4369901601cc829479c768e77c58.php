<?php

class __Mustache_727c4369901601cc829479c768e77c58 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $value = $context->find('sectionbulk');
        $buffer .= $this->section706c56dfe6b597e24bc6415c5dd56bb8($context, $indent, $value);
        $value = $context->find('headerdisplaymultipage');
        $buffer .= $this->section977dbf113c23200d2f396737c13b82c3($context, $indent, $value);
        $value = $context->find('headerdisplaymultipage');
        if (empty($value)) {
            
            $value = $context->find('sitehome');
            $buffer .= $this->section870988d7777f07f79c60c0fb837f2c87($context, $indent, $value);
            $value = $context->find('sitehome');
            if (empty($value)) {
                
                $buffer .= $indent . '        <div class="rui-course-header-btn d-flex align-items-start position-relative col">
';
                $buffer .= $indent . '            <a role="button" data-toggle="collapse"
';
                $buffer .= $indent . '                data-toggle="collapse"
';
                $buffer .= $indent . '                data-for="sectiontoggler"
';
                $buffer .= $indent . '               href="#coursecontentcollapse';
                $value = $this->resolveValue($context->find('num'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '"
';
                $buffer .= $indent . '               id="collapssesection';
                $value = $this->resolveValue($context->find('num'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '"
';
                $buffer .= $indent . '               aria-expanded="';
                $value = $context->find('contentcollapsed');
                if (empty($value)) {
                    
                    $buffer .= 'true';
                }
                $value = $context->find('contentcollapsed');
                $buffer .= $this->section3d743337d1ee557b470226701b73da47($context, $indent, $value);
                $buffer .= '"
';
                $buffer .= $indent . '               aria-controls="coursecontentcollapse';
                $value = $this->resolveValue($context->find('num'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '"
';
                $buffer .= $indent . '               class="rui-course-header-btn-icon icons-collapse-expand justify-content-center
';
                $buffer .= $indent . '                   ';
                $value = $context->find('editing');
                if (empty($value)) {
                    
                    $buffer .= ' stretched-link ';
                }
                $buffer .= '
';
                $buffer .= $indent . '                   ';
                $value = $context->find('contentcollapsed');
                $buffer .= $this->sectionE27d58bd82bf887495509fb3582d0729($context, $indent, $value);
                $buffer .= '"
';
                $buffer .= $indent . '               aria-label="';
                $value = $this->resolveValue($context->find('name'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '">
';
                $buffer .= $indent . '                    <span class="icon expanded-icon" title="';
                $value = $context->find('str');
                $buffer .= $this->section0ac795c23146489fad8f951c23f9a92a($context, $indent, $value);
                $buffer .= '">
';
                $buffer .= $indent . '                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
';
                $buffer .= $indent . '                        <path d="M12 15.25L16.25 9.75H7.75L12 15.25Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
';
                $buffer .= $indent . '                        </svg>
';
                $buffer .= $indent . '                    </span>
';
                $buffer .= $indent . '                    <span class="icon collapsed-icon" title="';
                $value = $context->find('str');
                $buffer .= $this->section8b5765485c94c190bf567731edb08c3a($context, $indent, $value);
                $buffer .= '">
';
                $buffer .= $indent . '                        <span class="dir-rtl-hide">
';
                $buffer .= $indent . '                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
';
                $buffer .= $indent . '                                <path d="M14.25 12L8.75 7.75V16.25L14.25 12Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
';
                $buffer .= $indent . '                            </svg>
';
                $buffer .= $indent . '                        </span>
';
                $buffer .= $indent . '                        <span class="dir-ltr-hide">
';
                $buffer .= $indent . '                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
';
                $buffer .= $indent . '                                <path d="M8.75 12L14.25 7.75V16.25L8.75 12Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
';
                $buffer .= $indent . '                            </svg>
';
                $buffer .= $indent . '                        </span>
';
                $buffer .= $indent . '                    </span>
';
                $buffer .= $indent . '            </a>
';
                $buffer .= $indent . '            <h3 class="sectionname course-content-item d-flex align-self-stretch align-items-center mb-0"
';
                $buffer .= $indent . '                id="sectionid-';
                $value = $this->resolveValue($context->find('id'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '-title" data-for="section_title" data-id="';
                $value = $this->resolveValue($context->find('id'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" data-number="';
                $value = $this->resolveValue($context->find('num'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '">
';
                $buffer .= $indent . '                ';
                $value = $this->resolveValue($context->find('title'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '            </h3>
';
                $buffer .= $indent . '        </div>
';
            }
        }

        return $buffer;
    }

    private function section706c56dfe6b597e24bc6415c5dd56bb8(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
{{$ core_courseformat/local/content/section/bulkselect }}
    {{> core_courseformat/local/content/section/bulkselect }}
{{/ core_courseformat/local/content/section/bulkselect }}
';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $blockFunction = $context->findInBlock('core_courseformat/local/content/section/bulkselect');
                if (is_callable($blockFunction)) {
                    $buffer .= call_user_func($blockFunction, $context);
                } else {
                    if ($partial = $this->mustache->loadPartial('core_courseformat/local/content/section/bulkselect')) {
                        $buffer .= $partial->renderInternal($context, $indent . '    ');
                    }
                }
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section977dbf113c23200d2f396737c13b82c3(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
    <h3 id="sectionid-{{id}}-title" class="rui-course-format-card sectionname">
        {{{title}}}
    </h3>
';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '    <h3 id="sectionid-';
                $value = $this->resolveValue($context->find('id'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '-title" class="rui-course-format-card sectionname">
';
                $buffer .= $indent . '        ';
                $value = $this->resolveValue($context->find('title'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '    </h3>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section870988d7777f07f79c60c0fb837f2c87(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
        <h2 id="sectionid-{{id}}-title" class="sectionname">
            {{{title}}}
        </h2>
    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '        <h2 id="sectionid-';
                $value = $this->resolveValue($context->find('id'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '-title" class="sectionname">
';
                $buffer .= $indent . '            ';
                $value = $this->resolveValue($context->find('title'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '        </h2>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section3d743337d1ee557b470226701b73da47(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'false';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'false';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionE27d58bd82bf887495509fb3582d0729(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' collapsed ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' collapsed ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section0ac795c23146489fad8f951c23f9a92a(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' collapse, core ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' collapse, core ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section8b5765485c94c190bf567731edb08c3a(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' expand, core ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' expand, core ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
