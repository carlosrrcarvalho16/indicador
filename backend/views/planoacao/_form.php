<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;




/* @var $this yii\web\View */
/* @var $model backend\models\TbPlanoAcao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tb-plano-acao-form box box-primary">
    <?php 
    $form = ActiveForm::begin(['id' => $model->formName()]); 
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
                <?=
                    $form->field($model, 'abertura')->widget(DatePicker::className(),[
                              'name' => 'abertura',
                              'options' => ['placeholder' => 'Selecione a data ...'],
                              'pluginOptions' => [
                                  'format' => 'dd-M-yyyy',
                                  'todayHighlight' => true
                              ]
                    ])
                ?>

            </div>
            <div class="col-md-4">
                <?=
                    $form->field($model, 'prazo')->widget(DatePicker::className(),[
                        'options' => ['placeholder' => 'Selecione a data ...'],
                        'pluginOptions' => [
                            'format' => 'dd-M-yyyy',
                            'todayHighlight' => true
                        ],
                    ])
                ?>
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
        <?= Html::button('<i class="glyphicon glyphicon-remove"></i> Cancelar', ['class' => 'btn btn-danger', 'id' => 'modalButtonClose']) ?>
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
            $.pjax.reload({container:'#registrosGrid'});
            return false;
        }else{
            // $(\$form).trigger("reset");
            // $("#message").html(result.message);
            alert(result.message);
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
