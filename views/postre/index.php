<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\POSTRESearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Postres';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="postre-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Postre', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idPOSTRE',
            'nombre_postre',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
