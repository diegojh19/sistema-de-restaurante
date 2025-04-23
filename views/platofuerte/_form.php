<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PLATOFUERTE */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="platofuerte-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idPLATO_FUERTE')->textInput() ?>

    <?= $form->field($model, 'nombre_plato_fuerte')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
