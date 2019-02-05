<?php

use Driver\TanimotoDriver;
use Filter\SpaceFilter;

/**
 * @group unit
 */
class ComparisonTest extends \PHPUnit\Framework\TestCase
{
    public function testCompare()
    {
        $comparison     = new Comparison();
        $tanimotoDriver = $this
            ->getMockBuilder(TanimotoDriver::class)
            ->setMethods(['compare'])
            ->getMock()
        ;
        $tanimotoDriver
            ->expects(self::any())
            ->method('compare')
            ->willReturn(100)
        ;
        $comparison->addDriver($tanimotoDriver);
        $comparison->addFilter(new SpaceFilter);
        $expected = [
            'tanimoto' => [
                ['percent' => 100, 'needle' => 'Hello', 'haystack' => ' hello '],
                ['percent' => 100, 'needle' => 'Hello', 'haystack' => 'HEL'],
            ],
        ];

        $actual = $comparison->compare('Hello', [' hello ', 'HEL']);

        $this->assertEquals($expected, $actual);
    }
}
