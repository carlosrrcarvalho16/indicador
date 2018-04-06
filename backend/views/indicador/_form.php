<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TbIndicador */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tb-indicador-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'ano')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'meta')->textInput() ?>

        <?= $form->field($model, 'sentido_da_meta')->textInput() ?>

        <?= $form->field($model, 'ytd')->textInput() ?>

        <?= $form->field($model, 'departamentoID')->textInput() ?>

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
