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
      <a class="navbar-brand" href="#"><img alt="Ooyta Logo" class="top-logo2" height="24" src="<?php  echo theme_path('',0).'/img/logo.png' ?>" /></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <!-- <li><a href="<?php echo HOME ?>"><i class="fa fa-area-chart" aria-hidden="true"></i> <?php e_lbl('dashborad'); ?></a></li> -->
        <li>
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-flask" aria-hidden="true"></i> خدمات مشتریان<?php //e_lbl('buysell'); ?><span class="arrow"></span></a>

                        <ul class="dropdown-menu">
                            <li><a href="?pg=impexp&eoe=2"><span><i class="fa fa-reply Pull-left" aria-hidden="true"></i>نصب جدید</span></a></li>
                            <li><a href="?pg=impexp&eoe=1"><span><i class="fa fa-share Pull-left" aria-hidden="true"></i> خدمات تخنیکی</span></a></li>


                            <li><a href="?pg=impexp"><span><i class="fa fa-list-ol Pull-left" aria-hidden="true"></i> <?php e_lbl('list'); ?></span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-usd" aria-hidden="true"></i> فروشات<?php //e_lbl('financial'); ?><span class="arrow"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="?pg=mexp&eoe=1"><span>پرداخت پول از دخل</span></a></li>
                            <li><a href="?pg=mexp&eoe=2"><span>&#1583;&#1585;&#1740;&#1575;&#1601;&#1578; &#1662;&#1608;&#1604; &#1576;&#1607; &#1583;&#1582;&#1604;</span></a></li>
                            <li><a href="?pg=mexp&eoe=5"><span> &#1662;&#1585;&#1583;&#1575;&#1582;&#1578; &#1662;&#1608;&#1604; &#1605;&#1578;&#1601;&#1585;&#1602;&#1607;</span></a></li>
                            <li><a href="?pg=mexp&eoe=7"><span>&#1583;&#1585;&#1740;&#1575;&#1601;&#1578; &#1662;&#1608;&#1604; &#1605;&#1578;&#1601;&#1585;&#1602;&#1607;</span></a></li>
                            <li><a href="?pg=mexp"><span> لیست پول </span></a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-line-chart" aria-hidden="true"></i> انبار و منابع<?php //e_lbl('reports'); ?><span class="arrow"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo get_link('report', 'view', 'search'); ?>">گزارش پیشرفته<i class="fa fa-share Pull-left" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo get_link('report', 'view', 'blancemulti'); ?>">بلانس کلی عرضی <i class="fa fa-share Pull-left" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo get_link('report', 'view', 'blance'); ?>">بلانس کلی <i class="fa fa-share Pull-left" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo get_link('report', 'view', 'blancecust'); ?>">بلانس کاستوم<i class="fa fa-share Pull-left" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo get_link('report', 'view', 'blanceoil'); ?>"><i class="fa fa-share Pull-left" aria-hidden="true"></i>&#1576;&#1604;&#1575;&#1606;&#1587; &#1705;&#1604;&#1740; &#1576;&#1585; &#1575;&#1587;&#1575;&#1587; &#1585;&#1608;&#1594;&#1606;&#1740;&#1575;&#1578;</a></li>



                            <li><a target="_blank" href="<?php echo get_link('report', 'view', 'man2'); ?>&y=<?php echo date('Y') ?>&m=<?php echo date('m') ?>&d=<?php echo date('d') ?>">لیست پرداخت و دریافت روزنه<i class="fa fa-share Pull-left" aria-hidden="true"></i></a></li>
                            <li><a target="_blank" href="<?php echo get_link('report', 'view', 'man'); ?>&y=<?php echo date('Y') ?>&m=<?php echo date('m') ?>&d=<?php echo date('d') ?>">لیست خرید و فروش روزانه<i class="fa fa-share Pull-left" aria-hidden="true"></i></a></li>

                            <li><a href="<?php echo get_link('report', 'view', 'monsearch'); ?>">گزارش عمومی یک شرکت<i class="fa fa-share Pull-left" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo get_link('report', 'view', 'searchep'); ?>&me=com">گزارش خلاصه یک شرکت<i class="fa fa-share Pull-left" aria-hidden="true"></i></a></li>

                            
                            <li><a href="<?php echo get_link('report', 'view', 'msearch'); ?>">گزارش مالی یک شرکت (فروش)<i class="fa fa-share Pull-left" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo get_link('report', 'view', 'msearche'); ?>">گزارش مالی یک شرکت(خرید)<i class="fa fa-share Pull-left" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo get_link('report', 'view', 'searchep'); ?>&me=stu">گزارش خلاصه مخزن<i class="fa fa-share Pull-left" aria-hidden="true"></i></a></li>

                            <li><a href="<?php echo get_link('report', 'view', 'searchep'); ?>&me=expimp">گزارش خلاصه خرید و فروش<i class="fa fa-share Pull-left" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo get_link('report', 'view', 'mdrep'); ?>">&#1605;&#1578;&#1601;&#1585;&#1602;&#1607; &#1605;&#1575;&#1604;&#1740;<i class="fa fa-share Pull-left" aria-hidden="true"></i></a></li>


                            
                            <li><a href="<?php echo get_link('report', 'view', 'othercom'); ?>&me=tran">گزارش شرکت بارچالانی<i class="fa fa-share Pull-left" aria-hidden="true"></i></a></li>
