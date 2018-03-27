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
    	
    <div class="box-body">
    	<div class="row">
    		<div class='col-md-12' style="text-align: center;">
    			<h1><?php echo $departament->departamento; ?> - <?php echo date('Y')?> - <?php echo Yii::$app->formmat->strMonth(date('m'))?></h1>
    		</div>
    	</div>

    	<section class="content">
		    
    	</section>
		
	</div>
</div>