<?php

class __Mustache_5fea573a18dcf833a4c832909dfc549e extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        $buffer .= $indent . '<a href="';
        $value = $this->resolveValue($context->find('adminurl'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '" class="nav-link" data-tooltip="tooltip" data-placement= "left" title="';
        $value = $this->resolveValue($context->find('admintitle'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '">
';
        $buffer .= $indent . '    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
';
        $buffer .= $indent . '        <path d="M10.75 13.25V10.25H8.25V11.25C8.25 11.8023 7.80228 12.25 7.25 12.25H5.75C5.19772 12.25 4.75 11.8023 4.75 11.25V5.75C4.75 5.19772 5.19772 4.75 5.75 4.75H7.25C7.80228 4.75 8.25 5.19772 8.25 5.75V6.75H15C15 6.75 19.25 6.75 19.25 11.25C19.25 11.25 17 10.25 14.25 10.25V13.25M10.75 13.25H14.25M10.75 13.25V19.25M14.25 13.25V19.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
';
        $buffer .= $indent . '    </svg>
';
        $buffer .= $indent . '</a>';

        return $buffer;
    }
}
