<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ConfEmailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Conf Emails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="conf-email-index box box-primary">
    <div class="box-header with-border">
        <?= Html::a('Create Conf Email', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'rowOptions' => function($model, $key, $index, $column){
                if($index % 2 == 0){
                    return ['class' => 'info'];
                }
            },
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'ID',
                'id_company',
                'from_name',
                'host_smtp',
                'port',
                // 'from_email:email',
                // 'password',
                // 'active',

                ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}'],
            ],
        ]); ?>
    </div>
</div>
