<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\POSTRE */

$this->title = 'Create Postre';
$this->params['breadcrumbs'][] = ['label' => 'Postres', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="postre-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
