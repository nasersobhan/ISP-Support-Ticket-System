<?php
$tbl = 'sob_customerinfo';
global $dbase;
$uid = user_uid();
if(is_get('add')){
    unset($_POST['Send']);
    $data = $_POST;
    $data['cus_uid'] = $uid;
    if($dbase->RowInsert($tbl, $data)){
        $id = $dbase->insert_id();
        redirect_to(HOME.'?pg=ticket&cid='.$data['cus_cid']);
    }
} elseif(is_get('update')){
    unset($_POST['Send']);
    $data = $_POST;
    
    if($dbase->RowUpdate($tbl, $data, ' WHERE cus_id='.is_get('update'))){
        $id = $dbase->insert_id();
        echo 'تغییرات ثبت شد.';
    }
} elseif(is_get('delete')){
    $id = is_get('delete');
    if ($dbase->RowUpdate($tbl, ['cus_status' => 100], "WHERE cus_id=".$id)) {
        set_message('حذف شد.');
        redirect_to(HOME.'?pg=list&list=customers');
    }
}
else {

    load_jsplug('jquery-ui') ;
    load_jsplug('uicomplete') ;    
    load_jsplug('form');
    addjs(HOME . "oy_custom/js/groups.js");
    theme_pg_include('home');
}
