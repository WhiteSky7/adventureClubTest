<?php

namespace App\Tests\Service;

use PHPUnit\Framework\TestCase;
use App\Service\TravelPriceService;

final class TravelPriceServiceTest extends TestCase
{
    private $childTravelService;

    protected function setUp(): void
    {
        $this->childTravelService = new TravelPriceService();
    }

    public function testSaleFor3Year()
    {
        $this->assertEquals(2000,$this->childTravelService->calculateTravelPrice(10000,'2020-01-10','2023-01-10'));
    }
    public function testSaleFor6Year()
    {
        $this->assertEquals(3500,$this->childTravelService->calculateTravelPrice(5000,'2017-01-10','2023-01-10'));
    }
    public function testSaleFor12Year()
    {
        $this->assertEquals(1000,$this->childTravelService->calculateTravelPrice(10000,'2011-01-10','2023-01-10'));
    }
    public function testSaleForElder18Year()
    {
        $this->assertEquals($this->childTravelService::highAgeResponse,$this->childTravelService->calculateTravelPrice(10000,'2000-01-10','2023-01-10'));
    }

}