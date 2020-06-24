<?php

namespace app\models\salary\deductions;

use app\models\salary\CalculationMethod;

class TotalDeductions implements CalculationMethod
{
    private function children()
    {
        return [new AssetsDeduction];
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
