<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Company */

$this->title = 'Nova Empresa';
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
