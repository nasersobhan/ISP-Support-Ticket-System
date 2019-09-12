<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of account
 *
 * @author Na3er
 */
//class_include("crypto");

class oy_accounts{

    private $tbl_history;
    private $tbl_account;
    private $Fpix;
    private $acc_user = "user";
    private $acc_email = "email";
    private $acc_password = "password";
    private $acc_phone = "phone";
    private $acc_token = "token";
    private $acc_status = "status";
    private $acc_rank = "rank";
    private $acc_primkey = "id";
    private $acc_name = "name";
    private $messages = array();
    private $is_loggedIn = false;
    private $sessionkey = UKEY;
    private $error=false;
    //intials
    function __construct($arr){
        global $dbase;
        $this->tbl_account = $arr["TBL"];
        $this->Fpix = $arr["FPX"];
        $this->tbl_history = TBL_PIX . "historyuser_oy";
        $this->sessionkey = UKEY;
                       
        if(isset($_SESSION[$this->sessionkey]['user_logged_in']) AND  $_SESSION[$this->sessionkey]['user_logged_in']== 1){
           if($this->string_validator($_SESSION[$this->sessionkey]['string_val'], 'S'))
                $this->is_loggedIn = true;
        }else{
                $this->is_loggedIn = false;
        }
      
    }

    //login
    public function is_login(){

        if($this->is_loggedIn)
            return true;
        else
            return false;
    }

     public function get_primkey(){
        return $this->Fpix.$this->acc_primkey;
    }
    public function get_tokenkey(){
        return $this->Fpix.$this->acc_token;
    }
    public function get_statuskey(){
        return $this->Fpix.$this->acc_status;
    }
    public function get_tblname(){
        return $this->tbl_account;
    }
    public function do_logout(){
        global $dbase;
        $this->loginhistory($this->get_uid(), 0,$_SESSION[$this->sessionkey]['user_session']);
        $this->deleteRememberMeCookie();

        $dbase->query("UPDATE " . $this->tbl_account . " SET " . $this->Fpix . $this->acc_token . " = 0 WHERE " . $this->Fpix . $this->acc_primkey . " ='" . $this->get_uid() . "'");
        $this->user_is_logged_in = false;
        //$_SESSION = array();

        unset($_SESSION[$this->sessionkey]['user_id']);
        unset($_SESSION[$this->sessionkey]['user_name']);
        unset($_SESSION[$this->sessionkey]['user_email']);
        unset($_SESSION[$this->sessionkey]['user_logged_in']);
        unset($_SESSION[$this->sessionkey]['string_val']);
        unset($_SESSION);

        $this->is_loggedIn = false;
        session_destroy();
        $this->messages[] = "logged out";
        return true;
    }

    public function login_req(){
        $_SESSION[$this->sessionkey]['redirector'] = get_current_url();
        if(!$this->is_login()){
            redirect_to('login');
        }
    }
    public function changePWD($old,$new,$uid=''){
        global $dbase;
        if($uid=='')
            $uid = $this->get_uid();
        if($this->qualifyPWD($new)){
            if($this->chkPWD($uid,$old)){
               
                $data[$this->Fpix . $this->acc_password] = $this->passencrypt($new);
                $data[$this->Fpix . $this->acc_token] = sha1(uniqid(mt_rand(), true));
                $dbase->RowUpdate($this->tbl_account, $data, " WHERE ".$this->Fpix.$this->acc_primkey."={$uid}");
                $this->error = false;
               // $res = 'success';

            }else{
                $this->error = 'Current Password is not Correct';
                //$res = 'Password Not Matched';
            }
        }else
            $this->error = 'New password not strong enogh';
       return $this->result('Password Changed'); 
    }
    
