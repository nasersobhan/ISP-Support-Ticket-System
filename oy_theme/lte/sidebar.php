
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-right image">
          <img src="<?php echo user_image() ?>" style="width:45px; height:45px;" class="img-circle" alt="User Image">
        </div>
        <div class="pull-right info">
          <p><?php echo user_name(); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> <?php echo user_title(); ?></a>
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="جستجو">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <!-- <li class="header">منو</li> -->
        <li class="treeview">
          <a href="#">
          <i class="fas fa-chart-line"></i>
            <span>داشبرد</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php theme_path() ?>"><i class="fa fa-circle"></i> داشبرد راپور</a></li>
            <li><a href="<?php echo HOME ?>"><i class="fa fa-circle"></i> داشبرد کاری</a></li>
            <li><a href="<?php echo HOME ?>?pg=my"><i class="fa fa-circle"></i> داشبرد شخصی</a></li>
          </ul>
        </li>
        <li class="<?php echo is_get('pg') == 'ticket' ? 'active' : ''; ?> <?php echo is_get('list') == 'tickets' ? 'active' : ''; ?> treeview">
          <a href="#">
          <i class="fas fa-ticket-alt"></i>
            <span>تکتها</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li <?php echo is_get('pg') == 'ticket' ? 'class="active"' : ''; ?>><a href="<?php echo HOME ?>?pg=ticket"><i class="fa fa-circle"></i>تکت جدید</a></li>
          <li <?php echo is_get('all') == 'tickets' ? 'class="active"' : ''; ?>><a href="<?php echo HOME ?>?pg=list&list=tickets&all=tickets"><i class="fa fa-circle"></i>همه تکتها</a></li>
            <li <?php echo is_get('s_completed') == '99' ? 'class="active"' : ''; ?>><a href="<?php echo HOME ?>?pg=list&list=tickets&s_completed=99"><i class="fa fa-circle"></i>تکتهای باز</a></li>
            <li <?php echo is_get('s_tag') == '1268' ? 'class="active"' : ''; ?>><a href="<?php echo HOME ?>?pg=list&list=tickets&s_tag=1268"><i class="fa fa-circle"></i>تکتهای در حال اجراء</a></li>
            <li <?php echo is_get('s_completed') == '100' ? 'class="active"' : ''; ?>><a href="<?php echo HOME ?>?pg=list&list=tickets&s_completed=100"><i class="fa fa-circle"></i>تکتهای بسته شده</a></li>
          </ul>
        </li>


        <li class="<?php echo is_get('pg') == 'customer' ? 'active' : ''; ?> <?php echo is_get('list') == 'customers' ? 'active' : ''; ?> treeview">
          <a href="#">
          <i class="fas fa-address-book"></i>
            <span>مشتریان</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li <?php echo is_get('newcustomer') == '1' ? 'class="active"' : ''; ?>><a href="<?php echo HOME ?>?pg=customer&newcustomer=1"><i class="fa fa-plus"></i>ثبت مشتری جدید</a></li>
          <li <?php echo is_get('all') == '1' ? 'class="active"' : ''; ?>><a href="<?php echo HOME ?>?pg=list&list=customers&all=1"><i class="fa fa-circle"></i>همه مشتریان</a></li>
          <li><a href="<?php echo HOME ?>?pg=list&list=customers&s_active=1"><i class="fa fa-circle"></i>مشتریان غیر فعال</a></li>
            <li><a href="<?php echo HOME ?>?pg=list&list=customers&s_active=0"><i class="fa fa-circle"></i>مشتریان فعال</a></li>
            <li><a href="<?php echo HOME ?>?pg=list&list=customers&s_site=herat"><i class="fa fa-circle"></i>مشتریان هرات</a></li>
            <li><a href="<?php echo HOME ?>?pg=list&list=customers&s_site=herat"><i class="fa fa-circle"></i>مشتریان مزار</a></li>
            <li><a href="<?php echo HOME ?>?pg=list&list=customers&s_site=herat"><i class="fa fa-circle"></i>مشتریان پروان</a></li>

          </ul>
        </li>








        <li class="treeview">
          <a href="#">
          <i class="fas fa-toolbox"></i>
            <span>انبار</span>
            <span class="pull-left-container">
              <span class="label label-primary pull-left">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="<?php echo HOME ?>?pg=ticket"><i class="fa fa-circle"></i>تکت جدید</a></li>
          <li><a href="<?php echo HOME ?>?pg=list"><i class="fa fa-circle"></i>همه تکتها</a></li>
            <li><a href="<?php echo HOME ?>?pg=list&s_completed=99"><i class="fa fa-circle"></i>تکتهای باز</a></li>
            <li><a href="<?php echo HOME ?>?pg=list&s_tag=1268"><i class="fa fa-circle"></i>تکتهای در حال اجراء</a></li>
            <li><a href="<?php echo HOME ?>?pg=list&s_completed=100"><i class="fa fa-circle"></i>تکتهای بسته شده</a></li>
          </ul>
        </li>


        <li class="<?php echo is_get('pg')=='hr' ? 'active' : ''; ?> <?php echo is_get('list')=='leaves' ? 'active' : ''; ?> treeview">
          <a href="#">
          <i class="fas fa-user-alt-slash"></i>
            <span>رخصتی ها</span>
            <span class="pull-left-container">
              <span class="label label-primary pull-left">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
          <li <?php echo is_get('pg')=='hr' ? 'class="active"' : ''; ?>><a href="<?php echo HOME ?>?pg=hr"><i class="fa fa-circle"></i>درخواست رخصتی جدید</a></li>
            <li <?php echo is_get('requests')=='100' ? 'class="active"' : ''; ?>><a href="<?php echo HOME ?>?pg=list&list=leaves&requests=100"><i class="fa fa-circle"></i>درخواستیهای من</a></li>
            <li <?php echo is_get('requests')=='1' ? 'class="active"' : ''; ?>><a href="<?php echo HOME ?>?pg=list&list=leaves&requests=1"><i class="fa fa-circle"></i>درخواست جایگزینی</a></li>
            <li <?php echo is_get('requests')=='2' ? 'class="active"' : ''; ?>><a href="<?php echo HOME ?>?pg=list&list=leaves&requests=2"><i class="fa fa-circle"></i>درخواستهای رخصتی</a></li>
            <li <?php echo is_get('requests')=='3' ? 'class="active"' : ''; ?>><a href="<?php echo HOME ?>?pg=list&list=leaves&requests=3"><i class="fa fa-circle"></i>لیست کل درخواستها</a></li>
          </ul>
        </li>


        <li class="treeview">
          <a href="#">
          <i class="fas fa-user-clock"></i>
            <span>اضافه کاری ها</span>
            <span class="pull-left-container">
              <span class="label label-primary pull-left">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="<?php echo HOME ?>?pg=hr&overtime=addnew"><i class="fa fa-circle"></i>درخواست اضافه کاری جدید</a></li>
          <li><a href="<?php echo HOME ?>?pg=list"><i class="fa fa-circle"></i>لیست اضافه کاریهای من</a></li>
            <li><a href="<?php echo HOME ?>?pg=list&s_completed=99"><i class="fa fa-circle"></i>درخواستهای اضافه کاری</a></li>

            <li><a href="<?php echo HOME ?>?pg=list&s_completed=100"><i class="fa fa-circle"></i>لیست اضافه کاریها</a></li>
          </ul>
        </li>



