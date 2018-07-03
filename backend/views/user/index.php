<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuários';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index box box-primary">
    <div class="box-header with-border">
        <?= Html::a('Novo Usuário', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
        
    </div>

    <div class="box-body table-responsive no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            // 'filterModel' => $searchModel,
            'layout'    => "{summary}\n{items}\n{pager}",
            'summary'   => "<div class='summary-grid'>Listando {begin} - {end} de {totalCount} itens</div>",
            'emptyText' => 'Nenhum registro encontrado',
            'rowOptions' => function($model, $key, $index, $column){
                if($index % 2 == 0){
                    return ['class' => 'info'];
                }
            },
            'columns'   => [
                ['class' => 'yii\grid\SerialColumn'],

                'ID',
                [
                    'attribute' => 'id_company',
                    'value'     => 'company.name'
                ],
                'name',
                'email:email',
                'username',

                ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}'],
            ],
        ]); ?>
    </div>
</div>
