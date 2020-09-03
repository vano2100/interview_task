<?php

namespace App\Service;

class CostCalculator
{
    public function calculate(int $salary)
    {
        if ($salary < 50000){
            return $salary * 0.87;
        } else {
            return ($salary - 50000) * 0.82 + 50000 * 0.87;
        }
    }
}