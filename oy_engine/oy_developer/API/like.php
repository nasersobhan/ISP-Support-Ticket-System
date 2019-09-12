<?php

loginrequired();
global $dbase;
 $pref = TBL_PIX;
if(is_post('url')){
    $tbl = TBL_PIX.'like';
    $uid = user_uid();
    $url = is_post('url');
      $url = explode('-', $url);
    if(is_like($url[1],$url[0])){
        $dbase->RowDelete($tbl," where lik_uid={$uid} and lik_url='{$url[0]}' AND lik_pid='{$url[1]}'");
       // echo 'LIKE('.like_count($url).')';
    }else{
        if(is_post('type'))
           $data['lik_type']= is_post('type'); 

        $data['lik_uid']= $uid;
        $data['lik_url']= $url[0];
        $data['lik_pid']= $url[1];
        $dbase->RowInsert($tbl,$data);

       // echo 'LIKE('.like_count($url).')';
    }
    echo like_count($url[1],$url[0]);
}
 
 
 ?>