<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PLATOFUERTE */

$this->title = 'Create Platofuerte';
$this->params['breadcrumbs'][] = ['label' => 'Platofuertes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="platofuerte-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
