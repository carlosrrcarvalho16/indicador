<?php

/* @var $this yii\web\View */
use yii\helpers\BaseUrl;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\models\Identity;
use yii\base\Widget;

$this->title = 'Indicadores';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Dashboard <?php echo $departament->departamento; ?>  </h3>
    </div>
	
    <div class="box-body">
    	<div class="row">
    		<div class='col-md-12' style="text-align: center;">
    			<h1><?php echo $departament->departamento; ?>  - <?php echo Yii::$app->formmat->strMonth(Yii::$app->session->get('MES_DASH'))?> - <?php echo Yii::$app->session->get('ANO_DASH');?></h1>
    		</div>
            <!--- aqui -->
            
            <?php 
	            $i=0;
	             foreach ($dados_mes as $value) {
                     //Verifica o [sentido]= 0 'Maior Melhor', [sentido]= 1 'Maior Pior'
                     if ($dados_mes[$i]['sentido'] == 0) {
                         //[sentido]= 0 'Maior Melhor'
                         $sentido = "title= 'Quanto maior melhor'";
                         $tipoSeta = 'fa-arrow-up';
                         //Verifica se o valor atual é maior ou igual a meta
                         if ($dados_mes[$i]['valor'] >= $dados_mes[$i]['meta']) {
                             $textVal = 'text-success';
                         }else{
                             $textVal = 'text-danger';
                         }

                     }else {
                         //[sentido]= 1 'Maior Pior'
                         $sentido = "title= 'Quanto menor melhor'";
                         $tipoSeta = 'fa-arrow-down';
                         //Verifica se o valor é menor que a meta
                         if ($dados_mes[$i]['valor'] <= $dados_mes[$i]['meta']){
                             $textVal = 'text-success';
                         }else{
                             $textVal = 'text-danger';
                         }
                     }

	             	
	            	$retVal = ($dados_mes[$i]['sentido'] == 0) ? "class= 'fa fa-arrow-up pr5 '" : "class= 'fa fa-arrow-down pr5  '";

	            	$tipoTooltip = $sentido;
	            	// Se o valor do mês
	            	$valorRetVal = ($dados_mes[$i]['valor'] ==null) ? 
	                    'S/Dados' : $dados_mes[$i]['valor'];
	                //Descrição
	                if ($dados_mes[$i]['descricao'] == 'NULL' ) {
	                    $descricao = "";
	                } else {  $descricao = $dados_mes[$i]['descricao']; }


	        ?>
                     <!-- Colocar form blão dos dados aqui -->
                     <div class="col-lg-4 col-xs-6">
                         <!-- small box -->
                         <div class="small-box bg-aqua">
                             <div class="inner" >
                                 <h3 class="<?php echo $textVal;?>"><?php echo $valorRetVal;?></h3>
                                 <p>
                                    <h4><?php echo substr($dados_mes[$i]['nome'], 0, 35) ?></h4>

                                 </p>
                                 <p><h4>Meta - <?php echo $dados_mes[$i]['meta']; ?> </h4></p>
                             </div>
                             <div class="icon">
                                 <i class="fa <?php echo $tipoSeta ;?> data-toggle="tooltip" data-placement="bottom"
                                 <?php echo $tipoTooltip ; ?>. ' melhor' <?php echo $retVal; ?>"></i> <!-- Tipo de seta -->
                             </div>
                             <a href="<?php echo BaseUrl::base()?>/grafico?id=<?php echo $dados_mes[$i]['ID Indicador'] ?>&nome= <?php echo $dados_mes[$i]['nome'] ;?>&desc=<?php echo $descricao; ?>"
                                class="small-box-footer">
                                 <?php echo (!empty($descricao) ? $descricao : 'S/ descrição');?>
                                 <i class="fa fa-arrow-circle-right"></i>
                             </a>
                         </div>
                     </div>

                     <!-- Colocar form blão dos dados aqui -->

	           <?php $i=$i+1;
	             } ?>
            <!--- fim aqui -->
    	</div>

		
	</div>
</div>