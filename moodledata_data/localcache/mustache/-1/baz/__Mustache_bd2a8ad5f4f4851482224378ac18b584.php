<?php

class __Mustache_bd2a8ad5f4f4851482224378ac18b584 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<div class="form-multicheckbox form-checkbox defaultsnext custom-controls-stacked mr-2">
';
        $buffer .= $indent . '    <input type="hidden" name="';
        $value = $this->resolveValue($context->find('name'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '[xxxxx]" value="1">
';
        $value = $context->find('hasoptions');
        $buffer .= $this->section3240da40d6954f8448d9552b3487e774($context, $indent, $value);
        $buffer .= $indent . '</div>
';

        return $buffer;
    }

    private function section51d7c9c652ced0161cb587bacd669266(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'checked';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'checked';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section0594b76eaf4874302d4e61f663b9b2d2(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                <li>
                    <label class="custom-control ios-switch d-inline-flex align-items-center">
                        <input class="ios-switch-control-input" type="checkbox" name="{{name}}[{{key}}]" value="1" id="{{id}}_{{key}}" {{#checked}}checked{{/checked}}>
                        <span class="ios-switch-control-indicator"></span>
                        <label class="text my-0" for="{{id}}_{{key}}">{{{label}}}</label>
                    </label>
                </li>
            ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                <li>
';
                $buffer .= $indent . '                    <label class="custom-control ios-switch d-inline-flex align-items-center">
';
                $buffer .= $indent . '                        <input class="ios-switch-control-input" type="checkbox" name="';
                $value = $this->resolveValue($context->find('name'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '[';
                $value = $this->resolveValue($context->find('key'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= ']" value="1" id="';
                $value = $this->resolveValue($context->find('id'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '_';
                $value = $this->resolveValue($context->find('key'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" ';
                $value = $context->find('checked');
                $buffer .= $this->section51d7c9c652ced0161cb587bacd669266($context, $indent, $value);
                $buffer .= '>
';
                $buffer .= $indent . '                        <span class="ios-switch-control-indicator"></span>
';
                $buffer .= $indent . '                        <label class="text my-0" for="';
                $value = $this->resolveValue($context->find('id'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '_';
                $value = $this->resolveValue($context->find('key'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '">';
                $value = $this->resolveValue($context->find('label'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '</label>
';
                $buffer .= $indent . '                    </label>
';
                $buffer .= $indent . '                </li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section3240da40d6954f8448d9552b3487e774(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
        <ul>
            {{#options}}
                <li>
                    <label class="custom-control ios-switch d-inline-flex align-items-center">
                        <input class="ios-switch-control-input" type="checkbox" name="{{name}}[{{key}}]" value="1" id="{{id}}_{{key}}" {{#checked}}checked{{/checked}}>
                        <span class="ios-switch-control-indicator"></span>
                        <label class="text my-0" for="{{id}}_{{key}}">{{{label}}}</label>
                    </label>
                </li>
            {{/options}}
        </ul>
    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '        <ul>
';
                $value = $context->find('options');
                $buffer .= $this->section0594b76eaf4874302d4e61f663b9b2d2($context, $indent, $value);
                $buffer .= $indent . '        </ul>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
