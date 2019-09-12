<?php
get_header();
?>


<div class="row">
    
    <div class="col-md-2">
       <?php theme_al_include('autoloader/sidebar'); ?>
    </div>
    <div class="col-md-10">
        <div class="panel panel-default"><div class="panel-body">
        <div class="page-header ">
						<h1>
                                                    <?php get_pgtitle() ?>  <sup><small>(<?php global $total;echo $total ?>)</small>
                                                    
                                                   
                     
       <a class="pull-right btn btn-success btn-sm" href="<?php echo get_tbllink(is_get('tbl'),'add') ?>">Add New</a>                                          
                                 
                                               
                                                    
                                                    </sup>
                                                    
                                                    
						</h1>
					</div>
                
            <?php get_view_al() ?>  <p><?php  Get_message(1) ?></p>
                    
                    
                    
                    
                    
                    
                
           <nav class="navbar navbar-default" role="navigation">
						<div class="navbar-header">
							 
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
							</button> <a class="navbar-brand" href="#">Bulk Action</a>
						</div>
						
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							
							
                                                    <span  class="navbar-form navbar-left" >
                                                             
                                                            <div class="form-group">
                                                                <select class="form-control" name="ac">
                                                                    <option value="del"> Delete </option>
                                                                    <option value="sus"> Suspend </option>
                                                                    <option value="act"> Publish </option>
                                                                </select>
                                                                
								</div> 
                                                            
                                                            	
								<button id="bulk-ac" type="submit"  class="btn btn-default">
									Do it
								</button>
							
</span>
                                                        <span  class="navbar-form navbar-left" >
                                                           <?php global $pagin; echo $pagin;?>  
                                                            
                                                        </span>
						</div>
						
               
               
               
              
    
					</nav>            
    			
				
        </div>
        </div>
        
    </div>
<!--    <div class="col-md-3">
<?php //get_sidebar(); ?>
        </div>-->
</div>
<?php get_footer(); ?>