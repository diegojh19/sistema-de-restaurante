<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\mesa */

$this->title = 'MODIFICAR MESA';
$this->params['breadcrumbs'][] = ['label' => 'Mesas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->numero_de_mesa, 'url' => ['view', 'id' => $model->numero_de_mesa]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="mesa-update">

	<div class="col-md-12 col-sd-12 col-lg-offset-4">

    <h1><?= Html::encode($this->title) ?></h1>

    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <div class="col-md-12 col-sm-12 col-lg-offset-6" style="margin-top: -45px;">
	
     <?= Html::a('CANCELAR', ['index', 'id' => $model->numero_de_mesa], [
            'class' => 'btn btn-primary',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
</div>


</div>
