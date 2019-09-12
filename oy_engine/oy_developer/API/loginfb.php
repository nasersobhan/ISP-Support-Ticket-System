<?php
//session_start();
//
header('Location: https://a.ooyta.com/en/login'); 
exit();
error_reporting(-1);
ini_set('display_errors', 'On');



function checkuser($fuid,$ffname,$femail){
global $dbase;
    $img = "https://graph.facebook.com/".$fuid."/picture";
    if($femail=='')
    $femail = $fuid.'@fb.com';
    
        global $dbase,$user_arr;
         $ac = new oy_accounts($user_arr);
        
        
        $user_arr['FPX'] = TBL_PIX;
        $value = 'fb'.$fuid['id'];
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
                $data_arr['email']=$fuid['email'];
                $data_arr['name']=$fuid['name'];
                $data_arr['rank']=1;
        
        
                //error_log( $data_arr['uname']);
                
                 
                $result = $ac->do_register($data_arr);
                  if($result=='Success'){
                    $message = $ac->do_login($data_arr['uname'], $pass);
                    if($message == 'Success'){
                        if(is_loggedin()){
                            $uid = user_uid();
                           // $db['inf_id']=$uid;
                            $db['inf_name']=$fuid['first_name'];
                            $db['inf_sname']=$fuid['last_name'];
                            $db['inf_gender']=$fuid['gender'];
                            $db['inf_lang']=$fuid['locale'];
                            $db['inf_email']=$fuid['email'];
                            $db['inf_gtm']=$fuid['timezone'];
                            $numro = $dbase->num_rows("SELECT * from sob_infouser_oy where inf_id={$uid}");
                            if($numro < 1){
                                $dbase->RowInsert($tbl, array('inf_id' => $uid, 'inf_name' => user_info('name')));
                            }
                           
                        }
                        
                      redirect_to(get_link('profile'), '', false);
                  }ELSE
                       error_log( $message) ;
                }else error_log( $result);
        
	} else {
                    $message = $ac->do_login($value, $fuid);
                     
                  if($message == 'Success'){
                       // if(isset($_SESSION['redirectorx']))
                          //  redirect_to($_SESSION['redirectorx'], '', false);
                       // else
                            redirect_to(get_link('profile'), '', false);
                    }
	}
        
}




require('/home/ooyta/public_html/oy_custom/autoload.php');
require_once( '/home/ooyta/public_html/oy_custom/src/Facebook/FacebookSession.php' );
require_once( '/home/ooyta/public_html/oy_custom/src/Facebook/FacebookRedirectLoginHelper.php' );
require_once( '/home/ooyta/public_html/oy_custom/src/Facebook/FacebookRequest.php' );
require_once( '/home/ooyta/public_html/oy_custom/src/Facebook/FacebookResponse.php' );
require_once( '/home/ooyta/public_html/oy_custom/src/Facebook/FacebookSDKException.php' );
require_once( '/home/ooyta/public_html/oy_custom/src/Facebook/FacebookRequestException.php' );
require_once( '/home/ooyta/public_html/oy_custom/src/Facebook/FacebookAuthorizationException.php' );
require_once( '/home/ooyta/public_html/oy_custom/src/Facebook/GraphObject.php' );
require_once( '/home/ooyta/public_html/oy_custom/src/Facebook/Entities/AccessToken.php' );
require_once( '/home/ooyta/public_html/oy_custom/src/Facebook/HttpClients/FacebookHttpable.php' );
require_once( '/home/ooyta/public_html/oy_custom/src/Facebook/HttpClients/FacebookCurlHttpClient.php' );
require_once( '/home/ooyta/public_html/oy_custom/src/Facebook/HttpClients/FacebookCurl.php' ); 

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookHttpable;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookCurl; 


//session_destroy();
// start session
//session_start();

FacebookSession::setDefaultApplication('638057236208902','5c1503cda276d55967e22fb0400c23b6');


$helper = new FacebookRedirectLoginHelper('http://ooyta.com/?API=loginfb');
// see if a existing session exists
if ( isset( $_SESSION ) && isset( $_SESSION['fb_token'] ) ) {
  // create new session from saved access_token
  $session = new FacebookSession( $_SESSION['fb_token'] );
  
  // validate the access_token to make sure it's still valid
  try {
    if ( !$session->validate() ) {
      $session = null;
    }
  } catch ( Exception $e ) {
    // catch any exceptions
    $session = null;
  }
}  
if ( !isset( $session ) || $session === null ) {
  // no session exists
  
  try {
    $session = $helper->getSessionFromRedirect();
  } catch( FacebookRequestException $ex ) {
    // When Facebook returns an error
    // handle this better in production code
    print_r( $ex );
  } catch( Exception $ex ) {
    // When validation fails or other local issues
    // handle this better in production code
    print_r( $ex );
  }
  
}
// see if we have a session
if ( isset( $session ) ) {
  
  // save the session
  $_SESSION['fb_token'] = $session->getToken();
  // create a session using saved token or the new one we generated at login
  $session = new FacebookSession( $session->getToken() );
  
  // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me' );
  $response = $request->execute();
  // get response
  //$graphObject = $response->getGraphObject()->asArray();
  
  // print profile data
  //echo '<pre>' . print_r( $graphObject, 1 ) . '</pre>';
  
  // print logout url using session and redirect_uri (logout.php page should destroy the session)
  
  
$g = $response->getGraphObject()->asArray();
     	$fbid =$g['id'];              // To Get Facebook ID
 	$fbfullname = $g['name']; // To Get Facebook full name
	$femail = $g['email'];    // To Get Facebook email ID
	
	    $_SESSION['FBID'] = $fbid;           
            $_SESSION['FULLNAME'] = $fbfullname;
	    $_SESSION['EMAIL'] =  $femail;
            $img = "https://graph.facebook.com/".$_SESSION['FBID']."/picture";
            //print_r($g);
            if(!empty($_SESSION['FBID'])){
               checkuser($g,$fbfullname,$femail);
            }
  
  
  echo '<a href="' . $helper->getLogoutUrl( $session, 'http://yourwebsite.com/app/logout.php' ) . '">Logout</a>';
  
} else {
  // show login url
  echo '<a href="' . $helper->getLoginUrl( array( 'email', 'user_friends' ) ) . '">Login</a>';
}