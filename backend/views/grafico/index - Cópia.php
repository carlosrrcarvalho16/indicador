<?php

/* @var $this yii\web\View */
use yii\helpers\BaseUrl;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\models\Identity;


$this->title = 'Dashboard Grafico';
$this->params['breadcrumbs'][] = $this->title;

$meses = array (1 => "Jan", 2 => "Fev", 3 => "Mar", 4 => "Abr", 5 => "Mai", 6 => "Jun", 7 => "Jul", 8 => "Ago", 9 => "Set", 10 => "Out", 11 => "Nov", 12 => "Dez");
?>

<div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Gráfico - <?php echo $vNome; ?></h3>
    </div>

    <br>

    <div class="row"> <!--tr-->
  		<div class="col-md-6">  <!--td-->
            <!-- BAR CHART -->
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Gráfico dos meses</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <div class="chart">
                  <canvas id="barChart" style="height: 198px; width: 471px;" width="471" height="198"></canvas>
                </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
      </div>
      <div class="col-md-6">  <!--td-->
        

      </div>

    </div>

</div>

<?php 

$script = <<< JS

$(function () {
  var areaChartData = {
      labels  : ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul' , 'Ago' , 'Set' , 'Out', 'Nov' , 'Dez'],
      datasets: [
        {
          type                : "bar",
          label               : 'Electronics',
          fillColor           : '#3c4dbc',
          strokeColor         : '#3c4dbc',
          pointColor          : '#3c4dbc',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#3c4dbc',
          data                : [65, 59, 80, 66, 56, 55, 40, 75, 81, 56, 100, 99]
        },
        { 
          type                : "line",
          label               : 'Digital Goods',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [80, 80, 80, 80, 80, 80, 80, 80, 80 , 80, 80 , 80]
        }
      ]
    }

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData
    barChartData.datasets[1].fillColor   = '#00a65a'
    barChartData.datasets[1].strokeColor = '#00a65a'
    barChartData.datasets[1].pointColor  = '#00a65a'
    var barChartOptions                  = {
      //Boolean - Se a escala deve começar em zero ou uma ordem de magnitude abaixo do valor mais baixo
      scaleBeginAtZero        : true,
      //Boolean - Se as linhas de grade são mostradas no gráfico
      scaleShowGridLines      : true,
      //String - Cor das linhas de grade
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Largura das linhas de grade
      scaleGridLineWidth      : 1,
      //Boolean - Se deve mostrar linhas horizontais (exceto o eixo X)
      scaleShowHorizontalLines: true,
      //Boolean - Se deve mostrar linhas verticais (exceto o eixo Y)
      scaleShowVerticalLines  : true,
      //Boolean - Se houver um traço em cada barra
      barShowStroke           : true,
      //Number - Largura do pixel do traçado da barra
      barStrokeWidth          : 2,
      //Number - Espaçamento entre cada um dos conjuntos de valores X
      barValueSpacing         : 5,
      //Number - Espaçamento entre conjuntos de dados dentro de valores X
      barDatasetSpacing       : 1,
      //String - Um modelo de legenda
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - seja para tornar o gráfico responsivo
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)
})  
JS;

$this->registerJS($script);
?>



