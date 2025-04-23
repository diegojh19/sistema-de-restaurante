<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FACTURASearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="factura-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idFACTURA') ?>

    <?= $form->field($model, 'MESA_numero_de_mesa') ?>

    <?= $form->field($model, 'PEDIDOS_Idpedidos') ?>

    <?= $form->field($model, 'valor_unitario') ?>

    <?= $form->field($model, 'valor_total') ?>

    <?php // echo $form->field($model, 'fecha_factura') ?>

    <?php // echo $form->field($model, 'estado_factura') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
