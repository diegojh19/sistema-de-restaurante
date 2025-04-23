<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BEBIDA */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bebida-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idBEBIDA')->textInput() ?>

    <?= $form->field($model, 'nombre_bebida')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
