<?php
loginrequired();
global $dbase,$curr,$sizetype;
$curr = get_cate_name(get_setting('currency'));
$sizetype = (get_setting('sizetype'));
allowByrank(99);
//echo ($_GET['eoe']==1? EXOIL : IMOIL);
$myhome = HOME.'?pg=impexp';
//load_jsplug('bootstrap') ;
load_jsplug('form') ;
class_include('jdatetime');
 $tbl = TBL_PIX.'categories_oy';
if(is_get('view')){
   $vid= is_get('view');
    post_query("select * from sob_money where mon_id={$vid}");
   
   theme_include('pages\money_view'); 
    
}elseif(is_get('add')){
    global $ac;
    $det['fullname'] = is_post('name');
    $det['uname'] = is_post('uname');
    $det['email'] = is_post('email');
    $det['password'] = is_post('password');
    $det['passwordre'] = is_post('passwordre');
    $det['rank'] = is_post('rank');
    $det['dep'] = is_post('dep');
    $det['site'] = is_post('site');
    
    $det['phone'] = is_post('phone');
    $det['title'] = is_post('title');

    $result = $ac->do_register($det);
    if($result=='Success')
        echo 'ایجاد شد';
    else
        echo $result;
    
   
   
}elseif(is_get('del')){
     $tbl = TBL_PIX.'users';
    $val= is_get('del');
     $d['sob_status'] =100;
     $dbase->RowUpdate($tbl,$d, "WHERE sob_id=".$val);
      set_pgtitle(g_lbl('adduser'));
    theme_include('pages\users'); 
}elseif(is_get('edit')){
//    $val= is_post('st_id');
//     $d['cat_name'] =is_post('st_name');;
//     $dbase->RowUpdate($tbl,$d, "WHERE cat_id=".$val);  
//      echo 'ویرایش شد';
}else{

    set_pgtitle(g_lbl('adduser'));
    theme_include('pages\users'); 
    


}