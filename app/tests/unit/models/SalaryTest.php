<?php

namespace tests\unit\models;

use app\models\Employee;
use app\models\EmployeeAssets;
use app\models\salary\benefits\AgeBenefit;
use app\models\salary\benefits\TotalBenefits;
use app\models\salary\deductions\AssetsDeduction;
use app\models\salary\deductions\TotalDeductions;
use app\models\salary\SalaryCalculator;
use app\models\salary\SalaryGross;
use app\models\salary\SalaryNet;
use app\models\salary\SalaryTax;
use app\models\salary\taxes\CountryTax;

class SalaryTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function _fixtures()
    {
        return [
            'employee'   => 'app\tests\fixtures\EmployeeFixture',
            'employeeAssets' => 'app\tests\fixtures\EmployeeAssetsFixture'
        ];
    }

    public function testAgeBenefit()
    {
        $employee = $this->ageKidsCarEmployee();

        $calc = new SalaryCalculator($employee, new AgeBenefit());

        $expected = AgeBenefit::BENEFIT_PERCENT * $employee->contract_salary / 100;

        $this->assertEquals($expected, $calc->calculate());
    }

    public function testAssetDeduction()
    {
        $employee = $this->ageKidsCarEmployee();

        $calc = new SalaryCalculator($employee, new AssetsDeduction());

        $expected = $employee->employeeAssets[0]->cost;

        $this->assertEquals($expected, $calc->calculate());
    }

    /**
     * @depends testAgeBenefit
     */
    public function testGross()
    {
        $employee = $this->ageKidsCarEmployee();

        $calc = new SalaryCalculator($employee, new TotalBenefits());
        $benefits = $calc->calculate();

        $expected = $employee->contract_salary + $benefits;

        $calc->setStrategy(new SalaryGross());

        $this->assertEquals($expected, $calc->calculate());
    }

    /**
     * @depends testGross
     */
    public function testCountryTax()
    {
        $employee = $this->ageKidsCarEmployee();

        $calc = new SalaryCalculator($employee, new SalaryGross());
        $gross = $calc->calculate();

        $calc->setStrategy(new CountryTax());

        $expected = ($gross * (CountryTax::COUNTRY_TAX - CountryTax::CHILDREN_TAX_DECREASE)) / 100;

        $this->assertEquals($expected, $calc->calculate());
    }

    /**
     * @depends testCountryTax
     * @depends testGross
     */
    public function testNet()
    {
        $employee = $this->ageKidsCarEmployee();

        $calc = new SalaryCalculator($employee, new SalaryGross());
        $gross = $calc->calculate();

        $calc->setStrategy(new SalaryTax());
        $tax = $calc->calculate();

        $calc->setStrategy(new TotalDeductions());
        $deductions = $calc->calculate();

        $expected = $gross - $tax - $deductions;

        $calc->setStrategy(new SalaryNet());

        $this->assertEquals($expected, $calc->calculate());
    }

    public function ageKidsCarEmployee()
    {
        return $this->tester->grabFixture('employee', 'ageKidsCar');
    }
}
