<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);

if(isset(Yii::$app->user->identity->usuarios))
    $idPerfil = Yii::$app->user->identity->usuarios->tipo_usuario_idperfil;
else
    $idPerfil = 0;

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => " Restaurante Popeye`s",
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    $menuItems = [
        ['label' => 'Inicio', 'url' => ['/site/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        
        if($idPerfil == 1){

            $menuItems[] = ['label' => 'Usuarios', 'url' => ['/usuario/index']];
            $menuItems[] = ['label' => 'Mesas', 'url' => ['/mesa/index']];
            $menuItems[] = ['label' => 'Menús', 'url' => ['/menu/index']];
            $menuItems[] = ['label' => 'Comandas', 'url' => ['/pedidos/index']];
            $menuItems[] = ['label' => 'Facturas', 'url' => ['/factura/index']];
            $menuItems[] = ['label' => 'Reservas', 'url' => ['/reserva/index']];
            $menuItems[] = ['label' => 'Cajas', 'url' => ['/caja/index']];
        
        }else if($idPerfil == 2){
            $menuItems[] = ['label' => 'Mesas', 'url' => ['/mesa/index']];
            $menuItems[] = ['label' => 'Comandas por facturar', 'url' => ['/pedidos/index-cajero']];
        
        }else if($idPerfil == 3){
            $menuItems[] = ['label' => 'Comanda mesero', 'url' => ['/pedidos/index-mesero']];
        
        }else{
            $menuItems[] = ['label' => 'Comanda por despachar', 'url' => ['/pedidos/index-chef']];
        }


        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,/*[

            ['label' => 'Usuarios', 'url' => ['/usuario/index']],
            ['label' => 'Mesas', 'url' => ['/mesa/index']],
            
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],*/
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy;  Restaurante Popeye`s <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
