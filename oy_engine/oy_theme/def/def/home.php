<?php
get_header();
?>


<div class="row">
    <div class="col-md-2">
       <?php get_sidebar('2'); ?>
    </div>
    <div class="col-md-7">
        <div class="panel panel-default"><div class="panel-body">
        <div class="page-header ">
						<h1>
                                                    Recent Job Posted  <sup><small>(12 new)</small></sup>
						</h1>
					</div>
                
            <nav class="navbar navbar-default" role="navigation">
						<div class="navbar-header">
							 
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
							</button> <a class="navbar-brand" href="#">Search</a>
						</div>
						
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							
							<form class="navbar-form navbar-left" role="search">
                                                            
                                                             
                                                            <div class="form-group">
									<input type="text" class="form-control" />
								</div> 
                                                            
                                                            		<div class="form-group">

                                                                    <select  name="job_provinces"  id="job_provinces"  class="form-control"  ><option  value="270">Badakhshan
</option><option  value="271">Badghis
</option><option  value="272">Baghlan
</option><option  value="273">Balkh
</option><option  value="274">Bamian
</option><option  value="275">Farah
</option><option  value="276">Faryab
</option><option  value="277">Ghazni
</option><option  value="278">Ghowr
</option><option  value="279">Helmand
</option><option  value="280">Herat
</option><option  value="281">Jowzjan
</option><option  value="282">Kabol
</option><option  value="283">Kandahar
</option><option  value="284">Kapisa
</option><option  value="285">Khowst
</option><option  value="286">Konar
</option>
                                                                    </select>
								</div>
								<div class="form-group">

                                                                    <select  name="job_provinces"  id="job_provinces"  class="form-control"  ><option  value="270">Badakhshan
</option><option  value="271">Badghis
</option><option  value="272">Baghlan
</option><option  value="273">Balkh
</option><option  value="274">Bamian
</option><option  value="275">Farah
</option><option  value="276">Faryab
</option><option  value="277">Ghazni
</option><option  value="278">Ghowr
</option><option  value="279">Helmand
</option><option  value="280">Herat
</option><option  value="281">Jowzjan
</option><option  value="282">Kabol
</option><option  value="283">Kandahar
</option><option  value="284">Kapisa
</option><option  value="285">Khowst
</option><option  value="286">Konar
</option>
                                                                    </select>
								</div>
                                                           
								<button type="submit" class="btn btn-default">
									Go..
								</button>
							</form>
							
						</div>
						
					</nav>    
                
                <?php 
   // global $page_content;
  //echo $page_content;
           ?>
                
                
                
                <div>
                   <?php if(have_post()) { while(have_post()) : the_post();   ?>
                    
                 
                     <div class="panel panel-default">
                         
                                
                         <h4><a href="<?php echo get_link('jobs', 'view', get_job_id()) ?>" target="_blank"><?php job_title() ?></a></h4>
                                    <p><?php job_employer() ?></p>       
                                    <p><?php echo get_link('jobs', 'view', get_job_id()) ?></p>  
                              </div>
                    
                 <?php endwhile; } ?>      
                    
                </div>
                
                
                
                
                
                
                
					
				
        </div>
        </div>
        
    </div>
    
    
    
    
    
    
    
     <div class="col-md-3">
<?php get_sidebar(); ?>
     </div>
</div>
<?php get_footer(); ?>