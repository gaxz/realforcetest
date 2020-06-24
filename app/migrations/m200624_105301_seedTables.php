<?php

use app\models\Employee;
use app\models\EmployeeAssets;
use yii\db\Migration;

/**
 * Class m200624_105301_seedTables
 */
class m200624_105301_seedTables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $alice = new Employee([
            'name' => 'Alice',
            'age' => 26,
            'children' => 2,
            'contract_salary' => 6000,
        ]);

        $bob = new Employee([
            'name' => 'Bob',
            'age' => 52,
            'children' => 0,
            'contract_salary' => 4000,
        ]);

        $charlie = new Employee([
            'name' => 'Charlie',
            'age' => 36,
            'children' => 3,
            'contract_salary' => 5000,
        ]);

        if ($alice->save() && $bob->save() && $charlie->save()) {
            $employeeAssets = new EmployeeAssets([
                'employee_id' => $bob->id,
                'name' => 'Car',
                'cost' => 500
            ]);

            return $employeeAssets->save();
        }

        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        EmployeeAssets::deleteAll();
        Employee::deleteAll();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200624_105301_seedTables cannot be reverted.\n";

        return false;
    }
    */
}
