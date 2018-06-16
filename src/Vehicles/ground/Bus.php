<?php

namespace App\Vehicles\ground;


use App\Drivers\Driver;
use App\Drivers\GroundVehicleDriver;
use App\Fuels\Gas;
use App\vehicles\Vehicle;

class Bus extends Vehicle implements GroundVehicle
{
    /**
     * @inheritdoc
     */
    public function getSuitableFuelTypes(): array
    {
        return [ Gas::class ];
    }

    public function startDrive()
    {
        return "Bus start driving\n";
    }

    public function stopDrive()
    {
        return "Bus stop driving\n";
    }

    public function beeep()
    {
        return "loud beep from bus\n";
    }

    public function getDriver(): Driver
    {
        return new GroundVehicleDriver($this);
    }
}