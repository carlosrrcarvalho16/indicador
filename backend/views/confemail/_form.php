<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ConfEmail */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(['action' => '/' . $origin . '/updateconfig?id=' . $ID]); ?>
<div class="box-body">

    <?php 
    if($origin == 'user'){
        echo $form->field($model, "id_{$origin}")->hiddenInput()->label(false);
    } 
    echo $form->field($model, "id_company")->hiddenInput()->label(false); 
    ?>
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?= $form->field($model, 'from_name')->textInput(['maxlength' => true]) ?>
                <div class="help-block"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?= $form->field($model, 'host_smtp')->textInput(['maxlength' => true]) ?>
                <div class="help-block"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?= $form->field($model, 'from_email')->textInput(['maxlength' => true]) ?>
                <div class="help-block"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
                <div class="help-block"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?= $form->field($model, 'port')->textInput(['maxlength' => true]) ?>
                <div class="help-block"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php
                echo $form->field($model, 'security')->dropDownList(
                    ['' => 'auto', 'tls' => 'TLS', 'ssl' => 'SSL'],
                    ['class' => 'form-control']
                )
                ?>
                <div class="help-block"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php  echo $form->field($model, 'active')->checkbox(['class' => 'minimal', 'value' => 'Y']);?>
                <div class="help-block"></div>
            </div>
        </div>
    </div>
</div>

<div class="box-footer">
    <div class="form-group">
        <?= Html::submitButton('Salvar Configuração', ['class' => 'btn btn-primary']) ?>    
        <?= Html::button('<i class="glyphicon glyphicon glyphicon-send"></i> &nbsp; Testar Conexão', ['class' => 'btn btn-success', 'id' => 'btn-testmail', 'param-origin' => $origin, 'param-id' => $ID]) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>