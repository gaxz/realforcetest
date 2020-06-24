<?php

namespace app\models\salary\taxes;

use app\models\Employee;
use app\models\salary\CalculationMethod;
use app\models\salary\SalaryGross;

class CountryTax implements CalculationMethod
{
    const COUNTRY_TAX = 20;

    const CHILDREN_TAX_DECREASE_COUNT = 2;
    const CHILDREN_TAX_DECREASE = 2;

    public function calculate(Employee $employee): float
    {
        if ($this->hasChildrenTaxDecrease($employee)) {
            $tax = self::COUNTRY_TAX - self::CHILDREN_TAX_DECREASE;
        } else {
            $tax = self::COUNTRY_TAX;
        }

        return $this->gross()->calculate($employee) * $tax / 100;
    }

    private function hasChildrenTaxDecrease(Employee $employee): bool
    {
        return $employee->children > self::CHILDREN_TAX_DECREASE_COUNT;
    }

    private function gross(): SalaryGross
    {
        return new SalaryGross;
    }
}
