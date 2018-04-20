<?php

namespace backend\controllers;

use Yii;
use backend\models\TbPlanoAcao;
use backend\models\TbPlanoAcaoSearch;
use backend\models\TbDadosmes;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PlanoacaoController implements the CRUD actions for TbPlanoAcao model.
 */
class PlanoacaoController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all TbPlanoAcao models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TbPlanoAcaoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TbPlanoAcao model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TbPlanoAcao model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TbPlanoAcao();

        if ($model->load(Yii::$app->request->post())) {

            $model->abertura = Yii::$app->formmat->showDate($model->abertura, 'date');
            $model->prazo    = Yii::$app->formmat->showDate($model->prazo, 'date');

            if($model->save()){
                echo json_encode(['status' => 'success', 'message' => 'Cadastro realizado']);
            }else{
                echo json_encode(['status' => 'error', 'message' => 'Falha no cadastro' . json_encode($model->errors)]);
            }
            
        } else {
            if($_GET['indicador'])
                $model->indicador = $_GET['indicador'];
            $model->ano = Yii::$app->session->get('ANO_DASH');
            $dadosmes      = TbDadosmes::findOne($_GET['idDadosMes']);
            $model->mes = $dadosmes->mes;
            return $this->renderAjax('create', [
                'model'     => $model
            ]);
        }
    }

    /**
     * Updates an existing TbPlanoAcao model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idPlano]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TbPlanoAcao model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TbPlanoAcao model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TbPlanoAcao the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TbPlanoAcao::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
