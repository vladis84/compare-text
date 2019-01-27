<?php

namespace Driver;

class SimilarTextDriver implements CompareDriverInterface
{
    /**
     * @inheritdoc
     */
    public function compare(string $first, string $second): float
    {
        $percent = 0;
        similar_text($first, $second, $percent);

        return $percent;
    }

    /**
     * @inheritdoc
     */
    public function getDriverName(): string
    {
        return 'similar-text';
    }
}
