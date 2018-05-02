<?php

use yii\helpers\BaseUrl;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use backend\models\TbPlanoAcao;
use backend\models\Identity;

/* @var $this yii\web\View */
/* @var $model backend\models\TbPlanoAcao */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="plano-acao-index">

    <p>
        <?= Html::button('Cadastrar Plano Ação', ['value' => Url::to(BaseUrl::base() . '/planoacao/create?indicador=' . $dadosmes->idIndicador . '&idDadosMes='. $dadosmes->id), 'class' => 'btn btn-success modalButton']) ?>
    </p>

    <?php 
    Modal::begin([
            'header' => '',
            'id'     => 'modal',
            'size'   => 'modal-lg'
        ]);

    echo "<div id='modalContent'></div>";

    Modal::end();
    
    echo "<div id='bodyContent'>" . Html::hiddenInput('id_indicador', $dadosmes->idIndicador) . "</div>";
    ?>

	<?php Pjax::begin(['id' => 'registrosGrid']); ?>
	<?= GridView::widget([
			'dataProvider' => $dataProviderPlano,
			'pjax'         => true,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'item',
                'descricao_problema',
                'plano_acao',
                'responsavel',
                [
                    'attribute'      => 'abertura',
                    'format'         => ['date', 'php:d/m/Y'],

                ],
                [
                    'attribute'      => 'prazo',
                    'format'         => ['date', 'php:d/m/Y'],

                ],
                'status',

                ['class' => 'yii\grid\ActionColumn',
		        	'template' => '{update} {delete}',
		        		'buttons' => [
		        			'update' => function ($url, $model, $key) {
				                $options = [
				                    'title'      => Yii::t('yii', 'Atualizar'),
				                    'aria-label' => Yii::t('yii', 'Atualizar'),
				                    'data-pjax'  => '0',
				                    'class'      => 'btn btn-success btn-sm modalButton',
				                    'value' 	 => Url::to(BaseUrl::base() . '/planoacao/update?id=' . $model->idPlano)
				                ];
				                return Html::button('<i class="glyphicon glyphicon-pencil"></i>', $options);
				            },
				            'delete' => function ($url, $model, $key) {
				                $options = [
									'title'        => Yii::t('yii', 'Desativar'),
									'aria-label'   => Yii::t('yii', 'Desativar'),
									// 'data-confirm' => Yii::t('yii', 'Tem certeza que deseja excluir este item?'),
									'data-pjax'    => '0',
									'class'        => 'btn btn-danger btn-sm deleteButton',
									'value'        => Url::to(BaseUrl::base() . '/planoacao/delete?id=' . $model->idPlano)
				                ];
				                return Html::button('<i class="glyphicon glyphicon-trash"></i>', $options);
				            }
		        		]
		        ],
            ],
        ]); ?>
	<?php Pjax::end(); ?>
</div>