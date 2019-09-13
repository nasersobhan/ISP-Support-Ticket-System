<?php get_header(); ?>
<div class="content-box">
    <div class="col-md-12">
      
        
          <div class="panel panel-default" >
    <div class="panel-heading "><h3><?php echo get_pgtitle() ?></h3></div>
    <div class="panel-body ">    


<!-- Button trigger modal -->
<a href="#"  id='usermodalclick' >
  Launch demo modal
</a>

<!-- Modal -->
<div class="modal fade" id="modalusers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form method="post" action="<?php echo HOME ?>?pg=users&add=1" data-source="<?php echo HOME ?>?pg=users #datatbl" data-selector="#reportx > div > div > div.panel-body" ajaxform reset  enctype="application/x-www-form-urlencoded" name="add"  id="adduser" lang="fa">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">ایجاد یوزر جدید</h4>
      </div>
          <div class="modal-body">

        
          <div class="form-group">
                    <label for="recipient-name" class="control-label">نام مکمل :</label>
                    <input type="text" class="form-control col-md-12" name="name" id="name" >
                  </div>


                  <div class="form-group">
                    <label for="recipient-name" class="control-label">نام کاربری :</label>
                    <input type="text" class="form-control col-md-12" name="uname" id="username">
                  </div>

                  <div class="form-group">
                    <label for="recipient-name" class="control-label">ایمیل :</label>
                    <input type="email" class="form-control col-md-12" name="email" id="email">
                  </div>

  
                  <div class="form-group">
                    <label for="recipient-name" class="control-label">رمز عبور :</label>
                    <input type="password" class="form-control col-md-12" name="password" id="password">
                  </div>

                  <div class="form-group">
                    <label for="recipient-name" class="control-label">رمز عبور  تکرار:</label>
                    <input type="password" class="form-control col-md-12" name="passwordre" id="passwordre">
                  </div>
  
                  <div class="form-group">
                    <label for="recipient-name" class="control-label">نوع کاربر:</label>
                    
                    <select class="form-control col-md-12" name="rank">
                      <option value="1">کارمند عادی</option>
                      <option value="2">مدیر</option>
                      <option value="3">رئیس</option>
                      <?php if(user_rank()==99){ ?>
                        <option value="99">مدیر کل</option>
                      <?php } ?> 
                    </select>
                  </div>
    
                  <div class="form-group">
                    <label for="recipient-name" class="control-label"><?php e_lbl('site') ?>:</label>
                    
                    <select class="form-control col-md-12" name="site">
            
                        <?php
                        $oild =  cat_2arr_l('site',0,'fa_AF');
                        foreach($oild as $id => $label){
                            echo '<option value="'.$id.'">'.$label.'</option>';
                            
                        }
                        ?>
                </select>
                  </div>
  

  
                  <div class="form-group">
                    <label for="recipient-name" class="control-label"><?php e_lbl('dep') ?>:</label>
                    
                    <select class="form-control col-md-12" name="dep">
            
                        <?php
                        $oild =  cat_2arr_l('dep',0,'fa_AF');
                        foreach($oild as $id => $label){
                            echo '<option value="'.$id.'">'.$label.'</option>';
                            
                        }
                        ?>
                </select>
                  </div>


                  <div class="form-group">
                    <label for="recipient-name" class="control-label"><?php e_lbl('title') ?>:</label>
                    <input type="text" class="form-control col-md-12" name="title" id="title">
                  </div>



  


   




          </div>
      <div class="modal-footer">
    
      <button class="btn btn-success btn-sm"  type="submit" name="Send">ذخیره و جدید</button>
      </div>
      </form>
    </div>
  </div>
</div>




<span style="color:red" name="mess" id="mess">
    </span>
</div></div>

</div>
    
    <div id="reportx" >
 <div  class="col-md-12">
  <div class="panel panel-default" >
    <div class="panel-heading "><h3>آخرین اطلاعات ذخیره شده</h3></div>
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