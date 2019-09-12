<?php

function get_tbl(){
    return is_get('tbl');
}
function autoload_setting(){
    page_include("autoloads/main.pg");
}


function get_view_al(){
    global $printup;
    echo $printup;
}


/*
function load_page(){
    if(isset($_GET['pg']))
        page_include($_GET['pg']);
    else
        page_include('home');
    
}
 






function load_view(){
    global $oy_pg;
    //$get_page =get_page(); 
    $oy_pg->load_page();
   
    
}

function register_page($pagename, $settings){
    global $oy_pg;
    $oy_pg->reg_page($pagename,$settings);
    
    
    
    
    }


function getpg_page(){
      global $oy_pg;
   if(isset($_GET['oypg'])){
       if($oy_pg->get_page($_GET['oypg']))
           return $oy_pg->get_page($_GET['oypg']);
       else
           return false;
   } 

}

function getpg_value(){
      global $oy_pg;
       if(isset($_GET['oyva']))
           return $_GET['oyva'];
       else
           return '';
   

}

function getpg_action(){
     
       if(isset($_GET['oyac']))
           return $_GET['oyac'];
       else
           return '';
   

}











class pages{
    
    function link2dynamic(){
        
    }
    function dynamic2link(){
        
    }
    function get_page(){
        
    }
    
    function is_page(){
        
    }
    
    function get_page_link(){
        
    }
    
}* */
function get_clink(){
    global $oy_pg;
   echo $oy_pg->get_link();  
   
}


function pri_tbl_from(){
    global $oy_pg;
    echo $oy_pg->get_frm();   
        
}


function pri_tbl_list(){
     global $oy_pg;
    $oy_pg->get_tbl(); 
}

function pri_limenu(){
global $dbase;
$bx = '';
    $list = $dbase->list_tables();

    $exclude = array('datafiles_oy','users','location_oy','historyuser_oy','infouser_oy','settings_oy');
    
    //$list = array_diff($list1, $exclude);
    
    if(!empty($list)){
    foreach ($list as $li){
        $li = cln_tbl($li);
        if(!in_array($li,$exclude))
        $bx .= '<li class="'.((is_get('tbl')==$li) ? 'active' : '').'"><a href="'.get_tbllink($li).'" title="Brochures">'.ucfirst($li).'</a></li>';
    }
    }else{
      $bx = '<li class="active"><a href="#" title="Brochures">No Table Found</a></li>';   
    }
    
    echo $bx;
}


function get_tbls(){
global $dbase;
$bx = '';
    $list = $dbase->list_tables();

   // $exclude = array('datafiles_oy','users','location_oy','historyuser_oy','infouser_oy','settings_oy','tbl2rank_oy');
    $exclude = array();
    //$list = array_diff($list1, $exclude);
    $bx = array();
    if(!empty($list)){
    foreach ($list as $li){
        $li = cln_tbl($li);
        if(!in_array($li,$exclude))
        $bx[]= $li;//.'" title="Brochures">'.ucfirst($li).'</a></li>';
    }
    }else{
      $bx[] = 'No Table Found';   
    }
        return $bx;
}

function get_fields(){
    
   // $fields = array();
    global $dbase,$tbl_pre, $table;
    
//    $fpx = $oy_pg->get_fpfx();
//    
//    if(!empty($post)){
//        $postx = $post;
//        foreach ($postx as $key => $value) {
//                if (is_int($key)) {
//                    unset($postx[$key]);
//                }
//        }
//        foreach ($postx as $key => $value){
//		$fields[]= $key;
//	}
//    }else{
        $fields =  $dbase->fetch_field($tbl_pre.is_get('tbl')); 
//        foreach ($postx as $key ){
//		$fields[]= ucfirst(str_replace($fpx, '', $key));
//	}
   // }
	
	$fields = Exc_fld($fields,is_get('tbl'),is_get('action'));
        
       
        
      
  
        
        return $fields;
}

function Exc_vl($post){
 
    global $excp;
    
    $ac = is_get('action');
    
 if(!$ac)
  $ac = 'list';
  
  // if(!$tbl)
  $tbl = is_get('tbl');
    
    foreach($post as $key => $po){
        $xkey = cln_fld($key);
         $excp_m = (isset($excp[$tbl][$ac]['modify'][$xkey]) ? $excp[$tbl][$ac]['modify'][$xkey] : false);
         if($excp_m){
             $post[$key] = str_ireplace('::value', $post[$key], $excp_m);
         }
    }
    return $post;
}

//
//function Exc_fld($fields,$tbl=false,$ac=false){
//  global $excp,$fld_pre;
//  if(!$ac)
//  $ac = 'list';
//  
//   if(!$tbl)
//  $tbl = is_get('tbl');
//  
//  
//    $excp_h = (isset($excp[$tbl][$ac]['hide']) ? $excp[$tbl][$ac]['hide'] : false);
//    $excp_m = (isset($excp[$tbl][$ac]['modify']) ? $excp[$tbl][$ac]['modify']: false);
//    $excp_a = (isset($excp[$tbl][$ac]['add']) ? $excp[$tbl][$ac]['add']: false);
//    
//    if($excp_h){
//        $excp_hx = explode(',',$excp_h);
//       foreach($excp_hx as $excp_h){
//       
//           
//           $kx = array_search($fld_pre.$excp_h, $fields);
//           
//           if(false !== $kx){
//               unset($fields[$kx]);
//           }
////           }else{
////           
////                foreach ($fields as $keyx => $fld){
////                //array_diff($fld,$fld_pre.$excp_h);
////                    if(isset($fld[$fld_pre.$excp_h]))
////                        unset($fields[$keyx][$fld_pre.$excp_h]);
////                    else{
////                        $key = array_search($fld_pre.$excp_h, $fld);
////                        if (false !== $key) {
////                            unset($fields[$keyx]);
////                        }
////                }
//            
//       
//    }
//    
//
//    }
//    
//    return $fields;
//}

function cln_tbl($tbl){
   global $tbl_pre;
   return (str_replace($tbl_pre, '', $tbl));
}

function cln_fld($fld,$pr){
  
   return (str_replace($pr, '', $fld));
}



