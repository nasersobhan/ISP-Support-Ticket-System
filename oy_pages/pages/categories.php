<?php
loginrequired();
global $dbase,$curr;
$curr = get_setting('dep');
//echo ($_GET['eoe']==1? EXOIL : IMOIL);
// $myhome = HOME.'?pg=impexp';
load_jsplug('bootstrap') ;
class_include('jdatetime');
load_jsplug('form');
 $tbl = TBL_PIX.'categories_oy';

 if(is_get('add')){
    $val = is_post('st_name');
    $value = cate2db($val,is_get('add'));
   // add_cate($val,'currency',0,user_uid());
   echo 'ایجاد شد';
}elseif(is_get('del')){
    $val= is_post('st_name');
     $d['cat_status'] =100;
     $dbase->RowUpdate($tbl,$d, "WHERE cat_id=".$val);
      echo 'حذف شد';
}elseif(is_get('edit')){
    $val= is_post('st_id');
     $d['cat_name'] =is_post('st_name');;
     $dbase->RowUpdate($tbl,$d, "WHERE cat_id=".$val);  
      echo 'ویرایش شد';
}else{   
    theme_include('settings\categories'); 
}