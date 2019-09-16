<div class="modal fade" id="addticket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        
<form method="post" action="<?php echo HOME ?>?pg=ticket&add=new" name="add" id="addticket">
      
  <div class="modal-header">
    <h4 class="modal-title" id="myModalLabel">فرم درخواست خدمات تخنیکی</h4>
  </div>
  
  <div class="modal-body">

    <table class="table">
      

      <tbody><tr>
        <td>
          <label for="tic_title" class="control-label">عنوان :</label>
        </td>
        <td>
          <input type="text" class="form-control col-md-12" value="" name="tic_title" id="tic_title">
        </td>
      </tr>

   
                
          <tr>
        <td>
          <label for="tic_cid" title="بسیار عالی" class="control-label tip">شناسه مشتری :</label>
        </td>
        <td>
          <input type="text" class="form-control col-md-12" name="tic_cid" id="tic_cid">
        </td>
      </tr>
   
        <tr>
        <td>
          <label for="tic_category" class="control-label">دسته بندی :</label>
        </td>
        <td>
          <select class="form-control col-md-12" name="tic_category">  
          <option value="1258">ضعیفی نت</option><option value="1259">نبود کامل نت</option><option value="1260">برسی وسایل</option><option value="1261">نصب جدید</option>          </select>
        </td>
      </tr>
            <tr>
        <td>
          <label for="tic_priority" class="control-label">اولویت :</label>
        </td>
        <td>
          <select class="form-control col-md-12" name="tic_priority">
               
          <option value="1255">نورمال</option><option value="1256">عاجل</option><option value="1257">خیلی عاجل</option>          </select>
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
                <input type="hidden" value="2" name="tic_type">
          </tbody></table>


    
  </div>
  <div class="modal-footer">
  <button class="btn btn-success btn-sm" type="submit">ذخیره و نمایش</button>
  <button type="button" class="btn btn-default" data-dismiss="modal">خروج</button>
    
  </div>
</form>
  </div>
  </div>
</div>