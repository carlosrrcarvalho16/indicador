<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TbPlanoAcaoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tb-plano-acao-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idPlano') ?>

    <?= $form->field($model, 'indicador') ?>

    <?= $form->field($model, 'ano') ?>

    <?= $form->field($model, 'mes') ?>

    <?= $form->field($model, 'item') ?>

    <?php // echo $form->field($model, 'descricao_problema') ?>

    <?php // echo $form->field($model, 'plano_acao') ?>

    <?php // echo $form->field($model, 'responsavel') ?>

    <?php // echo $form->field($model, 'abertura') ?>

    <?php // echo $form->field($model, 'prazo') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
