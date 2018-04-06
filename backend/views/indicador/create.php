<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TbIndicador */

$this->title = 'Create Tb Indicador';
$this->params['breadcrumbs'][] = ['label' => 'Tb Indicadors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-indicador-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
