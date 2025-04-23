<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PEDIDOSSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comandas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedidos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('CREAR COMANDAS', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Idpedidos',
            'MESA_numero_de_mesa',
            'estado_comanda',
            'fecha_comanda',
            'hora_comanda',
            'nombreUsuario',
            //'PERSONA_cedula',
            
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
