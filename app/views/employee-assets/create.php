<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EmployeeAssets */

$this->title = 'Create Employee Assets';
$this->params['breadcrumbs'][] = ['label' => 'Employee Assets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-assets-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'employeeList' => $employeeList
    ]) ?>

</div>