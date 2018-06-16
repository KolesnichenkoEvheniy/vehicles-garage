<?php


namespace App\Vehicles\ground;


interface GroundVehicle
{
    public function startDrive();

    public function stopDrive();

    public function beeep();
}