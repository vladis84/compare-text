<?php

namespace Driver;

interface CompareDriverInterface
{
    /**
     * Сравнение строк.
     *
     * @param string $first
     * @param string $second
     *
     * @return float
     */
    public function compare(string $first, string $second): float;

    /**
     * Название драйвера.
     *
     * @return string
     */
    public function getDriverName(): string;
}
