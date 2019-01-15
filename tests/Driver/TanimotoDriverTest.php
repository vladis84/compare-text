<?php

namespace Driver;

use PHPUnit\Framework\TestCase;

class TanimotoDriverTest extends TestCase
{
    public function testCompareANSI()
    {
        $driver = new TanimotoDriver();

        $actual = $driver->compare('hel', 'hello');

        $this->assertEquals(60, $actual);
    }

    public function testCompareUTF8()
    {
        $driver = new TanimotoDriver();

        $actual = $driver->compare('строчечка', 'строка');

        $this->assertEquals(66, $actual, '', 0.7);
    }
}
