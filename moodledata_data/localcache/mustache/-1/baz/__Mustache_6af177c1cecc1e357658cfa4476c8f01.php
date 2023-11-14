<?php

class __Mustache_6af177c1cecc1e357658cfa4476c8f01 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $value = $context->find('divider');
        if (empty($value)) {
            
            $value = $context->find('haschildren');
            $buffer .= $this->section956457c99fc75427d8aa15d85bc8b07b($context, $indent, $value);
            $value = $context->find('haschildren');
            if (empty($value)) {
                
                $buffer .= $indent . '<a class="nav-item nav-link" href="';
                $value = $this->resolveValue($context->find('url'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '" ';
                $value = $context->find('title');
                $buffer .= $this->section4b8b1d056248164fd07f210141302f45($context, $indent, $value);
                $buffer .= '>';
                $value = $this->resolveValue($context->find('text'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '</a>
';
            }
        }

        return $buffer;
    }

    private function section4b8b1d056248164fd07f210141302f45(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'title="{{{title}}}"';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'title="';
                $value = $this->resolveValue($context->find('title'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '"';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section949acfab51c23a4bc28d7c31c3422002(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                <div class="dropdown-divider"></div>
            ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                <div class="dropdown-divider"></div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section97a96bd5ac4a61b3e7a4b268a0480dda(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            {{^divider}}
                <a class="dropdown-item" href="{{{url}}}" {{#title}}title="{{{title}}}"{{/title}}>{{text}}</a>
            {{/divider}}
            {{#divider}}
                <div class="dropdown-divider"></div>
            {{/divider}}
        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $value = $context->find('divider');
                if (empty($value)) {
                    
                    $buffer .= $indent . '                <a class="dropdown-item" href="';
                    $value = $this->resolveValue($context->find('url'), $context);
                    $buffer .= ($value === null ? '' : $value);
                    $buffer .= '" ';
                    $value = $context->find('title');
                    $buffer .= $this->section4b8b1d056248164fd07f210141302f45($context, $indent, $value);
                    $buffer .= '>';
                    $value = $this->resolveValue($context->find('text'), $context);
                    $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                    $buffer .= '</a>
';
                }
                $value = $context->find('divider');
                $buffer .= $this->section949acfab51c23a4bc28d7c31c3422002($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section956457c99fc75427d8aa15d85bc8b07b(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
<div class="rui-navbar-lang dropup">
    <button class="btn btn-sm btn-dark rui-lang-btn" id="drop-down-{{uniqid}}" data-toggle="dropdown" aria-haspopup="true" role="button" aria-label="Languages" aria-expanded="false">
        <svg class="ml-md-2" width="20" height="20" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5.75 19.25L5.75 13.25M5.75 13.25L5.75 5.75C5.75 5.75 8.5 3.5 12 5.75C15.5 8 18.25 5.75 18.25 5.75L18.25 13.25C18.25 13.25 15.5 15.5 12 13.25C8.5 11 5.75 13.25 5.75 13.25Z"></path>
        </svg>
        <span class="rui-lang-btn-text ml-2 mr-2 text-uppercase">{{currentlangname}}</span>
    </button>
    <div class="dropdown-menu" aria-labelledby="drop-down-{{uniqid}}">
        {{#children}}
            {{^divider}}
                <a class="dropdown-item" href="{{{url}}}" {{#title}}title="{{{title}}}"{{/title}}>{{text}}</a>
            {{/divider}}
            {{#divider}}
                <div class="dropdown-divider"></div>
            {{/divider}}
        {{/children}}
    </div>
</div>
';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '<div class="rui-navbar-lang dropup">
';
                $buffer .= $indent . '    <button class="btn btn-sm btn-dark rui-lang-btn" id="drop-down-';
                $value = $this->resolveValue($context->find('uniqid'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" data-toggle="dropdown" aria-haspopup="true" role="button" aria-label="Languages" aria-expanded="false">
';
                $buffer .= $indent . '        <svg class="ml-md-2" width="20" height="20" fill="none" viewBox="0 0 24 24">
';
                $buffer .= $indent . '            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5.75 19.25L5.75 13.25M5.75 13.25L5.75 5.75C5.75 5.75 8.5 3.5 12 5.75C15.5 8 18.25 5.75 18.25 5.75L18.25 13.25C18.25 13.25 15.5 15.5 12 13.25C8.5 11 5.75 13.25 5.75 13.25Z"></path>
';
                $buffer .= $indent . '        </svg>
';
                $buffer .= $indent . '        <span class="rui-lang-btn-text ml-2 mr-2 text-uppercase">';
                $value = $this->resolveValue($context->find('currentlangname'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '</span>
';
                $buffer .= $indent . '    </button>
';
                $buffer .= $indent . '    <div class="dropdown-menu" aria-labelledby="drop-down-';
                $value = $this->resolveValue($context->find('uniqid'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '">
';
                $value = $context->find('children');
                $buffer .= $this->section97a96bd5ac4a61b3e7a4b268a0480dda($context, $indent, $value);
                $buffer .= $indent . '    </div>
';
                $buffer .= $indent . '</div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
