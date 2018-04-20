<?php

/* @var $this yii\web\View */
use yii\helpers\BaseUrl;
?>
<!-- <section class="content"> -->
<?php
foreach($departaments as $departament) {
  $departament = (object) $departament; //força o tipo da variável
?>
<?php $percent = (($departament->qtd_preenchida)/($departament->qtd_ind));
      $percent = intval($percent * 100);
?>
<div class="col-md-5 col-sm-4 col-xs-10">
  <div class="info-box bg-aqua">
    <span class="info-box-icon">
      <i class="fa <?php echo $departament->icons; ?>"></i>
    </span>
    <div class="info-box-content">
      <span class="info-box-text">
            <div class="col-md-2 col-sm-2 col-xs-10"><i class="fa fa-fw fa-thumbs-up text-success "></i>

                <?php echo $departament->Dentro; ?>

            </div>
            <div class="col-md-2 col-sm-2 col-xs-10"><i class="fa fa-fw fa-thumbs-down text-danger"></i>
                <?php echo $departament->Fora; ?>
            </div>
            <h3><?php echo $departament->departamento; ?></h3>
      </span>

      <span class="info-box-number"><?php echo $departament->qtd_preenchida; ?> / <?php echo $departament->qtd_ind; ?> - <?php echo $percent ;?>% Preenchido(s)</span>

    <div class="progress">            
      <div class="progress-bar" style="width: <?php echo $percent; ?>%"></div>
    </div>  
      <a href="<?php echo BaseUrl::base()?>/departament?id=<?php echo $departament->id ?>" class="small-box-footer">Ver Indicadores <i class="fa fa-arrow-circle-right"></i></a>
    </div>
    <!-- /.info-box-content -->
  </div>
  <!-- /.info-box -->

</div>




<?php } 
?>

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

<!-- /.row -->
<!-- </section> -->

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

    console.log('teste charts');

</script>

