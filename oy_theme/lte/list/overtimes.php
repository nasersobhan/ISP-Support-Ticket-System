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
            <input type="text" name="s_text" value="<?php echo is_get('s_text'); ?>" style="width:180px;" placeholder="کلمه" class="form-control input-sm m-a-2"></div>
 



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
                        <th>نام</a></th>
                        <th> زمان</a></th>
                
                     
                        
                        <th>وضعیت</th>
                        <th>عملیات</th>
                    </tr>
                    <?php 

                $uid = user_uid();


                if(have_post()){
                    while(have_post()) : the_post();  
                        $owner = get_ove_uid();
                        $status = '<span class="label label-warning">در حال انتظار</span>';
                        if (get_ove_approve() == 1)
                            $status = '<span class="label label-success">تایید شده</span>';
                        if (get_ove_approve() == 2)
                            $status = '<span class="label label-danger">رد شده</span>';

                        echo '<tr>';
                        echo '<td>'.user_name_ex($owner).'</td>';
                        echo '<td>'.get_ove_formtime().' تا '.get_ove_totime().'</td>';
                        
           
              
                        echo '<td>'.($status).'</td>';
                        echo '<td class="text-center">
                                    <a data-toggle="modal" data-target="#Uni-modal"  href="'.get_link('hr','lid',get_ove_id()).' #main-form"><i class="fas fa-eye"></i></a>';
                        if($owner == $uid){
                        echo '<a data-toggle="modal" data-target="#Uni-modal"   href="'.HOME.'?pg=hr&eid=' . get_ove_id() . ' #mainticket"><i class="fas fa-edit"></i></a> 
                        <a confmsg="آیا مطمئن هستید این تکت را حذف میکنید؟"  class="text-danger" href="'.HOME.'?pg=hr&delete='. get_ove_id() .'"><i class="fas fa-minus-square"></i></a>
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