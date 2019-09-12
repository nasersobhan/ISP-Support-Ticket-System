<?php 

date_default_timezone_set('Asia/Kabul');

if(!isset($_SESSION['message']))
	
	//$application_folder = 'application';
        define('PORT','http');
        //Directories
        define('THEME_DIR','oy_theme');
        define('PAGE_DIR','oy_pages');
        define('DATA_DIR','oy_data');
        define('DEV_DIR','oy_developer');
        define('CUS_DIR','oy_custom');
        define('FIL_DIR','uploads');
     
        define('DEF_LANG','fa_AF');
	//define('DEV_DIR','oy_developer');
	//URLs
         //define('BASE_PATH_SEC',HOME); //OLD HOME
        define('BASE_DIR', str_replace("\\", DIRECTORY_SEPARATOR, HOME));
       // define('COREHOME',BASE_DIR); //OLD HOME
        define('BASE_PATH',COREHOME); //OLD HOME
        define('SELFT', pathinfo(__FILE__, PATHINFO_BASENAME));
        
        define('CORE_PATH',BASE_PATH);
        define('CRR_THEME_PATH',HOME.THEME_DIR.'/'.THEME);
        define('DATA_CORE_PATH',CORE_PATH.DATA_DIR);
       // define('SRC_PATH',BASE_PATH.DATA_DIR);
        define('DEV_CORE_PATH',BASE_PATH.DEV_DIR);
        define('CUSTOM_PATH', HOME.CUS_DIR);
        //Abslute URLs
        define('CORE_RPATH', str_replace(SELFT, '', __FILE__));
        define('CUSTOM_RPATH', RHOME.CUS_DIR);
        //define('COREHOME',CORE_RPATH);
        define('BASE_RPATH', CORE_RPATH);
        //define('BASE_RPATH_SEC', RHOME);
        define('DATA_CORE_RPATH',CORE_RPATH.DATA_DIR);
        define('DEV_CORE_RPATH',CORE_RPATH.DEV_DIR);
        define('DEV_RPATH',RHOME.DEV_DIR);
	define('CRR_THEME_RPATH',RHOME.DIRECTORY_SEPARATOR.THEME_DIR.DIRECTORY_SEPARATOR.THEME.DIRECTORY_SEPARATOR);
        define('PAGE_RPATH',RHOME.PAGE_DIR);
        define('CORE_PAGE_RPATH',CORE_RPATH.PAGE_DIR);
       // define('PUBLIC_FILES_RPATH',DATA_CORE_RPATH.'/upload/');
        
        define("UKEY",md5(COREHOME.COOKIE_SECRET_KEY));
        
        define("POST_DYN_URL",true);
 
               //  print_r($_SESSION);
        //define('PUBLIC_FILES_RPATH',BASE_RPATH.UPLOAD_PATH);
        //define('PUBLIC_FILES_URL',HOME.'data/upload/');
        define('UPLOAD_PATH',COREHOME.DIRECTORY_SEPARATOR.FIL_DIR);
        define('UPLOAD_RPATH',BASE_RPATH.DIRECTORY_SEPARATOR.FIL_DIR);
//        define("DEF_IMG", UPLOAD_PATH."/def/default.jpg");
//        define("DEF_AVTAR", UPLOAD_PATH."/def/avatar.png");
//        define("DEF_COVER", UPLOAD_PATH."/def/avatar.png");

//error_reporting(-1);
//ini_set('display_errors', 'On');	
	
if (defined('ENVIRONMENT'))
{
	switch (ENVIRONMENT)
	{
		case 'development':
			error_reporting(-1);
                
                        error_reporting(E_ALL | E_STRICT);
                        
                        
                        
                     //  error_reporting(0);
                     //   ini_set('display_errors', 'Off');
                     //  ini_set("error_log", "./errors.txt");
                       define('AUTO_MINIFY', FALSE);
                        //set_debugger(); 
		break;
	
		case 'testing':
		case 'production':
			error_reporting(0);
                        ini_set('display_errors', 'Off');
                        ini_set("error_log", "./errors.txt");
                        define('AUTO_MINIFY', FALSE);
		break;

		default:
			exit('The application environment is not set correctly.');
	}
}




/*
 * --------------------------------------------------------------------
 * LOAD THE BOOTSTRAP FILE
 * --------------------------------------------------------------------
 *
 * And away we go...
 *
 */



///parts URL

/* ACCOUNTS 
if(isset($dtype)){

define('CRR_RPATH',BASE_RPATH.$dtype.DIRECTORY_SEPARATOR);
define('CRR_PATH',HOME.$dtype.DIRECTORY_SEPARATOR);
}*/



    



//LOAD base Classes
require_once(CORE_RPATH."oy_functions/theme_func.php");
require_once(CORE_RPATH."oy_functions/public_func.php");
require_once(CORE_RPATH."oy_functions/message.func.php");

if(CATE_EN==TRUE){
    func_include("categories");
}
if(LOC_EN==TRUE){
    func_include("locations");
}

if(FIL_EN==TRUE){
   // func_include("file");
}

if(LIK_EN==TRUE){
   // func_include("like");
}















