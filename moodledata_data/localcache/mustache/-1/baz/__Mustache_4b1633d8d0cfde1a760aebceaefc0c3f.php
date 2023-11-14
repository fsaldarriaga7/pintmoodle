<?php

class __Mustache_4b1633d8d0cfde1a760aebceaefc0c3f extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $value = $this->resolveValue($context->findDot('output.doctype'), $context);
        $buffer .= $indent . ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '<html ';
        $value = $this->resolveValue($context->findDot('output.htmlattributes'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= ' ';
        $value = $context->find('darkmodeon');
        $buffer .= $this->sectionA9a7e73ef034d13acceee012944fd632($context, $indent, $value);
        $buffer .= '>
';
        $buffer .= $indent . '<head>
';
        $buffer .= $indent . '    <link rel="stylesheet" href="/theme/baz/style/tailwind.css">
';
        $buffer .= $indent . '    <title>';
        $value = $this->resolveValue($context->findDot('output.page_title'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '</title>
';
        $buffer .= $indent . '
';
        $value = $context->find('themeauthor');
        $buffer .= $this->sectionCd466746494270d10b5c6da52daa33d8($context, $indent, $value);
        $buffer .= $indent . '
';
        $buffer .= $indent . '    ';
        $value = $context->find('seometadesc');
        $buffer .= $this->section911f0122e1af5e081fb765d350d5f608($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '    <meta name="theme-color" content="';
        $value = $this->resolveValue($context->find('seothemecolor'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $value = $context->find('seothemecolor');
        if (empty($value)) {
            
            $buffer .= '#fff';
        }
        $buffer .= '">
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    <link rel="shortcut icon" href="';
        $value = $this->resolveValue($context->findDot('output.favicon'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '" />
';
        $buffer .= $indent . '    ';
        $value = $context->find('seoappletouchicon');
        $buffer .= $this->section51d2aab02794407c1086dba01236c39c($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    ';
        $value = $this->resolveValue($context->findDot('output.standard_head_html'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '    <meta name="viewport" content="width=device-width, initial-scale=1.0">
';
        $buffer .= $indent . '
';
        $value = $context->find('fontfiles');
        if (empty($value)) {
            
            $value = $context->find('googlefonturl');
            $buffer .= $this->section927dda6b50ae9364ea2d40f00ce0d04d($context, $indent, $value);
        }
        $buffer .= $indent . '
';
        $value = $context->find('fontawesome');
        $buffer .= $this->section8423c87c347c3d6505cc6fbc8ca3a2e7($context, $indent, $value);
        $buffer .= $indent . '
';
        $buffer .= $indent . '    <!-- Swiper JS -->
';
        $buffer .= $indent . '    <script src="';
        $value = $this->resolveValue($context->find('siteurl'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '/theme/baz/addons/swiper/swiper-bundle.min.js"></script>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '</head>
';

        return $buffer;
    }

    private function sectionA9a7e73ef034d13acceee012944fd632(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'class="dark-mode"';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'class="dark-mode"';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionCd466746494270d10b5c6da52daa33d8(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
    <!--

      Theme: BAZ Moodle Theme
      Author: Marcin Czaja - Rosea Themes (rosea.io)
      Version: 1.7.4

      Copyright © 2021 - 2023

    -->
    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '    <!--
';
                $buffer .= $indent . '
';
                $buffer .= $indent . '      Theme: BAZ Moodle Theme
';
                $buffer .= $indent . '      Author: Marcin Czaja - Rosea Themes (rosea.io)
';
                $buffer .= $indent . '      Version: 1.7.4
';
                $buffer .= $indent . '
';
                $buffer .= $indent . '      Copyright © 2021 - 2023
';
                $buffer .= $indent . '
';
                $buffer .= $indent . '    -->
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section911f0122e1af5e081fb765d350d5f608(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '<meta name="description" content="{{seometadesc}}">';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= '<meta name="description" content="';
                $value = $this->resolveValue($context->find('seometadesc'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '">';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section51d2aab02794407c1086dba01236c39c(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '<link rel="apple-touch-icon" href="{{seoappletouchicon}}">';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= '<link rel="apple-touch-icon" href="';
                $value = $this->resolveValue($context->find('seoappletouchicon'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '">';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section927dda6b50ae9364ea2d40f00ce0d04d(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="{{{googlefonturl}}}" rel="stylesheet">
    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '    <link rel="preconnect" href="https://fonts.googleapis.com">
';
                $buffer .= $indent . '    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
';
                $buffer .= $indent . '    <link href="';
                $value = $this->resolveValue($context->find('googlefonturl'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '" rel="stylesheet">
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section8423c87c347c3d6505cc6fbc8ca3a2e7(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
    <link href="{{siteurl}}/theme/baz/addons/fontawesome/css/all.css" rel="stylesheet">
    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '    <link href="';
                $value = $this->resolveValue($context->find('siteurl'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '/theme/baz/addons/fontawesome/css/all.css" rel="stylesheet">
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
