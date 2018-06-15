<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\BaseUrl;
use yii\bootstrap\ActiveForm;

?>
<div class="login-box">
  <div class="login-box-body">
    <div class="login-logo">
      <a href="#"><img src="<?php echo BaseUrl::base();?>/dist/img/logo_indicador.png" /></a>
    </div><!-- /.login-logo -->
    <p class="login-box-msg">Informe os seus dados de acesso</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?> 
        <div class="form-group has-feedback"> 
        <?= $form->field($model, 'username', [
            'options' => [
              'tag'         => 'div', 
              'class'       => 'form-group has-feedback field-loginform-username required'
            ],
            'template' => '{input}<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                          {error}{hint}'
        ])->textInput(['placeholder' => 'Usuário']);
        ?>
        </div>
        <div class="form-group has-feedback">
        <?= $form->field($model, 'password', [
            'options' => [
              'tag'         => 'div', 
              'class'       => 'form-group field-loginform-username has-feedback required'
            ],
            'template' => '{input}<span class="glyphicon glyphicon-lock form-control-feedback"></span>'
        ])->passwordInput(['placeholder' => 'Senha']); 
        ?>
        </div>
        <div class="row">
        
        <div class="col-xs-6">
              <?= Html::submitButton('Entrar', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
        </div><!-- /.col -->
      </div>
    <?php ActiveForm::end(); ?>
    
    <div style="color:#999;margin:1em 0">
      Se você esqueceu a senha, você pode <?= Html::a('resetar', ['site/requestpassword']) ?>.
    </div>

   </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
