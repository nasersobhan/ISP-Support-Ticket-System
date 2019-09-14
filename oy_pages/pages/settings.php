<?php
// loginrequired();
allow_only(99);
global $dbase,$curr,$sizetype;
$curr = get_cate_name(get_setting('currency'));
$sizetype = (get_setting('sizetype'));
//echo ($_GET['eoe']==1? EXOIL : IMOIL);
$myhome = HOME.'?pg=impexp';
load_jsplug('bootstrap') ;
class_include('jdatetime');
load_jsplug('form');


 $tbl = TBL_PIX.'categories_oy';
if(is_get('view')){
   $vid= is_get('view');
    post_query("select * from sob_money where mon_id={$vid}");
   
   theme_include('pages\money_view'); 
     
}elseif(is_get('curr')){
    $val = is_post('currency_name');
   // $valu = cate2db($val,'oiltype');
    set_setting('currency', $val);
   echo g_lbl('saved');
}elseif(is_get('datetype')){
    $val = is_post('datetype');
   // $valu = cate2db($val,'oiltype');
    set_setting('datetype', $val);
   echo g_lbl('saved');
   
}elseif(is_get('langs')){
    $val = is_post('languageset');
   // $valu = cate2db($val,'oiltype');
   // echo $val;  echo g_lbl('saved');
   set_lang($val);  echo g_lbl('saved');
   redirect_to(HOME.'?pg=settings',false);
   
}elseif(is_get('del')){
    $val= is_post('st_name');
     $d['cat_status'] =100;
     $dbase->RowUpdate($tbl,$d, "WHERE cat_id=".$val);
     echo g_lbl('deleted');
}elseif(is_get('sizetype')){
      $val = is_post('sizetype');
   // $valu = cate2db($val,'oiltype');
    set_setting('sizetype', $val);
     echo g_lbl('saved');
      
}elseif(is_get('foot')){
      $val = is_post('footertxt');
   // $valu = cate2db($val,'oiltype');
    set_setting('footertxt', $val);
    
     $val = is_post('headertxt');
   // $valu = cate2db($val,'oiltype');
    set_setting('headertxt', $val);
     echo g_lbl('saved');
}else{

    
    theme_include('pages\settings'); 
    


}