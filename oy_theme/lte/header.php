<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo get_pgtitle(); ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7
  <link rel="stylesheet" href="<?php theme_path() ?>/dist/css/bootstrap-theme.css"> -->


  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="<?php theme_path() ?>/bower_components/Ionicons/css/ionicons.min.css"> -->
  <?php load_css(); ?>
    <!-- Bootstrap rtl -->
    <link rel="stylesheet" href="<?php theme_path() ?>/dist/css/rtl.css">
    <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="<?php theme_path() ?>/bower_components/font-awesome/css/font-awesome.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php theme_path() ?>/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php theme_path() ?>/dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="<?php theme_path() ?>/style.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo HOME; ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">پنل</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>کنترل پنل مدیریت</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>


      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="<?Php echo HOME.'?pg=inbox'; ?>" >
              <i class="fa fa-envelope"></i>
              <span class="label label-success">4</span>
            </a>
            
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a id="notifications" href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell"></i>
            </a>
            <ul id="not-list" class="dropdown-menu">
            </ul>
          </li>
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            
              <span class="hidden-xs"><?php echo user_name(); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php theme_path() ?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo user_name(); ?>
                  <small><?php echo user_title(); ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">صفحه من</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">فروش</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">دوستان</a>
                  </div>
                </div>
              </li> -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="<?php echo get_link('account'); ?>" class="btn btn-default btn-flat">پروفایل</a>
                </div>
                <div class="pull-left">
                  <a href="<?php echo HOME ?>?pg=account&user=signout" class="btn btn-default btn-flat">خروج</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- right side column. contains the logo and sidebar -->


<?php get_sidebar(); ?>

<div class="content-wrapper">


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        صفحه خالی
        <small>آماده برای پروژه شما</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li><a href="#">مثال ها</a></li>
        <li class="active">صفحه خالی</li>
      </ol>
    </section>


     <!-- Main content -->
     <section class="content">
             <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo get_pgtitle(); ?></h3>

  
        </div>
        <div class="box-body">


