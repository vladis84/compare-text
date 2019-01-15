<?php

namespace Driver;

use PHPUnit\Framework\TestCase;

class MetaphoneDriverTest extends TestCase
{
    public function testCompareUTF8()
    {
        $driver = new MetaphoneDriver();

        $actual = $driver->compare('привет', 'привет');

        $this->assertEquals(0, $actual);
    }

    public function testCompareANSI()
    {
        $driver = new MetaphoneDriver();

        $actual = $driver->compare('hello', 'hel');

        $this->assertEquals(100, $actual);
    }
}
