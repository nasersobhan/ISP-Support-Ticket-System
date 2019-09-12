<?php
if(is_get('API'))
    dev_include('API/'.is_get('API').'.php');
elseif(is_get('PL'))
    dev_include('plugin/'.is_get('PL').'.php');
elseif(is_get('live'))
    dev_include('live/'.is_get('live').'.php');
elseif(is_autoloader()){
        autoload_page(); 
        //set_debugger();
}elseif(is_get('lang')){
    set_lang(is_get('lang'));
//    if(isset($_SESSION['redirectorx']) AND !empty($_SESSION['redirectorx']))
//        redirect_to($_SESSION['redirectorx'],  false);
//    else
//        redirect_to(get_link('settings'),  false); 
}else{
    
   
        if(is_get('pg')){
            if(is_get('pg')=='account'){
             page_include('pages/'.is_get('pg'));

            }else
           page_include('pages/'.is_get('pg')); 
        }else{     
           page_include('pages/home'); 	
        }

        
        
if(STATISTC_EN){

if(is_get('utm_source')!=='feedburner' AND is_get('loader')==false){
        set_statistics();      


}
}
}
















?>