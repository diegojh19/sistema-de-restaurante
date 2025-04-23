<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Caja */

$this->title = 'CONSULTAR CAJA';
$this->params['breadcrumbs'][] = ['label' => 'Cajas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="caja-view">

   <div class="col-md-12 col-sd-12 col-lg-offset-4">

    <h1><?= Html::encode($this->title) ?></h1>

</div>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idCaja',
            'fecha_caja',
            'estado',
            'monto_inicial',
            'monto_final',
            'observacion',
        ],
    ]) ?>

    <div class="col-md-12 col-sd-12 col-lg-offset-5">
    <?= Html::a('SALIR',['index', 'id'=>$model->idCaja],[
              'class'=>'btn btn-primary',
          ]) ?>

</div>

</div>
