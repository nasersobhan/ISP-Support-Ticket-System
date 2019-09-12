<?Php 
global $dbase;
if (is_get('id')) {
    $id = is_get('id');
    load_jsplug('form');
theme_include('groups/index');
}
elseif(is_get('gid') && is_post('uid')) {
    if($dbase->RowInsert('sob_ugroups',array('ugr_gid'=>is_get('gid'), 'ugr_uid'=> user_uid() ,'ugr_userid'=>is_post('uid')))){
        add_notification('شما به گروپ '.get_cate_name(is_get('gid')). ' اضافه شدید' , is_post('uid'), 'group',is_get('gid'));
        echo 'موفقانه ثبت شد';
    }else{
        echo 'مشکلی وجود دارد.';
    }
}
elseif(is_get('did')) {
    $where = ' WHERE ugr_id='.is_get('did');
    $row = $dbase->tbl2array2('sob_ugroups','*', $where)[0];
    if ($dbase->RowDelete('sob_ugroups', $where)) {
        add_notification('شما از گروپ '.get_cate_name($row['ugr_gid']).' حذف شدید'  , $row['ugr_uid'], 'group',$row['ugr_gid']);
        echo 'موفقانه از گروپ حذف شد';
    }else{
        echo 'مشکلی وجود دارد.';
    }

}