<?php
loginrequired();
global $dbase;
$tbl = 'sob_tickets';
if(is_get('add')){

    $data = $_POST;
    $data['tic_uid'] = user_uid();
    $data['tic_site'] = user_site();
    if($dbase->RowInsert($tbl, $data)){
        $id = $dbase->insert_id();
        set_message('added');
        add_notification('تکت جدید شما ثبت شد: ' . $data['tic_title'] , $data['tic_uid'], 'ticket', $id);
        // Notify Manager
        $dep = get_setting('techdep');
        $users = get_userList($dep, $data['tic_site'], 2);
        if(count($users)){
            foreach($users as $user){
                add_notification('تکت جدید: ' . $data['tic_title'] , $user['sob_id'], 'ticket', $id);
            }
        }
        
        redirect_to(HOME.'?pg=ticket&id='.$id);
    } else {
        set_message('Something Wrong');
    }
}
else {

    load_jsplug('jquery-ui') ;
    load_jsplug('uicomplete') ;    
    load_jsplug('form');
    addjs(HOME . "oy_custom/js/groups.js");

    theme_pg_include('home');

}