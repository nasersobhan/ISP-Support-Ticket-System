<?php
define('ACC_LOURL','https://a.ooyta.com/');
//print_r($_SESSION[UKEY]);
function get_userData($id=false){
    if(is_loggedin() AND !$id)
        $id = user_uid();
        
         $homepage =& $GLOBALS['GET-USER-CACHE']['data'.$id];
        // if(!$homepage)
            $homepage = get_content(ACC_LOURL.'?pg=api&t='.AC_TOKEN.'&getData='.$id);
         $res = json_decode($homepage,true);
         return $res;
    
    //return false;
}




function uidbyuname($uname){
    
    
         
    $homepage =& $GLOBALS['GET-USER-CACHE']['uidbyun'.$uname];
     if(!$homepage)
        $homepage = get_content(ACC_LOURL.'?pg=api&t='.AC_TOKEN.'&getUidbyun='.$uname);

       return trim($homepage);
}


function user_uid(){
    if(is_loggedin())
        return user_identity();
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
    
    if($uid=='')
        $uid = user_uid();
    
    if(is_loggedin()){
        $urs = get_userData($uid);
        return $urs['rank'];
    }else return false;
}
function allow_only($type){
//    global $ac;
//    if(!$ac->is_allowed($type)){
//        echo 'Access Denied!';
//        exit();
//    }
    allowByrank($type);
}
function allowByrank($rank){
    if(is_loggedin()){
        $user = user_rank(user_uid());
        if($user!=$rank){

            oy_die('Access Denied!!! ',403);
            exit();

        }
    }else{
         oy_die('You Must Login to access to this page!!! ',403);
        //redirect_to('login');
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
    if($userID==0 OR is_intorno($userID)==false){
        return 'Unknow User';
    }
     
    $homepage =& $GLOBALS['GET-USER-CACHE']['Uname'.$userID];
     if(!$homepage)
        $homepage = get_content(ACC_LOURL.'?pg=api&t='.AC_TOKEN.'&getName='.$userID);

       return $homepage;


}
function user_name($uid = false){
    
    
//    if(!$uid)
        $uid = user_uid();
      if($uid==0 OR is_intorno($uid)==false){
        return 'Unknow User';
    }
      $urs = get_userData($uid);
        return $urs['name'];
//    global $user,$ac;
//    return (method_exists($user, 'get_name') ?  $user->get_name() . ' ' . $user->get_sname() : $ac->get_info('name', user_uid()));
}
function user_lang($echo = true){
    $urs = get_userData(user_uid());
        return $urs['lang'];
//    global $user;
//    return $user->get_lang();
}

function set_user_lang($lang){
//    global $user;
//    return $user->set_lang($lang);
}



function user_username($echo = true){
    
    $urs = get_userData(user_uid());
        return $urs['username'];
    
//    global $ac;
//    return $ac->get_user_info('user', user_uid());
//    ;
}
function user_email(){
    
    $urs = get_userData(user_uid());
        return $urs['email'];
//    global $ac;
//    if($ac->get_uemail())
//        return $ac->get_uemail();
}
function user_info($value,$uid=false){
    //$ac->get_user_info('name', user_uid())
    
    
 
   // global $ac,$user;
    if(!$uid)
        $uid = user_uid();
  $urs = get_userData($uid);
        //$user = new oy_user($uid);
    // return $user->get_user_info('acc_phone', user_uid());
    return $urs[$value];
}

function acc_info($value){
    //$ac->get_user_info('name', user_uid())
//    
//    $uid = user_uid();
//    global $ac;
//  
//     return $ac->get_user_info($value,$uid);
    //return $user->get_info($value,$uid);
}



function get_userIP(){
    return getUserIP();
}
function def_avatar($echo = true){
    if($echo)
        echo DEF_AVTAR;
    else
        return DEF_AVTAR;
}



function get_user_thumb($uid,$w,$h){
     $urs = get_userData($uid);
    $id =$urs['avatarid'] ;
    $url = get_thumb($id,$w,$h); //MEDIAHOME.'img/'.$id.'-'.$w.'-'.$h.'.jpg';
    return $url;
}
function user_avatar_crop($uid, $w = 200, $h=200){
    
global $user;
      //  $us = new oy_user($uid);
        //echo home_url() . '?API=croper&src=' . $us->get_avatar_url() . '&w=' . $w;

     $urs = get_userData($uid);
       // return $urs['avatar'];
    // echo get_thumb($urs['avatar'], $w,$h);
    /*
      $userimg = '';
      $userimg = HOME.'API/avatar/'.$username.'-'.$w.'.jpg';
      if($echo)
      echo $userimg;
      else
      return $userimg; */
}
function user_cover($uid=false){
    if(!$uid)
        $uid = user_uid();
     $urs = get_userData($uid);
    return $urs['cover'];
}
function user_avatar($uid=false,$w=false,$h=false){
    if(!$uid)
        $uid = user_uid();
    
    
     $urs = get_userData($uid);
     if($w)
         $res = get_thumb($urs['avatarid'], $w, $h);
     else
        $res = $urs['avatar'];
    return $res;
}

function user_photo($uid=''){
  return user_avatar($uid);
}
function is_login(){
    return is_loggedin();
}

function user_identity(){  
 
    if(isset($_SESSION[UKEY]['session'])){
      
        $time = (isset($_SESSION[UKEY]['activetime']) ? $_SESSION[UKEY]['activetime'] : 0);
        $islogin= (isset($_SESSION[UKEY]['uidx']) ? $_SESSION[UKEY]['uidx'] : false);
        $id = $_SESSION[UKEY]['session'];
        
        if(((time() - $time) > 300) OR !$islogin){
            $_SESSION[UKEY]['uidx'] = intval (get_content(ACC_LOURL.'?pg=api&t='.AC_TOKEN.'&sekey='.$id));
            $_SESSION[UKEY]['activetime'] =time();
            return $_SESSION[UKEY]['uidx'];
        }else
            return $_SESSION[UKEY]['uidx'];
        }else
            return false;

}
function is_loggedin(){
  //  if(!isset($_SESSION[UKEY]['islogin']))
       // $_SESSION[UKEY]['islogin'] = 
    if(user_identity())
        return true;
    else
    return false;
    
//     if(isset($_SESSION[UKEY]['islogin'])){
//      
//        $time = (isset($_SESSION[UKEY]['activetime']) ? $_SESSION[UKEY]['activetime'] : 0);
//      //() - $_SESSION['login_time'] > 600
//        if((time() - $_SESSION[UKEY]['activetime']) > 300){
//          
//        }
//           return $_SESSION[UKEY]['islogin'];
//
//        }else{
//            $_SESSION[UKEY]['activetime'] = (time());
          //  return user_identity();// $_SESSION[UKEY]['islogin'];
            
        //}
}


function user_regtime(){
//    global $ac;
//    return $ac->get_user_info('time',user_uid());
}
function loginrequired($red=false){
  if(!is_loggedin()){
      if($red)
        $_SESSION['redirectorx'] =  $red;
      
      if(!isset($_SESSION['redirect']))
            $_SESSION['redirect'] =  PORT.'://'.getDomain(HOME).$_SERVER['REQUEST_URI'];// get_current_url();
   // ac_link('login')
   // echo 'redirecting to '.get_link('login');
  //exit();
  //sleep(10);
      header("Location: ".get_link('login'));
  //  echo   redirect_to(get_link('login','log','in'),true);
    exit();
  }
}

function ac_link($name = ''){
  //return ACCHOME;
  $lang = is_get('lang') ? is_get('lang') : 'en' ;
        $BaseURL = ACCHOME;
        switch ($name) {
            case 'login':
               $retun = $BaseURL.$lang.'/login';
                break;
            case 'register':
                 $retun =  $BaseURL.$lang.'/register';
                break;
            case 'logout':
                $retun =  $BaseURL.$lang.'/logout';
                break;
            case 'settings':
                $retun =  $BaseURL.$lang.'/settings';
                break;
             case 'lost':
                $retun =  $BaseURL.$lang.'/lost';
                break;
             case 'profile':
                $retun =  $BaseURL.$lang.'/profile';
                break;
            case 'rconfi':
                $retun =  $BaseURL.$lang.'/rconfi';
                break;
             case 'fb':
                $retun =  $BaseURL.'?API=loginfb'.(is_get('red') ? '&red'.is_get('red') :'');
                break;
            default:
                $retun =  $BaseURL.'';
        }
        
        return $retun;
}