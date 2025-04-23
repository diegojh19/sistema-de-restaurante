<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PLATOFUERTESearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Platofuertes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="platofuerte-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Platofuerte', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idPLATO_FUERTE',
            'nombre_plato_fuerte',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
