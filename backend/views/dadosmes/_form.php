<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TbDadosmes */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="tb-dadosmes-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-header with-border">
      <h3 class="box-title">Atualização</h3>
    </div>
    <div class="box-body table-responsive">
        <div class='col-md-12' style="text-align: left;">
            <div class="col-md-3">
                <?= $form->field($model, 'valor')->textInput() ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'ytd')->textInput() ?>
            </div>
        </div>
            <div class='col-md-12' style="text-align: left;">
                <div class="col-md-3">
                    <?= $form->field($model, 'meta')->textInput() ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'sentido')->textInput() ?>
                </div>
            </div>
       

        <?php // $form->field($model, 'idIndicador')->textInput() ?>

        <?php // $form->field($model, 'data')->textInput() ?>

        <?php // $form->field($model, 'mes')->textInput() ?>       

        <?php // $form->field($model, 'ano')->textInput(['maxlength' => true]) ?>

        <?php // $form->field($model, 'criadoPor')->textInput(['maxlength' => true]) ?>

        <?php // $form->field($model, 'dataCriacao')->textInput() ?>

        <?php // $form->field($model, 'modificadoPor')->textInput(['maxlength' => true]) ?>

        <?php // $form->field($model, 'dataModificacao')->textInput() ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
