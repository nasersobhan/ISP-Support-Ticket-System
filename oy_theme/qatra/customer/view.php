<?php 
global $dbase;


  $id = is_get('id');
  $tbl = 'sob_customerinfo';
  $edit = $dbase->tbl2array2($tbl,'*',' WHERE cus_id='.$id)[0];


?>

  <div class="modal-header">
    <h4 class="modal-title" id="myModalLabel">مشخصات مشتری</h4>
  </div>
  
  <div id="tablebox" class="modal-body">

    <table class="table">

      <tr>
        <td>
          <label for="cus_contractnu" class="control-label">شماره قرارداد :</label>
        </td>
        <td>
          <?php echo ($edit ? $edit['cus_contractnu'] : ''); ?>
        </td>
      </tr>

      <tr>
        <td>
          <label for="cus_name" class="control-label"> نام مکمل مشتری :</label>
        </td>
        <td>
        <?php echo ($edit ? $edit['cus_name'] : ''); ?> 
        </td>
      </tr>

      <tr>
        <td>
          <label for="cus_label" class="control-label"> نام شرکت :</label>
        </td>
        <td>
         <?php echo ($edit ? $edit['cus_label'] : ''); ?>
        </td>
      </tr>

      
      <tr>
        <td>
          <label for="cus_cid" class="control-label">شناسه مشتری:</label>
        </td>
        <td>
          <?php echo ($edit ? $edit['cus_cid'] : ''); ?>
        </td>
      </tr>

      <tr>
        <td>
          <label for="cus_phone" class="control-label">شماره تماس:</label>
        </td>
        <td>
         <?php echo ($edit ? $edit['cus_phone'] : ''); ?>
        </td>
      </tr>

      <tr>
        <td>
          <label for="cus_phone2" class="control-label">شماره تماس 2:</label>
        </td>
        <td>
         <?php echo ($edit ? $edit['cus_phone2'] : ''); ?> 
        </td>
      </tr>

      <tr>
        <td>
          <label for="cus_address" class="control-label">آدرس:</label>
        </td>
        <td>
      <?php echo ($edit ? nl2br($edit['cus_address']) : ''); ?>
        </td>
      </tr>

      <tr>
        <td>
          <label for="cus_email" class="control-label"> ایمیل:</label>
        </td>
        <td>
         <?php echo ($edit ? $edit['cus_email'] : ''); ?>
        </td>
      </tr>

      <tr>
        <td>
          <label for="cus_sdate" class="control-label"> تاریخ شروع:</label>
        </td>
        <td>
         <?php echo ($edit ? date('Y-m-d',strtotime($edit['cus_sdate'])) : ''); ?>
        </td>
      </tr>

      <tr>
        <td>
          <label for="cus_edate" class="control-label"> تاریخ ختم:</label>
        </td>
        <td>
        <?php echo ($edit ? date('Y-m-d',strtotime($edit['cus_edate'])) : ''); ?>
        </td>
      </tr>

      <tr>
        <td>
          <label for="cus_term" class="control-label">شرایط:</label>
        </td>
        <td>
       <?php echo ($edit ? $edit['cus_term'] : ''); ?>
        </td>
      </tr>

      <tr>
        <td>
          <label for="cus_demoterm" class="control-label">شرایط آزمایشی:</label>
        </td>
        <td>
     <?php echo ($edit ? $edit['cus_demoterm'] : ''); ?>
        </td>
      </tr>

    </table>

  </div>
  <div class="modal-footer">
   
  </div>
