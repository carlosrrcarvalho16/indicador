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

$this->title = 'Trocar de senha';
//$this->params['breadcrumbs'][] = ['label' => 'Usuários', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Trocar de senha';
?>
<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#cadastro" data-toggle="tab">Troca de senha de usuário</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="cadastro">
                    <?php $form = ActiveForm::begin(); ?>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?= $form->field($model, 'password')->passwordInput() ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="form-group">
                            <?= Html::submitButton('Salvar', ['class' => $user->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                            <?= Html::a('<i class="glyphicon glyphicon-chevron-left"></i> Cancelar', ['/site'], ['class' => 'btn btn-danger']); ?>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