      public function changeEML($old,$new,$uid=''){
        global $dbase;
        if($uid=='')
            $uid = $this->get_uid();
        if(check_email_address($new)){
            if($this->chkPWD($uid,$old)){
               
                $data[$this->Fpix . $this->acc_email] =$new;
                $data[$this->Fpix . $this->acc_token] = sha1(uniqid(mt_rand(), true));
                $dbase->RowUpdate($this->tbl_account, $data, " WHERE ".$this->Fpix.$this->acc_primkey."={$uid}");
                $this->error = false;
               // $res = 'success';

            }else{
                $this->error = 'Password is not Correct';
                //$res = 'Password Not Matched';
            }
        }else
            $this->error = 'New Email not Valid';
       return $this->result('Email Changed'); 
    }
    
  
    
    private function result($reslut=true){
        if(!$this->error)
            return $reslut;
        else
           return $this->error; 
        
    }
    private function chkPWD($uid,$pass){
      global $dbase;
      $user_name =  $this->get_user_info('email', $uid);// $this->getUserData($uid);
      $qu = "SELECT * FROM " . $this->tbl_account . " WHERE " . $this->Fpix . $this->acc_email . " = '{$user_name}' AND " . $this->Fpix . $this->acc_password . " = '" . $this->passencrypt($pass) . "'";
      $num = $dbase->num_rows($qu);
  //  echo $qu ;
      if($num ==1)
        return true;
    else
        return false;
    }

    public function do_login($user_name, $user_password, $user_rememberme = false){

        global $dbase;
        $result = 'Success';
        if(empty($user_name)){
            $result = 'Please enter your email or username';
        }else if(empty($user_password)){
            $result = 'Please enter your password';

            // if POST data (from login form) contains non-empty user_name and non-empty user_password
        }else{
            // user can login with his username or his email address.
            // if user has not typed a valid email address, we try to identify him with his user_name
            
              $data = $this->getUserData($user_name);
             
          
//              if(!filter_var($user_name, FILTER_VALIDATE_EMAIL)){
//                $user_name = $data[$this->Fpix . $this->acc_email];
//            }


//            if($dbase){
//                // database query, getting all the info of the selected user
//                $query_user = $dbase->fetch_row("SELECT * FROM " . $this->tbl_account . " WHERE " . $this->Fpix . $this->acc_email . " = '{$user_name}' ");//and " . $this->Fpix . $this->acc_password . " = '" . $this->passencrypt($user_password) . "'");
//                $result_row = $query_user;
//            }

            // if this user not exists
              
            if($data){
              
            $uid = $data[$this->Fpix . $this->acc_primkey];
            
            
            if($check_3times = false){
                $result = "Your IP ".$_SERVER['REMOTE_ADDR']." has been banned. 3 Invalid Login Attempts";
                // using PHP 5.5's password_verify() function to check if the provided passwords fits to the hash of that user's password
            }else if(!$this->passencrypt($user_password) == $data[$this->Fpix . $this->acc_password]){
                // increment the failed login counter for that user
                $result = 'Password wrong';
                $this->loginhistory($uid, $result);


                // has the user activated their account with the verification email
            }else if($data[$this->Fpix . $this->acc_status] != 1){
                $result = "Username is not active";
            }else{


                if($this->passencrypt($user_password) == $data[$this->Fpix . $this->acc_password]){
                    $this->logInAction($data);
                    if(($user_rememberme)){
                        $this->newRememberMeCookie();
                    }else{
                        $this->deleteRememberMeCookie();
                    }

                    if(isset($_SESSION[$this->sessionkey]['redirector']) && !empty($_SESSION[$this->sessionkey]['redirector']))
                        redirect_to($_SESSION[$this->sessionkey]['redirector']); unset($_SESSION[$this->sessionkey]['redirector']);
                }
                else{
                    $result = 'Password wrong';
                    $this->loginhistory($uid, $result);
                }
            }
            
            
             }else{
                   $result = "Faild Login";
                $this->loginhistory('', $result);
             }
        }
        return $result;
    }

