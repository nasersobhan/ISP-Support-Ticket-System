<?php
loginrequired();
global $dbase;
$tbl = 'sob_tickets';



if(is_get('add')){

    $data = $_POST;
    if(is_get('cid')){
        $data['tic_cid'] = is_get('cid');
        $data['tic_type'] = 1;
        $data['tic_category'] = 0;
        //$data['tic_uid'] = user_uid();
    }
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
elseif(is_get('manage')){
    $id = is_get('manage');
    $data = $_POST;
    if(isset($data['tic_assigned'])) {
        $data['tic_sdate'] = date('Y-m-d H:i:s');
    }
  
    if(isset($data['tic_completenote'])) {
        $data['tic_ddate'] = date('Y-m-d H:i:s');
        $data['tic_progress'] = 100;
    }
  

    if ($dbase->RowUpdate($tbl, $data, "WHERE tic_id=".$id)) {
        $ticket_title = get_ticket($id, 'title');
        if(isset($data['tic_assigned'])){
            if(personlistype($data['tic_assigned']) == 'group'){
                $users = get_usersfromgroup($data['tic_assigned']);
                if(count($users)){
                    foreach($users as $user){
                        add_notification('وظیفه به تیم شما محول شد:' . $ticket_title , $user, 'ticket', $id);
                    }
                }
            }else{
                $userid = str_replace("u:",'',$data['tic_assigned']);
                add_notification('وظیفه به شما محول شد:' . $ticket_title , $userid, 'ticket', $id);
            }
        }
        if(isset($data['tic_progress']) && isset($data['tic_tag'])){
            $userid = get_owner($id,'tickets');
            if(isset($data['tic_progress']))
                $progress= $data['tic_progress'];
            else {
                $progress= get_ticket($id, 'progress');
            }
            add_notification('<strong>'.$ticket_title.'</strong><br><strong>پیشرفت:</strong> '.$progress. '%<br><strong>وضعیت:</strong> '.get_cate_name($data['tic_tag']) , $userid, 'ticket', is_get('manage'));
        
        }
        if (isset($data['tic_completenote'])) {
            $userid = get_owner($id,'tickets');
            add_notification('<strong>'.$ticket_title.'</strong><br><strong>پیشرفت:</strong> 100% ' , $userid, 'ticket', is_get('manage'), 'success');
        
        }

            
        redirect_to(HOME.'?pg=ticket&id='.$id);
        
        echo 'ثبت شد';
    }else{
        echo 'مشکلی وجود دارد';
    }
}
else {

    load_jsplug('jquery-ui') ;
    load_jsplug('uicomplete') ;    
    load_jsplug('form');
    addjs(HOME . "oy_custom/js/groups.js");

    theme_pg_include('home');

}