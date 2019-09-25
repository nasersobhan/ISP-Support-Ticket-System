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
            <input type="hidden" value="customers" name="list"/>
            <div class="form-group">
            <input type="text" name="s_text" value="<?php echo is_get('s_text') ?? is_get('s_text'); ?>" style="width:200px;" placeholder="متن قابل جستجو" class="form-control input-sm m-a-2"></div>
            
            <div class="form-group">
            <input type="text" name="s_cid" value="<?php echo is_get('s_cid') ?? is_get('s_cid'); ?>" style="width:80px;" placeholder="شناسه مشتری" class="form-control input-sm m-a-2"></div>
         
  
  


            <input type="submit" value="جستجو" class="btn btn-default btn-sm">
            </form></nav>
            </div>  
                <table class="table table-borderd">
                    <tr>
                        <th><a href="<?php echo get_current_url().'&order_name='.(is_get('order_name')=='a' ? 'd' : 'a'); ?>"><?php echo (is_get('order_name') ? (is_get('order_name')=='a' ? '<i class="fas fa-sort-up"></i> ' : '<i class="fas fa-sort-down"></i> ') : '<i class="fas fa-sort"></i> '); ?> نام</a></th>
                        <th><a href="<?php echo get_current_url().'&order_time='.(is_get('order_time')=='a' ? 'd' : 'a'); ?>">
                        <?php echo (is_get('order_time') ? (is_get('order_time')=='a' ? '<i class="fas fa-sort-up"></i> ' : '<i class="fas fa-sort-down"></i> ') : '<i class="fas fa-sort"></i> '); ?> 
                          تاریخ فعال شدن </a></th>
                        <th>تلفن</th>
                        <th>شناسه</th>
                        <th><a href="<?php echo get_current_url().'&order_package='.(is_get('order_package')=='a' ? 'd' : 'a'); ?>">
                        <?php echo (is_get('order_package') ? (is_get('order_package')=='a' ? '<i class="fas fa-sort-up"></i> ' : '<i class="fas fa-sort-down"></i> ') : '<i class="fas fa-sort"></i> '); ?> 
                        پکیج</a></th>
                        
                        <th>IP</th>
                        <th>عملیات</th>
                    </tr>
                    <?php 




                if(have_post()){
                    while(have_post()) : the_post();  

                        echo '<tr>';
                        echo '<td>'.get_cus_name().'</td>';
                        echo '<td>'.get_cus_activedate().'</td>';
                        echo '<td>'.get_cus_phone().'</td>';
                        echo '<td>'.(get_cus_cid()).'</td>';
                        echo '<td><span class="label label-warning">'.(get_cus_package()).'</span></td>';
                        echo '<td><span class="label label-info">'.(get_cus_publicip()).'</span></td>';
                        echo '<td class="text-center">
                        <a data-toggle="modal" data-target="#Uni-modal"   href="'.HOME.'?pg=customer&id=' . get_cus_id() . ' #main-content"><i class="fas fa-eye"></i></a>
                                    <a data-toggle="modal" data-target="#Uni-modal"   href="'.HOME.'?pg=customer&eid=' . get_cus_id() . ' #main-content"><i class="fas fa-edit"></i></a> 
                                    <a confmsg="آیا مطمئن هستید این مشتری را حذف میکنید؟"  class="text-danger" href="'.HOME.'?pg=customer&delete='. get_cus_id() .'"><i class="fas fa-minus-square"></i></a>
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

<?php get_footer() ?>