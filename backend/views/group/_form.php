<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\models\AuthItem;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthItem */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#cadastro" data-toggle="tab">Grupo</a></li>
                <?php if(!$model->isNewRecord): ?>
                <li><a href="#permissions" data-toggle="tab">Permissões</a></li>
                <?php endif; ?>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="cadastro">
                    <?php $form = ActiveForm::begin(); ?>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                                    <div class="help-block"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
                                    <div class="help-block"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="form-group">
                            <?= Html::submitButton('Salvar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                            <?= Html::a('<i class="glyphicon glyphicon-chevron-left"></i> Cancelar', ['/group'], ['class' => 'btn btn-danger']); ?>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
                <div class="tab-pane" id="permissions">
                    <?php
                    if(!$model->isNewRecord):
                        echo $this->render('_form_permission', [
                            'group'       => $model,
                            'permissions' => $permissions
                        ]) ;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
