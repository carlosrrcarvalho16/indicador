<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TbIndicador */

$this->title = 'Novo Indicador';
$this->params['breadcrumbs'][] = ['label' => 'Indicadors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-indicador-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
