<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\AuthItem */

$this->title = 'Nova Permissão';
$this->params['breadcrumbs'][] = ['label' => 'Permissões', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
