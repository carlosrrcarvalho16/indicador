<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */



$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/resetpassword', 'token' => $user->password_reset_token]);
?>
<div class="password-reset">
    <p>Olá <?= Html::encode($user->name) ?>,</p>

    <p>Clique no link para redefinir sua senha:</p>


    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>
</div>
