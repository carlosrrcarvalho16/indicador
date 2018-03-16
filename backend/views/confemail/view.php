<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ConfEmail */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Conf Emails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="conf-email-view box box-primary">
    <div class="box-header">
        <?= Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger btn-flat',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'ID',
                'id_company',
                'from_name',
                'host_smtp',
                'port',
                'from_email:email',
                'password',
                'active',
            ],
        ]) ?>
    </div>
</div>
