<?php get_header() ?>
<div class="content-box">
    <div class="sidex">
         <div class="panel panel-default" >
    <div class="panel-heading ">  <h3>حذف کلی حسابات یک شرکت</h3></div>
    <div class="panel-body ">  
        
        کاربر گرامی توجه داشته باشید!<br/>
        این گزینه تمامی اطلاعات و حسابات یک شرکت را حذف میکند و راه برگشت نیست.
        
        <hr/>
        <div >
<form method="post" enctype="application/x-www-form-urlencoded" target="_blank" name="add" action="?pg=delcom"  id="blancec" lang="fa">
    <table align="center" width="800">
  
  <tr>
    <td><label>نام شرکت:</label></td>
   <td><select width="100%" name="comname">
     <?php 
             $oild =  cat_2arr_l('company',0,'fa_AF');
            foreach($oild as $id => $label){
                 echo '<option value="'.$id.'">'.$label.' ('.g_lbl('company').')</option>';
            }
            
             $oild =  cat_2arr_l('tcompany',0,'fa_AF');
            foreach($oild as $id => $label){
                 echo '<option value="'.$id.'">'.$label.' ('.g_lbl('tcompany').')</option>';
            }
            
             $oild =  cat_2arr_l('ocompany',0,'fa_AF');
            foreach($oild as $id => $label){
                 echo '<option value="'.$id.'">'.$label.' ('.g_lbl('ocompany').')</option>';
            }
             $oild =  cat_2arr_l('mcompany',0,'fa_AF');
            foreach($oild as $id => $label){
                 echo '<option value="'.$id.'">'.$label.' ('.g_lbl('mcompany').')</option>';
            }
            
            ?>  
?>





    
    
    </select></td>
    
        <td align="center">
 
    
            <input type="submit" class="btn btn-danger btn-block" name="Send" value="حذف کلی" />
   
    
    
    </td>
  </tr>

  
 

</table>
</form>


</div></div></div></div></div>
<?php  theme_include('footer.php'); ?>