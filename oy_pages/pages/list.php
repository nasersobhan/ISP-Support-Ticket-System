<?php
 global $dbase; 
 load_jsplug('jquery-ui') ;
 load_jsplug('uicomplete') ;    
 load_jsplug('form');
 addjs(HOME . "oy_custom/js/groups.js");
 
if (is_get('list')=='customers') {
    page_include('pages/lists/customers.php');
}elseif(is_get('list')=='leaves'){
        page_include('pages/lists/leaves.php');
} else {
    
    page_include('pages/lists/tickets.php');
}