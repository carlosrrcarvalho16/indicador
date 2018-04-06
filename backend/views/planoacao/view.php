<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TbPlanoAcao */

$this->title = $model->idPlano;
$this->params['breadcrumbs'][] = ['label' => 'Tb Plano Acaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-plano-acao-view box box-primary">
    <div class="box-header">
        <?= Html::a('Update', ['update', 'id' => $model->idPlano], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idPlano], [
            'class' => 'btn btn-danger btn-flat',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'idPlano',
                'indicador',
                'ano',
                'mes',
                'item',
                'descricao_problema',
                'plano_acao',
                'responsavel',
                'abertura',
                'prazo',
                'status',
            ],
        ]) ?>
    </div>
</div>
