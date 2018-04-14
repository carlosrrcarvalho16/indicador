<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TbDadosmes */

$this->title = 'Create Tb Dadosmes';
$this->params['breadcrumbs'][] = ['label' => 'Tb Dadosmes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-dadosmes-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
