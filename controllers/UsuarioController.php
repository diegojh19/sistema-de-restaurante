<?php

namespace app\controllers;

use Yii;
use app\models\usuario;
use app\models\User;
use app\models\usuarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsuarioController implements the CRUD actions for usuario model.
 */
class UsuarioController extends Controller
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
     * Lists all usuario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new usuarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single usuario model.
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
     * Creates a new usuario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new usuario();

        if ($model->load(Yii::$app->request->post())) {

            $user = new User();
            $user->username = $model->username;
            $user->password = $model->password;
            $user->authKey = 'test'.$model->username.'key';
            $user->accessToken = $model->username.'-token';

            if($user->save()){

                $model->user_id = $user->id;
                if($model->save()){
                    return $this->redirect(['view', 'id' => $model->idusuario]);
                
                }else{
                    
                    print_r($model->getErrors());
                    exit();
                }  

            }else{

                print_r($user->getErrors());
                exit();
            }

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing usuario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $user = $model->user;
        $model->username = $user->username;
        $model->password = $user->password;

        if ($model->load(Yii::$app->request->post())) {

            $user->username = $model->username;
            $user->password = $model->password;
            $user->authKey = 'test'.$model->username.'key';
            $user->accessToken = $model->username.'-token';

            if($user->save()){

                if($model->save()){
                    return $this->redirect(['view', 'id' => $model->idusuario]);
                
                }else{
                    
                    print_r($model->getErrors());
                    exit();
                }  

            }else{

                print_r($user->getErrors());
                exit();
            }

        }
         

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing usuario mod     * If deletion is successful, the browser will be redirected to the 'index' page.
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
     * Finds the usuario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return usuario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = usuario::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
