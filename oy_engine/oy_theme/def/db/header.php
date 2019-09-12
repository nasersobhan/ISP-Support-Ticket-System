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
       
  <?php pri_limenu(); ?>
        
      </ul>
    </div>
  </div>
</nav>


    
    
    
    
<div class="container" >
