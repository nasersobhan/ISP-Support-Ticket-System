<?php get_header(); ?>
<div id="view">
    
<?php if(have_post()) { while(have_post()) : the_post();   ?>
        <table id="datatbl" class="table well">
  
  
  
 <tr>
     <th colspan="2">نمایش</th>
 
  </tr>
  
  <tr>
    <th width="100px">نام شرکت:</th>
    <td>
    
     <?php echo get_cate_name(get_mon_name()); ?>

    

    
    </td>
  </tr>
  <tr>
    <th>نوع پول:</th>
    <td><?php echo get_cate_name(get_mon_mt()) ?></td>
  </tr>
   <tr>
    <th>مقدار:</th>
    <td><?php mon_rmoney() ?>
    </td>
  </tr>
   <tr>
    <th>یک دالر :</th>
    <td><?php mon_rated() ?>
    </td>
  </tr>
   <tr>
    <th>به دالر:</th>
    <td><?php mon_doller() ?></td>
  </tr>
   
   <tr>
    <th valign="top">توضیحات:</th>
    <td><?php echo nl2br(get_mon_discription()) ?>
   </td>
  </tr>
            <tr>
<th>تاریخ : </th>
 <td><?php  mon_sdate()  ?> - <?php mon_date()  ?>    </td>
  </tr>
   <tr>
  
       <th></th>     <td>
 <input  type="button" name="Send" value="<?php echo g_lbl('edit'); ?>"   /> <input type="button" name="Send" value="<?php echo g_lbl('delete'); ?>"  /></td>
 
  </tr>
 
</table>
<?php endwhile; } ?> 
        
        
        
</div>
<?php get_footer() ?>
    
