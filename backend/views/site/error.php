<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\BaseUrl;

$this->title = $name;

?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>
        <!-- aqui -->
        <section class="content">
            <div class="error-page">
            

            <div class="error-content">
              <h3><i class="fa fa-warning text-yellow"></i> Ops! Pagina não encontrada.</h3>

              <p>
                Não foi possível encontrar a página que você estava procurando.
                Enquanto isso, você pode <a href="/./site/">retornar para dashboard</a> ou tente usar o formulário de pesquisa.
              </p>

              <form class="search-form">
                <div class="input-group">
                  <input type="text" name="search" class="form-control" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" name="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i>

                    </button>
                  </div>
                </div>
                <!-- /.input-group -->
              </form>
            </div>
            <!-- /.error-content -->
          </div>
            
        </section>

        <!-- fim aqui -->
    

</div>
