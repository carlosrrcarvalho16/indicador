<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TbIndicador */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Revisão do Cadastro', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-indicador-view box box-primary">
    <div class="box-header">
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a('Deletar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-flat',
            'data' => [
                'confirm' => 'Você está certo que deseja excluir esse item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('<i class="glyphicon glyphicon-chevron-left"></i> Voltar', ['/indicador'], ['class' => 'btn btn-primary']); ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [

                [
                    'attribute' => 'departamentoID',
                    'label'     => 'Departamento',
                    'format'    => 'raw',
                    'value'     => $model->departamento->departamento,
                ],
                'nome',
                'descricao',
                'ano',
                'meta',
                'ytd',
                [
                    'attribute' => 'sentido_da_meta',
                    'format'    => 'raw',
                    'value'     => ($model->sentido_da_meta == '0' ? 'Maior melhor' : 'Maior pior'),
                ],

                [
                    'attribute' => 'active',
                    'format'    => 'raw',
                    'value'     => ($model->active == 'Y' ? 'Sim' : 'Não'),
                ],
                [
                    'attribute' => 'criadoPor',
                    'label'     => 'Criado Por',
                    'format'    => 'raw',
                    'value'     => $model->criadopor->name,
                ],
            ],
        ]) ?>
    </div>
</div>
