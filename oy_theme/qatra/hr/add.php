<form method="post" action="<?php echo HOME ?>?pg=customer&add=go" name="add"  id="addcustomer">
      
  <div class="modal-header">
    <h4 class="modal-title" id="myModalLabel">فرم ثبت مشتری جدید</h4>
  </div>
  
  <div class="modal-body">

    <table class="table">
      <tr class="info">
        <th colspan="2">
          مشخصات اولیه
        </th>    
      </tr>

      <tr>
        <td>
          <label for="cus_contractnu" class="control-label">شماره قرارداد :</label>
        </td>
        <td>
          <input type="text" class="form-control" name="cus_contractnu" id="cus_contractnu">
        </td>
      </tr>

      <tr>
        <td>
          <label for="cus_name" class="control-label"> نام مکمل مشتری :</label>
        </td>
        <td>
          <input type="text" class="form-control col-md-6" name="cus_name" id="cus_name">
        </td>
      </tr>

      <tr>
        <td>
          <label for="cus_label" class="control-label"> نام شرکت :</label>
        </td>
        <td>
          <input type="text" class="form-control" name="cus_label" id="cus_label">
        </td>
      </tr>

      <tr>
        <td>
          <label for="cus_phone" class="control-label">شماره تماس:</label>
        </td>
        <td>
          <input type="phone" class="form-control" name="cus_phone" id="cus_phone">
        </td>
      </tr>

      <tr>
        <td>
          <label for="cus_phone2" class="control-label">شماره تماس 2:</label>
        </td>
        <td>
          <input type="phone" class="form-control" name="cus_phone2" id="cus_phone2">
        </td>
      </tr>

      <tr>
        <td>
          <label for="cus_address" class="control-label">آدرس:</label>
        </td>
        <td>
        <textarea name="cus_address" class="form-control autogrow" rows="3"></textarea>
        </td>
      </tr>

      <tr>
        <td>
          <label for="cus_email" class="control-label"> ایمیل:</label>
        </td>
        <td>
          <input type="email" class="form-control col-md-7" name="cus_email" id="cus_email">
        </td>
      </tr>

      <tr>
        <td>
          <label for="cus_sdate" class="control-label"> تاریخ شروع:</label>
        </td>
        <td>
          <input type="date" class="form-control" name="cus_sdate" id="cus_sdate">
        </td>
      </tr>

      <tr>
        <td>
          <label for="cus_edate" class="control-label"> تاریخ ختم:</label>
        </td>
        <td>
          <input type="date" class="form-control" name="cus_edate" id="cus_edate">
        </td>
      </tr>

      <tr>
        <td>
          <label for="recipient-name" class="control-label">شرایط:</label>
        </td>
        <td>
        <textarea name="cus_term" class="form-control autogrow" rows="2"></textarea>
        </td>
      </tr>

      <tr>
        <td>
          <label for="recipient-name" class="control-label">شرایط آزمایشی:</label>
        </td>
        <td>
        <textarea name="cus_demoterm" class="form-control autogrow" rows="2"></textarea>
        </td>
      </tr>

      <tr class="info">
        <th colspan="2">
          نیاز ها
        </th>    
      </tr>

      <tr>
        <td>
          <label for="cus_bw" class="control-label"> پهنا باند:</label>
        </td>
        <td>
          <input type="text" class="form-control" name="cus_bw" id="cus_bw">
        </td>
      </tr>
      
      <tr>
        <td>
          <label for="cus_servicecharge" class="control-label"> هزینه خدمات:</label>
        </td>
        <td>
          <input type="text" class="form-control" name="cus_servicecharge" id="cus_servicecharge">
        </td>
      </tr>

      <tr>
        <td>
          <label for="cus_antenna" class="control-label"> آنتن:</label>
        </td>
        <td>
          <input type="text" class="form-control" name="cus_antenna" id="cus_antenna">
        </td>
      </tr>

      <tr>
        <td>
          <label for="cus_router" class="control-label"> روتر:</label>
        </td>
        <td>
          <input type="text" class="form-control" name="cus_router" id="cus_router">
        </td>
      </tr>

      <tr>
        <td>
          <label for="cus_cable" class="control-label"> کابل:</label>
        </td>
        <td>
          <input type="text" class="form-control" name="cus_cable" id="cus_cable">
        </td>
      </tr>

      <tr>
        <td>
          <label for="cus_ip" class="control-label"> ای پی:</label>
        </td>
        <td>
          <input type="text" class="form-control" name="cus_ip" id="cus_ip">
        </td>
      </tr>

    </table>

  </div>
  <div class="modal-footer">
    <button class="btn btn-success btn-sm"  type="submit">ذخیره و جدید</button>
  </div>
</form>