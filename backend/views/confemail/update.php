<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ConfEmail */

$this->title = 'Update Conf Email: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Conf Emails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="conf-email-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