<?php 
$uid = user_uid();
global $dbase;
                    $where = " WHERE ugr_userid={$uid} AND ugr_status=1 LIMIT 15";
                    $rows = $dbase->tbl2array2('sob_ugroups','ugr_gid,ugr_id',$where);
                    $g_num = count($rows); ?>

        <li class="treeview">
          <a href="#">
          <i class="fas fa-users"></i>
            <span>گروپها</span>
            <span class="pull-left-container">
              <span class="label label-primary pull-left"><?=$g_num?></span>
            </span>
          </a>
          <ul class="treeview-menu">

          <?php
                    
                    foreach($rows as $row){
                        $num = $dbase->num_rows("Select ugr_id From sob_ugroups WHERE ugr_status=1 AND ugr_gid=".$row['ugr_gid']);
                        echo '<li><a href="'.HOME.'?pg=groups&id='.$row['ugr_gid'].'"><i class="fa fa-circle"></i>'.get_cate_name($row['ugr_gid']).' <span class="label label-info pull-left">'.$num .' نفر</span></a> </li>';
                        //echo '<span class="list-group-item"><a href="'.HOME.'?pg=groups&id='.$row['ugr_gid'].'" ><i class="fas fa-users"></i> '.get_cate_name($row['ugr_gid']).'</a><span class="label label-info pull-left">'.$num .' نفر</span></span>';
                    } 
                    ?>


          <!-- <li><a href="<?php echo HOME ?>?pg=ticket"><i class="fa fa-circle"></i>درخواست اضافه کاری جدید</a></li>
          <li><a href="<?php echo HOME ?>?pg=list"><i class="fa fa-circle"></i>لیست اضافه کاریهای من</a></li>
            <li><a href="<?php echo HOME ?>?pg=list&s_completed=99"><i class="fa fa-circle"></i>درخواستهای اضافه کاری</a></li>

            <li><a href="<?php echo HOME ?>?pg=list&s_completed=100"><i class="fa fa-circle"></i>لیست اضافه کاریها</a></li> -->
          </ul>
        </li>





        
