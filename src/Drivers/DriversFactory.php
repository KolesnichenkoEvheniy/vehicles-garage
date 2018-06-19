<?php

namespace App\Drivers;


use App\Exceptions\DriverNotFound;
use App\Vehicles\air\AirVehicle;
use App\Vehicles\ground\GroundVehicle;
use App\vehicles\Vehicle;

class DriversFactory
{
    private static function getDriversMap()
    {
        return [
            GroundVehicle::class => GroundVehicleDriver::class,
            AirVehicle::class => AirVehicleDriver::class,
        ];
    }

    /**
     * @param \App\vehicles\Vehicle $vehicle
     * @return \App\Drivers\DriverInterface|null
     */
    public static function getDriverFor(Vehicle $vehicle)
    {
        $vehicleType = array_intersect_key(
            class_implements($vehicle),
            self::getDriversMap()
        );

        if (empty($vehicleType)) {
            return null;
        }

        $vehicleType = current(array_values($vehicleType));
        if (!array_key_exists($vehicleType, self::getDriversMap())) {
            return null;
        }

        $driverClassName = self::getDriversMap()[$vehicleType];
        return new $driverClassName($vehicle);
    }
}