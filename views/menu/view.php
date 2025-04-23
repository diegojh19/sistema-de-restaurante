<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MENU */

$this->title = 'CONSULTAR MENÚ';
$this->params['breadcrumbs'][] = ['label' => 'Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="menu-view">

    <br>

    <div class="col-md-12 col-sm-12 col-lg-offset-4">

    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    </div>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idMENU',
            'nombre',
            'descripcion',
            'cantidad_disponible',
            'valor_menu',
            'estado_menu',
        ],
    ]) ?>

     <br>
    
    <div class="col-md-12 col-sm-12 col-lg-offset-5">
    
     <?= Html::a('SALIR', ['index', 'id' => $model->idMENU], [
            'class' => 'btn btn-primary',
         
        ]) ?>
</div>

</div>
