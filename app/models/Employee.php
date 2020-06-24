<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $age
 * @property int|null $children
 * @property float|null $contract_salary
 *
 * @property EmployeeAssets[] $employeeAssets
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['age', 'children'], 'integer'],
            [['contract_salary'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'age' => 'Age',
            'children' => 'Children',
            'contract_salary' => 'Сontract Salary',
        ];
    }

    /**
     * Gets query for [[EmployeeAssets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeeAssets()
    {
        return $this->hasMany(EmployeeAssets::className(), ['employee_id' => 'id']);
    }
}
