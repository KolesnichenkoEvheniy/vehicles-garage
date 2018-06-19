<?php

namespace App\Behaviours\ground;


use App\Behaviours\BehaviourInterface;

class BusBehaviour implements BehaviourInterface
{
    public function startInteraction()
    {
        return "Bus start driving\n";
    }

    public function doStuff()
    {
        return "loud beep from bus\n";
    }

    public function stopInteraction()
    {
        return "Bus stop driving\n";
    }
}