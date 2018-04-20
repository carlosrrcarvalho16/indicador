<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TbDadosmes */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="row">
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#dados_mes" data-toggle="tab">Dados Mês</a></li>
            <li><a href="#plano_acao" data-toggle="tab">Plano de Ação</a></li>
        </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="dados_mes">
                <div class="box-body">
                    <?php $form = ActiveForm::begin();?>

                     <div class='col-md-12' style="text-align: left;">
                        <div class="col-md-3">
                            <?= $form->field($model, 'valor')->textInput() ?>
                        </div>
                        <div class="col-md-3">
                            <?= $form->field($model, 'ytd')->textInput() ?>
                        </div>
                    </div>
                    <div class='col-md-12' style="text-align: left;">
                        <div class="col-md-3">
                            <?= $form->field($model, 'meta')->textInput() ?>
                        </div>
                        <div class="col-md-3">
                            <?php
                              $sentido = array (0 => 'Maior melhor',1 => 'Maior pior');
                              echo $form->field($model, 'sentido')->dropDownList($sentido
                              );
                          ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <?= Html::submitButton('Salvar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        <?= Html::a('<i class="glyphicon glyphicon-chevron-left"></i> Cancelar', ['/dadosmes?dep=0'], ['class' => 'btn btn-danger']); ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
          </div><!-- /.tab-pane -->
          <div class="tab-pane" id="plano_acao">
                <div class="box-body">
                    <?php 
                    echo $this->render('_plano_acao', ['dadosmes' => $model, 'dataProviderPlano' => $dataProviderPlano,]);
                    ?>
                </div>
          </div><!-- /.tab-pane -->
        </div><!-- /.tab-content -->
      </div><!-- /.nav-tabs-custom -->
    </div><!-- /.col -->
</div><!-- /.row -->
