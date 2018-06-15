<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use backend\models\TbDepartaments;
use backend\models\PasswordResetRequestForm;
use backend\models\ResetPasswordForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'teste', 'departamentos'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        //Verifica se asessão está vazia
        if (Yii::$app->session->get('MES_DASH') == "") {
           $mes = date('m', strtotime('-1 months', strtotime(date('Y-m-d'))));
           $ano = date('Y');
           Yii::$app->session->set('MES_DASH', $mes);
           Yii::$app->session->set('ANO_DASH', $ano);
        }else{
            $mes = Yii::$app->session->get('MES_DASH');
            $ano = Yii::$app->session->get('ANO_DASH');
        }
        $selectQtdDepartamentoPlanosAcao = TbDepartaments::getSelectQtdDepartamentoPlanosAcao($ano);
        $departaments = TbDepartaments::getSelectDepartamento($mes, $ano);


        return $this->render('index', ['departaments' => $departaments, 'mes' => $mes, 
            'ano' => $ano,
            'selectQtdDepartamentoPlanosAcao' =>  $selectQtdDepartamentoPlanosAcao,
        ]);
    }

    public function actionDepartamentos(){

        Yii::$app->session->set('MES_DASH', $_POST['mes']);
        Yii::$app->session->set('ANO_DASH', $_POST['ano']);

        $selectQtdDepartamentoPlanosAcao = TbDepartaments::getSelectQtdDepartamentoPlanosAcao($_POST['ano']);

        $departaments = TbDepartaments::getSelectDepartamento($_POST['mes'], $_POST['ano']);
        echo $this->renderPartial('_departamentos', ['departaments' => $departaments,
            'selectQtdDepartamentoPlanosAcao' =>  $selectQtdDepartamentoPlanosAcao,]);
    }
    
    public function actionLogin()
    {
        $this->layout = 'loginLayout';
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }
    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
