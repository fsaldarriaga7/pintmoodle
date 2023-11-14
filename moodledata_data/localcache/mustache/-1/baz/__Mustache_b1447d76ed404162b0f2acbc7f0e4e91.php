<?php

class __Mustache_b1447d76ed404162b0f2acbc7f0e4e91 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        if ($parent = $this->mustache->loadPartial('core/sticky_footer')) {
            $context->pushBlockContext(array(
                'stickyclasses' => array($this, 'block30808c3f21c8800b85787ae4d1fd8196'),
                'disable' => array($this, 'blockEdea0cfa82b00b518813d597676a3d97'),
                'extradata' => array($this, 'blockEfbb5f80f524cdd65ddc95b1cf2b8d7b'),
                'stickycontent' => array($this, 'blockB3f9664b64015a782c88acfac904edd7'),
            ));
            $buffer .= $parent->renderInternal($context, $indent);
            $context->popBlockContext();
        }
        $value = $context->find('js');
        $buffer .= $this->section8ee2f8c97f87ed4ba35583b0c00df6c0($context, $indent, $value);

        return $buffer;
    }

    private function section43655405fc6a05d2320c48d4d567876a(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' selectall ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' selectall ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section461f357454786f0b7bcdd38cb4b57d73(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' nobulkaction, core_courseformat ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' nobulkaction, core_courseformat ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section46814aca73bdfea7e41e493c326750ce(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' title="{{title}}" ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' title="';
                $value = $this->resolveValue($context->find('title'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionBb255b553790721d985b5c11c39036e3(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '{{icon}}';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $value = $this->resolveValue($context->find('icon'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section2552e825fda14b53f357e0ecb5115ad9(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                <li class="nav-item">
                    <button class="btn btn-xs btn-secondary m-1 pl-1 d-inline-flex align-items-center" data-action="{{action}}" data-bulk="{{bulk}}" data-for="bulkaction" {{#title}} title="{{title}}" {{/title}}>
                        <span class="d-flex align-items-center">{{#pix}}{{icon}}{{/pix}}</span>
                        <span>{{name}}</span>
                    </button>
                </li>
            ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                <li class="nav-item">
';
                $buffer .= $indent . '                    <button class="btn btn-xs btn-secondary m-1 pl-1 d-inline-flex align-items-center" data-action="';
                $value = $this->resolveValue($context->find('action'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" data-bulk="';
                $value = $this->resolveValue($context->find('bulk'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" data-for="bulkaction" ';
                $value = $context->find('title');
                $buffer .= $this->section46814aca73bdfea7e41e493c326750ce($context, $indent, $value);
                $buffer .= '>
';
                $buffer .= $indent . '                        <span class="d-flex align-items-center">';
                $value = $context->find('pix');
                $buffer .= $this->sectionBb255b553790721d985b5c11c39036e3($context, $indent, $value);
                $buffer .= '</span>
';
                $buffer .= $indent . '                        <span>';
                $value = $this->resolveValue($context->find('name'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '</span>
';
                $buffer .= $indent . '                    </button>
';
                $buffer .= $indent . '                </li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionCca905f78c338c68d263533214d6df8a(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
        <ul class="actions nav" data-for="bulkactions">
            {{#actions}}
                <li class="nav-item">
                    <button class="btn btn-xs btn-secondary m-1 pl-1 d-inline-flex align-items-center" data-action="{{action}}" data-bulk="{{bulk}}" data-for="bulkaction" {{#title}} title="{{title}}" {{/title}}>
                        <span class="d-flex align-items-center">{{#pix}}{{icon}}{{/pix}}</span>
                        <span>{{name}}</span>
                    </button>
                </li>
            {{/actions}}
        </ul>
    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '        <ul class="actions nav" data-for="bulkactions">
';
                $value = $context->find('actions');
                $buffer .= $this->section2552e825fda14b53f357e0ecb5115ad9($context, $indent, $value);
                $buffer .= $indent . '        </ul>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section2f0fe77e7f05665e2ef5a85b9b10fa54(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' bulkselection, core_courseformat, 0 ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' bulkselection, core_courseformat, 0 ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section368c53da7c69ac752b619b87ab01b959(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' bulkcancel, core_courseformat ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' bulkcancel, core_courseformat ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section8ee2f8c97f87ed4ba35583b0c00df6c0(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
    require([\'core_courseformat/local/content/bulkedittools\'], function(component) {
    component.init(\'[data-for="bulkedittools"]\');
    });
';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '    require([\'core_courseformat/local/content/bulkedittools\'], function(component) {
';
                $buffer .= $indent . '    component.init(\'[data-for="bulkedittools"]\');
';
                $buffer .= $indent . '    });
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    public function block30808c3f21c8800b85787ae4d1fd8196($context)
    {
        $indent = $buffer = '';
        $buffer .= $indent . ' justify-content-between ';
    
        return $buffer;
    }

    public function blockEdea0cfa82b00b518813d597676a3d97($context)
    {
        $indent = $buffer = '';
        $buffer .= ' data-disable="true" ';
    
        return $buffer;
    }

    public function blockEfbb5f80f524cdd65ddc95b1cf2b8d7b($context)
    {
        $indent = $buffer = '';
        $buffer .= ' data-for="bulkedittools" ';
    
        return $buffer;
    }

    public function blockB3f9664b64015a782c88acfac904edd7($context)
    {
        $indent = $buffer = '';
        $buffer .= '<div class="form-check d-inline-flex align-items-center">
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    <label class="custom-control ios-switch mb-0">
';
        $buffer .= $indent . '        <input type="hidden" name="';
        $value = $this->resolveValue($context->find('name'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '" value="';
        $value = $this->resolveValue($context->find('no'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '">
';
        $buffer .= $indent . '        <input type="checkbox" id="selectall" class="ios-switch-control-input" data-for="selectall" disabled>
';
        $buffer .= $indent . '        <span class="ios-switch-control-indicator mx-0"></span>
';
        $buffer .= $indent . '    </label>
';
        $buffer .= $indent . '    
';
        $buffer .= $indent . '    <label class="form-check-label" for="selectall">
';
        $buffer .= $indent . '        ';
        $value = $context->find('str');
        $buffer .= $this->section43655405fc6a05d2320c48d4d567876a($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '    </label>
';
        $buffer .= $indent . '</div>
';
        $buffer .= $indent . '<div data-for="bulktools">
';
        $value = $context->find('hasactions');
        if (empty($value)) {
            
            $buffer .= $indent . '        ';
            $value = $context->find('str');
            $buffer .= $this->section461f357454786f0b7bcdd38cb4b57d73($context, $indent, $value);
            $buffer .= '
';
        }
        $value = $context->find('hasactions');
        $buffer .= $this->sectionCca905f78c338c68d263533214d6df8a($context, $indent, $value);
        $buffer .= $indent . '</div>
';
        $buffer .= $indent . '<div class="d-inline-flex align-items-center">
';
        $buffer .= $indent . '    <div class="ml-auto">
';
        $buffer .= $indent . '        <div data-for="bulkcount" class="mx-2 badge badge-warning">
';
        $buffer .= $indent . '            ';
        $value = $context->find('str');
        $buffer .= $this->section2f0fe77e7f05665e2ef5a85b9b10fa54($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '        <button class="btn btn-icon btn-danger m-1 d-inline-flex align-items-center" data-action="bulkcancel" data-for="bulkcancel" title="';
        $value = $context->find('str');
        $buffer .= $this->section368c53da7c69ac752b619b87ab01b959($context, $indent, $value);
        $buffer .= '">
';
        $buffer .= $indent . '            <svg width="24" height="24" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
';
        $buffer .= $indent . '                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.25 6.75L6.75 17.25"></path>
';
        $buffer .= $indent . '                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.75 6.75L17.25 17.25"></path>
';
        $buffer .= $indent . '            </svg>
';
        $buffer .= $indent . '        </button>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '</div>
';
    
        return $buffer;
    }
}
