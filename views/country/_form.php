<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Country */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="country-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idciudad')->textInput() ?>

    <?= $form->field($model, 'nombre_ciudad')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Saves', ['class' => 'btn btn-success']) ?>


    </div>

    <?php ActiveForm::end(); ?>

</div>
