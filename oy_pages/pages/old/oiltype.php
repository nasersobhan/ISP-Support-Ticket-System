<?php
loginrequired();
global $dbase,$curr,$sizetype;
$curr = ' '.get_cate_name(get_setting('currency'));
$sizetype = ' '.(get_setting('sizetype'));
//echo ($_GET['eoe']==1? EXOIL : IMOIL);
$myhome = HOME.'?pg=impexp';
load_jsplug('bootstrap') ;
class_include('jdatetime');
 $tbl = TBL_PIX.'categories_oy';
if(is_get('view')){
   $vid= is_get('view');
    post_query("select * from sob_money where mon_id={$vid}");
   
   theme_include('pages\money_view'); 
    
}elseif(is_get('add')){
    $val = is_post('st_name');
    $valu = cate2db($val,'oiltype');
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

    
    theme_include('pages\oiltype'); 
    


}