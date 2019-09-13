<form method="post" action="<?php echo HOME ?>?pg=inbox&send=go" data-source="<?php echo HOME ?>?pg=inbox #datatbl" data-selector="#reportx > div > div > div.panel-body" ajaxform reset name="add"  id="addcustomer">
      
  <div class="modal-header">
    <h4 class="modal-title" id="myModalLabel">فرم درخواست خدمات تخنیکی</h4>
  </div>
  
  <div class="modal-body">

    <table class="table">
      <tr>
        <td>
          <label for="tic_cid" title="بسیار عالی" class="control-label tip">شناسه مشتری :</label>
        </td>
        <td>
          <input type="text" class="form-control " name="tic_cid" id="tic_cid">
        </td>
      </tr>

      <tr>
        <td>
          <label for="tic_title" class="control-label">عنوان :</label>
        </td>
        <td>
          <input type="text" class="form-control col-md-7" name="tic_title" id="tic_title">
        </td>
      </tr>

      <tr>
        <td>
          <label for="tic_priority" class="control-label">اولویت :</label>
        </td>
        <td>
          <select class="form-control" name="tic_priority">
               
          <?php
             $oild =  cat_2arr_l('priority',0,'fa_AF');
             //$koo_now = get_imp_koo();
             $selected = ''; //($koo_now==$id ? 'selected' : '')
            foreach($oild as $id => $label){
                 echo '<option '.$selected.' value="'.$id.'">'.$label.'</option>';
            }
            ?>
          </select>
        </td>
      </tr>


      <tr>
        <td>
          <label for="tic_body" class="control-label">توضیح:</label>
        </td>
        <td>
        <textarea name="tic_body" class="form-control autogrow" rows="5"></textarea>
        </td>
      </tr>

      <tr>
        <td>
          <label for="tic_type" class="control-label"> نوعیت:</label>
        </td>
        <td>
          <div class="radio">
            <label><input type="radio" value="1" name="tic_type">نصب جدید</label>
          </div>
          <div class="radio">
            <label><input type="radio" value="2" name="tic_type" checked>خدمات</label>
          </div>
        </td>
      </tr>

    </table>
  </div>
  <div class="modal-footer">
    <button class="btn btn-success btn-sm"  type="submit" name="Send">ذخیره و جدید</button>
  </div>
</form>