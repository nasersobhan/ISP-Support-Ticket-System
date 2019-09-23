
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-right image">
          <img src="<?php theme_path() ?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-right info">
          <p><?php echo user_name(); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> آنلاین</a>
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
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>داشبرد</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php theme_path() ?>/index.html"><i class="fa fa-circle-o"></i> داشبرد اول</a></li>
            <li><a href="<?php theme_path() ?>/index2.html"><i class="fa fa-circle-o"></i> داشبرد دوم</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>لایه های صفحه</span>
            <span class="pull-left-container">
              <span class="label label-primary pull-left">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php theme_path() ?>/pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> نوار بالا</a></li>
            <li><a href="<?php theme_path() ?>/pages/layout/boxed.html"><i class="fa fa-circle-o"></i> باکس ها</a></li>
            <li><a href="<?php theme_path() ?>/pages/layout/fixed.html"><i class="fa fa-circle-o"></i> فیکس شده</a></li>
            <li><a href="<?php theme_path() ?>/pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> سایدبار</a></li>
          </ul>
        </li>
        <li>
          <a href="<?php theme_path() ?>/pages/widgets.html">
            <i class="fa fa-th"></i> <span>ویجت ها</span>
            <span class="pull-left-container">
              <small class="label pull-left bg-green">جدید</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>نمودارها</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php theme_path() ?>/pages/charts/chartjs.html"><i class="fa fa-circle-o"></i>نمودار ChartJS</a></li>
            <li><a href="<?php theme_path() ?>/pages/charts/morris.html"><i class="fa fa-circle-o"></i>نمودار Morris</a></li>
            <li><a href="<?php theme_path() ?>/pages/charts/flot.html"><i class="fa fa-circle-o"></i>نمودار Flot</a></li>
            <li><a href="<?php theme_path() ?>/pages/charts/inline.html"><i class="fa fa-circle-o"></i>نمودار Inline charts</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>اشیای گرافیکی</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php theme_path() ?>/pages/UI/general.html"><i class="fa fa-circle-o"></i> عمومی</a></li>
            <li><a href="<?php theme_path() ?>/pages/UI/icons.html"><i class="fa fa-circle-o"></i> آیکون</a></li>
            <li><a href="<?php theme_path() ?>/pages/UI/buttons.html"><i class="fa fa-circle-o"></i> دکمه</a></li>
            <li><a href="<?php theme_path() ?>/pages/UI/sliders.html"><i class="fa fa-circle-o"></i> اسلایدر</a></li>
            <li><a href="<?php theme_path() ?>/pages/UI/timeline.html"><i class="fa fa-circle-o"></i> تایم لاین</a></li>
            <li><a href="<?php theme_path() ?>/pages/UI/modals.html"><i class="fa fa-circle-o"></i> مدال</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>فرم ها</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php theme_path() ?>/pages/forms/general.html"><i class="fa fa-circle-o"></i> اجزای عمومی</a></li>
            <li><a href="<?php theme_path() ?>/pages/forms/advanced.html"><i class="fa fa-circle-o"></i> پیشرفته</a></li>
            <li><a href="<?php theme_path() ?>/pages/forms/editors.html"><i class="fa fa-circle-o"></i> ویرایشگر</a></li>
          </ul>
        </li>
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
        </li>
        <li>
          <a href="<?php theme_path() ?>/pages/calendar.html">
            <i class="fa fa-calendar"></i> <span>تقویم</span>
            <span class="pull-left-container">
              <small class="label pull-left bg-red">۳</small>
              <small class="label pull-left bg-blue">۱۷</small>
            </span>
          </a>
        </li>
        <li>
          <a href="<?php theme_path() ?>/pages/mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span>ایمیل ها</span>
            <span class="pull-left-container">
              <small class="label pull-left bg-yellow">۱۲</small>
              <small class="label pull-left bg-green">۱۶</small>
              <small class="label pull-left bg-red">۵</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>اطلاعات پایه</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">

          <li><a href="<?php echo get_link('settings'); ?>"><i class="fa fa-cogs " aria-hidden="true"></i> <?php echo g_lbl('settings'); ?></a></li>
                                <li><a href="<?php echo get_link('accounts'); ?>"><i class="fa fa-ship " aria-hidden="true"></i> <?php echo g_lbl('manage,accounts'); ?></a></li>
                               
                                <li><a href="<?php echo get_link('categories'); ?>&t=dep"><i class="fa fa-building " aria-hidden="true"></i> مدیریت دیپارتمنتها </a></li>    
                                <li><a href="<?php echo get_link('categories'); ?>&t=site"><i class="fa fa-building " aria-hidden="true"></i> مدیریت سایتها </a></li>    
                                <li><a href="<?php echo get_link('categories'); ?>&t=groups"><i class="fa fa-building " aria-hidden="true"></i> مدیریت گروپها </a></li>   

                                <li><a href="<?php echo get_link('categories'); ?>&t=priority"><i class="fa fa-building " aria-hidden="true"></i> مدیریت اولویتها </a></li>   
                                <li><a href="<?php echo get_link('categories' , 't', 'tickets'); ?>"><i class="fa fa-building " aria-hidden="true"></i> مدیریت دسته های تکت </a></li>  
                                
                                <li><a href="<?php echo get_link('categories' , 't', 'tickettags'); ?>"><i class="fa fa-building" aria-hidden="true"></i> مدیریت وضعیت تکتها </a></li>  

                                 <li><a href="<?php echo get_link('categories' , 't', 'leavetypes'); ?>"> نوع رخصتی </a></li>    

<!-- 
            <li><a href="<?php theme_path() ?>/pages/examples/invoice.html"><i class="fa fa-circle-o"></i> سفارش</a></li>
            <li><a href="<?php theme_path() ?>/pages/examples/profile.html"><i class="fa fa-circle-o"></i> پروفایل</a></li>
            <li><a href="<?php theme_path() ?>/pages/examples/login.html"><i class="fa fa-circle-o"></i> صفحه ورود</a></li>
            <li><a href="<?php theme_path() ?>/pages/examples/register.html"><i class="fa fa-circle-o"></i> ثبت نام</a></li>
            <li><a href="<?php theme_path() ?>/pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> قفل صفحه</a></li>
            <li><a href="<?php theme_path() ?>/pages/examples/404.html"><i class="fa fa-circle-o"></i> ارور ۴۰۴</a></li>
            <li><a href="<?php theme_path() ?>/pages/examples/500.html"><i class="fa fa-circle-o"></i> ارور ۵۰۰</a></li>
            <li><a href="<?php theme_path() ?>/pages/examples/blank.html"><i class="fa fa-circle-o"></i> صفحه خالی</a></li>
            <li><a href="<?php theme_path() ?>/pages/examples/pace.html"><i class="fa fa-circle-o"></i> صفحه سریع</a></li> -->
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
            <li><a href="#"><i class="fa fa-circle-o"></i> سطح اول</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> سطح اول
                <span class="pull-left-container">
                  <i class="fa fa-angle-right pull-left"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> سطح دوم</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> سطح دوم
                    <span class="pull-left-container">
                      <i class="fa fa-angle-right pull-left"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> سطح سوم</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> سطح سوم</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> سطح اول</a></li>
          </ul>
        </li> -->
        <!-- <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>مستندات</span></a></li>
        <li class="header">برچسب ها</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>مهم</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>هشدار</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>اطلاعات</span></a></li> -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>