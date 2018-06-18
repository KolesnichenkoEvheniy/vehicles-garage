<?php

namespace App\GasStation;

use App\vehicles\Vehicle;

class GasStation implements GasStationInterface
{
    /**
     * @var \App\Fuels\basis\Fuel[]
     */
    protected $availableFuels = [];

    /**
     * @param array $availableFuels
     * @return GasStation
     */
    public function setAvailableFuels(array $availableFuels): GasStation
    {
        /** @var \App\Fuels\basis\Fuel[] $availableFuels */
        // save to local variable to save some time
        $fuelsCount = count($availableFuels);
        for ($i = 0; $i < $fuelsCount - 1; $i++) {
            $availableFuels[$i]->setNext($availableFuels[$i + 1]);
        }

        $this->availableFuels = $availableFuels;

        return $this;
    }

    /**
     * @return \App\Fuels\basis\Fuel[]
     */
    public function getAvailableFuels(): array
    {
        return $this->availableFuels;
    }

    /**
     * @param \App\vehicles\Vehicle $vehicle
     * @return int
     * @throws \Exception
     */
    public function refuel(Vehicle $vehicle) : int
    {
        if (empty($this->getAvailableFuels())) {
            throw new \Exception("No fuels avaiable");
        }

        return current($this->getAvailableFuels())->refuel($vehicle->getNeedFuelAmount(), $vehicle->getSuitableFuelTypes());
    }
}