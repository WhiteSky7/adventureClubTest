<?php

namespace App\Service;

use App\Action\Actions;

class CalculateService
{

    private $actions;

    public function __construct()
    {
        $this->actions = Actions::getActions();
    }

    public function BaseCalculate(string $actionType, int $firstParam, int $secondParam):int
    {
        $result = 0;
        switch ($actionType){
            case $actionType == $this->actions['+'];
                $result = $this->add($firstParam,$secondParam);
                break;
            case $actionType == $this->actions['-'];
                $result = $this->substract($firstParam,$secondParam);
                break;
            case $actionType == $this->actions['/'];
                $result = $this->divide($firstParam,$secondParam);
                break;
            case $actionType == $this->actions['*'];
                $result = $this->multiply($firstParam,$secondParam);
                break;
        }
        return $result;
    }

    private function add($firstParam,$secondParam)
    {
        return $firstParam + $secondParam;
    }

    private function substract($firstParam,$secondParam)
    {
        return $firstParam - $secondParam;
    }

    private function multiply($firstParam,$secondParam)
    {
        return $firstParam * $secondParam;
    }

    private function divide($firstParam,$secondParam)
    {
        return $firstParam / $secondParam;
    }

}