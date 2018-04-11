<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TbDepartaments */

$this->title = 'Atualizar Departaments: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Departamento', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="tb-departaments-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
