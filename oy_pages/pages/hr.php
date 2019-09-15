<?php
$tbl = 'sob_customerinfo';
global $dbase;

if(is_get('add')){
    unset($_POST['Send']);
    $data = $_POST;

    if($dbase->RowInsert($tbl, $data)){
        $id = $dbase->insert_id();
        redirect_to(HOME.'?pg=ticket&cid='.$id);
    }
} elseif(is_get('update')){
    unset($_POST['Send']);
    $data = $_POST;

    if($dbase->RowUpdate($tbl, $data, ' WHERE cus_id='.is_get('update'))){
        $id = $dbase->insert_id();
        echo 'تغییرات ثبت شد.';
    }
}
else {
    theme_pg_include('home');
}
