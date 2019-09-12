<?php get_header(); ?>
<div class="content-box">
    <div class="sidex">
         <div class="panel panel-default" >
    <div class="panel-heading "><h3>ویرایش مخزنها</h3></div>
    <div class="panel-body ">   
        <div class="well">
        <h4>ایجاد مخزن</h4>
<form name="add"  id="oilexp" lang="fa">
    <table align="center" width="600">


  <tr>
    <td width="100">نام مخزن:</td>
    <td>
        <input  required  name="st_name" id="name" type="text" />
    <span style="color:red" name="qay" id="qay_name"></span></td>
    <td width="80">
    
      <input class="btn btn-success btn-sm Pull-left" data-url="<?php echo HOME ?>?pg=house #reportx" id="load_reportx" type="button" name="Send" value="<?php echo g_lbl('add') ?>"
    onclick="javascript: formget(this.form,'<?php echo HOME ?>?pg=house&add=1'); ;" >

    </td>
  </tr>
  



</table>
</form>
        
        </div>
     <hr/>   

            <div class="well">
        
         <h4>ویرایش مخزن</h4>
<form  name="edit"  id="oilexp" lang="fa">
    <table  align="center" width="600">

  <tr>
      <td width="100">نام مخزن:</td>
      <td ><select name="st_id">
  <?php 
             $oild =  cat_2arr_l('house',0,'fa_AF');
            foreach($oild as $id => $label){
                 echo '<option value="'.$id.'">'.$label.'</option>';   
            }
?></td><td></td>
    
  </tr>
        
      
  <tr>
    <td width="100"> نام جدید:</td>
    <td ><input  required  name="st_name" id="name" type="text" />
    <span style="color:red" name="qay" id="qay_name"></span></td>
    <td width="80">
    
      <input class="btn btn-success btn-sm Pull-left" data-url="<?php echo HOME ?>?pg=house #reportx" id="load_reportx" type="button" name="Send" value="<?php echo g_lbl('edit') ?>"
    onclick="javascript: formget(this.form,'<?php echo HOME ?>?pg=house&edit=1'); " >

    </td>
  </tr>
  



</table>
</form>
            </div>

        <hr/>   
            <div class="well">
         <h4>حذف مخزن</h4>
<form   name="del"  id="oilexp" lang="fa">
    <table align="center" width="600">

  <tr>
      <td width="100">نام مخزن:</td>
    <td><select name="st_name">
  <?php 
             $oild =  cat_2arr_l('house',0,'fa_AF');
            foreach($oild as $id => $label){
                 echo '<option value="'.$id.'">'.$label.'</option>';   
            }
?><</td>
     <td width="80">
    
      <input class="btn btn-success btn-sm Pull-left" data-url="<?php echo HOME ?>?pg=house #reportx" id="load_reportx" type="button" name="Send" value="<?php echo g_lbl('delete') ?>"
    onclick="javascript: formget(this.form,'<?php echo HOME ?>?pg=house&del=1'); ;" >

    </td>
  </tr>
        
        
  
  



</table>
</form>
         
    </div>      
    
         
<span style="color:red" name="mess" id="mess">
    </span>
         
         
  </div>
</div></div>
  
  
  
  
  
  
    <span id="reportx" >
 <div  class="sidex Pull-left">

   <div class="panel panel-default" >
    <div class="panel-heading "><h3>لیست مخازن موجود</h3></div>
    <div class="panel-body ">   












<?php
global $dbase;
$result = $dbase->query("SELECT * FROM sob_categories_oy where cat_type='house'   ORDER BY cat_id DESC LIMIT 12");?>
	<table style="table-layout:fixed" id="datatbl" width="550" >
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

</div>
    
    </div>
<?php get_footer() ?>