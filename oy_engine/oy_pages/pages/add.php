<?php
loginrequired();
$uid = user_uid(); //Get Current User ID
$fld_pre = 'cat_'; // table Feild Prefix
$tbl = TBL_PIX . 'categories_oy'; // Table Name for this page
$pg_n = 'posts'; // current page name $_GET['pg']
$section = 'health';
$type = (is_get('t') ? is_get('t') : 'blogs');
$lang = get_lang();
Global $dbase,$excp,$add_form; //Load Database Object


   
$file_page = 'pages'.DIRECTORY_SEPARATOR.'add-parts'.DIRECTORY_SEPARATOR.$type;
if(file_exists(PAGE_RPATH . DIRECTORY_SEPARATOR . $file_page . '.php'))
       $file_page = $file_page;
    else
       $file_page = 'pages'.DIRECTORY_SEPARATOR.'add-parts'.DIRECTORY_SEPARATOR.'other';





if(is_post('oy_form_validate')){    
    page_include($file_page);
    
}else{
   page_include($file_page);
  //  page_include('pages'.DIRECTORY_SEPARATOR.'add-parts'.DIRECTORY_SEPARATOR.$type);
    
 load_jsplug('form');
    load_jsplug('boot-select');
    load_jsplug('kendo'); load_jsplug('select2') ;  addjs(CUSTOM_PATH.'/js/add_edit.js'); 
     theme_al_include('/add-edit.php');
    
    
}
    
    
