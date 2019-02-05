<?php

namespace Driver;

use PHPUnit\Framework\TestCase;

/**
 * @group unit
 */
class LevenshteinDriverTest extends TestCase
{
    public function testCompareUTF8()
    {
        $driver = new LevenshteinDriver();

        $actual = $driver->compare('привет', 'привет');

        $this->assertEquals(100, $actual);
    }

    public function testCompareANSI()
    {
        $driver = new LevenshteinDriver();

        $actual = $driver->compare('hello', 'hel');

        $this->assertEquals(60, $actual);
    }
}
