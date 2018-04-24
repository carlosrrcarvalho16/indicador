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
			<div class="col-md-2">
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
    		
    		<div class="col-md-2">
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
    <!--	<section class="content"> -->
		    <div class="row" id="departaments-dashboard">
		    	<?= Yii::$app->controller->renderPartial('_departamentos', ['departaments' => $departaments ,
                    'selectQtdDepartamentoPlanosAcao' =>  $selectQtdDepartamentoPlanosAcao ,
                    'Ano' => $ano,
                ]); ?>
		    </div>
    <!--	</section> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
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
<section class="content">
    <div class="row">
        <div class="col-md-5">
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
        <div class="col-md-5">
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

<script>
    var parmBackgroundColor = [<?php echo $backgroundColor; ?>];
    var parmBorderColor = [<?php echo $borderColorColor ; ?>];
    var parmData = [<?php echo $countAbertos .",". $countAtrasados; ?>];
    var pieOptions     = {
        //Boolean - Whether we should show a stroke on each segment
        segmentShowStroke    : true,
        //String - The colour of each segment stroke
        segmentStrokeColor   : '#fff',
        //Number - The width of each segment stroke
        segmentStrokeWidth   : 2,
        //Number - The percentage of the chart that we cut out of the middle
        percentageInnerCutout: 50, // This is 0 for Pie charts
        //Number - Amount of animation steps
        animationSteps       : 100,
        //String - Animation easing effect
        animationEasing      : 'easeOutBounce',
        //Boolean - Whether we animate the rotation of the Doughnut
        animateRotate        : true,
        //Boolean - Whether we animate scaling the Doughnut from the centre
        animateScale         : false,
        //Boolean - whether to make the chart responsive to window resizing
        responsive           : true,
        // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
        maintainAspectRatio  : true,
    }



    var ctx = document.getElementById("myChartNCatrazadas").getContext('2d');
    var myChartNCatrazadas = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['No praso','Atrasada'],
            // tooltipTemplate: '<%= 10 + "%" %>',
            datasets: [{
                // label: '# of Votes',
                data: parmData,
                backgroundColor: parmBackgroundColor,
                borderColor: parmBorderColor,
                borderWidth: 2
            }]
        },
        options: pieOptions,
    });


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
    	
    	addData(myChartNCatrazadas,[100,15], 0);
    	console.log(parmData);
    });

    function addData(chart, data, datasetIndex) {
   		chart.data.datasets[datasetIndex].data = data;
   		chart.update();
	};


</script>









	</div>
</div>
<?php ActiveForm::end(); ?>