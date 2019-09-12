<?php 
if(is_get('tbl')){
    theme_al_include('db/header');
    
}else{ ?>


<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8" />
<meta name="msvalidate.01" content="611426D47A4B750329225D9FC26A6EE5" />
<title><?php  get_pgtitle() ?></title>
<?php  load_css(); ?>
<link href="<?php theme_al_path() ?>/css/styles.css" rel="stylesheet" type="text/css" />

</head>

<body class="fixed" >
    	<?php
                                if(isset($_GET['pg']))
                                    $page = $_GET['pg'];
                                else
                                    $page = 'home';
                                
                                
                                ?>


    
    <nav class="navbar nav-top">
  <div class="container">
   
    <div class="navbar-header navbar-default">
      <button class="navbar-toggle" data-target=".navbar-ex1-collapse" data-toggle="collapse" type="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
        
      </button>
    </div>

    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav">
       
         <li><img class="top-logo" src="<?php theme_al_path() ?>/images/logo-ooyta.png" /></li> 
          
        <li ><a href="#">Home</a></li>
          <li class="divider"></li>
            <li class="<?php echo ($page=='deals' ? 'active' : ''); ?>"><a href="<?php echo get_link('deals','',''); ?>" title="deals">Deals</a></li>
          <li><a href="#">Projects</a></li>
          <li><a href="#">Shop</a></li>
         
        
          <li><a href="#">Services</a></li>
 <li class="<?php echo ($page=='page' ? 'active' : ''); ?>"><a href="<?php echo get_link('page','',''); ?>" title="pages">Dirctory</a></li>
          
          <li><a href="#">Social</a></li>
    
          <li class="<?php echo ($page=='jobs' ? 'active' : ''); ?>"><a href="<?php echo get_link('jobs','',''); ?>" title="Brochures">Jobs</a></li>
          <li class="<?php echo ($page=='quotes' ? 'active' : ''); ?>"><a href="<?php echo get_tbllink('quotes','',''); ?>" title="Brochures">quotes</a></li>

                  <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Intertainments
          <b class="caret"></b></a>

          <ul class="dropdown-menu">
               <li><a href="#">Photos</a></li>
          <li><a href="#">Videos</a></li>
          <li><a href="#">Music</a></li>
       <li><a href="#">Games</a></li>
       <li><a href="#">clips</a></li>
          </ul>
        </li>  
          
          
          <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Business
          <b class="caret"></b></a>

          <ul class="dropdown-menu">
           <li ><a href="#">Blog</a></li>
          <li class="divider"></li>
          <li><a href="#">Quotas</a></li>
          <li><a href="#">Peoms and SMS</a></li>
       
          </ul>
        </li>  
          
          
        
        
        
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Blog & Articals
          <b class="caret"></b></a>

          <ul class="dropdown-menu">
              <li ><a href="#">News</a></li>
           <li ><a href="#">Blog</a></li>
          <li class="divider"></li>
          <li><a href="#">Quotas</a></li>
          <li><a href="#">Peoms and SMS</a></li>
       
          </ul>
        </li>
        
        

        
        
      </ul>
    </div>
  </div>
</nav>


    
    
    
    
<div class="container" >
    <div id="notify" class="alert" style=" display:none;"></div>
    
<!--  
<div class="row">

  <div class="col-md-12"></div>
</div>
    -->
    
<!--  <div class="row">

  <div class="col-md-12">
  
        <div class="navbar navbar-inverse">
                <div class="navbar-inner noborder ">
                    <div class=" auto-center">
                        <div class="row">
                            <div class="span12">
                            
                                <ul class="nav">
                                    
                                    
                                    <?php 
                                    
                                    if(is_autoloader()){
                                     pri_limenu();
                                        
                                    }else{
                                        ?>
                                   
                                    
                                    
                             <li class="<?php echo ($page=='home' ? 'active' : ''); ?>"><a href="<?php echo HOME ?>/" title="Products">Home Page</a></li>

<li class="<?php echo ($page=='jobs' ? 'active' : ''); ?>"><a href="<?php echo get_link('jobs','',''); ?>" title="Brochures">Jobs</a></li>
<li class="<?php echo ($page=='deals' ? 'active' : ''); ?>"><a href="<?php echo get_link('deals','',''); ?>" title="Brochures">Deals</a></li>

<li class="<?php echo ($page=='aboutus' ? 'active' : ''); ?>"><a href="<?php echo get_link('quotes','',''); ?>" title="References">quotes</a></li>


<li class="<?php echo ($page=='advertisements' ? 'active' : ''); ?>"><a href="<?php echo HOME ?>/page/advertisements" title="Brochures">Advertisements

</a></li>

<li class="<?php echo ($page=='downloads' ? 'active' : ''); ?>"><a href="<?php echo HOME ?>/page/downloads" title="Brochures">Downloads

</a></li>


<li class="<?php echo ($page=='aboutus' ? 'active' : ''); ?>"><a href="<?php echo HOME ?>/page/aboutus" title="References">About Us

</a></li>

<li class="<?php echo ($page=='contact' ? 'active' : ''); ?>"><a href="<?php echo HOME ?>/page/contact" title="Technical consulting">
Contact Us
</a></li>
                                    
                                      
              <?php } ?>                     
                              
                                
                                               
                                </ul>
                               
                                <ul class="nav pull-right">
                                    <li>
                                        <a href="http://twitter.com/karyabee" target="_blank" class="btn btn-social-icon">
    <i class="fa fa-twitter"></i>
  </a>
                                    
                                    </li>
                                    
                                    
                                    <li> <a href="http://fb.com/karyabeewebsite" target="_blank" class="btn btn-social-icon color-white">
    <i class="fa fa-facebook"></i>
  </a></li>
                                    
			                   </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
  </div>
</div>  -->

<?Php } ?>
    
    
    