if(HAS_DB){
    require_once(CORE_RPATH."oy_functions/post.func.php"); //Get loader
    require_once(CORE_RPATH."oy_classes/post_query.class.php"); //Get loader
    if(TYPE_DB=='MYSQL')
        require_once(CORE_RPATH."oy_classes/db-mysql.class.php");
    elseif(TYPE_DB=='MSSQL')
        class_include('db-mssql');
       // require_once(CORE_RPATH."oy_classes/db-mssql.class.php");  
    global $dbase;
    $dbase = new oy_db(STR_DB);
}


if(AUTOLOADER){
    
   
    
}


///USER
if(USER_TYPE){
    //require_once(CORE_RPATH."oy_classes/account.class.php");
    require_once(CORE_RPATH."oy_classes/user.class.php");
    require_once(CORE_RPATH."oy_functions/user.func.php");
    global $userID;
    define('USER_ID',$userID);
    
    global $user_arr,$ac;
    $ac = new oy_accounts($user_arr);
//$user = new oy_user(Get_UID());

    if(!$ac->is_login())
    $ac->cookie_login();
    

    if(user_uid()){
            global $user;
            $user = new oy_user(user_uid());
    }	
}


//CORE


//require_once(CORE_RPATH."oy_functions/get_func.php"); //Get loader




//OPTIONS



//Built-in Options
if(BDB){
 //require_once(CORE_RPATH."oy_classes/op-bdb.class.php"); global $BDB; 
 //$BDB = new oy_builtinDB(BDB_CONSTR, BTBL_PIX);
}

if(TDB){
 //require_once(CORE_RPATH."oy_classes/op-tdb.class.php"); global $BDB; 
 //$TDB = new oy_tokenDB(TDB_TOKEN);
 //$x = $TDB->cat2arr('ip_type', 1); print_r($x); 
 //   require_once(CORE_RPATH."oy_functions/api.get_func.php"); //API loader
}










//if($autoloader){
//   require_once(CORE_RPATH."oy_classes/pageloader.class.php");
//    $oy_pg = new oy_page();
//    require_once(CORE_RPATH."oy_functions/pageloader.func.php");
//     include_once 'autoloader.php'; 
//}





//set_debugger();
if(isset($_POST)){
	foreach ($_POST as $key => $value) {
		if(is_array($_POST[$key])){
			foreach ($_POST[$key] as $key2 => $value2) {
				$_POST[$key2] = $dbase->escap_single($value2);
			}
			
		}else
   		$_POST[$key] = $dbase->escap_single($value);
	}	
}

//if(isset($_POST)){
//	foreach ($_POST as $key => $value) {
//		if(is_array($_POST[$key])){
//			foreach ($_POST[$key] as $key2 => $value2) {
//				$_POST[$key2] = htmlentities($value2);
//			}
//			
//		}else
//   		$_POST[$key] = htmlentities($value);
//	}	
//}
//



if(isset($_GET)){
	foreach ($_GET as $key => $value) {
   		$_GET[$key] = $dbase->escap_single($value);
	}	
}



//    $crr = (get_setting('debug_counter2')) + 1;
//    set_setting('debug_counter2', $crr);

///JQUERY

//addjs(DATA_CORE_PATH."/js/jquery-1.11.3.min.js");
//addjs(DATA_CORE_PATH."/js/jquery-ui.min.js");
//addjs("https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js");
//addjs("https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js");


//addjs(DATA_CORE_PATH."/js/jquery.form.js");
//addcss(DATA_CORE_PATH."/oy_jslib/bootstrap/bootstrap.min.css");



///BOOTSTRAP
//addjs(DATA_CORE_PATH."/bootstrap/js/bootstrap.min.js");
//addcss(DATA_CORE_PATH."/bootstrap/css/bootstrap.min.css");
//load_jsplug('bootstrap');
//addcss(DATA_CORE_PATH."/font-awesome/css/font-awesome.min.css");

//load_jsplug('jquery_modal');
///SS_SYSTEM
//addjs(DATA_CORE_PATH."/js/oy_forms.js");
//addcss(DATA_CORE_PATH."/css/public.css");
//addjs(DATA_CORE_PATH."/js/public.js");
//addjs(DATA_CORE_PATH."/select2/select2.min.js");
//addcss(DATA_CORE_PATH."/select2/select2.css");


			

//load_jsplug('select2');

//load_jsplug('datatable');
//load_jsplug('pickaday');
//ob_start()

//$contents = ob_get_contents();
//ob_end_clean();
//addlinejs($contents);
//   addjs(DATA_CORE_PATH."/js/form/oy_forms.js?url=".HOME); 
 //   addcss(DATA_CORE_PATH."/js/form/form.css");


if(LANG_EN){
    oy_core_include(DIRECTORY_SEPARATOR.'oy_languages'.DIRECTORY_SEPARATOR.'config.php'); 
}


if(!is_get('API') AND !is_get('xml') AND !is_get('rss')){
    if(AUTO_MINIFY){
    if (ob_get_length()) ob_end_clean();

        ob_start('sanitize_output');
    }else{
        if (ob_get_length()){
            ob_end_clean();
         
        }
        ob_start();
    }
        
}



function __autoload($class_name) {
    class_include($class_name);
}








 //xdebug_stop_trace();


?>