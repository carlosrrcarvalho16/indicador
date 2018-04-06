<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\TbDepartaments;

/* @var $this yii\web\View */
/* @var $model backend\models\TbIndicador */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tb-indicador-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body">

        <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'ano')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'meta')->textInput() ?>

        <?= $form->field($model, 'sentido_da_meta')->textInput() ?>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <?= $form->field($model, 'ytd')->textInput() ?>            
                    <div class="help-block"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <?php
                    echo $form->field($model, 'departamentoID')->dropDownList(
                        ArrayHelper::map(TbDepartaments::find()->where(['active' => 'Y'])->all(), 'id', 'departamento'),
                        [
                            'prompt' => 'Selecione ...',
                            'id'     => 'select2-pessoa-categoria'
                        ]
                    );
                    ?>
                    <div class="help-block"></div>
                </div>
            </div>
        </div>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
