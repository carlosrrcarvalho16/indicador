<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TbPlanoAcao */

$this->title = 'Create Tb Plano Acao';
$this->params['breadcrumbs'][] = ['label' => 'Tb Plano Acaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-plano-acao-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
