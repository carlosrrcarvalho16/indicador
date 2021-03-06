<?php

/* @var $this yii\web\View */
use yii\helpers\BaseUrl;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\models\Identity;
use yii\base\Widget;

$this->title = 'Dashboard Departamento';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Dashboard Departamento</h3>
    </div>
	
    <div class="box-body">
    	<div class="row">
    		<div class='col-md-12' style="text-align: center;">
    			<h1><?php echo $departament->departamento; ?> - <?php echo Yii::$app->session->get('ANO_DASH');?> - <?php echo Yii::$app->formmat->strMonth(Yii::$app->session->get('MES_DASH'))?></h1>
    		</div>
            <!--- aqui -->
            
            <?php 
	            $i=0;
	             foreach ($dados_mes as $value) {
	             	//Verifica o [sentido]= 0 'Maior Melhor', [sentido]= 1 'Maior Pior'
	             	if ($dados_mes[$i]['sentido'] == 0) {
	             		//Verifica se o valor é maior ou igual a meta
	             		if ($dados_mes[$i]['valor'] >= $dados_mes[$i]['meta']) {
	             			$textVal = 'text-success';
	             		}else{
	             			$textVal = 'text-danger';
	             		}
	             	}else{
	             		//Verifica se o valor é menor que a meta
	             		if ($dados_mes[$i]['valor'] <= $dados_mes[$i]['meta']){
	             			$textVal = 'text-success';
	             		}else{
	             			$textVal = 'text-danger';
	             		}

	             	}
	             	// Verifica se está na dentro da meta
	             	//$textVal = ($dados_mes[$i]['valor'] >= $dados_mes[$i]['meta']) ? 'text-warning' : 'text-success';
	             	//Define o tipo de seta e a mensagem Tooltip
	            	$retVal = ($dados_mes[$i]['sentido'] == 0) ? "class= 'fa fa-arrow-up pr5 $textVal'" : "class= 'fa fa-arrow-down pr5 $textVal '";
	            	$tipoTooltip = ($dados_mes[$i]['sentido']==0) ? "title= 'Quanto maior melhor'": "title= 'Quanto menor melhor'";
	            	// Se o valor do mês
	            	$valorRetVal = ($dados_mes[$i]['valor'] ==null) ? 
	                    'Não preenchido' : $dados_mes[$i]['valor'];
	                //Descrição
	                if ($dados_mes[$i]['descricao'] == 'NULL' ) {
	                    $descricao = "";
	                } else {  $descricao = $dados_mes[$i]['descricao']; }
//print_r($dados_mes);die;
	        ?>
	             
	            <div class="col-sm-4 col-xl-3">
	                <div  class="panel panel-tile text-center br-a br-grey "> 
	                    <div class="panel-body ">
	                        <div >
	                            <b>
	                            	<?php echo substr($dados_mes[$i]['nome'], 0, 35) ?>
	                            	
	                            </b>
	                        </div>

		                        <h1 class="fs30 mt5 mbn <?php echo $textVal?>">
		                        	<b>
		                        		<?php
		                        			 echo $valorRetVal;
		                        		?>
		                        	</b>
		                        </h1>
	                        
	                            <h3 class="text-system">
	                                <i data-toggle="tooltip" data-placement="bottom" 
	                                 <?php echo $tipoTooltip ; ?>. ' melhor' <?php echo $retVal; ?> > <!-- -->
	                                </i>
	                            Meta <?php echo $dados_mes[$i]['meta']; ?>
	                        </h3>
	                    </div>
	                    <div class="panel-footer br-t p14">
	                        <span class="fs11">
	                            <a href="<?php echo BaseUrl::base()?>/grafico?id=<?php echo $dados_mes[$i]['ID Indicador'] ?>&nome= <?php echo $dados_mes[$i]['nome'] ;?>&desc=<?php echo $descricao; ?>"
	                             class="small-box-footer"> <b><?php echo (!empty($descricao) ? $descricao : 'S/ descrição');?></b> </a>

	                        </span>
	                    </div>
	                </div>
	            </div>
	           <?php $i=$i+1;
       		} ?>
            <!--- fim aqui -->
    	</div>

    	<section class="content">
		    
    	</section>
		
	</div>
</div>