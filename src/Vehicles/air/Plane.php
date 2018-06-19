<?php

namespace App\vehicles\air;


use App\Behaviours\air\FlyBehaviour;
use App\Drivers\AirVehicleDriver;
use App\Drivers\DriverInterface;
use App\Fuels\Kerosene;
use App\vehicles\Vehicle;

class Plane extends Vehicle implements AirVehicle
{

    public function __construct($fuelAmount)
    {
        parent::__construct($fuelAmount);
        $this->behaviour = new FlyBehaviour();
    }

    /**
     * @inheritdoc
     */
    public function getSuitableFuelTypes(): array
    {
        return [ Kerosene::class ];
    }
}