<?php

namespace app\models\salary;

use app\models\Employee;
use app\models\salary\benefits\TotalBenefits;

class SalaryGross implements CalculationMethod
{
    public function calculate(Employee $employee): float
    {
        $benefitsTotal = $this->benefits()->calculate($employee);

        return $employee->contract_salary + $benefitsTotal;
    }

    private function benefits()
    {
        return new TotalBenefits();
    }
}
