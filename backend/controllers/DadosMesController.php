<?php

namespace backend\controllers;

use Yii;
use backend\models\TbDadosmes;

use backend\models\TbDadosmesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DadosmesController implements the CRUD actions for TbDadosmes model.
 */
class DadosmesController extends Controller
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
     * Lists all TbDadosmes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $ano = Yii::$app->session->get('ANO_DASH');
        $idDep = $_GET['dep'];
        if ( $idDep<>0) {
             $indicadores = TbDadosmes::getIndicadorAuth($idDep,
             Yii::$app->session->get('ANO_DASH', $ano));
        } else {
             $indicadores = [];
        }
       
        $searchModel = new TbDadosmesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $departamentos =TbDadosmes::getDepartamentoAuth(Yii::$app->user->identity->group);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'departamentos' =>  $departamentos,
            'indicadores' => $indicadores,
        ]);
    }

    /**
     * Displays a single TbDadosmes model.
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
     * Creates a new TbDadosmes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TbDadosmes();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TbDadosmes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TbDadosmes model.
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
     * Finds the TbDadosmes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TbDadosmes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TbDadosmes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('A página splicitada não existe.');
        }
    }
}
