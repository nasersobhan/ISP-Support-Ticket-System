<div id="main-form">
  <?php if(is_get('lid')==false) { ?>

    <form ajaxform method="post" action="<?php echo HOME ?>?pg=hr&add=go" name="add"  id="addcustomer">
      
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">فرم درخواست رختصی</h4>
      </div>
      
      <div class="modal-body">


    <table class="table">
<!-- 
      <tr>
        <td>
          <label for="cus_contractnu" class="control-label">شماره:</label>
        </td>
        <td>
          <input type="text" class="form-control" name="cus_contractnu" id="cus_contractnu">
        </td>
      </tr> -->

      <!-- <tr>
        <td>
          <label for="cus_label" class="control-label">تاریخ :</label>
        </td>
        <td>
          <input type="date" class="form-control" name="cus_label" id="cus_label">
        </td>
      </tr> -->

      <tr>
        <td>
          <label for="lea_number" class="control-label">مدت رخصتی :</label>
        </td>
        <td>
          <input type="number" class="form-control col-md-4" name="lea_number" id="lea_number"> 
          <span class="col-md-1" ></span>
          <select name="lea_numtype" class="form-control col-md-4" >
            <option value="روز">روز</option>
            <option value="ساعت">ساعت</option>
          </select>
        </td>
      </tr>

      <tr>
        <td>
          <label for="lea_fdate" class="control-label">تاریخ شروع:</label>
        </td>
        <td>
          <input type="date" class="form-control" name="lea_fdate" id="lea_fdate">
        </td>
      </tr>

      <tr>
        <td>
          <label for="lea_edate" class="control-label">تاریخ ختم:</label>
        </td>
        <td>
          <input type="date" class="form-control" name="lea_edate" id="lea_edate">
        </td>
      </tr>

      <tr>
        <td>
          <label for="lea_type" class="control-label">نوع رخصتی:</label>
        </td>
        <td>
        <select name="lea_type" class="form-control col-md-6" >
        
        <?php
          $oild =  cat_2arr_l('leavetypes',0,'fa_AF');
          foreach($oild as $id => $label) {
            echo '<option value="'.$id.'">'.$label.'</option>';
          }
                        ?>
          </select>
        </td>
      </tr>


      <tr>
        <td>
          <label for="lea_replacement" class="control-label">شخص جایگزین:</label>
        </td>
        <td>
          <input type="text" class="form-control usergroupList" data-only="u" name="lea_replacement" id="lea_replacement">
        </td>
      </tr>

      <tr>
        <td>
          <label for="lea_whywp" class="control-label">علت رخصتی:</label>
        </td>
        <td>
          <textarea name="lea_whywp" class="form-control" rows="4"></textarea>
        </td>
      </tr>
     
    </table>



<?php } elseif(is_get('lid')) { 
  global $dbase;
  $lid = trim(is_get('lid'));
  $where = " WHERE lea_id={$lid}";
  $rows = $dbase->tbl2array2('sob_leaves','*',$where);
  $leave = $rows[0];
  $accepted = 'no';
  if($leave['lea_replaceaccept']==1) {
    $accepted = 'yes';
  }
  ?>
  <form method="post" ajaxform action="<?php echo HOME ?>?pg=hr&update=<?php echo $lid ?>&type=<?=$accepted?>" name="add"  id="addcustomer">
      
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">تایید/ رد درخواست رخصتی</h4>
      </div>
      <input name="uid" value="<?php echo $leave['lea_uid']; ?>" type="hidden">
      <div class="modal-body">

    <table class="table">

    <tr class="warning">
        <th colspan="2" class="text-center">
           مشخصات رخصتی
        </th>
      </tr>

    <tr>
        <th>
          درخواست کننده:
        </th>
        <td>
          <?php echo user_name_ex($leave['lea_uid']); ?>
        </td>
      </tr>

      <tr>
        <th>
          تعداد
        </th>
        <td>
          <?php echo $leave['lea_number'].' '.$leave['lea_numtype']; ?>
        </td>
      </tr>


      <tr>
        <th>
          شخص جایگزین
        </th>
        <td> احمد
          <?php //echo user_name_ex($leave['lea_replacement']); ?>
        </td>
      </tr>

      <tr>
        <th>
          نوع رخصتی
        </th>
        <td>
          <?php echo get_cate_name($leave['lea_type']); ?>
        </td>
      </tr>


      <tr>
        <th>
          دلیلی رخصتی
        </th>
        <td>
          <?php echo nl2br($leave['lea_whywp']); ?>
        </td>
      </tr>
<?php if(user_uid() != $leave['lea_uid'] ) { ?>
      <tr class="text-center success">
        <th class="text-center" colspan="2">
          تایید شما
        </th>
      </tr>





     <?php if($accepted=='yes') { ?>
      <tr>
        <td>
        <div class="radio">
        <label class="text-success"><input id="accepted" type="radio"  value="1" name="lea_accepted" checked>موافقت</label>
        </div>
        </td>
        <td>
     
  

        <div class="radio">
          <label class="text-danger"><input id="notaccepted" type="radio" value="2" name="lea_accepted">عدم موافقت</label>
        </div>
        </td>
      </tr>


      <tr id="leave_reason" class="hidden">
        <th>
          <label for="cus_phone" class="control-label">دلیل:</label>
        </th>
        <td>
          <textarea class="form-control" rows="5" name="lea_whynotaccepted" id="lea_whynotaccepted"></textarea>
        </td>
      </tr>

 

     <?php } else { ?>



      <tr>
        <td>
        <div class="radio">
        <label class="text-success"><input id="accepted" type="radio"  value="1" name="lea_replaceaccept" checked>برای جایگزینی موافقم</label>
        </div>
        </td>
        <td>
     
  

        <div class="radio">
          <label class="text-danger"><input id="notaccepted" type="radio" value="2" name="lea_replaceaccept">برای جایگزینی موافق نیستم</label>
        </div>
        </td>
      </tr>


      <?php } ?>

     <?php } ?>

      

     
    </table>
<?Php } ?>
</div>
  <div class="modal-footer">
  <?php if(isset($leave)) { if(user_uid() != $leave['lea_uid']) { ?>
    <button class="btn btn-success btn-sm"  type="submit">ثبت</button>
    <?php } }else { ?>
      <button class="btn btn-success btn-sm"  type="submit">ذخیره و جدید</button>

    <?php } ?>
  </div>
</form>
</div>