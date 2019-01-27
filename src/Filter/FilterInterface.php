<?php

namespace Filter;

interface FilterInterface
{
    public function filter(string $text): string;
}
