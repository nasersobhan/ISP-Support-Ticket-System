<?Php 
loginrequired();
global $dbase;
$tbl = 'sob_todolist';

if(is_get('add')){
    $data['tod_title'] = is_post('title');
    $data['tod_uid'] = user_uid();
    $data['tod_groupshare'] = (is_post('group') ?: 0);
    $data['tod_edate'] = is_post('edate');
    $data['tod_note'] = is_post('note');
    $data['tod_level'] = is_post('level');
    $data['tod_type'] = (is_post('type') ?: 'user');
    if($dbase->RowInsert($tbl, $data)){
        echo 'ایجاد شد';
    }
}else{
    class_include('jdatetime');
    load_jsplug('sdate') ;
    load_jsplug('jquery-ui') ;
    load_jsplug('uicomplete') ;
    load_jsplug('form') ;
    theme_include('todo/index');
}

