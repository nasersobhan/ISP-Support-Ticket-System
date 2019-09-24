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
 $tbl = TBL_PIX.'users';
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
    $id = is_get('edit');
    if(user_rank()==99 OR user_rank() == 3 OR user_uid== $id){

        $det['sob_name'] = is_post('name');
        $det['sob_email'] = is_post('email');
        $det['sob_rank'] = is_post('rank');
        $det['sob_dep'] = is_post('dep');
        $det['sob_site'] = is_post('site');
        $det['sob_phone'] = is_post('phone');
        $det['sob_title'] = is_post('title');

        $dbase->RowUpdate($tbl,$det, "WHERE sob_id=".$id);  
        echo 'ویرایش شد';
    } else {
        echo 'شما اجازه این کار را ندارید.';
    }

}elseif(is_get('premissions')) {
    $uid = is_get('premissions');
    if(is_post('uid')){
      
        unset($_POST['uid']);
        $dbase->RowDelete('sob_permissions'," WHERE per_uid={$uid}");  
        foreach($_POST as $key => $value){
            //echo $key.' '.$value;
            $dbase->RowInsert('sob_permissions',['per_uid' => $uid, 'per_label' => $key, 'per_allow' => 1]);  
        } 
        set_message('سطح دسترسی این کاربر بروز شد.');
        //print_r($_POST);
    }
        set_pgtitle('تنظیمات سطح دسترسی ' . user_name_ex($uid));
        theme_pg_include('premissions'); 
 

}else{

    set_pgtitle(g_lbl('adduser'));
    theme_include('pages\users'); 
    


}