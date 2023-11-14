<?php

class __Mustache_ba56b3d13feff385bb0111716ebc40cc extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '
';
        $buffer .= $indent . '    <div class="rui-activity-instance activity-instance d-flex flex-column">
';
        $buffer .= $indent . '        <div class="activitytitle media ';
        $value = $this->resolveValue($context->find('textclasses'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= ' modtype_';
        $value = $this->resolveValue($context->find('modname'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= ' position-relative align-self-start">
';
        $buffer .= $indent . '            <div class="media-body align-self-center">
';
        $buffer .= $indent . '                <div class="rui-pluginname">
';
        $buffer .= $indent . '                    ';
        $value = $this->resolveValue($context->find('pluginname'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '                </div>
';
        $buffer .= $indent . '                <div class="activityname">
';
        $value = $context->find('uservisible');
        $buffer .= $this->section19520bc3dfc6967e25532fd901cf207d($context, $indent, $value);
        $value = $context->find('uservisible');
        if (empty($value)) {
            
            $buffer .= $indent . '                        <span class="instancename">
';
            $buffer .= $indent . '                            ';
            $value = $this->resolveValue($context->find('instancename'), $context);
            $buffer .= ($value === null ? '' : $value);
            $buffer .= ' ';
            $value = $this->resolveValue($context->find('altname'), $context);
            $buffer .= ($value === null ? '' : $value);
            $buffer .= '
';
            $buffer .= $indent . '                        </span>
';
        }
        $buffer .= $indent . '                </div>
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '    </div>
';

        return $buffer;
    }

    private function section19520bc3dfc6967e25532fd901cf207d(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                        <a href="{{url}}" class="{{linkclasses}} rui-instancename aalink stretched-link" onclick="{{{onclick}}}">
                            <span class="instancename">{{{instancename}}} {{{altname}}}</span>
                        </a>
                    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                        <a href="';
                $value = $this->resolveValue($context->find('url'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" class="';
                $value = $this->resolveValue($context->find('linkclasses'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= ' rui-instancename aalink stretched-link" onclick="';
                $value = $this->resolveValue($context->find('onclick'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '">
';
                $buffer .= $indent . '                            <span class="instancename">';
                $value = $this->resolveValue($context->find('instancename'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= ' ';
                $value = $this->resolveValue($context->find('altname'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '</span>
';
                $buffer .= $indent . '                        </a>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
