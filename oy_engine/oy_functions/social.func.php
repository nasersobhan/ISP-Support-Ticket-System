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
    $uid = (user_uid() ? user_uid() : 0) ;
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


function is_polled($pid,$cid=false){
    global $dbase;
      $atbl = TBL_PIX. 'follow';
        $uid = user_uid();
        $where='';
        if($cid)
            $where = " AND fol_url='".$cid."' ";
   // $qu = "select * from ".$tblff." where fol_pid='".$datax['fol_pid']."' AND fol_type='poll'";
  if($dbase->check_duplicate_m($atbl, " fol_status=1  AND fol_uid={$uid} AND fol_pid='".$pid."' AND fol_type='poll' {$where}"))
        return true;
    else
        return false;
}


function is_yesno($pid,$cid=false){
    global $dbase;
      $atbl = TBL_PIX. 'follow';
        $uid = user_uid();
        $where='';
        if($cid)
            $where = " AND fol_url='".$cid."' ";
   // $qu = "select * from ".$tblff." where fol_pid='".$datax['fol_pid']."' AND fol_type='poll'";
  if($dbase->check_duplicate_m($atbl, " fol_status=1  AND fol_uid={$uid}  AND fol_pid='".$pid."' AND fol_type='yesno' {$where}"))
        return true;
    else
        return false;
}
function un_yesno($pid,$cid=false){
    global $dbase;
      $atbl = TBL_PIX. 'follow';
        $uid = user_uid();
        $where='';
        if($cid)
            $where = " AND fol_url='".$cid."' ";
   // $qu = "select * from ".$tblff." where fol_pid='".$datax['fol_pid']."' AND fol_type='poll'";
  $val = ($dbase->RowUpdate($atbl,array('fol_status'=>0), " fol_status=1  AND fol_uid={$uid} AND fol_pid='".$pid."' AND fol_type='yesno' {$where}"));
    return true;
}

function yesno_count($pid,$cid=false){
    global $dbase;
      $atbl = TBL_PIX. 'follow';
        $uid = user_uid();
        $where='';
        if($cid)
            $where = " AND fol_url='".$cid."' ";
         $count = $dbase->num_rows("Select * from {$atbl} where fol_status=1  AND  fol_pid='".$pid."'  AND fol_type='yesno' {$where}");
   // $qu = "select * from ".$tblff." where fol_pid='".$datax['fol_pid']."' AND fol_type='poll'";
  //if($dbase->check_duplicate_m($atbl, " "))
        return $count;
    //else
       // return false;
}

function un_poll($pid,$cid=false){
    global $dbase;
      $atbl = TBL_PIX. 'follow';
        $uid = user_uid();
        $where='';
        if($cid)
            $where = " AND fol_url='".$cid."' ";
   // $qu = "select * from ".$tblff." where fol_pid='".$datax['fol_pid']."' AND fol_type='poll'";
  $val = ($dbase->RowUpdate($atbl,array('fol_status'=>0), " fol_status=1  AND fol_uid={$uid} AND fol_pid='".$pid."' AND fol_type='poll' {$where}"));
    return true;
}

function poll_count($pid,$cid=false){
    global $dbase;
      $atbl = TBL_PIX. 'follow';
        $uid = user_uid();
        $where='';
        if($cid)
            $where = " AND fol_url='".$cid."' ";
         $count = $dbase->num_rows("Select * from {$atbl} where fol_status=1  AND fol_pid='".$pid."'  AND fol_type='poll' {$where}");
   // $qu = "select * from ".$tblff." where fol_pid='".$datax['fol_pid']."' AND fol_type='poll'";
  //if($dbase->check_duplicate_m($atbl, " "))
        return $count;
    //else
       // return false;
}
