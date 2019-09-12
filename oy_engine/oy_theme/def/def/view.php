<?php
get_header();
?>

  <?php if(have_post()) { while(have_post()) : the_post();   ?>
<div class="row">
    <div class="col-md-2">
       <?php get_sidebar('2'); ?>
    </div>
    <div class="col-md-7">
        <div class="panel panel-default"><div class="panel-body">
        <div class="page-header ">
						<h1>
                                                   <?php job_title() ?>
						</h1>
					</div>
                
     
                
                
                
                
                

<table  cellpadding="0" cellspacing="0" class="jobs_TBL table">



<tr  class="blue_head">
<td width="590px" colspan="2">

<?php job_title() ?><div class="fb-like" data-layout="standard" data-action="like" data-show-faces="false" data-share="true"></div>

</td>
</tr>





<tr>

<td width="25%" >Vacancy Number: </td>

<td width="75%" >KVID<?php echo str_replace('-','',get_job_closingdate()) ?>-<?php job_id() ?></td>



</tr>


<tr>

<td width="25%" >Title: </td>

<td  width="75%"><?php job_title() ?></td>



</tr>





<tr>

<td width="25%">Category: </td>

<td  width="75%">



<?php job_category() ?>



</td>

</tr>

<tr>

<td width="25%">Duration:</td>

<td  width="75%"><?php job_duration() ?> </td>



</tr>



<tr>

<td width="25%">Closing Date: </td>

<td  width="75%">



<?php echo date("jS F Y ", strtotime(get_job_closingdate())); ?> | <?php echo Agotime(get_job_closingdate()); ?>



</td>

</tr>







<tr>

<td width="25%">Jobs no:</td>

<td  width="75%"><?php job_posts() ?></td>



</tr>












<tr  class="blue_head">
<td  colspan="2">

Location

</td>
</tr>


<tr>

<td width="25%">Organization: </td>

<td  width="75%">
<?php 

/*$orgn=strtolower(job_employer());


$orgn = str_replace(" ", "-", $orgn);
$orgn = str_replace("/", "-", $orgn);
$orgn = str_replace("&", "-", $orgn);


if(!ctype_digit(ORGID)){
	echo ORG ;
}else{*/


?>





<a href="<?php echo get_link('jobs','employer',clean_url(get_job_employer())); ?>" title="Find All Jobs with <?php job_employer() ?>">
<?php echo get_pagename(get_job_employer()) ?></a> | 
<a href="<?php echo get_link('company','name',clean_url(get_job_employer())); ?>" title="Profile of <?php job_employer() ?>">More About <?php echo get_pagename(get_job_employer()) ?></a>
<?Php // } ?>
   





</td>

</tr>

<tr>

<td width="25%">Location: </td>

<td  width="75%"><?php job_location() ?> </td>

</tr>

<tr>

<td width="25%">City: </td>

<td  width="75%">
<?php


$cities = get_job_provinces();
 $place = explode('-',$cities);
 $numItems = count($place);
$i = 0;
 foreach($place as $city){
  

  ?>
<a href="<?php echo get_link('jobs','city',clean_url(get_ccname($city))); ?>" title="All Job from <?php echo get_ccname($city) ?>"><?php echo get_ccname($city) ?></a><?php
    echo (++$i != $numItems ? ", ": '');
 } ?>
</td>



</tr>





<tr>

<td width="25%">Country:</td>

<td  width="75%"> 
<?php echo get_coname(get_job_country()) ?>



</td>



</tr>




<tr  class="blue_head">
<td  colspan="2">

Qualification

</td>
</tr>

<tr>

<td width="25%">Education: </td>

<td  width="75%"><?php job_education() ?></td>

</tr>

<tr>

<td width="25%">Years of Experience: </td>

<td  width="75%"><?php job_experience() ?> Years</td>

</tr>

<tr>

<td style=" vertical-align:top">Qualification: </td>

<td style="padding:10px"  width="75%"><?php echo (job_qualifications()) ?> </td>

</tr>


<tr  class="blue_head">
<td  colspan="2">

Duties & Responsibilities:

</td>
</tr>
<tr>

<td width="25%"></td>

<td style="padding:10px" width="75%" >

<?php echo nl2br(get_job_duties()) ?>

  </td>



</tr>

<tr class="blue_head">
<td   colspan="2">

Submission Guideline:

</td>
</tr>

<tr>

<td width="25%"></td>

<td style="padding:10px"  width="75%">
<?php 


$email_pattern = "/[\._a-zA-Z0-9-]+@[\._a-zA-Z0-9-]+/i";

$errx = '<a href="http://karyabee.com/login/fbconfig.php" title="Login with Facebook">{{Sign in to See the Email}}</a>';
$guidx = removeLink(nl2br(get_job_guidline()));
$emails = extract_emails_from(get_job_guidline());
$emails = array_unique($emails);

if(isset($_SESSION['J_ID'])){
  echo $guidx;  
}else{
foreach ($emails as $email)
    $guidx = str_ireplace($email, $errx, $guidx);  
echo ($guidx);
} ?>

 </td></tr>



<tr>
<td width="25%">Email:</td>
<td width="75%" >
 <?php 
    
    if(isset($_SESSION['J_ID'])){
    foreach($emails as $email)
echo $email.'<br/>'; echo EMAIL;
    }else{
        ?>
    <a href="<?php echo HOME ?>/login/fbconfig.php"><button  class=" btn-sm btn-social btn-facebook">
            <i class="fa fa-facebook"></i> Sign in with Facebook to See the Email </button>
  </a>



<?php  } ?>  </td>
</tr>







<tr>
<td  width="25%">Action:</td>
<td valign="middle" width="75%">


<script language="javascript">
function disableme(){
	document.getElementById('submit').disabled=true;
}

</script>

<?php if(isset($_SESSION['J_ID'])){ ?>
<form id="apply" ajaxform action="<?php echo HOME ?>/?user=japp" method="POST">

<div style=" display:none">
<input name="cid" type="text" value="<?php echo ORGID ?>">
<input name="edate" type="text" value="<?php echo EDATE ?>">
<input name="jid" type="text" value="<?php echo ID ?>">
<input name="title" type="text" value="<?php echo JTITLE ?>">
</div>
    
    <div id="result_mess">
<input type="submit" id="submit" style="height:25px" <?php echo $dis ?>  name="Send" value="<?php echo $value ?>"> 
</div>
                
                </form>
                
<?php }else{ ?>
<a href="http://www.karyabee.com/user/login/" title="Login"><button type="button" class="btn btn-primary btn-xs">Login</button></a> Or <a href="http://www.karyabee.com/user/register" title="register"><button type="button" class="btn btn-primary btn-xs">Register as Job Seeker</button></a>
<?php } ?>



  </td>
</tr>

	</div>	</div>	</div>			

</table>
  <?php endwhile; } ?> 

       
					
				
        </div>
        </div>
        
    </div>
    
    
    
    
    
    
    
    <div class="col-md-3">
<?php get_sidebar(); ?>
        </div>
</div>
<?php get_footer(); ?>