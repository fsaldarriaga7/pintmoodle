<?php

class __Mustache_bd25aa05f38b1145ab24db2c5bec2f91 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $value = $context->find('topbarhamburgermenu');
        if (empty($value)) {
            
            $value = $context->findDot('output.mainmenu');
            $buffer .= $this->section4dbb93157195393159f232d379451c4d($context, $indent, $value);
        }
        $buffer .= $indent . '
';
        $buffer .= $indent . '    <div class="sticky-header-settings-menu d-inline-flex">
';
        $buffer .= $indent . '        <div class="rui-edit-switch-box">
';
        $buffer .= $indent . '        ';
        $value = $this->resolveValue($context->findDot('output.edit_switch'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '    </div>
';

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

    private function section4dbb93157195393159f232d379451c4d(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
    <div class="main-nav-container wrapper-fw {{# output.custom_menu }}rui-topbar--custom-menu{{/ output.custom_menu }}">
        <div class="main-nav-container-overflow">
            <ul class="header-main-menu">{{{output.mainmenu}}}</ul>
        </div>
    </div>
    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '    <div class="main-nav-container wrapper-fw ';
                $value = $context->findDot('output.custom_menu');
                $buffer .= $this->section010aa6f4e08815ab4a342e2589c47bc0($context, $indent, $value);
                $buffer .= '">
';
                $buffer .= $indent . '        <div class="main-nav-container-overflow">
';
                $buffer .= $indent . '            <ul class="header-main-menu">';
                $value = $this->resolveValue($context->findDot('output.mainmenu'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '</ul>
';
                $buffer .= $indent . '        </div>
';
                $buffer .= $indent . '    </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
