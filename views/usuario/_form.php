<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\TipoUsuario;
//use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idusuario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo_usuario_idperfil')->dropdownList(
        ArrayHelper::map(TipoUsuario::find()->all(), 'idTipoUsuario', 'nombre_tipo_usuario')) ?>

    <!-- <?= $form->field($model, 'user_id')->textInput() ?> -->
<br>
<div class="col-md-12 col-sd-12 col-lg-offset-4">
    <div class="form-group">
        <?= Html::submitButton('GUARDAR', ['class' => 'btn btn-success']) ?>
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>
