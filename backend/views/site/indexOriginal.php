<?php

/* @var $this yii\web\View */
use yii\helpers\BaseUrl;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\models\Identity;

$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(); ?>
<section class="content" id: "content1">
    <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Dashboard</h3>
      </div>
      
      <div class="box-body">
         <div class="row">
          <div class='col-md-12' style="text-align: center;">
           <h1>Indicadores Consolidados</h1>	
       </div>
   </div>

   <div class="row">
       <div class="col-md-2 col-sm-6">
        <div class="form-group">
            <select name="ano" id="ano-dashboard" class="form-control" onselect="anodashboard()">
                <?php
                $anos = [2018,2017,2016,2015];

                for($i=0;$i < count($anos) ;$i++){ ?>
                  <option value="<?php echo $anos[$i]?>"  <?= ($anos[$i] == $ano ? ' selected' : '')?>>
                   <?php echo $anos[$i]; ?>
               </option>
           <?php } ?>
       </select>
   </div>
</div>

<div class="col-md-2 col-sm-6">
    
   <div class="form-group">
    <select name="mes" id="mes-dashboard" class="form-control">
        <?php
        $meses = array (1 => "Janeiro", 2 => "Fevereiro", 3 => "Março", 4 => "Abril", 5 => "Maio", 6 => "Junho", 7 => "Julho", 8 => "Agosto", 9 => "Setembro", 10 => "Outubro", 11 => "Novembro", 12 => "Dezembro");

        for($i=1;$i <=12;$i++){ ?>
          <option value="<?php echo $i?>" <?= ($i == $mes ? ' selected' : '')?>>
           <?php
           echo $meses["$i"];
           ?>
       </option>
   <?php } ?>
</select>
</div>
</div>
</div>

<div class="row" id="departaments-dashboard">
   <?= Yii::$app->controller->renderPartial('_departamentos', ['departaments' => $departaments ,
    'selectQtdDepartamentoPlanosAcao' =>  $selectQtdDepartamentoPlanosAcao ,
    'Ano' => $ano,
]); ?>
</div>
<!--	</section> -->

<!-- Inicio da tratativa dos graficos dos planos de ações-->
<?php

// $this->registerJsFile("https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js");

//Cores do grafico
$backgroundColorGood    = "'rgba(54, 162, 235, 0.5)',";
$backgroundColorBad     = "'rgba(249,33,55,0.6)',";
$backgroundColor        =  $backgroundColorGood . $backgroundColorBad;
$borderColorGood        = "'rgba(54, 162, 235, 1)'," ;
$borderColorBad         = "'rgba(249,33,55,1)',";
$borderColorColor       = $borderColorGood . $borderColorBad;
$planosAbertos          = 0;
$planosAtrasadas        = 0;


//Dados do grafico de planos de ação por departamento
$parLabel                   = "";
$parDataAtrazadas           = "";
$backgroundColorGoodBar     = "";
$borderColorGoodBar         = "";
$backgroundColorBadBar      = "";
$borderColorBadBar          = "";
$parTotalAtrasados          = "";
$parTotalAbertos            = "";
$countAbertos             = 0 ;
$countAtrasados             = 0 ;

$i=0;
foreach ($selectQtdDepartamentoPlanosAcao as $value) {
    $parTotalAtrasados .= $selectQtdDepartamentoPlanosAcao[$i]['TotalAtrasados'] .",";
    $parTotalAbertos .= $selectQtdDepartamentoPlanosAcao[$i]['TotalAbertos'] . ",";
    $parLabel .=  "'" . $selectQtdDepartamentoPlanosAcao[$i]['departamento'] . "',";

    $countAbertos =  $countAbertos +  intval($selectQtdDepartamentoPlanosAcao[$i]['TotalAbertos']);
    $countAtrasados = $countAtrasados + intval($selectQtdDepartamentoPlanosAcao[$i]['TotalAtrasados']);
    $backgroundColorGoodBar .= $backgroundColorGood ;
    $borderColorGoodBar     .= $borderColorGood ;
    $backgroundColorBadBar  .= $backgroundColorBad ;
    $borderColorBadBar     .= $borderColorBad ;
    $borderColorBadBar      .= $borderColorGood;


    $i=$i+1;
}

?>
<!-- Small boxes (Stat box) -->
<script src="/plugins/chartjs/Chart.js"></script>
<script src="/plugins/chartjs/Chart.bundle.js"></script>
<div class="row">      

    <!-- <section class="content"> -->
        <div class="row">
            <div class="col-md-6">
                <!-- DONUT CHART -->
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Status dos planos de ação</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <canvas id="myChartNCatrazadas" style="height:250px"></canvas>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <!-- DONUT CHART -->
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Planos de ação por departamento</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <canvas id="myChart" style="height:250px"></canvas>
                    </div>
                </div>

            </div>
        </div>
    </section> 
