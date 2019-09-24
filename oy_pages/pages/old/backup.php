<?php
set_time_limit (0);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(is_get('upone')){
   //global $dbase; $id=is_post('comname');
//    $tbl1 = TBL_PIX.'categories_oy'; 
//    if($dbase->RowUpdate($tbl1,array('cat_status'=>100),' cat_id='.$id))
//            echo 'Main Profile Delete...';
    
//    $tbl1 = TBL_PIX.'impexp'; 
//    if($dbase->RowDelete($tbl1,' cat_id='.$id))
//            echo 'Main Profile Delete...';
//    
//    $tbl1 = TBL_PIX.'categories_oy'; 
//    if($dbase->RowDelete($tbl1,' cat_id='.$id))
//            echo 'Main Profile Delete...';
  //echo  $dbase->backup_tables();
 // echo 'Starting Backup...<br/>';


 $newway = "mysqldump -u root -pnaser433 sob_qatra | gzip -9 > /var/www/html/backups/".date('l_jS_\of_F_Y_hi_A').".soback";
 $output = shell_exec($newway);
//$output = shell_exec('mysqldump -u root -pnaser433 --all-databases | gzip > /var/www/html/backups/'.date('l_jS_\of_F_Y_hi_A').'.soback');




//echo "<pre>$output</pre>";
 }elseif(is_get('del')){
$filename= is_get('del');
unlink("/var/www/html/backups/".$filename);

 }elseif(is_get('restore')){
$filename= is_get('restore');
   $import = "gunzip < /var/www/html/backups/".$filename." | mysql -u root -pnaser433 sob_qatra";
    $output = shell_exec($import);
}else{
  
}

theme_include('pages\backup');