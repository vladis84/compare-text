<?php

namespace Driver;

use PHPUnit\Framework\TestCase;

/**
 * @group unit
 */
class StringEqualsDriverTest extends TestCase
{
    public function testCompareANSI()
    {
        $driver = new StringEqualsDriver();

        $percent = $driver->compare('string', 'string');

        $this->assertEquals(100, $percent);
    }

    public function testCompareANSIZeroPercent()
    {
        $driver = new StringEqualsDriver();

        $percent = $driver->compare('str', 'string');

        $this->assertEquals(0, $percent);
    }

    public function testCompareUTF8()
    {
        $driver = new StringEqualsDriver();

        $percent = $driver->compare('строка', 'строка');

        $this->assertEquals(100, $percent);
    }
}