    private function logInAction($result_row){
        global $dbase;
        if($result_row){
            

            // write user data into PHP SESSION [a file on your server]
            $_SESSION[$this->sessionkey]['user_id'] = $result_row[$this->Fpix . $this->acc_primkey];
            $_SESSION[$this->sessionkey]['user_name'] = $result_row[$this->Fpix . $this->acc_user];
            $_SESSION[$this->sessionkey]['user_email'] = $result_row[$this->Fpix . $this->acc_email];
            $_SESSION[$this->sessionkey]['dep'] = $result_row[$this->Fpix . 'dep'];
            $_SESSION[$this->sessionkey]['site'] = $result_row[$this->Fpix . 'site'];
            $_SESSION[$this->sessionkey]['title'] = $result_row[$this->Fpix . 'title'];
            $_SESSION[$this->sessionkey]['user_logged_in'] = 1;
           
            // declare user id, set the login status to true
            $this->user_id = $result_row[$this->Fpix . $this->acc_primkey];
            $this->user_name = $result_row[$this->Fpix . $this->acc_user];
            $this->user_email = $result_row[$this->Fpix . $this->acc_email];
            $this->user_rank = $result_row[$this->Fpix . $this->acc_rank];
            // $this->user_is_logged_in = true;
            $random_token_string = hash('sha256', mt_rand());
            $_SESSION[$this->sessionkey]['rnd'] = md5(HOME);
            
               $cookie_string_first_part = $result_row[$this->Fpix . $this->acc_primkey] . ':' . $random_token_string;
            $cookie_string_hash = hash('sha256', $cookie_string_first_part . COOKIE_SECRET_KEY);
            $cookie_string = $cookie_string_first_part . ':' . $cookie_string_hash;

             $_SESSION[$this->sessionkey]['user_session'] = md5($cookie_string);
            
            
            $_SESSION[$this->sessionkey]['string_val'] = $cookie_string;
            
              $this->loginhistory($result_row[$this->Fpix . $this->acc_primkey], 1,md5($cookie_string));
            
            
            $dbase->query("UPDATE " . $this->tbl_account . " SET " . $this->Fpix . $this->acc_token . " = '{$random_token_string}' WHERE " . $this->Fpix . $this->acc_primkey . " =" . $result_row[$this->Fpix . $this->acc_primkey] . ";");
          

            return true;
        }else
            return false;
    }

    private function loginhistory($uid, $type,$session=""){
        global $dbase;
        $info = array();
        $info['his_uid'] = (empty($uid) ? 0 : $uid);
        $info['his_pass'] = $type;
        $info['his_ip'] = $_SERVER['REMOTE_ADDR'];
       
        $info['his_ossystem'] = $this->getOS($_SERVER['HTTP_USER_AGENT']);
        $info['his_browser'] = $this->getBrowser($_SERVER['HTTP_USER_AGENT']);
        $info['his_refurl'] = (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '');
        $info['his_sessionkey'] = $session;
        $dbase->RowInsert($this->tbl_history, $info);
    }

