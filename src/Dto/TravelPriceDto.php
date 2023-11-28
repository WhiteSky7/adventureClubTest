<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints as Assert;

class TravelPriceDto
{
    public function __construct(

        #[NotBlank(message: 'Цена не может быть пустой')]
        #[Type('int')]
        public readonly int $price,

        #[Assert\Date]
        #[NotBlank(message: 'День рождения не может быть пустым')]
        public readonly string $birthdate,

        #[Assert\Date]
        #[NotBlank(message: 'Дата путишествия не может быть пустой')]
        public readonly string $travelDate,

    ){}
}