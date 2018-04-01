<?php

/* @var $this yii\web\View */
use yii\helpers\BaseUrl;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\models\Identity;

$this->title = 'Dashboard Departamento';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Dashboard Departamento</h3>
    </div>
    <select name="pais" onchange="ajax('seleciona_estados.php?pais=' + this.value, 'estados')">
    <?php
    	$meses = array (1 => "Janeiro", 2 => "Fevereiro", 3 => "Março", 4 => "Abril", 5 => "Maio", 6 => "Junho", 7 => "Julho", 8 => "Agosto", 9 => "Setembro", 10 => "Outubro", 11 => "Novembro", 12 => "Dezembro");

    	for($i=1;$i <=12;$i++){ ?>
    		<option value="<?php $i?>">
    			<?php
    			echo $meses["$i"];
    			?>
    		</option>
    	<?php } ?>
      
</select>
<div id="estados"></div>
    <div class="box-body">
    	<div class="row">
    		<div class='col-md-12' style="text-align: center;">
    			<h1><?php echo $departament->departamento; ?> - <?php echo date('Y')?> - <?php echo Yii::$app->formmat->strMonth(date('m'))?></h1>
    		</div>
            <!--- aqui -->
            
            <?php 
            $i=0;
             //print_r($dados_mes);
             foreach ($dados_mes as $value) {
            	$retVal = ($dados_mes[$i]['sentido']==1) ? 'class= fa fa-arrow-up pr5 text-warning' : 'class= fa fa-arrow-up pr5 text-warning';
            	//echo $dados_mes[$i]['descricao'];
            	
             	 ?>
             
            <div class="col-sm-4 col-xl-3">
                <div  class="panel panel-tile text-center br-a br-grey "> 
                    <div class="panel-body ">
                        <div >
                            <b><?php echo $dados_mes[$i]['nome']; ?></b>
                        </div>
                        <h1 class="fs30 mt5 mbn">
                        	<b>
                        		<?php
                        			echo $dados_mes[$i]['valor'];
                        		?>
                        	</b>
                        </h1>
                            <h3 class="text-system">
                                <i <?php echo $retVal; ?> > <!-- -->
                                </i>
                            Meta <?php echo $dados_mes[$i]['meta']; ?>
                        </h3>
                    </div>
                    <div class="panel-footer br-t p14">
                        <span class="fs11">
                            <b>Falta descrição</b>
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