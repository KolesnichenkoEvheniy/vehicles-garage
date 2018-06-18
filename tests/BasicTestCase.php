<?php

namespace App;


use PHPUnit\Framework\TestCase;
use \Mockery as m;

class BasicTestCase extends TestCase
{
    use \Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;

    public function tearDown() {
        m::close();
    }
}