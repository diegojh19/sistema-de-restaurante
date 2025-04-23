<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

$this->title = 'MODIFICAR USUARIO';
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idusuario, 'url' => ['view', 'id' => $model->idusuario]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="usuario-update">

	<div class="col-md-12 col-sd-12 col-lg-offset-4">

    <h1><?= Html::encode($this->title) ?></h1>

</div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<div class="col-md-12 col-sm-12 col-lg-offset-6" style="margin-top: -45px;">
	
     <?= Html::a('CANCELAR', ['index', 'id' => $model->idusuario], [
            'class' => 'btn btn-primary',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
</div>
