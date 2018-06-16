<?php

namespace App\vehicles\air;


use App\Drivers\AirVehicleDriver;
use App\Drivers\Driver;
use App\Fuels\Kerosene;
use App\vehicles\Vehicle;

class Plane extends Vehicle
{
    /**
     * @inheritdoc
     */
    public function getSuitableFuelTypes(): array
    {
        return [ Kerosene::class ];
    }

    public function takeOff()
    {
        return "plane takes off\n";
    }

    public function landOn()
    {
        return "plane lands on\n";
    }

    public function getDriver(): Driver
    {
        return new AirVehicleDriver($this);
    }
}