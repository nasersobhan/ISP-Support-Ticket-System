
  <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a>
                      ثبت جنس
                    </a>
                </h4>
                </div>




<form method="post" action="<?php echo HOME ?>?pg=customer&add=go" name="add"  id="addcustomer">

  
  <div class="modal-body">

    <table class="table">

      <tr>
        <td>
          <label for="cus_contractnu" class="control-label">شماره:</label>
        </td>
        <td>
          <input type="text" class="form-control" name="cus_contractnu" id="cus_contractnu">
        </td>
      </tr>

      <tr>
        <td>
          <label for="cus_label" class="control-label">تاریخ :</label>
        </td>
        <td>
          <input type="date" class="form-control" name="cus_label" id="cus_label">
        </td>
      </tr>

      <input type="hidden" class="form-control col-md-6" name="cus_name" value="<?Php echo user_uid(); ?>">

      <tr>
        <td>
          <label for="cus_label" class="control-label">مدت رخصتی :</label>
        </td>
        <td>
          <input type="number" class="form-control col-md-3" name="cus_label" id="cus_label"> 
          <span class="col-md-1" ></span>
          <select  class="form-control col-md-3" >
            <option value="day">روز</option>
            <option value="hour">ساعت</option>
          </select>
        </td>
      </tr>

      <tr>
        <td>
          <label for="cus_phone" class="control-label">تاریخ شروع:</label>
        </td>
        <td>
          <input type="date" class="form-control" name="cus_phone" id="cus_phone">
        </td>
      </tr>

      <tr>
        <td>
          <label for="cus_phone" class="control-label">تاریخ ختم:</label>
        </td>
        <td>
          <input type="date" class="form-control" name="cus_phone" id="cus_phone">
        </td>
      </tr>

      <tr>
        <td>
          <label for="cus_phone2" class="control-label">نوع رخصتی:</label>
        </td>
        <td>
        <select  class="form-control" >
            <option value="day">استحقاقی</option>
            <option value="hour">استعلاجی</option>
            <option value="hour">بدون معاش</option>
          </select>
        </td>
      </tr>


      <tr>
        <td>
          <label for="cus_phone2" class="control-label">شخص جایگزین:</label>
        </td>
        <td>
          <input type="phone" class="form-control" name="cus_phone2" id="cus_phone2">
        </td>
      </tr>

     
    </table>



    <hr>

    <table class="table">


      <tr>
        <td>
          <label for="cus_label" class="control-label">تاریخ :</label>
        </td>
        <td>
          <input type="date" class="form-control" name="cus_label" id="cus_label">
        </td>
      </tr>

      <input type="hidden" class="form-control col-md-6" name="cus_name" value="<?Php echo user_uid(); ?>">

      <tr>
        <td>
         
        </td>
        <td>

          <div class="radio">
  <label><input type="radio" name="optradio" checked>موافقت</label>
</div>
<div class="radio">
  <label><input type="radio" name="optradio">عدم موافقت</label>
</div>
        </td>
      </tr>

      <tr>
        <td>
          <label for="cus_phone" class="control-label">مشخصات جنس:</label>
        </td>
        <td>
          <textarea class="form-control autogrow" rows="5" name="cus_phone" id="cus_phone"></textarea>
        </td>
      </tr>

     

     
    </table>

  </div>
  <div class="modal-footer">
    <button class="btn btn-success btn-sm"  type="submit">ذخیره و جدید</button>
  </div>
</form>



</div>
</div>