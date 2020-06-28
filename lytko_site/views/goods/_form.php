<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Goods */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="goods-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'tab_1_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tab_1_content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tab_2_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tab_2_content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tab_3_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tab_3_content')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
