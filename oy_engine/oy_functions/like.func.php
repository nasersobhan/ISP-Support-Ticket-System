<?php


////Social
load_jsplug('like');

function is_like($pid,$url=''){
   if(is_loggedin()){
    global $dbase;
    $uid = user_uid();
     $atbl = TBL_PIX. 'like';
     
     if($url==''){
         $x = explode('-',$pid);
         $pid = $x[1]; $url = $x[0];
     }
    if($dbase->check_duplicate_m($atbl, " lik_uid={$uid} AND lik_url='{$url}' AND lik_pid='{$pid}'"))
        return true;
    else
        return false;
   }else return false;
}

function like_count($pid,$url=''){
    global $dbase;

     $atbl = TBL_PIX. 'like';
 //return 
     
      if($url==''){
         $x = explode('-',$pid);
         $pid = $x[1]; $url = $x[0];
     }
     $count = $dbase->num_rows("Select * from {$atbl} where  lik_url='{$url}' AND lik_pid='{$pid}' ");
     if($count>0)
        return '<i class="glyphicon glyphicon-heart text-danger"></i> '.  g_lbl('like').' ('.$count.')';
     else
       return '<i class="glyphicon glyphicon-heart text-danger"></i> '.  g_lbl('like');  
}

function like_btn($url,$type='ext'){
    if(is_loggedin()){
        if(is_like($url)){
            $var = '<like class="text-success finger" lk-id="'.$url.'" lk-type="'.$type.'">'.like_count($url).'</like>';
        }else{
            $var = '<like class="text-danger finger" lk-id="'.$url.'" lk-type="'.$type.'">'.like_count($url).'</like>';
        }
    }else
        $var = '<span class="text-success" lk-id="'.$url.'" lk-type="'.$type.'">'.like_count($url).'</span>';
    
    return $var;
}

function is_bookmarked($pid,$url=''){
    global $dbase;
    $uid = user_uid();
     $atbl = TBL_PIX. 'bookmarks';
     if($url==''){
         $x = explode('-',$pid);
         $pid = $x[1]; $url = $x[0];
     }
         
    if($dbase->check_duplicate_m($atbl, " boo_uid={$uid} AND boo_url='{$url}' AND boo_pid='{$pid}' "))
        return true;
    else
        return false;
}

function is_followed($pid,$url=''){
    global $dbase;
    $uid = user_uid();
     $atbl = TBL_PIX. 'follow';
     if($url==''){
         $x = explode('-',$pid);
         $pid = $x[1]; $url = $x[0];
     }
         
    if($dbase->check_duplicate_m($atbl, " fol_uid={$uid} AND fol_url='{$url}' AND fol_pid='{$pid}' "))
        return true;
    else
        return false;
}
