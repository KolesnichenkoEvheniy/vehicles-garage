<?php


namespace App\Behaviours;


interface BehaviourInterface
{
    public function startInteraction();
    public function doStuff();
    public function stopInteraction();
}