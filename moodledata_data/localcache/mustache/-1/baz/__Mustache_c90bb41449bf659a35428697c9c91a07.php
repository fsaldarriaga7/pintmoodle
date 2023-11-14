<?php

class __Mustache_c90bb41449bf659a35428697c9c91a07 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<div class="popover-region collapsed ';
        $blockFunction = $context->findInBlock('classes');
        if (is_callable($blockFunction)) {
            $buffer .= call_user_func($blockFunction, $context);
        }
        $buffer .= '"
';
        $buffer .= $indent . '    ';
        $blockFunction = $context->findInBlock('attributes');
        if (is_callable($blockFunction)) {
            $buffer .= call_user_func($blockFunction, $context);
        }
        $buffer .= '
';
        $buffer .= $indent . '    data-region="popover-region">
';
        $buffer .= $indent . '    <div class="popover-region-toggle nav-link icon-no-margin"
';
        $buffer .= $indent . '        data-region="popover-region-toggle"
';
        $buffer .= $indent . '        role="button"
';
        $buffer .= $indent . '        aria-controls="popover-region-container-';
        $value = $this->resolveValue($context->find('uniqid'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '"
';
        $buffer .= $indent . '        aria-haspopup="true"
';
        $buffer .= $indent . '        aria-label="';
        $blockFunction = $context->findInBlock('togglelabel');
        if (is_callable($blockFunction)) {
            $buffer .= call_user_func($blockFunction, $context);
        } else {
            $value = $context->find('str');
            $buffer .= $this->section8b664e6398e53f993cf581dd926d5784($context, $indent, $value);
        }
        $buffer .= '"
';
        $buffer .= $indent . '        tabindex="0">
';
        $buffer .= $indent . '        ';
        $blockFunction = $context->findInBlock('togglecontent');
        if (is_callable($blockFunction)) {
            $buffer .= call_user_func($blockFunction, $context);
        }
        $buffer .= '
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '    <div ';
        $blockFunction = $context->findInBlock('containerattributes');
        if (is_callable($blockFunction)) {
            $buffer .= call_user_func($blockFunction, $context);
        }
        $buffer .= '
';
        $buffer .= $indent . '        id="popover-region-container-';
        $value = $this->resolveValue($context->find('uniqid'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '"
';
        $buffer .= $indent . '        class="popover-region-container"
';
        $buffer .= $indent . '        data-region="popover-region-container"
';
        $buffer .= $indent . '        aria-expanded="false"
';
        $buffer .= $indent . '        aria-hidden="true"
';
        $buffer .= $indent . '        aria-label="';
        $blockFunction = $context->findInBlock('containerlabel');
        if (is_callable($blockFunction)) {
            $buffer .= call_user_func($blockFunction, $context);
        }
        $buffer .= '"
';
        $buffer .= $indent . '        role="region">
';
        $buffer .= $indent . '        <div class="popover-region-header-container">
';
        $buffer .= $indent . '            <h4 class="popover-region-header-text" data-region="popover-region-header-text">';
        $blockFunction = $context->findInBlock('headertext');
        if (is_callable($blockFunction)) {
            $buffer .= call_user_func($blockFunction, $context);
        }
        $buffer .= '</h4>
';
        $buffer .= $indent . '            <div class="popover-region-header-actions" data-region="popover-region-header-actions">';
        $blockFunction = $context->findInBlock('headeractions');
        if (is_callable($blockFunction)) {
            $buffer .= call_user_func($blockFunction, $context);
        }
        $buffer .= '</div>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '        <div class="popover-region-content-container mt-2" data-region="popover-region-content-container">
';
        $buffer .= $indent . '            <div class="popover-region-content" data-region="popover-region-content">
';
        $buffer .= $indent . '                ';
        $blockFunction = $context->findInBlock('content');
        if (is_callable($blockFunction)) {
            $buffer .= call_user_func($blockFunction, $context);
        }
        $buffer .= '
';
        $buffer .= $indent . '            </div>
';
        if ($partial = $this->mustache->loadPartial('core/loading')) {
            $buffer .= $partial->renderInternal($context, $indent . '            ');
        }
        $buffer .= $indent . '        </div>
';
        $blockFunction = $context->findInBlock('anchor');
        if (is_callable($blockFunction)) {
            $buffer .= call_user_func($blockFunction, $context);
        } else {
            $value = $context->findDot('urls.seeall');
            $buffer .= $this->section6da631d4e7d93d412bf6d95e8e7af47b($context, $indent, $value);
        }
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '</div>
';

        return $buffer;
    }

    private function section8b664e6398e53f993cf581dd926d5784(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'showpopovermenu';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'showpopovermenu';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section560076495ba24e041d1e004b36f2b0d1(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' seeall, message ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' seeall, message ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section6da631d4e7d93d412bf6d95e8e7af47b(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            <div class="d-flex w-100 justify-content-end">
                <a class="see-all-link d-inline-flex align-items-center justify-content-end"
                    href="{{{.}}}">
                    <span class="mx-2">{{#str}} seeall, message {{/str}}</span>
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.75 6.75L19.25 12L13.75 17.25"></path>
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 12H4.75"></path>
                    </svg>
                </a>
            </div>
            ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '            <div class="d-flex w-100 justify-content-end">
';
                $buffer .= $indent . '                <a class="see-all-link d-inline-flex align-items-center justify-content-end"
';
                $buffer .= $indent . '                    href="';
                $value = $this->resolveValue($context->last(), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '">
';
                $buffer .= $indent . '                    <span class="mx-2">';
                $value = $context->find('str');
                $buffer .= $this->section560076495ba24e041d1e004b36f2b0d1($context, $indent, $value);
                $buffer .= '</span>
';
                $buffer .= $indent . '                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24">
';
                $buffer .= $indent . '                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.75 6.75L19.25 12L13.75 17.25"></path>
';
                $buffer .= $indent . '                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 12H4.75"></path>
';
                $buffer .= $indent . '                    </svg>
';
                $buffer .= $indent . '                </a>
';
                $buffer .= $indent . '            </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
