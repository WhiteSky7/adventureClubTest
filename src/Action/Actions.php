<?php

namespace App\Action;

class Actions
{
    public static function getActions(): array
    {
        return [
            '+' => "add",
            '-' => "substract",
            '/' => "multiply",
            '*' => "divide"
        ];
    }
}