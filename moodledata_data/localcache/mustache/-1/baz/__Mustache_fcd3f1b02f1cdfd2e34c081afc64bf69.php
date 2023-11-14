<?php

class __Mustache_fcd3f1b02f1cdfd2e34c081afc64bf69 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $value = $context->find('summarytext');
        $buffer .= $this->sectionFfc83c4a3b06e3458af93ce56fb8732b($context, $indent, $value);

        return $buffer;
    }

    private function sectionFfc83c4a3b06e3458af93ce56fb8732b(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
    <div class="rui-course-summary course-description-item summarytext">
        <div class="description-inner">
            {{{summarytext}}}
        </div>
    </div>
';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '    <div class="rui-course-summary course-description-item summarytext">
';
                $buffer .= $indent . '        <div class="description-inner">
';
                $buffer .= $indent . '            ';
                $value = $this->resolveValue($context->find('summarytext'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
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
