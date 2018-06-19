<?php

namespace App\Behaviours\ground;


use App\Behaviours\BehaviourInterface;

class CarBehaviour implements BehaviourInterface
{
    public function startInteraction()
    {
        return "Car stop driving\n";
    }

    public function doStuff()
    {
        return "beep from car\n";
    }

    public function stopInteraction()
    {
        return "Car stop driving\n";
    }
}