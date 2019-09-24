<?php get_header(); ?>
<div class="content-box">

<?php 
$view = false;
$edit = false;
$user = [];
$rank = user_rank();
if(is_get('eid')){
  global $dbase;
  $id = trim(is_get('eid'));

  
  $rows = $dbase->tbl2array2('sob_users','*'," WHERE  sob_id={$id}");
  $user = $rows[0];
  $edit = true;
if(is_get('vu'))
$view = true;
}


?>

<!-- Modal -->
<div class="modal fade" id="modalusers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div id="main-form" class="modal-content">
    <form method="post" action="<?php echo HOME ?>?pg=users&<?php echo ($edit ? 'edit='.$user['sob_id'] : 'add=1'); ?>" data-source="<?php echo HOME ?>?pg=users #datatbl" data-selector="#reportx > div > div > div.panel-body" ajaxform reset  enctype="application/x-www-form-urlencoded" name="add"  id="adduser" lang="fa">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">ایجاد یوزر جدید</h4>
      </div>
          <div class="modal-body usersview <?php echo $view ? 'user-view' : ''; ?>">
          <?php if($view) {?>
            <div class="row text-center">
                <img src="<?Php echo user_image($user['sob_avatar']); ?>" style="width:100px; height:100px;" class="img-circle text-center" alt="User Image">
</div>
          <?php } ?>
        
          <div class="form-group row">
                    <label for="recipient-name" class="control-label">نام مکمل :</label>
                    <input <?php echo $view ? 'disabled' : ''; ?> <?php echo $edit ? 'value="'.$user['sob_name'].'"' : ''; ?> autocomplete="off" type="text" required class="form-control col-md-12" name="name" id="name" >
                  </div>

              <?php if(!$edit || $view) { ?>
                  <div class="form-group row">
                    <label for="recipient-name" class="control-label">نام کاربری :</label>
                    <input <?php echo $view ? 'disabled' : ''; ?> <?php echo $edit ? 'value="'.$user['sob_user'].'" disabled' : ''; ?>  autocomplete="off" oninvalid="setCustomValidity('لطفا فقط کلمات انگلیسی بدون فاصله بنویسید.')"  type="text" pattern="[a-zA-Z0-9]{5,}" required class="form-control col-md-12" name="uname" id="username">
                  </div>
              <?php } ?>
                  <div class="form-group row">
                    <label for="recipient-name" class="control-label">ایمیل :</label>
                    <input <?php echo $view ? 'disabled' : ''; ?> <?php echo $edit ? 'value="'.$user['sob_email'].'"' : ''; ?>  autocomplete="off"  type="email" required class="form-control col-md-12" name="email" id="email">
                  </div>

                  <div class="form-group row">
                    <label for="recipient-name" class="control-label">شماره تماس :</label>
                    <input <?php echo $view ? 'disabled' : ''; ?> <?php echo $edit ? 'value="'.$user['sob_phone'].'"' : ''; ?> autocomplete="off" oninvalid="setCustomValidity('شماره مبایل را این صورت بنویسید 0711111111')" pattern="[0-9]{9}([0-9]{1})?" required type="tel" class="form-control col-md-12" name="phone" id="phone">
                  </div>
  <?php if($edit==false) { ?>
                  <div class="form-group row">
                    <label for="recipient-name" class="control-label">رمز عبور :</label>
                    <input autocomplete="off"  type="password" class="form-control col-md-12" name="password" required id="password">
                  </div>

                  <div class="form-group row">
                    <label for="recipient-name" class="control-label">رمز عبور  تکرار:</label>
                    <input autocomplete="off"  type="password" class="form-control col-md-12" name="passwordre" required id="passwordre">
                  </div>
  <?Php } ?>

  <?php if($rank ==99) { ?>
                  <div class="form-group row">
                    <label for="recipient-name" class="control-label">نوع کاربر:</label>
                    
                    <select <?php echo $view ? 'disabled' : ''; ?> class="form-control col-md-12" name="rank">
                      <option <?php echo $edit ? ($user['sob_rank']==1 ? 'selected="selected"' : '') : ''; ?> value="1">کارمند عادی</option>
                      <option <?php echo $edit ? ($user['sob_rank']==2 ? 'selected="selected"' : '') : ''; ?> value="2">مدیر</option>
                      <option <?php echo $edit ? ($user['sob_rank']==3 ? 'selected="selected"' : '') : ''; ?> value="3">رئیس</option>
                  
                    </select>
                  </div>
  <?php } ?>
    
                  <div class="form-group row">
                    <label for="recipient-name" class="control-label"><?php e_lbl('site') ?>:</label>
                    
                    <select <?php echo $view ? 'disabled' : ''; ?> class="form-control col-md-12" name="site">
            
                        <?php
                        $oild =  cat_2arr_l('site',0,'fa_AF');
                        foreach($oild as $id => $label){
                          $selected = '';
                          if($edit)
                          $selected = ($id == $user['sob_site'] ? ' selected="selected" ' : '');
                            echo '<option '.$selected.' value="'.$id.'">'.$label.'</option>';
                            
                        }
                        ?>
                </select>
                  </div>
  

  
                  <div class="form-group row">
                    <label for="recipient-name" class="control-label"><?php e_lbl('dep') ?>:</label>
                    
                    <select <?php echo $view ? 'disabled' : ''; ?> class="form-control col-md-12" name="dep">
            
                        <?php
                        $oild =  cat_2arr_l('dep',0,'fa_AF');
                        foreach($oild as $id => $label){
                          $selected = '';
                          if($edit)
                          $selected = ($id == $user['sob_dep'] ? ' selected="selected" ' : '');
                        echo '<option '.$selected.' value="'.$id.'">'.$label.'</option>';
                            
                        }
                        ?>
                </select>
                  </div>


                  <div class="form-group row">
                    <label for="recipient-name" class="control-label"><?php e_lbl('jobtitle') ?>:</label>
                    <input <?php echo $view ? 'disabled' : ''; ?> autocomplete="off" <?php echo $edit ? 'value="'.$user['sob_title'].'"' : ''; ?>  type="text" class="form-control col-md-12" name="title" id="title">
                  </div>
