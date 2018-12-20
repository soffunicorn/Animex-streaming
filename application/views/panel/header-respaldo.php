<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administacion de la web</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <!-- COMPLEMENTO PARA TEXTAREA -->
  <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
  <style> 

   .ck-content { min-height:160px; }
  </style>
 <!-- COMPLEMENTO PARA TABLAS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js">
</script>
 <!-- FIN COMPLEMENTO PARA TABLAS -->
  <link rel="stylesheet" href="<?=base_url();?>plantilla/panel/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url();?>plantilla/panel/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url();?>plantilla/panel/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url();?>plantilla/panel/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="<?=base_url();?>plantilla/panel/dist/css/skins/skin-blue.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jq-3.3.1/dt-1.10.18/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-3.3.1/dt-1.10.18/datatables.min.js"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="<?=base_url();?>plantilla/panel/https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="<?=base_url();?>plantilla/panel/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="<?=base_url();?>panel" class="logo">
      ANIMAX
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="<?=base_url();?>plantilla/panel/#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
   
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
         
          <!-- Tasks Menu -->
      
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="<?=base_url();?>plantilla/panel/#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
             <?php if($user->foto==''){ ?>
            <img src="<?=base_url();?>plantilla/panel/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
           <?php }else{ ?>
            <img src="<?=base_url().$user->foto;?>" class="user-image" alt="User Image">
           <?php } ?>
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?=$user->nombre;?> <?=$user->apellido;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <?php if($user->foto==''){ ?>
            <img src="<?=base_url();?>plantilla/panel/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
           <?php }else{ ?>
            <img src="<?=base_url().$user->foto;?>" class="img-circle" alt="User Image">
           <?php } ?>

                <p>
                  <?=$user->nombre?> <?=$user->apellido;?>
                 
                </p>
              </li>
              <!-- Menu Body -->
       
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?=base_url();?>panel/user" class="btn btn-default btn-flat">Editar Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="<?=base_url();?>panel/salir" class="btn btn-default btn-flat">Cerrar sesión</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="<?=base_url();?>plantilla/panel/#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
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
          <?php if($user->foto==''){ ?>
            <img src="<?=base_url();?>plantilla/panel/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
           <?php }else{ ?>
            <img src="<?=base_url().$user->foto;?>" class="img-circle" alt="User Image">
           <?php } ?>
        </div>
        <div class="pull-left info">
          <p><?=$user->nombre;?> <?=$user->apellido;?></p>
          <!-- Status -->
        <i class="fa fa-circle text-success"></i>Usuario:<b> <?=$user->nickname;?></b>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        
      
  

 