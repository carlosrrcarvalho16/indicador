<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TbDepartaments */

$this->title = 'Create Tb Departaments';
$this->params['breadcrumbs'][] = ['label' => 'Tb Departaments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-departaments-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
