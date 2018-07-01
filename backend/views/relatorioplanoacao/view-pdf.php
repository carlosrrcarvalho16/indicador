<?php

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TbDepartamentoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper; //criar Combo
$tempDepartamento = '';
$now = date("Y-m-d");
$this->title = 'Relatório';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1 style="text-align: center;">Relatório de plano de ações</h1>
<hr />
<div class="tb-departaments-index box box-primary">
    <?php 
        foreach($reportPlanoAcao as $reportPlanoAcao) {
            if ($reportPlanoAcao['Status']=='Aberto') {
                $prazo =  ($reportPlanoAcao['prazo']);
                if ($tempDepartamento <> $reportPlanoAcao['Departamento']) {
                    $tempDepartamento = $reportPlanoAcao['Departamento'];
                ?>
                <p><strong><h2>Departamento:</strong> <span style="text-decoration: underline;">
                <em><small><?php echo $reportPlanoAcao['Departamento']; ?></small></em></span></h2></p>
                <?php
                } 
        ?>
            
            <p>
                <h3>
                    <strong>Indicador:</strong> 
                        <small><?php echo $reportPlanoAcao['Indicador']; ?></small>
                </h3>
            </p>
            <ul>
            <li>Item: <?php echo $reportPlanoAcao['Item']; ?></li>
            <li>Descrição: <?php echo $reportPlanoAcao['Descrição']; ?></li>
            <li>Plano de ação: <?php echo $reportPlanoAcao['Plano']; ?></li>
            <li>Responsável: <?php echo $reportPlanoAcao['Responsável']; ?></li>
            <li>Data da Abertura: <?php echo date('d/m/Y', strtotime($reportPlanoAcao['abertura'])); ?></li>
            <?php
                if ($now <= $prazo ) { 
                   
            ?>
                <li>Prazo: <?php echo date('d/m/Y', strtotime($reportPlanoAcao['prazo'])) ; ?></li>    
            <?php
                 } else { ?>
                    <li><span style="background-color: #ff0000;">Prazo: <?php echo date('d/m/Y', strtotime($reportPlanoAcao['prazo'])); ?></span></li>
            <?php    
                }
            ?>
            <li>Status: <?php echo $reportPlanoAcao['Status']; ?></li>
            </ul>
            
    <?php 
            }
        } 
    ?>
</div>

