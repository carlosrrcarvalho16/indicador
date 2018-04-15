<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper; //criar Combo
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TbDadosmesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dados do mês';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-dadosmes-index box box-primary">
<!--
    <div class="box-header with-border">
        // Html::a('Create Tb Dadosmes', ['create'], ['class' => 'btn btn-success btn-flat'])
    </div>
 -->
    <div class="box-body table-responsive no-padding">
        <?php Pjax::begin(['enablePushState' => false] ); ?>

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?php
        $meses = array(
                ['id' => '1' , 'data' => 'Janeiro'],
                ['id' => '2' , 'data' => 'Fevereiro'],
                ['id' => '3' , 'data' => 'Março'],
                ['id' => '4' , 'data' => 'Abril'],
                ['id' => '5' , 'data' => 'Maio'],
                ['id' => '6' , 'data' => 'Junho'],
                ['id' => '7' , 'data' => 'Julho'],
                ['id' => '8' , 'data' => 'Agosto'],
                ['id' => '9' , 'data' => 'Setembro'],
                ['id' => '10', 'data' => 'Outubro'],
                ['id' => '11', 'data' => 'Novembro'],
                ['id' => '12', 'data' => 'Dezembro']
                );

        ?>
       <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'idIndicador',
                    'value'     => 'indicador.nome',
                    'label'     => 'Indicador',
                    'filter' => ArrayHelper::map(backend\models\TbIndicador::find()->all(), 'id', 'nome')
                ],
                'ano',
                'mes',
                'valor',
                /*[
                    'attribute' => 'mes',
                    'value'     => $meses,
                    'filter' => ArrayHelper::getColumn($meses,'id','data')
                ],*/




                ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {update}'],
            ],
        ]); ?>
    </div>
</div>
