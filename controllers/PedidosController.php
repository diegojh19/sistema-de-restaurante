<?php

namespace app\controllers;

use Yii;
use app\models\PEDIDOS;
use app\models\FACTURA;
use app\models\MENU;
use app\models\MESA;
use app\models\DETALLEDECOMANDAS;
use app\models\PEDIDOSSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PedidosController implements the CRUD actions for PEDIDOS model.
 */
class PedidosController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all PEDIDOS models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PEDIDOSSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all PEDIDOS models.
     * @return mixed
     */
    public function actionIndexCajero()
    {
        $searchModel = new PEDIDOSSearch();
        $searchModel->estado = PEDIDOS::ENTREGADA;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all PEDIDOS models.
     * @return mixed
     */
    public function actionIndexChef()
    {
        $searchModel = new PEDIDOSSearch();
        $searchModel->estado = PEDIDOS::PENDIENTE;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all PEDIDOS models.
     * @return mixed
     */
    public function actionIndexMesero()
    {
        $searchModel = new PEDIDOSSearch();
        $searchModel->usuario_id = Yii::$app->user->identity->usuarios->idusuario;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PEDIDOS model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PEDIDOS model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PEDIDOS();
        $model->fecha_comanda = date('Y-m-d');
        $model->hora_comanda = date('H:m:s');
        $model->estado_comanda = PEDIDOS::PENDIENTE;
        $model->USUARIO_usuarioId = Yii::$app->user->identity->usuarios->idusuario;

        if ($model->load(Yii::$app->request->post()) ) {

            if($model->save()){

                //Gets pedidos data
                $selectedMenus = explode(';', $model->pedidoDetails);

                //Se especifica si ya no quedan existencias del menú 
                $mensajeAgotado = "";

                //Checks if there are items associated
                if($model->pedidoDetails != ""){

                    foreach ($selectedMenus as $current) {
                        
                        $menu = MENU::findOne($current);
                        $detalle = new DETALLEDECOMANDAS();
                        $detalle->MENU_idMENU = $menu->idMENU;
                        $detalle->PEDIDOS_Idpedidos = $model->Idpedidos;
                        $detalle->valor_unitario = $menu->valor_menu;
                        $detalle->cantidad = $_POST['cantdad_'.$current];
                        $detalle->descripcion = $menu->nombre;

                        if(!$detalle->save()){
                            print_r($detalle->getErrors());
                            exit();
                        }

                        $menu->cantidad_disponible = $menu->cantidad_disponible - 1;
                        if($menu->cantidad_disponible < 1){
                            $menu->estado_menu = MENU::AGOTADO;
                            $menu->setMenuTotalName();
                            $mensajeAgotado = $mensajeAgotado." ".$menu->nombre.",";
                        }

                        if(!$menu->save()){
                            print_r($menu->getErrors());
                            exit();
                        }
                    }
                }
                
                $mesa = MESA::findOne($model->MESA_numero_de_mesa);
                $mesa->estado_de_mesa = MESA::MESA_OCUPADA;

                if($mesa->save()){
                    
                    if($mensajeAgotado != ""){
                        Yii::$app->session->setFlash('error', 'Se han agotado las existencias de '.$mensajeAgotado);
                    }

                    return $this->redirect(['view', 'id' => $model->Idpedidos]);

                }else{
                    print_r($mesa->getErrors());
                    exit();
                }
            
            }else{
                print_r($model->getErrors());
                exit();
            }

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PEDIDOS model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->estado_comanda = PEDIDOS::PENDIENTE;

        if ($model->load(Yii::$app->request->post()) ) {

            if($model->save()){

                //Gets pedidos data
                $selectedMenus = explode(';', $model->pedidoDetails);

                //Se especifica si ya no quedan existencias del menú 
                $mensajeAgotado = "";

                //Checks if there are items associated
                if($model->pedidoDetails != ""){

                    foreach ($selectedMenus as $current) {
                        
                        $menu = MENU::findOne($current);
                        
                        if(null == DETALLEDECOMANDAS::find()->where(['MENU_idMENU' => $menu->idMENU, 'PEDIDOS_Idpedidos' => $model->Idpedidos])->one()){

                            $detalle = new DETALLEDECOMANDAS();
                            $detalle->MENU_idMENU = $menu->idMENU;
                            $detalle->PEDIDOS_Idpedidos = $model->Idpedidos;
                            $detalle->valor_unitario = $menu->valor_menu;
                            $detalle->cantidad = $_POST['cantdad_'.$current];
                            $detalle->descripcion = $menu->nombre;
                            $detalle->despachado = DETALLEDECOMANDAS::DESPACHADO_NO;

                            if(!$detalle->save()){
                                print_r($detalle->getErrors());
                                exit();
                            }

                            $menu->cantidad_disponible = $menu->cantidad_disponible - 1;
                            if($menu->cantidad_disponible < 1){
                                $menu->estado_menu = MENU::AGOTADO;
                                $menu->setMenuTotalName();
                                $mensajeAgotado = $mensajeAgotado." ".$menu->nombre.",";
                            }

                            if(!$menu->save()){
                                print_r($menu->getErrors());
                                exit();
                            }
                        }
                    }
                }
                
                $mesa = MESA::findOne($model->MESA_numero_de_mesa);
                $mesa->estado_de_mesa = MESA::MESA_OCUPADA;

                if($mesa->save()){
                    
                    if($mensajeAgotado != ""){
                        Yii::$app->session->setFlash('error', 'Se han agotado las existencias de '.$mensajeAgotado);
                    }

                    return $this->redirect(['view', 'id' => $model->Idpedidos]);

                }else{
                    print_r($mesa->getErrors());
                    exit();
                }
            
            }else{
                print_r($model->getErrors());
                exit();
            }

        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PEDIDOS model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDespacho($id)
    {
        $model = $this->findModel($id);

        $model->estado_comanda = PEDIDOS::ENTREGADA;

        foreach ($model->detalles as $current) {
            $current->despachado = DETALLEDECOMANDAS::DESPACHADO_SI;

            if(!$current->save()){
                print_r($detalle->getErrors());
                exit();
            }
        }

        if ($model->save()) {
            return $this->redirect(['view', 'id' => $model->Idpedidos]);
        
        }else{
            print_r($model->getErrors());
            exit();
        }
    }

    /**
     * Updates an existing PEDIDOS model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionFactura($id)
    {
        $model = $this->findModel($id);

        $factura = new FACTURA();
        $factura->fecha_factura = date('Y-m-d');
        $factura->estado_factura = FACTURA::ESTADO_FACTURADA;
        $factura->idFACTURA = $model->Idpedidos;
        $factura->MESA_numero_de_mesa = $model->MESA_numero_de_mesa;
        $factura->PEDIDOS_Idpedidos = $model->Idpedidos;
        $factura->valor_total = $model->valorTotal;

        if(!$factura->save()){
            print_r($factura->getErrors());
            exit();
        }

        $model->estado_comanda = PEDIDOS::FACTURADA;

        if(!$model->save()){
            print_r($model->getErrors());
            exit();
        }

        $caja = Yii::$app->user->identity->usuarios->cajaAbierta;
        $caja->monto_final = $caja->monto_final + $factura->valor_total;

        if(!$caja->save()){
            print_r($caja->getErrors());
            exit();
        }

        $mesa = $model->getMESANumeroDeMesa()->one();
        $mesa->estado_de_mesa = MESA::MESA_DISPONIBLE;

        if ($mesa->save()) {
            return $this->redirect(['factura/view', 'idFACTURA' => $factura->idFACTURA, 'MESA_numero_de_mesa' => $mesa->numero_de_mesa]);
        
        }else{
            print_r($mesa->getErrors());
            exit();
        }
    }

    /**
     * Deletes an existing PEDIDOS model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PEDIDOS model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PEDIDOS the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PEDIDOS::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Sets process data by selection
     * @return String $processData
     */
    public function actionSelectedMenu() {
        
        if(Yii::$app->request->post('sel') !== null && Yii::$app->request->post('sel') != ''){
            //return json_encode(Newness::findOne(Yii::$app->request->post('sel'))->toArray());
            $fields = [];

            $menu = MENU::findOne(Yii::$app->request->post('sel'));

            return json_encode($menu->toArray());
        }

        return null;
    }
}
