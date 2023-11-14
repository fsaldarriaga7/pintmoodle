<?php

class __Mustache_548bb55b19d12e22084428b7accbeff8 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<div class="add_block_button">
';
        $buffer .= $indent . '    <a href="';
        $value = $this->resolveValue($context->find('link'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '" id="addblock-';
        $value = $this->resolveValue($context->find('uniqid'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '" class="btn btn-link block-add text-left mb-3" data-key="addblock" data-url="';
        $value = $this->resolveValue($context->find('escapedlink'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '">
';
        $buffer .= $indent . '        <span class="rui-icon-container mr-2">
';
        $buffer .= $indent . '            <svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="currentColor">
';
        $buffer .= $indent . '                <path d="M2 12h3m3 0H5m0 0V9m0 3v3M6.25 6l.245-.28a2 2 0 013.01 0l4.343 4.963a2 2 0 010 2.634L9.505 18.28a2 2 0 01-3.01 0L6.25 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
';
        $buffer .= $indent . '                <path d="M13 19l4.884-5.698a2 2 0 000-2.604L13 5" stroke="currentColor" stroke-opacity="0.6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
';
        $buffer .= $indent . '                <path d="M17 19l4.884-5.698a2 2 0 000-2.604L17 5" stroke="currentColor" stroke-opacity="0.2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
';
        $buffer .= $indent . '            </svg>
';
        $buffer .= $indent . '        </span>
';
        $buffer .= $indent . '        <span>';
        $value = $context->find('str');
        $buffer .= $this->section01c4df664c89cfcff5e9a8f2e1bca393($context, $indent, $value);
        $buffer .= '</span>
';
        $buffer .= $indent . '    </a>
';
        $buffer .= $indent . '</div>
';
        $buffer .= $indent . '
';
        $value = $context->find('js');
        $buffer .= $this->sectionC6c87a4c323a5bf276367b7da2d0fce1($context, $indent, $value);

        return $buffer;
    }

    private function section01c4df664c89cfcff5e9a8f2e1bca393(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'addblock';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'addblock';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionC6c87a4c323a5bf276367b7da2d0fce1(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
    // Initialise the JS for the modal window which displays the blocks available to add.
    require([\'core/addblockmodal\'], function(addBlockModal) {
        addBlockModal.init(\'{{pageType}}\', \'{{pageLayout}}\', null, \'{{subPage}}\');
    });
';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '    // Initialise the JS for the modal window which displays the blocks available to add.
';
                $buffer .= $indent . '    require([\'core/addblockmodal\'], function(addBlockModal) {
';
                $buffer .= $indent . '        addBlockModal.init(\'';
                $value = $this->resolveValue($context->find('pageType'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '\', \'';
                $value = $this->resolveValue($context->find('pageLayout'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '\', null, \'';
                $value = $this->resolveValue($context->find('subPage'), $context);
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
