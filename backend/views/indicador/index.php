<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TbIndicadorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tb Indicadors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-indicador-index box box-primary">
    <div class="box-header with-border">
        <?= Html::a('Create Tb Indicador', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'nome',
                'descricao',
                'ano',
                'meta',
                // 'sentido_da_meta',
                // 'ytd',
                // 'departamentoID',
                // 'criadoPor',
                // 'dataCriacao',
                // 'modificadoPor',
                // 'dataModificacao',
                // 'active',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
