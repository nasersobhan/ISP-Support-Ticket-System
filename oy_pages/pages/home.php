<?php 
loginrequired();
global $dbase,$curr,$sizetype;
$curr = get_cate_name(get_setting('currency'));
$sizetype = (get_setting('sizetype'));
checkforupdate();
set_pgtitle('آمار و وضعیت شرکت');
 theme_include('pages\home'); 	
?>