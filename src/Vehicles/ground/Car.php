<?php

namespace App\Vehicles\ground;


use App\Behaviours\ground\CarBehaviour;
use App\Fuels\Gas;
use App\Fuels\Petrol;
use App\vehicles\Vehicle;

class Car extends Vehicle implements GroundVehicle
{
    public function __construct($fuelAmount)
    {
        parent::__construct($fuelAmount);
        $this->behaviour = new CarBehaviour();
    }

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
}