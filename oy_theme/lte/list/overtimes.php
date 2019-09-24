<?php get_header(); ?>
<div class="content-box">
    <div class="col-md-12">
        <div class="panel panel-default" >
            <div class="panel-heading">
                <h3 class="panel-title">لیست تکتها</h3>
            </div>
            <div  class="panel-body "> 
            <?php $message = get_message(false);
            if($message){
                echo '<div class="alert alert-info" role="alert">'.$message.'</div>';
            } ?>
            <div>
            <nav class="navbar navbar-default" style="border:1px solid #ddd; background-color: transparent" role="navigation">
            <form class="navbar-form" method="GET" action="<?php echo HOME ?>" role="search">
            <input type="hidden" value="list" name="pg"/>
            <div class="form-group">
            <input type="text" name="s_text" value="<?php echo is_get('s_text') ?? is_get('s_text'); ?>" style="width:200px;" placeholder="متن قابل جستجو" class="form-control input-sm m-a-2"></div>
            
            <div class="form-group">
            <input type="text" name="s_cid" value="<?php echo is_get('s_cid') ?? is_get('s_cid'); ?>" style="width:80px;" placeholder="شناسه مشتری" class="form-control input-sm m-a-2"></div>
         
            
            <div class="form-group">
            <select name="s_type" style="width:100px;" class="form-control input-sm m-a-2">
            <option value="">نوع</option>
            <option value="1">نصب جدید</option><option value="2">دیگر</option>
           </select></div>

           <div class="form-group">
           <select name="s_priority" style="width:200px;" class="form-control input-sm m-a-2">
           <option value="">اولویت</option>
           <?php
             $oild =  cat_2arr_l('priority',0,'fa_AF');
             $koo_now=0;
             if(is_get('s_priority'))
              $koo_now = is_get('s_priority');
             
            foreach($oild as $id => $label){
                $selected = ($koo_now==$id ? 'selected' : '');
                 echo '<option '.$selected.' value="'.$id.'">'.$label.'</option>';
            }
            ?>
          </select></div>


           <div class="form-group">
           <select name="s_category" style="width:200px;" class="form-control input-sm m-a-2">
           <option value="0">دسته بندی</option>
           <?php
             $oild =  cat_2arr_l('tickets',0,'fa_AF');
             $koo_now=0;
             if(is_get('s_category'))
              $koo_now = is_get('s_category');
             
            foreach($oild as $id => $label){
                $selected = ($koo_now==$id ? 'selected' : '');
                 echo '<option '.$selected.' value="'.$id.'">'.$label.'</option>';
            }
            ?>
          </select></div>

          <div class="form-group">
           <select name="s_tag" style="width:200px;" class="form-control input-sm m-a-2">
           <option value="">دسته وضعیت</option>
           <?php
             $oild =  cat_2arr_l('tickettags',0,'fa_AF');
             $koo_now=0;
             if(is_get('s_tag'))
              $koo_now = is_get('s_tag');
             
            foreach($oild as $id => $label){
                $selected = ($koo_now==$id ? 'selected' : '');
                 echo '<option '.$selected.' value="'.$id.'">'.$label.'</option>';
            }
            ?>
          </select></div>

          <div class="form-group">
           <select name="s_completed" style="width:100px;" class="form-control input-sm m-a-2">
           <option value="">همه</option>
           <option value="100">تکمیل شده</option>
           <option value="99">تکمیل نشده</option>
          </select></div>

            <input type="submit" value="جستجو" class="btn btn-default btn-sm">
            </form></nav>
            </div>  
                <table class="table table-borderd">
                    <tr>
                        <th><a href="<?php echo get_current_url().'&order_title='.(is_get('order_title')=='a' ? 'd' : 'a'); ?>"><?php echo (is_get('order_title') ? (is_get('order_title')=='a' ? '<i class="fas fa-sort-up"></i> ' : '<i class="fas fa-sort-down"></i> ') : '<i class="fas fa-sort"></i> '); ?> عنوان</a></th>
                        <th><a href="<?php echo get_current_url().'&order_time='.(is_get('order_time')=='a' ? 'd' : 'a'); ?>">
                        <?php echo (is_get('order_time') ? (is_get('order_time')=='a' ? '<i class="fas fa-sort-up"></i> ' : '<i class="fas fa-sort-down"></i> ') : '<i class="fas fa-sort"></i> '); ?> 
                         زمان ثبت</a></th>
                        <th>مسئول</th>
                        <th>مشتری</th>
                        <th><a href="<?php echo get_current_url().'&order_cat='.(is_get('order_cat')=='a' ? 'd' : 'a'); ?>">
                        <?php echo (is_get('order_cat') ? (is_get('order_cat')=='a' ? '<i class="fas fa-sort-up"></i> ' : '<i class="fas fa-sort-down"></i> ') : '<i class="fas fa-sort"></i> '); ?> 
                         دسته بندی</a></th>
                        
                        <th>وضعیت</th>
                        <th>عملیات</th>
                    </tr>
                    <?php 




                if(have_post()){
                    while(have_post()) : the_post();  

                        $done = '<span class="label label-warning">باز</span>';
                        if (get_tic_progress() == '100')
                            $done = '<span class="label label-success">تکمیل</span>';
                        echo '<tr>';
                        echo '<td>'.get_tic_title().' '.$done.'</td>';
                        echo '<td>'.get_tic_time().'</td>';
                        echo '<td>'.toidlabel(get_tic_assigned()).'</td>';
                        echo '<td>'.(get_tic_cid()).'</td>';
                        echo '<td><span class="label label-info">'.get_cate_name(get_tic_category()).'</span></td>';
                        echo '<td><span class="label label-warning">'.get_cate_name(get_tic_tag()).'</span></td>';
                        echo '<td class="text-center">
                                    <a href="'.get_link('ticket','id',get_tic_id()).'"><i class="fas fa-eye"></i></a>
                                    <a data-toggle="modal" data-target="#Uni-modal"   href="'.HOME.'?pg=ticket&eid=' . get_tic_id() . ' #mainticket"><i class="fas fa-edit"></i></a> 
                                    <a confmsg="آیا مطمئن هستید این تکت را حذف میکنید؟"  class="text-danger" href="'.HOME.'?pg=ticket&delete='. get_tic_id() .'"><i class="fas fa-minus-square"></i></a>
                              </td>';
                        echo '</tr>';
                    ?>

<?php
    endwhile;
}
?>
                <tr>
                <td class="text-center" colspan="7"> <?Php global $pagin;echo $pagin; ?></td>
                </tr>
                </table>

               
            </div>
        </div>
    </div>
</div> 

<?php get_footer() ?>