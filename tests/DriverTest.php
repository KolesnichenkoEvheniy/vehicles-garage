<?php

namespace App;


use App\Drivers\AirVehicleDriverInterface;
use App\Drivers\GroundVehicleDriver;
use App\Vehicles\ground\FakeVehicle;
use App\vehicles\Vehicle;

class DriverTest extends BasicTestCase
{
    public function testGroundVehicleDriver()
    {
        $fakeVehicle = \Mockery::mock(Vehicle::class);
        $fakeVehicle->shouldReceive('startDrive')->once();
        $fakeVehicle->shouldReceive('beeep')->once();
        $fakeVehicle->shouldReceive('stopDrive')->once();

        $groundDriver = new GroundVehicleDriver($fakeVehicle);
        $groundDriver->startMove();
        $groundDriver->doSomething();
        $groundDriver->stopMove();
    }

    public function testAirVehicleDriver()
    {
        $fakeVehicle = \Mockery::mock(Vehicle::class);
        $fakeVehicle->shouldReceive('takeOff')->once();
        $fakeVehicle->shouldNotReceive('beeep');
        $fakeVehicle->shouldReceive('landOn')->once();

        $groundDriver = new AirVehicleDriverInterface($fakeVehicle);
        $groundDriver->startMove();
        $groundDriver->doSomething();
        $groundDriver->stopMove();
    }
}