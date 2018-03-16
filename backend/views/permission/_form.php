<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-item-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body">

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    </div>
   
   <div class="box-footer">
        <div class="form-group">
            <?= Html::submitButton('Salvar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            <?= Html::a('<i class="glyphicon glyphicon-chevron-left"></i> Cancelar', ['/permission'], ['class' => 'btn btn-danger']); ?>
        </div>
    </div>
    
    <?php ActiveForm::end(); ?>
</div>
