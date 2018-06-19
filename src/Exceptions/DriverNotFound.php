<?php

namespace App\Exceptions;


class DriverNotFound extends \Exception
{
    protected $message = 'There is no driver for this type of car';
}