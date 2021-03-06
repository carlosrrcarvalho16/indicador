<?php

namespace backend\controllers;

use Yii;
use backend\models\TbDepartaments;
use backend\models\TbIndicador;
use backend\models\TbDadosmes;
use backend\models\TbPlanoAcao;
use backend\models\TbPlanoAcaoSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * CompanyController implements the CRUD actions for Company model.
 */
class GraficoController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Company models.
     * @return mixed
     */
    public function actionIndex()
    {
        $id          = $_GET['id'];
        $nome        = $_GET['nome'];
        $ano         = Yii::$app->session->get('ANO_DASH');
        
        $grafico_mes = TbDadosmes::getDadosMesAno($id, $ano);
        $grafico_ytd = TbDadosmes::getDadosYTD($nome, $ano);
        $planoAcao   = TbPlanoAcao::getPlanoAcao($id);


        $searchModelPlanoAcao  = new TbPlanoAcaoSearch();
        $searchModelPlanoAcao->indicador = $id;
        $searchModelPlanoAcao->status = 'Aberto';
        $dataProviderPlanoAcao = $searchModelPlanoAcao->search(Yii::$app->request->queryParams);

        $searchModelPlanoAcaoClosed  = new TbPlanoAcaoSearch();
        $searchModelPlanoAcaoClosed->indicador = $id;
        $searchModelPlanoAcaoClosed->status = 'Fechado';
        $dataProviderPlanoAcaoClosed = $searchModelPlanoAcaoClosed->search(Yii::$app->request->queryParams);

        $indicador = TbIndicador::findOne($id);
       
        return $this->render('index', [
            'graficoMes'                  => $grafico_mes, 
            'graficoYTD'                  => $grafico_ytd,
            'vNome'                       => $nome, 
            'planoDeAcao'                 => $planoAcao, 
            'departamentoID'              => $indicador->departamentoID,
            'searchModelPlanoAcao'        => $searchModelPlanoAcao,
            'dataProviderPlanoAcao'       => $dataProviderPlanoAcao,
            'searchModelPlanoAcaoClosed'  => $searchModelPlanoAcaoClosed, 
            'dataProviderPlanoAcaoClosed' => $dataProviderPlanoAcaoClosed
        ]);
        
    }

    /**
     * Finds the Company model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Company the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TbDepartaments::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('A página solicitada não existe.');
        }
    }
}
