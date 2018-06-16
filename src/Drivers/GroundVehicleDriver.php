<?php

namespace App\Drivers;


class GroundVehicleDriver implements Driver
{
    /**
     * @var \App\Vehicles\ground\GroundVehicle
     */
    protected $vehicle;

    /**
     * GroundVehicleDriver constructor.
     * @param $vehicle
     */
    public function __construct($vehicle)
    {
        $this->vehicle = $vehicle;
    }

    public function startMove()
    {
        return $this->vehicle->startDrive();
    }

    public function doSomething()
    {
        return $this->vehicle->beeep();
    }

    public function stopMove()
    {
        return $this->vehicle->stopDrive();
    }
}