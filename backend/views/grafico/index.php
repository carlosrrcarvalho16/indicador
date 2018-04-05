<?php

/* @var $this yii\web\View */
use yii\helpers\BaseUrl;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\models\Identity;


$this->title = 'Dashboard Grafico';
$this->params['breadcrumbs'][] = $this->title;

//Cores do grafico
$backgroundColorGood  = "'rgba(35, 156, 222, 0.7)',";
$backgroundColorBad   = "'rgba(248, 44, 8, 0.7)',";
$backgroundColorMeta  = "'rgba(84, 233, 20, 0.5)',";
$backgroundColor      = "";
$dadosMes             = "";
$metaMes              = "";
$metaCor              = "";
$rotuloAno            = "";
$valorYTD             = "";


$dadosMes="";
for($i=0;$i <=11;$i++){
  //Meta do mês
  $metaMes .=  $graficoMes[$i]['meta'] . "," ; 
  //Cor da meta
  $metaCor  .= $backgroundColorMeta;
  
  //Verifica se o valor não é null
  if (is_null($graficoMes[$i]['valor'])== false) {
    $dadosMes .=  $graficoMes[$i]['valor'] . "," ;    
    //Verifica o [sentido]= 0 'Maior Melhor', [sentido]= 1 'Maior Pior'
    if ($graficoMes[$i]['sentido'] == 0) {
      //Verifica se o valor é maior ou igual a meta
      if ($graficoMes[$i]['valor'] >= $graficoMes[$i]['meta']) {
        $backgroundColor .= $backgroundColorGood;
      } else {
        $backgroundColor .= $backgroundColorBad;
      }
    } else {
      //Verifica se o valor é menor que a meta
      if ($graficoMes[$i]['valor'] <= $graficoMes[$i]['meta']) {
        $backgroundColor .= $backgroundColorGood;
      } else {
        $backgroundColor .= $backgroundColorBad;
      }   
    }
  }  
}
//Dados dos anos
 $j = 0;
foreach ($graficoYTD as $value) { 
  $rotuloAno .= $graficoYTD[$j]['ano'] .",";
  $valorYTD .= $graficoYTD[$j]['ytd'] .",";
  $j = $j+1 ;
  
}
// Dados dos planos de ações


?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
<div class="row">
  <div class="col-md-4"> 
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Anual</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          </button>
        </div>
      </div>
      <div class="box-body">
        <div class="chart"> <!--
          <canvas id="myChartAno" style="height: 198px; width: 471px;" width="471" height="198"></canvas> -->
          <canvas id="myChartAno" style="height:230px"></canvas>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6"> 
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Meses do ano</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          </button>
        </div>
      </div>
      <div class="box-body">
        <div class="chart"> <!--
          <canvas id="myChart" style="height: 198px; width: 471px;" width="471" height="198"></canvas> -->
          <canvas id="myChart" style="height:230px"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Planos de ações</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                  <th>Item</th>
                  <th>Descrição do Problema</th>
                  <th>Plano de ação</th>
                  <th>Responsável</th>
                  <th>Dt. Abertura</th>
                  <th>Dt. Limite</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                  <td>1</td>
                  <td>Não tem projeto de amortecimentos de água</td>
                  <td>Realizar o projeto de amortecimento da água</td>
                  <td>Marcio G</td>
                  <td><?php
                      $date = date_create('2015-02-20 00:00:00');
                      echo date_format($date, 'd-m-Y');
                      ?>
                  </td>
                  <td><?php
                      $date = date_create('2019-10-20');
                      echo date_format($date, 'd-m-Y');
                      ?>
                  </td>
                  <td>Aberto</td>
                </tr>
                <!-- aqui -->
                <tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
<tr>
  <td>1</td>
  <td>Não tem projeto de amortecimentos de água</td>
  <td>Realizar o projeto de amortecimento da água</td>
  <td>Marcio G</td>
  <td><?php
    $date = date_create('2015-02-20 00:00:00');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td><?php
    $date = date_create('2019-10-20');
    echo date_format($date, 'd-m-Y');
    ?>
  </td>
  <td>Aberto</td>
</tr>
                </tbody>   
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

  </div>
</section>



<!-- https://www.youtube.com/watch?v=E3MvLffU928 -->
<script> 
var ctx = document.getElementById("myChart").getContext('2d');
var ctxAno = document.getElementById("myChartAno").getContext('2d');
var paramMeses = ["Jan","Fev","Mar","Abr"," Mai","Jun","Jul","Ago","Set","Out","Nov","Dez"];
var parmValoresMes = [<?php echo $dadosMes;?>];
var parmBorderColor = [<?php echo $backgroundColor; ?>];
var parmMetaMes = [<?php echo $metaMes;?>];
var parmBorderColorMeta = [<?php echo $metaCor;?>];
var parmValoresYTD = [<?php echo $valorYTD;?>];
var paramAno = [<?php echo $rotuloAno;?>];
var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: paramMeses,
            datasets: [{
              label: '<?php echo $vNome; ?>',
              fill: true, 
              data: parmValoresMes,
              backgroundColor: parmBorderColor,
              borderColor: parmBorderColor,
              borderWidth: 1
            },{
          label: 'Meta',
          data: parmMetaMes,
          backgroundColor: parmBorderColorMeta,
          borderColor: parmBorderColorMeta,
          pointBorderWidth:1,
          fill: false,
          tension: 0.4,
          showLine: true,
          type: 'line'
        }]
          },
          options: {
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero:true
                }
              }]
            }
          }
        },{

        }
        );
//Grafico dos anos (YTD)
var myChartAno = new Chart(ctxAno, {
          type: 'bar',
          data: {
            labels: paramAno,
            datasets: [{
              label: 'Anos anteriores e YTD',
              fill: true, 
              data: parmValoresYTD,
              backgroundColor: ['rgba(35, 156, 222, 0.7)','rgba(35, 156, 222, 0.7)','rgba(35, 156, 222, 0.7)','rgba(35, 156, 222, 0.7)',],
              borderColor: ['rgba(35, 156, 222, 0.7)','rgba(35, 156, 222, 0.7)','rgba(35, 156, 222, 0.7)','rgba(35, 156, 222, 0.7)',],
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero:true
                }
              }]
            }
          }
        },{

        }
        );
</script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>



