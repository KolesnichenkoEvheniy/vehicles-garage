<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

class GarageTest extends TestCase
{
    public function testGarageCanLoadACar()
    {
        $gasStation = new \App\GasStation\GasStation();
        $garage = $garage = new \App\Garage($gasStation);

        $garage->loadCar(new \App\Vehicles\ground\Car(10, 1000));
        $garage->loadCar(new \App\vehicles\air\Plane(200, 1000));

        $this->assertCount(2, $garage->getVehicles());
    }

    public function testGarageCanConnectWithGasStation()
    {
        $gasStation = new \App\GasStation\GasStation();
        $garage = $garage = new \App\Garage($gasStation);

        $this->assertEquals($gasStation, $garage->getGasStation());
    }
}