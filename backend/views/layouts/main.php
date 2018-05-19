<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\DashboardAsset;
use yii\helpers\Html;
use yii\helpers\BaseUrl;
use yii\widgets\Breadcrumbs;
use backend\models\Identity;

DashboardAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='shortcut icon' type='image/x-icon' href='<?php echo BaseUrl::base();?>/dist/img/favicon.ico' />
    <?= Html::csrfMetaTags() ?>
    <title><?= Yii::$app->params['titleApplication']?> - <?= Html::encode($this->title) ?></title>
    <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php $this->head() ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php $this->beginBody() ?>

<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo BaseUrl::base()?>/" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>I</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">INDICADOR</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <!-- <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                    inner menu: contains the actual data
                    <ul class="menu">
                      <li>start message
                        <a href="#">
                          <div class="pull-left">
                            <img src="<?php echo BaseUrl::base();?>/dist/img/icon-user-default.png" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>end message
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="<?php echo BaseUrl::base();?>/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            AdminLTE Design Team
                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="<?php echo BaseUrl::base();?>/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Developers
                            <small><i class="fa fa-clock-o"></i> Today</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="<?php echo BaseUrl::base();?>/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Sales Department
                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="<?php echo BaseUrl::base();?>/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Reviewers
                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li> -->

              <!-- Notifications: style can be found in dropdown.less -->
              <!-- <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    inner menu: contains the actual data
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-red"></i> 5 new members joined
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-user text-red"></i> You changed your username
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li> -->

              <!-- Tasks: style can be found in dropdown.less -->
              <!-- <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 9 tasks</li>
                  <li>
                    inner menu: contains the actual data
                    <ul class="menu">
                      <li>Task item
                        <a href="#">
                          <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">20% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li>end task item
                      <li>Task item
                        <a href="#">
                          <h3>
                            Create a nice theme
                            <small class="pull-right">40%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">40% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li>end task item
                      <li>Task item
                        <a href="#">
                          <h3>
                            Some task I need to do
                            <small class="pull-right">60%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">60% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li>end task item
                      <li>Task item
                        <a href="#">
                          <h3>
                            Make beautiful transitions
                            <small class="pull-right">80%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">80% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li>end task item
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">View all tasks</a>
                  </li>
                </ul>
              </li> -->

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo BaseUrl::base();?>/dist/img/icon-user-default.png" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo Yii::$app->user->identity->name ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo BaseUrl::base();?>/dist/img/icon-user-default.png" class="img-circle" alt="User Image">
                    <p>
                      <?php echo Yii::$app->user->identity->name ?>
                      <!-- <small>Membro desde Dez. 2015</small> -->
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <!-- <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li> -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <!-- <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Perfil</a>
                    </div> -->
                    <div class="pull-right">
                      <?= Html::a('Sair', ['/site/logout'], ['data-method'=>'post', 'class' =>'btn btn-default btn-flat']) ?>
                      <?= Html::a('Trocar senha', ['/user/changepassword'], ['data-method'=>'post', 'class' =>'btn btn-default btn-flat']) ?>
                    </div>
                  </li>
                </ul>
              </li>

              <!-- Control Sidebar Toggle Button -->
              <!-- <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li> -->
            </ul>
          </div>
        </nav>
      </header>

      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo BaseUrl::base();?>/dist/img/icon-user-default.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo Yii::$app->user->identity->name ?></p>
              <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
            </div>
          </div>
          <!-- search form -->
          <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Procurar...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form> -->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MENU NAVEGAÇÃO</li>
            <li>
              <a href="<?php echo BaseUrl::base();?>/">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
             <?php if(\Yii::$app->user->can('updateDataMonth')){ ?>
              <li class="treeview">
                  <a href="#">
                      <i class="fa   fa-edit"></i>
                      <span>Atualizar Dados</span>
                      <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                      <li><a href="<?php echo BaseUrl::base();?>/dadosmes?dep=0"><i class="fa fa-pencil-square"></i> Dados do Mês</a></li>
                  </ul>
              </li>
              <?php } ?>
              <li class="treeview">
                  <a href="#">
                      <i class="fa   fa-file-text-o"></i>
                      <span>Relatórios</span>
                      <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                      <li><a href="<?php echo BaseUrl::base();?>/relatoriodepartamento"><i class="fa fa-arrow-circle-right"></i> Departamentos</a></li>
                      <li><a href="<?php echo BaseUrl::base();?>/reports/indicadores"><i class="fa fa-arrow-circle-right"></i> Indicadores</a></li>
                      <li><a href="<?php echo BaseUrl::base();?>/reports/plano_de_acoes"><i class="fa fa-arrow-circle-right"></i> Plano de ações</a></li>
                      <li><a href="<?php echo BaseUrl::base();?>/reports/usuarios"><i class="fa fa-arrow-circle-right"></i> Usuários</a></li>
                  </ul>
              </li>

            <?php if(\Yii::$app->user->can('manageCompany')){?>
            <li class="treeview">
              <a href="#">
                <i class="fa  fa-gear "></i>
                <span>Administrativo</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                    <li><a href="<?php echo BaseUrl::base();?>/company"><i class="fa fa-circle-o"></i> Empresa</a></li>
                    <li><a href="<?php echo BaseUrl::base();?>/indicador"><i class="fa fa-circle-o"></i> Indicador</a></li>
                    <li><a href="<?php echo BaseUrl::base();?>/departamento"><i class="fa fa-circle-o"></i> Departamento</a></li>
              </ul>
            </li>
            <?php } 

            if(\Yii::$app->user->can('manageUser')){
            ?>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-lock"></i>
                <span>Segurança</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo BaseUrl::base();?>/user"><i class="fa fa-user"></i> Usuários</a></li>
                <li><a href="<?php echo BaseUrl::base();?>/user/changepassword"><i class="fa fa-user"></i> Trocar senha de Usuários</a></li>
                <?php if(\Yii::$app->user->can('manageGroup')){?>
                <li><a href="<?php echo BaseUrl::base();?>/group"><i class="fa fa-users"></i> Grupos de Usuários</a></li>
                <li><a href="<?php echo BaseUrl::base();?>/permission"><i class="fa fa-unlock-alt"></i> Permissões</a></li>
                <?php } ?>
              </ul>
            </li>
            <?php } ?>

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <!-- <h1>
            Dashboard
            <small>Control panel</small>
          </h1> -->
          <ol class="breadcrumb">
            <!-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li> -->
            <?php
            // $this is the view object currently being used
            echo Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]);
            ?>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

              <?php if(Yii::$app->session->has('success')): ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                <?php 
                echo Yii::$app->session->get('success'); 
                Yii::$app->session->remove('success'); 
                ?>
              </div>
              <?php endif;?>

              <?php if(Yii::$app->session->has('error')): ?>
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Error!</h4>
                <?php 
                echo Yii::$app->session->get('error'); 
                Yii::$app->session->remove('error'); 
                ?>
              </div>
              <?php endif;?>

            <?= $content ?>
        </section>
    </div>

    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Versão</b> <?php echo Yii::$app->params['version']?>
      </div>
      <strong>Copyright &copy; 2018.</strong> All rights reserved.
    </footer>
    
</div>

<?php $this->endBody() ?>
<script type="text/javascript">
  window.BASEPATH = '<?php echo BaseUrl::base();?>/';
</script>
</body>
</html>
<?php $this->endPage() ?>