    //register
private function qualifyPWD($PWD){
   
    if(strlen($PWD) < 6)
         $this->error = "Password must be longer then 6 characters.";
    
   return $this->result();
}
    public function do_register($data_arr,$data=''){
        global $dbase, $sysmessage;
        //$data_arr = array();

        $pUsername = $data_arr['uname'];
        $pPassword = $data_arr['password'];
        $pPasswordConfirm = $data_arr['passwordre'];
        $email = $data_arr['email'];
        $name = $data_arr['fullname'];
        $phone = (isset($data_arr['phone']) ? $data_arr['phone'] : 0);
        $rank = (isset($data_arr['rank']) ? $data_arr['rank'] : 1);

        $dep = (isset($data_arr['dep']) ? $data_arr['dep'] : 0);
        $site = (isset($data_arr['site']) ? $data_arr['site'] : 0);
        $title = (isset($data_arr['title']) ? $data_arr['title'] : '');

        $result = "Success";
        if(!check_email_address($email))
            $result = 'Email not valid2 ' . $email;
        if(!check_required_field($pPassword))
            $result = 'Please Enter a password';
        if(!check_required_field($pPasswordConfirm))
            $result = 'Please Enter a password confirmation';
        if(!check_required_field($pUsername))
            $result = 'Please Enter a username';
        //if(!check_required_field($dob))
        //$result ='Please Enter a Date of birth';
        if($dbase->check_duplicate($pUsername, $this->tbl_account, $this->Fpix . $this->acc_user))
            $result = "Please Try another Username!";
        if($dbase->check_duplicate($email, $this->tbl_account, $this->Fpix . $this->acc_email))
            $result = "this is email already registerd with us!";
        if(strlen($pUsername) <= 4 || strlen($pUsername) >= 30)
            $result = "Username must be between 4 and 11 characters.";
        if(strlen($pPassword) < 6)
            $result = "Password must be longer then 6 characters.";
        if($pPassword !== $pPasswordConfirm)
            $result = "Passwords does not mach";
        if(!preg_match('/^[a-z\d]{2,64}$/i', $pUsername))
            $result = "Username invalid";
        if($phone != ''){
            $phone = str_replace("+", "00", $phone);
            $phone = str_replace("-", "", $phone);
            $phone = str_replace("(0)", "0", $phone);
            $phone = str_replace(" ", "", $phone);
        }


        if($result == "Success"){

            $hash_cost_factor = (defined('HASH_COST_FACTOR') ? HASH_COST_FACTOR : 5);
            $data = [];

            $data[$this->Fpix . $this->acc_user] = strtolower($pUsername);
            $data[$this->Fpix . 'dep'] = $dep;
            $data[$this->Fpix . 'site'] = $site;
            $data[$this->Fpix . 'title'] = $title;

            //$data[$this->Fpix.$this->acc_password] =($pPassword);
            $data[$this->Fpix . $this->acc_email] = ($email);
            $data[$this->Fpix . $this->acc_phone] = ($phone);
            //$data['ac_regip'] = '195.154.14.12';
            $data[$this->Fpix . $this->acc_password] = $this->passencrypt($pPassword);
            // generate random hash for email verification (40 char string)
            $data[$this->Fpix . $this->acc_token] = sha1(uniqid(mt_rand(), true));
            $data[$this->Fpix . $this->acc_rank] = $rank;
            $data[$this->Fpix . $this->acc_name] = $name;


            if($dbase->RowInsert($this->tbl_account, $data)){
                 $uinfo['inf_id'] = $dbase->lastinserted_id(); 
                  $uinfo['inf_name'] = $name;
                  $uinfo['inf_email'] = $email;
                 // $uinfo['inf_dob'] = date("Y-m-d",strtotime($dob));
                  $uinfo['inf_phone'] = $phone;
                  $tbl = TBL_PIX.'infouser_oy';
                  //$dbase->RowInsert('ac_member_stat',array('uid'=>$uinfo['uid'], 'activeness'=>'100'));
                  $dbase->RowInsert($tbl,$uinfo);
                  //$dbase->RowUpdate('acc_list_temp',array('lte_status'=>'1',), "where lte_email='{$email}'");
                  
                  $token = $this->get_user_info('token', $uinfo['inf_id']);
                  $aclink = get_link('account', 'user', 'var').'&id='.$uinfo['inf_id'].'&ref='.$token;
                $etitle = 'Welcome to Ooyta '.$name.'!';
                $body = '<h1> Welcme to Ooyta!</h1>'
                        . '<p> Dear '.$name.' We are welcoming you to ooyta System. <br/>'
                        . '<b>User information:</b><br/>'
                        . 'username: '.$pUsername.'<br/>'
                        . 'password: '.$pPassword.'<br/>'
                        . '<b>Account Activation:</b><br/>'
                        . 'To active your account Please click below link<br/>'
                        . '<a href="'.$aclink.'" >'.$aclink.'</a>'
                        . '<br/> thank you <br/> Ooyta Team <br/> info@ooyta.com <br/> www.ooyta.com </p>'
                        . '';
                $ax['{BODY}']=$body;
                $ax['{title}']=$etitle;
                $ax['{FOOTER}']='Sent by Ooyta Job Portal, Register';
                $body = get_template('application'.DIRECTORY_SEPARATOR.'email',$ax);
            
                
                
                
                if(send_mail($email,$name,$etitle,$body,'no-replay@ooyta.com','Ooyta Team'))
                return "Success";
                else
                  return "Email not Sent"; 
            }

            //$dbase->query("INSERT INTO ac_member_login(email, user, randkey, status) VALUES ('{$email}','{$name}','{$randkey}',0)");
            //sendEmail($email,array[''=>,'','',''],$template);
        }else
            return $result;
    }

