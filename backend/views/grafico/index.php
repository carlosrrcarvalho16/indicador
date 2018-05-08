<?php

/* @var $this yii\web\View */
use yii\helpers\BaseUrl;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\models\Identity;
use yii\grid\GridView;



$this->title = 'Gráficos';
$this->params['breadcrumbs'][] = ['label' => 'Indicadores', 'url' => [ BaseUrl::base() . '/departament?id=' . $departamentoID]];
$this->params['breadcrumbs'][] = $this->title;


//Cores do grafico
$backgroundColorGood  = "'rgba(77, 152, 245, 0.7)',"; //"'rgba(35, 156, 222, 1)',"
$backgroundColorBad   = "'rgba(248, 44, 8, 0.7)',";
$borderColorGood      = "'rgba(77, 152, 245, 0.9)',";
$borderColorBad       = "'rgba(248, 44, 8, 1)',";
$backgroundColorMeta  = "'rgba(84, 233, 20,1)',";
$backgroundColor      = "";
$borderColorColor     ="";
$dadosMes             = "";
$metaMes              = "";
$metaCor              = "";
$rotulAno             = "";
$valorYTD             = "";
$descricao             ="";



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
          $borderColorColor .= $borderColorGood ;
      } else {
          $backgroundColor .= $backgroundColorBad;
          $borderColorColor .= $borderColorBad ;
      }
    } else {
      //Verifica se o valor é menor que a meta
      if ($graficoMes[$i]['valor'] <= $graficoMes[$i]['meta']) {
          $backgroundColor .= $backgroundColorGood;
          $borderColorColor .= $borderColorGood ;
      } else {
          $backgroundColor .= $backgroundColorBad;
          $borderColorColor .= $borderColorBad ;
      }   
    }
  }  
}
//Dados dos anos
 $j = 0;
foreach ($graficoYTD as $value) { 
  $rotulAno .= $graficoYTD[$j]['ano'] .",";
  $valorYTD .= $graficoYTD[$j]['ytd'] .",";
  $j = $j+1 ;
  
}
// Dados dos planos de ações


?>
<?php $form = ActiveForm::begin(); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>

<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Gráficos - <?php echo $vNome; ?> </h3>
  </div>

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
    <div class="col-md-8">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Mensal</h3>
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
            <h3 class="box-title">Planos de ações abertos</h3>
          </div>
          <!-- /.box-header -->
            <div class="box-tools pull-right">
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
          <div class="box-body">

            <?= GridView::widget([
              'dataProvider' => $dataProviderPlanoAcao,
              // 'filterModel'  => $searchModelPlanoAcao,
              'summary'      => "Listando {begin} - {end} de {totalCount} itens",
              'emptyText'    => 'Nenhum registro encontrado',
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
                      [
                        'label' => 'Percentual',
                        'format'         => 'raw', 
                        'value'=> function ($data) {
                          $percentual = Yii::$app->system->calcPercentual($data->prazo, $data->abertura);
                          return '<div class="progress active" style="border: 1px solid #333; border-radius: 5px">
                                  <div class="progress-bar progress-bar-'.($percentual > 75 ? ($percentual > 100 ? 'red' : 'yellow') : 'green').'" role="progressbar" aria-valuenow="'.$percentual.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$percentual.'%">'.$percentual.'%
                                    <span class="sr-only">'.$percentual.'% Complete</span>
                                  </div>
                                </div>';
                        },                       
                      ],
              ],
          ]); ?>

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
  </div>
      <div class="row">
          <div class="col-xs-12">
              <div class="box">
                  <div class="box-header">
                      <h3 class="box-title">Histórico - Planos de ações fechados</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-tools pull-right">
                      <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                          </button>
                          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                          </button>
                      </div>
                  </div>
                  <div class="box-body">
                      <?= GridView::widget([
                          'dataProvider' => $dataProviderPlanoAcaoClosed,
                          //'filterModel'  => $searchModelPlanoAcao,
                          'summary'      => "Listando {begin} - {end} de {totalCount} itens",
                          'emptyText'    => 'Nenhum registro encontrado',
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

                          ],
                      ]); ?>
                  </div>
                  <!-- /.box-body -->
              </div>
              <!-- /.box -->
          </div>
      </div>
</section>


<?php ActiveForm::end(); ?>

<!-- https://www.youtube.com/watch?v=E3MvLffU928 -->
<script> 
var ctx = document.getElementById("myChart").getContext('2d');
var ctxAno = document.getElementById("myChartAno").getContext('2d');
var paramMeses = ["Jan","Fev","Mar","Abr"," Mai","Jun","Jul","Ago","Set","Out","Nov","Dez"];
var parmValoresMes = [<?php echo $dadosMes;?>];
var parmBackgroundColor = [<?php echo $backgroundColor; ?>];
var parmBorderColor = [<?php echo $borderColorColor ; ?>];
var parmMetaMes = [<?php echo $metaMes;?>];
var parmBorderColorMeta = [<?php echo $metaCor;?>];
var parmValoresYTD = [<?php echo $valorYTD;?>];
var paramAno = [<?php echo $rotulAno;?>];
var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: paramMeses,
            datasets: [{
              label: '<?php echo $vNome; ?>',
              fill: true, 
              data: parmValoresMes,
              backgroundColor: parmBackgroundColor,
              borderColor: parmBorderColor,
              borderWidth: 3,

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
              animation: {
                duration: 1000,
                xAxis: true,
                yAxis: true,
        },
              scales: {
                  yAxes:[{
                      ticks:{
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
              label: 'YTD',
              fill: true, 
              data: parmValoresYTD,
              backgroundColor: ['rgba(35, 111, 210, 0.7)','rgba(35, 111, 210, 0.7)','rgba(35, 111, 210, 0.7)','rgba(35, 111, 210, 0.7)',],
              borderColor: ['rgba(11, 35, 227, 0.8)','rgba(11, 35, 227, 0.8)','rgba(11, 35, 227, 0.8)','rgba(11, 35, 227, 0.8)',],
              borderWidth: 1
            }]
          },

        },{
        options: {

            scales: {
                yAxes:[{
                    ticks:{
                        beginAtZero:true
                    }
                }]
            }
        }

        }
        );
</script>



