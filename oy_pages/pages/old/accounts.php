<?php
loginrequired();
global $dbase,$curr;
$curr = get_setting('currency');
//echo ($_GET['eoe']==1? EXOIL : IMOIL);
$myhome = HOME.'?pg=impexp';
load_jsplug('bootstrap') ; load_jsplug('form') ;
class_include('jdatetime');
 $tbl = TBL_PIX.'categories_oy';
if(is_get('view')){
   $vid= is_get('view');
    post_query("select * from sob_money where mon_id={$vid}");
   
   theme_include('pages\money_view'); 
    
}elseif(is_get('add')){
    $val = is_post('st_name');
     $value = cate2db($val,'accounts');
    
    
    // $count = (is_post('st_count') ? is_post('st_count') : 0);
      $d['cat_hits'] =is_post('st_count');
       $d['cat_content'] =is_post('st_des');
      $d['cat_category'] =is_post('st_cat');
        $d['cat_section'] =is_post('st_curr');
      	
     $dbase->RowUpdate($tbl,$d, "WHERE cat_id=".$value);
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


  
    
    
    theme_include('pages\accounts'); 
    


}