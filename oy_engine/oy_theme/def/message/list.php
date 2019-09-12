<?php get_header() ?>
<?php  ob_start();?>


$('#recipient-name').select2({

    
    
      minimumInputLength: 2,
    
    ajax: {
        url: "<?php home_url() ?>?API=users",
        dataType: 'json',
        type: "GET",
        quietMillis: 50,
        data: function (term) {
            return {
                action: term
            };
        },
        results: function (data) {
            return {
                results: $.map(data, function (item) {
                    return {
                        text: item.value,
                        slug: item.value,
                        id: item.id
                    }
                })
            };
        }
    }
});








		

          
        
       
      



var validator = new FormValidator('send_message', [{
    name: 'usm_title',
    display: 'Title',
    rules: 'required'
},
{
 name: 'usm_body',
 display: 'Message',
 rules: 'required'
},
{
 name: 'usm_to',
 display: 'To',
 rules: 'required'
}

], function(errors, evt) {
    
    var SELECTOR_ERRORS = $('#error_box');
    

    if (errors.length > 0) {
        SELECTOR_ERRORS.empty();
			SELECTOR_ERRORS.append('<strong>Warning!</strong><br/>');
        for (var i = 0, errorLength = errors.length; i < errorLength; i++) {
            SELECTOR_ERRORS.append(errors[i].message + '<br/>');
        }

     
        SELECTOR_ERRORS.fadeIn(700);
    } else {
        SELECTOR_ERRORS.fadeOut(700);
    }

    if (event) {
        //event.returnValue = false;
    }else{
      evt.preventDefault();
    
    }
});




<?php 
$contents = ob_get_contents();
ob_end_clean();
addlinejs($contents);?>



  <div class="tab-pane fade active in" id="jobs">
    <table  id="datatable" class="jobs_TBL table">
 
        <tr>
      
        <td  colspan="4" height="20"  class="small_txt">
          <h2 class="pull-left"> &nbsp;&nbsp Message Inbox</h2>
          
        
        <div class="btn-group pull-right" role="group" aria-label="...">
   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >New Message</button>

  <button type="button" class="btn btn-default"><i class="fa fa-cog"></i> Un-Read</button>
  <button type="button" class="btn btn-default"><i class="fa fa-cog"></i> SRight</button>
</div>
        
          
       <form action="<?php echo get_link('message','new','post') ?>" method="POST">     
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">New message</h4>
      </div>
      <div class="modal-body">
      
          <div class="form-group">
            <label for="recipient-name" class="control-label">Recipient:</label>
            <input type="text" name="touser" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Message:</label>
            <textarea name="message" class="form-control" id="message-text"></textarea>
          </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>

  </form>
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
        </td>
      </tr>
      
    
      <tr class="bg_red">
          
      
          
          <th height="20"   class="small_txt w300 "><span class="style6"><strong>&nbsp;&nbsp;Title</strong></span></th>

        <th width="100"  class="small_txt "><span class="style6"><strong>Date</strong></span></th>
   
      
        <th width="100" height="20"  class="small_txt "><span class="style6"><strong>Replay</strong></span></th>
      <th class="small_txt " style="width:120px;"><span class="style6"><strong>&nbsp;&nbsp;Actions</strong></span></th>
      </tr>

      
 
      <?php
            if(have_post()) { while(have_post()) : the_post();   ?>


      <tr >
          
     
          
       <td class="h20"  >
           <a href="<?php echo get_link('message','view',get_con_id()); ?>"><?php acc_username() ?></a></td>
       

       <td  class=" h20" ><?php // job_closingdate() ?></td>

    
       <td class="h20"><?php //job_closingdate() ?></td>
       
       
              <td>
                
                dfgdfg
                
                
         
          </td>
      </tr>
    
      
          <?php endwhile; } ?> 
      
       <tr >
       <td  colspan="4"  ><?php 
       global $total, $max_num, $curpage; //echo $total, $max_num;
       echo pagination($total,$max_num,$curpage,get_link('jobs','list','all&')); ?></td>
      </tr>
      
      
      
    </table>
    <br>

  </div>
    
    


    
    


<?php get_sidebar() ?>
</td>

<?php get_footer() ?>
