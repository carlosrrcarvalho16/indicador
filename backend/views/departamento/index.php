<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper; //criar Combo

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TbDepartamentoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Departamento';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-departaments-index box box-primary">
    <div class="box-header with-border">
        <?= Html::a('Criar novo Departaments', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'departamento',
               
                [
                    'attribute' => 'managerUserId',
                    'value'     => 'manageruser.name',
                    'contentOptions'=>['style'=>'width: 300px;'],
                    'filter'    => ArrayHelper::map(backend\models\User::find()->all(), 'ID', 'name')
                ],
                [
                    'attribute' => 'active',
                    'contentOptions'=>['style'=>'width: 120px; vertical-align: middle;'],

                    'content' => function($data){
                        return ($data->active == 'Y' ? 'Sim' : 'Não');
                    }
                ],
                [
                    'attribute' =>'icons',
                    'value' => 'icons',
                    'contentOptions'=>['style'=>'width: 150px;']
                ],

               
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
