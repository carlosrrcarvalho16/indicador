<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/resetpassword', 'token' => $user->password_reset_token]);
?>
Olá <?= $user->name ?>,

Clique no link para redefinir sua senha:

<?= $resetLink ?>
