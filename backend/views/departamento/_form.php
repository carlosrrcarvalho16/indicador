<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\user;

/* @var $this yii\web\View */
/* @var $model backend\models\TbDepartaments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tb-departaments-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <div class="box-body">
            <div class="col-md-4">
                <div class="form-group">
                    <?= $form->field($model, 'departamento')->textInput(['maxlength' => true]) ?>
                    <?php
                    echo $form->field($model, 'managerUserId')->dropDownList(
                        ArrayHelper::map(user::find()->where(['ID' => 'managerUserId'])->all(), 'ID', 'name'),
                        [
                            'prompt' => 'Selecione ...',
                            'id'     => 'select-user-name'
                        ]
                    )->label('Gerente');
                    ?>

                </div>
                <div class="row">
                    <div class="col-md-4">
                        <?= $form->field($model, 'active')->checkbox(['class' => 'minimal', 'value' => 'Y']) ?>
                    </div>
                </div>
            </div>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-chevron-left"></i> Cancelar', ['/departamento'], ['class' => 'btn btn-danger']); ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
