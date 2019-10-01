<?php get_header(); 

$id = is_get('id');
$uid = user_uid();
$pfx_uid = 'u:'.$uid;
$site = user_site();
$dep = user_dep();
$urank = user_rank();
?>
<div id="mydash" style="background-color:#ECF0F5" class="content-box">

<section class="content">

      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fas fa-ticket-alt"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">تکتهای در حال اجرا</span>
              <span class="info-box-number">1,410</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fas fa-ticket-alt"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">تکتهای در حال انتظار</span>
              <span class="info-box-number">410</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="far fa-check-square"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">تسکهای در حال انتظار</span>
              <span class="info-box-number">خصوصی : 5 | تیمی: 445</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"></span>
              <span class="info-box-number">93,139</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- =========================================================== -->

      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">علاقه مندی ها</span>
              <span class="info-box-number">41,410</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    ۷۰ درصد افزایش
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">لایک ها</span>
              <span class="info-box-number">41,410</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                      ۷۰ درصد افزایش
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-calendar"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">رویدادها</span>
              <span class="info-box-number">41,410</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                     ۷۰ درصد افزایش
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">نظرات</span>
              <span class="info-box-number">41,410</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                     ۷۰ درصد افزایش
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- =========================================================== -->

      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>

              <p>سفارش جدید</p>
            </div>
            <div class="icon">
              <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="#" class="small-box-footer">
              اطلاعات بیشتر <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>نرخ بازگشت</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">
              اطلاعات بیشتر <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>ثبت نام</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">
              اطلاعات بیشتر <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>بازدید جدید</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">
              اطلاعات بیشتر <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

      <!-- =========================================================== -->


    </section>

</div>










<?php get_footer() ?>