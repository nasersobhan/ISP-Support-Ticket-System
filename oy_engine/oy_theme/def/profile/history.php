<?php get_header(); ob_start();?>
$(document).ready(function() {
	$("body").on("click", "#action_station .del_button", function(e) {
		 e.preventDefault();
		 var clickedID = this.id.split('-');
		 var DbNumberID = clickedID[1];
		 var myData = 'id='+ DbNumberID;
		  var SELECTOR_ERRORS = $('#error_box');
    

		$('#k_'+DbNumberID).addClass( "danger" ); 
         
			 jQuery.ajax({
			type: "POST", // HTTP method POST or GET
			url: "<?Php get_page_url('%this','delete') ?>", //Where to make Ajax calls
			dataType:"text", // Data type, HTML, json etc.
			data:myData, //Form variables
			success:function(response){
				  SELECTOR_ERRORS.html(response);$('#k_'+DbNumberID).fadeOut( "slow" );  SELECTOR_ERRORS.fadeIn(700);
			},
			error:function (xhr, ajaxOptions, thrownError){
				//On error, we alert user
				alert(thrownError);
			}
			}); 
	});

});
<?php 
$contents = ob_get_contents();
ob_end_clean();
addlinejs($contents);?>
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
   				 <div  class="contentbox">



<div class="row clearfix">
		<div class="col-md-12 column">
			<nav class="navbar navbar-default" role="navigation">
            
            
				<!--<div class="navbar-header">
					 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="#">Jobs</a>
				</div>-->
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<!--	<ul class="nav navbar-nav">
						<li class="active">
							<a href="#">Post New Job Post</a>
						</li>
						
						
					</ul>-->
					<div class="navbar-form navbar-left" role="search">
						<h4>User History</h4>
					</div>
					
                    
                    
                    <ul class="nav navbar-nav pull-right">
                    <li class="dropdown">
							 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Action<strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								
								<li>
									<a href="#">Clear All</a>
								</li>
								<li>
									<a href="#">Something else here</a>
								</li>
								<li class="divider">
								</li>
								<li>
									<a href="#">Separated link</a>
								</li>
								<li class="divider">
								</li>
								<li>
									<a href="#">One more separated link</a>
								</li>
							</ul>
						</li>
                    </ul>
                    
                    
				</div>
				
			</nav>
		</div>
	</div>




   <div class="form-group">
     <?php get_message(); set_message(''); ?>
     <div id="error_box" style="display: none;" >
        </div>
  </div>
  





			<table class="table table-bordered table-hover datatable f14">
				<thead>
					<tr>
						<th>
							 <input  type="checkbox">
						</th>
						<th>
							Time
						</th>
						<th>
							Action
						</th>
						<th>
							Information
						</th>
                        
                        <th>
							Action
						</th>
					</tr>
				</thead>
				<tbody>
                
                
                  <?php if(have_post()) { while(have_post()) : the_post();   ?>
					<tr id="k_<?php hi_id() ?>">
                    <td>
							 <input value="<?php hi_id() ?>" type="checkbox">
						</td>
                    
						<td>
							<?php hi_time(); ?>
						</td>
						<td>
							<?php hi_pass() ?>
						</td>
						<td>
							<strong>IP</strong> :<?php hi_ip() ?><br/><strong>Browser</strong>: <?php hi_browser() ?><br/><strong>OS</strong> :<?php hi_ossystem() ?>
						</td>
						<td id="ac_<?php hi_id() ?>">
							<div class="btn-group" id="action_station">
				 <a href="<?php get_page_url('%this','update') ?>&id=<?php hi_id() ?>" title="Edit" ><button class="btn btn-default" type="button"><em class="fa fa-edit"></em></button></a> <a href="<?php get_page_url('%this','delete') ?>&id=<?php hi_id() ?>" title="Delete" > <button class="btn btn-default del_button" type="button" id="del-<?php hi_id(); ?>" ><em class="fa fa-remove"></em></button></a>
 <a href="<?php get_page_url('%this','view') ?>&id=<?php hi_id() ?>" title="Edit" ><button class="btn btn-default" type="button"><em class="fa fa-eye"></em></button></a>
			</div>
						</td>
					</tr>
                    
                    
                    
                             <?php endwhile; } ?> 
					
				</tbody>
			</table>
		</div>




			
   
   
   
   
   </div>
  </div>
</div>


				</div>
			</div>
		</div>
	</div>
</section>




<?php

//echo $_SESSION['string_val'];



 get_footer() ?>