<?php

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TbDepartamentoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper; //criar Combo

$this->title = 'Relatório';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1>Relatório de plano de ações</h1>

<div class="tb-departaments-index box box-primary">
    <div class="box-header with-border">
        <?=

        Html::a('<i class="fa fa-hand-pointer-o"></i> Gerar PDF', ['report'], [
            'class'=>'btn btn-success btn-flat',
            'target'=>'_blank',
            'data-toggle'=>'tooltip',
            'title'=>'Irá abrir o arquivo PDF gerado em uma nova janela'
        ]);
        ?>
    </div>
    
    <div class="box-header">
        <h3 class="box-title">Lista de planos de ações</h3>
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                  
                  <th>Departamento</th>
                  <th>Indicador</th>
                  <th>Item</th>
                  <th>Descrição</th>
                  <th>Plano de ação</th>
                  <th>Responsável</th>
                  <th>Abertura</th>
                  <th>Prazo</th>
                  <th>Status</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            //var_dump($reportPlanoAcao);die;
                foreach($reportPlanoAcao as $reportPlanoAcao) {
                //$reportPlanoAcao = (object) $reportPlanoAcao; //força o tipo da variável
            ?>
                <tr>
                  
                  <td><?php echo $reportPlanoAcao['Departamento']; ?></td>
                  <td><?php echo $reportPlanoAcao['Indicador']; ?></td>
                  <td><?php echo $reportPlanoAcao['Item']; ?></td>
                  <td><?php echo $reportPlanoAcao['Descrição']; ?></td>
                  <td><?php echo $reportPlanoAcao['Plano']; ?></td>
                  <td><?php echo $reportPlanoAcao['Responsável']; ?></td>
                  <td><?php echo date('d/m/Y', strtotime($reportPlanoAcao['abertura'])); ?></td>
                  <td><?php echo date('d/m/Y', strtotime($reportPlanoAcao['prazo'])); ?></td>
                  <td><?php echo $reportPlanoAcao['Status']; ?></td>
                </tr>
            <?php 
                } 
            ?>
            </tbody>

        </table>
    </div>        
    </div>
</div>
<!-- DataTables -->

<script src="/dist/js/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/dist/js/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
  $(function () {
    $('#example1').DataTable()
  })
</script>
