<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\MESA;

/* @var $this yii\web\View */
/* @var $model app\models\mesa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mesa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'numero_de_mesa')->textInput() ?>

    <?= $form->field($model, 'numero_de_puestos')->textInput() ?>

    <?= $form->field($model, 'estado_de_mesa')->dropdownList([
                            MESA::MESA_DISPONIBLE => MESA::MESA_DISPONIBLE, 
                            MESA::MESA_OCUPADA => MESA::MESA_OCUPADA, 
                            MESA::MESA_RESERVADA => MESA::MESA_RESERVADA,]) ?>

   <br>
<div class="col-md-12 col-sd-12 col-lg-offset-4">
    <div class="form-group">
        <?= Html::submitButton('GUARDAR', ['class' => 'btn btn-success']) ?>
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>
