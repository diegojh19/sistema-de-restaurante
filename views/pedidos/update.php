<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PEDIDOS */

$this->title = 'MODIFICAR COMANDA';
$this->params['breadcrumbs'][] = ['label' => 'Comandas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Idpedidos, 'url' => ['view', 'id' => $model->Idpedidos]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pedidos-update">
	<div class="col-md-12 col-sd-12 col-lg-offset-4">

    <h1><?= Html::encode($this->title) ?></h1>
</div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
<div class="col-md-12 col-sm-12 col-lg-offset-6" style="margin-top: -45px;">
	
     <?= Html::a('CANCELAR', ['index', 'id' => $model->Idpedidos], [
            'class' => 'btn btn-primary',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
</div>

</div>
