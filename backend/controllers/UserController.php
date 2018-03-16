<?php

namespace backend\controllers;

use Yii;
use backend\models\SignupForm;
use backend\models\User;
use backend\models\UserSearch;
use backend\models\ConfEmail;
use backend\models\AuthAssignment;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
                        'roles'   => ['manageUser'],
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAuth(){

        $auth = Yii::$app->authManager;

        //auth_item
        $digma          = $auth->createRole('digma');
        $administrador  = $auth->createRole('administrador');
        $comum          = $auth->createRole('comum');

        /*$auth->add($digma);
        $auth->add($administrador);
        $auth->add($comum);*/

        //auth_item
        $viewUser   = $auth->createPermission('user-index');
        $addUser    = $auth->createPermission('user-create');
        $editUser   = $auth->createPermission('user-edit');
        $deleteUser = $auth->createPermission('user-delete');

        /*$auth->add($viewUser);
        $auth->add($addUser);
        $auth->add($editUser);
        $auth->add($deleteUser);*/

        /*$auth->addChild($digma, $viewUser);
        $auth->addChild($digma, $addUser);
        $auth->addChild($digma, $editUser);
        $auth->addChild($digma, $deleteUser);*/

        // $auth->assign($digma, 1);
        
    }

    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SignupForm();
        $user  = new User();

        if ($model->load(Yii::$app->request->post())):
            $user = $model->signup();
            if($user->getErrors()):
                return $this->render('create', ['model' => $model, 'user' => $user]);
            else:

                //Create Role
                $auth      = Yii::$app->authManager;
                $roleGroup = $auth->createRole($model->group);
                $auth->assign($roleGroup, $user->ID);

                return $this->redirect(['index']);
            endif;
        else:
            return $this->render('create', ['model' => $model, 'user' => $user]);
        endif;
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model        = $this->findModel($id);
        $user         = $model;
        $updateAssign = (isset($_POST['User']['group']) && $model->group != $_POST['User']['group'] ? true : false);
        $confemail    = (isset($model->confEmail) ? $model->confEmail : new ConfEmail);

        if ($model->load(Yii::$app->request->post())) {

            $model->password = $_POST['User']['password'];
            
            if(isset($_POST['change_pass']) && $_POST['change_pass'] == 'Y'):
                $model->setPassword($model->password);
                $model->generateAuthKey();
            else:
                $model->password = $model->auth_key;
            endif;
            
            if($updateAssign)
                $this->updateAssign($id, $model->group, $_POST['User']['group']);

            if(!$model->save()){
                return $this->redirect(['index']);
            }else{    
                return $this->redirect(['index']);
            }

        } else {
            
            if(!isset($model->confemail)):
                $confemail->id_user    = $model->ID;
                $confemail->id_company = $model->id_company;
                $confemail->active     = 'Y';
            endif;

            return $this->render('update', [
                'model' => $model, 'user' => $user, 'confemail' => $confemail
            ]);
        }
    }

    public function actionUpdateconfig($id){
        $model     = $this->findModel($id);
        $confemail = (isset($model->confEmail) ? $model->confEmail : new ConfEmail);
        if ($confemail->load(Yii::$app->request->post()) && $confemail->save()) {
            return $this->redirect(['update', 'id' => $model->ID]);
        }else{
            return $this->render('update', [
                'model' => $model, 'user' => $model, 'confemail' => $confemail
            ]);
        }
    }

    private function updateAssign($userId, $groupAfter, $groupBefore){
        $assign = AuthAssignment::findOne(['item_name' => $groupBefore, 'user_id' => $userId]);
        if($assign)
            $assign->delete();
        $auth  = Yii::$app->authManager;
        $group = $auth->createRole($groupAfter);
        $auth->assign($group, $userId);
    }

    /**
     * Deletes an existing User model.
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
