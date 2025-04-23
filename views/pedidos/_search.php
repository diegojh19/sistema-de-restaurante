<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PEDIDOSSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedidos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Idpedidos') ?>

    <?= $form->field($model, 'MESA_numero_de_mesa') ?>

    <?= $form->field($model, 'PERSONA_cedula') ?>

    <?= $form->field($model, 'hora_comanda') ?>

    <?= $form->field($model, 'fecha_comanda') ?>

    <?php // echo $form->field($model, 'estado_comanda') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
