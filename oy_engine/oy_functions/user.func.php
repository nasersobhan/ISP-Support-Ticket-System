<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

///User functions
function user_uid(){
    global $ac;
    if($ac->is_login())
     return $ac->get_uid();
    else
        return 0;
}



function user_ip(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
function user_rank($uid=''){
    if(is_loggedin()){
    global $ac;
    if($uid=='')
        $uid = user_uid();
    return $ac->get_user_info('rank', $uid);
    }else return false;
}
function user_title($uid=''){
    if(is_loggedin()){
    global $ac;
    if($uid=='')
        $uid = user_uid();
    return $ac->get_user_info('title', $uid);
    }else return false;
}


function user_dep($uid=''){
    if(is_loggedin()){
    global $ac;
    if($uid=='')
        $uid = user_uid();
    return $ac->get_user_info('dep', $uid);
    }else return false;
}

function user_site($uid=''){
    if(is_loggedin()){
    global $ac;
    if($uid=='')
        $uid = user_uid();
    return $ac->get_user_info('site', $uid);
    }else return false;
}

function allowByrank($rank){
    if(is_loggedin()){
        $user = user_rank();
        if($user!=$rank){

            echo 'Access Denied!';
            exit();

        }
    }else{
        redirect_to('login');
        exit();
    }
}
function user_type($uid=''){
    if($uid=='')
        $uid = user_uid();
    return user_rank($uid);
}
function access_check_oy($uid=''){
    if($uid=='') $uid = user_uid();
    $acc = user_access(is_get('tbl'),is_get('value'),$uid);
    if($acc==false)
        oy_die('Access Denied!!!');
    else
        return true;
}
function access_check($tbl,$id,$uid=''){
    if($uid=='') $uid = user_uid();
    $acc = user_access($tbl,$id,$uid);
    if($acc==false)
        oy_die('Access Denied!!!','404');
    else
        return true;
}
function user_access($tbl,$id,$uid=''){
    if($uid=='') $uid = user_uid();
    
   if(user_rank($uid)==99)
       return true;
   elseif(post_owner($tbl,$id)==$uid)
       return true;
   else
       return access_role($tbl,$id,$uid);
}



function is_access($tbl,$lvl,$pid=0, $uid=''){
    $res_access = false;
          if($uid=='') 
            if(is_loggedin()){
                $uid = user_uid();
                $user_rank = user_rank($uid);
            }else{
                $uid=0;
                $user_rank=0;
                
            }
        if($user_rank==99)
            $res_access = true;
        elseif($pid==0){         
            $res_access = access_rank($user_rank,$tbl, $lvl);
        }elseif($pid!=0){
            if(post_owner($tbl,$pid)==$uid)
                $res_access = true;
            else
                $res_access = access_rank($user_rank,$tbl, $lvl,$pid);
        }
        if($uid==0 && $user_rank==0 && $lvl!='view')
            $res_access = false;          
        return $res_access;
}
function tbl_access($tbl,$lvl,$pid=0, $uid=''){
    $res_access = is_access($tbl,$lvl,$pid, $uid);
    if(!$res_access){
      oy_die('Access Denied','403');  
    }
}


function access_rank($userrank,$tbl, $lvl,$type=0){
    global $dbase;
    
    $res_access = false;
    $A_tbl = TBL_PIX.'tbl2rank_oy';
    $query = "SELECT tbl_action FROM {$A_tbl} where tbl_rank={$userrank} AND tbl_name='{$tbl}' AND tbl_status=1 AND (tbl_pid={$type} OR tbl_pid=0)";
    $num = $dbase->num_rows($query);
    if($num>0){
        $queryx = $dbase->query($query);
        $row = mysqli_fetch_assoc($queryx);
        $action_type = $row['tbl_action'];
        if($action_type==0)
            $res_access = false;
        else
            $res_access = accesslvl2go($action_type, $lvl);
    }
    return $res_access;
}
function accesslvl2go($type,$lvl){
  // 0 = NOTING
 // 1 = VIEW
 // 2 = VIEW & ADD
 // 3 = VIEW & ADD & EDIT
 // 4 = VIEW & ADD & EDIT & DELETE
 // 5 = VIEW & ADD & EDIT & DELETE & MANAGE
 $lvl = strtolower($lvl);
 switch ($lvl) {
    case 'add':
        $xy = 1;
        break;
    case 'view':
        $xy = 2;
        break;
    case 'edit':
        $xy = 3;
        break;
    case 'delete':
        $xy = 4;
    case 'manage':
        $xy = 5;
        break;
 }
if($type>=$xy) //TYPE = 1 and  $xy = 3
    return true;
else
    RETURN false;
   
}





function access_role($tbl,$id,$uid=''){
    return false;
}
function post_owner($tbl, $id){
    global $dbase;
     $uid_f = get_pre($tbl) . 'uid';
    $tbl = TBL_PIX.$tbl;
    $fld =  $dbase->get_prim_key($tbl);
   // echo $uid_f.'>in '.$tbl;
    if($dbase->field_exist($tbl,$uid_f)){
        //$query = "SELECT {$uid_f} FROM {$tbl} WHERE {$fld}={$id}";
        $value = $dbase->get_single($tbl, $fld, $id, $uid_f);
        return $value;
    }else{
        return false;
    }
}
function user_name_ex($userID){
    $ac = new oy_user($userID);
   $x = $ac->get_name();
   if(!$x)
       $x=$userID;
   return $x;
}
function user_name($echo = true){
    global $user,$ac;
    return (method_exists($user, 'get_name') ?  $user->get_name() . ' ' . $user->get_sname() : $ac->get_info('name', user_uid()));
}
function user_lang($echo = true){
    global $user;
    return $user->get_lang();
}

function set_user_lang($lang){
    global $user;
    return $user->set_lang($lang);
}



function user_username($echo = true){
    global $ac;
    return $ac->get_user_info('user', user_uid());
    ;
}
function user_email(){
    global $ac;
    if($ac->get_uemail())
        return $ac->get_uemail();
}
function user_info($value,$uid=false){
    //$ac->get_user_info('name', user_uid())
    
    
    global $ac;
    if(!$uid)
        $uid = user_uid();
  
        $user = new oy_user($uid);
    // return $user->get_user_info('acc_phone', user_uid());
    return $user->get_info($value,$uid);
}

function acc_info($value){
    //$ac->get_user_info('name', user_uid())
    
    $uid = user_uid();
    global $ac;
  
     return $ac->get_user_info($value,$uid);
    //return $user->get_info($value,$uid);
}


function allow_only($type){
    if(is_array($type)){
        foreach($type as $rank){
            if(user_rank() != $rank)
            oy_die('سطح دسترسی کامل نیست.');
        }
    }
    else {
        if(user_rank() != $type)
        oy_die('سطح دسترسی کامل نیست.');
    }
   

    // global $ac;
    // if(!$ac->is_allowed($type)){
    //     echo 'Access Denied!';
    //     exit();
    // }
}
function get_userIP(){
    return $_SERVER['REMOTE_ADDR'];
}
function def_avatar($echo = true){
    if($echo)
        echo DEF_AVTAR;
    else
        return DEF_AVTAR;
}
function user_avatar_crop($uid, $w = 200){
    

        $us = new oy_user($uid);
        //echo home_url() . '?API=croper&src=' . $us->get_avatar_url() . '&w=' . $w;

    
     echo to_croped($us->get_avatar_url(), $w);
    /*
      $userimg = '';
      $userimg = HOME.'API/avatar/'.$username.'-'.$w.'.jpg';
      if($echo)
      echo $userimg;
      else
      return $userimg; */
}

function user_avatar($uid=''){
    if(empty($uid)){
        $us = new oy_user(user_uid());
        echo $us->get_avatar_url();
    }elseif(!empty($uid)){
        $us = new oy_user($uid);
        echo $us->get_avatar_url();
    }
    /*
      $userimg = '';
      $userimg = HOME.'API/avatar/'.$username.'-'.$w.'.jpg';
      if($echo)
      echo $userimg;
      else
      return $userimg; */
}

function user_photo($uid=''){
     if(empty($uid)){
        $us = new oy_user(user_uid());
        return $us->get_avatar_url();
    }elseif(!empty($uid)){
        $us = new oy_user($uid);
        return $us->get_avatar_url();
    }  
}

function is_loggedin(){
    global $ac;
    return $ac->is_login();
}


function user_regtime(){
    global $ac;
    return $ac->get_user_info('time',user_uid());
}
function loginrequired(){
    global $ac;
    $ac->login_req();
}



function check_premission($label){
    $uid = user_uid();
    $rank = user_rank();
    $dep = user_dep();
    $allow = [];
    if($rank == 99)
        return true;
    if($rank == 3){
        if($dep == get_setting('techdep')){
            $allow = ['ticket-add' , 'ticket-view', 'ticket-edit','ticket-list','ticket-manage','ticket-close'];
        }
        if($dep == get_setting('salesdep')){
            $allow = ['customer-add' , 'customer-view', 'customer-edit','customer-list','customer-other','customer-manage'];  
        }
    }
    elseif ($rank == 2){
        if($dep == get_setting('techdep')){
            $allow = ['ticket-add' , 'ticket-view', 'ticket-edit','ticket-list'];
        }
        if($dep == get_setting('salesdep')){
            $allow = ['customer-add' , 'customer-view', 'customer-edit','customer-list'];  
        }
    }
    if(in_array($label, $allow)){
        return true;
    }
    global $dbase,$premissions;
    if(isset($premissions[$label]))
        return $premissions[$label];
    else 
        $premissions[$label] = intval($dbase->num_rows("SELECT * From sob_permissions WHERE per_label = '{$label}' AND per_uid={$uid}"));
    
   return ($premissions[$label] == 0 ? false : true);
}

function ifhave_premssion($label){
    if(!check_premission($label))
        oy_die('شما اجازه ندارید.');
}