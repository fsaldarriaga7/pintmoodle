<?php

class __Mustache_2a32eb6532f7fbe43641a4dba4e7f318 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $value = $context->find('divider');
        if (empty($value)) {
            
            $value = $context->find('haschildren');
            $buffer .= $this->section0ae28ea1b7b8c2577670eaa23413677a($context, $indent, $value);
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

    private function section0ae28ea1b7b8c2577670eaa23413677a(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
<div class="rui-navbar-lang dropdown text-black">
    <a class="rui-lang-btn" id="drop-down-{{uniqid}}" data-toggle="dropdown" aria-haspopup="true" role="button" aria-label="Languages" aria-expanded="false">
{{!         <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12.75 19.25L16 12.75L19.25 19.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M14 17.25H18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M4.75 6.75H13.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M9 6.5V4.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M11.25 6.75C11.25 6.75 11.25 9.25 9.25 11.25C7.25 13.25 4.75 13.25 4.75 13.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M12.25 13.25C12.25 13.25 9.75 13.25 7.75 11.25C7.34551 10.8455 6.75 9.75 6.75 9.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg> }}
        <span class="rui-lang-btn-text mx-2 text-uppercase">{{currentlangname}}</span>
    </a>
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
                
                $buffer .= $indent . '<div class="rui-navbar-lang dropdown text-black">
';
                $buffer .= $indent . '    <a class="rui-lang-btn" id="drop-down-';
                $value = $this->resolveValue($context->find('uniqid'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" data-toggle="dropdown" aria-haspopup="true" role="button" aria-label="Languages" aria-expanded="false">
';
                $buffer .= $indent . '        <span class="rui-lang-btn-text mx-2 text-uppercase">';
                $value = $this->resolveValue($context->find('currentlangname'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '</span>
';
                $buffer .= $indent . '    </a>
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
