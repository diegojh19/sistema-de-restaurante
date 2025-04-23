<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Caja */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="caja-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'fecha_caja')->textInput() ?> -->

    <?= $form->field($model, 'monto_inicial')->textInput() ?>

    <!-- <?= $form->field($model, 'monto_final')->textInput() ?> -->

    <?= $form->field($model, 'observacion')->textArea(['maxlength' => true, 'rows' => 6]) ?>

    <br>
<div class="col-md-12 col-sd-12 col-lg-offset-4">
    <div class="form-group">
        <?= Html::submitButton('GUARDAR', ['class' => 'btn btn-success']) ?>
    </div>
</div>

    <?php ActiveForm::end(); ?>

</div>
