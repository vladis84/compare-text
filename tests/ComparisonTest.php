<?php

class ComparisonTest extends \PHPUnit\Framework\TestCase
{
    public function testCompare()
    {
        $comparison = new Comparison();

        $result = $comparison->compare('Hello', [' hello ', 'HEL']);

        var_dump($result);
    }
}
