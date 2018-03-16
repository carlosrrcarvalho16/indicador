<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = 'Atualizar Usuário';
$this->params['breadcrumbs'][] = ['label' => 'Usuários', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="usuario-update">

    <?= $this->render('_form', [
		'model'     => $model,
		'user'      => $user,
		'confemail' => $confemail
    ]) ?>

</div>
