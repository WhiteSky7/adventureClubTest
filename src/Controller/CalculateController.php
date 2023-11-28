<?php

namespace App\Controller;

use App\Dto\CalculateDto;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Service\CalculateService;
use Symfony\Component\HttpKernel\Attribute\MapQueryString;

class CalculateController extends abstractController
{

    #[Route('/calculate/',
        name: 'calculate',
        methods: ["GET"]
    )]
    public function calculation(#[MapQueryString] CalculateDto $calculationData, CalculateService $calculate):jsonResponse
    {
        $firstParam = $calculationData->firstParam;
        $actionType = $calculationData->action;
        $secondParam = $calculationData->secondParam;

        $result =  $calculate->BaseCalculate($actionType, $firstParam, $secondParam);

        return new JsonResponse(['result' => $result]);
    }

}