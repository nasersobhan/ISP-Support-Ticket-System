<?php  allowByrank(99); get_header(); ?>
<div class="row">
    <div class=" col-md-2">
        <?php get_sidebar('left'); ?>
    </div>
    <div  id="main-body" class="col-md-7">
        <div class="panel panel-default jobs-bg">
            <div class="panel-body">
                <div class="page-header ">
                    <h1>
                        <?php echo get_pgtitle() ?> <sup><small class="badge"><?php global $total;
                        echo (is_get('page') ? 'صفحه: ' . is_get('page') : 'تعداد: ' . $total) ?></small>

                            <a class="pull-left btn btn-success btn-sm" href="<?php echo post_addlink() ?>">اضافه کنید</a>                                          
                        </sup>
                    </h1>
                </div>


                <?php
                if(have_post()){
                    while(have_post()) : the_post();
                        ?>
              
                    <?php echo '<h2>' . get_cat_name() . '</h2>'; ?>
               
                        <div class="row">
                            <div class=" col-md-4"><?php echo '<img class="pull-left img-responsive img-rounded" src="' . to_croped(get_fileurl(get_cat_avatar()), 250) . '" />'; ?></div>
                            <div class=" col-md-8">
                                <?Php
                                
                                $con = (get_cat_content());
                                if(is_serialized($con)){
                                 $arr = unserialize($con);
                                 
                                echo '<p>' . html_entity_decode(lim4str($arr['des'],1000,true));
                                
                                }else{
                                    echo '<p>' . html_entity_decode(lim4str($con,1000,true)) ;
                                }
                                
                              echo  '<a href="'.post_viewlink(get_cat_slug(),get_cat_type()).'">بیشتر</a> | <a href="'.post_editlink(get_cat_id(),get_cat_type()).'">ویرایش</a>'
                                    . '| '.get_otherlangs(get_cat_id(),get_cat_lang()).'</p>'
                                ?>
                                
                                <br/>
                                
                                
                                <?php
                               
                                
                                ?>
                               
                            </div>
                        </div>


                        <?php
                    endwhile;
                }
                ?>

                <?Php
                if(is_get('loader') == false){
                    global $pagin;
                    echo $pagin;
                }
                ?>


            </div>
        </div>
    </div>





    <div class="col-md-3">
<?php get_sidebar(''); ?>
    </div>
</div>


<?php get_footer(); ?>
