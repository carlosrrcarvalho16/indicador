<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TbIndicador */

$this->title = 'Atualizar Indicador: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Indicador', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="tb-indicador-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
