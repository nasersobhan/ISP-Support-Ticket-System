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
                                                   <?php get_pgtitle() ?>dfgdfgh
						</h1>
					</div>




<div id="message_parent" class="container-fluid" style="max-height: 400px; overflow: scroll;overflow-x: hidden;overflow-y: auto;">
    
    <div id="message_box" >
 <?php if(have_post()) { while(have_post()) : the_post();   ?>
  
    
    
    <div class="row" style="padding: 10px 0; margin: 0;">
    
    
    <?php if(get_sob_id()==user_uid()){ ?>

    
    

    <div class="col-md-11" style="margin: 0; padding: 0 15px;">
        <div class="arrow_right  col-md-10 pull-right" style="margin: 0;">
            <?php echo nl2br(get_rep_reply()) ?> <br/>  
             <span class="label label-default">by You in <?php echo Agotime(get_rep_time()) ?></span>
        </div>
    </div>
    <div class="col-md-1  pull-right" style="margin: 0;  padding: 0;"> 
        <img class="pull-right img-thumbnail" src="<?php user_avatar(user_uid()) ?>" alt="...">
    </div>

    <?php } else { ?>
    
    <div class="col-md-1  pull-left" style="margin: 0; padding: 0;">
        <img class="pull-left img-thumbnail" src="<?php user_avatar(get_sob_id()) ?>" alt="...">
    </div>
  
    <div class="col-md-11 pull-left" style="margin: 0; padding: 0 15px;">
        <div class="arrow_box col-md-10 pull-left" >
            <?php echo nl2br(get_rep_reply()) ?> <br/> 
            <span class="label label-default">by   <?php sob_user() ?> in <?php echo Agotime(get_rep_time()) ?></span>
        </div>
    </div>
    
    
    
    
    <?php } ?>

</div>
        




  <?php endwhile; } ?> 	
<div class="row" id="result_mess" style="padding: 10px 0; margin: 0;">
    </div>
         </div>   
    </div>
    </div>

    
    
    <form ajaxform method="POST" id="smform" action="<?php get_link('message', 'view',is_get('view') ) ?>" >
        <input name="cid_x" type="hidden" value="<?php echo is_get('view') ?>" /> 
        
	<div class="row" style="padding: 10px 0; margin: 0;">
    <div class="col-md-11" style="margin: 0; padding: 0 15px;">
        <div class="arrow_right  col-md-12 pull-right" style="margin: 0;">
            <textarea name="replay" id="replaytxt" rows="5"></textarea> 
        </div>
    </div>
    <div class="col-md-1  pull-right" style="margin: 0;  padding: 0;"> 
        <button type="submit" id="sendbtn" class="btn btn-default" style="height: 70px; width: 100%">Send </button>
        <input type="checkbox" id="autoreply" checked="checked"> Enter to Send
    </div>
</div>

        </form>
        
        




    </div> </div>
    
    
    
    
    
    
    
    <div class="col-md-3">
<?php get_sidebar(); ?>
        </div>
</div>
<?php get_footer(); ?>