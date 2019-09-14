<?php

$whitelist = array('127.0.0.1', "::1","195.201.94.95","162.158.91.169");
if($_SERVER['REMOTE_ADDR'] == "247.88.176.67")
    exit();
if(in_array(getUserIP(), $whitelist))
    define('LODATAHOME','http://127.0.0.1/data/');
else
    define('LODATAHOME','https://d.ooyta.com/');
//

load_datacache();
function load_datacache(){
   if(!isset($GLOBALS['GET-USER-CACHE']['d'])){
    if(file_exists(RHOME.'/oycache/d'.date('Ymd')))
            $GLOBALS['GET-USER-CACHE']['d'] = unserialize(get_content(RHOME.'oycache/d'.date('Ymd').'')); 
} 
}

function set_datacache(){
if(isset($GLOBALS['GET-USER-CACHE']['d'])){   
   // if(!file_exists(RHOME.'/oycache/data'.date('Ymd')))
	file_put_contents(RHOME.'oycache/d'.date('Ymd'), serialize($GLOBALS['GET-USER-CACHE']['d']));
    }
}





function get_actualID($pid,$lang='en'){
  // $other='';
    //if($lang)
        $other = '&lang='.($lang);
     $catename =& $GLOBALS['GET-USER-CACHE']['d']['ai'.$pid];
     if(!$catename)
    $catename = get_content(LODATAHOME.'?pg=api&t='.DATA_TOKEN.'&actualID='.urlencode($pid).$other);
  //print_r($homepage);
  //$res = $homepage;
     return $catename; 
}

function cate2db($var,$type=false,$parent=0,$uid=0,$cate=0){
    $other='';
    
    if($type)
        $other .= '&type='.($type);
   if($cate)
        $other .= '&c='.($cate);
   
     if($uid)
        $other .= '&u='.($uid);
     
     if($parent)
        $other .= '&p='.($parent);
  $homepage = get_content(LODATAHOME.'?pg=api&t='.DATA_TOKEN.'&cat2db='.trim(urlencode($var)).$other);
  //print_r($homepage);
  $res = $homepage;
     return $res; 
}



function get_cate_thumb($id,$w,$h){
       if(!$id)
       $id == '1482';
    
     $catename =& $GLOBALS['GET-USER-CACHE']['d']['p'.$w.$h.$id];
     if(!$catename)
     $catename = get_content(LODATAHOME.'?pg=api&t='.DATA_TOKEN.'&getcatthumb='.$id.'&w='.$w.'&h='.$h);
    //$res = json_decode($homepage,true);
//     if(!$catename)
//         return 1482;
     return $catename;
    
//    $pid = get_fvalue($id,'avatar');
//    $url = MEDIAHOME.'img/'.$id.'-'.$w.'-'.$h.'.jpg';
//    return $url;
}


function cat_search_in($term, $type=false){
    $other=''; //$ret=array();
    if($type)
        $other = '&type='.$type;
  $homepage = get_content(LODATAHOME.'?pg=api&t='.DATA_TOKEN.'&SearchIn='.urlencode($term).$other);
  //print_r($homepage);
  $res = json_decode($homepage,true);
     return $res;

}

function loc_search_in($term, $type=false){
    $other=''; //$ret=array();
    if($type)
        $other = '&type='.$type;
  $homepage = get_content(LODATAHOME.'?pg=api&t='.DATA_TOKEN.'&SearchInLoc='.$term.$other);
  //print_r($homepage);
  $res = json_decode($homepage,true);
     return $res;

}


function get_cate_slug($id){
   
    
     $catename =& $GLOBALS['GET-USER-CACHE']['d']['s'.$id];
     if(!$catename)
     $catename = get_content(LODATAHOME.'?pg=api&t='.DATA_TOKEN.'&GetSlug='.$id);
    //$res = json_decode($homepage,true);
     return $catename;
}



function cat_2arr_lwc($type,$parent=false,$lang=false){
       if(!$lang)
        $lang=is_get('lang');
     
    if(!$parent)
        $parent = 0;
  $homepage = get_content(LODATAHOME.'?pg=api&t='.DATA_TOKEN.'&arrwc='.$type.'&lang='.$lang.'&parent='.$parent);
    $res = json_decode($homepage,true);
     return $res;
        
    
}
function get_location ($id){
  return get_cate_name($id);  
}
function cat_2arr($type,$parent=0,$uid=0){
    $lang=false;
     if(!$lang)
        $lang=is_get('lang');
    return get_cate_list($type,$parent=0);
}
function get_cate_list($id,$parent=false,$lang=false){
    if(!$lang)
        $lang=is_get('lang');
     
    if($parent)
        $parent = '&parent='.$parent;
    
    
      $homepage =& $GLOBALS['GET-USER-CACHE']['d']['li'.$id.$parent.$lang];
     if(!$homepage)
        $homepage = get_content(LODATAHOME.'?pg=api&t='.DATA_TOKEN.'&getData='.$id.'&lang='.$lang.$parent);
     
    $res = json_decode($homepage,true);
     return $res;

  
}


