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
<div id="ati10" class="atl"></div>
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
        <i class="fa fa-bars"></i>
      </a>


      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="<?Php echo HOME.'?pg=inbox'; ?>" >
              <i class="fa fa-envelope"></i>
              <!-- <span class="label label-success">4</span> -->
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

          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <?php
                    global $dbase;
$uid = user_uid();
$site = user_site();
$dep = user_dep();
                    $datasin = [];
                    $counter = 0;
                    //lea_uid <> {$uid} AND
                    $where = " WHERE  lea_replaceaccept=0  AND lea_replacement ='{$uid}' ORDER BY lea_id";
                    $rows = $dbase->tbl2array2('sob_leaves','*',$where);
                    foreach($rows as $row){
                        $time = strtotime($row['lea_time']);
                        $datasin[$time] = '<a  data-toggle="modal" data-target="#Uni-modal"    href="'.HOME.'?pg=hr&lid='.$row['lea_id'].' #main-form" class="leavesu">
                        جایگزینی: '.user_name_ex($row['lea_uid']).'
                        <span class="label label-warning">نیاز به تایید</span>
                        </a>';
                        $counter++;
                    } 
 
                    //AND ove_uid <> {$uid}
                    $where = " WHERE ove_status=1 and ove_approve=0  AND ove_site='{$site}' AND ove_dep ='{$dep}' ORDER BY ove_id ";
                    $rows = $dbase->tbl2array2('sob_overtime','*',$where);
                    foreach($rows as $row){
                        $time = strtotime($row['ove_time']);
                        $datasin[$time] = '<a data-toggle="modal" data-target="#Uni-modal"  href="'.HOME.'?pg=hr&overtime=view&oid='.$row['ove_id'].' #main-form" class="overtime">
                       اضافه کاری: '.user_name_ex($row['ove_uid']).'
                        <span class="label label-warning">نیاز به تایید شما.</span>
                        </a>';
                        $counter++;
                    } 
    
                    //lea_uid <> {$uid} AND
                    $where = " WHERE lea_accepted=0 AND  lea_site='{$site}' AND lea_replaceaccept=1 AND lea_dep ='{$dep}' ORDER BY lea_id ";
                    $rows = $dbase->tbl2array2('sob_leaves','*',$where);
                    foreach($rows as $row){
                        $time = strtotime($row['lea_time']);
                        $datasin[$time] = '<a class="leaves" data-toggle="modal" data-target="#Uni-modal"  href="'.HOME.'?pg=hr&lid='.$row['lea_id'].' #main-form" >
                        رخصتی: '.user_name_ex($row['lea_uid']).'
                        <span class="label label-warning">نیاز به تایید</span>
                        </a>';
                        $counter++;
                    } 
    
                    $where = " WHERE tic_progress<>100 AND tic_site='{$site}' AND tic_assigned ='' ORDER BY tic_priority DESC";
                    $rows = $dbase->tbl2array2('sob_tickets','*',$where);
                    foreach($rows as $row){
                        $time = strtotime($row['tic_time']);
                        $datasin[$time] = '<a class="tickets" href="'.HOME.'?pg=ticket&id='.$row['tic_id'].'" >
                        تکت: '.$row['tic_title'].'
                        <span class="label label-danger">نیاز به تغیین مسئول</span>
                        </a>';
                        $counter++;
                    } 

                    ?>
              <i class="fa fa-flag"></i>
              <span class="label label-danger"><?Php echo $counter; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">وظایت قابل اجراء</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">

                    <?php
                    krsort($datasin);
                    
                    foreach($datasin as $datax){
                        echo '<li>'.$datax.'</li>';
                    }
                        
                    ?>
             
                </ul>
              </li>
              <!-- <li class="footer">
                <a href="#">View all tasks</a>
              </li> -->
            </ul>
          </li>
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo user_image() ?>" style="" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo user_name(); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo user_image() ?>" class="img-circle" alt="User Image">

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
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- right side column. contains the logo and sidebar -->


<?php get_sidebar(); ?>

<div class="content-wrapper">


    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
      <h1>
        <?php //get_pgtitle(); ?>
        <small><?php //get_pgdesc(); ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li><a href="#">مثال ها</a></li>
        <li class="active">صفحه خالی</li>
      </ol>
    </section> -->


     <!-- Main content -->
     <section class="content">
             <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo get_pgtitle(); ?></h3>


        <?php get_buttons(); ?>
    
        </div>
        <div id="main-box" class="box-body">


