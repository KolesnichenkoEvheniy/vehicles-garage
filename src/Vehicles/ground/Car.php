<?php

namespace App\Vehicles\ground;


use App\Drivers\DriverInterface;
use App\Drivers\GroundVehicleDriver;
use App\Fuels\Gas;
use App\Fuels\Petrol;
use App\vehicles\Vehicle;

class Car extends Vehicle implements GroundVehicle
{
    /**
     * @inheritdoc
     */
    public function getSuitableFuelTypes(): array
    {
        return [
            Petrol::class,
            Gas::class,
        ];
    }

    public function startDrive()
    {
        return "Car start driving\n";
    }

    public function stopDrive()
    {
        return "Car stop driving\n";
    }

    public function beeep()
    {
        return "beep from car\n";
    }
}