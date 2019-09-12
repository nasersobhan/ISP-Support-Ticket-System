<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function loc_2arr($type='ALL',$in=0){
    global $dbase;
    
    if($in!=0)
        $in = " AND loc_in_location='{$in}'";
    else
        $in = '';
    
    if($type=='ALL')
        $type = " loc_type LIKE '%%'";
    else
        $type = " loc_type = '{$type}'";
    
    $tbl = TBL_PIX.'location_oy';
    $cats = $dbase->tbl2array($tbl, 'loc_id', 'loc_local_name', " WHERE {$type} {$in} ");
    return $cats;
}





function get_coname($id){
    global $dbase;
    $fld_pfx = 'loc_';
    return $dbase->get_single( TBL_PIX. 'location_oy', "{$fld_pfx}iso", $id, "{$fld_pfx}local_name");
}
function get_ccname($id){
    global $dbase;$fld_pfx = 'loc_';
    $val = $dbase->get_single(TBL_PIX.'location_oy', "{$fld_pfx}id", ($id), "{$fld_pfx}local_name");
    if($val)
    return trim($val);
    else
        return '';
}



function get_ccid($id){
    global $dbase;$fld_pfx = 'loc_';
    $query = "SELECT db_id FROM ".TBL_PIX."location_oy WHERE {$fld_pfx}local_name like '%{$id}%' and {$fld_pfx}type='RE'  limit 1";
    $row = $dbase->fetch_assoc($query,true);
    return $row['db_id'];
}

function get_location_id2($value,$parent){
   global $dbase;
   $fld_pfx = 'cat_';
    $query = "SELECT cat_id FROM ".TBL_PIX."categories_oy WHERE cat_name like '%{$value}%' and (cat_type='location' limit 1";
    $row = $dbase->fetch_assoc($query,true);
    return $row['cat_id'];  
}
function get_location_name($value){
    global $dbase;$fld_pfx = 'loc_';
    return $dbase->get_single(TBL_PIX.'location_oy', "{$fld_pfx}id", $value, "{$fld_pfx}local_name");
}

function get_location_parent($value){
    global $dbase;$fld_pfx = 'loc_';
    
    $parent = $dbase->get_single(TBL_PIX.'location_oy', "{$fld_pfx}id", $value, "{$fld_pfx}in_location");
    return $parent;
}


function get_location_id($value,$parent){
   global $dbase;
   $fld_pfx = 'loc_';
    $query = "SELECT loc_id FROM ".TBL_PIX."location_oy WHERE {$fld_pfx}local_name like '%{$value}%' and ({$fld_pfx}type='RE' OR  {$fld_pfx}type='CI') limit 1";
    $row = $dbase->fetch_assoc($query,true);
    return $row['loc_id'];  
}

function get_location($id){
    $ch = get_location_name($id);
    //$parent_id = get_location_parent($id);
    
    
    
    if(get_location_parent($id)){
       $parent = ', '.get_location(get_location_parent($id));
    }else
       $parent = '';// get_location_name($id); 
    
    
    $result = $ch.$parent;
return $result;

}



function get_cc2dd($type = '', $iso = "", $selattr = '', $settings = array()){
    global $dbase;$fld_pfx = 'loc_';
    $where = '';
    if($iso != '%ALL'){
        $where = "WHERE {$fld_pfx}iso like '" . $iso . "%'";
        if($type != '%ALL'){
            if(!empty($type))
                $where .= " AND {$fld_pfx}type='" . $type . "'";
        }
    }else{
        $where = '';
        if($type != '%ALL'){
            if(!empty($type))
                $where .= " WHERE {$fld_pfx}type='" . $type . "'";
        }
    }
    $query = "SELECT * FROM ".TBL_PIX."location_oy " . $where;
    $res = $dbase->query($query); //echo $query;
    $typex = '<select ' . $selattr . '>' . PHP_EOL;
    if(isset($settings['none']) && !empty($settings['none']))
        $typex .='<option value="0">' . $settings['none'] . '</option>' . PHP_EOL;
    while($row = mysqli_fetch_array($res)){
        if(isset($settings['selected']) && !empty($settings['selected'])){
            $val = $settings['selected'];
            $vals = explode('|', $val);
            if(in_array($row[$fld_pfx.'id'], $vals)){
                $oattr = "selected";
            }else
                $oattr = "";
            /* foreach ($vals as $val){
              if($row['db_id']==$val)
              $oattr = "selected";
              else
              $oattr = "";
              } */
        }else
            $oattr = "";
        $CCOD = explode('-', $row[$fld_pfx.'iso']);
        $typex .= '<option ' . $oattr . ' class="parent_' . $CCOD[0] . '" value="' . $row[$fld_pfx.'db_id'] . '">' . $row[$fld_pfx.'local_name'] . '</option>' . PHP_EOL;
    }
    $typex .='</select>' . PHP_EOL;
    return $typex;
}