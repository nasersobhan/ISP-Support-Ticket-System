<?php 
//set_message('Error' . is_get('code'));
oy_die('Error' . is_get('code'),is_get('code'));
//$url = get_current_url();
//$file = stackTrace();
//$page = "---------\n$file\nURL:$url---------\n";
//$page .= file_get_contents(CORE_RPATH."/logs/errors.log");
//file_put_contents(CORE_RPATH."/logs/errors.log", $page);
//theme_al_include('error/pg')

?>