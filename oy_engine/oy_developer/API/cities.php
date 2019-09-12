<?php
if(isset($_REQUEST['term']))
{
    $getVar = $_REQUEST['term'];
    $parent = is_get('parent');
    $ret = array();
    $ret['results'] = loc_search_in($getVar, $parent);
    header('Content-type: text/json');
        echo json_encode($ret);
}


