<?php

namespace App\Vehicles\ground;


use App\Behaviours\ground\BusBehaviour;
use App\Fuels\Gas;
use App\vehicles\Vehicle;

class Bus extends Vehicle implements GroundVehicle
{
    public function __construct($fuelAmount)
    {
        parent::__construct($fuelAmount);
        $this->behaviour = new BusBehaviour();
    }

    /**
     * @inheritdoc
     */
    public function getSuitableFuelTypes(): array
    {
        return [ Gas::class ];
    }
}