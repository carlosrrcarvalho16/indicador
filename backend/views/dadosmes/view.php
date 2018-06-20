<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TbDadosmes */

$this->title = $model->indicador->nome;
$this->params['breadcrumbs'][] = ['label' => 'Dados do mês', 'url' => ['index?dep=0']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-dadosmes-view box box-primary">
    <h1><?= $model->indicador->nome . ' - ' ?><small><?= $model->indicador->descricao?></small></h1>
    <div class="box-header">
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat']) ?>
    </div>
    
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
