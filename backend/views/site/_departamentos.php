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
            <div class="col-md-2 col-sm-2"><i class="fa fa-fw fa-thumbs-up text-success"></i>
                <?php echo $departament->Dentro; ?>
            </div>
            <div class="col-md-2 col-sm-2"><i class="fa fa-fw fa-thumbs-down text-danger"></i>
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

<!-- </section> -->
