<?php

namespace App;


use App\Fuels\basis\Fuel;
use App\Fuels\FakeFuel;

class FuelTest extends BasicTestCase
{
    public function testCanRefuel()
    {
        $fakeFuel = new FakeFuel(10);
        $satiableFuelTypes = [ FakeFuel::class ];
        $this->assertTrue($fakeFuel->canRefuel(5, $satiableFuelTypes));
        $this->assertFalse($fakeFuel->canRefuel(50, $satiableFuelTypes));
        $this->assertFalse($fakeFuel->canRefuel(50, []));
    }

    public function testOfRefuelFunctionality()
    {
        $this->expectOutputString("Now App\Fuels\FakeFuel has amount 50
Refill 50 using App\Fuels\FakeFuel\n");

        $fakeFuel = new FakeFuel(100);
        $satiableFuelTypes = [ FakeFuel::class ];

        $this->assertEquals(
            50,
            $fakeFuel->refuel(50, $satiableFuelTypes)
        );
    }

    public function testOfRefuelWithSuccessor()
    {
        $this->expectOutputString("Now App\Fuels\FakeFuel has amount 50\nRefill 50 using App\Fuels\FakeFuel\n[info] Cannot refill using App\Fuels\FakeFuel. Proceeding ..\nCannot refill using App\Fuels\FakeFuel. Proceeding ..
");

        $fakeFuel = new FakeFuel(100);
        $satiableFuelTypes = [ FakeFuel::class ];

        // case 1: get satisfiable fuel from this fake fuel
        $this->assertEquals(
            50,
            $fakeFuel->refuel(50, $satiableFuelTypes)
        );

        $fakeSecondFuel = \Mockery::mock(Fuel::class)
            ->shouldReceive('refuel')
            ->andReturn(100)
            ->once()
            ->getMock();
        $fakeFuel->setAmount(10);
        $fakeFuel->setNext($fakeSecondFuel);

        // case 2: get satisfiable fuel from next fuel
        $this->assertEquals(
            100,
            $fakeFuel->refuel(100, $satiableFuelTypes)
        );

        $fakeFuel = new FakeFuel(10);

        // case 3: there is no way to find satisfiable fuel
        $this->assertEquals(
            0,
            $fakeFuel->refuel(100, $satiableFuelTypes)
        );
    }

    public function testAmountGetterWorks()
    {
        $fakeFuel = new FakeFuel(100);
        $this->assertEquals(100, $fakeFuel->getAmount());
    }
}