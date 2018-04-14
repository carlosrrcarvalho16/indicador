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
                'id',
                'valor',
                'idIndicador',
                'ytd',
                'data',
                'mes',
                'meta',
                'sentido',
                'ano',
                'criadoPor',
                'dataCriacao',
                'modificadoPor',
                'dataModificacao',
            ],
        ]) ?>
    </div>
</div>
