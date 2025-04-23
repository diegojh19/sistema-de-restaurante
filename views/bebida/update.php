<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BEBIDA */

$this->title = 'Update Bebida: ' . $model->idBEBIDA;
$this->params['breadcrumbs'][] = ['label' => 'Bebidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idBEBIDA, 'url' => ['view', 'id' => $model->idBEBIDA]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bebida-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
