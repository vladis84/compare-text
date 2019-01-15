<?php

namespace Driver;

class MetaphoneDriver implements CompareDriver
{
    public function compare(string $first, string $second): float
    {
        $firstKey = metaphone($first);
        $secondKey = metaphone($first);

        $percent = 0;

        if (!$firstKey || !$secondKey) {
            return $percent;
        }
        similar_text($firstKey, $secondKey, $percent);

        return $percent;
    }
}
