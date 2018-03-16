<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Empresas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-index box box-primary">
    <div class="box-header with-border">
        <?php
        if(\Yii::$app->user->can('createCompany')){
            echo Html::a('Nova Empresa', ['create'], ['class' => 'btn btn-success btn-flat']);
        }
        ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            // 'filterModel' => $searchModel,
            'layout'    => "{summary}\n{items}\n{pager}",
            'summary'   => "<div class='summary-grid'>Listando {begin} - {end} de {totalCount} itens</div>",
            'emptyText' => 'Nenhum registro encontrado',
            'columns'   => [
                ['class' => 'yii\grid\SerialColumn'],

                'ID',
                'name',
                [
                    'attribute' => 'active',
                    'content' => function($data){
                        return ($data->active == 'Y' ? 'Ativo' : 'Inativo');
                    }
                ],

                ['class' => 'yii\grid\ActionColumn', 'template' => '{update} ' . (\Yii::$app->user->can('createCompany') ? '{delete}' : '')],
            ],
        ]); ?>
    </div>
</div>