<?php if($edit && $view==false) {?>
                  <div class="form-group row">
                    <label for="recipient-name" class="control-label col-md-12">تصویر :</label>
                    <input  type="file" required class="form-control col-md-2" name="fileupload" id="user-avatar">

                    <div id="progress-wrp" class="col-md-10" >
    <div class="progress-bar"></div>
    <div class="status">0%</div>
</div>
                    <input  type="hidden" value="<?php echo $edit ? $user['sob_avatar'] : ''; ?>" required class="form-control col-md-12" name="avatar" id="avatarh">
                  </div>
  
<?Php } ?>
     

  


   




          </div>
      <div class="modal-footer">
    <?php if(!$view) { ?>
      <button class="btn btn-success btn-sm"  type="submit">ذخیره و جدید</button>
    <?Php } ?>
      </div>
      </form>
    </div>
  </div>
</div>




    
    <div id="reportx" >
 <div  class="col-md-12">












  <div class="panel panel-default" >
    <div class="panel-heading "><h4>آخرین اطلاعات ذخیره شده
    
    <span class="pull-right">
    <a href="#" class="btn btn-info btn-sm"  id='usermodalclick' >
  اضافه کردن کاربر به سیستم
</a>

</span>
    </h4>
    
   
    </div>
    <div class="panel-body ">    



<?php
global $user_arr, $dbase;
$tbl = $user_arr['TBL'];
$pfx = $user_arr['FPX'];
$result = $dbase->query("SELECT * FROM {$tbl} where sob_status<>100 ");?>
	<table style="table-layout:fixed" id="datatbl" class="table" >
	<tr>
    <th width="120px">نام</th>
<th width="100px">نام کاربری</th>
    <th width="80px">نوع</th>
    <th>وظیفه</th>
    <th>دیپارتمنت</th>
    <th>سایت</th>

   <th width="180px">ایمیل</th>
  
    <th >حذف</th>
  </tr>






	<?php
while($row = $dbase->fetch_array($result))
  {
?>

  <tr>
  
    <td width="120px"><?Php echo $row[$pfx.'name'] ?></td>
    <td width="100px"><?Php echo $row[$pfx.'user'] ?></td>
    <td width="80px">
        
        
        <?Php 
        
        
        $rank =  $row[$pfx.'rank'];
        if($rank==1)
            echo 'کاربری عادی';
        elseif($rank==2)
            echo 'ویرایشگر';
        elseif($rank==3)
            echo 'راپورچی';
            elseif($rank==99)
            echo 'مدیر کل';
                     
        
        ?></td>

<td width="100px"><?Php echo $row[$pfx.'title'] ?></td>
<td width="100px"><?Php echo get_cate_name($row[$pfx.'dep']) ?></td>
<td width="100px"><?Php echo get_cate_name($row[$pfx.'site']) ?></td>

   <td width="100px"><?Php echo $row[$pfx.'email'] ?></td>
 
    <td width="50px">
<!--        <a class="btn btn-sm btn-info" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> &emsp;-->
        <button class="btn btn-ajax btn-sm btn-danger" 
        confmsg="آیا مطمئن هستید این کاربر را حذف میکنید؟" 
        data-source="<?php echo HOME ?>?pg=users #datatbl" 
        data-selector="#reportx > div > div > div.panel-body" class="btn btn-danger btn-sm btn-ajax"
        url="<?php echo HOME ?>?pg=users&del=<?php echo $row[$pfx.'id']; ?>"><i class="fa fa-user-times" aria-hidden="true"></i> حذف </button> &emsp;
<!--        <a class="btn btn-sm btn-warning" href="#"><i class="fa fa-user-secret" aria-hidden="true"></i></a> &emsp;-->
    </td>
  </tr>



<?php
 }
?>


</table>


</div>

</div>
    
    </div>    </div>    </div>
<?php get_footer() ?>