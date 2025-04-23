<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\ENTRADA;
use app\models\POSTRE;
use app\models\BEBIDA;
use app\models\PLATOFUERTE;
use app\models\MENU;

/* @var $this yii\web\View */
/* @var $model app\models\MENU */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idMENU')->textInput() ?>

    <?= $form->field($model, 'nombre')->textInput() ?>

    <?= $form->field($model, 'descripcion')->textInput() ?>

    <?= $form->field($model, 'cantidad_disponible')->textInput() ?>
    
    <?= $form->field($model, 'valor_menu')->textInput() ?>    

    <?= $form->field($model, 'estado_menu')->dropdownList([
                            MENU::DISPONIBLE => MENU::DISPONIBLE, 
                            MENU::AGOTADO => MENU::AGOTADO,]) ?>

    <div class="col-md-12 col-sm-12 col-lg-offset-4">

    <div class="form-group">

        <?= Html::submitButton('GUARDAR', ['class' => 'btn btn-success']) ?>

    </div>

    </div>

    <?php ActiveForm::end(); ?>

</div>
