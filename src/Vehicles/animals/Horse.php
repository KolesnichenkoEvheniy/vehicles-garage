<?php

namespace App\Vehicles\animals;


use App\Behaviours\animals\HorseBehaviour;
use App\Fuels\HorseFood;
use App\Vehicles\ground\GroundVehicle;
use App\vehicles\Vehicle;

class Horse extends Vehicle implements GroundVehicle
{
    public function __construct($fuelAmount)
    {
        parent::__construct($fuelAmount);
        $this->behaviour = new HorseBehaviour();
    }

    /**
     * @inheritdoc
     */
    public function getSuitableFuelTypes(): array
    {
        return [ HorseFood::class ];
    }
}