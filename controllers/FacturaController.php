<?php

namespace app\controllers;

use Yii;
use app\models\FACTURA;
use app\models\FACTURASearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FacturaController implements the CRUD actions for FACTURA model.
 */
class FacturaController extends Controller
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
     * Lists all FACTURA models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FACTURASearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FACTURA model.
     * @param integer $idFACTURA
     * @param integer $MESA_numero_de_mesa
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idFACTURA, $MESA_numero_de_mesa)
    {
        return $this->render('view', [
            'model' => $this->findModel($idFACTURA, $MESA_numero_de_mesa),
        ]);
    }

    /**
     * Creates a new FACTURA model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FACTURA();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idFACTURA' => $model->idFACTURA, 'MESA_numero_de_mesa' => $model->MESA_numero_de_mesa]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing FACTURA model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idFACTURA
     * @param integer $MESA_numero_de_mesa
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idFACTURA, $MESA_numero_de_mesa)
    {
        $model = $this->findModel($idFACTURA, $MESA_numero_de_mesa);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idFACTURA' => $model->idFACTURA, 'MESA_numero_de_mesa' => $model->MESA_numero_de_mesa]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing FACTURA model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idFACTURA
     * @param integer $MESA_numero_de_mesa
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idFACTURA, $MESA_numero_de_mesa)
    {
        $this->findModel($idFACTURA, $MESA_numero_de_mesa)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the FACTURA model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idFACTURA
     * @param integer $MESA_numero_de_mesa
     * @return FACTURA the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idFACTURA, $MESA_numero_de_mesa)
    {
        if (($model = FACTURA::findOne(['idFACTURA' => $idFACTURA, 'MESA_numero_de_mesa' => $MESA_numero_de_mesa])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
