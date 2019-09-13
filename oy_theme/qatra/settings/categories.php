<?php get_header();

$type_label = is_get('t');
 ?>
<div class="content-box">
    <div class="sidex">
                <div class="panel panel-default" >
    <div class="panel-heading "><h3>ویرایش نوع</h3></div>
    <div class="panel-body ">  
        <div class="well">
        
        <h4>ایجاد <?php e_lbl($type_label); ?></h4>
<form method="post" reset data-source="<?php echo HOME ?>?pg=categories&t=<?php echo $type_label; ?> #datatbl" data-selector="#reportx > div > div > div.panel-body" action="<?php echo HOME ?>?pg=categories&add=<?php echo $type_label; ?>" ajaxform name="add"  id="currency_id" lang="fa">
    <table align="center" width="600">


  <tr>
    <td width="100">نام <?php e_lbl($type_label); ?>:</td>
    <td>
        <input  required  name="st_name" id="name" type="text" />
    <span style="color:red" name="qay" id="qay_name"></span></td>
    <td width="80">
    
      <input class="btn btn-success btn-sm Pull-left" id="load_reportx" type="submit" name="Send" value="<?php echo g_lbl('add') ?>">

    </td>
  </tr>
  



</table>
</form>
        
        </div> <hr/>  <div class="well">
        
        
         <h4>ویرایش <?php e_lbl($type_label); ?></h4>
<form method="post" name="edit"  reset data-source="<?php echo HOME ?>?pg=categories&t=<?php echo $type_label; ?> #datatbl" data-selector="#reportx > div > div > div.panel-body" action="<?php echo HOME ?>?pg=categories&t=<?php echo $type_label; ?>&edit=1" ajaxform id="dep_edit" lang="fa">
    <table  align="center" width="600">

  <tr>
      <td width="100">نام <?php e_lbl($type_label); ?>:</td>
      <td ><select name="st_id">
  <?php 
             $oild =  cat_2arr_l($type_label,0,'fa_AF');
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
    
      <input class="btn btn-success btn-sm Pull-left" type="submit" name="Send" value="<?php echo g_lbl('edit') ?>">

    </td>
  </tr>
  



</table>
</form>

  </div>  <hr/> <div class="well">
        
        
         <h4>حذف <?php e_lbl($type_label); ?> از سیستم</h4>
<form  method="post" name="del" reset data-source="<?php echo HOME ?>?pg=categories&t=<?php echo $type_label; ?> #datatbl" data-selector="#reportx > div > div > div.panel-body" action="<?php echo HOME ?>?pg=categories&t=<?php echo $type_label; ?>&del=1" ajaxform  id="oilexp" lang="fa">
    <table align="center" width="600">

  <tr>
      <td width="100">نام <?php e_lbl($type_label); ?>:</td>
    <td><select name="st_name">
  <?php 
             $oild =  cat_2arr_l($type_label,0,'fa_AF');
            foreach($oild as $id => $label){
                 echo '<option value="'.$id.'">'.$label.'</option>';   
            }
?><</td>
     <td width="80">
    
      <input class="btn btn-success btn-sm Pull-left" type="submit" name="Send" value="<?php echo g_lbl('delete') ?>">

    </td>
  </tr>
        
        
  
  



</table>
</form>
         
         
    </div>   <hr/>
         
<span style="color:red" name="mess" id="mess">
    </span>
         
         
  </div>
</div></div>
  
  
  
  
  
  
    <span id="reportx" >
 <div  class="sidex  Pull-left">


        <div class="panel panel-default" >
    <div class="panel-heading "><h3>لیست موجود</h3></div>
    <div class="panel-body ">  








<?php
global $dbase;
$type= $type_label;
$result = $dbase->query("SELECT * FROM sob_categories_oy where cat_type='{$type}' ORDER BY cat_id DESC LIMIT 12");?>
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
    $stripcalss = '';
    if($row['cat_status']==100){
      $row['cat_name'] = '<del class="text-danger">'.$row['cat_name'].'</del> - حذف شده';
    }
      $stripcalss = '';
?>

  <tr>
    <td width="140px"><a href="<?php echo HOME.'?pg='.$row['cat_type'].'&id='.$row['cat_id'] ?>"><?Php echo $row['cat_name'] ?></a></td>

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


    

<?php get_footer() ?>