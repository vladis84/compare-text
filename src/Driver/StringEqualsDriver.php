<?php

namespace Driver;

class StringEqualsDriver implements CompareDriver
{
    public function compare(string $first, string $second): float
    {
        $percent = 0;

        if ($first == $second) {
            $percent = 100;
        }

        return $percent;
    }
}
