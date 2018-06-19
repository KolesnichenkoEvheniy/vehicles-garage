<?php

namespace App;


use App\Drivers\GroundVehicleDriver;
use App\Exceptions\DriverNotFound;
use App\Vehicles\ground\FakeVehicle;
use App\Vehicles\ground\FakeVehicleWithoutType;

class VehicleTest extends BasicTestCase
{
    public function testOperationsWithFuel()
    {
        $vehicle = new FakeVehicle(100, 1000);
        $vehicle->setFuelAmount(10)
            ->addFuel(10);

        $this->assertEquals($vehicle->getFuelAmount(), 20);
        $this->assertEquals($vehicle->getNeedFuelAmount(), 100);
    }

    public function testShouldCorrectlyFindOutDriver()
    {
        $vehicle = new FakeVehicle(100, 1000);
        $driver = $vehicle->getDriver();

        $this->assertInstanceOf(GroundVehicleDriver::class, $driver);
    }

    public function testShouldThrowExceptionInCaseDriverNotFound()
    {
        $this->expectException(DriverNotFound::class);
        $vehicle = new FakeVehicleWithoutType(100, 1000);
        $driver = $vehicle->getDriver();
    }
}