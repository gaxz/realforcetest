<?php

namespace app\tests\fixtures;

class EmployeeAssetsFixture extends \yii\test\ActiveFixture
{
    public $modelClass = 'app\models\EmployeeAssets';
    public $dataFile = '@app/tests/fixtures/data/employeeAssets.php';

    public $depends = ['app\tests\fixtures\EmployeeFixture'];
}
