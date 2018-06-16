<?php

namespace App\Fuels\basis;


abstract class Fuel
{
    /**
     * @var int
     */
    protected $amount;

    /**
     * @var self
     */
    protected $successor;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    public function getAmount() : int
    {
        return $this->amount;
    }

    public function setAmount(string $amount) : self
    {
        $this->amount = $amount;
        return $this;
    }

    public function setNext(self $fuel)
    {
        $this->successor = $fuel;
    }

    /**
     * @param int $amountOfFuel
     * @param $satiableFuelTypes
     * @return int
     * @throws \Exception
     */
    public function refuel(int $amountOfFuel, $satiableFuelTypes) : int
    {
        if ($this->canRefuel($amountOfFuel, $satiableFuelTypes)) {
            $this->spendFuel($amountOfFuel);
            echo "Now " . get_called_class() . " has amount {$this->amount}\n";
            echo sprintf('Refill %s using %s' . PHP_EOL, $amountOfFuel, get_called_class());
            return $amountOfFuel;
        } elseif ($this->successor) {
            echo sprintf('[info] Cannot refill using %s. Proceeding ..' . PHP_EOL, get_called_class());
            return $this->successor->refuel($amountOfFuel, $satiableFuelTypes);
        } else {
            echo sprintf('Cannot refill using %s. Proceeding ..' . PHP_EOL, get_called_class());
            return 0;
        }
    }

    public function canRefuel($amountOfFuel, $satiableFuelTypes): bool
    {
        return $this->amount >= $amountOfFuel && $this->fuelIsSatiable($satiableFuelTypes);
    }

    /**
     * @param $satiableFuelTypes
     * @return bool
     */
    protected function fuelIsSatiable($satiableFuelTypes) : bool
    {
        return in_array(static::class, $satiableFuelTypes);
    }

    /**
     * @param int $amountOfFuel
     */
    protected function spendFuel(int $amountOfFuel): void
    {
        $this->amount -= $amountOfFuel;
    }
}