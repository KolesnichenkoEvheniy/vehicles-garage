<?php

namespace App\GasStation;

use App\vehicles\Vehicle;

class GasStation
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
     * @param \App\vehicles\Vehicle $vehicle
     * @return int
     * @throws \Exception
     */
    public function refuel(Vehicle $vehicle) : int
    {
        if (empty($this->availableFuels)) {
            throw new \Exception("No fuels avaiable");
        }

        return $this->availableFuels[0]->refuel($vehicle->getNeedFuelAmount(), $vehicle->getSuitableFuelTypes());
    }
}