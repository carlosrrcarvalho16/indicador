<?php

namespace backend\controllers;

use Yii;
use backend\models\TbDepartaments;
use backend\models\TbDadosmes;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * CompanyController implements the CRUD actions for Company model.
 */
class DepartamentController extends Controller
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
        $departament = TbDepartaments::findOne($id);
        $dados_mes   = TbDadosmes::getDadosMes($id, date('Y'), date('m'));
        //$dados_mes = [];

        return $this->render('index', ['departament' => $departament, 'dados_mes' => $dados_mes]);
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
