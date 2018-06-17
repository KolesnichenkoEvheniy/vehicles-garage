<?php

use App\Fuels\Gas;
use App\Fuels\Kerosene;
use App\Fuels\Petrol;

require "vendor/autoload.php";

$gasStation = new \App\GasStation\GasStation();

$gasStation->setAvailableFuels([
    new Gas(100),
    new Petrol(10),
    new Kerosene(300),
]);

echo "<pre>";

$garage = new \App\Garage($gasStation);

$garage->loadCar(new \App\Vehicles\ground\Car(10, 1000));
$garage->loadCar(new \App\vehicles\air\Plane(200, 1000));
$garage->loadCar(new \App\Vehicles\ground\Bus(30, 1000));

// refuel all with passing fuels
$garage->refuelVehicles();

$garage->useVehicles();

echo "</pre>";