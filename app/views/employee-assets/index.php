<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employee Assets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-assets-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Add Employee Asset', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'employee_id',
            'name',
            'cost',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>