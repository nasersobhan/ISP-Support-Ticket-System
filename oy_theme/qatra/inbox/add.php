<form method="post" action="<?php echo HOME ?>?pg=inbox&send=go" data-source="<?php echo HOME ?>?pg=inbox #datatbl" data-selector="#reportx > div > div > div.panel-body" ajaxform reset  enctype="application/x-www-form-urlencoded" name="add"  id="adduser" lang="fa">

      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
        <h4 class="modal-title" id="myModalLabel">ارسال پیام</h4>
      </div>
          <div class="modal-body">

        



                  <div class="form-group">
                    <?php if(is_get('toid')){ ?>
                      <label for="recipient-name" class="control-label">ارسال به: <?php echo toidlabel(is_get('toid')) ?></label>
                    <input type="hidden" value="<?php echo is_get('toid') ?>"  name="to" id="to">
                  <?Php  }else {
                      ?>
 
 <label for="recipient-name" class="control-label">شخص/ گروپ/ دیپارتمنت/ سایت:</label>
                    <input type="text" class="form-control col-md-12 usergroupList"  name="to" id="to">
                    <?php } ?>
                  </div>


                  <div class="form-group com-md-12">
                    <label for="recipient-name" class="control-label">عنوان :</label>
                    <input type="text" class="form-control col-md-12" name="title" id="title">
                  </div>

                  <div class="form-group">
                    <label for="recipient-name" class="control-label"><?php e_lbl('title') ?>:</label>
                    <textarea name="body" class="form-control autogrow" rows="9"></textarea>
                
                  </div>



  


   




          </div>
      <div class="modal-footer">
    
      <button class="btn btn-success btn-sm"  type="submit" name="Send">ذخیره و جدید</button>
      </div>
      </form>