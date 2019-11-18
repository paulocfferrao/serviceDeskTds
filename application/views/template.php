<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Service Desk</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/Ionicons/css/ionicons.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/AdminLTE.min.css'); ?>">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/skins/_all-skins.min.css'); ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!-- <span class="logo-mini"><b>A</b>DS</span> -->
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Service</b>Desk</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <!-- <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a> -->
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- Notifications Menu -->

          <!-- Tasks Menu -->

          <!-- User Account Menu -->

          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="<?= site_url('login/logout');?>" ><i class="fa fa-power-off"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url('assets/dist/img/logo-upf.png'); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $this->session->userdata['logado']['user']; ?></p>
          <!-- Status -->

        </div>
      </div>


      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active">
          <a href="<?= site_url('chamado'); ?>">
            <i class="fa fa-link"></i> <span>Chamados</span>
          </a>
        </li>
        <?php if($this->session->userdata['logado']['tipo']=='admin'){ ?>
        <li class="active">
          <a href="<?= site_url('usuarios'); ?>">
            <i class="fa fa-link"></i> <span>Usuários</span>
          </a>
        </li>
      <?php } ?>
      <?php if($this->session->userdata['logado']['tipo']=='admin'){ ?>
      <li class="active">
        <a href="<?= site_url('setor'); ?>">
          <i class="fa fa-link"></i> <span>Setores</span>
        </a>
      </li>
    <?php } ?>
      <?php if($this->session->userdata['logado']['tipo']=='admin'){ ?>
      <li class="active">
        <a href="<?= site_url('computador'); ?>">
          <i class="fa fa-link"></i> <span>Computadores</span>
        </a>
      </li>
    <?php } ?>
    <?php if($this->session->userdata['logado']['tipo']=='admin'){ ?>
    <li class="active">
      <a href="<?= site_url('categoria'); ?>">
        <i class="fa fa-link"></i> <span>Categorias</span>
      </a>
    </li>
  <?php } ?>
  <?php if($this->session->userdata['logado']['tipo']!='requerente'){ ?>
  <li class="active">
    <a href="<?= site_url('relatorio/formChamadoStatus'); ?>">
      <i class="fa fa-link"></i> <span>Chamados por status</span>
    </a>
  </li>
<?php } ?>
<?php if($this->session->userdata['logado']['tipo']!='requerente'){ ?>
<li class="active">
  <a href="<?= site_url('relatorio/formChamadoRequerente'); ?>">
    <i class="fa fa-link"></i> <span>Chamados por requerente</span>
  </a>
</li>
<?php } ?>
<?php if($this->session->userdata['logado']['tipo']!='requerente'){ ?>
<li class="active">
  <a href="<?= site_url('relatorio/formUsuarioSetor'); ?>">
    <i class="fa fa-link"></i> <span>Usuários por setor</span>
  </a>
</li>
<?php } ?>


      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $titulo; ?>
        <small><?php if(isset($subtitulo)) echo $subtitulo; ?></small>
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol> -->
    </section>

    <!-- jQuery 3 -->
    <script src="<?= base_url('assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <?php echo $contents; //conteudo da view reportada pela biblioteca de template ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">

  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->


<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/dist/js/adminlte.min.js'); ?>"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
