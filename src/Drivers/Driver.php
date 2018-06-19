<?php

namespace App\Drivers;


class Driver
{
    /**
     * @var \App\vehicles\Vehicle
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
        return $this->vehicle->getBehaviour()->startInteraction();
    }

    public function doSomething()
    {
        return $this->vehicle->getBehaviour()->doStuff();
    }

    public function stopMove()
    {
        return $this->vehicle->getBehaviour()->stopInteraction();
    }
}