    //cookie
    public function cookie_login(){

        if(isset($_COOKIE["rememberme"])){


            if($this->string_validator($_COOKIE["rememberme"], 'C')){

                $value = $_COOKIE["rememberme"];
                $vals = explode(":", $value);
                $myresult = $this->getUserDatabyID($vals[0]);
                $this->logInAction($myresult);
            }
        }
    }

    private function newRememberMeCookie(){
        // if database connection opened
        global $dbase;
        if($dbase){
            // generate 64 char random string and store it in current user data
            $random_token_string = hash('sha256', mt_rand());
            $sth = $dbase->query("UPDATE " . $this->tbl_account . " SET " . $this->Fpix . $this->acc_token . " = '{$random_token_string}' WHERE " . $this->Fpix . $this->acc_primkey . " ='" . $_SESSION[$this->sessionkey]['user_id'] . "'");

            // generate cookie string that consists of userid, randomstring and combined hash of both
            $cookie_string_first_part = $_SESSION[$this->sessionkey]['user_id'] . ':' . $random_token_string;
            $cookie_string_hash = hash('sha256', $cookie_string_first_part . COOKIE_SECRET_KEY);
            $cookie_string = $cookie_string_first_part . ':' . $cookie_string_hash;

            // set cookie
            setcookie('rememberme', $cookie_string, time() + COOKIE_RUNTIME, "/");
            return $cookie_string;
        }
    }

    /**
     * Delete all data needed for remember me cookie connection on client and server side
     */
    private function deleteRememberMeCookie(){
        // if database connection opened
        global $dbase;
        if($dbase){
            // Reset rememberme token
            //$sth = $dbase->query("UPDATE ".$this->tbl_name." SET ".$this->token." = 0 WHERE ".$this->uid." ='".$_SESSION[$this->sessionkey]['user_id']."'");
        }

        // set the rememberme-cookie to ten years ago (3600sec * 365 days * 10).
        // that's obivously the best practice to kill a cookie via php
        // @see http://stackoverflow.com/a/686166/1114320
        //setcookie('rememberme', false, time() - (3600 * 3650), '/');
    }

    //priviliage
    function is_allowed(){
        
    }

    public function allow_these($types){
        if($this->is_login()){
            if($this->get_user_info('rank', $this->get_uid()) == $types)
                return true;
            else
                return false;
        }else
            return false;
    }

    //updates
    //history
    //get info
    public function get_uid(){
        if($this->is_login())
            return $_SESSION[$this->sessionkey]['user_id'];
        else
            return false;
    }

    public function get_user_info($feild, $id){
        global $dbase;
        if($dbase){
            $xx = $dbase->get_single($this->tbl_account, $this->Fpix . $this->acc_primkey, $id, $this->Fpix . $feild);
            return $xx;
        }else{
            return false;
        }
    }

