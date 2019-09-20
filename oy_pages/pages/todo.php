<?Php 
loginrequired();
global $dbase;
$tbl = 'sob_todolist';
$uid = user_uid();

if (is_get('add')) {
    $data['tod_title'] = is_post('title');
    $data['tod_uid'] = $uid;
    $data['tod_groupshare'] = (is_post('group') ?: 0);
    
    // $data['tod_edate'] = is_post('edate');
    $data['tod_note'] = (is_post('note') ?: ''); 
    $data['tod_level'] = (is_post('level') ?: 0); 
    $data['tod_type'] = (is_post('type') ?: 'user');
    if ($dbase->RowInsert($tbl, $data)) {
        if($data['tod_groupshare']) {
            
        }
        echo 'ایجاد شد';
    }
}elseif(is_get('checked')){
    $id = is_post('id');
    if(is_get('checked')==1) {
        if ($dbase->RowUpdate($tbl, ['tod_status'=>'1'],' WHERE tod_uid = '.$uid.' AND tod_id='.$id)) {
            echo 'تکمیل شد.';
        }
    } else {
        if ($dbase->RowUpdate($tbl, ['tod_status'=>'0'],' WHERE tod_uid = '.$uid.' AND tod_id='.$id)) {
            echo 'تکمیل نشده.';
        }
    }


}else{
    class_include('jdatetime');
    load_jsplug('sdate') ;
    load_jsplug('jquery-ui') ;
    load_jsplug('uicomplete') ;
    load_jsplug('form') ;
    theme_include('todo/index');
}

