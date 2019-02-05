<?php

namespace Driver;

class LevenshteinDriver implements CompareDriverInterface
{
    /**
     * @inheritDoc
     */
    public function compare(string $first, string $second): float
    {
        $min = levenshtein($first, $second);

        $maxLength = max(mb_strlen($first), mb_strlen($second));
        $percent = (1 - ($min / $maxLength) ) * 100;

        return $percent;

    }

    /**
     * @inheritDoc
     * @codeCoverageIgnore
     */
    public function getDriverName(): string
    {
        return 'levenshtein';
    }
}
