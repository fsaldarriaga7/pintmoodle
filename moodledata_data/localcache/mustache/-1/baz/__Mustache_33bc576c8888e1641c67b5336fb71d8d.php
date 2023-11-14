<?php

class __Mustache_33bc576c8888e1641c67b5336fb71d8d extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<header id="page-header" class="page-header-content flex-wrap">
';
        $value = $context->find('contextheader');
        $buffer .= $this->section6b37c3b059a1e4badca1891a0a1eca1b($context, $indent, $value);
        $value = $context->find('pageheading');
        $buffer .= $this->sectionC2993284026e0512f9b16d93fa7dc0af($context, $indent, $value);
        $buffer .= $indent . '
';
        $buffer .= $indent . '  AAAAAA
';
        $value = $context->find('courseheader');
        $buffer .= $this->section965ec7385596a72a4f2294a887a3ae33($context, $indent, $value);
        $buffer .= $indent . '
';
        $buffer .= $indent . 'AAAAAAA
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '  <div class="ml-auto d-flex">
';
        $buffer .= $indent . '    ';
        $value = $this->resolveValue($context->find('pageheadingbutton'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '  </div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '  <div class="header-actions-container ml-0" data-region="header-actions-container">
';
        $value = $context->find('headeractions');
        $buffer .= $this->section3cfdb5464dd493a5fca7c8fa5bf43d37($context, $indent, $value);
        $buffer .= $indent . '  </div>
';
        $buffer .= $indent . '</header>';

        return $buffer;
    }

    private function section6b37c3b059a1e4badca1891a0a1eca1b(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
    {{{.}}}
  ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '    ';
                $value = $this->resolveValue($context->last(), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionC2993284026e0512f9b16d93fa7dc0af(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
    <h3 class="page-sub-title">{{{pageheading}}}</h3>
  ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '    <h3 class="page-sub-title">';
                $value = $this->resolveValue($context->find('pageheading'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '</h3>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section965ec7385596a72a4f2294a887a3ae33(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
    <div id="course-header">{{{courseheader}}}</div>
  ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '    <div id="course-header">';
                $value = $this->resolveValue($context->find('courseheader'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '</div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section3cfdb5464dd493a5fca7c8fa5bf43d37(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
      <div class="header-action ml-2">{{{.}}}</div>
    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '      <div class="header-action ml-2">';
                $value = $this->resolveValue($context->last(), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '</div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
