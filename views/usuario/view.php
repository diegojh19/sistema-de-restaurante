<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

$this->title = 'CONSULTAR USUARIO';
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="usuario-view">

<div class="col-md-12 col-sd-12 col-lg-offset-4">

    <h1><?= Html::encode($this->title) ?></h1>
    <br>
</div>
   
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idusuario',
            'nombre',
            'apellido',
            'tipo_usuario_idperfil',
            'user_id',
        ],
    ]) ?>
 <br>

 
 <div class="col-md-12 col-sd-12 col-lg-offset-5">
    <?= Html::a('SALIR',['index', 'id'=>$model->idusuario],[
              'class'=>'btn btn-primary',
          ]) ?>

</div>
</div>