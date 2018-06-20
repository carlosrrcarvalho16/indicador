<?php

namespace backend\controllers;

use Yii;
use backend\models\ConfEmail;
use backend\models\ConfEmailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ConfemailController implements the CRUD actions for ConfEmail model.
 */
class ConfemailController extends Controller
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
     * Lists all ConfEmail models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ConfEmailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTest(){

        try {

            $user = Yii::$app->user->identity;
            
            //send mail
            $mail = new \backend\components\SendMail;

            $id_user = ($_GET['origin'] == 'user' ? $_GET['id'] : 0);

            //check Config Mail Company
            $ConfEmail = ConfEmail::checkConfCompany($id_user);
            if($ConfEmail){
                $mail->smtp      = $ConfEmail->host_smtp;
                $mail->port      = $ConfEmail->port;
                $mail->from      = $ConfEmail->from_email;
                $mail->pass      = $ConfEmail->password;
                $mail->fromName  = $ConfEmail->from_name;
                $mail->security  = (empty($ConfEmail->security) ? null : $ConfEmail->security);
            }

            $subject  = 'Teste Envio de Email';
            
            if($mail->send($user->email, $subject, "E-mail somente para testes!")){
                echo json_encode(['status' => 'success', 'message' => 'E-mail de Teste enviado para: ' . $user->email]);
            }else{
                echo json_encode(['status' => 'error', 'message' => 'Falha no envio']);
            }

        } catch (Exception $e) {
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }

        
    }

    /**
     * Displays a single ConfEmail model.
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
     * Creates a new ConfEmail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ConfEmail();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ConfEmail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ConfEmail model.
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
     * Finds the ConfEmail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return ConfEmail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ConfEmail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
