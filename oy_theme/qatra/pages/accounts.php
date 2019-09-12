<?php get_header(); ?>
<div class="content-box">
    
    
    <span id="reportx" >
 <div  class="sidex Pull-left col-md-5">

   <div class="panel panel-default" >
    <div class="panel-heading "><h3>لیست حسابات موجود</h3></div>
    <div class="panel-body ">   












<?php
global $dbase;
$result = $dbase->query("SELECT * FROM sob_categories_oy where cat_type='accounts'   ORDER BY cat_id DESC LIMIT 12");?>
        <table id="datatbl" class="table table-responsive" >
	<tr>
    <th width="160px">نام</th>

    <th width="120px">وضعیت</th>
    <th  width="80px">زمان ایجاد</th>
     <th  width="100px">کاربر</th>
  <th  width="100px">شناسه</th>
  </tr>






	<?php
while($row = $dbase->fetch_array($result))
  {
?>

  <tr>
    <td width="140px"><?Php echo $row['cat_name'] ?></td>

    <td width="120px"><?Php echo ($row['cat_status']) ?></td>
    <td width="80px"><?Php echo $row['cat_time'] ?></td>
    <td width="100px"><?Php echo user_name($row['cat_uid']) ?></td>
  <td width="100px"><?Php echo ($row['cat_id']) ?></td>
  </tr>



<?php
 }
?>


</table>


</div>
</div>
</div>
    </span>
    
    
    
    
    <div class="sidex col-md-7">
         <div class="panel panel-default" >
    <div class="panel-heading "><h3><?php e_lbl('manage,accounts'); ?></h3></div>
    <div class="panel-body ">   
        <div class="well">
        <h4>ایجاد حساب جدید</h4>
        <form data-rid="#reportx" method="POST" name="add" action="<?php echo HOME ?>?pg=accounts&add=1" ajaxform  id="oilexp" lang="fa">
            <table align="center"  class="table table-responsive">


          <tr>
    <td width="180">نام حساب:</td>
    <td>
        <input style="width: 40px"   required rtxt="<?php e_lbl('enteraccountname'); ?>"  name="st_name" class="form-control" id="name" type="text" />
    </td>
 
   
  </tr>
  
  
  
  
    <tr>
    <td width="180"> <?php e_lbl('addprimnumber'); ?>:</td>

     <td>
         <input   class="form-control"  name="st_count" id="number" type="number" value="0" min="0"  style="width: 170px;" /> 
    </td>
  
  </tr>
  
  
      <tr>
    <td width="100"> <?php e_lbl('currancy'); ?>:</td>

     <td>
       <select style="width: 40px" name="st_curr">
  <?php 
             $oild =  cat_2arr_l('currency',0,'fa_AF');
            foreach($oild as $id => $label){
                 echo '<option value="'.$id.'">'.$label.'</option>';   
            }
?>
    </td>
  
  </tr>   
        
        
       
    <tr>
    <td width="100"> <?php e_lbl('category'); ?>:</td>

     <td>
       <select style="width: 40px" name="st_cat">
  <?php 
             $oild =  cat_2arr_l('accountscat',0,'fa_AF');
            foreach($oild as $id => $label){
                 echo '<option value="'.$id.'">'.$label.'</option>';   
            }
            ?></select>
    </td>
  
  </tr>   
        
  <tr>
    <td width="100">جزئیات:</td>
 
     <td>
         <textarea class="form-control" rows="4" name="st_des"></textarea>
    </td>
    <td width="80">
    
      <input class="btn btn-success btn-sm Pull-left" type="submit" name="Send" value="<?php echo g_lbl('add') ?>"    >

    </td>
  </tr>
  



</table>
</form>
        
        </div>
     
         
         
  </div>
</div></div>
  
  
  
  
  
  

</div>
    
    </div>
<?php get_footer() ?>