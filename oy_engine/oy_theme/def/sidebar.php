 <?php 
global $ac;
if( $ac->is_login()){ ?>
  
   <div class="panel panel-default">
       <img src="<?php global $user; echo $user->get_cover_url() ?>" class="img-responsive center-block" style="width: 100%;max-height: 100px;">
                    
                     <img src="<?php global $user; echo $user->get_avatar_url() ?>" class="img-responsive img-circle center-block img-thumbnail" style="left: 90px; top:50px; position: absolute; max-width:100px; max-height:100px ">
                    
                     <div class="panel-body text-center" style="margin-top: 40px;">
                            
                         <strong><?php echo $user->get_name().$user->get_sname(); ?></strong>
                         <p> Software Developer </p>
                         <small id="pl-shower" style=" cursor: pointer">More</small>
                                  </div>
                     
                     
                     
                      <div class="list-group collapse" id="pl-list">
                          <p class="list-group-item">I am Awesome</p>
                                      <a href="<?php echo get_link('profile') ?>" class="list-group-item">Edit Profile</a>
                                      <a href="<?php echo get_link('message') ?>" class="list-group-item">Messages<span class="badge">0</span></a>
                                       <a href="<?php echo get_link('account') ?>" class="list-group-item">Account Setting</a>
                                      <a href="<?php echo get_link('account','user','signout'); ?>" class="list-group-item">Logout</a>
                                    </div>
                     
                     
                     
                     
                     
                     
                              </div>
  
  
  
      
    <div class="panel panel-default">
                                <div class="panel-heading"><span class="pull-right show-hide panel-collapsed" style=" cursor: pointer"><i class="glyphicon glyphicon-chevron-down"></i></span>Add New</div>
                                  <div class="panel-body collapse">
                                    <div class="list-group">
                                   
                                      <p class="list-group-item">Company<span class="badge">42</span> </p>
                                       <a class="list-group-item" title="Post a new job to the site" href="<?php echo get_link('jobs','add','new'); ?>">Job Post</a>
                                   
                                       <p class="list-group-item">Deal<span class="badge">42</span> </p>
                                        <p class="list-group-item">Blog Post<span class="badge">42</span> </p>
                                         <p class="list-group-item">Photo<span class="badge">42</span> </p>
                                          <p class="list-group-item">Something else<span class="badge">42</span> </p>
                                    </div>
                                  </div>
                              </div>
    
  
     <div class="panel panel-default">
                                <div class="panel-heading"><span class="pull-right show-hide panel-collapsed" style=" cursor: pointer"><i class="glyphicon glyphicon-chevron-down"></i></span>Employment</div>
                                  <div class="panel-body">
                                    <div class="list-group">
                                   
                                     <a class="list-group-item" title="Post a new job to the site" href="<?php echo get_link('jobs','add','new'); ?>"><span class="glyphicon glyphicon-ok text-success" aria-hidden="true"></span> Add Job Post </a>
                                       <a class="list-group-item" title="Post a new job to the site" href="<?php echo get_link('jobs','list','my'); ?>"><span class="glyphicon glyphicon-ok text-success" aria-hidden="true"></span> Job List</a>
                                       <a class="list-group-item" title="Post a new job to the site" href="<?php echo get_link('biz-request','add','new'); ?>"><span class="glyphicon glyphicon-ok text-danger" aria-hidden="true"></span> Add New RFQ/RFP/RFC</a>
                                       <a class="list-group-item" title="Post a new job to the site" href="<?php echo get_link('biz-request','list','my'); ?>"><span class="glyphicon glyphicon-ok text-danger" aria-hidden="true"></span> My RFQ/RFP/RFC List</a>
                                         <a class="list-group-item" title="Post a new job to the site" href="<?php echo get_link('jobs','app','my'); ?>"><span class="glyphicon glyphicon-ok text-danger" aria-hidden="true"></span> Application List</a>
                                           <a class="list-group-item" title="Post a new job to the site" href="<?php echo get_link('page','list','my'); ?>"><span class="glyphicon glyphicon-ok text-warning" aria-hidden="true"></span> My Orginization(s)</a>
                                    
                                    </div>
                                  </div>
                              </div>







     <div class="panel panel-default">
                                <div class="panel-heading"><span class="pull-right show-hide panel-collapsed" style=" cursor: pointer"><i class="glyphicon glyphicon-chevron-down"></i></span>Deals</div>
                                  <div class="panel-body">
                                    <div class="list-group">
                                   
                                     <a class="list-group-item" title="Post a new job to the site" href="<?php echo get_link('deals','add','new'); ?>"><span class="glyphicon glyphicon-ok text-success" aria-hidden="true"></span> Add Job Post </a>
                                       <a class="list-group-item" title="Post a new job to the site" href="<?php echo get_link('deals','list','my'); ?>"><span class="glyphicon glyphicon-ok text-success" aria-hidden="true"></span> Job List</a>
                                       <a class="list-group-item" title="Post a new job to the site" href="<?php echo get_link('biz-request','add','new'); ?>"><span class="glyphicon glyphicon-ok text-danger" aria-hidden="true"></span> Add New RFQ/RFP/RFC</a>

                                  </div>
                              </div>








    
      <div class="panel panel-default">
                                <div class="panel-heading"><span class="pull-right show-hide panel-collapsed" style=" cursor: pointer"><i class="glyphicon glyphicon-chevron-down"></i></span>Job Seeking</div>
                                  <div class="panel-body">
                                    <div class="list-group">
                                   
                                      <p class="list-group-item">Search Jobs<span class="badge">42</span> </p>
                                      <p class="list-group-item">My Resume<span class="badge">42</span> </p>
                                       <p class="list-group-item">Applied List<span class="badge">42</span> </p>
                         
                                    </div>
                                  </div>
                              </div>
  
  
    
<!--    <div class="panel panel-default">
                                <div class="panel-heading"><a href="#" class="pull-right">View all</a> Statistics</div>
                                  <div class="panel-body">
                                    <div class="list-group">
                                   
                                      <p class="list-group-item">Total Users<span class="badge">42</span> </p>
                                      <p class="list-group-item">Emplyoers <span class="badge">42</span> </p>
                                       <p class="list-group-item">Job Seekers <span class="badge">42</span> </p>
                                        <p class="list-group-item">Applications<span class="badge">42</span> </p>
                                         <p class="list-group-item">Job Annoucements <span class="badge">42</span> </p>
                                          <p class="list-group-item">CVs Uploaded <span class="badge">42</span> </p>
                                    </div>
                                  </div>
                              </div>
    
        <div class="panel panel-default">
                          
                                  <div class="panel-body">
                                  <div class="list-group ">
        <a class="list-group-item active bg_green bg_red" href="#"><i class="fa fa-home fa-fw"></i>&nbsp; General</a>
        <a class="list-group-item" title="Post a new job to the site" href="<?php echo get_link('message','inbox','all'); ?>"><i class="fa fa-envelope fa-fw"></i>&nbsp; Message Inbox <span class="badge">42</span> </a>
        <a class="list-group-item" title="Your Jobs posted befor" target="_Blank" href="<?php echo get_link('billing','',''); ?>"><i class="fa fa-home fa-fw"></i>&nbsp; Billing Information</a>
  
                                    </div>
                                  </div>
                              </div>-->
    

<!--

<div class="list-group ">
        <a class="list-group-item active bg_green bg_red" href="#"><i class="fa fa-home fa-fw"></i>&nbsp; General</a>
        <a class="list-group-item" title="Post a new job to the site" href="<?php echo get_link('message','inbox','all'); ?>"><i class="fa fa-envelope fa-fw"></i>&nbsp; Message Inbox <span class="badge">42</span> </a>
        <a class="list-group-item" title="Your Jobs posted befor" target="_Blank" href="<?php echo get_link('billing','',''); ?>"><i class="fa fa-home fa-fw"></i>&nbsp; Billing Information</a>
  
            <a class="list-group-item" title="Your Jobs posted befor" href="<?php echo get_link('profile','',''); ?>"><i class="fa fa-home fa-fw"></i>&nbsp; Profile</a>
        <a class="list-group-item" title="Your Jobs posted befor" href="<?php echo get_link('account','user','setting'); ?>"><i class="fa fa-home fa-fw"></i>&nbsp; Account Setting </a>
        <a class="list-group-item" title="Your Jobs posted befor" href="<?php echo get_link('account','user','signout'); ?>"><i class="fa fa-sign-out fa-fw"></i>&nbsp; Sign Out </a>
                   
     
 <?php if(user_type()==1){ ?>
    <a class="list-group-item active bg_green bg_red" href="#"><i class="fa fa-home fa-fw"></i>&nbsp; Employment</a>
     <a class="list-group-item" title="Post a new job to the site" href="<?php echo get_link('jobs','list','applied'); ?>">&nbsp; Current Job Options</a>
     <a class="list-group-item" title="Post a new job to the site" href="<?php echo get_link('jobs','list','applied'); ?>">&nbsp; Match Options</a>
     
     
    <a class="list-group-item" title="Post a new job to the site" href="<?php echo get_link('jobs','list','applied'); ?>">&nbsp; Applied Job Posts</a>
    <a class="list-group-item" title="Your Jobs posted befor" target="_Blank" href="<?php echo get_link('resume','view',user_username()); ?>">&nbsp; View Online CV </a>
    <a class="list-group-item" title="Your Jobs posted befor" href="<?php echo get_link('resume','update','general'); ?>">&nbsp; Update Online CV </a>
    <a class="list-group-item" title="Your Jobs posted befor" href="<?php echo get_link('resume','update','attachments'); ?>">&nbsp; Upload Attachments <span class="badge">8</span></a>

         <a class="list-group-item active bg_green bg_red" href="#"><i class="fa fa-home fa-fw"></i>&nbsp; Tools and Options</a>
<a class="list-group-item" title="Post a new job to the site" href="<?php echo get_link('jobs','list','applied'); ?>"><i class="fa fa-home fa-fw"></i>&nbsp; My Employment/work</a>

     
  <?php } ?>    



  <a class="list-group-item" href="<?php echo get_link('deals','',''); ?>"><i class="fa fa-home fa-fw"></i>&nbsp;Bazzar (Deals and bidings)</a>
   <a class="list-group-item" href="<?php echo get_link('jobs','',''); ?>"><i class="fa fa-home fa-fw"></i>&nbsp;Job announcements</a>
  <a class="list-group-item" href="<?php echo get_link('deals','add','new'); ?>"><i class="fa fa-book fa-fw"></i>&nbsp; Sell something</a>

 
  </div>
  <?php if(user_type()==2){ ?>
   <div class="panel panel-default">
        <div class="panel-heading"> Job Annoucements</div>
       <div class="panel-body">
           

 <!--     <a class="list-group-item" href="#"><i class="fa fa-home fa-fw"></i>&nbsp; Profile</a>
  <a class="list-group-item" href="#"><i class="fa fa-book fa-fw"></i>&nbsp; Services/Products</a>
  <a class="list-group-item" href="#"><i class="fa fa-pencil fa-fw"></i>&nbsp; Store</a>
  <a class="list-group-item" href="#"><i class="fa fa-cog fa-fw"></i>&nbsp; Settings</a>-->
  
      <!--    
     <a class="list-group-item" title="Post a new job to the site" href="<?php echo get_link('jobs','add','new'); ?>">Post a new job Annoucement</a>
      <a class="list-group-item" title="Post a new job to the site" href="<?php echo get_link('jobs','add','new'); ?>">Search for Emplyoee </a>
     <a class="list-group-item" title="Your Jobs posted befor" href="<?php echo HOME ?>/emp/applications">Job Applications Received </a>
     
     <a class="list-group-item" title="Post a new job to the site" href="<?php echo get_link('jobs','add','new'); ?>">Post a new RFQ/RFP </a>
      <a class="list-group-item" title="Post a new job to the site" href="<?php echo get_link('jobs','add','new'); ?>">Post a new Announcment or Event </a>
     <a class="list-group-item" title="Your Jobs posted befor" href="<?php echo get_link('jobs','list','all'); ?>">Your Announced Vacancy List </a>
     </div>
     
   </div>
   

  <?php } ?>

    -->    
     
     
    



<?php } else {?>
    
         <div class="panel panel-default">
                                <div class="panel-heading">Login Users</div>
                                  <div class="panel-body">
                  
                  
     
    <form  id="loginuser"  role="form" name="login" method="post" action="<?php echo get_link('account','user','signin'); ?>">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" name="user" class="form-control" id="user" placeholder="Enter username/email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="password" type="password" id="Password" class="form-control"  placeholder="Enter email">
  </div>
 
  <div class="checkbox">
    <label>
          <input name="rememberme" type="checkbox" value="1" id="rememberme"> Keep me log in
    </label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
  <hr/>
  <a href="<?php echo get_link('account','user','signup'); ?>">Register New</a>&nbsp;|&nbsp;<a href="<?php echo get_link('account','login','user'); ?>"><button  class="btn btn-sm btn-social btn-facebook" style="padding:2px; padding-left:35px;">
            <i class="fa fa-facebook"></i> Sign in with Facebook</button>
  </a>
</form>
    
    
        </div>
                     
                     
                     
                     
                     
                     
                              </div>
    
    




  <?php } ?>

    
    
 
   









            


                         
            