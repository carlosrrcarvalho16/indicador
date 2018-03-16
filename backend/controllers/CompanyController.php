<?php

namespace backend\controllers;

use Yii;
use backend\models\Company;
use backend\models\CompanySearch;
use backend\models\ConfEmail;
use backend\models\Insurer;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * CompanyController implements the CRUD actions for Company model.
 */
class CompanyController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only'  => ['index', 'create', 'delete', 'update', 'view'], //only be applied to
                'rules' => [
                    [
                        'allow'   => true,
                        'actions' => ['index','update','delete','create'],
                        'roles'   => ['manageCompany'],
                    ],
                ],
            ],
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
        $searchModel = new CompanySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Company model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Company model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Company();
        $model->active = 'Y';

        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Company model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model     = $this->findModel($id);
        $confemail = (isset($model->confEmail) ? $model->confEmail : new ConfEmail);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {

            if(!isset($model->confemail)):
                $confemail->id_company = $model->ID;
                $confemail->active = 'Y';
            endif;

            return $this->render('update', [
                'model'     => $model,
                'confemail' => $confemail
            ]);
        }
    }

    public function actionSeguradoras(){

        $id_company  = $_GET['id_company'];
        $seguradoras = Insurer::find()->where(['id_company' => $id_company, 'active' => 'Y'])->orderBy('name ASC')->all();
        $options     = '';
        
        if(count($seguradoras) > 0):
            foreach ($seguradoras as $insurer):
                $options .= "<option value='{$insurer->ID}'>{$insurer->name}</option>";
            endforeach;
        else:
            $options = "<option>Nenhuma seguradora disponível</option>";
        endif;

        echo json_encode(['seguradoras' => count($seguradoras), 'resultado' => $options]);
    }

    public function actionUpdateconfig($id){
        $model     = $this->findModel($id);
        $confemail = (isset($model->confEmail) ? $model->confEmail : new ConfEmail);
        if ($confemail->load(Yii::$app->request->post()) && $confemail->save()) {
            return $this->redirect(['update', 'id' => $model->ID]);
        }else{
            return $this->render('update', [
                'model'     => $model,
                'confemail' => $confemail
            ]);
        }
    }

    /**
     * Deletes an existing Company model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
        if (($model = Company::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
