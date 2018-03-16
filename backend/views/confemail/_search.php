<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ConfEmailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="conf-email-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'id_company') ?>

    <?= $form->field($model, 'from_name') ?>

    <?= $form->field($model, 'host_smtp') ?>

    <?= $form->field($model, 'port') ?>

    <?php // echo $form->field($model, 'from_email') ?>

    <?php // echo $form->field($model, 'password') ?>

    <?php // echo $form->field($model, 'active') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
