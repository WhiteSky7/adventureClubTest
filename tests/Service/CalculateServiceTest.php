<?php

namespace App\Tests\Service;

use App\Action\Actions;
use PHPUnit\Framework\TestCase;
use App\Service\CalculateService;

final class CalculateServiceTest extends TestCase
{
    private object $calculate;

    private array $actions;

    protected function setUp():void
    {
        $this->calculate = new CalculateService();
        $this->actions = Actions::getActions();
    }

    public function testAdd()
    {
        $this->assertEquals(10, $this->calculate->BaseCalculate($this->actions["+"],5,5));
    }
    public function testSubtract()
    {
        $this->assertEquals(5, $this->calculate->BaseCalculate($this->actions["-"],10,5));
    }
    public function testMupltiply()
    {
        $this->assertEquals(25,$this->calculate->BaseCalculate($this->actions["*"],5,5));
    }
    public function testDivide()
    {
        $this->assertEquals(2, $this->calculate->BaseCalculate($this->actions["/"],6,3));
    }
}