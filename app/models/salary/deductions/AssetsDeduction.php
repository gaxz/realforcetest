<?php

namespace app\models\salary\deductions;

use app\models\salary\CalculationMethod;

class AssetsDeduction implements CalculationMethod
{
    public function calculate($employee): float
    {
        $amount = 0;

        foreach ($employee->employeeAssets as $asset) {
            $amount += $asset->cost;
        }

        return $amount;
    }
}
