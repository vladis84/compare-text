<?php

namespace Driver;

interface CompareDriver
{
    public function compare(string $first, string $second): float;
}
