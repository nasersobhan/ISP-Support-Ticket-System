 <div class="panel panel-default visible-lg-*">
        <div class="panel-heading"><?php echo g_lbl('similarposts') ?></div>
        
            <div class="list-group">

               <?php 
               $cate = get_cat_category();
               $type = get_cat_type();
               $lang = get_cat_lang();
            get_relateds($type,$cate,$lang);
               
               ?>
                
                
                
              
                   
            </div>
     
    </div>