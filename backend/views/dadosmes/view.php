<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TbDadosmes */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dados do mês', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-dadosmes-view box box-primary">
    <div class="box-header">
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat']) ?>
        

    </div>
    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                [
                    'attribute' => 'idIndicador',
                    'label'     => 'Indicador',
                    'format'    => 'raw',
                    'value'     => $model->indicador->nome,
                ],
                'valor',
                'ytd',
                [
                    'attribute' => 'data',
                    'label'     => 'Data da Criação',
                    'format' => ['date', 'php:d/m/Y']
                ],
                'mes',
                'meta',
                [
                    'attribute' => 'sentido',
                    'format'    => 'raw',
                    'value'     => ($model->sentido == '0' ? 'Maior melhor' : 'Maior pior'),
                ],
                'ano',
                
                [
                    'attribute' => 'modificadoPor',
                    'label'     => 'Atualizado Por',
                    'format'    => 'raw',
                    'value'     => (!isset($model->modificadopor->name) ? '' :$model->modificadopor->name)
                ], 

                [
                    'attribute' => 'dataModificacao',
                    'label'     => 'Data da Atualização',
                    'format'    => ['date', 'php:d/m/Y'],
                    
                ], 
                
            ],
        ]) ?>
    </div>
</div>
