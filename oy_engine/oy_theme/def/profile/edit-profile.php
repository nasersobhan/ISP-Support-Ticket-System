<?php get_header();  ?>




<div class="row">
    <div class="col-md-9">

        
           

        <div id="crop-cover" >

  <div class="avatar-view">
<img src="<?php global $user; echo $user->get_cover_url() ?>" title="Change the Cover Image" class=" img-responsive img-thumbnail center-block" id="coverimgbox"  />

</div>








 <!-- Cropping modal -->
 <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" >
      <div class="modal-dialog modal-lg" style="z-index: 10000000000000000;">
        <div class="modal-content">
          <form class="avatar-form" action="<?php echo get_link('profile', 'action','cover'); ?>" enctype="multipart/form-data" method="post">
            <div class="modal-header">
              <button class="close" data-dismiss="modal" type="button">&times;</button>
              <h4 class="modal-title" id="avatar-modal-label">Change Cover Photo</h4>
            </div>
            <div class="modal-body">
              <div class="avatar-body">

                <!-- Upload image and data -->
                <div class="avatar-upload">
                <input class="avatar-ratio" value="3/1" name="avatar_ratio" type="hidden">
                  <input class="avatar-src" name="avatar_src" type="hidden">
                  <input class="avatar-data" name="avatar_data" type="hidden">
                  <label for="avatarInput">Local upload</label>
                  <input class="avatar-input" id="avatarInput" name="avatar_file" type="file">
                </div>

                <!-- Crop and preview -->
                <div class="row">
             
                    <div class="avatar-wrapper"></div>
          
                  
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
              <button class="btn btn-primary avatar-save" type="submit">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
			
   
  
   
</div>


<div id="crop-avatar">


  <div class="avatar-view" >
     <img src="<?php global $user; echo $user->get_avatar_url() ?>" title="Change the avatar" class="img-circle img_croped img-thumbnail" id="avatarimgbox"  />
    </div>



    <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1" >
      <div class="modal-dialog modal-lg" style="z-index: 10000000000000000;">
        <div class="modal-content">
          <form class="avatar-form" action="<?php echo get_link('profile', 'action','avatar'); ?>" enctype="multipart/form-data" method="post">
            <div class="modal-header">
              <button class="close" data-dismiss="modal" type="button">&times;</button>
              <h4 class="modal-title" id="avatar-modal-label">Change Avatar</h4>
            </div>
            <div class="modal-body">
              <div class="avatar-body">

                 Upload image and data 
                <div class="avatar-upload">
                 <input class="avatar-ratio" value="1" name="avatar_ratio" type="hidden">
                  <input class="avatar-src" name="avatar_src" type="hidden">
                  <input class="avatar-data" name="avatar_data" type="hidden">
                  <label for="avatarInput">Local upload</label>
                  <input class="avatar-input" id="avatarInput" name="avatar_file" type="file">
                </div>

                 Crop and preview 
                <div class="row">
                  <div class="col-md-9">
                    <div class="avatar-wrapper"></div>
                  </div>
                  <div class="col-md-3">
                    <div class="avatar-preview preview-lg"></div>
                    <div class="avatar-preview preview-md"></div>
                    <div class="avatar-preview preview-sm"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
              <button class="btn btn-primary avatar-save" type="submit">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div> 

   

</div>
  
        
        
        
        
        
        
        
        
        
        
        
        
        <div class="panel panel-default" style="margin-top:10px">
    
   

 
        

   
  <div class="panel-body">                

<form class="form-horizontal"  action="<?php  get_link('profile','','') ?>" name="edit_profile" id="edit_profile" method="post" role="form" >


  
   
   
  
   <div class="form-group">
     <?php get_message() ?>
    
  </div>
  
  
   <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Name: </label>
    <div class="col-sm-3">
        <input type="text" value="<?php inf_name()?>" class="form-control" required id="inputEmail3" name="inf_name">
    </div>
    
    <div class="col-sm-3 clear">
        <input type="text" placeholder="Last Name" value="<?php inf_sname()?>" class="form-control" id="inf_sname" name="inf_sname">
    </div>
 
  </div>
 



 <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Date Of Birth:</label>
    <div class="col-sm-2">
        <input type="date"  class="form-control" value="<?php inf_dob() ?>" id="inf_dob" name="inf_dob" style="width: 120px">
    </div>
   
    <div class="col-sm-2 clear-left">
     
       <select class="form-control select2 " name="inf_gender">
           <option>Select Gender</option>
     	<option <?php echo (get_inf_gender()=='Male'? 'Selected' : '');  ?> value="Male">Male</option>
        <option <?php echo (get_inf_gender()=='Female'? 'Selected' : '');  ?> value="Female">Female</option>
      
     </select>
     
     </div>
     
     
   
    <div class="col-sm-2 clear">
     
       <select class="form-control select2" name="inf_martialstat">
           <option>Martial Status</option>
     	<option <?php echo (get_inf_martialstat()=='Single'? 'Selected' : '');  ?> value="Single">Single</option>
        <option <?php echo (get_inf_martialstat()=='Engaged'? 'Selected' : '');;  ?> value="Engaged">Engaged</option>
        <option <?php echo (get_inf_martialstat()=='Married'? 'Selected' : '');  ?> value="Married">Married</option>
     </select>
     
     </div>
     
  </div>
 





 
   <div class="form-group">

    <label for="inf_phone" class="col-sm-2 control-label">Mobile: </label>
   
    <div class="col-sm-3">
       <input type="text" value="<?php 	inf_phone()?>" class="form-control" id="inf_phone" name="inf_phone">
    </div>
   
    <div class="col-sm-3 clear">
        <input type="text" value="<?php inf_email()?>" class="form-control" placeholder="Public email" id="inf_email" name="inf_email">
    </div>
  </div>


 
   <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Home Town: </label>
 
   
    <div class="col-sm-6 clear">
         <select class=" location2 form-control" name="inf_hcountry" id="inf_hcountry" >
             <?php 
	
	 $parent = get_inf_hcountry();
         echo '<option value="'.$parent.'" selected>'.get_location($parent).'</option>';
	 ?>
                    
            </select>
        
      
    </div>
  </div>


   <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Current: </label>
    <div class="col-sm-6">
       <?php 
	// $set['selected'] = get_inf_ccountry();
	//echo get_cc2dd('CO',"%ALL",  'name="inf_ccountry" id="inf_ccountry" class="form-control select2"', $set) ?>
        
         <select class=" location2 form-control" name="inf_ccountry" id="inf_ccountry" >
                   <?php 
	
	 $parent = get_inf_ccountry();
         echo '<option value="'.$parent.'" selected>'.get_location($parent).'</option>';
	 ?>
            </select>
    </div>
   
   
  </div>



       
  
   <div class="form-group">
    
    <div class="col-sm-10 pull-right">
    		<button type="submit" id="submit_btn" class="btn btn-success">Save changes</button>&nbsp; &nbsp; &nbsp;
        
       </div>
  </div>

  
  


  


  
  
  
  
  
  
  
  
  

</form>







  


  
   </div>   </div>   </div>
  
      
      
      
      
 
    


    
    




  <div class="col-md-3">
<?php get_sidebar(); ?>
        </div>
     


<?php get_footer() ?>










