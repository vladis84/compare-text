<?php

namespace Driver;

class StringEqualsDriver implements CompareDriverInterface
{
    /**
     * @inheritdoc
     */
    public function compare(string $first, string $second): float
    {
        $percent = 0;

        if ($first == $second) {
            $percent = 100;
        }

        return $percent;
    }

    /**
     * @inheritdoc
     * @codeCoverageIgnore
     */
    public function getDriverName(): string
    {
        return 'string-equals';
    }
}
