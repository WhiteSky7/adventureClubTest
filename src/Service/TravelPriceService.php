<?php

namespace App\Service;

class TravelPriceService
{

    const salePercent = [
        80 => 0.2,
        30 => 0.7,
        10 => 0.1
    ];

    const maxSale = 4500;

    const highAgeResponse = 'Ребенок совершенолетний на момент начала путишествия';
    public function calculateTravelPrice(int $price, string $birthDay, string $travelDate)
    {
        $age = $this->getAgeOnTravel($birthDay,$travelDate);

        return $this->calculateSale($price, $age);
    }

    private function getAgeOnTravel( $birthday, $travelDate )
    {
        return date_diff(date_create($birthday), date_create($travelDate))->y;
    }

    private function checkMaxSale($result)
    {
        if ($result > self::maxSale)
        {
            $result = self::maxSale;
        }
        return $result;
    }

    private function calculateSale(int $price,int $age)
    {
        $result = 0;
        switch ($age){
            case  $age < 6;
                $result = $price * self::salePercent[80];
                break;
            case $age >= 6 && $age < 12;
                $result = $price * self::salePercent[30];
                return $this->checkMaxSale($result);
            case $age >= 12 && $age <= 18;
                $result = $price * self::salePercent[10];
                break;
            default:
                $result = self::highAgeResponse;
        }
        return $result;
    }
}