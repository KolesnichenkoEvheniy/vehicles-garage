<?php

namespace App\vehicles\air;


use App\Drivers\AirVehicleDriver;
use App\Drivers\DriverInterface;
use App\Fuels\Kerosene;
use App\vehicles\Vehicle;

class Plane extends Vehicle implements AirVehicle
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
}