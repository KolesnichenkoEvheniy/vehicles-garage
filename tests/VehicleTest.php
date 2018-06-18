<?php

namespace App;


use App\Vehicles\ground\FakeVehicle;

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
}