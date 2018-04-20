<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TbPlanoAcao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tb-plano-acao-form box box-primary">
    <?php 
    $form = ActiveForm::begin(); 
    echo $form->field($model, 'indicador')->hiddenInput()->label(false);
    echo $form->field($model, 'ano')->hiddenInput()->label(false);
    echo $form->field($model, 'mes')->hiddenInput()->label(false);
    ?>
    <div class="box-body">

        <div class='row'>
            <div class="col-md-3">
                <?= $form->field($model, 'item')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'responsavel')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <div class='row'>
            <div class="col-md-6">
                <?= $form->field($model, 'descricao_problema')->textarea(['rows' => 6]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'plano_acao')->textarea(['rows' => 6]) ?>
            </div>
        </div>
        

        <div class='row'>
            <div class="col-md-4">
                <?= $form->field($model, 'abertura')->textInput(['class' => 'form-control', 'data-inputmask' => "'alias': 'dd/mm/yyyy'", 'data-mask' => ''])?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'prazo')->textInput() ?>
            </div>
            <div class="col-md-4">
                <?php
                  $sentido = array ('Aberto' => 'Aberto', 'Fechado' => 'Fechado');
                  echo $form->field($model, 'status')->dropDownList($sentido);
                ?>
            </div>
        </div>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>

<?php 
$script = <<< JS
$('form#{$model->formName()}').on('beforeSubmit', function(e){
    var \$form = $(this);
    $.post(
        \$form.attr("action"), //serialize Yii2 form 
        \$form.serialize()
    )
    .done(function(result){
        result = JSON.parse(result);
        if(result.status == 'success'){
            $(\$form).trigger("reset");
            $(document).find('#modal').modal('hide');
            $.pjax.reload({container:'#planosGrid'});
            return false;
        }else{
            $(\$form).trigger("reset");
            $("#message").html(result.message);
        }
    })
    .fail(function(){
        console.log("server error");
    });

    return false;
});
$('#modalButtonClose').on('click', function(){
  $(document).find('#modal').modal('hide');
});

JS;
$this->registerJS($script);
?>
