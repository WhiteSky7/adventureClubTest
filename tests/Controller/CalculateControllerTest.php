<?php

namespace App\Tests\Controller;

use App\Action\Actions;
use PHPUnit\Framework\Attributes\DataProvider;


final class CalculateControllerTest extends AbstractControllerTest
{
    const actions = [
        '+' => "add",
        '-' => "substract",
        '/' => "multiply",
        '*' => "divide"
    ];

    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @dataProvider additionProvider
     */
    public function testBase(int $firstParam, string $action, int $secondParam):void
    {
        $data = [
            'firstParam' => $firstParam,
            'action' => $action,
            'secondParam' =>$secondParam
        ];

        $response = $this->sendRequest("GET", 'https://127.0.0.1:8000/calculate/' ,[],$data);
        $this->assertEquals(200, $response->getStatusCode());
//        $this->assertIsInt((int)$response->getContent('result'));

    }
    public static function additionProvider(): array
    {
        $actions = Actions::getActions();
        $firstParam = random_int(1,10000);
        $seconfParam = random_int(1,10000);

        return [
            [$firstParam, $actions['+'],$seconfParam],
            [$firstParam, $actions['-'], $firstParam],
            [$firstParam, $actions['/'], $firstParam],
            [$firstParam, $actions['*'], $firstParam],
        ];
    }
}