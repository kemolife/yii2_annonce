<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Annotations */

$this->title = 'Create Annotations';
$this->params['breadcrumbs'][] = ['label' => 'Annotations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="annotations-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
