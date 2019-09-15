<?php 
$title=''; global $dbase;
$customer = FALSE;
if(is_get('cid')){
  $id = is_get('cid');
  $tbl = 'sob_customerinfo';
  $customer = $dbase->tbl2array2($tbl,'*',' WHERE cus_id='.$id)[0];
  if (count($customer)) {
      $title = 'نصب جدید مشتری '. $customer['cus_name'];
  } else {
    $customer = FALSE;
  }
}
?>

<form method="post" action="<?php echo HOME ?>?pg=ticket&add=new<?Php echo ($customer ? '&cid='.$customer['cus_id'] : ''); ?>" name="add"  id="addticket">
      
  <div class="modal-header">
    <h4 class="modal-title" id="myModalLabel">فرم درخواست خدمات تخنیکی</h4>
  </div>
  
  <div class="modal-body">

    <table class="table">
      

      <tr>
        <td>
          <label for="tic_title" class="control-label">عنوان :</label>
        </td>
        <td>
          <input type="text" class="form-control col-md-7" value="<?=$title?>" name="tic_title" id="tic_title">
        </td>
      </tr>

   
        <?php if(!$customer){ ?>
        
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
          <label for="tic_category" class="control-label">دسته بندی :</label>
        </td>
        <td>
          <select class="form-control col-md-6" name="tic_category">  
          <?php
             $oild =  cat_2arr_l('tickets',0,'fa_AF');
             //$koo_now = get_imp_koo();
             $selected = ''; //($koo_now==$id ? 'selected' : '')
            foreach($oild as $id => $label){
                 echo '<option '.$selected.' value="'.$id.'">'.$label.'</option>';
            }
            ?>
          </select>
        </td>
      </tr>
      <?php } ?>
      <tr>
        <td>
          <label for="tic_priority" class="control-label">اولویت :</label>
        </td>
        <td>
          <select class="form-control col-md-6" name="tic_priority">
               
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
      <?php if(!$customer){ ?>
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
      <?Php } ?>
    </table>


    <?php if($customer) {?> 
    
      <table class="table">
      <tr>
        <th colspan="2">
         نیازها
        </th>

      </tr>

      <tr>
        <td>
        پهنا باند
        </td>
        <td>
          <?Php echo $customer['cus_bw']; ?>
        </td>
      </tr>

      <tr>
        <td>
        هزینه خدمات
        </td>
        <td>
          <?Php echo $customer['cus_servicecharge']; ?>
        </td>
      </tr>

      <tr>
        <td>
        آنتن
        </td>
        <td>
          <?Php echo $customer['cus_antenna']; ?>
        </td>
      </tr>

      <tr>
        <td>
        روتر
        </td>
        <td>
          <?Php echo $customer['cus_router']; ?>
        </td>
      </tr>

      <tr>
        <td>
        کابل
        </td>
        <td>
          <?Php echo $customer['cus_cable']; ?>
        </td>
      </tr>

      <tr>
        <td>
        ای پی
        </td>
        <td>
          <?Php echo $customer['cus_ip']; ?>
        </td>
      </tr>
      </table>
    <?php } ?>

  </div>
  <div class="modal-footer">
    <button class="btn btn-success btn-sm"  type="submit">ذخیره و جدید</button>
  </div>
</form>


