<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use app\models\DETALLEDECOMANDASSearch;
use app\models\DETALLEDECOMANDAS;

/* @var $this yii\web\View */
/* @var $model app\models\FACTURA */

$this->title = 'CONSULTAR FACTURA';
$this->params['breadcrumbs'][] = ['label' => 'Facturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="factura-view">

    <div class="col-md-12 col-sd-12 col-lg-offset-4">

    <h1><?= Html::encode($this->title) ?></h1>

</div>

    <!--<p>
        <?= Html::a('Update', ['update', 'idFACTURA' => $model->idFACTURA, 'MESA_numero_de_mesa' => $model->MESA_numero_de_mesa], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idFACTURA' => $model->idFACTURA, 'MESA_numero_de_mesa' => $model->MESA_numero_de_mesa], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>-->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nombre_restaurante',
            'nit_restaurante',
            'direccion_restaurante',
            'telefono_restaurante',
            'idFACTURA',
            'fecha_factura',
            'MESA_numero_de_mesa',
            //'PEDIDOS_Idpedidos',
            //'valor_unitario',
            'valor_total',
            'estado_factura',
        ],
    ]) ?>

    <?php $searchModel = new DETALLEDECOMANDASSearch();
          $dataProvider = new ActiveDataProvider([
            'query' => DETALLEDECOMANDAS::find()->where(['PEDIDOS_Idpedidos' => $model->PEDIDOS_Idpedidos]),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]); ?>
        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'cantidad',
            'descripcion',
            'valor_unitario',
            'valorTotal',
            ['class' => 'yii\grid\ActionColumn',
            'template' => '',
            ],    
        ],
    ]); ?>

    <br>
    <div class="col-md-12 col-sd-12 col-lg-offset-5">
    <?= Html::a('SALIR',['index', 'id'=>$model->idFACTURA],[
              'class'=>'btn btn-primary',
          ]) ?>

</div>

</div>
