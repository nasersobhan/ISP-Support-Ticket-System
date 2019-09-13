<?php
header('Access-Control-Allow-Origin: *');
    global $dbase;
 $pref = TBL_PIX;
 
 
if (isset($_REQUEST['term'])) {

    $term = $_REQUEST['term'];
    if(isset($_REQUEST['only'])){
        if($_REQUEST['only']=='u') {
            $users= get_userList(0,0,0, $term);
            $userx = [];
            foreach($users as $user){
                $userx[] = ['label' => $user['sob_name'], 'value' => $user['sob_id']];
            }
            $ret = $userx;
        }

    }
    else {
        $termgroup = str_ireplace('گروپ','', $term);
        $groups = cat_search_inui($termgroup, 'groups', 'g:', 'گروپ: ');
        $termsite = str_ireplace('سایت','', $term);
        $site = cat_search_inui($termsite, 'site', 's:', 'سایت: ');
        $other = array_merge($groups,$site);
        $termdep = str_ireplace('دیپارتمنت','', $term);
        $dep = cat_search_inui($termdep, 'dep', 'd:', 'دیپارتمنت: ');
        $other = array_merge($other, $dep);
    
        $users= get_userList(0,0,0, $term);
        $userx = [];
        foreach($users as $user){
            $userx[] = ['label' => $user['sob_name'], 'value' => 'u:'.$user['sob_id']];
        }
        $ret = array_merge($other,$userx);
    }

    header('Content-type: text/json; charset=utf-8');
    echo json_encode($ret);

exit();
}