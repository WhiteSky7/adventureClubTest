<?php

namespace App\Dto;

use App\Action\Actions;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;

class CalculateDto
{
    public function __construct(


        #[NotBlank(message: 'Первый аргумент не может быть пустой')]
        #[Type('int')]
        public readonly int $firstParam,

        #[NotBlank(message: 'Действие не может быть пустым')]
        #[Type('string')]
        #[Assert\Choice(callback: [Actions::class, 'getActions'])]
        public readonly string $action,

        #[NotBlank(message: 'Второй аргумент не может быть пустой')]
        #[Type('int')]
        public readonly int $secondParam,

    ){}
}