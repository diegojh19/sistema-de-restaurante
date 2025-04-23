<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\MESA;
use app\models\MENU;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\PEDIDOS */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedidos-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="panel panel-info">
        <div class="panel-heading">
            MESAS DISPONIBLES
        </div>
        <div class="form-bounds">

            <div class="row">

                <div class="col-md-12 col-sm-12">

                    <?= $form->field($model, 'MESA_numero_de_mesa')->widget(Select2::classname(), [
                            'name' => 'MESA_numero_de_mesa',
                            'data' => ArrayHelper::map(MESA::find()->where(['estado_de_mesa' => MESA::MESA_DISPONIBLE])->all(), 'numero_de_mesa', 'numero_de_mesa'),
                            'options' => ['placeholder' => 'Buscar Mesa disponible'],
                            'pluginOptions' => [
                                'allowClear' => true,
                                'multiple' => false
                            ],
                        ]); ?>    
                        
                </div>
                    
            </div>
        </div>
    </div>

    <!-- <div class="panel panel-info">
        <div class="panel-heading">
            INFORMACIÓN PERSONA
        </div>
        <div class="form-bounds">

            <div class="row">

                <div class="col-md-3 col-sm-3">
                    <?= $form->field($model, 'primer_nombre')->textInput() ?>
                </div>
                <div class="col-md-3 col-sm-3">
                    <?= $form->field($model, 'segundo_nombre')->textInput() ?>
                </div>
                <div class="col-md-3 col-sm-3">
                    <?= $form->field($model, 'primer_apellido')->textInput() ?>
                </div>
                <div class="col-md-3 col-sm-3">
                    <?= $form->field($model, 'segundo_apellido')->textInput() ?>
                </div>
                    
            </div>
        </div>
    </div> -->

    <div class="panel panel-info">
        <div class="panel-heading">
            INFORMACIÓN DE COMANDA
        </div>
        <div class="form-bounds">
            <DIV class="ROW">
                <br>
            </DIV>
            <div class="row">

                <div class="col-md-6 col-sm-6">

                    <div class="panel panel-info">
                        <div class="panel-heading">
                            MENÚ ACTUAL
                        </div>
                        <div class="form-bounds">

                            <div class="row">

                                <div class="col-md-12 col-sm-12">
                                    <input type="hidden" id="pedidosArray" class="form-control" name="PEDIDOS[pedidoDetails]" value="">
                                    <table id="pedidosTable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Descripción</th>
                                                <th>Cantidad</th>
                                                <th>Valor Unitario</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- ADDS TABLE CONTENT DINAMICALLY -->
                                        </tbody>
                                    </table>
                                    
                                </div>
                                    
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-6 col-sm-6">

                    <div class="panel panel-info">
                        <div class="panel-heading">
                            AGREGAR MENÚ
                        </div>
                        <div class="form-bounds">

                            <div class="row">

                                <div class="col-md-12 col-sm-12">
                                    <?= $form->field($model, 'idMENU')->widget(Select2::classname(), [
                                        'name' => 'idMENU',
                                        'data' => ArrayHelper::map(MENU::find()->where(['estado_menu' => MENU::DISPONIBLE])->all(), 'idMENU', 'nombre'),
                                        'options' => ['placeholder' => 'Buscar Menú disponible', 'onchange'=> 'setContractPedidoData(this.value)'],
                                        'pluginOptions' => [
                                            'allowClear' => true,
                                            'multiple' => false
                                        ],
                                    ]); ?>

                                    <?php $this->registerJs('function setContractPedidoData(selection){
                                        var sel = selection;
                                        $.ajax({
                                            url: "'.Yii::$app->getUrlManager()->createUrl('pedidos/selected-menu').'",
                                            type: "POST",
                                             data: { sel: sel},
                                             success: function(data) {
                                                 if(data != null){
                                                     setProductTableContent(data, "pedidosTable", "pedidosArray")
                                                 }
                                             },
                                             error: function(data){
                                                alert("no funcionó"+JSON.stringify(data));
                                             }
                                         });
                                    }', View::POS_END); ?>

                                </div>
                                    
                            </div>
                        </div>
                    </div>
                    
                </div>
                    
            </div>
        </div>
    </div>

    

    <br>
<div class="col-md-12 col-sd-12 col-lg-offset-4">
    <div class="form-group">
        <?= Html::submitButton('GUARDAR', ['class' => 'btn btn-success']) ?>
    </div>
</div>

    <?php ActiveForm::end(); ?>

</div>
