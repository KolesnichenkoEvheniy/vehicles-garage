<?php

namespace App\Tests;

use App\BasicTestCase;
use App\Drivers\DriverInterface;
use App\Fuels\basis\Fuel;
use App\GasStation\GasStation;
use App\GasStation\GasStationInterface;
use App\vehicles\Vehicle;
use PHPUnit\Framework\TestCase;

class GarageTest extends BasicTestCase
{

    public function testGarageCanLoadACar()
    {
        $gasStation = new \App\GasStation\GasStation();
        $garage = new \App\Garage($gasStation);

        $garage->loadCar(new \App\Vehicles\ground\Car(10, 1000));
        $garage->loadCar(new \App\vehicles\air\Plane(200, 1000));

        $this->assertCount(2, $garage->getVehicles());
    }

    public function testGarageCanConnectWithGasStation()
    {
        $gasStation = new \App\GasStation\GasStation();
        $garage = new \App\Garage($gasStation);

        $this->assertEquals($gasStation, $garage->getGasStation());
    }

    public function testRefuelFunctionality()
    {
        $this->expectOutputString(" --- Refuel Mockery_0_App_vehicles_Vehicle\n");
        $fakeGasStation = \Mockery::mock(GasStationInterface::class)
            ->expects('refuel')
            ->andReturn(10)
            ->once()
            ->getMock();

        $fakeVehicle = \Mockery::mock(Vehicle::class)
            ->expects('addFuel')
            ->withArgs([10])
            ->once()
            ->getMock();

        $garage = new \App\Garage($fakeGasStation);
        $garage->loadCar($fakeVehicle);

        $garage->refuelVehicles();
    }

    public function testOfVehiclesUsage()
    {
        $this->expectOutputString("\n |--- Drive Mockery_0_App_vehicles_Vehicle\n");
        $fakeGasStation = \Mockery::mock(GasStationInterface::class)->makePartial();

        $fakeDriver = \Mockery::mock(DriverInterface::class);
        $fakeDriver->expects('startMove')->once();
        $fakeDriver->expects('doSomething')->once();
        $fakeDriver->expects('stopMove')->once();


        $fakeVehicle = \Mockery::mock(Vehicle::class)
            ->expects('getDriver')
            ->andReturn($fakeDriver->makePartial())
            ->times(3)
            ->getMock();

        $garage = new \App\Garage($fakeGasStation);
        $garage->loadCar($fakeVehicle);

        $garage->useVehicles();
    }
}