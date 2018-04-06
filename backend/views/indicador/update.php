<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TbIndicador */

$this->title = 'Update Tb Indicador: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tb Indicadors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tb-indicador-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
