<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function add_cate($val,$type,$parent=0,$uid=0){
    $tbl = TBL_PIX.'categories_oy'; global $dbase;
    $dta['cat_uid'] = $uid;
  
    $dta['cat_parent'] = $parent;
    $dta['cat_name'] = $val;
    $dta['cat_type'] = $type;
    $dta['cat_slug'] = get_slug($dta['cat_name'], $tbl, 'cat_slug');
    if(is_arabic($val))
       $dta['cat_lang'] = 'fa_AF';

    $dbase->RowInsert($tbl,$dta);
    return $dbase->lastinserted_id();
}

function get_parentof($val){
    global $dbase;
    return $dbase->get_single(TBL_PIX . 'categories_oy', 'cat_id', $val, "cat_parent");
}
function get_typeof($val){
    global $dbase;
    return $dbase->get_single(TBL_PIX . 'categories_oy', 'cat_id', $val, "cat_type");
}
function get_cats_p($type, $att = ''){
    global $dbase;
    echo $dbase->tbl2options(TBL_PIX . 'categories_oy', 'cat_id', 'cat_name', $att, " where cat_type='" . $type . "' AND cat_parent=0");
}
function get_cats($type, $att = ''){
    global $dbase;
    echo $dbase->tbl2options(TBL_PIX . 'categories_oy', 'cat_id', 'cat_name', $att, " where cat_type='" . $type . "'");
}


function get_cat2dd($type = '', $parent = 'parent', $selattr = '', $settings = array()){
    global $dbase;
    $where = '';
    if($parent =='parent')
       $parent = 0; 
    
    
    if($parent === 'ALL')
            $where = '';
        else
            $where = " WHERE cat_parent=" . $parent . "";
    
        
   if($type != 'ALL'){
        if(!empty($type))
            if( $where == '')
                $where .= " WHERE cat_type='" . $type . "'";
            else
                $where .= " AND cat_type='" . $type . "'";
    }
//    }else{
//        $where = '';
//        if($type != '%ALL'){
//            if(!empty($type))
//                $where .= " WHERE cat_type='" . $type . "'";
//        }
//    }
$tbl = TBL_PIX. 'categories_oy';
    $query = "SELECT * FROM {$tbl} " . $where;
    $res = $dbase->query($query);
   // echo $query;
    $typex = '<select ' . $selattr . '>' . PHP_EOL;
    if(isset($settings['none']) && !empty($settings['none']))
        $typex .='<option value="0">' . $settings['none'] . '</option>' . PHP_EOL;
    while($row = mysqli_fetch_array($res)){
        if(isset($settings['selected']) && !empty($settings['selected'])){
            $val = $settings['selected'];
           
             $vals = explode('-', $val);
            if(in_array($row['cat_id'], $vals)){
                $oattr = "selected";
            }else
                $oattr = "";
            
            if($row['cat_id'] == $val)
                $oattr = "selected";
            
        }else
            $oattr = "";
        $typex .= '<option ' . $oattr . ' class="parent_' . $row['cat_parent'] . '" value="' . $row['cat_id'] . '">' . $row['cat_name'] . '</option>' . PHP_EOL;
    }
    $typex .='</select>' . PHP_EOL;
    return $typex;
}
function cate_vl2id($val,$type){
    global $dbase;
    $tbl = TBL_PIX.'categories_oy';
    $row = $dbase->get_single_row($tbl, 'cat_id', " cat_name='{$val}' AND cat_type='{$type}'");
    if(isset($row['cat_id']))
        return $row['cat_id'];
    else return false;
}
function cate2db($var,$type,$parent=0,$uid=0){
   //  $var2int = (int)$var;
        if(!ctype_digit($var)){
            $export = cate_vl2id($var,$type);
            if(!$export)
              $export =   add_cate($var,$type,$parent,$uid);
        }else{
            $export = $var;    
        }
        return $export;
}

