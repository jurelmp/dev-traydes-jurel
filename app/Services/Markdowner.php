<?php

namespace Traydes\Services;

use Michelf\MarkdownExtra;
use Michelf\SmartyPants;

/**
 * Created by PhpStorm.
 * User: Jurel
 * Date: 10/8/2015
 * Time: 11:18 AM
 */
class Markdowner
{

    public function toHtml($text)
    {
        $text = $this->preTransformText($text);
        $text = MarkdownExtra::defaultTransform($text);
        $text = SmartyPants::defaultTransform($text);
        $text = $this->postTransformText($text);
        return $text;
    }

    protected function preTransformText($text)
    {
        return $text;
    }

    protected function postTransformText($text)
    {
        return $text;
    }

}