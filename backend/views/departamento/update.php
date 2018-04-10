<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TbDepartaments */

$this->title = 'Update Tb Departaments: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tb Departaments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tb-departaments-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
