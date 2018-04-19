<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use backend\models\user;

/* @var $this yii\web\View */
/* @var $model backend\models\TbDepartaments */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Revisão do Departamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-departaments-view box box-primary">
    <div class="box-header">
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a('Deletar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-flat',
            'data' => [
                'confirm' => 'Você está certo que deseja excluir esse item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('<i class="glyphicon glyphicon-chevron-left"></i> Cancelar', ['/indicador'], ['class' => 'btn btn-danger']); ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                
                'departamento',
                [
                    'attribute' => 'managerUserId',
                    'label'     => 'Gerente',
                    'format'    => 'raw',
                    'value'     => $model->manageruser->name,
                ],

                [
                    'attribute' => 'active',
                    'format'    => 'raw',
                    'value'     => ($model->active == 'Y' ? 'Sim' : 'Não'),
                ],
                'icons',
            ],
        ]) ?>
    </div>
</div>
