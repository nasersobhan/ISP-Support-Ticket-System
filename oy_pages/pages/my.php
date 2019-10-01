<?php
loginrequired();
load_jsplug('jquery-ui') ;
load_jsplug('uicomplete') ;    
load_jsplug('form');
//addjs(HOME . "oy_custom/js/groups.js");
set_pgtitle('آمار و وضعیت ');

if(is_get('dash') == '2'){
    theme_pg_include('dash2');
}else {
    theme_pg_include('home');
}


