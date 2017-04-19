<?php
use yii\helpers\Html;
?>
<div id="comment-form">
    <h3>Залишити коментар</h3>
    <?php
    $form = \yii\widgets\ActiveForm::begin([
        'id' => 'comment-form',
        'options' =>[
            'class' => 'form-horizontal'
        ]
    ]); ?>
        <div class="form-group">
            <div class="col-sm-6">
                <?= $form->field($model, 'author')->input('text', ['class' => 'form-control', 'placeholder'=>'Ім\'я'])->label(false) ?>
            </div>
            <div class="col-sm-6">
                <?= $form->field($model, 'email')->input('text', ['class' => 'form-control', 'placeholder'=>'Email'])->label(false) ?>
            </div>
                <?= $form->field($model, 'annotation_id')->hiddenInput(['value'=> $annotation_id])->label(false); ?>
                </div>
        <div class="form-group">
            <div class="col-sm-12">
                <?= $form->field($model, 'text')->textarea(['rows' => '8','class' => 'form-control', 'placeholder'=>'Email'])->label(false) ?>
            </div>
        </div>
    <?= Html::submitButton('Відправити коментар', ['class' => 'btn btn-danger btn-lg', 'placeholder'=>'Коментар...']) ?>
    <?php $form->end(); ?>
</div><!--/#comment-form-->