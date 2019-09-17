<?php
$tbl = 'sob_leaves';
global $dbase;
$uid = user_uid();
$site = user_site();
$dep = user_dep();

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


}
else {
    theme_pg_include('home');
}
