<?php

namespace Driver;

use PHPUnit\Framework\TestCase;

/**
 * @group unit
 */
class HPDriverTest extends TestCase
{
    public function testCompareUTF8()
    {
        $driver = new HPDriver();

        $actual = $driver->compare('привет мир', 'привет');

        $this->assertEquals(83, $actual, '', 0.4);
    }

    public function testCompareANSI()
    {
        $driver = new HPDriver();

        $actual = $driver->compare('hello', 'hel');

        $this->assertEquals(66, $actual, '', 0.7);
    }
}
