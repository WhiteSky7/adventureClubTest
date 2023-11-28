<?php

namespace App\Controller;

use App\Dto\TravelPriceDto;
use App\Service\TravelPriceService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class TravelPriceController extends AbstractController
{
    #[Route('/travel/price',
        name: 'app_travel_price',
        methods: ["POST"]
    )]
    public function index(#[MapRequestPayload] TravelPriceDto $travelPrice, TravelPriceService $travelPriceSevice):jsonResponse
    {
        $price = $travelPrice->price;
        $birthDate = $travelPrice->birthdate;
        $travelDate = $travelPrice->travelDate;

        $result = $travelPriceSevice->calculateAgeTravel($price,$birthDate,$travelDate);

        return new JsonResponse(['result' => $result]);
    }
}
