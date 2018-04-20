<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TbPlanoAcao */

$this->title = 'Novo Plano de Ação';
?>
<div class="tb-plano-acao-create">

	<h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
