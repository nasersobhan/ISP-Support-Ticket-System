<?php

    require_once(CORE_RPATH."oy_classes/db-mysql.class.php");
  global $dbase_cat;
    $dbase_cat = new oy_db("195.201.16.87:ooyta_data:ooyta_manuser:XFp$@fafm11QoNek");
/*   
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    
    
    function DATAPUT($id,$data){
    
        $uid = user_uid();
        
        $REST_url = LODATAHOME.'?pg=post&m=PUT&i='.$id;
        $data['to'] = DATA_TOKEN;
        $data['MyUID'] = $uid;
 
        $ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$REST_url);
	curl_setopt($ch, CURLOPT_POST,1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	$result=curl_exec ($ch);
	curl_close ($ch);
	return json_decode($result,true);
}


function get_loc_name($id,$lang=false){
     if(!$id OR $id==0)
         return 'Unknow Location ID';
       $type = get_typeof($id);
       $parent = get_parentof($id);
       $pfx = '';
        if($type==1068)
                $pfx = '';
            if($type==1285)
                $pfx = ', '.get_cate_name($parent,$lang);
            if($type==1284)
                $pfx = ', '.get_cate_name($parent,$lang).', '.get_cate_name(get_parentof($parent),$lang);
  
   return get_cate_name($id,$lang).$pfx;
}

function get_cate_list($id,$parent=false,$lang=false){

     if($lang == false)
         $lang = (is_get('lang') ? is_get('lang') : 'en');
   // if($parent)
      $category = cat_2arr_l($id,$parent,$lang);
  //  else
       // $category = cat_2arr_l($id,false,$lang);
     //  print_r( cat_2arr_l(is_get('getData')));
      // header('Content-type: text/json; charset=utf-8');
         return $category;
}

function get_cate_list2option($id,$parent=false,$lang=false, $selected=false){
    if($lang)
        $lang = is_get('lang');
        $man =   get_cate_list($id,$parent,$lang);
        $reu = '';
        
        
      
    foreach($man as $id => $value){
        $sel = '';
          if($selected==$id)
              $sel='selected';
        $reu .='<option '.$sel.' value="'.$id.'">'.$value.'</option>';
        
    }
    unset($man);
    
        echo $reu;
  
}

function get_location ($id){
  return get_cate_name($id);  
}


function get_cate_select($id,$selected=''){
     $gender = get_cate_list($id);
     $xx ='';
         foreach($gender as $id => $name)
         $xx .= '<option '.($id==$selected ? 'selected' : '').' value="'.$id.'" >'.$name.'</option>';
         return $xx;
}

function get_att_select($id,$selected=''){
     $gender = get_att_list($id);
     $xx ='';
         foreach($gender as $id => $name)
         $xx .= '<option '.($id==$selected ? 'selected' : '').' value="'.$id.'" >'.$name.'</option>';
         return $xx;
}



function get_att_value($attid,$pid,$lang=false, $vid = false){
       
     if(!$lang)
        $lang=(is_get('lang') ? is_get('lang') : 'en');

    $id = $attid;
    //$pid = $pid; //is_get('pid');
    //$vid = is_get('vid');
    $category = array();
    if($pid)
        $category = cat_2arr_attWp($id,$pid,$lang);
    elseif($vid)
        $category = cat_2attfromvl($id,$vid,$lang);
    elseif(is_intorno($id))
        $category = cat_2arr_att($id,$lang);
  // header('Content-type: text/json; charset=utf-8');
    return ($category);
}
function get_att_list($id,$lang=false){
      if(!$lang)
        $lang=('en');
      
//      
//       $homepage =& $GLOBALS['GET-USER-CACHE']['d']['L'.$id];
//     if(!$homepage)
//            $homepage = get_content(LODATAHOME.'?pg=api&t='.DATA_TOKEN.'&getAtt='.$id.'&lang='.$lang);
//  //print_r($homepage);
//    $res = json_decode($homepage,true);
//     return $res;

      
  //  $id = is_get('getAtt');
   // $pid = is_get('pid');$vid = is_get('vid');
    $category = array();
//    if($pid)
//        $category = cat_2arr_attWp($id,$pid,$lang);
//    elseif($vid)
//        $category = cat_2attfromvl($id,$vid,$lang);
   if(is_intorno($id))
        $category = cat_2arr_att($id,$lang);
    return $category;
}



function addrfile2cate($pid,$fid,$type,$tag){
    global $dbase_cat;
      $dt['fil_pid']=$pid;
        $dt['fil_uid']=user_uid();
        $dt['fil_fid']=$fid;
        $dt['fil_type']=  $type;
         $dt['fil_tag']=  $tag;
         return ($dbase_cat->RowInsert(TBL_PIX.'files',$dt));
             
}

function loc_search_in($term, $parent=false){
    global $dbase_cat;
    $pref = TBL_PIX;
        $return_arr = array();
        $ret = array();
        $whereparent ='';
    if($parent){
            $whereparent = " AND cat_parent='{$parent}'  ";
        }
        
        
         $wherepart = " AND (cat_type=1068 OR cat_type=1285 OR cat_type=1284)  ";
        
        $sql = "SELECT cat_id, cat_name,cat_type,cat_parent FROM {$pref}categories_oy WHERE cat_name like '" . $term ."%' {$wherepart} {$whereparent} AND (cat_status=1) ORDER BY cat_name ASC";

    $result = $dbase_cat->query($sql);

        if($result->num_rows > 0)
        {
           
            while($row = $result->fetch_array())
            {
                 $row_array['value'] = get_actualID($row['cat_id']);
            if($row['cat_type']==1068)
                $pfx = '';
            if($row['cat_type']==1285)
                $pfx = ', '.get_cate_name($row['cat_parent']);
            if($row['cat_type']==1284)
                $pfx = ', '.get_cate_name($row['cat_parent']).', '.get_cate_name(get_parentof($row['cat_parent']));
            
                $row_array['label'] =($row['cat_name'] .$pfx); 
              //  array_push($return_arr,$row_array);
                 $return_arr[] = $row_array;
//                
//                     $row_array['label'] =htmlentities($row['cat_name']); //utf8_encode(($row['cat_name']));
//               
//                 $row_array['value'] =$row['cat_id'];//get_actualID($row['cat_id']);
//               // $row_array['id'] = get_actualID($row['cat_id']);
//                //array_push($return_arr,$row_array);
//                
//                $return_arr[] = $row_array;
   //         }
            }

}
    return $return_arr;
}

function cat_search_inui($term, $type=false, $cate=false){
    
    global $dbase_cat;
    $pref = TBL_PIX;
    $uid = user_uid();
      $row = array();
        $return_arr = array();
        $row_array = array();
        $ret = array();
        $wherepart ='';
            $wherecate ='';
        
    if($type){
            $wherepart = " AND cat_type='{$type}' ";
        }
        
    
        if($cate){
            
           
            
            $wherecate = " AND (cat_category='{$cate}' OR cat_category IN (SELECT cat_id FROM sob_categories_oy WHERE cat_parent='{$cate}')) ";
        }
        
        $sql = "SELECT cat_id, cat_name,cat_type FROM {$pref}categories_oy WHERE cat_name LIKE '%" . $term ."%' {$wherepart} {$wherecate} AND (cat_status=1) ORDER BY cat_name ASC LIMIT 30";

    $result = $dbase_cat->query($sql);

        if($result->num_rows > 0)
        {
           
            while($row = $result->fetch_array())
            {
                
                $pfx='';
                if(!$type){
                    $pfx = get_cate_name($row['cat_type']);
         
                   $row_array['category'] = $pfx; 
                }
                $row_array['label'] =htmlentities($row['cat_name']); //utf8_encode(($row['cat_name']));
               
                 $row_array['value'] =$row['cat_id'];//get_actualID($row['cat_id']);
               // $row_array['id'] = get_actualID($row['cat_id']);
                //array_push($return_arr,$row_array);
                
                $return_arr[] = $row_array;
            }

}
    return $return_arr;
}

function cat_search_in($term, $type=false){
    
    global $dbase_cat;
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
        
        $sql = "SELECT cat_id, cat_name,cat_type FROM {$pref}categories_oy WHERE cat_name LIKE  '% " . $term ."%' {$wherepart} AND (cat_status=1)  ORDER BY cat_name ASC LIMIT 30";

    $result = $dbase_cat->query($sql);

        if($result->num_rows > 0)
        {
           
            while($row = $result->fetch_array())
            {
                $row_array['id'] = get_actualID($row['cat_id'],'en');
                $pfx='';
                if(!$type)
                    $pfx = ' ('.get_cate_name($row['cat_type']).')';
                $row_array['text'] =($row['cat_name'] .$pfx); //utf8_encode(($row['cat_name']));
                array_push($return_arr,$row_array);
            }

}
    return $return_arr;
}

function get_fvalue($id,$fld){
    global $the_tbl;
    return $the_tbl->get_valbyid($id,$fld);
}
///SELECT
function get_cat_field($id,$val){
    global $dbase_cat;
    $tbl = TBL_PIX.'categories_oy';
    $query = "SELECT cat_{$val} FROM {$tbl} WHERE cat_id = {$id}";
    $row = $dbase_cat->get_single($tbl, 'cat_id', $id, "cat_{$val}");
    //$row = $dbase_cat->fetch_assoc($query,true);
    return $row;// $row['cat_'.$val];
}

function get_cate_avatar($id){
    $fid = get_cat_field($id,'avatar');
     $re = $fid;
//    if($fid==1482){
//       $re = 1482; // get_cat_field(get_cat_field($id,'pid'),'avatar');
//    }
   if(empty($re) || $re =='' || !$re)
       $re == 1482;
    return $re;
}

function get_cate_thumb($id,$w,$h){
  $pid = get_cate_avatar($id);
  if(empty($pid) || $pid =='' || !$pid ){
      // $pid == '1482';
    $url = MEDIAHOME.'/uploads/def/default.jpg';;//MEDIAHOME.'img/1482-'.$w.'-'.$h.'.jpg';
    return $url;
       
   }else{
    $path = MEDIA_R_HOME;
    
$dst =  'oy_content'.DIRECTORY_SEPARATOR.'tmp'.DIRECTORY_SEPARATOR;
$image = $dst . 'tmp_'.$w.'-'.$h.'_' . $pid .'.jpg';
$src = $path. $image;
//echo $src;
 if (file_exists($src)) {
       return MEDIAHOME.$image;
 }else{
    
 
    $url = MEDIAHOME.'img/'.$pid.'-'.$w.'-'.$h.'.jpg';
    if($url == MEDIAHOME.'img/-'.$w.'-'.$h.'.jpg')
           $url = get_cate_thumb(1482,$w,$h);//MEDIAHOME.'img/1482-'.$w.'-'.$h.'.jpg';
    return $url;
 }
   }
}
function get_slugdt($slug, $tbl = 'meta_slug', $feild = 'slu_value'){
    global $dbase_cat;
    //$slug = trim($slug);

   // $slug = preg_replace('/[^A-Za-z0-9\u0600-\u06FF-]+/', '-', ($slug));
 // $slug =   preg_replace('/([^\x{0600}-\x{06FF}A-Za-z0-9+])/u', '-', ($slug));
    //$slug = strtolower($slug);
  $slug = clean_url(trim($slug));
   $slug = (trim(str_ireplace('/', '-', $slug)));
    if($dbase_cat->check_duplicate($slug, $tbl, $feild)){
        global $i;
        $slug = str_replace($i, '', $slug);
        $i = ((int) (str_replace('-', '', $i))) + ((int) 1);
        return get_slugdt($slug . $i, $tbl, $feild);
    }else{
        return $slug;
    }
}
function add_cate($val,$type,$parent=0,$uid=0,$cate=0){
    $tbl = TBL_PIX.'categories_oy'; global $dbase_cat;
    $dta['cat_uid'] = $uid;
  
    $dta['cat_parent'] = $parent;
    $dta['cat_name'] = $val;
    $dta['cat_type'] = $type;
    $dta['cat_category'] = $cate;
    $dta['cat_slug'] = get_slugdt($dta['cat_name'], $tbl, 'cat_slug');
    if(is_arabic($val))
       $dta['cat_lang'] = 'fa';
   
    
    
    $dbase_cat->RowInsert($tbl,$dta);
    $id = $dbase_cat->lastinserted_id();
    $dbase_cat->RowInsert('sob_types',array('typ_pid'=>$id, 'typ_tid'=>$type,'typ_cot'=>'t'));
    if($cate)
     $dbase_cat->RowInsert('sob_types',array('typ_pid'=>$id, 'typ_tid'=>$cate,'typ_cot'=>'c'));
    return $id;
}
function get_categoryof($val){
    global $dbase_cat;
    return $dbase_cat->get_single(TBL_PIX . 'categories_oy', 'cat_id', $val, "cat_category");
}
function get_relativeof($val,$ty='*',$all=true){
    global $dbase_cat;
    if($ty=='*')
         $where = 'WHERE typ_pid='.$val." LIMIT 1000";
        else
            $where = 'WHERE typ_pid='.$val." AND typ_cot='".$ty."' LIMIT 1000";
    $rws = $dbase_cat->tbl2array2(TBL_PIX . 'types', 'typ_id,typ_tid,typ_cot', $where);
    if($all){
            $re=$rws; //array();
//            $o=0;
//            foreach($rws as $rw){
//                $re[$o]=$rw['typ_tid'];
//                $re[$o][]=$rw['typ_tid'];
//    } 
    }else{
       $re = $rws[0]['typ_tid'];
    }
   
    return $re;
}
function get_parentof($val){
    global $dbase_cat;
    return $dbase_cat->get_single(TBL_PIX . 'categories_oy', 'cat_id', $val, "cat_parent");
}


function get_cate_type($val){
    return get_typeof($val);
}
function get_typeof($val){
    global $dbase_cat;
    return $dbase_cat->get_single(TBL_PIX . 'categories_oy', 'cat_id', $val, "cat_type");
}
function get_cateof($val){
    global $dbase_cat;
    return $dbase_cat->get_single(TBL_PIX . 'categories_oy', 'cat_id', $val, "cat_category");
}
function get_cate_lang($val){
    global $dbase_cat;
    if(is_intorno($val))
        return $dbase_cat->get_single(TBL_PIX . 'categories_oy', 'cat_id', $val, "cat_lang");
    else
        return false;
}
function get_cats_p($type, $att = ''){
    global $dbase_cat;
    echo $dbase_cat->tbl2options(TBL_PIX . 'categories_oy', 'cat_id', 'cat_name', $att, " where cat_type='" . $type . "' AND cat_parent=0");
}
function get_cats($type, $att = ''){
    global $dbase_cat;
    echo $dbase_cat->tbl2options(TBL_PIX . 'categories_oy', 'cat_id', 'cat_name', $att, " where cat_type='" . $type . "'");
}


function get_cat2dd($type = '', $parent = 'parent', $selattr = '', $settings = array()){
    global $dbase_cat;
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
    //if(!$lang)
        $lang = get_lang();
          $where .= " AND cat_lang='" . $lang . "'";
        
//    }else{
//        $where = '';
//        if($type != '%ALL'){
//            if(!empty($type))
//                $where .= " WHERE cat_type='" . $type . "'";
//        }
//    }
$tbl = TBL_PIX. 'categories_oy';
    $query = "SELECT * FROM {$tbl} " . $where;
    $res = $dbase_cat->query($query);
   // echo $query;
    $typex = '<select ' . $selattr . '>' . PHP_EOL;
    if(isset($settings['none']) && !empty($settings['none']))
        $typex .='<option value="0">' . $settings['none'] . '</option>' . PHP_EOL;
    while($row = mysqli_fetch_array($res)){
        $mid = ($row['cat_pid']!=0 ? $row['cat_pid'] : $row['cat_id']);
        
        if(isset($settings['selected']) && !empty($settings['selected'])){
            $val = $settings['selected'];
           
             $vals = explode('-', $val);
            if(in_array($mid, $vals)){
                $oattr = "selected";
            }else
                $oattr = "";
            
            if($mid == $val)
                $oattr = "selected";
            
        }else
            $oattr = "";
        $typex .= '<option ' . $oattr . ' class="parent_' . $row['cat_parent'] . '" value="' . $mid . '">' . $row['cat_name'] . '</option>' . PHP_EOL;
    }
    $typex .='</select>' . PHP_EOL;
    return $typex;
}
function cate_vl2id($val,$type=false){
    global $dbase_cat;
    $tbl = TBL_PIX.'categories_oy';
    $t='';
    if($type)
    $t = "AND cat_type='{$type}' ";
    
    $row = $dbase_cat->get_single_row($tbl, 'cat_id', " cat_name='{$val}' {$t}");
    if(isset($row['cat_id']))
        return $row['cat_id'];
    else return false;
}
function cate2db($var,$type,$parent=0,$uid=0,$cate=0){
   //  $var2int = (int)$var;
    $var = trim($var);
        if(!ctype_digit($var)){
            $export = cate_vl2id($var);
            if(!$export)
              $export =   add_cate($var,$type,$parent,$uid,$cate);
        }else{
            $export = $var;    
        }
        return $export;
}

function get_cate_name($id,$lang=false){
    global $dbase_cat;
    
    if(!empty($id) AND is_numeric($id)){
        $id = intval($id);
//        if($lang){
//           // $lang = get_lang();
//           
//        }
          if($lang===false)
        $lang = (is_get('lang') ? is_get('lang') : 'en');
    
         $id = get_langID($id,$lang); 
         
        $tbl = TBL_PIX.'categories_oy';
        $query = "SELECT cat_name FROM {$tbl} WHERE cat_id = {$id}";
        $row = $dbase_cat->fetch_assoc($query,true);
        if($row)
            return $row['cat_name'];
        else
            return $id;
    }else{
        return $id;
    }
}
function get_cate_namebyslug($slug,$lang=true){
    global $dbase_cat;
    $id = get_cate_id($slug);
    if(!empty($id) AND is_numeric($id)){
        
     //   if($lang){
           // $lang = get_lang();
           // $id = get_actualID($id,$lang);
       // }
            
        
        $tbl = TBL_PIX.'categories_oy';
        $query = "SELECT cat_name FROM {$tbl} WHERE cat_id = {$id}";
        $row = $dbase_cat->fetch_assoc($query,true);
        return $row['cat_name'];
    }else{
        return $id;
    }
}


function get_cate_id($slug,$lang=false){
    
     if(!empty($slug)){
    
    if(is_numeric($slug) && (int) $slug == $slug){
         return $slug; 
    }else{
        
    
        global $dbase_cat;
        $tbl = TBL_PIX.'categories_oy';
        $query = "SELECT cat_id FROM {$tbl} WHERE cat_slug = '{$slug}'";
        $row = $dbase_cat->fetch_assoc($query,true);
        if(!empty($row))
            return $row['cat_id'];
        else 
            return false;
    }
     }else{return false;}
}
function get_cate_pid_byname($name,$type = false){
    global $dbase_cat;
    $tbl = TBL_PIX.'categories_oy';
    $ty ='';
    if($type)
        $ty = "AND cat_type='{$type}'";
    $query = "SELECT cat_pid FROM {$tbl} WHERE cat_name like '%{$name}%' {$ty}";
    $row = $dbase_cat->fetch_assoc($query,true);
    if(!empty($row))
        return $row['cat_id'];
    else 
        return false;
}


function get_cate_id_byname($name,$type = false){
    global $dbase_cat;
    $tbl = TBL_PIX.'categories_oy';
    $ty ='';
    if($type)
        $ty = "AND cat_type='{$type}'";
    $query = "SELECT cat_pid,cat_id FROM {$tbl} WHERE cat_name = '{$name}' {$ty}";
    $row = $dbase_cat->fetch_assoc($query,true);
    if(!empty($row))
        if($row['cat_pid']==0)
             return $row['cat_id'];
            else
        return $row['cat_pid'];
    else 
        return false;
}

function get_cate_id_byslug($slug,$type = false){
    global $dbase_cat;
    $tbl = TBL_PIX.'categories_oy';
    $ty='';
    if($type)
        $ty = "AND cat_type='{$type}'";
    $query = "SELECT cat_id FROM {$tbl} WHERE cat_slug='{$slug}' {$ty}";
    $row = $dbase_cat->fetch_assoc($query,true);
    if(!empty($row))
        return $row['cat_id'];
    else 
        return false;
}

function get_cate_slug($id){
    global $dbase_cat;
    $tbl = TBL_PIX.'categories_oy';
    $query = "SELECT cat_slug FROM {$tbl} WHERE cat_id = {$id}";
    $row = $dbase_cat->fetch_assoc($query,true);
    return $row['cat_slug'];
}
function cat_2arr($type,$parent=0,$uid=0){
    global $dbase_cat;
    
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
    $cats = $dbase_cat->tbl2array($tbl, 'cat_id', 'cat_name',  " WHERE cat_type='{$type}' " . $uidw.$parent.$order);
    return $cats;
}

function cat_2arr_l_bcategory($type,$cate,$deflang='en'){
    global $dbase_cat;
    
//    if($uid!=0)
//        $uidw = " AND cat_uid='{$uid}'";
//    else
//        $uidw = 'AND ((cat_uid=0) OR (cat_uid= ' . user_uid() .'))';
    
    //if($parent!=0)
        $parent = " AND cat_category='{$cate}'";
   // else
      //  $parent = '';
   // $lang = " AND cat_lang='{$deflang}'";

     $lang = " AND (cat_pid=0 OR cat_pid=cat_id) ";
    $order = ' AND cat_status<>100 ORDER BY cat_name ';
    
    $tbl = TBL_PIX.'categories_oy';
    $cats = $dbase_cat->tbl2array($tbl, 'cat_id', 'cat_name',  " WHERE cat_type='{$type}' " .$parent.$lang.$order);
    $lang = get_lang();
    if($lang==$deflang)
        $result = $cats;
    else{
        $result = array();
        foreach ($cats as $key => $value){
            
             if($deflang)
            $result[$key] = get_cate_name($key,$deflang);
            else
                $result[$key] = $value;
          //  $result[$key] = get_cate_name(get_actualID($key),$lang);
        }      
    }
                
    return $result;
}







function cat_2arr_slug($type,$parent=false,$deflang='en'){
    global $dbase_cat;
//    if(!$deflang){
//        $deflang = get_lang();
//    }
//    if($uid!=0)
//        $uidw = " AND cat_uid='{$uid}'";
//    else
//        $uidw = 'AND ((cat_uid=0) OR (cat_uid= ' . user_uid() .'))';
    
    if($parent!==false)
        $parent = " AND cat_parent='{$parent}'";
    else
        $parent = '';
    $lang = " AND cat_lang='{$deflang}'";

    
    $order = ' AND cat_status<>100 ORDER BY cat_order,cat_id ';
    
    $tbl = TBL_PIX.'categories_oy';
    $cats = $dbase_cat->tbl2array($tbl, 'cat_id', 'cat_name',  " WHERE cat_type='{$type}' " .$parent.$lang.$order);
    $lang = get_lang();
//    if($lang==$deflang)
//        $result = $cats;
//    else{
        $result = array();
        foreach ($cats as $key => $value){
           // $id = ($key);
            $aslugx = get_cate_slug(($key)); 
            //echo $aslugx;
            $result[$aslugx] =  get_cate_name(($key),$deflang); //$value;//
        }      
//    }
                
    return $result;
}

function cat_2arr_lwc($type,$parent=false,$lang=false){
    global $dbase_cat;
//      if(!$deflang){
//        $deflang = get_lang();
//        
//    }
//    if($uid!=0)
//        $uidw = " AND cat_uid='{$uid}'";
//    else
//        $uidw = 'AND ((cat_uid=0) OR (cat_uid= ' . user_uid() .'))';
    
    if($parent!==false)
        $parents = " AND cat_parent='{$parent}'";
    else
        $parents = '';
    
    //$lang = " AND cat_lang='{$deflang}'";
if(!$lang)
    $lang=get_lang();
    $pid = " AND (cat_pid=0 OR cat_pid=cat_id) ";
   // $lang = " AND cat_pid='{$lang}'";
    $order = ' AND cat_status<>100 ORDER BY cat_order,cat_id ';
    
    $tbl = TBL_PIX.'categories_oy';
    $cats = $dbase_cat->tbl2array($tbl, 'cat_pid', 'cat_name',  " WHERE cat_type='{$type}' " .$parents.$pid.$order);
  //  $lang = get_lang();
//    if($lang==$deflang)
//        $result = $cats;
//    else{
        $result = array();
        
       
        
        foreach ($cats as $id => $value){
             // $id = (get_actualID($key)); 
           //   $result[$id] = $value;
              
                 if($lang)
                    $result[$id] = get_cate_name($id,$lang);
                else
                    $result[$id] = $value;
              // $type2 = get_cate_type($id);
             $new = cat_2arr_lwc($type,$id,$lang);
             if(count($new)){
               foreach ($new as $subid => $svalue){
                    $result[$subid] = '-   '.$svalue;
                    // $result[$id] = ''.$value;
               }
             }
            //$type2 = get_cate_type($parent);
//             $new2 = cat_2arr_lwc($parent,0,$deflang);
//             if(count($new2)){
//               foreach ($new2 as $subidx => $svaluex){
//                    $result[$subidx] = '-   '.$svaluex;
//                    // $result[$id] = ''.$value;
//               }
//             }
//              $new3 = cat_2arr_lwc($id,0,$deflang);
//             if($new3){
//               foreach ($new3 as $subidx => $svaluex){
//                    $result[$subidx] = '-   '.$svaluex;
//                    // $result[$id] = ''.$value;
//               }
//             }
             
             unset($new);unset($new2);
              
            
        }      
    //}
         //  print_r($result);      
    return $result;
}



function cat_2arr_l($type,$parent=false,$deflang=false){
    global $dbase_cat;
      if(!$deflang){
        $deflang = (is_get('lang') ? is_get('lang') : 'en');
        
    }
    if($parent!==false OR $parent!=0)
        $parent = " AND cat_parent='{$parent}'";
    else
        $parent = '';
    
    $lang = " AND (cat_pid=0 OR cat_pid=cat_id) ";

   // echo get_cate_name(10717,'fa');
    $order = ' AND cat_status<>100 ORDER BY cat_name ASC  ';
    
    $tbl = TBL_PIX.'categories_oy';
    $cats = $dbase_cat->tbl2array($tbl, 'cat_id', 'cat_name',  " WHERE cat_type='{$type}' " .$parent.$lang.$order);
   // $lang = get_lang();
//    if($lang==$deflang)
//        $result = $cats;
//    else{
        $result = array();
        foreach ($cats as $key => $value){
            if($deflang)
            $result[$key] = get_cate_name($key,$deflang);
            else
                $result[$key] = $value;
        }      
    //}
                
    return $result;
}

function cat_2arr_Exact($posts, $deflang=false){
    global $dbase_cat;
      if(!$deflang)
        $deflang = get_lang();
 
    $order = ' AND det_status<>100';
    
    $tbl = TBL_PIX.'details_oy';
    
    $cats = array();$catx=array();
    $i=0;
    foreach ($posts as $key => $val){
        $cats[$i] = $dbase_cat->tbl2array($tbl, 'det_id','det_pid',  " WHERE det_value='{$val}' AND det_key='{$key}' " .$order);
        if($i > 0){
           $catx = array_intersect($cats[$i], $catx); 
           
        }else{
            $catx = $cats[$i];
        }
        $i++;
    }
        $result = array();
        $i=0;
        foreach ($catx as $value){
           
                if(is_numeric($value) && (int) $value == $value){
                     $result[$i]['value'] = get_cate_name($value,$deflang);//echo 'int'.$value;
                      $result[$i]['id'] = $value;//echo 'int'.$value;
                }else{
                     $result[$i]['value'] = $value;
                }
           
                $i++;
        }      
                
    return $result;
}



function cat_2arr_attWp($key,$pid, $deflang=false){
    global $dbase_cat;
      if(!$deflang)
        $deflang = get_lang();
 
    $order = ' AND det_status<>100';
    
    $tbl = TBL_PIX.'details_oy';
    $cats = $dbase_cat->tbl2array($tbl, 'det_id', 'det_value',  " WHERE det_pid='{$pid}' AND det_key='{$key}' " .$order);
    
        $result = array();
        $i=0;
        foreach ($cats as $value){
            
                if(is_numeric($value) && (int) $value == $value){
                     $result[$i]['value'] = get_cate_name($value,$deflang);//echo 'int'.$value;
                      $result[$i]['id'] = $value;//echo 'int'.$value;
                }else{
                     $result[$i]['value'] = $value;
                }
                $i++;
        }      
                
    return $result;
}

function cat_2attfromvl($key,$vid, $deflang=false){
    global $dbase_cat;
      if(!$deflang)
        $deflang = get_lang();
 
    $order = ' AND det_status<>100';
    
    $tbl = TBL_PIX.'details_oy';
    $cats = $dbase_cat->tbl2array($tbl, 'det_id', 'det_pid',  " WHERE det_value='{$vid}' AND det_key='{$key}' " .$order);
    
        $result = array();
        $i=0;
        foreach ($cats as $value){
            
                if(is_numeric($value) && (int) $value == $value){
                     $result[$i]['value'] = get_cate_name($value,$deflang);//echo 'int'.$value;
                      $result[$i]['id'] = $value;//echo 'int'.$value;
                }else{
                     $result[$i]['value'] = $value;
                }
                $i++;
        }      
                
    return $result;
}

function cat_2arr_att($key,$deflang=false){
    global $dbase_cat;
      if(!$deflang)
        $deflang = get_lang();
        
    
   // $lang = " AND det_lang='{$deflang}'";

    
    $order = ' AND det_status<>100';
    
    $tbl = TBL_PIX.'details_oy';
    $cats = $dbase_cat->tbl2array($tbl, 'det_pid', 'det_value',  " WHERE det_key='{$key}' " .$order);
   
        $result = array();
        asort($cats);
        foreach ($cats as $pid => $value){
                if(is_numeric($value) && (int) $value == $value){
                     $result[$value] = get_cate_name($value,$deflang).' ('.get_cate_name($pid,$deflang).')';//echo 'int'.$value;
                }else{
                     $result[$value] = $value;
                   //  echo 'Not-int'.$value;
                }
             // $id = (get_actualID($key,'en'));
           // $result[$id] = $value;
        }      
                
    return $result;
}



function get_actualID($pid,$lang='en'){
     global $dbase_cat;
    $fld_pre = 'cat_'; // table Feild Prefix
    $tbl = TBL_PIX . 'categories_oy'; // Table Name for this page
    $aid = $dbase_cat->get_single($tbl, "{$fld_pre}id", $pid, "{$fld_pre}pid");
    if($aid){
        return $aid;
    }else{
        $flang = $dbase_cat->get_single($tbl, "{$fld_pre}id", $pid, "{$fld_pre}lang");
        if($lang==$flang)
            return $pid;
        else{
            return get_langID($pid,$lang);
        }
    }
        
}

function get_langID($pid,$lang){
    $reu = $pid;
    $pidl = false;    $ridl = false;
    $clang = get_cate_lang($pid);
    if($clang==$lang)
        return $pid;
    else{
        global $dbase_cat;
        $fld_pre = 'lan_'; // table Feild Prefix
        $tbl = TBL_PIX . 'langs'; // Table Name for this page 
       $query = "SELECT lan_pid,lan_rid,lan_lang FROM {$tbl} WHERE  (lan_pid='{$pid}' OR lan_rid='{$pid}') AND lan_rid!=lan_pid"; //lan_lang='{$lang}' AND
         $queryx = $dbase_cat->query($query);
          
                while($row = mysqli_fetch_assoc($queryx)){
                    //$lang = fa
                    //$pid = 62795
                    //$row['lan_pid'] = 62795
                    //$row['lan_rid'] = 1544
                    //$row['lan_lang'] = fa
                    //$pidl = en
                    //$ridl = fa

                    
                    
                    
                     if($row['lan_pid']!=$pid) //62795!=1544 - TRUE
                    $pidl = get_cate_lang($row['lan_pid']); // en
                     
                     if($pidl==$lang) // en == en - TRUE
                        $reu = $row['lan_pid']; // 62795
                     
                     
                     if($row['lan_rid']!=$pid) // 1544!=1544 - TRUE
                    $ridl = get_cate_lang($row['lan_rid']); // fa
                   
                    if($ridl==$lang) // fa == en - FALSE
                        $reu = $row['lan_rid']; // 1544
                    
                    
//                     if($row['lan_lang']==$lang){
//                     
//                   
//                           if($row['lan_pid']){
//                               
//                               
//                                    if($row['lan_pid']==$pid)
//                                        $reu = $row['lan_rid'];
//                                    else
//                                       $reu =  $row['lan_pid'];
//                                
//                           }else
//                               $reu = $pid;
//                   
//
//                               }
                }
            return $reu;
}
}
//()


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


function cate2options($val,$echo = false){
    $stype = cat_2arr($val);
    $text = '';
    foreach($stype as $key => $value)
        $text .='<option value="'.$key.'">'.$value."</option>";
    
    if($echo)
        echo $text;
    else
        return $text;
}




