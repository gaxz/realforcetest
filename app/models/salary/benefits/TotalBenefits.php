<?php

namespace app\models\salary\benefits;

use app\models\salary\CalculationMethod;

class TotalBenefits implements CalculationMethod
{
    private function children()
    {
        return [new AgeBenefit];
    }

    public function calculate($employee): float
    {
        $total = 0;

        foreach ($this->children() as $child) {
            $total += $child->calculate($employee);
        }

        return $total;
    }
}
