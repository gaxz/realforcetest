<?php

namespace app\models\salary\benefits;

use app\models\salary\CalculationMethod;

class AgeBenefit implements CalculationMethod
{
    const MINIMAL_AGE = 50;
    const BENEFIT_PERCENT = 7;

    /**
     * @inheritDoc
     */
    public function calculate($employee): float
    {
        if ($employee->age >= self::MINIMAL_AGE) {
            return $employee->contract_salary * self::BENEFIT_PERCENT / 100;
        }

        return 0;
    }
}
