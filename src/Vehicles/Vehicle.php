<?php

namespace App\vehicles;


use App\Drivers\DriverInterface;

abstract class Vehicle
{
    /**
     * @var integer
     */
    protected $fuelAmount = 0;

    protected $needFuelAmount;

    /**
     * @var \App\Drivers\DriverInterface
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
     * @return \App\vehicles\Vehicle
     */
    public function setFuelAmount(int $fuelAmount): \App\vehicles\Vehicle
    {
        $this->fuelAmount = $fuelAmount;
        return $this;
    }

    /**
     * @param int $fuelAmount
     * @return \App\vehicles\Vehicle
     */
    public function addFuel(int $fuelAmount) : \App\vehicles\Vehicle
    {
        $this->fuelAmount += $fuelAmount;
        return $this;
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
    abstract public function getDriver() : DriverInterface;
}