function get_cate_name($id,$lang=true){
    if($id==0){
        return 'تعیین نشده';
    }
    global $dbase;
    
    if(!empty($id) AND is_numeric($id)){
        
        if($lang){
            $lang = get_lang();
            $id = get_actualID($id,$lang);
        }
            
        
        $tbl = TBL_PIX.'categories_oy';
        $query = "SELECT cat_name FROM {$tbl} WHERE cat_id = {$id}";
        $row = $dbase->fetch_assoc($query,true);
        return $row['cat_name'];
    }else{
        return $id;
    }
}

function get_cate_id($slug){
    global $dbase;
    $tbl = TBL_PIX.'categories_oy';
    $query = "SELECT cat_id FROM {$tbl} WHERE cat_slug = '{$slug}'";
    $row = $dbase->fetch_assoc($query,true);
    if(!empty($row))
        return $row['cat_id'];
    else 
        return false;
}


function get_cate_id_byname($name,$type = false){
    global $dbase;
    $tbl = TBL_PIX.'categories_oy';
    
    if($type)
        $ty = "AND cat_type='{$type}'";
    $query = "SELECT cat_id FROM {$tbl} WHERE cat_name like '%{$name}%' {$ty}";
    $row = $dbase->fetch_assoc($query,true);
    if(!empty($row))
        return $row['cat_id'];
    else 
        return false;
}

function get_cate_slug($id){
    global $dbase;
    $tbl = TBL_PIX.'categories_oy';
    $query = "SELECT cat_slug FROM {$tbl} WHERE cat_id = {$id}";
    $row = $dbase->fetch_assoc($query,true);
    return $row['cat_slug'];
}
function cat_2arr($type,$parent=0,$uid=0){
    global $dbase;
    
    if($uid!=0)
        $uidw = " AND cat_uid='{$uid}'";
    else
        $uidw = 'AND ((cat_uid=0) OR (cat_uid= ' . user_uid() .'))';
    
    if($parent!=0)
        $parent = " AND cat_parent='{$parent}'";
    else
        $parent = '';
    
    $order = ' AND cat_status<>100 ORDER BY cat_order,cat_id ';
    
    $tbl = TBL_PIX.'categories_oy';
    $cats = $dbase->tbl2array($tbl, 'cat_id', 'cat_name',  " WHERE cat_type='{$type}' " . $uidw.$parent.$order);
    return $cats;
}

function cat_2arr_l_bcategory($type,$cate,$deflang='en_US'){
    global $dbase;
    
//    if($uid!=0)
//        $uidw = " AND cat_uid='{$uid}'";
//    else
//        $uidw = 'AND ((cat_uid=0) OR (cat_uid= ' . user_uid() .'))';
    
    //if($parent!=0)
        $parent = " AND cat_category='{$cate}'";
   // else
      //  $parent = '';
    $lang = " AND cat_lang='{$deflang}'";

    
    $order = ' AND cat_status<>100 ORDER BY cat_order,cat_id ';
    
    $tbl = TBL_PIX.'categories_oy';
    $cats = $dbase->tbl2array($tbl, 'cat_id', 'cat_name',  " WHERE cat_type='{$type}' " .$parent.$lang.$order);
    $lang = get_lang();
    if($lang==$deflang)
        $result = $cats;
    else{
        $result = array();
        foreach ($cats as $key => $value){
            $result[$key] = get_cate_name(get_actualID($key,$lang));
        }      
    }
                
    return $result;
}







function cat_2arr_luid($type,$parent=0,$deflang='en_US', $onlyuid = false){
    global $dbase;
    $uid = user_uid();
    $uidw = '';
    if($onlyuid)
        $uidw = " AND cat_uid='{$uid}'";
//    else
//        $uidw = 'AND ((cat_uid=0) OR (cat_uid= ' . user_uid() .'))';
    
    if($parent!=0)
        $parent = " AND cat_parent='{$parent}'";
    else
        $parent = '';
    $lang = " AND cat_lang='{$deflang}'";


    
    $order = ' AND cat_status<>100 ORDER BY cat_order,cat_id ';
    
    $tbl = TBL_PIX.'categories_oy';
    $cats = $dbase->tbl2array($tbl, 'cat_id', 'cat_name',  " WHERE cat_type='{$type}' " .$parent.$lang.$uidw.$order);
    $lang = get_lang();
    if($lang==$deflang)
        $result = $cats;
    else{
        $result = array();
        foreach ($cats as $key => $value){
            $result[$key] = get_cate_name(get_actualID($key,$lang));
        }      
    }
                
    return $result;
}


