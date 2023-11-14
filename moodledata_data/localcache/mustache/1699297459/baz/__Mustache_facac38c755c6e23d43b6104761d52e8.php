<?php

class __Mustache_facac38c755c6e23d43b6104761d52e8 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '
';
        $value = $context->find('hasnavbar');
        $buffer .= $this->sectionF643cf88ccce5cf1aba0ea8224ec7562($context, $indent, $value);

        return $buffer;
    }

    private function sectionF643cf88ccce5cf1aba0ea8224ec7562(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
      <div class="rui-breadcrumbs wrapper-fw">
        <div id="page-navbar" class="breadcrumbs-container">
            {{{navbar}}}
        </div>
      </div>
      ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '      <div class="rui-breadcrumbs wrapper-fw">
';
                $buffer .= $indent . '        <div id="page-navbar" class="breadcrumbs-container">
';
                $buffer .= $indent . '            ';
                $value = $this->resolveValue($context->find('navbar'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '        </div>
';
                $buffer .= $indent . '      </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
