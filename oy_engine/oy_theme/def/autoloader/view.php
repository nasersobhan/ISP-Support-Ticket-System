<?php theme_include('header'); ?>

<div class="row">
    <div class="col-md-9">

         <div class="panel panel-default"><div class="panel-body">
           <div class="panel-heading"><h1><?PHP echo get_pgtitle() ?> <sup><a href="<?Php echo get_tbllink(is_get('tbl')); ?>" class="btn btn-default btn-sm">List</a> <a href="<?Php echo get_tbllink(is_get('tbl'),'edit', is_get('value')); ?>" class="btn btn-success btn-sm">Edit</a> </sup></h1></div>
                     <?php get_view_al() ?>
                   
 
            </div>              
        </div>         
    </div>
 <div class="col-md-3">
    <?php get_sidebar(); ?>
      </DIV>
</div>

<?php theme_include('footer'); ?>
       
