<?php get_header(); ?>
<?php  ob_start();?>




$(function(){
			cascadeForm = $('#add_job');
			cat_parent = cascadeForm.find('#job_location');
			cat_child = cascadeForm.find('#job_cities');
			 
			cascadeSelect(cat_parent, cat_child);
		

          
        
           
              $('#job_adate').pikaday({ 
          firstDay: 1,
        minDate: new Date('<?php echo (date('Y')).'-01-01' ?>'),
        maxDate: new Date('<?php echo date('Y-m-d') ?>'),
        yearRange: [2014,2016], format: 'YYYY-MM-DD'
          
          
           });
           
           $('#job_cdate').pikaday({ 
          firstDay: 1,
        minDate: new Date('<?php echo date('Y-m-').(date('d')+1) ?>'),
        maxDate: new Date('<?php echo (date('Y')+1).'-12-31' ?>'),
        yearRange: [2014,2016], format: 'YYYY-MM-DD'
          
          
           });
           
           
		});



var validator = new FormValidator('add_job', [{
    name: 'job_title',
    display: 'Job Title',
    rules: 'required'
},
{
 name: 'job_category',
 display: 'Job Category',
 rules: 'required'
},
{
 name: 'job_cities',
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
        SELECTOR_ERRORS.effect( "shake" );
    } else {
        SELECTOR_ERRORS.effect( "shake" );
        SELECTOR_ERRORS.fadeOut(700);
    }

    if (event) {
        //event.returnValue = false;
    }else{
      evt.preventDefault();
    
    }
});


$("#exper").on('change keyup paste', function() {
var vx = $(this).val();
   $('#textvalue').text((vx == 0 ? ' No Experience' : (vx + ' year' +  ( vx > 1 ? 's' : ''))));
});

<?php 
$contents = ob_get_contents();
ob_end_clean();
addlinejs($contents);?>
    <title>Post A New Job </title>
    

 
    <?php if(have_post()) { while(have_post()) : the_post();   ?>
         
      

   
   <div class="tab-content profile-tab-content" >



<div class="tab-pane fade active in" id="jobs">
             
                  
                  
                  <form id="add_job" ajaxform action="<?php echo HOME ?>/?emp=added" method="post" >




<table class="jobs_TBL table">








   <tr >
<td   height="20" colspan="2"  class="small_txt"><span class="style6"><strong><h1> &nbsp;&nbsp Edit Post
 </h1></strong>
    
    
    
    </span>
</td>
</tr>

<tr  class="blue_head">
<td width="650"  colspan="2">

Post ID: <?php job_id() ?>

</td>
</tr>

<tr>

<td class="w300">Job Title: </td>

<td><input type="text" id="job_title" value="<?php job_title() ?>" requireds name="title" pacehokder="Job Title" /> </td>



</tr>





<tr>

<td>Category: </td>

<td>



<?php 
$cate = get_job_title();
get_cats('jobs','class="form-control select2"') ?> 



</td>

</tr>







<tr>
<td>Gender:   </td>
<td>
 <select name="gender">
<option value="Male/Female">Male/Female</option>
  <option value="Male">Male</option>

  <option value="Female">Female</option>

  
</select>
 </td>
</tr>


<tr>

<td>Expiry date:</td>

<td>
 <input type="text" id="job_cdate" value="<?php job_closingdate() ?>" name="edate"  class="validate[custom[date]] text-input" />
</td>



</tr>









<tr>

<td>Vacancy no:</td>

<td> <input type="number" max="200" min="1" value="<?php job_posts() ?>" class="validate[custom[number]] text-input" name="jobno" /> </td>



</tr>



<tr>

<td>Job Type:</td>

<td>

    <div class="form-inline">
     <div class="form-group">
   <input class="form-control" placeholder="Job Type" type="text" value="<?php job_type() ?>" name="job_type" id="job_type" /> 
   
  </div>
  <div class="form-group">
      <input class="form-control" type="text" placeholder="Duration" value="<?php job_duration() ?>" name="dur"  />
  </div>
    <div class="form-group">
    
  
    <select name="shift">
      <option value="Full Time">Full Time</option>
      <option value="Night Time">Part Time</option>
    </select>
   </div>
    </div>
 </td>

</tr>






 

 </td>

</tr>







 



<tr class="blue_head">
<td   colspan="2">

Location:

</td>
</tr>


<!--
<tr>
<td style="">Organization: </td>
<td>
<?php //get_orglist('all') ?> <input id="org" type="text" name="org" value=""  /> 
</td>
</tr>
-->




 

<tr>
<td>Country: </td>
<td>
    <?php 
	 $set['selected'] = get_job_country();
	echo get_cc2dd('CO',"%ALL",  'name="job_country" id="job_location" class="form-control select2"', $set) ?>
</td>
</tr>



<tr>
<td>Provinces, Stats: </td>
<td>
    <?php 
	 $set['selected'] = get_job_provinces();
	echo get_cc2dd('RE',"AF",  'name="job_provinces" id="job_cities" multiple class="form-control select2"', $set) ?>
</td>
</tr>


<tr>
<td>Location: </td>
<td><input id="location" value="<?php job_location() ?>" type="text" name="job_location"  /> </td>
</tr>


<tr class="blue_head">
<td  colspan="2">

Qualification:

</td>
</tr>

<tr>

<td>Education: </td>

<td><input type="text" value="<?php job_education() ?>" id="education" name="education" class="validate[required] text-input"  /> </td>

</tr>

<tr>
<td>Minimum Experience:   </td>
<td><input type="range" name="exper" max="30" value="<?php job_experience() ?>" ID="exper"  class="w100" style="width:100px; float:left" />
    &nbsp;<span id="textvalue"></span>

</td>
</tr>



<tr>

<td style="vertical-align:top;">Qualifications:</td>

<td>
<textarea data-widearea="enable" name="qualifications" rows="7"><?php job_qualifications() ?></textarea>

  </td>



</tr>


<tr class="blue_head">
<td  colspan="2">

Duties & Responsibilities:

</td>
</tr>
<tr>

<td></td>

<td>
<textarea name="repons" data-widearea="enable" id="repons" rows="7"><?php job_duties() ?></textarea>

  </td>



</tr>



<tr class="blue_head">
<td  colspan="2">

Submission Guideline:

</td>
</tr>

<tr>



<tr>

<td>Submission Guideline:</td>

<td>
<textarea name="guid" data-widearea="enable" rows="7"><?php job_guidline() ?></textarea>

  </td>



</tr>






<tr>

<td style="">Action:</td>

<td style="">
<button type="submit" class="btn btn-default">Submit Form</button>
<span id="result_mess" style="color: blue; font-family:tahoma; font-size:12px; text-align:center">&nbsp;
				</span>

  </td>



</tr>

</table>

</form>


    </td>
    <?php get_sidebar() ?>
  </tr>
 
<div id="error_box" class="alert alert-danger" role="alert"></div>
   <?php endwhile; } ?> 
<?php get_footer() ?>