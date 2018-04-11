<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\TbDepartaments;

/* @var $this yii\web\View */
/* @var $model backend\models\TbIndicador */
/* @var $form yii\widgets\ActiveForm */

?>

<!-- Fim -->
<div class="tb-indicador-form box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Cadastro de Incicadores</h3>
    </div>
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body">
        <div class="col-md-4">
            <div class="form-group">
                <?php
                echo $form->field($model, 'departamentoID')->dropDownList(
                        ArrayHelper::map(TbDepartaments::find()->where(['active' => 'Y'])->all(), 'id', 'departamento'),
                        [
                            'prompt' => 'Selecione ...',
                            'id'     => 'select2-pessoa-categoria'
                        ]
                    )->label('Departamento');
                ?>

            </div>
        </div>
        <div class="row">
        <div class="col-md-2">
            <?= $form->field($model, 'ano')->textInput(['maxlength' => true]) ?>
        </div>
        
         <div class="col-md-6">
            <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>
            <div class="col-md-3">
                <?= $form->field($model, 'meta')->textInput() ?>
            </div>
            <div class="col-md-6">
                <?php
                    $sentido = array (0 => 'Maior melhor',1 => 'Maior pior');
                    echo $form->field($model, 'sentido_da_meta')->dropDownList($sentido
                    );
                ?>


            </div>
             <div class="row">
                 <div class="col-md-4">
                 <?= $form->field($model, 'ytd')->textInput() ?>
                 <?= $form->field($model, 'active')->checkbox(['class' => 'minimal', 'value' => 'Y']) ?>
                 </div>
             </div>
         </div>
     </div>
    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-chevron-left"></i> Cancelar', ['/indicador'], ['class' => 'btn btn-danger']); ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
