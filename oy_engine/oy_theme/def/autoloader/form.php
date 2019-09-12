<?php theme_include('header'); ?>

<div class="row">
    <div class="col-md-9">
        <div class="panel panel-default"><div class="panel-body">
                 <div class="page-header ">
						<h1>
                                                  <?php get_pgtitle(); ?> <sup><a href="<?Php echo get_tbllink(is_get('tbl')); ?>" class="btn btn-default btn-sm">List</a></sup>
						
                                                </h1>
					</div>
                    <?php   pri_tbl_from(); ?>
                   <?php echo Get_message(true); ?>
              
            </div>              
        </div>         
    </div>
    <div class="col-md-3">
    <?php get_sidebar(); ?>
        </div>
</div>

<?php theme_include('footer'); ?>