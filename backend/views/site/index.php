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
	    			<select name="ano" id="ano-dashboard" class="form-control">
				    <?php
				    	$anos = [2018,2017,2016,2015];
				    	for($i=0;$i < count($anos) ;$i++){ ?>
				    		<option value="<?php echo $anos[$i]?>">
				    			<?php
				    			echo $anos[$i];
				    			?>
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
				    		<option value="<?php echo $i?>" <?= ($i == date('m') ? ' selected' : '')?>>
				    			<?php
				    			echo $meses["$i"];
				    			?>
				    		</option>
				    <?php } ?>
					</select>
				</div>
    		</div>
		</div>

    	<section class="content">
		    <div class="row" id="departaments-dashboard">
		    	<?= Yii::$app->controller->renderPartial('_departamentos', ['departaments' => $departaments]); ?>
		    </div>
    	</section>
		
	</div>
</div>