<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TbIndicador */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Revisão do Cadastro', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-indicador-view box box-primary">
    <div class="box-header">
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-flat',
            'data' => [
                'confirm' => 'Você está certo que deseja excluir esse item?',
                'method' => 'post',
            ],
        ]) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'departamentoID',
                'nome',
                'descricao',
                'ano',
                'meta',
                'sentido_da_meta',
                'ytd',

              /*  'criadoPor',
                'dataCriacao',
                'modificadoPor',
                'dataModificacao', */
                [
                    'attribute' => 'active',
                    'format'    => 'raw',
                    'value'     => ($model->active == 'Y' ? 'Sim' : 'Não'),
                ],
            ],
        ]) ?>
    </div>
</div>
