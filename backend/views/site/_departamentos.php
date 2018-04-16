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

<!-- Small boxes (Stat box) -->
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <!-- DONUT CHART -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Planos de ação atrasados</h3>
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
        </div>
        </div>
    </div>
</section>

<!-- /.row -->
<!-- </section> -->

<script>


    var ctx = document.getElementById("myChartNCatrazadas").getContext('2d');
    var myChartNCatrazadas = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['No praso','Atrasada'],
            tooltipTemplate: '<%= 10 + "%" %>',
            datasets: [{
                label: '# of Votes',
                data: [25, 5],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(249,33,55,0.6)',


                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(249,33,55,1)',


                ],
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
    });

</script>

