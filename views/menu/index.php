<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MENUSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'MENÚS';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('CREAR MENÚS', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idMENU',
            'nombre',
            'descripcion',
            'cantidad_disponible',
            'valor_menu',
            'estado_menu',
           

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
