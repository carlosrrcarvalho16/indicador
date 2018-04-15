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
                'sentido',
                'ano',
                'modificadoPor',
               /* [
                    'attribute' => 'modificadoPor',
                    'label'     => 'Atualizado Por',
                    'format'    => 'raw',
                    'value'     => $model->modificadopor->name,
                ],*/

                [
                    'attribute' => 'dataModificacao',
                    'label'     => 'Data da Atualização',
                    'format' => ['date', 'php:d/m/Y']
                ],
            ],
        ]) ?>
    </div>
</div>