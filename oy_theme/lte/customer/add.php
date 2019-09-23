<?php 
global $dbase;
$form_url = HOME.'?pg=customer&add=go';
$ajaxLoad = '';

$edit = FALSE;
if(is_get('eid')){
  $id = is_get('eid');
  $tbl = 'sob_customerinfo';
  $edit = $dbase->tbl2array2($tbl,'*',' WHERE cus_id='.$id)[0];
  if (count($edit)) {
    $form_url = HOME.'?pg=customer&update='.$id;
    $ajaxLoad = 'ajaxform';
  }
}

?>
<form method="post" <?=$ajaxLoad?> action="<?=$form_url?>" name="add"  id="addcustomer">
      
  <div class="modal-header">
    <h4 class="modal-title" id="myModalLabel">مشخصات مشتری</h4>
  </div>
  
  <div class="modal-body">

    <table class="table">

      <tr>
        <td>
          <label for="cus_contractnu" class="control-label">شماره قرارداد :</label>
        </td>
        <td>
          <input type="text" <?php echo ($edit ? 'value="'.$edit['cus_contractnu'].'"' : ''); ?> class="form-control" name="cus_contractnu" id="cus_contractnu">
        </td>
      </tr>

      <tr>
        <td>
          <label for="cus_name" class="control-label"> نام مکمل مشتری :</label>
        </td>
        <td>
          <input type="text" <?php echo ($edit ? 'value="'.$edit['cus_name'].'"' : ''); ?> class="form-control col-md-6" name="cus_name" id="cus_name">
        </td>
      </tr>

      <tr>
        <td>
          <label for="cus_label" class="control-label"> نام شرکت :</label>
        </td>
        <td>
          <input type="text" <?php echo ($edit ? 'value="'.$edit['cus_label'].'"' : ''); ?> class="form-control" name="cus_label" id="cus_label">
        </td>
      </tr>

      <tr>
        <td>
          <label for="cus_cid" class="control-label">شناسه مشتری:</label>
        </td>
        <td>
          <input type="text" <?php echo ($edit ? 'value="'.$edit['cus_cid'].'"' : ''); ?> class="form-control col-md-6" name="cus_cid" id="cus_cid">
        </td>
      </tr>

      <tr>
        <td>
          <label for="cus_phone" class="control-label">شماره تماس:</label>
        </td>
        <td>
          <input type="phone" <?php echo ($edit ? 'value="'.$edit['cus_phone'].'"' : ''); ?> class="form-control" name="cus_phone" id="cus_phone">
        </td>
      </tr>

      <tr>
        <td>
          <label for="cus_phone2" class="control-label">شماره تماس 2:</label>
        </td>
        <td>
          <input type="phone" <?php echo ($edit ? 'value="'.$edit['cus_phone2'].'"' : ''); ?> class="form-control" name="cus_phone2" id="cus_phone2">
        </td>
      </tr>

      <tr>
        <td>
          <label for="cus_address" class="control-label">آدرس:</label>
        </td>
        <td>
        <textarea name="cus_address" class="form-control autogrow" rows="3"><?php echo ($edit ? $edit['cus_address'] : ''); ?></textarea>
        </td>
      </tr>

      <tr>
        <td>
          <label for="cus_email" class="control-label"> ایمیل:</label>
        </td>
        <td>
          <input type="email" <?php echo ($edit ? 'value="'.$edit['cus_email'].'"' : ''); ?> class="form-control col-md-7" name="cus_email" id="cus_email">
        </td>
      </tr>

      <tr>
        <td>
          <label for="cus_sdate" class="control-label"> تاریخ شروع:</label>
        </td>
        <td>
          <input type="date" <?php echo ($edit ? 'value="'. date('Y-m-d',strtotime($edit['cus_sdate'])).'"' : ''); ?> class="form-control" name="cus_sdate" id="cus_sdate">
        </td>
      </tr>

      <tr>
        <td>
          <label for="cus_edate" class="control-label"> تاریخ ختم:</label>
        </td>
        <td>
          <input type="date" <?php echo ($edit ? 'value="'. date('Y-m-d',strtotime($edit['cus_edate'])).'"' : ''); ?> class="form-control" name="cus_edate" id="cus_edate">
        </td>
      </tr>

      <tr>
        <td>
          <label for="cus_term" class="control-label">شرایط:</label>
        </td>
        <td>
        <textarea name="cus_term" class="form-control autogrow" rows="2"><?php echo ($edit ? $edit['cus_term'] : ''); ?></textarea>
        </td>
      </tr>

      <tr>
        <td>
          <label for="cus_demoterm" class="control-label">شرایط آزمایشی:</label>
        </td>
        <td>
        <textarea name="cus_demoterm" class="form-control autogrow" rows="2"><?php echo ($edit ? $edit['cus_demoterm'] : ''); ?></textarea>
        </td>
      </tr>

    </table>

  </div>
  <div class="modal-footer">
    <button class="btn btn-success btn-sm"  type="submit">ثبت</button>
  </div>
</form>