function get_cate_listbycat($id,$cate=0,$lang=false){
    if(!$lang)
        $lang=is_get('lang');
     
//    if($parent)
//        $paren = $parent;
    
    
      $homepage =& $GLOBALS['GET-USER-CACHE']['d']['licat'.$id.$cate.$lang];
     if(!$homepage)
        $homepage = get_content(LODATAHOME.'?pg=api&t='.DATA_TOKEN.'&getData='.$id.'&lang='.$lang.'&cat='.$cate);
     
    $res = json_decode($homepage,true);
     return $res;

  
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
function cat_2arr_Exact($posts, $lang=false){
     if(!$lang)
        $lang=is_get('lang');
    $post = http_build_query($posts); 
  $homepage = get_content(LODATAHOME.'?pg=api&t='.DATA_TOKEN.'&getEx=1&lang='.$lang.'&'.$post);
 // echo (LODATAHOME.'?pg=api&t='.DATA_TOKEN.'&getEx=1&lang='.$lang.'&'.$post);
  //echo LODATAHOME.'?pg=api&t='.DATA_TOKEN.'&getEx=1&lang='.$lang.'&'.$post;
    $res = json_decode($homepage,true);
     return $res; 
}
function cat_2arr_attWp($key,$pid, $lang=false){
      if(!$lang)
        $lang=is_get('lang');
  $homepage = get_content(LODATAHOME.'?pg=api&t='.DATA_TOKEN.'&getAtt='.$id.'&pid='.$pid.'&lang='.$lang);
  //print_r($homepage);
    $res = json_decode($homepage,true);
     return $res;

  
}

function get_att_value($attid,$pid,$lang=false){
      if(!$lang)
        $lang=(is_get('lang') ? is_get('lang') : 'en');
      
      
       $homepage =& $GLOBALS['GET-USER-CACHE']['att'][$attid.$pid.$lang];
     if(!$homepage)
            $homepage = get_content(LODATAHOME.'?pg=api&t='.DATA_TOKEN.'&getAtt='.$attid.'&lang='.$lang.'&pid='.$pid);
//echo LODATAHOME.'?pg=api&t='.DATA_TOKEN.'&getAtt='.$attid.'&lang='.$lang.'&pid='.$pid;
    $res = json_decode($homepage,true);
   // print_r($res);
     return $res[0]['value'];

  
}

function get_att_list($id,$lang=false){
      if(!$lang)
        $lang=(is_get('lang') ? is_get('lang') : 'en');
      
      
       $homepage =& $GLOBALS['GET-USER-CACHE']['d']['L'.$id];
     if(!$homepage)
            $homepage = get_content(LODATAHOME.'?pg=api&t='.DATA_TOKEN.'&getAtt='.$id.'&lang='.$lang);
  //print_r($homepage);
    $res = json_decode($homepage,true);
     return $res;

  
}
function get_att_select($id,$selected=''){
     $gender = get_att_list($id);
     $xx ='';
         foreach($gender as $id => $name)
         $xx .= '<option '.($id==$selected ? 'selected' : '').' value="'.$id.'" >'.$name.'</option>';
         return $xx;
}
function get_cate_select($id,$selected=''){
     $gender = get_cate_list($id);
     $xx ='';
         foreach($gender as $id => $name)
         $xx .= '<option '.($id==$selected ? 'selected' : '').' value="'.$id.'" >'.$name.'</option>';
         return $xx;
}


function get_cate_name($id,$lang=false){
    if(is_intorno($id)){
    if($lang===false)
        $lang = (is_get('lang') ? is_get('lang') : 'en');
    
     $catename =& $GLOBALS['GET-USER-CACHE']['d'][$lang]['n'.$id];
     if(!$catename)
     $catename = get_content(LODATAHOME.'?pg=api&t='.DATA_TOKEN.'&getName='.$id.'&lang='.$lang);
    //$res = json_decode($homepage,true);
     return $catename;
    }else{
        return $id;
    }
}

function get_cate_id_byname($id,$lang=false){
    $cateid =& $GLOBALS['GET-USER-CACHE']['d']['i'.$id];
     if(!$cateid)
     $cateid = get_content(LODATAHOME.'?pg=api&t='.DATA_TOKEN.'&getId='.urlencode($id));

     return $cateid;
}
function get_cate_id_byslug($slug,$type = false){
     $cateid =& $GLOBALS['GET-USER-CACHE']['d']['is'.$slug];
     if(!$cateid)
     $cateid = get_content(LODATAHOME.'?pg=api&t='.DATA_TOKEN.'&getIdbslug='.urlencode($slug));

     return $cateid;
}

function get_cate_id($slug,$type = false){
    return get_cate_id_byslug($slug,$type);
}
function get_loc_name($id,$lang=false){
    if(!$lang)
        $lang = is_get('lang');
    if(!$id OR $id==0)
        return 'Unknow Location';
     $homepage = get_content(LODATAHOME.'?pg=api&t='.DATA_TOKEN.'&getLocName='.$id.'&lang='.$lang);
    //$res = json_decode($homepage,true);
     return $homepage;
}





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
