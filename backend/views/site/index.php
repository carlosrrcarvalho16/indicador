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

    	<section class="content">
		    <div class="row">
		    	<?php foreach($departaments as $departament) {?>
		        <div class="col-lg-4 col-xs-6">
		          <!-- small box -->
		          <div class="small-box bg-green">
		            <div class="inner">
		              <h3><?php echo $departament->departamento; ?></h3>
		            </div>
		            <div class="icon">
		              <i class="ion ion-pie-graph"></i>
		            </div>
		            <a href="<?php echo BaseUrl::base()?>/departament?id=<?php echo $departament->id ?>" class="small-box-footer">Ver Indicadores <i class="fa fa-arrow-circle-right"></i></a>
		          </div>
		        </div>
		        <?php } ?>
		    </div>

    	</section>
		
	</div>
</div>