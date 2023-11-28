<?php

namespace App\Tests\Controller;

use App\Dto\TravelPriceDto;

class TravelPriceControllerTest extends AbstractControllerTest
{

    /**
     * @dataProvider additionProvider
     */
    public function testBase(int $price, string $birthDate, string $travelDate )
    {
        $data =
            [
                "price" => $price,
                "birthdate" => $birthDate,
                "travelDate" => $travelDate
            ];
        $response = $this->sendRequest("POST", 'https://127.0.0.1:'.$_ENV['PORT'].'/travel/price', $data,[]);
        $intResponse = (int)$response->getContent("result");

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertIsInt($intResponse);
        $this->assertJson(json_encode(['result' => TravelPriceDto::class]), json_encode(['result' => $intResponse]));
    }

    /**
     * @dataProvider additionProvider422
     */
    public function testUnprocessableEntity(int $price, string $birthDate, string $travelDate)
    {
        $data =
            [
                "price" => $price,
                "birthdate" => $birthDate,
                "travelDate" => $travelDate
            ];
        $response = $this->sendRequest("POST", "http://localhost:8000/travel/price", $data,[]);

        $this->assertEquals(422, $response->getStatusCode());
    }

    public static function additionProvider(): array
    {

        return [
            [//до 3-х лет
                "price" => 10000,
                "birthdate" => "2020-03-22",
                "travelDate" => "2025-03-22"
            ],
            [// с 6 лет
                "price" => 10000,
                "birthdate" => "2019-03-22",
                "travelDate" => "2025-03-22"
            ],
            [// с 12 лет
                "price" => 10000,
                "birthdate" => "2013-03-22",
                "travelDate" => "2025-03-22"
            ]

        ];
    }
    public static function additionProvider422(): array
    {
        return [
            [// с 6 лет
                "price" => 10000,
                "birthdate" => "",
                "travelDate" => "2025-03-22"
            ],
            [// с 12 лет
                "price" => 10000,
                "birthdate" => "2013-03-22",
                "travelDate" => ""
            ],
            [// с 12 лет
                "price" => 10000,
                "birthdate" => "",
                "travelDate" => ""
            ]

        ];
    }
}