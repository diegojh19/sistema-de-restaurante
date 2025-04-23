<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PLATOFUERTE */

$this->title = 'Update Platofuerte: ' . $model->idPLATO_FUERTE;
$this->params['breadcrumbs'][] = ['label' => 'Platofuertes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPLATO_FUERTE, 'url' => ['view', 'id' => $model->idPLATO_FUERTE]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="platofuerte-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
