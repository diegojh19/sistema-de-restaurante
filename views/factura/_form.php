<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FACTURA */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="factura-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idFACTURA')->textInput() ?>

    <?= $form->field($model, 'MESA_numero_de_mesa')->textInput() ?>

    <?= $form->field($model, 'PEDIDOS_Idpedidos')->textInput() ?>

    <?= $form->field($model, 'valor_unitario')->textInput() ?>

    <?= $form->field($model, 'valor_total')->textInput() ?>

    <?= $form->field($model, 'fecha_factura')->textInput() ?>

    <?= $form->field($model, 'estado_factura')->textInput(['maxlength' => true]) ?>

    <div class="col-md-12 col-sd-12 col-lg-offset-4">
    <div class="form-group">
        <?= Html::submitButton('GUARDAR', ['class' => 'btn btn-success']) ?>
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>
