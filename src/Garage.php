<?php

namespace App;


use App\vehicles\Vehicle;

class Garage
{
    protected $vehicles = [];

    /**
     * @var \App\GasStation\GasStation
     */
    protected $gasStation;

    /**
     * Garage constructor.
     * @param \App\GasStation\GasStation $gasStation
     */
    public function __construct(\App\GasStation\GasStation $gasStation)
    {
        $this->gasStation = $gasStation;
    }

    /**
     * @return \App\GasStation\GasStation
     */
    public function getGasStation(): \App\GasStation\GasStation
    {
        return $this->gasStation;
    }

    /**
     * @return array
     */
    public function getVehicles(): array
    {
        return $this->vehicles;
    }

    public function loadCar(Vehicle $vehicle)
    {
        $this->vehicles[] = $vehicle;
    }

    /**
     * @throws \Exception
     */
    public function refuelVehicles()
    {
        foreach ($this->vehicles as $vehicle) {
            /** @var Vehicle $vehicle */
            echo " --- Refuel " . get_class($vehicle) . "\n";
            $fuelFromStation = $this->gasStation->refuel($vehicle);

            $vehicle->addFuel($fuelFromStation);

            echo " --- Now " . get_class($vehicle) . " has {$vehicle->getFuelAmount()}\n";
        }
    }

    public function useVehicles()
    {
        foreach ($this->vehicles as $vehicle) {
            /** @var Vehicle $vehicle */
            echo "\n |--- Drive " . get_class($vehicle) . "\n";
            echo $vehicle->getDriver()->startMove();
            echo $vehicle->getDriver()->doSomething();
            echo $vehicle->getDriver()->stopMove();
        }
    }
}