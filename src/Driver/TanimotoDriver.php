<?php

namespace Driver;

class TanimotoDriver implements CompareDriverInterface
{
    /**
     * @inheritdoc
     */
    public function compare(string $first, string $second): float
    {
        $firstCount  = mb_strlen($first);
        $secondCount = mb_strlen($second);

        $intersectionCount = 0;
        for ($i = 0; $i < $firstCount; $i++) {
            $char = mb_substr($first, $i, 1);

            if (mb_strpos($second, $char) !== false) {
                $intersectionCount++;
            }
        }

        $tanimoto = $intersectionCount / ($firstCount + $secondCount - $intersectionCount);
        $percent  = $tanimoto * 100;

        return $percent;
    }

    /**
     * @inheritDoc
     * @codeCoverageIgnore
     */
    public function getDriverName(): string
    {
        return 'tanimoto';
    }
}
