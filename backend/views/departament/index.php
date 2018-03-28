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
            <!--- aqui -->
            <div class="col-sm-4 col-xl-3">
                <div class="panel panel-tile text-center br-a br-grey">
                    <div class="panel-body">
                        <h1 class="fs30 mt5 mbn"><b>1,5</b></h1>
                            <h3 class="text-system">
                            <i class="fa fa-arrow-up pr5
                              text-success"> <!-- -->
                              </i><b>Meta 1 </b></h3>
                    </div>
                    <div class="panel-footer br-t p14">
                        <span class="fs11">
                            <b>Absenteeism</b>
                        </span>
                    </div>
                </div>
            </div>

            <!--- fim aqui -->
    	</div>

    	<section class="content">
		    
    	</section>
		
	</div>
</div>