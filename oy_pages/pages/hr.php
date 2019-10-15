<?php
$tbl = 'sob_leaves';
global $dbase;
$uid = user_uid();
$site = user_site();
$dep = user_dep();

// ifhave_premssion('ticket-view');
load_jsplug('jquery-ui') ;
load_jsplug('uicomplete') ;    
load_jsplug('form');
addjs(HOME . "oy_custom/js/groups.js");

if(is_get('add')){
    unset($_POST['Send']);
    $data = $_POST;
    $data['lea_uid'] = user_uid();
    $data['lea_site'] = $site;
    $data['lea_dep'] = $dep;
    $data['lea_replacement'] = str_ireplace('u:','',$data['lea_replacement']);
    $data['lea_date'] = date('Y-m-d');
    if($dbase->RowInsert($tbl, $data)){
    $id = $dbase->insert_id();
    add_notification('<strong>درخواست جایگزینی</strong><br>برای :' . user_name() . '<br> از '. $data['lea_fdate'] .' تا '. $data['lea_edate'] .' بمه مدت:  '. $data['lea_number'] .' '.$data['lea_numtype'], $data['lea_replacement'], 'hr', $id);
    

            echo 'ایجاد شد';
            // $toid = get_highrankuid();
            // foreach($toid as $hid)
            //     add_notification('<strong>درخواست رخصتی</strong><br>' . user_name() . '<br> از '. $data['lea_fdate'] .' تا '. $data['lea_edate'] .'  ', $hid['sob_id'], 'hr', $id);
    }
} elseif(is_get('delete')){
    $id = is_get('delete');
    if ($dbase->RowUpdate($tbl, ['lea_status'=>100], ' WHERE lea_uid='. $uid .' AND lea_id='.$id)) {
        set_message('حذف شد.');
        redirect_to(get_link('list','list','leaves'));
    }
} elseif(is_get('update')){
    $id =is_get('update'); 
    $xuid = is_post('uid');
    if(is_get('type')=='no'){
        if($dbase->RowUpdate($tbl, ['lea_replaceaccept'=>is_post('lea_replaceaccept')], ' WHERE lea_replacement='. $uid .' AND lea_id='.$id)){
            if(is_post('lea_replaceaccept')== 1){
                add_notification('<strong>درخواست جایگزینی شما قبول شد.</strong><br>درخواست رخصتی به مدیر ارسال شد.<br>از طرف :' . user_name(), $xuid , 'hr', $id, 'success');
                echo 'تشکر از موافقت شما, درخواست به مدیر ارسال شد.';
            }                
            else{
                echo 'شما موافقت نکردید.';
                add_notification('<strong>درخواست جایگزینی شما قبول نشد.</strong><br>از طرف :' . user_name() , $xuid , 'hr', $id, 'danger');
            }
                
        }
    }else{
        $xuid = $_POST['uid'];
        unset($_POST['uid']);
        $data = $_POST;
        $data['lea_auid'] = $uid;
        $data['lea_accepteddate'] = date('Y-m-d');
        
        if($dbase->RowUpdate($tbl, $data, ' WHERE lea_id='.$id)){
            if(is_post('lea_replaceaccept')== 1){
                add_notification('<strong>درخواست رخصتی از طرف مدیر قبول شد.</strong>از طرف :' . user_name(), $xuid , 'hr', $id, 'success');
                echo 'تشکر از موافقت شما, درخواست به مدیر ارسال شد.';
            }                
            else{
                echo 'شما موافقت نکردید.';
                add_notification('<strong>درخواست رخصتی شما از طرف مدیر قبول نشد.</strong><br>از طرف :' . user_name() , $xuid , 'hr', $id, 'danger');
            }
                
        } 
    }
    // unset($_POST['Send']);
    // $data = $_POST;


} elseif(is_get('overtime')){
    if (is_get('overtime') == 'add') {
        if (is_post('ove_formtime')) {
            $data = $_POST;
            $data['ove_site'] = $site;
            $data['ove_dep'] = $dep;
            $data['ove_uid'] = $uid;
            if ($dbase->RowInsert('sob_overtime', $data)) {
                $id = $dbase->insert_id();
                echo 'فرم برای تایید به مدیر ارسال شد.';
                $toid = get_highrankuid();
                foreach($toid as $buid)
                    add_notification('<strong>فرم اضافه کاری پر شده است.</strong><br>نیاز به تایید یا رد شما دارد..<br>از طرف :' . user_name(), $buid['sob_id'] , 'overtime', $id);
            }
        }
    }elseif(is_get('overtime') == 'edit' && is_get('oid')){
        if (is_post('ove_approve')) {
            $oid = is_get('oid');
            $data['ove_approve'] = is_post('ove_approve');
            $data['ove_auid'] = $uid;
            $xuid = is_post('uid');
            $data['ove_adate'] = date('Y-m-d');
            if ($dbase->RowUpdate('sob_overtime', $data, "WHERE ove_id={$oid}")) {
                echo 'تشکر از تایید شما.';
                if($data['ove_approve']==1){
                    add_notification('<strong>اضافه کاری شما تایید شد.</strong><br>از طرف :' . user_name(), $xuid , 'overtime', $oid , 'success');
                }else{
                    add_notification('<strong>اضافه کاری شما رد شد.</strong><br>از طرف :' . user_name(), $xuid , 'overtime', $oid , 'danger');
                }
            }
        }
    }else {
        theme_pg_include('home');
    }
 

}
else {

    theme_pg_include('home');
}
