<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use backend\models\TbDepartaments;

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
        $departamentoComPlanosAtrazados = TbDepartaments::getSelectDepartamentoComPlanosAtrazados($ano);
        $planosAcaoAbertos = TbDepartaments::getFn_PlanosAcaoAbertos($ano);
        $planosAcaoAtrazados = TbDepartaments::getFn_PlanosAcaoAtrazados($ano);
        $departaments = TbDepartaments::getSelectDepartamento($mes, $ano);


        return $this->render('index', ['departaments' => $departaments, 'mes' => $mes, 'ano' => $ano,
            'departamentoComPlanosAtrazados' =>  $departamentoComPlanosAtrazados ,
            'planosAcaoAbertos' => $planosAcaoAbertos,
            'planosAcaoAtrazados' => $planosAcaoAtrazados
        ]);
    }

    public function actionDepartamentos(){

        Yii::$app->session->set('MES_DASH', $_POST['mes']);
        Yii::$app->session->set('ANO_DASH', $_POST['ano']);

        $departaments = TbDepartaments::getSelectDepartamento($_POST['mes'], $_POST['ano']);
        echo $this->renderPartial('_departamentos', ['departaments' => $departaments]);
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
}
