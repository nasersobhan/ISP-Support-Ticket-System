<?php get_header() ?>


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
<h3>Change Password</h3>
<hr />
<form class="form-horizontal"  action="<?php get_page_url('changepassword') ?>" method="post" role="form">

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">Current Password</label>
    <div class="col-sm-4 ">
      <input type="password" name="cur_pass" class="form-control" id="inputPassword3" placeholder="Current Password">
    </div>
  </div>
  
  
  <div class="form-group">
    <label for="inputPassword3"  class="col-sm-4 control-label">New Password</label>
    <div class="col-sm-4 ">
      <input type="password" name="new_pass1" class="form-control" id="inputPassword3" placeholder="New Password">
    </div>
  </div>
  
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">Retype new Password</label>
    <div class="col-sm-4 ">
      <input type="password" name="new_pass2" class="form-control" id="inputPassword3" placeholder="Retype new Password">
    </div>
  </div>
  
  
  
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-10">
      <div class="checkbox">
        <label>
          <input name="logmeout" value="1" type="checkbox"> Log me out <?php global $ac; echo $ac->user_id; ?>
        </label>
      </div>
    </div>
  </div>
  
  
  
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-7">
    <?php get_message() ?>
     </div>
  </div>
  
  
  
  
  
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-10">
      <button type="submit" class="btn btn-default">Sign in</button>
    </div>
  </div>
</form>







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