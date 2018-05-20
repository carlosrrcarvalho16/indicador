<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AuthItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Permissões';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-index box box-primary">
    <div class="box-header with-border">
        <?= Html::a('Nova Permissão', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            // 'filterModel' => $searchModel,
            'layout'    => "{summary}\n{items}\n{pager}",
            'rowOptions' => function($model, $key, $index, $column){
                if($index % 2 == 0){
                    return ['class' => 'info'];
                }
            },
            'summary'   => "<div class='summary-grid'>Listando {begin} - {end} de {totalCount} itens</div>",
            'emptyText' => 'Nenhum registro encontrado',
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'name',
                // 'type',
                'description:ntext',
                // 'rule_name',
                // 'data:ntext',
                // 'created_at',
                // 'updated_at',

                ['class' => 'yii\grid\ActionColumn', 'template' => '{delete}'],
            ],
        ]); ?>
    </div>
</div>
