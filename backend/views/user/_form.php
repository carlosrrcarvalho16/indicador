<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\models\Company;
use backend\models\User;
use backend\models\AuthItem;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#cadastro" data-toggle="tab">Usuário</a></li>
                <?php if(!$user->isNewRecord): ?>
                <li><a href="#conf_email" data-toggle="tab">Configuração Email</a></li>
                <?php endif; ?>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="cadastro">
                    <?php $form = ActiveForm::begin(); ?>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php
                                    echo $form->field($model, 'id_company')->dropDownList(
                                        ArrayHelper::map(Company::findCompanyUser(), 'ID', 'name'),
                                        [
                                            'prompt' => 'Selecione ...',
                                            'id' => 'models-company'
                                        ]
                                    );
                                    ?>
                                    <div class="help-block"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php
                                    echo $form->field($model, 'group')->dropDownList(
                                        ArrayHelper::map(AuthItem::findGroup(), 'name', 'name'),
                                        [
                                            'id' => 'models-group'
                                        ]
                                    );
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php if(isset($user->isNewRecord) && !$user->isNewRecord):?>
                                        
                                        <?php
                                        //Start Update Password
                                        // if(Yii::$app->user->identity->ID == $model->ID || Yii::$app->user->identity->ID == 1):
                                        if(\Yii::$app->user->can('manageUser')):
                                        ?>

                                        <?= Html::checkbox('change_pass', false, ['label' => 'Alterar senha?', 'uncheckValue' => 'N', 'value' => 'Y']);?>

                                        <?= $form->field($model, 'password')->passwordInput() ?>

                                        <?php 
                                        endif; //End Update Password
                                        ?>

                                        <?php // $form->field($model, 'active')->checkbox(['class' => 'minimal', 'value' => 'Y']) ?>
                                        <?= $form->field($model, 'status')->checkbox(['class' => 'minimal', 'value' => '10']) ?>


                                    <?php else: ?>
                                        <?= $form->field($model, 'password')->passwordInput() ?>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="form-group">
                            <?= Html::submitButton('Salvar', ['class' => $user->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                            <?= Html::a('<i class="glyphicon glyphicon-chevron-left"></i> Cancelar', ['/user'], ['class' => 'btn btn-danger']); ?>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
                <div class="tab-pane" id="conf_email">
                    <?php
                    if(!$user->isNewRecord):
                        echo $this->render('//confemail/_form', [
                            'ID'     => $model->ID,
                            'origin' => 'user',
                            'model'  => $confemail
                        ]) ;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