    private function getUserData($user_name){
        // if database connection opened
        global $dbase;
        if($dbase){
            if(!filter_var($user_name, FILTER_VALIDATE_EMAIL))
                return $dbase->fetch_row("SELECT * FROM " . $this->tbl_account . " WHERE " . $this->Fpix . $this->acc_user . " = '{$user_name}'");
            else
                return $dbase->fetch_row("SELECT * FROM " . $this->tbl_account . " WHERE " . $this->Fpix . $this->acc_email . " = '{$user_name}'");
        } else{
            return false;
        }
    }

    function getOS($user_agent){

        /*   $user_agent = $_SERVER['HTTP_USER_AGENT'];; */

        $os_platform = "Unknown OS Platform";
//Windows NT 10.0;  Windows NT 6.1
        $os_array = array(
            '/windows nt 10.0/i' => 'Windows 10',
            '/windows nt 6.3/i' => 'Windows 8.1',
            '/windows nt 6.2/i' => 'Windows 8',
            '/windows nt 6.1/i' => 'Windows 7',
            '/windows nt 6.0/i' => 'Windows Vista',
            '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
            '/windows nt 5.1/i' => 'Windows XP',
            '/windows xp/i' => 'Windows XP',
            '/windows nt 5.0/i' => 'Windows 2000',
            '/windows me/i' => 'Windows ME',
            '/win98/i' => 'Windows 98',
            '/win95/i' => 'Windows 95',
            '/win16/i' => 'Windows 3.11',
            '/macintosh|mac os x/i' => 'Mac OS X',
            '/mac_powerpc/i' => 'Mac OS 9',
            '/linux/i' => 'Linux',
            '/ubuntu/i' => 'Ubuntu',
            '/iphone/i' => 'iPhone',
            '/ipod/i' => 'iPod',
            '/ipad/i' => 'iPad',
            '/android/i' => 'Android',
            '/blackberry/i' => 'BlackBerry',
            '/webos/i' => 'Mobile'
        );

        foreach($os_array as $regex => $value){

            if(preg_match($regex, $user_agent)){
                $os_platform = $value;
            }
        }

        return $os_platform;
    }

    function getBrowser($user_agent){

//$user_agent = $_SERVER['HTTP_USER_AGENT'];;

        $browser = "Unknown Browser";

        $browser_array = array(
            '/msie/i' => 'Internet Explorer',
            '/firefox/i' => 'Firefox',
            '/safari/i' => 'Safari',
            '/chrome/i' => 'Chrome',
            '/opera/i' => 'Opera',
            '/netscape/i' => 'Netscape',
            '/maxthon/i' => 'Maxthon',
            '/konqueror/i' => 'Konqueror',
            '/mobile/i' => 'Handheld Browser'
        );

        foreach($browser_array as $regex => $value){

            if(preg_match($regex, $user_agent)){
                $browser = $value;
            }
        }

        return $browser;
    }

    // Encryption Side
    private function string_validator($string, $type = 'S'){
        global $dbase;
        $string2 = $string;
        $str = explode(":", $string2);
        $id = $str[0];
        $mainkey = $str[1];

        $hash = hash('sha256', $id . ':' . $mainkey . COOKIE_SECRET_KEY);
        if($str[2] == $hash){
            if($type = 'S')
                $data = $dbase->num_rows("SELECT * FROM " . $this->tbl_account . " WHERE " . $this->Fpix . $this->acc_token . " = '" . $mainkey . "' AND " . $this->Fpix . $this->acc_primkey . "='{$id}'");
            else
                $data = $dbase->num_rows("SELECT * FROM " . $this->tbl_account . " WHERE " . $this->Fpix . $this->acc_token . " = '" . $mainkey . "' AND " . $this->Fpix . $this->acc_primkey . "='{$id}'");

            if($data == 1)
                return true;
            else
                return false;
        }
       
    }

    function passencrypt($pPassword){
        return md5(strtolower($pPassword));
    }

}
