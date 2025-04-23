<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MENU */

$this->title = 'CREAR MENÚ';
$this->params['breadcrumbs'][] = ['label' => 'Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-create">

<div class="col-md-12 col-sm-12 col-lg-offset-4">

    <h1><?= Html::encode($this->title) ?></h1>

</div>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <div class="col-md-12 col-sm-12 col-lg-offset-6" style="margin-top: -45px;">

     <?= Html::a('CANCELAR', ['index', 'id' => $model->idMENU], [
            'class' => 'btn btn-primary',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
</div>


</div>
