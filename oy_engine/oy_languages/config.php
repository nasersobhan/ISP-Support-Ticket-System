<?php
//  if(is_get('lang'))
//       set_lang(is_get('lang'));
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$_LANG['page']='صفحه';
$_LANG['pages']='صفحات';
$_LANG['next']='بعدی';
$_LANG['pervious']='قبلی';
$_LANG['first']='اول';
$_LANG['last']='آخر';
function r_lbl($label,$LANG='X'){
    global $_LANG;
    $SK = UKEY;
    if($LANG=='X')
        $LANG = (isset($_SESSION[$SK]['LANG']) ? $_SESSION[$SK]['LANG'] : 'EN');
    include_lang($LANG);
    
    return $_LANG[$label];
}
function e_lbl($label,$LANG='X'){
    echo g_lbl($label);
}

function g_lbl($lbl){
    global $_LANG,$LANGIS;
    $export = '';
    $explode = explode(',', $lbl);
    foreach($explode as $val){
        if(isset($_LANG[$val])){
                $export .=($_LANG[$val]).' ';
        }else{
            $export .=$val.' ';
        }
           
    }
        
     // if($LANGIS=='en')
          $export = ucfirst($export);
    
//    if(isset($_LANG[$lbl])){
//        if($LANGIS=='en')
//            return ucwords($_LANG[$lbl]);
//        else
//           return ($_LANG[$lbl]); 
//    }else
        return trim($export);
    
}
function get_lang(){
   global $LANGIS;
   if(empty($LANGIS))
       $LANGIS = set_lang();
   return $LANGIS;

}

function set_page_lang($val){
   global $PG_LANG;
   $PG_LANG = $val;
}
function get_page_lang(){
   global $PG_LANG;
   if(!(empty($PG_LANG)))
    return $PG_LANG;
   else
       return false;
}
function set_lang($val = false){
   global $LANGIS;
   if($val){
      $LANGIS = $val; 
       
        setcookie('lang', '', time() -30000, "/", ''); 
        setcookie('lang', $LANGIS, time() + (86400 * 30), "/", '');
        if(is_loggedin())
          set_user_lang($LANGIS);
          
          
          
          
          
          
          
   }elseif(is_get('lang')){
          $LANGIS = is_get('lang'); 
          
    //    $LANGIS = DEF_LANG;
        setcookie('lang', '', time() -30000, "/", ''); 
        setcookie('lang', $LANGIS, time() + (86400 * 30), "/", '');
        if(is_loggedin())
          set_user_lang($LANGIS);
   }else{          
        if(is_loggedin()){
                $LANGIS = user_lang();
        }elseif(isset($_COOKIE['lang'])){
                if(isset($_COOKIE['lang'])){
                    if(!empty($_COOKIE['lang']))
                        $LANGIS = $_COOKIE['lang'];
                }else
                    $LANGIS =DEF_LANG;
                
        }else{
            $LANGIS =DEF_LANG;
        }
   //unset($_COOKIE['lang']);
   //if(!isset($_COOKIE['lang']))
                       
   
   
    }

   include_lang($LANGIS);  
    return $LANGIS;  
}

