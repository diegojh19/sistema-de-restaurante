<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Caja */

$this->title = 'MODIFICAR CAJA';
$this->params['breadcrumbs'][] = ['label' => 'Cajas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idCaja, 'url' => ['view', 'id' => $model->idCaja]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="caja-update">

<div class="col-md-12 col-sd-12 col-lg-offset-4">

    <h1><?= Html::encode($this->title) ?></h1>

</div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<div class="col-md-12 col-sm-12 col-lg-offset-6" style="margin-top: -45px;">
	
     <?= Html::a('CANCELAR', ['index', 'id' => $model->idCaja], [
            'class' => 'btn btn-primary',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
</div>
