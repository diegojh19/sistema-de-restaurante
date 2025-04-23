<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use app\models\DETALLEDECOMANDASSearch;
use app\models\DETALLEDECOMANDAS;
use app\models\PEDIDOS;

/* @var $this yii\web\View */
/* @var $model app\models\PEDIDOS */

$this->title = 'CONSULTAR COMANDA';
$this->params['breadcrumbs'][] = ['label' => 'Comandas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$idPerfil = Yii::$app->user->identity->usuarios->tipo_usuario_idperfil;

\yii\web\YiiAsset::register($this);
?>
<div class="pedidos-view">
    <div class="col-md-12 col-sd-12 col-lg-offset-4">

    <h1><?= Html::encode($this->title) ?></h1>
</div>
    <p>
        <?php if($model->estado_comanda == PEDIDOS::ENTREGADA && ($idPerfil == 1 || $idPerfil == 2)){ ?>
            <?= Html::a('Facturar', ['factura', 'id' => $model->Idpedidos], ['class' => 'btn btn-primary']) ?>
        <?php } ?>

        <?php if($model->estado_comanda == PEDIDOS::PENDIENTE && ($idPerfil == 1 || $idPerfil == 3)){ ?>
            <?= Html::a('AÑADIR', ['update', 'id' => $model->Idpedidos], ['class' => 'btn btn-primary']) ?>
        <?php } ?>
        
        <?php if($model->estado_comanda == PEDIDOS::PENDIENTE && ($idPerfil == 1 || $idPerfil == 4)){ ?>
            <?= Html::a('Despachar', ['despacho', 'id' => $model->Idpedidos], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Estas seguro de marcar el pedido como despachado?',
                    'method' => 'post',
                ],
            ]) ?>
        <?php } ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Idpedidos',
            'MESA_numero_de_mesa',
            //'PERSONA_cedula',
            'hora_comanda',
            'fecha_comanda',
            'estado_comanda',
            
            'nombreUsuario',
        ],
    ]) ?>

    <h2>Menús asociados</h2>

    <?php $searchModel = new DETALLEDECOMANDASSearch();
          $dataProvider = new ActiveDataProvider([
            'query' => DETALLEDECOMANDAS::find()->where(['PEDIDOS_Idpedidos' => $model->Idpedidos]),
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
            [
                'attribute' => 'despachado',
                'contentOptions' => function($model){
                  return array('class' => $model->despachado == DETALLEDECOMANDAS::DESPACHADO_SI ? "status-background-bounds btn-success" : "status-background-bounds btn-danger");
                }, 
            ],
            ['class' => 'yii\grid\ActionColumn',
            'template' => '',
            ],    
        ],
    ]); ?>
<br>
    <div class="col-md-12 col-sd-12 col-lg-offset-5">
    <?= Html::a('SALIR',['index', 'id'=>$model->Idpedidos],[
              'class'=>'btn btn-primary',
          ]) ?>

</div>

</div>
