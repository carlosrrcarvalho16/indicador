<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TbDadosmes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tb-dadosmes-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'valor')->textInput() ?>

        <?= $form->field($model, 'idIndicador')->textInput() ?>

        <?= $form->field($model, 'data')->textInput() ?>

        <?= $form->field($model, 'mes')->textInput() ?>

        <?= $form->field($model, 'meta')->textInput() ?>

        <?= $form->field($model, 'sentido')->textInput() ?>

        <?= $form->field($model, 'ano')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'criadoPor')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'dataCriacao')->textInput() ?>

        <?= $form->field($model, 'modificadoPor')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'dataModificacao')->textInput() ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
