<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TbDadosmesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tb-dadosmes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['data-pjax' => true],
    ]); ?>



    <?php // $form->field($model, 'id') ?>

    <?php //  $form->field($model, 'valor') ?>

    <?php  $form->field($model, 'idIndicador') ?>

    <?php // $form->field($model, 'ytd') ?>

    <?php // $form->field($model, 'data') ?>

    <?php // echo $form->field($model, 'mes') ?>

    <?php // echo $form->field($model, 'meta') ?>

    <?php // echo $form->field($model, 'sentido') ?>

    <?php // echo $form->field($model, 'ano') ?>

    <?php // echo $form->field($model, 'criadoPor') ?>

    <?php // echo $form->field($model, 'dataCriacao') ?>

    <?php // echo $form->field($model, 'modificadoPor') ?>

    <?php // echo $form->field($model, 'dataModificacao') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php //Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
