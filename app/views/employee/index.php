<?php

use app\models\salary\SalaryCalculator;
use app\models\salary\SalaryGross;
use app\models\salary\SalaryNet;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employee';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Add Employee', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'name',
            'age',
            'children',
            'contract_salary',
            [
                'label' => 'GROSS',
                'format' => 'raw',
                'value' => function ($model) {

                    $gross = new SalaryCalculator($model, new SalaryGross);

                    return $gross->calculate();
                }
            ],
            [
                'label' => 'NET',
                'format' => 'raw',
                'value' => function ($model) {
                    $net = new SalaryCalculator($model, new SalaryNet);

                    return $net->calculate();
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>