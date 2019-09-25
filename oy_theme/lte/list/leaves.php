<?php get_header(); ?>
<div class="content-box">
    <div class="col-md-12">

            <?php $message = get_message(false);
            if($message){
                echo '<div class="alert alert-info" role="alert">'.$message.'</div>';
            } ?>
            <div>
            <nav class="navbar navbar-default" style="border:1px solid #ddd; background-color: transparent" role="navigation">
            <form class="navbar-form" method="GET" action="<?php echo HOME ?>" role="search">
            <input type="hidden" value="list" name="pg"/>
            <input type="hidden" value="leaves" name="list"/>
            <input type="hidden" value="<?php echo is_get('requests'); ?>" name="requests"/>
            
            <div class="form-group">
            <input type="text" name="s_cid" value="<?php echo is_get('s_cid') ? (is_numeric(is_get('s_cid')) ? user_name_ex(is_get('s_cid')) : is_get('s_cid'))  : ''; ?>" style="width:180px;" placeholder="نام" data-only="u" class="form-control input-sm m-a-2 usergroupList"></div>
 


          <div class="form-group">
           <select name="s_type" style="width:200px;" class="form-control input-sm m-a-2">
           <option value="">نوع رخصتی</option>
           <?php
             $oild =  cat_2arr_l('leavetypes',0,'fa_AF');
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
           <select name="s_accepted" style="width:100px;" class="form-control input-sm m-a-2">
           <option value="">همه</option>
           <option value="5">در حال انتظار</option>
           <option value="1">تایید شده</option>
           <option value="2">رد شده</option>
          </select></div>

            <input type="submit" value="جستجو" class="btn btn-default btn-sm">
            </form></nav>
            </div>  
                <table class="table table-borderd">
                    <tr>
                        <th><a href="<?php echo get_current_url().'&order_title='.(is_get('order_title')=='a' ? 'd' : 'a'); ?>"><?php echo (is_get('order_title') ? (is_get('order_title')=='a' ? '<i class="fas fa-sort-up"></i> ' : '<i class="fas fa-sort-down"></i> ') : '<i class="fas fa-sort"></i> '); ?>نام</a></th>
                        <th><a href="<?php echo get_current_url().'&order_time='.(is_get('order_time')=='a' ? 'd' : 'a'); ?>">
                        <?php echo (is_get('order_time') ? (is_get('order_time')=='a' ? '<i class="fas fa-sort-up"></i> ' : '<i class="fas fa-sort-down"></i> ') : '<i class="fas fa-sort"></i> '); ?> 
                         تاریخ</a></th>
                        <th>تعداد</th>
                        <th>نوع</th>
                        <th><a href="<?php echo get_current_url().'&order_cat='.(is_get('order_cat')=='a' ? 'd' : 'a'); ?>">
                        <?php echo (is_get('order_cat') ? (is_get('order_cat')=='a' ? '<i class="fas fa-sort-up"></i> ' : '<i class="fas fa-sort-down"></i> ') : '<i class="fas fa-sort"></i> '); ?> 
                          شخص جایگزین</a></th>
                        
                        <th>وضعیت</th>
                        <th>عملیات</th>
                    </tr>
                    <?php 

                $uid = user_uid();


                if(have_post()){
                    while(have_post()) : the_post();  
                        $owner = get_lea_uid();
                        $status = '<span class="label label-warning">در حال انتظار</span>';
                        if (get_lea_accepted() == 1)
                            $status = '<span class="label label-success">تایید شده</span>';
                        if (get_lea_accepted() == 2)
                            $status = '<span title="<strong>دلیل:</strong><br/>'.get_lea_whynotaccepted().'" class="tip label label-danger">رد شده</span>';
                        
                        $replacestatus = '<span class="label label-warning">در حال انتظار</span>';
                        if (get_lea_replaceaccept() == 1)
                            $replacestatus = '<span class="label label-success">تایید شده</span>';
                        if (get_lea_replaceaccept() == 2)
                            $replacestatus = '<span  class="label label-danger">رد شده</span>';
                        echo '<tr>';
                        echo '<td>'.user_name_ex($owner).'</td>';
                        echo '<td>'.get_lea_fdate().' تا '.get_lea_edate().'</td>';
                        
                        echo '<td>'.(get_lea_number().' '.get_lea_numtype()).'</td>';
                        echo '<td>'.get_cate_name(get_lea_type()).'</td>';
                        echo '<td>'.user_name_ex(get_lea_replacement()).' '.$replacestatus.'</td>';
                        echo '<td>'.($status).'</td>';
                        echo '<td class="text-center">
                                    <a data-toggle="modal" data-target="#Uni-modal"  href="'.get_link('hr','lid',get_lea_id()).' #main-form"><i class="fas fa-eye"></i></a>';
                        if($owner == $uid){
                        echo '<a data-toggle="modal" data-target="#Uni-modal"   href="'.HOME.'?pg=hr&eid=' . get_lea_id() . ' #mainticket"><i class="fas fa-edit"></i></a> 
                        <a confmsg="آیا مطمئن هستید این تکت را حذف میکنید؟"  class="text-danger" href="'.HOME.'?pg=hr&delete='. get_lea_id() .'"><i class="fas fa-minus-square"></i></a>
                        ';
                        }
                           echo '</td>';
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

<?php get_footer() ?>