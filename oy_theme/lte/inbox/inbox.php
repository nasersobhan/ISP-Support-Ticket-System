<?php get_header(); 


?>
<div class="content-box">


     
    <div class="col-md-4">
    <div class="panel panel-default" >
    <div class="panel-body "> 
    <a href="<?php echo HOME.'?pg=inbox&add=1'?>" class="btn-warning btn-block btn-lg">پیام جدید</a>
    <br>
    <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">پوشه ها</h3>

            
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="<?php echo get_link('inbox'); ?>"><i class="fa fa-inbox"></i> ابنباکس
                  <span class="label label-primary pull-left">12</span></a></li>
                <li><a href="<?php echo get_link('inbox','sent','1'); ?>"><i class="fa fa-envelope-o"></i> ارسال شده</a></li>
                </li>
                <li><a href="<?php echo get_link('inbox','deleted','1'); ?>"><i class="fa fa-trash-o"></i> سطح زباله</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>


        </div> </div>



</div>


<div class="col-md-8">
    <div class="panel panel-default" >

    <div  class="panel-body ">   
        <div id="addbox">
    
    <?php if (is_get('id')) {
    theme_include('inbox/conversation');
}
elseif(is_get('add')) {
    theme_include('inbox/add');
}else {
    theme_include('inbox/list'); 
}

?>

</div>
</div>

</div>

    </div>
</div> 

<?php get_footer() ?>