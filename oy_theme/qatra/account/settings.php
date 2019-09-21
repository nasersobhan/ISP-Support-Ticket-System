<?php get_header(); ?>
<div class="content-box">
    <div class="col-md-4">

        <div class="panel panel-default" >
                 <div class="panel-heading ">
						<h4> <?php echo g_lbl('changepass'); ?>	</h4>
					</div>

  <div class="panel-body ">                
    
<form disabled class="form-horizontal " action="<?php echo get_link('account','pwd','change') ?>"   name="chng_pass" id="chng_pass" method="post" role="form" >

   <div class="form-group">
     <?php get_message() ?>
  </div>
  
  
   <div class="form-group">
   <label for="inputPassword3" class="col-sm-4 control-label"> <?php echo g_lbl('currentpass'); ?>: </label>
        <div class="col-sm-7">
        <input type="password" class="form-control col-md-12" required id="inputEmail3" name="oldpass">
    </div>
  </div>
 
 <div class="form-group">
 <label for="inputPassword3" class="col-sm-4 control-label"><?php echo g_lbl('newpass'); ?>: </label>
    <div class="col-sm-7">
        <input type="password" class="form-control col-md-12" required id="inputEmail3" name="newpass">
    </div>
    
  </div>
 
     <div class="form-group">
     <label for="inputPassword3" class="col-sm-4 control-label"><?php echo g_lbl('renewpass'); ?>: </label>
    <div class="col-sm-7">
        <input type="password" class="form-control col-md-12" required id="inputEmail3" name="renewpass">
    </div>
      
  </div>
 
       
  
   <div class="form-group">
    
    <div class="col-sm-12 ">
    		<button type="submit" id="submit_btn" class="btn btn-success"><?php echo g_lbl('save'); ?></button>&nbsp; &nbsp; &nbsp;
        
       </div>
  </div>
</form>


 </div>
            
        </div>     
                 
                 
                 
                 
                 
 <div class="panel panel-default" >
                 <div class="panel-heading ">
						<h4>
                                                <?php echo g_lbl('changeemail'); ?>
						</h4>
					</div>

   
  <div class="panel-body">       
            
  <?php //echo get_link('account','eml','change') ?>
    
    <form class="form-horizontal" action="<?php echo get_link('account','eml','change') ?>" name="chng_email" id="chng_email" method="post" role="form" >

   <div class="form-group">
     <?php get_message() ?>

  </div>
  
   <div class="form-group">
   <label for="inputPassword3" class="col-sm-4 control-label"><?php echo g_lbl('newemail'); ?>: </label>
    <div class="col-sm-7">
        <input type="email" class="form-control col-md-12" required id="inputEmail3" name="neweml">
    </div> 
  </div>
 
     <div class="form-group">
     <label for="inputPassword3" class="col-sm-4 control-label"><?php echo g_lbl('renewemail'); ?>: </label>
    <div class="col-sm-7">
        <input type="email" class="form-control col-md-12" required id="inputEmail3" name="reneweml">
    </div>
  </div>
 
        
   <div class="form-group">
   <label for="inputPassword3" class="col-sm-4 control-label"><?php echo g_lbl('currentpass'); ?>: </label>
    <div class="col-sm-7">
        <input type="password" class="form-control col-md-12" required id="inputEmail3" name="oldpass">
    </div>  
  </div>
 

       
  
   <div class="form-group">
    
    <div class="col-sm-12 ">
    		<button type="submit" id="submit_btn" class="btn btn-success"><?php echo g_lbl('save'); ?></button>&nbsp; &nbsp; &nbsp;
        
       </div>
  </div>
</form>
   </div>  </div>   
    
             </div>      
        
        

<!--  
   <div class="panel panel-default col-md-4" >

                 <div class="panel-heading ">
						<h3><?php echo g_lbl('accountinfo'); ?></h3>
					</div>

   
  <div class="panel-body">       
    
    
    
    
     <form class="form-horizontal" ajaxform  action="<?php echo get_link('account','info','change') ?>" name="chng_info" id="chng_info" method="post" role="form" >

   <div class="form-group">
     <?php get_message() ?>
    
  </div>
  
   <div class="form-group">

    <div class="col-sm-7">
        <input type="text" class="form-control col-md-12" value="<?php echo acc_info('name') ?>" required id="inputEmail3" name="myname">
    </div>    <label for="inputPassword3" class="col-sm-4 control-label"><?php echo g_lbl('name'); ?>: </label>
  </div>
 
     <div class="form-group">
  
    <div class="col-sm-7">
        <input type="text" class="form-control col-md-12" value="<?php echo acc_info('phone') ?>" required id="inputEmail3" name="myphone">
    </div>  <label for="inputPassword3" class="col-sm-4 control-label"><?php echo g_lbl('phone'); ?>: </label>
  </div>
 
        


       
  
   <div class="form-group">
    
    <div class="col-sm-12 ">
    		<button type="submit" id="submit_btn" class="btn btn-success"><?php echo g_lbl('save'); ?></button>&nbsp; &nbsp; &nbsp;
        
       </div>
  </div>
</form>
      </div> 
  
   </div> -->



   <div class="panel panel-default col-md-8" >
    
   

 
                 <div class="panel-heading ">
						<h3>
                                                  <?php echo g_lbl('accesshistory'); ?>
						</h3>
					</div>

   
  <div class="panel-body">       


        
     
     
         <table class="table table-condensed">
             <tr>
             <td> TYPE </td>
             <td> Time(Server time) </td>
             <td> OS </td>
             <td> Browser </td>
             <td> IP </td>
             </tr>
          <?php 
                
                
                     $tbl_pre = TBL_PIX; $uid = user_uid();
             get_rows("SELECT * FROM {$tbl_pre}historyuser_oy WHERE his_uid={$uid}  order by his_id DESC LIMIT 20");
              if(posts_av()) {while(posts_av()) :get_record();
              
                ?>
             
             
             <tr class="<?php if(get_his_pass()=='loggedin') echo 'success'; else echo 'info'; ?>">
              <td> <?php his_pass() ?> </td>
             <td> <?php his_time() ?> </td>
             <td>  <?php his_ossystem() ?> </td>
             <td> <?php his_browser() ?> </td>
             <td> <?php his_ip() ?> </td>
             </tr>
             
          
                <?php
              endwhile; }
              end_rows();
             
                
                 ?> 
     
     </table>


</div>

</div></div>
    
    </div>
<?php get_footer() ?>