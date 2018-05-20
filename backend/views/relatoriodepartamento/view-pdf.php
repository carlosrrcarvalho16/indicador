<?php

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TbDepartamentoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper; //criar Combo

$this->title = 'Relatório';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1>Relatório de Departamentos</h1>
<div class="tb-departaments-index box box-primary">

    <div class="box-body table-responsive no-padding">

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            // 'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'rowOptions' => function($model, $key, $index, $column){
                if($index % 2 == 0){
                    return ['class' => 'info'];
                }
            },
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
            ],
        ]);
        ?>
    </div>
</div>
