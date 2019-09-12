<?php get_header();?>


<div class="row">
    <div class="col-md-2">
       <?php get_sidebar('2'); ?>
    </div>
    <div  id="main-body" class="col-md-7 no-margin-top">
  
                
        <div class="panel panel-default no-margin-top">
                
            <div class="panel-body">    
                
                <div class="page-header ">
          <h1><?php pos_title();?></h1>
</div>
                
                
                
 
<p><?php echo html_entity_decode(get_pos_content()); ?></p>


       
					
				
        </div>
        </div>
        
    </div>
    
    
    
    
    
    
    
    <div class="col-md-3">
<?php get_sidebar(); ?>
        </div>
</div>
<?php get_footer(); ?>