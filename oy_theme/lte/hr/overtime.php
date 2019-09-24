<div id="main-form">
  <?php if(is_get('oid')==false) { ?>

    <form ajaxform method="post" action="<?php echo HOME ?>?pg=hr&overtime=add" name="add"  id="addcustomer">
      
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">فرم ثبت اضافه کاری</h4>
      </div>
      
      <div class="modal-body">


    <table class="table">


      <tr>
        <td>
          <label for="ove_formtime" class="control-label">زمان شروع:</label>
        </td>
        <td>
          <input type="time" required class="form-control" name="ove_formtime" id="ove_formtime">
        </td>
      </tr>

      <tr>
        <td>
          <label for="ove_totime" class="control-label">زمان ختم:</label>
        </td>
        <td>
          <input type="time" required class="form-control" name="ove_totime" id="ove_totime">
        </td>
      </tr>

      <tr>
      
      <tr>
        <td>
          <label for="ove_what" class="control-label">کار قابل اجراء:</label>
        </td>
        <td>
          <textarea required name="ove_what" class="form-control" rows="4"></textarea>
        </td>
      </tr>

      <tr>
        <td>
          <label for="ove_why" class="control-label">علت اضافه کاری:</label>
        </td>
        <td>
          <textarea required name="ove_why" class="form-control" rows="4"></textarea>
        </td>
      </tr>
     

      <tr>
        <td>
          <label for="ove_odate" class="control-label">تاریخ:</label>
        </td>
        <td>
        <input type="date" required class="form-control" name="ove_odate" id="ove_odate">
        </td>
      </tr>
    </table>



<?php } elseif(is_get('oid')) { 
  global $dbase;
  $lid = trim(is_get('oid'));
  $where = " WHERE ove_id={$lid}";
  $rows = $dbase->tbl2array2('sob_overtime','*',$where);
  $leave = $rows[0];
 
  ?>
  <form method="post" ajaxform action="<?php echo HOME ?>?pg=hr&overtime=edit&oid=<?php echo $lid ?>" name="add"  id="addcustomer">
      
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">تایید/ رد اضافه کاری</h4>
      </div>
      <input name="uid" value="<?php echo $leave['ove_uid']; ?>" type="hidden">
      <div class="modal-body">

    <table class="table">

    <tr class="warning">
        <th colspan="2" class="text-center">
          مشخصات اضافه کاری
        </th>
      </tr>

    <tr>
        <th>
          درخواست کننده:
        </th>
        <td>
          <?php echo user_name_ex($leave['ove_uid']); ?>
        </td>
      </tr>

      <tr>
        <th>
          زمان
        </th>
        <td>
          <?php echo $leave['ove_formtime'].' تا '.$leave['ove_totime'] . ' بتاریخ: '. $leave['ove_odate'] ; ?>
        </td>
      </tr>


      <tr>
        <th>
           کار قابل اجراء
        </th>
        <td>
          <?php echo nl2br($leave['ove_what']); ?>
        </td>
      </tr>



      <tr>
        <th>
          دلیلی اضافه کاری
        </th>
        <td>
          <?php echo nl2br($leave['ove_why']); ?>
        </td>
      </tr>

      <tr class="text-center success">
        <th class="text-center" colspan="2">
          تایید شما
        </th>
      </tr>



      <tr>
        <td>
        <div class="radio">
        <label class="text-success"><input id="accepted" type="radio"  value="1" name="ove_approve" checked>موافقت</label>
        </div>
        </td>
        <td>
     
  

        <div class="radio">
          <label class="text-danger"><input id="notaccepted" type="radio" value="2" name="ove_approve">عدم موافقت</label>
        </div>
        </td>
      </tr>
 

 
      <!-- <tr>
        <th>
        
        </th>
        <td>
        <div class="radio">
    <label><input type="radio" value="1" name="ove_approve" checked>تایید درخواست</label>
  </div>
  <div class="radio">
    <label><input type="radio" value="2" name="ove_approve">رد درخواست</label>
  </div>
        </td>
      </tr> -->



      

     
    </table>
<?Php } ?>
</div>
  <div class="modal-footer">
    <button class="btn btn-success btn-sm"  type="submit">ذخیره و جدید</button>
  </div>
</form>
</div>