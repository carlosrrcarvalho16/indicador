<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper; //criar Combo
use yii\widgets\Pjax;
use yii\helpers\BaseUrl;




/* @var $this yii\web\View */
/* @var $searchModel backend\models\TbDadosmesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dados do mês';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Dados do mês</h3>
    </div>
    <div class="row">
        <div class="col-md-3" style="margin-left: 15px;">
            <div class="form-group">   
                <label class="control-label">Departamento</label>
                <select name="form-dep" id="departamento-dadosmes" class="form-control" onchange='document.location.href="../dadosmes?dep="+this.value+"" ';>
                    <option selected="selected">Selecione ...</option>
                    <?php  
                        for($i=0;$i < count($departamentos) ;$i++){ ?>
                            <option value="<?php echo $departamentos[$i]['id']?>" <?= ($departamentos[$i]['id'] == $idDep ? ' selected' : '')?>>
                                <?php echo $departamentos[$i]['departamento']; ?>
                            </option>
                            
                        <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">   
                <label class="control-label">Indicador</label>
                <select class="form-control" name="ind" id="ind" onchange='document.location.href="../dadosmes?ind="+this.value+"&dep=<?=$_GET['dep']?>" ';>
                    <option selected="selected">Selecione ...</option>
                    <?php
                        for($i=0;$i < count($indicadores) ;$i++){ ?>
                            <option value="<?php echo $indicadores[$i]['id']?>"  
                                <?= ($indicadores[$i]['id'] == $idInd ? ' selected' : '')?>>
                                <?php echo $indicadores[$i]['nome']; ?>
                            </option>
                        <?php } ?>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="tb-dadosmes-index box box-primary">
<!--
    <div class="box-header with-border">
        // Html::a('Create Tb Dadosmes', ['create'], ['class' => 'btn btn-success btn-flat'])
    </div>
 -->
    <div class="box-body table-responsive no-padding">
        

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?php
       
        $meses = array(
                1=> 'Janeiro',
                2=> 'Fevereiro',
                3=> 'Março',
                4=> 'Abril',
                5=> 'Maio',
                6=> 'Junho',
                7=> 'Julho',
                8=> 'Agosto',
                9=> 'Setembro',
                10=> 'Outubro',
                11=> 'Novembro',
                12=> 'Dezembro',
                );



      /*
         $value = ArrayHelper::getValue($meses, ['id' => '12']);
         echo $value;
         die;
*/
        ?>
       <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'rowOptions' => function($model, $key, $index, $column){
                if($index % 2 == 0){
                    return ['class' => 'info'];
                }
            },
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'idIndicador',
                    'value'     => 'indicador.nome',
                    'label'     => 'Indicador',
                    'filter' => ArrayHelper::map(backend\models\TbIndicador::find()->all(), 'id', 'nome')
                ],
                'ano',
                [
                    'attribute' => 'mes',
                    'value' => 'mesText'
                ],
                'valor',
                'meta',
               /* [
                    'attribute' => 'valor',
                    'label' => 'valor',
                    'options' => [ 'style' => 'valor'=='meta' ? 'background-color:#5544EA':'background-color:#DA4557'],
                ],*/


                ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {update}'],
            ],
        ]); ?>
    </div>
</div>
</div>

