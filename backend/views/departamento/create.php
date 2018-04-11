<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TbDepartaments */

$this->title = 'Novo Departaments';
$this->params['breadcrumbs'][] = ['label' => 'Departamento', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-departaments-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
