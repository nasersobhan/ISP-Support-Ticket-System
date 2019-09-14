<?php 
global $dbase;

$tbl = 'sob_comments_oy';

if(is_post('com_comment') && is_get('id')){
    if($dbase->RowInsert($tbl, ['com_comment'=>is_post('com_comment'), 'com_id_post'=>is_get('id'), 'com_uid'=>user_uid()])){
        echo 'کامنت شما اضافه شد.';
    }

}