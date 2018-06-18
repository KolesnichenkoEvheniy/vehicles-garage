<?php

namespace App\GasStation;

use App\vehicles\Vehicle;

interface GasStationInterface
{
    /**
     * @param array $availableFuels
     * @return GasStation
     */
    public function setAvailableFuels(array $availableFuels): GasStation;

    /**
     * @param \App\vehicles\Vehicle $vehicle
     * @return int
     * @throws \Exception
     */
    public function refuel(Vehicle $vehicle): int;
}