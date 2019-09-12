<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

global $dbase;

//ini_set("log_errors", 1);
//ini_set("error_log", RHOME."/errors.txt");
//error_log( "Hello, errors!" );



error_reporting(-1);
                       ini_set('display_errors', 'On');


function checkuser($fuid,$ffname,$femail){
    $img = "https://graph.facebook.com/".$fuid."/picture";
    if($femail=='')
    $femail = $fuid.'@fb.com';
    
        global $dbase,$user_arr;
         $ac = new oy_accounts($user_arr);
        
        
        $user_arr['FPX'] = TBL_PIX;
        $value = 'fb'.$fuid;
        $tbl =$user_arr['TBL'];
        $pfx = $user_arr['FPX'];
        $exists = $dbase->check_duplicate($value, $tbl, $pfx.'user');
        
        
       
        // error_log( "checkuser" );
	if (!$exists) { // if new user . Insert a new record		
              // error_log( "not exists" );
                $pass =$fuid;
                $data_arr= array();
                $data_arr['uname'] = $value;
                $data_arr['password'] = $pass;
                $data_arr['passwordre']=$pass;
                $data_arr['email']=$femail;
                $data_arr['name']=$ffname;
                $data_arr['rank']=1;
        
        
                error_log( $data_arr['uname']);
                
                 
                $result = $ac->do_register($data_arr);
                  if($result=='Success'){
                    $message = $ac->do_login($data_arr['uname'], $pass);
                    if($message == 'Success'){
                      redirect_to(get_link('profile'), '', false);
                  }ELSE
                       error_log( $message) ;
                }else error_log( $result);
        
	} else {
                    $message = $ac->do_login($value, $fuid);
                     
                  if($message == 'Success'){
                        if(isset($_SESSION['redirectorx']))
                            redirect_to($_SESSION['redirectorx'], '', false);
                        else
                            redirect_to(get_link('profile'), '', false);
                    }
	}
        
}




// added in v4.0.0
//require_once 'autoload.php';
oy_include('/oy_custom/autoload.php');
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;
// init app with app id and secret
FacebookSession::setDefaultApplication( '638057236208902','5c1503cda276d55967e22fb0400c23b6' );
// login helper with redirect_uri
    $helper = new FacebookRedirectLoginHelper(HOME.'?API=loginfb' );
try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}
// see if we have a session
if ( isset( $session ) ) {
  // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me' );
  $response = $request->execute();
  // get response
  $graphObject = $response->getGraphObject();
     	$fbid = $graphObject->getProperty('id');              // To Get Facebook ID
 	$fbfullname = $graphObject->getProperty('name'); // To Get Facebook full name
	$femail = $graphObject->getProperty('email');    // To Get Facebook email ID
	/* ---- Session Variables -----*/
	    $_SESSION['FBID'] = $fbid;           
            $_SESSION['FULLNAME'] = $fbfullname;
	    $_SESSION['EMAIL'] =  $femail;
            $img = "https://graph.facebook.com/".$_SESSION['FBID']."/picture";
            
            if(!empty($_SESSION['FBID'])){
               checkuser($fbid,$fbfullname,$femail);
            }
            
           
    /* ---- header location after session ----*/
  header("Location: ../index.php?pg=profile");
} else {
     logit2txt('redirect helper:\n');
  $loginUrl = $helper->getLoginUrl();
 header("Location: ".$loginUrl);
}