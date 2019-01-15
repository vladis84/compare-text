<?php

namespace Driver;

class TanimotoDriver implements CompareDriver
{
    public function compare(string $first, string $second): float
    {
        $firstCount  = mb_strlen($first);
        $secondCount = mb_strlen($second);

        $intersection = [];
        for ($i = 0; $i < $firstCount; $i++) {
            $char = mb_substr($first, $i, 1);

            if (mb_strpos($second, $char) !== false) {
                $intersection[$char] = $char;
            }
        }

        $intersectionCount = count($intersection);

        $tanimoto = $intersectionCount / ($firstCount + $secondCount - $intersectionCount);
        $percent  = $tanimoto * 100;

        return $percent;
    }
}
