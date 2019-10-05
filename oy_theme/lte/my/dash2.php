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
        <!-- <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"></span>
              <span class="info-box-number">93,139</span>
            </div>

          </div>
  
        </div> -->
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- =========================================================== -->

     

      <!-- =========================================================== -->


    </section>

</div>










<?php get_footer() ?>