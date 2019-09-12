<?php
get_header();
?>


<div class="row">
    <div class="col-md-9">
        <div class="panel panel-default"><div class="panel-body">
        <div class="page-header ">
						<h1>
                                                    <?php get_pgtitle() ?>  <sup><small>(<?php global $total;echo $total ?>)</small></sup>
						</h1>
					</div>
                
            <nav class="navbar navbar-default" role="navigation">
						<div class="navbar-header">
							 
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
							</button> <a class="navbar-brand" href="#">Search</a>
						</div>
						
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							
                                                    <form method="post" action="<?php echo get_tbllink(is_get('tbl'),'search'); ?>" class="navbar-form navbar-left" role="search">
                                                            
                                                             
                                                            <div class="form-group">
									<input name="search-this" type="text" class="form-control" />
								</div> 
                                                            
                                                            		

                                                           
								<button type="submit" class="btn btn-default">
									Go..
								</button>
							</form>
							<ul class="nav navbar-nav navbar-right">
								<li>
									<a href="<?php echo get_tbllink(is_get('tbl'),'add'); ?>">Add New</a>
								</li>
								<li class="dropdown">
									 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Filter<strong class="caret"></strong></a>
									<ul class="dropdown-menu">
										<li>
											<a href="<?php echo get_link(is_get('pg'), 'list','act'); ?>">Published</a>
										</li>
										<li>
											<a href="<?php echo get_link(is_get('pg'), 'list','sus'); ?>">Suspended</a>
										</li>
										<li>
											<a href="<?php echo get_link(is_get('pg'), 'list','exp'); ?>">Expired</a>
										</li>
										<li class="divider">
										</li>
										<li>
											<a href="<?php echo get_link(is_get('pg'), 'list','all'); ?>">All</a>
										</li>
									</ul>
								</li>
							</ul>
						</div>
						
					</nav>    
                <form id="baction"  method="POST" action="<?php echo get_link(is_get('pg'),'action','bulk') ?>" role="search">  
                <?php 
   // global $page_content,$pagin;
  //echo $page_content;
           ?>
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
                                                            
                                                            	
								<button type="submit" class="btn btn-default">
									Do it
								</button>
							</form>
</span>
                                                        <span  class="navbar-form navbar-left" >
                                                           <?php echo $pagin;?>  
                                                            
                                                        </span>
						</div>
						
               
               
               
              
    
					</nav>            
    			
				
        </div>
        </div>
        
    </div>
    <div class="col-md-3">
<?php get_sidebar(); ?>
        </div>
</div>
<?php get_footer(); ?>