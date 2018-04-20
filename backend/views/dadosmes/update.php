<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TbDadosmes */

$this->title = 'Atualizar Dados Mês: ' . $model->mes . '/' . $model->ano;
$this->params['breadcrumbs'][] = ['label' => 'Dados do mês', 'url' => ['index?dep=0',]];
$this->params['breadcrumbs'][] = ['label' => $model->indicador->nome, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="tb-dadosmes-update">

    <?= $this->render('_form', [
		'model'             => $model,
		'dataProviderPlano' => $dataProviderPlano,
    ]) ?>

</div>
