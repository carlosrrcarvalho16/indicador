<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ConfEmail */

$this->title = 'Create Conf Email';
$this->params['breadcrumbs'][] = ['label' => 'Conf Emails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="conf-email-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
