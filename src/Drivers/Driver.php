<?php


namespace App\Drivers;


interface Driver
{
    public function startMove();
    public function doSomething();
    public function stopMove();
}