<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TbPlanoAcao */

$this->title = 'Update Tb Plano Acao: ' . $model->idPlano;
$this->params['breadcrumbs'][] = ['label' => 'Tb Plano Acaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPlano, 'url' => ['view', 'id' => $model->idPlano]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tb-plano-acao-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
