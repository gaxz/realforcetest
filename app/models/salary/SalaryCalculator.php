<?php

namespace app\models\salary;

use app\models\Employee;

/**
 * Running any calculation method for provided object state.
 * @example 
 */
class SalaryCalculator
{
    private $strategy;
    private $employee;

    public function __construct(Employee $employee, CalculationMethod $strategy)
    {
        $this->employee = $employee;
        $this->strategy = $strategy;
    }

    public function setStrategy(CalculationMethod $strategy): void
    {
        $this->strategy = $strategy;
    }

    public function setEmployee(Employee $employee): void
    {
        $this->employee = $employee;
    }

    public function calculate(): float
    {
        return $this->strategy->calculate($this->employee);
    }
}
