<form method="post" action="<?php echo HOME ?>?pg=todo&add=go" 
data-source="<?php echo HOME ?>?pg=todo #todolists" 
data-selector="#listtodo" 
ajaxform reset  enctype="application/x-www-form-urlencoded" name="add"  id="addtodolist" lang="fa">

<div class="modal-header">
  <h4 class="modal-title" id="myModalLabel">باید انجام شود</h4>
</div>
    <div class="modal-body">

            <div class="form-group com-md-12">
              <label for="recipient-name" class="control-label">عنوان :</label>
              <input type="text" class="form-control" name="title" id="title">
            </div>

  
              <input type="hidden"  value="<?php echo is_get('id');?>"  name="group">
              <input type="hidden"  value="group"  name="type">
            <div class="form-group">
              <label for="recipient-name" class="control-label"><?php e_lbl('note') ?>:</label>
              <textarea name="note" class="form-control autogrow" rows="3"></textarea>
          
            </div>

            <div class="form-group">
              <label for="recipient-name" class="control-label">برای:</label>
              <input type="date" class="form-control"  name="edate" id="edate">
            </div>

            <div class="form-group">
              <label for="recipient-name" class="control-label">اولویت:</label>
              <select name="level" class="form-control">
                  <option value="0">عادلی</option>
                  <option value="1">متوسط</option>
                  <option value="2">بالا</option>
              </select>
            </div>


    </div>
<div class="modal-footer">

<button class="btn btn-success btn-sm"  type="submit" name="Send">ذخیره و جدید</button>
</div>
</form>