<?php

class __Mustache_2c402f6325803ea57e7be490b9722270 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $value = $context->find('editing');
        $buffer .= $this->section1592fd82fa472bd491ae889870281c01($context, $indent, $value);
        $value = $context->find('editing');
        if (empty($value)) {
            
            $value = $context->find('iscurrent');
            $buffer .= $this->sectionCe8f2bb52fdefbb39b08f30e5d2ead52($context, $indent, $value);
            $value = $context->find('hiddenfromstudents');
            $buffer .= $this->sectionF8675b5368904399ebfaf84972d27a18($context, $indent, $value);
            $value = $context->find('notavailable');
            $buffer .= $this->section4e8d39ed3573f43b6d29e14a8551103c($context, $indent, $value);
        }

        return $buffer;
    }

    private function section31ae0fbdc439c6d3e86010ee0fe2597e(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'notavailable';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'notavailable';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionAa413acb7776474efcb52c4cbf9fc6f9(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'hiddenfromstudents';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'hiddenfromstudents';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section1592fd82fa472bd491ae889870281c01(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
    <span class="mx-2 badge badge-sm badge-primary order-1 {{^iscurrent}}d-none{{/iscurrent}}" data-type="iscurrent">
        {{ highlightedlabel }}
    </span>
    <span class="mx-2 badge badge-sm badge-secondary order-3 {{^notavailable}}d-none{{/notavailable}}">
        {{#str}}notavailable{{/str}}
    </span>
    <span class="ml-2 badge badge-xs badge-warning order-2 {{^hiddenfromstudents}}d-none{{/hiddenfromstudents}}" data-type="hiddenfromstudents">
        <span class="badge--icon line-height-0">
            <svg width="16" height="16" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18.6247 10C19.0646 10.8986 19.25 11.6745 19.25 12C19.25 13 17.5 18.25 12 18.25C11.2686 18.25 10.6035 18.1572 10 17.9938M7 16.2686C5.36209 14.6693 4.75 12.5914 4.75 12C4.75 11 6.5 5.75 12 5.75C13.7947 5.75 15.1901 6.30902 16.2558 7.09698"></path>
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.25 4.75L4.75 19.25"></path>
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.409 13.591C9.53033 12.7123 9.53033 11.2877 10.409 10.409C11.2877 9.5303 12.7123 9.5303 13.591 10.409"></path>
            </svg>
        </span>
        <span class="badge--text ml-2">{{#str}}hiddenfromstudents{{/str}}</span>
    </span>    
';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '    <span class="mx-2 badge badge-sm badge-primary order-1 ';
                $value = $context->find('iscurrent');
                if (empty($value)) {
                    
                    $buffer .= 'd-none';
                }
                $buffer .= '" data-type="iscurrent">
';
                $buffer .= $indent . '        ';
                $value = $this->resolveValue($context->find('highlightedlabel'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '
';
                $buffer .= $indent . '    </span>
';
                $buffer .= $indent . '    <span class="mx-2 badge badge-sm badge-secondary order-3 ';
                $value = $context->find('notavailable');
                if (empty($value)) {
                    
                    $buffer .= 'd-none';
                }
                $buffer .= '">
';
                $buffer .= $indent . '        ';
                $value = $context->find('str');
                $buffer .= $this->section31ae0fbdc439c6d3e86010ee0fe2597e($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '    </span>
';
                $buffer .= $indent . '    <span class="ml-2 badge badge-xs badge-warning order-2 ';
                $value = $context->find('hiddenfromstudents');
                if (empty($value)) {
                    
                    $buffer .= 'd-none';
                }
                $buffer .= '" data-type="hiddenfromstudents">
';
                $buffer .= $indent . '        <span class="badge--icon line-height-0">
';
                $buffer .= $indent . '            <svg width="16" height="16" fill="none" viewBox="0 0 24 24">
';
                $buffer .= $indent . '                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18.6247 10C19.0646 10.8986 19.25 11.6745 19.25 12C19.25 13 17.5 18.25 12 18.25C11.2686 18.25 10.6035 18.1572 10 17.9938M7 16.2686C5.36209 14.6693 4.75 12.5914 4.75 12C4.75 11 6.5 5.75 12 5.75C13.7947 5.75 15.1901 6.30902 16.2558 7.09698"></path>
';
                $buffer .= $indent . '                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.25 4.75L4.75 19.25"></path>
';
                $buffer .= $indent . '                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.409 13.591C9.53033 12.7123 9.53033 11.2877 10.409 10.409C11.2877 9.5303 12.7123 9.5303 13.591 10.409"></path>
';
                $buffer .= $indent . '            </svg>
';
                $buffer .= $indent . '        </span>
';
                $buffer .= $indent . '        <span class="badge--text ml-2">';
                $value = $context->find('str');
                $buffer .= $this->sectionAa413acb7776474efcb52c4cbf9fc6f9($context, $indent, $value);
                $buffer .= '</span>
';
                $buffer .= $indent . '    </span>    
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionCe8f2bb52fdefbb39b08f30e5d2ead52(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
        <span class="mx-2 badge badge-sm badge-primary order-1">{{ highlightedlabel }}</span>
    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '        <span class="mx-2 badge badge-sm badge-primary order-1">';
                $value = $this->resolveValue($context->find('highlightedlabel'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '</span>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionF8675b5368904399ebfaf84972d27a18(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
        <span class="mx-2 badge badge-sm badge-warning order-2">
            <span class="badge--icon line-height-0">
                <svg width="16" height="16" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18.6247 10C19.0646 10.8986 19.25 11.6745 19.25 12C19.25 13 17.5 18.25 12 18.25C11.2686 18.25 10.6035 18.1572 10 17.9938M7 16.2686C5.36209 14.6693 4.75 12.5914 4.75 12C4.75 11 6.5 5.75 12 5.75C13.7947 5.75 15.1901 6.30902 16.2558 7.09698"></path>
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.25 4.75L4.75 19.25"></path>
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.409 13.591C9.53033 12.7123 9.53033 11.2877 10.409 10.409C11.2877 9.5303 12.7123 9.5303 13.591 10.409"></path>
                </svg>
            </span>    
            <span>{{#str}}hiddenfromstudents{{/str}}</span>
        </span>
    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '        <span class="mx-2 badge badge-sm badge-warning order-2">
';
                $buffer .= $indent . '            <span class="badge--icon line-height-0">
';
                $buffer .= $indent . '                <svg width="16" height="16" fill="none" viewBox="0 0 24 24">
';
                $buffer .= $indent . '                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18.6247 10C19.0646 10.8986 19.25 11.6745 19.25 12C19.25 13 17.5 18.25 12 18.25C11.2686 18.25 10.6035 18.1572 10 17.9938M7 16.2686C5.36209 14.6693 4.75 12.5914 4.75 12C4.75 11 6.5 5.75 12 5.75C13.7947 5.75 15.1901 6.30902 16.2558 7.09698"></path>
';
                $buffer .= $indent . '                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.25 4.75L4.75 19.25"></path>
';
                $buffer .= $indent . '                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.409 13.591C9.53033 12.7123 9.53033 11.2877 10.409 10.409C11.2877 9.5303 12.7123 9.5303 13.591 10.409"></path>
';
                $buffer .= $indent . '                </svg>
';
                $buffer .= $indent . '            </span>    
';
                $buffer .= $indent . '            <span>';
                $value = $context->find('str');
                $buffer .= $this->sectionAa413acb7776474efcb52c4cbf9fc6f9($context, $indent, $value);
                $buffer .= '</span>
';
                $buffer .= $indent . '        </span>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section4e8d39ed3573f43b6d29e14a8551103c(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
        <span class="mx-2 badge badge-sm badge-secondary order-3">{{#str}}notavailable{{/str}}</span>
    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '        <span class="mx-2 badge badge-sm badge-secondary order-3">';
                $value = $context->find('str');
                $buffer .= $this->section31ae0fbdc439c6d3e86010ee0fe2597e($context, $indent, $value);
                $buffer .= '</span>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
