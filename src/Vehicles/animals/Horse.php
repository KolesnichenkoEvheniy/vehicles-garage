<?php

namespace App\Vehicles\animals;


use App\Fuels\HorseFood;
use App\Vehicles\ground\GroundVehicle;
use App\vehicles\Vehicle;

class Horse extends Vehicle implements GroundVehicle
{
    /**
     * @inheritdoc
     */
    public function getSuitableFuelTypes(): array
    {
        return [ HorseFood::class ];
    }

    public function startDrive()
    {
        return "The horse is running\n";
    }

    public function stopDrive()
    {
        return "The horse is stops\n";
    }

    public function beeep()
    {
        return "The horse signals it is alive\n";
    }
}