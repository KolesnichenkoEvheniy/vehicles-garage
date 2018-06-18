<?php

namespace App\Vehicles\ground;


use App\Drivers\DriverInterface;
use App\Drivers\GroundVehicleDriver;
use App\Fuels\FakeFuel;
use App\Fuels\Gas;
use App\vehicles\Vehicle;

class FakeVehicle extends Vehicle implements GroundVehicle
{
    /**
     * @inheritdoc
     */
    public function getSuitableFuelTypes(): array
    {
        return [ FakeFuel::class ];
    }

    public function startDrive()
    {
        return "Fake vehicle starts moving";
    }

    public function stopDrive()
    {
        return "Fake vehicle stops moving";
    }

    public function beeep()
    {
        return "Fake vehicle make beep";
    }

    public function getDriver(): DriverInterface
    {
        return new GroundVehicleDriver($this);
    }
}