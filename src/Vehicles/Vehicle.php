<?php

namespace App\vehicles;


use App\Drivers\DriverInterface;
use App\Drivers\DriversFactory;
use App\Exceptions\DriverNotFound;

abstract class Vehicle
{
    /**
     * @var integer
     */
    protected $fuelAmount = 0;

    protected $needFuelAmount = 10;

    /**
     * @var \App\Drivers\DriverInterface
     */
    protected $driver;

    /**
     * @var \App\Behaviours\BehaviourInterface
     */
    protected $behaviour;

    public function __construct($fuelAmount)
    {
        $this->needFuelAmount = $fuelAmount;
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

    /**
     * @return \App\Behaviours\BehaviourInterface
     */
    public function getBehaviour(): \App\Behaviours\BehaviourInterface
    {
        return $this->behaviour;
    }

    /**
     * @return \App\Drivers\DriverInterface
     * @throws \App\Exceptions\DriverNotFound
     */
    public function getDriver()
    {
        $driver = DriversFactory::getDriverFor($this);

        if (is_null($driver)) {
            throw new DriverNotFound();
        }

        return $driver;
    }

    abstract public function getSuitableFuelTypes() : array;
}