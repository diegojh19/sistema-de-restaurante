<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Inicio de Sesión';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="col-md-12 col-sd-12 col-lg-offset-4">

    <h1><?= Html::encode($this->title) ?></h1>

</div>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>


    <div class="col-md-12 col-sd-12 col-lg-offset-4"  style="margin-left: 290px;">
 <br>
 <br>
    
        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
 <br>
 <br>
    
        <?= $form->field($model, 'password')->passwordInput() ?>
 </div>
            
        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11" style="margin-left: 465px;">
    <br>
                <?= Html::submitButton('Iniciar Sesión', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

    
</div>
