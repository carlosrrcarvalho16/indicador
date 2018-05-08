<?php

use yii\helpers\Html;
use frontend\widgets\Alert;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;


use backend\models\Company;
use backend\models\User;
use backend\models\AuthItem;

?>
<?= Alert::widgets() ?>
<?php $form = ActiveForm::begin(); ?>
<?= $form->field($user, 'currentPassword')->passwordInput() ?>
<?= $form->field($user, 'newPassword')->passwordInput() ?>
<?= $form->field($user, 'newPasswordConfirm')->passwordInput() ?>
<div class="box-footer">
	<div class="form-group">
		<?= Html::submitButton('Salvar', ['class' => $user->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		<?= Html::a('<i class="glyphicon glyphicon-chevron-left"></i> Cancelar', ['/user'], ['class' => 'btn btn-danger']); ?>
	</div>
</div>
<?php ActiveForm::end(); ?>