<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AnnotationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Annotations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="annotations-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Annotations', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            [
                'label' => 'Text',
                'value' => function ($data) {
                    return strip_tags($data->text);
                },
            ],
            'author',
            'status',
            'date_create:date',
            'date_update:date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
