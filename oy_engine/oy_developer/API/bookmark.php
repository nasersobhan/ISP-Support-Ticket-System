<?php

loginrequired();
global $dbase;
 $pref = TBL_PIX;
if(is_post('url')){
    $tbl = TBL_PIX.'bookmarks';
    $uid = user_uid();
    $url = is_post('url');
     $url = explode('-', $url);
    if(is_bookmarked($url[1],$url[0])){
       
        $dbase->RowDelete($tbl," where boo_uid={$uid} and boo_url='{$url[0]}' and boo_pid='{$url[1]}'");
    }else{
        if(is_post('cat'))
           $data['boo_category']= is_post('cat'); 

         if(is_post('title'))
           $data['boo_title']= is_post('title'); 
       
        $data['boo_uid']= $uid;
        $data['boo_url']= $url[0];
        $data['boo_pid']= $url[1];
        $dbase->RowInsert($tbl,$data);

        echo 'Saved: '.$url;
    }
}
 
 
 ?>