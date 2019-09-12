<?php theme_include('header.php') ?>    
                  		
	
        <div role="tabpanel" >

  <div class="tab-content">
                  
                  
                      <div role="tabpanel" class="tab-pane <?php if(!page_id('signup') && !page_id('forgotpassword')) echo 'active';?>" id="signin">
                      
                      
                      
                      
                      <section id="authenty_preview">
			<section id="signin_main" class="authenty signin-main">
				<div class="section-content">
				  <div class="wrap">
					  <div class="container">	  
							<div class="form-wrap">
								<div class="row">
								  <div class="title" data-animation="fadeInDown" data-animation-delay=".8s">
									  <h1>SignIn</h1>
									  <h5>To Ooyta Account System</h5>
								  </div>
									<div id="form_1" data-animation="bounceIn">
										<div class="form-header">
										  <i class="fa fa-user"></i>
									  </div>
                                      
                                        <div style="background:#505050; height:560px; ">
									  <div class="form-main">
										  <form>
											  <div class="form-group">
									  			<input type="text" id="un_1" class="form-control" placeholder="Username" required="required">
													<input type="password" id="pw_1" class="form-control" placeholder="Password" required="required">
											  </div>
										    <button id="signIn_1" type="submit" class="btn btn-block signin">Sign In</button>
										  </form>	
									  </div>
                                      </div>
                                      
                                      
                                      
										<div class="form-footer">
											<div class="row">
												<div class="col-xs-7">
													<i class="fa fa-unlock-alt"></i>
													<a class="mytabc" href="#fpass" aria-controls="fpass" role="tab" data-toggle="tab">Forgot Password?</a>
												</div>
												<div class="col-xs-5">
													<i class="fa fa-check"></i>
													 <a class="mytabc" href="#signup" aria-controls="signup" role="tab" data-toggle="tab">SignUp</a>
												</div>
											</div>
										</div>		
								  </div>
								</div>
							</div>
					  </div>
				  </div>
				</div>
			</section>
                                

		

                                                        </div>
    <div role="tabpanel" class="tab-pane <?php if(page_id('signup')) echo 'active';?>" id="signup">
    
             <section id="authenty_preview">
			<section id="signin_main" class="authenty signin-main">
				<div class="section-content">
				  <div class="wrap">
					  <div class="container">	  
							<div class="form-wrap">
								<div class="row">
								  <div class="title" data-animation="fadeInDown" data-animation-delay=".8s">
									  <h1>SignUp</h1>
									  <h5>For Ooyta Account System</h5>
								  </div>
									<div id="form_1" data-animation="bounceIn">
										<div class="form-header">
										  <i class="fa fa-user"></i>
									  </div>
									  <div class="form-main">
										  <form name="signup" action="<?php get_page_url('signup') ?>" method="post">
											  <div class="form-group">
                                              <input type="text" name="email" id="un_1" class="form-control" placeholder="Email" required="required">
									  			<input type="text" name="name" id="un_1" class="form-control" placeholder="Name" required="required">
                                                                                       
												<label data-animation="bounceIn" id="result_mess" style="color:#fff;"><?php Get_message(); ?></label>
											  </div>
										    <button OnClick="formget(this.form, '<?php get_page_url('signup') ?>&ajax=ajax');" id="signIn_1" type="button" class="btn btn-block signin">Sign Up</button>
										  </form>	
									  </div>
										<div class="form-footer">
											<div class="row">
												<div class="col-xs-7">
													<i class="fa fa-unlock-alt"></i>
													<a class="mytabc" href="#fpass" aria-controls="fpass" role="tab" data-toggle="tab">Forgot Password?</a>
												</div>
												<div class="col-xs-5">
													<i class="fa fa-check"></i>
													<a class="mytabc" href="#signin" aria-controls="signin" role="tab" data-toggle="tab">SignIn</a>
												</div>
											</div>
										</div>		
								  </div>
								</div>
							</div>
					  </div>
				  </div>
				</div>
			</section>
    
    
    
    
    </div>
    <div role="tabpanel" class="tab-pane <?php if(page_id('forgotpassword')) echo 'active';?>" id="fpass">
    
    
    
    
             <section id="authenty_preview">
			<section id="signin_main" class="authenty signin-main">
				<div class="section-content">
				  <div class="wrap">
					  <div class="container">	  
							<div class="form-wrap">
								<div class="row">
								  <div class="title" data-animation="fadeInDown" data-animation-delay=".8s">
									  <h1>Forgot Password</h1>
									  <h5>Recover you Password?</h5>
								  </div>
									<div id="form_1" data-animation="bounceIn">
										<div class="form-header">
										  <i class="fa fa-user"></i>
									  </div>
									  <div class="form-main">
										  <form>
											  <div class="form-group">
									  			<input type="text" id="un_1" class="form-control" placeholder="Email/Username" required="required">
											
											  </div>
										    <button id="signIn_1" type="submit" class="btn btn-block signin">Send Link</button>
                                            
                                            
 
										  </form>	
									  </div>
										<div class="form-footer">
											<div class="row">
												<div class="col-xs-7">
													<i class="fa fa-unlock-alt"></i>
													<a class="mytabc" href="#fpass" aria-controls="fpass" role="tab" data-toggle="tab">Forgot Password?</a>
												</div>
												<div class="col-xs-5">
													<i class="fa fa-check"></i>
													 <a class="mytabc" href="#signin" aria-controls="signin" role="tab" data-toggle="tab">SignIn</a>
												</div>
											</div>
										</div>		
								  </div>
								</div>
							</div>
					  </div>
				  </div>
				</div>
			</section>
    
    
    
    </div>

  </div>

</div>
                    
                    
                    
                 </div>   
				</div>
			</section>
		
        
        
   

		
		
		</section>	
	
	<?php theme_include('footer.php') ?>