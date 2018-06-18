<?php

namespace App;


use App\Fuels\FakeFuel;
use App\GasStation\GasStation;
use App\vehicles\Vehicle;

class GasStationTest extends BasicTestCase
{
    public function testSettingUpAvailableFuelsWithSuccessors()
    {
        $gasStation = new GasStation();
        $fuelsToSet = [new FakeFuel(100)];
        $gasStation->setAvailableFuels($fuelsToSet);
        $this->assertCount(1, $gasStation->getAvailableFuels());
        $this->assertEquals($fuelsToSet, $gasStation->getAvailableFuels());

        $fuelsToSet = [new FakeFuel(100), new FakeFuel(10)];
        $gasStation->setAvailableFuels($fuelsToSet);
        $this->assertCount(2, $gasStation->getAvailableFuels());
        $this->assertEquals($fuelsToSet, $gasStation->getAvailableFuels());
    }

    public function testGasStationCanNotRefuelWithoutFuelRefuel()
    {
        $this->expectException(\Exception::class);

        $gasStation = new GasStation();
        $fuelsToSet = [];
        $gasStation->setAvailableFuels($fuelsToSet);

        $fakeVehicle = \Mockery::mock(Vehicle::class);

        $gasStation->refuel($fakeVehicle);
    }

    public function testGasStationCanRefuelWithoutFuelRefuel()
    {
        $gasStation = new GasStation();
        $fuelsToSet = [new FakeFuel(100)];
        $gasStation->setAvailableFuels($fuelsToSet);

        $fakeVehicle = \Mockery::mock(Vehicle::class);
        $fakeVehicle->shouldReceive('getNeedFuelAmount')->andReturn(50)->once();
        $fakeVehicle->shouldReceive('getSuitableFuelTypes')->andReturn([FakeFuel::class])->once();

        $this->assertEquals(50, $gasStation->refuel($fakeVehicle));
    }
}