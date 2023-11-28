<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractControllerTest extends WebTestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected static function getTestClient()
    {
        return static::createClient();
    }

    protected function sendRequest($method, $uri, $data, $params): Response
    {
        $client = self::getTestClient();
        $client->request(
            $method,
            $uri,
            $params,
            [],
            ['CONTENT_TYPE' => 'application/json'],
            json_encode($data)
        );

        return $client->getResponse();
    }

    protected function parseResponse(Response $response): array
    {
        $content = $response->getContent();
        return json_decode($content, true);
    }


}