function cat_2arr_l($type,$parent=0,$deflang='en_US'){
    global $dbase;
    
//    if($uid!=0)
//        $uidw = " AND cat_uid='{$uid}'";
//    else
//        $uidw = 'AND ((cat_uid=0) OR (cat_uid= ' . user_uid() .'))';
    
    if($parent!=0)
        $parent = " AND cat_parent='{$parent}'";
    else
        $parent = '';
    $lang = " AND cat_lang='{$deflang}'";

    
    $order = ' AND cat_status<>100 ORDER BY cat_order,cat_id ';
    
    $tbl = TBL_PIX.'categories_oy';
    $cats = $dbase->tbl2array($tbl, 'cat_id', 'cat_name',  " WHERE cat_type='{$type}' " .$parent.$lang.$order);
    $lang = get_lang();
    if($lang==$deflang)
        $result = $cats;
    else{
        $result = array();
        foreach ($cats as $key => $value){
            $result[$key] = get_cate_name(get_actualID($key,$lang));
        }      
    }
                
    return $result;
}





function get_actualID($pid,$lang){
     global $dbase;
    $fld_pre = 'cat_'; // table Feild Prefix
    $tbl = TBL_PIX . 'categories_oy'; // Table Name for this page
     $flang = $dbase->get_single($tbl, "{$fld_pre}id", $pid, "{$fld_pre}lang");
     if($lang==$flang)
         return $pid;
     else{
         return get_langID($pid,$lang);
     }
        
}

function get_langID($pid,$lang){
    global $dbase;
   $fld_pre = 'lan_'; // table Feild Prefix
    $tbl = TBL_PIX . 'langs'; // Table Name for this page 
   $query = "SELECT lan_pid,lan_rid FROM {$tbl} WHERE lan_lang='{$lang}' AND (lan_pid={$pid} OR lan_rid={$pid})";
     $queryx = $dbase->query($query);
        $row = mysqli_fetch_assoc($queryx);
        
        if($row['lan_pid']){
            if($row['lan_pid']==$pid)
                $reu = $row['lan_rid'];
            else
               $reu =  $row['lan_pid'];
        }else
            $reu = $pid;
        return $reu;
}


function get_muli_cate($cities){
//  $cities = get_job_provinces();
 $place = explode('-,-',$cities);
 $numItems = count($place);
$i = 0;$xx='';
//if($place){
 foreach($place as $city){
  $city =  str_ireplace('-', '', $city);
    $xx .= get_cate_name($city);
    $xx .= (++$i != $numItems ? ", ": '');   
 }
//}
  return $xx;  
        
     
}




function cat_search_inui($term, $type=false, $idpfx = '', $valpfx = ''){
    
    global $dbase;
    $pref = TBL_PIX;
    $uid = user_uid();
      $row = array();
        $return_arr = array();
        $row_array = array();
        $ret = array();
    if($type){
            $wherepart = " AND cat_type='{$type}' ";
        }else{
        $wherepart ='';}
        
        $sql = "SELECT cat_id, cat_name,cat_type FROM {$pref}categories_oy WHERE cat_name LIKE '%" . $term ."%' {$wherepart} AND (cat_status=1) ORDER BY cat_name ASC LIMIT 30";

    $result = $dbase->query($sql);

        if($result->num_rows > 0)
        {
           
            while($row = $result->fetch_array())
            {
                
                $pfx='';
                if(!$type){
                    $pfx = ' ('.g_lbl($row['cat_type']).')';
         
                  // $row_array['category'] = $pfx; 
                }
                $row_array['label'] =htmlentities($valpfx.$row['cat_name']); //utf8_encode(($row['cat_name']));
               
                 $row_array['value'] =$idpfx.($row['cat_id']);                
                $return_arr[] = $row_array;
            }

}
    return $return_arr;
}