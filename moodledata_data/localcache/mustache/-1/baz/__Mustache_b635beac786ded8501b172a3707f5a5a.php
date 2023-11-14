<?php

class __Mustache_b635beac786ded8501b172a3707f5a5a extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<form action="';
        $value = $this->resolveValue($context->find('actionurl'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '" method="post" id="adminsettings">
';
        $buffer .= $indent . '    <div>
';
        $buffer .= $indent . '        <input type="hidden" name="sesskey" value="';
        $value = $this->resolveValue($context->find('sesskey'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '">
';
        $buffer .= $indent . '        <input type="hidden" name="action" value="save-settings">
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '    <fieldset>
';
        $buffer .= $indent . '        <div class="clearer"></div>
';
        $buffer .= $indent . '        <h2 class="main">';
        $value = $context->find('str');
        $buffer .= $this->section814f7ab309abbd3b4cf598dd0e446d9a($context, $indent, $value);
        $buffer .= '</h2>
';
        $value = $context->find('hasresults');
        $buffer .= $this->section376621edd4c88baa7798c42fd8d48e0c($context, $indent, $value);
        $value = $context->find('hasresults');
        if (empty($value)) {
            
            $buffer .= $indent . '            ';
            $value = $context->find('str');
            $buffer .= $this->section36817e26d3b370aa587ec3ea3b300e7a($context, $indent, $value);
            $buffer .= '
';
        }
        $buffer .= $indent . '    </fieldset>
';
        $buffer .= $indent . '</form>
';

        return $buffer;
    }

    private function section814f7ab309abbd3b4cf598dd0e446d9a(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'searchresults, admin';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'searchresults, admin';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionA092cd08353bf6cb94ecbf78ed80133b(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' pagepath, core ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' pagepath, core ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section5c766124c796046211996af7baf4b9dd(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                    <li class="adminpagepath-item">{{.}}</li>
                    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                    <li class="adminpagepath-item">';
                $value = $this->resolveValue($context->last(), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '</li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionC07a686b4adc558e5c163d437815dca1(Mustache_Context $context, $indent, $value)
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
                
                $buffer .= $indent . '                        ';
                $value = $this->resolveValue($context->last(), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionB9fbc4ca3c331dbf172e894ec55daf70(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                <h3 class="adminpagetitle"><a href="{{url}}">{{{title}}}</a></h3>
                <ul class="adminpagepath" aria-label="{{#str}} pagepath, core {{/str}}">
                    {{#path}}
                    <li class="adminpagepath-item">{{.}}</li>
                    {{/path}}
                </ul>
                <fieldset class="adminsettings">
                    {{#settings}}
                        {{{.}}}
                    {{/settings}}
                </fieldset>
            ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                <h3 class="adminpagetitle"><a href="';
                $value = $this->resolveValue($context->find('url'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '">';
                $value = $this->resolveValue($context->find('title'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '</a></h3>
';
                $buffer .= $indent . '                <ul class="adminpagepath" aria-label="';
                $value = $context->find('str');
                $buffer .= $this->sectionA092cd08353bf6cb94ecbf78ed80133b($context, $indent, $value);
                $buffer .= '">
';
                $value = $context->find('path');
                $buffer .= $this->section5c766124c796046211996af7baf4b9dd($context, $indent, $value);
                $buffer .= $indent . '                </ul>
';
                $buffer .= $indent . '                <fieldset class="adminsettings">
';
                $value = $context->find('settings');
                $buffer .= $this->sectionC07a686b4adc558e5c163d437815dca1($context, $indent, $value);
                $buffer .= $indent . '                </fieldset>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionE5479b5825bee73d37f8a0a91fe85548(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'savechanges, admin';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'savechanges, admin';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionC603aa016d2db2c7d6e94eb3a589cddc(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                <div class="row rui-sticky-btns">
                    <div class="mb-sm-5 mb-lg-0 pl-md-3">
                        <button type="submit" class="btn btn-primary">{{#str}}savechanges, admin{{/str}}</button>
                    </div>
                </div>
            ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                <div class="row rui-sticky-btns">
';
                $buffer .= $indent . '                    <div class="mb-sm-5 mb-lg-0 pl-md-3">
';
                $buffer .= $indent . '                        <button type="submit" class="btn btn-primary">';
                $value = $context->find('str');
                $buffer .= $this->sectionE5479b5825bee73d37f8a0a91fe85548($context, $indent, $value);
                $buffer .= '</button>
';
                $buffer .= $indent . '                    </div>
';
                $buffer .= $indent . '                </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section376621edd4c88baa7798c42fd8d48e0c(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            {{#results}}
                <h3 class="adminpagetitle"><a href="{{url}}">{{{title}}}</a></h3>
                <ul class="adminpagepath" aria-label="{{#str}} pagepath, core {{/str}}">
                    {{#path}}
                    <li class="adminpagepath-item">{{.}}</li>
                    {{/path}}
                </ul>
                <fieldset class="adminsettings">
                    {{#settings}}
                        {{{.}}}
                    {{/settings}}
                </fieldset>
            {{/results}}
            {{#showsave}}
                <div class="row rui-sticky-btns">
                    <div class="mb-sm-5 mb-lg-0 pl-md-3">
                        <button type="submit" class="btn btn-primary">{{#str}}savechanges, admin{{/str}}</button>
                    </div>
                </div>
            {{/showsave}}
        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $value = $context->find('results');
                $buffer .= $this->sectionB9fbc4ca3c331dbf172e894ec55daf70($context, $indent, $value);
                $value = $context->find('showsave');
                $buffer .= $this->sectionC603aa016d2db2c7d6e94eb3a589cddc($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section36817e26d3b370aa587ec3ea3b300e7a(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'noresults, admin';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'noresults, admin';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
