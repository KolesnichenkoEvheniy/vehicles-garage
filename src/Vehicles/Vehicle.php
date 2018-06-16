<?php

namespace App\vehicles;


use App\Drivers\Driver;

abstract class Vehicle
{
    /**
     * @var integer
     */
    protected $fuelAmount = 0;

    protected $needFuelAmount;

    /**
     * @var \App\Drivers\Driver
     */
    protected $driver;

    /**
     * @var integer
     */
    protected $maxSpeed;

    public function __construct($fuelAmount, $maxSpeed)
    {
        $this->needFuelAmount = $fuelAmount;
        $this->maxSpeed = $maxSpeed;
    }

    /**
     * @param int $fuelAmount
     */
    public function setFuelAmount(int $fuelAmount): void
    {
        $this->fuelAmount = $fuelAmount;
    }

    /**
     * @param int $fuelAmount
     */
    public function addFuel(int $fuelAmount): void
    {
        $this->fuelAmount += $fuelAmount;
    }

    /**
     * @return int
     */
    public function getFuelAmount(): int
    {
        return $this->fuelAmount;
    }

    /**
     * @return mixed
     */
    public function getNeedFuelAmount()
    {
        return $this->needFuelAmount;
    }

    abstract public function getSuitableFuelTypes() : array;
    abstract public function getDriver() : Driver;
}