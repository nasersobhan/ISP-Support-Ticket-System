<?php
get_header();
?>





<div class="row">
    <div class="col-md-9" id="main-body">

  <div class="panel panel-default">
 
                                  <div class="panel-body">
     <div class="page-header ">
						<h1>&nbsp;&nbsp<?php  get_pgtitle() ?>
                                                </h1>
					</div>
                


<?Php get_form('add_form') ?>





        </div>         
    </div>
    </div>
     <div class="col-md-3">
<?php get_sidebar('add'); ?>
     </div>
</div>


<div class="easyeditor-modal is-hidden" id="easyeditor-modal-1">
    <div class="easyeditor-modal-content">
        <div class="easyeditor-modal-content-header"><?php echo g_lbl('upload').' '.g_lbl('image') ?></div>
        <div class="easyeditor-modal-content-body">
            <div class="easyeditor-modal-content-body-loader"></div>
          

            <form action="<?php echo HOME.'?API=img-upload' ?>" method="post" enctype="multipart/form-data">
                <input type="file" name="oy_upload" id="easyeditor-file">
                <button type="submit" name="easyeditor-upload"><?php echo g_lbl('insert') ?></button>
                  <button class="easyeditor-modal-close btn-warning "><?php echo g_lbl('cancel') ?></button>
            </form>

        </div>
    </div>
</div>
<?php get_footer(); ?>