</div>
<?php $Percentual = Yii::$app->system->valorPercentual($countAtrasados,$countAbertos );
$Percentual =$Percentual . "%"
?>
<script>
    //-------------
    //- Pie CHART -
    //-------------
    var parmBackgroundColor = [<?php echo $backgroundColor; ?>];
    var parmBorderColor = [<?php echo $borderColorColor ; ?>];
    var parmData = [<?php echo $countAbertos .",". $countAtrasados; ?>];
    var parmPercent = [ <?php 
        echo '"' . $Percentual .'"';
        ?>];
    //Teste chart
    Chart.pluginService.register({
        beforeDraw: function (chart) {
            if (chart.config.options.elements.center) {
        //Get ctx from string
        var ctx = chart.chart.ctx;
        
        //Get options from the center object in options
        var centerConfig = chart.config.options.elements.center;
        var fontStyle = centerConfig.fontStyle || 'Arial';
        var txt = centerConfig.text;
        var color = centerConfig.color || '#000';
        var sidePadding = centerConfig.sidePadding || 20;
        var sidePaddingCalculated = (sidePadding/100) * (chart.innerRadius * 2)
        //Start with a base font of 30px
        ctx.font = "30px " + fontStyle;
        
        //Get the width of the string and also the width of the element minus 10 to give it 5px side padding
        var stringWidth = ctx.measureText(txt).width;
        var elementWidth = (chart.innerRadius * 2) - sidePaddingCalculated;

        // Find out how much the font can grow in width.
        var widthRatio = elementWidth / stringWidth;
        var newFontSize = Math.floor(30 * widthRatio);
        var elementHeight = (chart.innerRadius * 2);

        // Pick a new font size so it will not be larger than the height of label.
        var fontSizeToUse = Math.min(newFontSize, elementHeight);

                //Set font settings to draw it correctly.
                ctx.textAlign = 'center';
                ctx.textBaseline = 'middle';
                var centerX = ((chart.chartArea.left + chart.chartArea.right) / 2);
                var centerY = ((chart.chartArea.top + chart.chartArea.bottom) / 2);
                ctx.font = fontSizeToUse+"px " + fontStyle;
                ctx.fillStyle = color;
                
        //Draw text in center
        ctx.fillText(txt, centerX, centerY);
    }
}
});


    var config = {
        type: 'doughnut',
        data: {
            labels: ['No praso','Atrasada'],
            datasets: [{
                data: parmData,
                backgroundColor:parmBackgroundColor,
                hoverBackgroundColor: parmBorderColor,
                borderWidth: 2
            }]
        },
        options: {
            elements: {
                center: {
                    text: parmPercent,
          color: parmBackgroundColor, // Default is #000000
          fontStyle: 'Arial', // Default is Arial
          sidePadding: 20 // Defualt is 20 (as a percentage)
      }
  }
}
};


var ctx = document.getElementById("myChartNCatrazadas").getContext("2d");
var myChartNCatrazadas = new Chart(ctx, config);
    //Fim do teste

    //-------------
    //- BAR CHART -
    //-------------
    var parmBackgroundColorBar = [<?php echo $backgroundColorGoodBar; ?>];
    var parmBorderColorGoodBar = [<?php echo $borderColorGoodBar; ?>];
    var parmBackgroundColorBadBar = [<?php echo $backgroundColorBadBar; ?>];
    var parmBorderColorBadBar = [<?php echo $borderColorBadBar ; ?>];
    var parmLabelBar = [<?php echo $parLabel ; ?>];
    var parmDataBarGood = [<?php echo $parTotalAbertos ; ?>];
    var parmDataBarBad = [<?php echo $parTotalAtrasados ; ?>];
    var parmLabel = [<?php echo $parLabel ; ?>];

    

    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
     
        type: 'horizontalBar',
        data: {
            labels: parmLabelBar,
            datasets: [
            {
              label: "No praso",
              backgroundColor: parmBackgroundColorBar,
              borderColor: parmBorderColorGoodBar ,
              
              borderWidth: 2,
              data: parmDataBarGood
          }, {
              label: "Atrasada",
              backgroundColor: parmBackgroundColorBadBar,
              borderColor: parmBorderColorBadBar,
              data: parmDataBarBad
          }
          ]
      },
      options: barChartOptions
  });



    var barChartOptions                  = {
        //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
        scaleBeginAtZero        : true,
        //Boolean - Whether grid lines are shown across the chart
        scaleShowGridLines      : true,
        //String - Colour of the grid lines
        scaleGridLineColor      : 'rgba(0,0,0,.05)',
        //Number - Width of the grid lines
        scaleGridLineWidth      : 1,
        //Boolean - Whether to show horizontal lines (except X axis)
        scaleShowHorizontalLines: true,
        //Boolean - Whether to show vertical lines (except Y axis)
        scaleShowVerticalLines  : true,
        //Boolean - If there is a stroke on each bar
        barShowStroke           : true,
        //Number - Pixel width of the bar stroke
        barStrokeWidth          : 2,
        //Number - Spacing between each of the X value sets
        barValueSpacing         : 5,
        //Number - Spacing between data sets within X values
        barDatasetSpacing       : 1,
        //Boolean - whether to make the chart responsive
        responsive              : true,
        maintainAspectRatio     : true,
    }

   //Quando clicar no combobox Ano, atualiza os dados
   // Selecionamos o menu dropdown, que possui os valores possíveis:
   var menu_dropdown_ano = document.getElementById("ano-dashboard");
   menu_dropdown_ano.addEventListener("change", function(){
    window.location.reload();
    //	addData(myChartNCatrazadas,[100,15], 0);
    // 	console.log(parmData);
});

   function addData(chart, data, datasetIndex) {
     chart.data.datasets[datasetIndex].data = data;
     chart.update();
 };

 
</script>









</div>
</div>
<?php ActiveForm::end(); ?>