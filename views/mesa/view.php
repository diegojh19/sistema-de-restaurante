<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\mesa */

$this->title = 'CONSULTAR MESA';
$this->params['breadcrumbs'][] = ['label' => 'Mesas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mesa-view">

    <div class="col-md-12 col-sd-12 col-lg-offset-4">

    <h1><?= Html::encode($this->title) ?></h1>
<br>
<br>
    </div>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'numero_de_mesa',
            'numero_de_puestos',
            'estado_de_mesa',
        ],
    ]) ?>
<br>
    <div class="col-md-12 col-sd-12 col-lg-offset-5">
    <?= Html::a('SALIR',['index', 'id'=>$model->numero_de_mesa],[
              'class'=>'btn btn-primary',
          ]) ?>

</div>

</div>
