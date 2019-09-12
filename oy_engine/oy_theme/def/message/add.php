<?php get_header(); ?>
<?php  ob_start();?>




$(function(){
			cascadeForm = $('#add_job');
			cat_parent = cascadeForm.find('#job_location');
			cat_child = cascadeForm.find('#job_cities');
			 
			cascadeSelect(cat_parent, cat_child);
		

          
        
           
     
           
           $('#job_closingdate').pikaday({ 
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
 name: 'job_provinces',
 display: 'Job Province',
 rules: 'required'
}

], function(errors, evt) {
    
    var SELECTOR_ERRORS = $('#error_box');
    

    if (errors.length > 0) {
        SELECTOR_ERRORS.empty();
        SELECTOR_ERRORS.append('<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <strong>Warning!</strong><br/>');
        for (var i = 0, errorLength = errors.length; i < errorLength; i++) {
            SELECTOR_ERRORS.append(errors[i].message + '<br/>');
        }

     
        SELECTOR_ERRORS.fadeIn(700);
        SELECTOR_ERRORS.effect( "pulsate" );
    } else {
              SELECTOR_ERRORS.fadeOut(1000);
    }

    if (event) {
        //event.returnValue = false;
    }else{
      evt.preventDefault();
    
    }
});


$("#job_experience").on('change keyup paste', function() {
var vx = $(this).val();
   $('#textvalue').text((vx == 0 ? ' No Experience' : (vx + ' year' +  ( vx > 1 ? 's' : ''))));
});

<?php 
$contents = ob_get_contents();
ob_end_clean();
addlinejs($contents);?>

 
            
      

   
   <div class="tab-content profile-tab-content" >



<div class="tab-pane fade active in" id="jobs">
             
                  
                  
                  <form id="add_job" ajaxform action="<?php echo get_link('jobs','add','save'); ?>" method="post" >




<table class="jobs_TBL table">








   <tr >
<td   height="20" colspan="2"  class="small_txt"><span class="style6"><strong><h1> &nbsp;&nbsp Edit Post
 </h1></strong>
    
    
    
    </span>
</td>
</tr>

<tr  class="blue_head">
<td width="650"  colspan="2">

Post ID: 

</td>
</tr>

<tr>

<td class="w300">Job Title: </td>

<td><input type="text" id="job_title" name="job_title"  requireds  pacehokder="Job Title" /> </td>



</tr>





<tr>

<td>Category: </td>

<td>
<?php 
//$cate = get_job_title();
get_cats('jobs','class="form-control select2" id="job_category" name="job_category"  requireds') ?> 
   
     
  
      
      <button type="button" class="btn btn-default navbar-btn pull-right" data-toggle="modal" data-target="#myModal">+</button>



</td>

</tr>









<tr>

<td>Expiry date:</td>

<td>
 <input type="text" id="job_closingdate" name="job_closingdate"/>
</td>



</tr>









<tr>

<td>Vacancy no:</td>

<td> <input type="number" max="200" min="1" value="1" name="job_posts" id="job_posts" /> </td>



</tr>



<tr>

<td>Job Type:</td>

<td>

    <div class="form-inline">
     <div class="form-group">
   <input class="form-control" placeholder="Job Type" type="text"  name="job_type" id="job_type" /> 
   
  </div>
  <div class="form-group">
      <input class="form-control" type="text" placeholder="Duration"  name="job_duration" id="job_duration"  />
  </div>
    <div class="form-group">
    
  
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
<td>Organization: </td>
<td>
<?php //get_orglist('all') ?> <input id="org" type="text" name="org" value=""  /> 
</td>
</tr>
-->




 

<tr>
<td>Country: </td>
<td>
    <?php 
	 $set['selected'] = ''; //get_job_country();
	echo get_cc2dd('CO',"%ALL",  'name="job_country" id="job_country" class="form-control select2"', $set) ?>
</td>
</tr>



<tr>
<td>Provinces, Stat: </td>
<td>
    <?php 
	 $set['selected'] = ''; //get_job_provinces();
	echo get_cc2dd('RE',"AF",  'name="job_provinces[]" id="job_provinces" multiple class="form-control select2"', $set) ?>
</td>
</tr>


<tr>
<td>Location: </td>
<td><input id="job_location" type="text" name="job_location"  /> </td>
</tr>


<tr class="blue_head">
<td  colspan="2">

Qualification:

</td>
</tr>

<tr>

<td>Education: </td>

<td><input type="text" id="job_education" name="job_education" class="validate[required] text-input"  /> </td>

</tr>

<tr>
<td>Minimum Experience:   </td>
<td><input type="range" id="job_experience" name="job_experience"  value="0" max="30" style="width:100px; float:left" />
    &nbsp;<span id="textvalue">No Experience</span>

</td>
</tr>



<tr>

<td style="vertical-align:top;">Qualifications:</td>

<td>
<textarea data-widearea="enable" id="job_qualifications" name="job_qualifications"  rows="7"></textarea>

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
<textarea id="job_duties" name="job_duties" data-widearea="enable" id="repons" rows="7"></textarea>

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
<textarea id="job_guidline" name="job_guidline"  data-widearea="enable" rows="7"></textarea>

  </td>



</tr>





<tr>

<td>Action:</td>

<td>
  
<button type="submit" class="btn btn-info">Submit Form</button><br/>

     

  </td>



</tr>

</table>

</form>

<div id="error_box" class="alert alert-danger" role="alert"></div>
    </td>
    <?php get_sidebar() ?>
  </tr>
 
 


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<?php get_footer() ?>