<li><a href="<?php echo get_link('report', 'view', 'othercom'); ?>&me=over">گزارش شرکت اضافه بار<i class="fa fa-share Pull-left" aria-hidden="true"></i></a></li>

<li><a href="<?php echo get_link('report', 'view', 'othercom'); ?>&me=mah">گزارش شرکت محصول<i class="fa fa-share Pull-left" aria-hidden="true"></i></a></li>
<li><a href="<?php echo get_link('report', 'view', 'stock'); ?>">گزارش عمومی از مخزنها<i class="fa fa-share Pull-left" aria-hidden="true"></i></a></li>

                    
                        
                        
                        
                        
                        </ul>
                    </li>




                    <li>
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-users" aria-hidden="true"></i> <?php e_lbl('users'); ?><span class="arrow"></span></a>
                        <ul class="dropdown-menu"> 
                           
                            <li><a href="<?php echo get_link('users'); ?>">مدیریت کاربران<i class="fa fa-users pull-left" aria-hidden="true"></i></a></li>


                        </ul>


                        <li>


                        <li>
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-users" aria-hidden="true"></i> <?php e_lbl('hr'); ?><span class="arrow"></span></a>
                        <ul class="dropdown-menu"> 
                           
                            <li><a href="<?php echo get_link('users'); ?>">فرم درخواست رخصتی<i class="fa fa-users pull-left" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo get_link('users'); ?>">فرم اضافه کار <i class="fa fa-users pull-left" aria-hidden="true"></i></a></li>

                        </ul>


                        <li>
                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars" aria-hidden="true"></i> <?php echo g_lbl('settings'); ?><span class="arrow"></span></a>
                            <ul class="dropdown-menu">
                                
                                <li><a href="<?php echo get_link('settings'); ?>"><?php echo g_lbl('settings'); ?><i class="fa fa-cogs Pull-left" aria-hidden="true"></i></a></li>
                                <li><a href="<?php echo get_link('accounts'); ?>"><?php echo g_lbl('manage,accounts'); ?><i class="fa fa-ship Pull-left" aria-hidden="true"></i></a></li>
                               
                                <li><a href="<?php echo get_link('categories'); ?>&t=dep"> مدیریت دیپارتمنتها <i class="fa fa-building Pull-left" aria-hidden="true"></i></a></li>    
                                <li><a href="<?php echo get_link('categories'); ?>&t=site"> مدیریت سایتها <i class="fa fa-building Pull-left" aria-hidden="true"></i></a></li>    
                                <li><a href="<?php echo get_link('categories'); ?>&t=groups"> مدیریت گروپها <i class="fa fa-building Pull-left" aria-hidden="true"></i></a></li>   
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
      <li>
          <a id="messagebox" href="<?php echo HOME.'?pg=inbox#Unread'?>">
            <?php 
            global $dbase;
            $uid = user_uid();
$where = ' WHERE mes_read=0 AND mes_status = 1 AND mes_tid='.$uid;
$numb = $dbase->num_rows('SELECT mes_id FROM sob_message'. $where);
    if($numb)
        echo '<span class="red-att"><i class="fas fa-envelope"></i><sup id="notnumbers"> '. $numb .' </sup></span>';
    else
        echo '<i class="far fa-envelope"></i>';
?>
          </a>
        </li>

      <li class="dropdown">
          <a id="notifications" href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="far fa-bell"></i></a>
          <ul id="not-list" class="dropdown-menu">
  
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" id="userinfo" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-user"></i></a>
          <ul class="dropdown-menu">
          <li><a href="<?php echo get_link('account'); ?>">تنظیمات کاربری <span class="glyphicon glyphicon-cog pull-right"></span></i></a></li>
            <li class="divider"></li>
            <li><a href="#">وضعیت کارمندی <span class="glyphicon glyphicon-stats pull-right"></span></a></li>
            <li class="divider"></li>
            <li><a href="<?php echo get_link('inbox'); ?>">پیامها <span class="badge pull-right"> 42 </span></a></li>
            <li class="divider"></li>
            <li><a href="#">انجام شدنیها <span class="glyphicon glyphicon-heart pull-right"></span></a></li>
            <li class="divider"></li>
            <li><a href="<?php echo HOME ?>?pg=account&user=signout">خروج <span class="glyphicon glyphicon-log-out pull-right"></span></a></li>
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
     


