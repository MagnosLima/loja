<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\Cliente;
use app\models\Telefone;
use app\models\Endereco;
use app\models\ClienteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ClienteController implements the CRUD actions for Cliente model.
 */
class ClienteController extends Controller
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
     * Lists all Cliente models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClienteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cliente model.
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
     * Creates a new Cliente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    //User e cliente
    public function actionCreate()
    {
        $user = new User();
        $cliente = new Cliente();
        $telefone = new Telefone();
        $endereco = new Endereco();

        if ($user->load(Yii::$app->request->post()) && $cliente->load(Yii::$app->request->post()) && $telefone->load(Yii::$app->request->post()) && $endereco->load(Yii::$app->request->post())) {
            $user->type = 'usuario';
            if($user->save()){
                $cliente->id_user = $user->id_user;
                $cliente->data_hora_cadastro = date('2018-11-12 17:45:25');
                if($cliente->save()){
                    //telefone
                    $telefone->id_user = $user->id_user;
                    $telefone->save();
                    $endereco->id_user = $user->id_user;
                    $endereco->save();
                    return $this->redirect(['view', 'id' => $cliente->id_user]);        
                }
            }
        }

        return $this->render('create', [
            'user' => $user,
            'cliente' => $cliente,
            'telefone' => $telefone,
            'endereco' => $endereco,
        ]);
    }

    /**
     * Updates an existing Cliente model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_user]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Cliente model.
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
     * Finds the Cliente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cliente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cliente::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
