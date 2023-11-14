<?php

class __Mustache_441685275ac7816cbcab391fc62d29ee extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<button id="bulk-enable-';
        $value = $this->resolveValue($context->find('uniqid'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '" class="bulkEnable btn btn-primary" data-for="enableBulk">
';
        $buffer .= $indent . '    <svg width="20" height="20" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="currentColor">
';
        $buffer .= $indent . '        <path d="M15.819 13.329l-5.324 5.99a2 2 0 01-2.99 0l-5.324-5.99a2 2 0 010-2.658l5.324-5.99a2 2 0 012.99 0l5.324 5.99a2 2 0 010 2.658z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
';
        $buffer .= $indent . '        <path d="M12 6.375l1.505-1.693a2 2 0 012.99 0l5.324 5.99a2 2 0 010 2.657l-5.324 5.99a2 2 0 01-2.99 0L12 17.624" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
';
        $buffer .= $indent . '    </svg>
';
        $buffer .= $indent . '    <span class="ml-2">';
        $value = $context->find('str');
        $buffer .= $this->section33fdc21207a168d9cb2c066c8f28dbad($context, $indent, $value);
        $buffer .= '</span>
';
        $buffer .= $indent . '</button>
';
        $value = $context->find('js');
        $buffer .= $this->sectionFae88dba1a6a77a66654c790ad4f61ac($context, $indent, $value);

        return $buffer;
    }

    private function section33fdc21207a168d9cb2c066c8f28dbad(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' bulkedit, core_courseformat ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' bulkedit, core_courseformat ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionFae88dba1a6a77a66654c790ad4f61ac(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
    require([\'core_courseformat/local/content/bulkedittoggler\'], function(component) {
    component.init(\'#bulk-enable-{{uniqid}}\');
    });
';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '    require([\'core_courseformat/local/content/bulkedittoggler\'], function(component) {
';
                $buffer .= $indent . '    component.init(\'#bulk-enable-';
                $value = $this->resolveValue($context->find('uniqid'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '\');
';
                $buffer .= $indent . '    });
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
