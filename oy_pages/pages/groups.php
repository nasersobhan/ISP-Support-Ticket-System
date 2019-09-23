<?Php
global $dbase;
loginrequired();
$tbl = 'sob_ugroups';
$uid = user_uid();
if (is_get('id')) {
    $id = is_get('id');
    load_jsplug('jquery-ui') ;
    load_jsplug('uicomplete') ;    
    load_jsplug('form');
    addjs(HOME . "oy_custom/js/groups.js");
    $group_label = get_cate_name($id);
    set_pgtitle('تیم: '.$group_label);
    theme_include('groups/index');
} elseif (is_get('gid') && is_post('uid')) {
    if($dbase->check_duplicate_m($tbl, ' ugr_status=1 AND ugr_gid = '.is_get('gid').'  AND ugr_userid=' . is_post('uid')) == false){
        if ($dbase->RowInsert($tbl, array('ugr_gid' => is_get('gid'), 'ugr_uid' => $uid, 'ugr_userid' => is_post('uid')))) {
            add_notification('شما به گروپ ' . get_cate_name(is_get('gid')) . ' اضافه شدید', is_post('uid'), 'groups', is_get('gid'));
            echo 'موفقانه ثبت شد';
        } else {
            echo 'مشکلی وجود دارد.';
        }
    }else {
        echo 'این کاربر از قبل در این گروپ بوده است.';
    }


} elseif (is_get('did')) {
    $where = ' WHERE ugr_id=' . is_get('did');
    $row = $dbase->tbl2array2('sob_ugroups', '*', $where)[0];
    if ($dbase->RowDelete('sob_ugroups', $where)) {
        add_notification('شما از گروپ ' . get_cate_name($row['ugr_gid']) . ' حذف شدید', $row['ugr_uid'], 'groups', $row['ugr_gid']);
        echo 'موفقانه از گروپ حذف شد';
    } else {
        echo 'مشکلی وجود دارد.';
    }

}
