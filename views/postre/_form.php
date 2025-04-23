<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\POSTRE */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="postre-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idPOSTRE')->textInput() ?>

    <?= $form->field($model, 'nombre_postre')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
