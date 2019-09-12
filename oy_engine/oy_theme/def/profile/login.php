<?php theme_include('header.php') ?>


<section id="signin_main" class="signin-main">
<div class="section-content">
<div class="wrap">
  <div  class="container">
    <div  class="form-wrap" >
      <div  class="row">
      <!--  <div class="title" data-animation="fadeInDown" data-animation-delay=".4s">
          <h1>Register</h1>
        </div>-->
        <div id="form_1" class="black-box">
      <!--    <div class="form-header"> 
           <i class="fa fa-user"></i>
            <h3  data-animation="fadeInUp">Account System</h3>
          </div>-->
          <div><!--style=" height:560px; "-->
            <div class="pull-left black">
              <div class="form-main round bg-gray"  > <!--data-animation="fadeInRight"-->
                             <h3>Sign-in</h3>
                <form name="signup" action="<?php get_page_url('login') ?>" method="post" role="form">
                  <div class="form-group"> 
                     
                    
                  
                    <label for="exampleInputEmail1">Email:</label>
                      <input type="text" name="username" id="un_1" class="form-control" placeholder="Email Or User" required="required">
             
                 </div>  <div class="form-group"> 
               
                   <label for="exampleInputEmail1">Password:</label>
                      <input type="password" name="password" id="pw_1" class="form-control" placeholder="Password">
                 
                  </div>
                
                  
                   <div class="checkbox">
    <label>
      <input name="rememberme" value="1" type="checkbox"> Remember me
    </label>
  </div>
                  
                  
                  
                  
                  <span id="result_mess">
                    <?php Get_message(); ?>
                  </span>
                  <button OnClick="formget(this.form, '<?php get_page_url('login') ?>&ajax=ajax');" id="signIn_1" type="button" class="btn btn-block signin">Sign In</button>
                </form>
     
                <div  class="row">
                  <div class="col-xs-10">  <a class="mytabc" href="<?php get_page_url('signup') ?>"><i class="fa fa-sign-in">&nbsp;&nbsp;</i>SignUp</a> &nbsp;| &nbsp; <a class="mytabc" href="<?php get_page_url('forgotpassword') ?>"><i class="fa fa-unlock-alt"></i>&nbsp;&nbsp;Forgot Password?</a> </div>
                </div>
              </div>
            </div>
            <div class="pull-right black">
              <div class="info-form-main" > <!--data-animation="fadeInDown" data-animation-delay=".4s"-->
           
                <h3>For Ooyta Account System</h3>
                <p>The Gender and Communication Officer will be responsible for the following duties:<br/>
                  Coordinate and monitor the implementation of the regular Kuchi project activities at the local level, in close collaboration with the implementing partners and/or the government;
                  Supervise the efficient distribution and management of extension materials at the site and provide feedback to Provincial Facilitators and Project Manager.<br/>
                  Assist in the conduct of regular meetings of local government officials, village leaders, and implementing partners.<br/>
                  Assist in the implementation of the plan of action, review achievement and constraints and provide feedback accordingly;<br/>
                  Compile the information and submit monthly monitoring report to the Project Manager, Qualitative and quantitative information and stories from the field to be used for communication purpose
                  Assist the Community Base Extension Officers and implementing partners in encouraging women’s access to economic skills, development and sensitizing public opinion on gender issues and gender focused activities;</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>

<?php theme_include('footer.php') ?>
