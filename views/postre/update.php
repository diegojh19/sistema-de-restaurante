<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\POSTRE */

$this->title = 'Update Postre: ' . $model->idPOSTRE;
$this->params['breadcrumbs'][] = ['label' => 'Postres', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPOSTRE, 'url' => ['view', 'id' => $model->idPOSTRE]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="postre-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
