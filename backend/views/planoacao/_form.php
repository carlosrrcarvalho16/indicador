<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TbPlanoAcao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tb-plano-acao-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'indicador')->textInput() ?>

        <?= $form->field($model, 'ano')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'mes')->textInput() ?>

        <?= $form->field($model, 'item')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'descricao_problema')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'plano_acao')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'responsavel')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'abertura')->textInput() ?>

        <?= $form->field($model, 'prazo')->textInput() ?>

        <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
