<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ENTRADA */

$this->title = 'Update Entrada: ' . $model->idsopa;
$this->params['breadcrumbs'][] = ['label' => 'Entradas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idsopa, 'url' => ['view', 'id' => $model->idsopa]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="entrada-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
