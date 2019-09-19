<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fa-ir" lang="fa-ir">

    <head>
        <meta charset="utf-8" />
        <title><?php echo get_pgtitle(); ?></title>



        <?php load_css(); ?>
        <link rel="stylesheet" href="<?php theme_path() ?>/theme/style.css?v=1" />
         <link rel="stylesheet" type="text/css" media="print"  href="<?php theme_path() ?>/css/print.css" />
        <link rel="stylesheet" type="text/css" href="<?php theme_path() ?>/css/<?php echo  get_lang() ?>.css" />
    </head>
    <body>

    <div class="topbanner"></div>


    <div id="ati10" class="atl"></div>
    <div class="loadingbox hidden-print">
      <div id="fountainG">
          <img alt="Ooyta Logo" class="loading-logo blink" src="<?php  echo theme_path('',0).'/img/logo.png' ?>" />

</div>  
        
        
    </div>
        <?php if(!isset($_GET['rep'])){ ?>


            <nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo get_link('my'); ?>"><img alt="Ooyta Logo" class="top-logo2" height="24" src="<?php  echo theme_path('',0).'/img/logo.png' ?>" /></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <!-- <li><a href="<?php echo HOME ?>"><i class="fa fa-area-chart" aria-hidden="true"></i> <?php e_lbl('dashborad'); ?></a></li> -->
        <li>
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-flask" aria-hidden="true"></i> خدمات مشتریان<?php //e_lbl('buysell'); ?></a>

                        <ul class="dropdown-menu">
                            <li><a href="?pg=customer"><span><i class="fa fa-reply Pull-left" aria-hidden="true"></i>نصب جدید</span></a></li>
                            <li><a href="<?php echo get_link('ticket'); ?>"><span><i class="fa fa-share Pull-left" aria-hidden="true"></i>ایجاد تکت</span></a></li>


                            <li><a href="?pg=impexp"><span><i class="fa fa-list-ol Pull-left" aria-hidden="true"></i> <?php e_lbl('list'); ?></span></a></li>
                        </ul>
                    </li>
        

                   




                    <li>
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-users" aria-hidden="true"></i> <?php e_lbl('users'); ?></a>
                        <ul class="dropdown-menu"> 
                           
                            <li><a href="<?php echo get_link('users'); ?>">مدیریت کاربران<i class="fa fa-users pull-left" aria-hidden="true"></i></a></li>


                        </ul>


                        <li>


                        <li>
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-users" aria-hidden="true"></i> <?php e_lbl('hr'); ?></a>
                        <ul class="dropdown-menu"> 
                           
                            <li><a href="<?php echo get_link('hr'); ?>">فرم درخواست رخصتی<i class="fa fa-users pull-left" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo get_link('users'); ?>">فرم اضافه کار <i class="fa fa-users pull-left" aria-hidden="true"></i></a></li>

                        </ul>


                        <li>
                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars" aria-hidden="true"></i> <?php echo g_lbl('settings'); ?></a>
                            <ul class="dropdown-menu">
                                
                                <li><a href="<?php echo get_link('settings'); ?>"><?php echo g_lbl('settings'); ?><i class="fa fa-cogs Pull-left" aria-hidden="true"></i></a></li>
                                <li><a href="<?php echo get_link('accounts'); ?>"><?php echo g_lbl('manage,accounts'); ?><i class="fa fa-ship Pull-left" aria-hidden="true"></i></a></li>
                               
                                <li><a href="<?php echo get_link('categories'); ?>&t=dep"> مدیریت دیپارتمنتها <i class="fa fa-building Pull-left" aria-hidden="true"></i></a></li>    
                                <li><a href="<?php echo get_link('categories'); ?>&t=site"> مدیریت سایتها <i class="fa fa-building Pull-left" aria-hidden="true"></i></a></li>    
                                <li><a href="<?php echo get_link('categories'); ?>&t=groups"> مدیریت گروپها <i class="fa fa-building Pull-left" aria-hidden="true"></i></a></li>   

                                <li><a href="<?php echo get_link('categories'); ?>&t=priority"> مدیریت اولویتها <i class="fa fa-building Pull-left" aria-hidden="true"></i></a></li>   
                                <li><a href="<?php echo get_link('categories' , 't', 'tickets'); ?>"> مدیریت دسته های تکت <i class="fa fa-building Pull-left" aria-hidden="true"></i></a></li>  
                                
                                <li><a href="<?php echo get_link('categories' , 't', 'tickettags'); ?>"> مدیریت وضعیت تکتها <i class="fa fa-building Pull-left" aria-hidden="true"></i></a></li>  

                                 <li><a href="<?php echo get_link('categories' , 't', 'leavetypes'); ?>"> نوع رخصتی </a></li>    

                                <!-- <li><a href="<?php echo get_link('house'); ?>"> مدیریت مخزنها <i class="fa fa-building Pull-left" aria-hidden="true"></i></a></li>

                                <li><a href="<?php echo get_link('oiltype'); ?>"> مدیریت نوع روغنیات <i class="fa fa-tint Pull-left" aria-hidden="true"></i></a></li>
                                <li><a href="<?php echo get_link('currency'); ?>"><?php echo g_lbl('manage,currency'); ?><i class="fa fa-cc Pull-left" aria-hidden="true"></i></a></li>

                                <li><a href="?pg=delcom">&#1581;&#1584;&#1601; &#1588;&#1585;&#1705;&#1578; <i class="fa fa-times Pull-left" aria-hidden="true"></i></a></li>
                                
                                
                                 <li><a href="?pg=update"><?php if(newupdate()){echo '<i class="fa fa-info-circle text-lg text-danger blink"></i>';} ?> <?php e_lbl('update'); ?> <i class="fa fa-cloud-download Pull-left" aria-hidden="true"></i></a></li>
                                <li><a href="?pg=backup"><?php e_lbl('backup'); ?> <i class="fa fa-download Pull-left" aria-hidden="true"></i></a></li> -->
                            </ul>
                        </li>

                       
                       

                </ul>
        </li>
      </ul>
      <!-- <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form> -->

      <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
          <a href="#" id="userinfo" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-user"></i></a>
          <ul class="dropdown-menu">
          <li><a href="<?php echo get_link('account'); ?>">تنظیمات کاربری <span class="glyphicon glyphicon-cog pull-right"></span></i></a></li>
            <li class="divider"></li>
            <li><a href="#">وضعیت کارمندی <span class="glyphicon glyphicon-stats pull-right"></span></a></li>
            <li class="divider"></li>
            <li><a href="<?php echo get_link('inbox'); ?>">پیامها <span class="badge pull-right"> <?php echo get_unread_messages();  ?> </span></a></li>
            <li class="divider"></li>
            <li><a href="<?php echo get_link('todo'); ?>">انجام شدنیها <span class="glyphicon glyphicon-heart pull-right"></span></a></li>
            <li class="divider"></li>
            <li><a href="<?php echo HOME ?>?pg=account&user=signout">خروج <span class="glyphicon glyphicon-log-out pull-right"></span></a></li>
          </ul>
        </li>


      <li class="dropdown">
          <a id="notifications" href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="far fa-bell"></i></a>
          <ul id="not-list" class="dropdown-menu">
  
          </ul>
        </li>

        
      </ul>


      <!-- <ul class="nav navbar-nav navbar-right">
        <li class="pull-left"><a href="#"><?php echo get_jdate('l j F Y') . ' | ' . date('l j F Y'); ?> <i class="fa fa-clock-o" ></i></a></li>
      </ul> -->
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

















       
               





<?php } ?>
     


