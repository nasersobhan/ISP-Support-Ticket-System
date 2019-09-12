
<?php get_header();  ?>
<?php  ob_start();?>

/*$('.modal').on('shown.bs.modal',function(){      //correct here use 'shown.bs.modal' event which comes in bootstrap3
  $(this).find('iframe').attr('src','http://webserver/ooyta/accounts/index.php?pg=profile')
})*/

$(function(){
			cascadeForm = $('.form-horizontal');
			cat_parent = cascadeForm.find('#inf_hcountry');
			cat_child = cascadeForm.find('#inf_hcity');
			 
			cascadeSelect(cat_parent, cat_child);
		
        	cat_parentc = cascadeForm.find('#inf_ccountry');
			cat_childc = cascadeForm.find('#inf_ccity');
			 
			cascadeSelect(cat_parentc, cat_childc);

          
        
           
           
           
		});



var validator = new FormValidator('add_job', [{
    name: 'inf_title',
    display: 'Job Title',
    rules: 'required'
},
{
 name: 'inf_category',
 display: 'Job Category',
 rules: 'required'
},
{
 name: 'inf_cities',
 display: 'Job location',
 rules: 'required'
}

], function(errors, evt) {
    
    var SELECTOR_ERRORS = $('#error_box');
    

    if (errors.length > 0) {
        SELECTOR_ERRORS.empty();
			SELECTOR_ERRORS.append('<strong>Warning!</strong><br/>');
        for (var i = 0, errorLength = errors.length; i < errorLength; i++) {
            SELECTOR_ERRORS.append(errors[i].message + '<br/>');
        }

     
        SELECTOR_ERRORS.fadeIn(700);
    } else {
        SELECTOR_ERRORS.fadeOut(700);
    }

    if (event) {
        //event.returnValue = false;
    }else{
      evt.preventDefault();
    
    }
});




<?php 
$contents = ob_get_contents();
ob_end_clean();
addlinejs($contents);?>
<?php if(!isset($_GET['ajax'])){ ?>
<section id="profile_main">
<div class="section-content">
<div class="wrap">

  <div  class="container">
    <div  class="form-wrap" >

<div class="container-fluid">
  <div class="row">
  

   <div class="col-xs-6 col-md-3">
   
  <?php get_sidebar() ?>
   
   
   </div>
   

   <div class="col-xs-12 col-md-9">
   				 <div  class="contentbox" id="load_content">
                  
<h3>Edit Profile</h3>
<hr />

  <?php } ?>

<form class="form-horizontal col-xs-12 col-md-9"  action="<?php  get_page_url('%this','') ?>" name="edit_profile" id="edit_profile" method="post" role="form" >


  
   
   
  
   <div class="form-group">
     <?php get_message() ?>
     <div id="error_box" style="display: none;" class="alert alert-danger alert-dismissable">
        </div>
  </div>
  
  
   <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">First Name: </label>
    <div class="col-sm-4">
       <input type="text" value="<?php inf_name()?>" class="form-control" id="inputEmail3" name="inf_name">
    </div>
    <label for="inputPassword3" class="col-sm-2 control-label">Last Name: </label>
    <div class="col-sm-4">
       <input type="text" value="<?php inf_sname()?>" class="form-control" id="inputEmail3" name="inf_sname">
    </div>
 
  </div>
 



 <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Date Of Birth:</label>
    <div class="col-sm-2">
       <input type="text"  class="form-control datepicker" value="<?php inf_dob() ?>" id="inf_dob" name="inf_dob">
    </div>
     <label for="inputPassword3" class="col-sm-2 control-label">Sex:</label>
    <div class="col-sm-2">
     
       <select class="form-control selects" name="inf_gender">
     	<option <?php echo (get_inf_gender()=='Single'? 'Selected' : '');  ?> value="Male">Male</option>
        <option <?php echo (get_inf_gender()=='Female'? 'Selected' : '');  ?> value="Female">Female</option>
        <option <?php echo (get_inf_gender()=='Shemale'? 'Selected' : '');  ?> value="Shemale">Shemale</option>
     </select>
     
     </div>
     
     
      <label for="inputPassword3" class="col-sm-2 control-label">Status:</label>
    <div class="col-sm-2">
     
       <select class="form-control selects" name="inf_martialstat">
     	<option <?php echo (get_inf_martialstat()=='Single'? 'Selected' : '');  ?> value="Single">Single</option>
        <option <?php echo (get_inf_martialstat()=='Engagged'? 'Selected' : '');;  ?> value="Engagged">Engagged</option>
        <option <?php echo (get_inf_martialstat()=='Married'? 'Married' : '');  ?> value="Single">Married</option>
     </select>
     
     </div>
     
  </div>
 





 
   <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Mobile: </label>
    <div class="col-sm-4">
       <input type="text" value="<?php 	inf_phone()?>" class="form-control" id="inputEmail3" name="inf_phone">
    </div>
    <label for="inputPassword3" class="col-sm-2 control-label">Email: </label>
    <div class="col-sm-4">
       <input type="text" value="<?php 	inf_email()?>" class="form-control" id="inputEmail3" name="inf_email">
    </div>
  </div>


 
   <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Home Town: </label>
    <div class="col-sm-4">
       <?php 
	 $set['selected'] = get_inf_hcountry();
	echo get_cc2dd('CO',"%ALL",  'name="inf_hcountry" id="inf_hcountry" class="form-control select2"', $set) ?>
    </div>
   
    <div class="col-sm-4">
       <?php 
	  $set['selected'] = get_inf_hcity();
	  echo get_cc2dd('RE',"%ALL",  'name="inf_hcity" id="inf_hcity" class="form-control select2" ', $set) ?>
    </div>
  </div>


   <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Current: </label>
    <div class="col-sm-4">
       <?php 
	 $set['selected'] = get_inf_ccountry();
	echo get_cc2dd('CO',"%ALL",  'name="inf_ccountry" id="inf_ccountry" class="form-control select2"', $set) ?>
    </div>
   
    <div class="col-sm-4">
       <?php 
	  $set['selected'] = get_inf_ccity();
	  echo get_cc2dd('RE',"%ALL",  'name="inf_ccity" id="inf_ccity" class="form-control select2" ', $set) ?>
    </div>
  </div>



       
  
   <div class="form-group">
    
    <div class="col-sm-10 pull-right">
    		<button type="submit" id="submit_btn" class="btn btn-success">Sign in</button>&nbsp; &nbsp; &nbsp;
           <label> <input name="logmeout" value="1" type="checkbox"> Save &amp; Add New  </label>   
       </div>
  </div>

  
  


  


  
  
  
  
  
  
  
  
  

</form>



<?php if(!isset($_GET['ajax'])){ ?>

				</div>
   
   
   
   
   </div>
  </div>
  

</div>


				</div>
			</div>
		</div>
	</div>
</section>
  <?php } ?>



<?php

//echo $_SESSION['string_val'];



 get_footer() ?>