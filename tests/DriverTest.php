<?php

namespace App;


use App\Behaviours\BehaviourInterface;
use App\Drivers\AirVehicleDriver;
use App\Drivers\GroundVehicleDriver;
use App\Vehicles\ground\FakeVehicle;
use App\vehicles\Vehicle;

class DriverTest extends BasicTestCase
{
    public function testGroundVehicleDriver()
    {
        $fakeBehaviour = \Mockery::mock(BehaviourInterface::class);
        $fakeBehaviour->shouldReceive('startInteraction')->once();
        $fakeBehaviour->shouldNotReceive('doStuff')->once();
        $fakeBehaviour->shouldReceive('stopInteraction')->once();

        $fakeVehicle = \Mockery::mock(Vehicle::class);
        $fakeVehicle->shouldReceive('getBehaviour')->andReturn($fakeBehaviour)->times(3);

        $groundDriver = new GroundVehicleDriver($fakeVehicle);
        $groundDriver->startMove();
        $groundDriver->doSomething();
        $groundDriver->stopMove();
    }

    public function testVehicleDriver()
    {
        $fakeBehaviour = \Mockery::mock(BehaviourInterface::class);
        $fakeBehaviour->shouldReceive('startInteraction')->once();
        $fakeBehaviour->shouldNotReceive('doStuff')->once();
        $fakeBehaviour->shouldReceive('stopInteraction')->once();

        $fakeVehicle = \Mockery::mock(Vehicle::class);
        $fakeVehicle->shouldReceive('getBehaviour')->andReturn($fakeBehaviour)->times(3);

        $groundDriver = new AirVehicleDriver($fakeVehicle);
        $groundDriver->startMove();
        $groundDriver->doSomething();
        $groundDriver->stopMove();
    }
}