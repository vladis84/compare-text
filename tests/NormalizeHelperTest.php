<?php

use PHPUnit\Framework\TestCase;

class NormalizeHelperTest extends TestCase
{
    public function testNormalize()
    {
        $actual = NormalizeHelper::normalize(" Привет  \t ?МИ!@р ");

        $this->assertEquals('привет мир', $actual);
    }
}
