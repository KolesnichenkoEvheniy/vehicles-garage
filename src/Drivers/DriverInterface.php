<?php


namespace App\Drivers;


interface DriverInterface
{
    public function startMove();
    public function doSomething();
    public function stopMove();
}