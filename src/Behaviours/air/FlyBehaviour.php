<?php

namespace App\Behaviours\air;


use App\Behaviours\BehaviourInterface;

class FlyBehaviour implements BehaviourInterface
{
    public function startInteraction()
    {
        return "plane takes off\n";
    }

    public function doStuff()
    {
        return "plane just flying\n";
    }

    public function stopInteraction()
    {
        return "plane lands on\n";
    }
}