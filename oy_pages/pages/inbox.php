<?php
loginrequired();
global $dbase,$curr,$sizetype;
$uid = user_uid();
$curr = ' '.get_cate_name(get_setting('currency'));
$sizetype = ' '.(get_setting('sizetype'));
//echo ($_GET['eoe']==1? EXOIL : IMOIL);
$myhome = HOME.'?pg=inbox';
//$datetype = get_setting('datetype');
load_jsplug('bootstrap') ;
class_include('jdatetime');
load_jsplug('sdate') ;

load_jsplug('jquery-ui') ;
load_jsplug('uicomplete') ;
load_jsplug('form') ;

class_include('oy_message');

$message = new oy_message();


if(is_get('view')){
   $vid= is_get('view');
    post_query("select * from sob_message where mon_id={$vid}");
   theme_include('pages\money_view'); 
}elseif(is_get('send')){
    if(is_numeric(is_get('send')))
        $parent = is_get('send');
    else 
        $parent = 0;

    $message->sendMessage(user_uid(),is_post('to'),is_post('title'),is_post('body'), $parent);
    echo 'پیام ارسال شد.';
    
}elseif(is_get('replay')){

    $message->sendMessage(user_uid(),is_post('to'),is_post('title'),is_post('body'), is_get('replay'));
    echo 'ارسال شد';


}else{

  
    
    theme_include('inbox\inbox'); 


}

