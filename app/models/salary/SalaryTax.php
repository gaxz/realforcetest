<?php

namespace app\models\salary;

use app\models\salary\CalculationMethod;
use app\models\salary\taxes\CountryTax;

class SalaryTax implements CalculationMethod
{
    public function calculate($employee): float
    {
        return $this->countryTax()->calculate($employee);
    }

    private function countryTax(): CountryTax
    {
        return new CountryTax;
    }
}
