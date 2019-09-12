<?php

loginrequired();

if(is_loggedin()){
global $dbase;
 $pref = TBL_PIX;
if(is_post('url')){
    $tbl = TBL_PIX.'follow';
    $uid = user_uid();
    $url = is_post('url');
     $url = explode('-', $url);
    if(is_followed($url[1],$url[0])){
       
        $dbase->RowDelete($tbl," where fol_uid={$uid} and fol_url='{$url[0]}' and fol_pid='{$url[1]}'");
    }else{
        
        
        $data['fol_uid']= $uid;
        $data['fol_url']= $url[0];
        $data['fol_pid']= $url[1];
        $dbase->RowInsert($tbl,$data);

        echo 'Saved: '.$url[0];
    }
}
}else{
    
    echo 'NOT WORKING';
    
}
 
 ?>