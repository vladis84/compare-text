<?php

namespace Filter;

class SpaceFilter implements FilterInterface
{
    public function filter(string $text): string
    {
        $text = trim($text);

        $text = mb_strtolower($text);

        $text = preg_replace('/\s+/', ' ', $text);

        $text = preg_replace('/[^\w^\s]+/u', '', $text);

        return $text;
    }
}
