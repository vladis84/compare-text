<?php

class NormalizeHelper
{
    public static function normalize(string $text): string
    {
        $text = trim($text);

        $text = mb_strtolower($text);

        $text = preg_replace('/\s+/', ' ', $text);

        $text = preg_replace('/[^\w^\s]+/u', '', $text);

        return $text;
    }
}
