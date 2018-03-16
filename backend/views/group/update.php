<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthItem */

$this->title = 'Atualizar grupo: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Grupos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->name]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="auth-item-update">

    <?= $this->render('_form', [
		'model'       => $model,
		'permissions' => $permissions
    ]) ?>

</div>
