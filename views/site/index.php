<?php
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = ' Restaurante popeye`s';

if(isset(Yii::$app->user->identity->usuarios))
    $idPerfil = Yii::$app->user->identity->usuarios->tipo_usuario_idperfil;
else
    $idPerfil = 0;

?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Bienvenido!</h1>

        <p class="lead">Control de Mesas, Comandas y Facturación del  <?= $this->title ?>.</p>

    </div>

    <p align="center">
        <?php if($idPerfil == 2) {?>
            
            <?php if(isset(Yii::$app->user->identity->usuarios->cajaAbierta)){ ?> 
                <?= Html::a('Cerrar caja', ['caja/cerrar', 'idCaja' => Yii::$app->user->identity->usuarios->cajaAbierta->idCaja], ['class' => 'btn btn-danger','data' => [
                        'confirm' => 'Estas seguro de cerrar la caja?',
                        ],
                    ]) ?> 

            <?php }else{ ?>
                <?= Html::a('Abrir caja', ['caja/create'], ['class' => 'btn btn-info']) ?> 
            
            <?php } ?>

        <?php }else if($idPerfil == 3){ ?>
            <?= Html::a('Nueva Comanda', ['pedidos/create'], ['class' => 'btn btn-info']) ?> 
        
        <?php }else if($idPerfil == 4){ ?>
            <?= Html::a('Despachos pendientes', ['pedidos/index-chef'], ['class' => 'btn btn-info']) ?> 
        <?php } ?>
    </p>

    <!-- <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div> -->
</div>
