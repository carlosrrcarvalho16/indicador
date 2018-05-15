<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\BaseUrl;
use yii\bootstrap\ActiveForm;

$this->title = 'INDICADOR';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-box">
  <div class="login-box-body">
    <div class="login-logo">
      <a href="#"><img src="<?php echo BaseUrl::base();?>/dist/img/logo_indicador.png" /></a>
    </div><!-- /.login-logo -->
    <p class="login-box-msg">Informe os seus dados de acesso</p>
    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>  
        <?= $form->field($model, 'username', [
            'options' => [
              'tag'         => 'div', 
              'class'       => 'form-group field-loginform-username has-feedback required'
            ],
            'template' => '{input}<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                          {error}{hint}'
        ])->textInput(['placeholder' => 'Email ou Usuário']);
        ?>

        <?= $form->field($model, 'password', [
            'options' => [
              'tag'         => 'div', 
              'class'       => 'form-group field-loginform-username has-feedback required'
            ],
            'template' => '{input}<span class="glyphicon glyphicon-lock form-control-feedback"></span>'
        ])->passwordInput(['placeholder' => 'Senha']); 
        ?>
    
      <div class="row">
        
        <div class="col-xs-4">
              <?= Html::submitButton('Entrar', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
        </div><!-- /.col -->
      </div>
    <?php ActiveForm::end(); ?>
    
    <div style="color:#999;margin:1em 0">
      Se você esqueceu a senha, você pode <?= Html::a('resetar', ['site/request-password-reset']) ?>.
    </div>

   </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
