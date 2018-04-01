<?php

namespace backend\controllers;

use Yii;
use backend\models\TbDepartaments;
use backend\models\TBDadosmes;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class DadosMesController extends Controller
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

    public function actionIndex()
    {
    	$id          = $_GET['id'];
    	$dados_mes   = TBDadosmes::getDadosMes($id, date('Y'), date('m'));
        $dados_mes = [];
        return $this->render('index');
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
        if (($model = TBDadosmes::findOne($id) !== null)) {
            return $model;
        } else {
            throw new NotFoundHttpException('A página solicitada não existe.');
        }
    }

}