<!--         
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>رخصتی/ اضافه کاری</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
                            
          <li><a href="<?php echo get_link('hr'); ?>">فرم درخواست رخصتی<i class="fa fa-users pull-left" aria-hidden="true"></i></a></li>
          <li><a href="<?php echo get_link('users'); ?>">فرم اضافه کار <i class="fa fa-users pull-left" aria-hidden="true"></i></a></li>

          </ul>
        </li> -->
    
        <li>
          <a href="<?php echo get_link('inbox'); ?>">
          <i class="fa fa-envelope"></i>
             <span>پیامها</span>
            <!-- <span class="pull-left-container">
              <small class="label pull-left bg-yellow">۱۲</small>
              <small class="label pull-left bg-green">۱۶</small>
              <small class="label pull-left bg-red">۵</small>
            </span> -->
          </a>
        </li>
        <li class="treeview">
          <a href="#">
          <i class="fas fa-cogs"></i>
            <span>مدیریت سیستم</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">

          <li><a href="<?php echo get_link('settings'); ?>"><i class="fa fa-cogs " aria-hidden="true"></i> <?php echo g_lbl('settings'); ?></a></li>
                                <li><a href="<?php echo get_link('users'); ?>"><i class="fa fa-ship " aria-hidden="true"></i> <?php echo g_lbl('users'); ?></a></li>
                               
                                <li><a href="<?php echo get_link('categories'); ?>&t=dep"><i class="fa fa-building " aria-hidden="true"></i> مدیریت دیپارتمنتها </a></li>    
                                <li><a href="<?php echo get_link('categories'); ?>&t=site"><i class="fa fa-building " aria-hidden="true"></i> مدیریت سایتها </a></li>    
                                <li><a href="<?php echo get_link('categories'); ?>&t=groups"><i class="fa fa-building " aria-hidden="true"></i> مدیریت گروپها </a></li>   

                                <li><a href="<?php echo get_link('categories'); ?>&t=priority"><i class="fa fa-building " aria-hidden="true"></i> مدیریت اولویتها </a></li>   
                                <li><a href="<?php echo get_link('categories' , 't', 'tickets'); ?>"><i class="fa fa-building " aria-hidden="true"></i> مدیریت دسته های تکت </a></li>  
                                
                                <li><a href="<?php echo get_link('categories' , 't', 'tickettags'); ?>"><i class="fa fa-building" aria-hidden="true"></i> مدیریت وضعیت تکتها </a></li>  

                                 <li><a href="<?php echo get_link('categories' , 't', 'leavetypes'); ?>"> نوع رخصتی </a></li>    

<!-- 
            <li><a href="<?php theme_path() ?>/pages/examples/invoice.html"><i class="fa fa-circle"></i> سفارش</a></li>
            <li><a href="<?php theme_path() ?>/pages/examples/profile.html"><i class="fa fa-circle"></i> پروفایل</a></li>
            <li><a href="<?php theme_path() ?>/pages/examples/login.html"><i class="fa fa-circle"></i> صفحه ورود</a></li>
            <li><a href="<?php theme_path() ?>/pages/examples/register.html"><i class="fa fa-circle"></i> ثبت نام</a></li>
            <li><a href="<?php theme_path() ?>/pages/examples/lockscreen.html"><i class="fa fa-circle"></i> قفل صفحه</a></li>
            <li><a href="<?php theme_path() ?>/pages/examples/404.html"><i class="fa fa-circle"></i> ارور ۴۰۴</a></li>
            <li><a href="<?php theme_path() ?>/pages/examples/500.html"><i class="fa fa-circle"></i> ارور ۵۰۰</a></li>
            <li><a href="<?php theme_path() ?>/pages/examples/blank.html"><i class="fa fa-circle"></i> صفحه خالی</a></li>
            <li><a href="<?php theme_path() ?>/pages/examples/pace.html"><i class="fa fa-circle"></i> صفحه سریع</a></li> -->
          </ul>
        </li>
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>چندسطحی</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle"></i> سطح اول</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle"></i> سطح اول
                <span class="pull-left-container">
                  <i class="fa fa-angle-right pull-left"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle"></i> سطح دوم</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle"></i> سطح دوم
                    <span class="pull-left-container">
                      <i class="fa fa-angle-right pull-left"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle"></i> سطح سوم</a></li>
                    <li><a href="#"><i class="fa fa-circle"></i> سطح سوم</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle"></i> سطح اول</a></li>
          </ul>
        </li> -->
        <!-- <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>مستندات</span></a></li>
        <li class="header">برچسب ها</li>
        <li><a href="#"><i class="fa fa-circle text-red"></i> <span>مهم</span></a></li>
        <li><a href="#"><i class="fa fa-circle text-yellow"></i> <span>هشدار</span></a></li>
        <li><a href="#"><i class="fa fa-circle text-aqua"></i> <span>اطلاعات</span></a></li> -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>