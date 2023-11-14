<?php

class __Mustache_2752cae9bfb1a985c0d5a62a21c543ae extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<button class="btn btn-sm btn-warning btn-icon mb-2 section-modchooser-link activity-add d-flex align-items-center activitychooser-button"
';
        $buffer .= $indent . '     data-action="open-chooser" data-sectionid="';
        $value = $this->resolveValue($context->find('num'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '" data-sectionreturnid="';
        $value = $this->resolveValue($context->find('sectionreturn'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '" data-beforemod="';
        $value = $this->resolveValue($context->find('id'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '" aria-label="';
        $value = $context->find('str');
        $buffer .= $this->section9a212121c7b2d8091fbf9fada23ff817($context, $indent, $value);
        $buffer .= '" tabindex="0">
';
        $buffer .= $indent . '     <svg width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="currentColor">
';
        $buffer .= $indent . '        <path d="M13.992 17h3m3 0h-3m0 0v-3m0 3v3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
';
        $buffer .= $indent . '        <path d="M4 9.4V4.6a.6.6 0 01.6-.6h4.8a.6.6 0 01.6.6v4.8a.6.6 0 01-.6.6H4.6a.6.6 0 01-.6-.6zM4 19.4v-4.8a.6.6 0 01.6-.6h4.8a.6.6 0 01.6.6v4.8a.6.6 0 01-.6.6H4.6a.6.6 0 01-.6-.6zM14 9.4V4.6a.6.6 0 01.6-.6h4.8a.6.6 0 01.6.6v4.8a.6.6 0 01-.6.6h-4.8a.6.6 0 01-.6-.6z" stroke="currentColor" stroke-width="1.5"></path>
';
        $buffer .= $indent . '    </svg>
';
        $buffer .= $indent . '</button>
';

        return $buffer;
    }

    private function sectionAcd66ef23857ba2b241b6f8f23ef69c2(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' {{activityname}} ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' ';
                $value = $this->resolveValue($context->find('activityname'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= ' ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section9a212121c7b2d8091fbf9fada23ff817(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'insertresourceoractivitybefore, core, { "activityname": {{#quote}} {{activityname}} {{/quote}} } ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'insertresourceoractivitybefore, core, { "activityname": ';
                $value = $context->find('quote');
                $buffer .= $this->sectionAcd66ef23857ba2b241b6f8f23ef69c2($context, $indent, $value);
                $buffer .= ' } ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
