<?php

namespace Driver;

use PHPUnit\Framework\TestCase;

/**
 * @group unit
 */
class SimilarTextDriverTest extends TestCase
{
    public function testCompareANSI()
    {
        $driver = new SimilarTextDriver();

        $percent = $driver->compare('str', 'string');

        $this->assertEquals(66, $percent, '', 0.7);
    }

    public function testCompareUTF8()
    {
        $driver = new SimilarTextDriver();

        $percent = $driver->compare('строчечка', 'строка');

        $this->assertEquals(80, $percent, '', 0.7);
    }
}
