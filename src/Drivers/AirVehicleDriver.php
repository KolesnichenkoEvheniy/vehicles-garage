<?php

namespace App\Drivers;


class AirVehicleDriver implements DriverInterface
{
    /**
     * @var \App\Vehicles\air\AirVehicle
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
        return $this->vehicle->takeOff();
    }

    public function doSomething()
    {
        // plane just fly
    }

    public function stopMove()
    {
        return $this->vehicle->landOn();
    }
}