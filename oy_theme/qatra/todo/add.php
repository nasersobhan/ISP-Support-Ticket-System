<form method="post" action="<?php echo HOME ?>?pg=todo&add=go" 
data-source="<?php echo HOME ?>?pg=todo #todolists" 
data-selector="#listtodo" 
ajaxform reset  enctype="application/x-www-form-urlencoded" name="add"  id="addtodolist" lang="fa">

<div class="modal-header">
  <h4 class="modal-title" id="myModalLabel">ایجاد جدید</h4>
</div>
    <div class="modal-body">

            <div class="form-group com-md-12">
              <label for="recipient-name" class="control-label">عنوان :</label>
              <input type="text" class="form-control col-md-12" name="title" id="title">
            </div>

            <!-- <div class="form-group">
              <label for="recipient-name" class="control-label">با اشتراک:</label>
              <input type="text" class="form-control usergroupList"  name="team" id="team">
            </div> -->

            <div class="form-group">
              <label for="recipient-name" class="control-label"><?php e_lbl('note') ?>:</label>
              <textarea name="note" class="form-control autogrow" rows="3"></textarea>
          
            </div>

            <!-- <div class="form-group">
              <label for="recipient-name" class="control-label">برای:</label>
              <input type="date" class="form-control"  name="edate" id="edate">
            </div> -->

            <div class="form-group row">
              <label for="recipient-name" class="control-label">اولویت:</label>
              <select name="level" class="form-control col-md-12">
                  <option value="0">نورمال</option>
                  <option value="1">کم اهمیت</option>
                  <option value="2">مهم</option>
              </select>
            </div>


    </div>
<div class="modal-footer">

<button class="btn btn-success btn-sm"  type="submit" name="Send">ذخیره و جدید</button>
</div>
</form>