<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\BaseUrl;

$this->title = $name;

?>
      <div class="error-page">
        <h1><?= Html::encode($this->title) ?></h1>

        <div class="error-content">
          <h3><i class="fa fa-warning text-red"></i> Ops! Algo deu errado.</h3>

          <p>
            Vamos trabalhar para consertar isso imediatamente.
            Enquanto isso, você pode <a href="/./site/">retornar para dashboard</a> ou tente usar o formulário de pesquisa.
          </p>

          <form class="search-form">
            <div class="input-group">
              <input type="text" name="search" class="form-control" placeholder="Search">

              <div class="input-group-btn">
                <button type="submit" name="submit" class="btn btn-danger btn-flat"><i class="fa fa-search"></i>
                </button>
              </div>
            </div>
            <!-- /.input-group -->
          </form>
        </div>
      </div>
      <!-- /.error-page -->

