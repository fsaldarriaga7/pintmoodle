<?php

class __Mustache_9eca3daf2f85966de17fb2fd8d90be6e extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $value = $context->find('hasblocks');
        $buffer .= $this->sectionE2a09caf77b80b0a9e7782d9103e4db2($context, $indent, $value);

        return $buffer;
    }

    private function section03a2cb78adf693fb240638cbbc7ea15e(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'true';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'true';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionE2a09caf77b80b0a9e7782d9103e4db2(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
    <section id="sidepre-blocks" data-region="blocks-column" class="rui-blocks-area hidden-print">
        <span id="sidepreopen-control" class="btn-drawer btn-drawer--right" aria-expanded="{{#draweropenright}}true{{/draweropenright}}{{^draweropenright}}false{{/draweropenright}}" aria-controls="sidepre-blocks" data-action="toggle-drawer" data-side="right" data-preference="sidepre-open">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19.25 4.75V19.25" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M4.75 12H15.25" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M8.25 8.75L4.75 12L8.25 15.25" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </span>
        <div class="rui-sidebar-blocks-wrapper" data-simplebar data-simplebar-auto-hide="false">
            {{{ addblockbutton }}}
            {{{ sidepreblocks }}}
        </div>
    </section>
';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '    <section id="sidepre-blocks" data-region="blocks-column" class="rui-blocks-area hidden-print">
';
                $buffer .= $indent . '        <span id="sidepreopen-control" class="btn-drawer btn-drawer--right" aria-expanded="';
                $value = $context->find('draweropenright');
                $buffer .= $this->section03a2cb78adf693fb240638cbbc7ea15e($context, $indent, $value);
                $value = $context->find('draweropenright');
                if (empty($value)) {
                    
                    $buffer .= 'false';
                }
                $buffer .= '" aria-controls="sidepre-blocks" data-action="toggle-drawer" data-side="right" data-preference="sidepre-open">
';
                $buffer .= $indent . '            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
';
                $buffer .= $indent . '                <path d="M19.25 4.75V19.25" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
';
                $buffer .= $indent . '                <path d="M4.75 12H15.25" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
';
                $buffer .= $indent . '                <path d="M8.25 8.75L4.75 12L8.25 15.25" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
';
                $buffer .= $indent . '            </svg>
';
                $buffer .= $indent . '        </span>
';
                $buffer .= $indent . '        <div class="rui-sidebar-blocks-wrapper" data-simplebar data-simplebar-auto-hide="false">
';
                $buffer .= $indent . '            ';
                $value = $this->resolveValue($context->find('addblockbutton'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '            ';
                $value = $this->resolveValue($context->find('sidepreblocks'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '        </div>
';
                $buffer .= $indent . '    </section>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
