<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TbIndicadorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tb-indicador-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'descricao') ?>

    <?= $form->field($model, 'ano') ?>

    <?= $form->field($model, 'meta') ?>

    <?php // echo $form->field($model, 'sentido_da_meta') ?>

    <?php // echo $form->field($model, 'ytd') ?>

    <?php // echo $form->field($model, 'departamentoID') ?>

    <?php // echo $form->field($model, 'criadoPor') ?>

    <?php // echo $form->field($model, 'dataCriacao') ?>

    <?php // echo $form->field($model, 'modificadoPor') ?>

    <?php // echo $form->field($model, 'dataModificacao') ?>

    <?php // echo $form->field($model, 'active') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
