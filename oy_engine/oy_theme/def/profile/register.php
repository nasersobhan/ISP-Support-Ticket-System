<?php theme_include('header.php') ?><?php  ob_start();?>

var validator = new FormValidator('signup', [{
    name: 'email',
    display: 'Please Add Email',
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

var validator2 = new FormValidator('signin', [{
    name: 'username',
    display: 'Please Add Email',
    rules: 'required'
},{
    name: 'password',
    display: 'Please Add Password',
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

$( "#username_login" ).focusout(function() {
 var usr_nm = $( "#username_login" ).val();

$.ajax({
  type: "GET",
  url: "http://webserver/ooyta/API/?pg=avatar",
  data: { info: usr_nm }
})
  .done(function( msg ) {
  
   	var objcy = JSON.parse(msg.trim());
 	$('#avatarimg_login').attr('src', objcy.result);

  });
});



<?php if(isset($_GET['pg'])){
	if($_GET['pg']!='login'){
		
		?>
		//$('#loginbox').fadeOut(function(){
         $('#signupbox').fadeIn('slow'); 
       // })
        
        <?php
		
	}else{?>
    $('#loginbox').fadeIn('slow') ;
    <?php
	}
	 } ?>




$('#signup_show').click(function(e) {
var urlx = $(this).attr("href");
    $('#loginbox').fadeOut(function(){
    		
         $('#signupbox').fadeIn('slow');
         window.history.pushState("object or string", "Title", urlx); 
        });
         e.preventDefault();
});


$('#signin_show').click(function(e) {
 var urly = $(this).attr("href");
    $('#signupbox').fadeOut(function(){
    	
         $('#loginbox').fadeIn('slow') ;
         window.history.pushState("object or string", "Title", urly);
        }); e.preventDefault();
});


<?php 
$contents = ob_get_contents();
ob_end_clean();
addlinejs($contents);?>


<section id="signin_main" class="signin-main">



  




<div class="container">    
        <div id="loginbox" style="display:none;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="signin" class="form-horizontal" name="signin" action="<?php get_page_url('login') ?>" method="post" role="form">
                        
                         <div class="form-group"><div class="col-md-12"><?php if(page_is('login')) Get_message() ?></div></div>
                         <div id="error_box" style="display: none;" class="alert alert-danger alert-dismissable"></div>
                  
                   
                   <div class="row">
  <div class="col-md-4"><div class="avatar-view" id="myavatar"><img src="<?php def_avatar() ?>" title="Change the avatar" class="img-circle img_croped" id="avatarimg_login"  /></div>
  
  </div>
  <div class="col-md-8">
                
           
                  
                  
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                         <input type="text" name="username" id="username_login" class="form-control" placeholder="username or email" required>
                                                                            
                                    </div>
                                          
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                       <input type="password" name="password" id="pw_1" class="form-control" placeholder="Password" required>
                                    </div>
                                    

                                
                            <div class="input-group">
                                      <div class="checkbox">
                                         <label>
      <input name="rememberme" value="1" type="checkbox"> Remember me
    </label>
                                      </div>
                                    </div>


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                      <button  id="signIn_1" type="submit" class="btn btn-success">Login</button>
                                  <!--  OnClick="formget(this.form, '<?php get_page_url('login') ?>&ajax=ajax');"-->
                                      <a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>

                                    </div>
                                </div>

<hr />
                                <div class="form-group">
                                    <div class="col-md-12 control">
                                     
                                            Don't have an account! 
                                        <a href="<?php get_page_url('signup') ?>" id="signup_show">
                                            Sign Up Here
                                        </a>
                                 
                                    </div>
                                </div>    
                            </form>     

</div>
</div>

                        </div>                     
                    </div>  
        </div>
        
        
        
        
        
        
        
        
        
        
        <div id="signupbox" style="display:none;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Sign Up</div>
                           
                        </div>  
                        <div class="panel-body" >
                            <form id="signup" class="form-horizontal" name="signup" action="<?php get_page_url('signup') ?>" method="post" role="form">
                                         
                                         
                         <div class="form-group"><div class="col-md-12"><?php if(page_is('signup')) Get_message() ?></div></div>
                         <div id="error_box" style="display: none;" class="alert alert-danger alert-dismissable"></div>
                            
                                    
                                
                                  
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-5">
                                        <input type="email" name="email"  id="un_1" class="form-control" placeholder="Email Address">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="uname"  id="uname" class="form-control" placeholder="Username">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">First Name</label>
                                    <div class="col-md-4">
                                        <input type="text" name="name"id="un_4" class="form-control" placeholder="First name" required>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" name="lastname"id="un_3" class="form-control" placeholder="Last name">
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="col-md-3 control-label">Phone</label>
                                    <div class="col-md-9">
                                        <input type="text" name="phone" id="un_1" class="form-control" placeholder="Phone: +93 (0) ### ### ###" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-4">
                                        <input type="password" name="password" id="pw_1" class="form-control" placeholder="Password" required>
                                    </div>
                                    
                                     <div class="col-md-5">
                                        <input type="password" name="repassword" id="pw_2" class="form-control" placeholder="Re-enter password" required>
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="icode" class="col-md-3 control-label">Date Of Brith</label>
                                 
                                      
                    <div class="row">
                      <div class="col-md-3 npr" >
                        <select  name="dm" id="month" class="form-control">
                          <option value="0" selected="1">Month</option>
                          <option value="1">Jan</option>
                          <option value="2">Feb</option>
                          <option value="3">Mar</option>
                          <option value="4">Apr</option>
                          <option value="5">May</option>
                          <option value="6">Jun</option>
                          <option value="7">Jul</option>
                          <option value="8">Aug</option>
                          <option value="9">Sep</option>
                          <option value="10">Oct</option>
                          <option value="11">Nov</option>
                          <option value="12">Dec</option>
                        </select>
                      </div>
                      <div class="col-md-2 np"  style="padding:0 5px 0 5px">
                        <select name="dd" class="form-control ">
                          <option value="0" selected="1">Day</option>
                          <?php 
	  for ($x = 1; $x <= 31; $x++) {
    echo "<option value='$x'>$x</option>";
} 
	   
	   ?>
                        </select>
                      </div>
                      <div class="col-md-3 np">
                        <select name="dy" class="form-control " style="margin:0;">
                          <option value="0" selected="1">Year</option>
                          <?php 
	  for ($x = 1970; $x <= 2014; $x++) {
    echo "<option value='$x'>$x</option>";
} 
	   
	   ?>
                        </select>
                      </div>
                      </div>
                                    </div>
                      

                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                    
                         
                  <button  id="signIn_1" type="submit" class="btn btn-info">Sign Up</button><span style="margin:0 8px;"></span> <button id="btn-fbsignup" type="button" class="btn btn-primary"><i class="icon-facebook"></i>   Sign Up with Facebook</button>
                                    </div>
                                </div>
                                <hr />
                               
                                
                                  <div class="form-group">
                                    <div class="col-md-12 control">
                                   
                                            You have an account! 
                                        <a href="<?php get_page_url('login') ?>" id="signin_show">
                                            Sign In Here
                                        </a>
                                  
                                    </div>
                                </div>    
                                
                            </form>
                         </div>
                    </div>

               
               
                
         </div> 
    </div>








</section>
<?php theme_include('footer.php') ?>
