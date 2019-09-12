<?php get_header() ?>
<div class="content-box">
    <div class="sidex">
         <div class="panel panel-default" >
    <div class="panel-heading ">  <h3>حذف کلی حسابات یک شرکت</h3></div>
    <div class="panel-body ">  
        
        کاربر گرامی توجه داشته باشید!<br/>
        این گزینه تمامی اطلاعات و حسابات یک شرکت را حذف میکند و راه برگشت نیست.<br/>
        <span class="text-danger">
        این قسمت از برنامه غیر فعال است این نسخه صرفا جهت آزمایش است.
        </span>
        <hr/>
        <div >
<form method="post" enctype="application/x-www-form-urlencoded" target="_blank" name="add" action="?pg=delcom"  id="blancec" lang="fa">
    <table class="table table-bordered" align="center">
  
  <tr>
   
    
        <td align="center" colspan="4">
 
    
            <a class="btn btn-warning btn-block" href="<?php echo HOME.'?pg=backup&upone=1'; ?>" >پشتیبانگیری</a>
  
    
    </td>
  </tr>
 <?php
    if ($handle = opendir('/var/www/html/backups/')) {

    while (false !== ($entry = readdir($handle))) {

        if ($entry != "." && $entry != "..") {
                        echo '<tr><td><br/>'.str_ireplace('.soback','',str_ireplace('_',' ',$entry)).'</td>
                        <td><a class="btn btn-info" href="'.HOME.'/backups/'.$entry.'">Download</a></td>
                        <td><a class="btn btn-success" href="'.HOME.'?pg=backup&restore='.$entry.'">Restore</a></td>
                        <td><a class="btn btn-danger" href="'.HOME.'?pg=backup&del='.$entry.'">Delete</a></td>
                        </tr>';
     
        }
    }

    closedir($handle);
}

?>




  
 

</table>
</form>


</div></div></div></div></div>
<?php  theme_include('footer.php'); ?>