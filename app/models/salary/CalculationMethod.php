<?php

namespace app\models\salary;

use app\models\Employee;

/**
 * Declares an interface for different calculations based on object state.
 * Сlasses that implements this interface can be cascading but not recursive.
 * Design pattern: Strategy
 */
interface CalculationMethod
{
    /**
     * Returns the result of calculation specific to implementation
     *
     * @param Employee $employee
     * @return float
     */
    public function calculate(Employee $employee): float;
}
