<?php

namespace backend\controllers;

use Yii;
use backend\models\AuthItem;
use backend\models\AuthItemSearch;
use backend\models\AuthAssignment;
use backend\models\AuthItemChild;
use backend\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * PermissionController implements the CRUD actions for AuthItem model.
 */
class GroupController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'delete', 'update', 'view'], //only be applied to
                'rules' => [
                    [
                        'allow'   => true,
                        'actions' => ['index','update','delete','create'],
                        'roles'   => ['manageGroup'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all AuthItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AuthItemSearch();
        $searchModel->type = 1;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
			'searchModel'  => $searchModel,
			'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AuthItem model.
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
     * Creates a new AuthItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AuthItem();
        $auth  = Yii::$app->authManager;

        if ($model->load(Yii::$app->request->post())) {
            $groupCreate   = $auth->createRole($model->name);
            $groupCreate->description = $model->description;
            $auth->add($groupCreate);
            return $this->redirect(['update', 'id' => $model->name]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AuthItem model.
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
        	$permissions = AuthItem::find()->where(['type' => 2])->all();
            return $this->render('update', [
				'model'       => $model,
				'permissions' => $permissions
            ]);
        }
    }

    public function actionUpdatepermission($id){

    	$auth = Yii::$app->authManager;

    	//Remove Permissions Group
    	$permissionsGroup = AuthItemChild::find()->where(['parent' => $id])->all();
    	foreach ($permissionsGroup as $permissionGroup) {
    		$permissionGroup->delete();
    	}

    	//Adiciona novas permissões
    	$permissionsList = $_POST['AuthItem']['permissions'];
        if(count($permissionsList) > 0){
        	foreach ($permissionsList as $permission) {
    			$permissionCreate = $auth->createPermission($permission);
    			$roleCreate       = $auth->createRole($id);
    			$auth->addChild($roleCreate, $permissionCreate);
        	}
        }

    	return $this->redirect(['index']);
    }

    /**
     * Deletes an existing AuthItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
     
    public function actionDelete($id)
    {
        $auth  = Yii::$app->authManager;
        $permissionDelete = $auth->createPermission($id);
        $auth->remove($permissionDelete);
        // $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AuthItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return AuthItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AuthItem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
