<?php

namespace app\models\salary;

use app\models\salary\deductions\TotalDeductions;

class SalaryNet implements CalculationMethod
{
    public function calculate($employee): float
    {
        $gross = $this->getGross()->calculate($employee);
        $taxes = $this->getTaxes()->calculate($employee);
        $deductions = $this->getDeductions()->calculate($employee);

        return $gross - $taxes - $deductions;
    }

    private function getGross(): SalaryGross
    {
        return new SalaryGross;
    }

    private function getTaxes(): SalaryTax
    {
        return new SalaryTax;
    }

    private function getDeductions(): TotalDeductions
    {
        return new TotalDeductions;
    }
}
