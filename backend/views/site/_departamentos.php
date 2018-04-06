<?php

/* @var $this yii\web\View */
use yii\helpers\BaseUrl;

foreach($departaments as $departament) {
	$departament = (object) $departament; //força o tipo da variável
?>
<div class="col-lg-4 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-aqua">
    <div class="inner">
      <h1><?php echo $departament->departamento; ?></h1> 
      <h3><?php echo $departament->qtd_preenchida; ?> / <?php echo $departament->qtd_ind; ?></h3> 
    </div>
    <div class="icon">
      <i class="ion ion-pie-graph"></i>
    </div>
    <a href="<?php echo BaseUrl::base()?>/departament?id=<?php echo $departament->id ?>" class="small-box-footer">Ver Indicadores <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>
<?php } ?>