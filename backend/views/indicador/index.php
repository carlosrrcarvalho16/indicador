<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper; //criar Combo

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TbIndicadorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Indicador';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-indicador-index box box-primary">
    <div class="box-header with-border">
        <?= Html::a('Criar novo indicador', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'summary'   => "<div class='summary-grid'>Listando {begin} - {end} de {totalCount} itens</div>",
            'emptyText' => 'Nenhum registro encontrado',
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                [
                    'attribute' => 'departamentoID',
                    'value'     => 'departamento.departamento',
                    'filter' => ArrayHelper::map(backend\models\TbDepartaments::find()->all(), 'id', 'departamento')
                ],
                'nome',
                'descricao',

                [
                    'attribute' =>'ano',
                    'value' => 'ano',
                    'contentOptions'=>['style'=>'width: 80px;']
                ],

                [
                    'attribute' =>'meta',
                    'value' => 'meta',
                    'contentOptions'=>['style'=>'width: 80px;']
                ],
                [
                    'attribute' => 'criadoPor',
                    'value'     => 'criadopor.name',
                    'filter' => ArrayHelper::map(backend\models\User::find()->all(), 'ID', 'name')
                ],

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
