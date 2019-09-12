<?php
global $dbase;
$tbl = TBL_PIX.'contact';
$fld_pre = 'con_';
$uid = user_uid();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(is_get('add')){
    if(is_get('add')=='box'){
        $db['con_uid'] = user_uid();
        
        $db['con_type'] = is_get('add');
        $db['con_code'] = is_post('con_code');
        $concode = $db['con_code'];
        $em = is_post('con_email');
       $ph = is_post('con_phone');
       $add = is_post('con_address');
       $ci = is_post('con_city');
       $con = is_post('con_country');
        $db['con_value'] = "email:-{$em}phone:{$ph}-city:{$ci}-country:{$con}-address:{$add}";
        // `con_title`, `con_value`, `con_type`
       if($dbase->check_duplicate_m($tbl, " con_code='{$concode}' AND con_uid={$uid}")){
               unset($db['con_code']); unset($db['con_uid']);
            $dbase->RowUpdate($tbl,$db," where con_code='{$concode}'");
            echo 'Updated Successfuly!!!';
//              $er['::title'] = 'ChnagePage Query';
//    $er['::text'] = 'Updated SUccessfuly';
//    $er['::type'] = 'info';
//    set_error($er);  load_js(); 
       }else
               $dbase->RowInsert($tbl,$db);
        
    }
    
    
    
}

