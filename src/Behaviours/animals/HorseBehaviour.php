<?php

namespace App\Behaviours\animals;


use App\Behaviours\BehaviourInterface;

class HorseBehaviour implements BehaviourInterface
{
    public function startInteraction()
    {
        return "The horse is running\n";
    }

    public function stopInteraction()
    {
        return "The horse is stops\n";
    }

    public function doStuff()
    {
        return "The horse signals it is alive\n";
    }
}