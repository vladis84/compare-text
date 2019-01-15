<?php

namespace Driver;

class SimilarTextDriver implements CompareDriver
{
    public function compare(string $first, string $second): float
    {
        $percent = 0;
        similar_text($first, $second, $percent);

        return $percent;
    }
}
