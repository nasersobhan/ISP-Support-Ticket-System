<?php

date_default_timezone_set('Asia/Kabul');

if (!isset($_SESSION['message']))

    define('PORT', 'http');
//Directories
define('THEME_DIR', 'oy_theme');
define('PAGE_DIR', 'oy_pages');
define('DATA_DIR', 'oy_data');
define('DEV_DIR', 'oy_developer');
define('CUS_DIR', 'oy_custom');
define('FIL_DIR', 'uploads');

define('DEF_LANG', 'fa_AF');
//define('DEV_DIR','oy_developer');
//URLs
//define('BASE_PATH_SEC',HOME); //OLD HOME
define('BASE_DIR', str_replace("\\", DIRECTORY_SEPARATOR, HOME));
// define('COREHOME',BASE_DIR); //OLD HOME
define('BASE_PATH', COREHOME); //OLD HOME
define('SELFT', pathinfo(__FILE__, PATHINFO_BASENAME));

define('CORE_PATH', BASE_PATH);
define('CRR_THEME_PATH', HOME . THEME_DIR . '/' . THEME);
define('DATA_CORE_PATH', CORE_PATH . DATA_DIR);
// define('SRC_PATH',BASE_PATH.DATA_DIR);
define('DEV_CORE_PATH', BASE_PATH . DEV_DIR);
define('CUSTOM_PATH', HOME . CUS_DIR);
//Abslute URLs
define('CORE_RPATH', str_replace(SELFT, '', __FILE__));
define('CUSTOM_RPATH', RHOME . CUS_DIR);
//define('COREHOME',CORE_RPATH);
define('BASE_RPATH', CORE_RPATH);
//define('BASE_RPATH_SEC', RHOME);
define('DATA_CORE_RPATH', CORE_RPATH . DATA_DIR);
define('DEV_CORE_RPATH', CORE_RPATH . DEV_DIR);
define('DEV_RPATH', RHOME . DEV_DIR);
define('CRR_THEME_RPATH', RHOME . DIRECTORY_SEPARATOR . THEME_DIR . DIRECTORY_SEPARATOR . THEME . DIRECTORY_SEPARATOR);
define('PAGE_RPATH', RHOME . PAGE_DIR);
define('CORE_PAGE_RPATH', CORE_RPATH . PAGE_DIR);

define("UKEY", md5(COREHOME . COOKIE_SECRET_KEY));

define("POST_DYN_URL", true);

define('UPLOAD_PATH', COREHOME . DIRECTORY_SEPARATOR . FIL_DIR);
define('UPLOAD_RPATH', BASE_RPATH . DIRECTORY_SEPARATOR . FIL_DIR);


if (defined('ENVIRONMENT')) {
    switch (ENVIRONMENT) {
        case 'development':
            error_reporting(-1);

            error_reporting(E_ALL | E_STRICT);
            define('AUTO_MINIFY', FALSE);
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

//LOAD base Classes
require_once(CORE_RPATH . "oy_functions/theme_func.php");
require_once(CORE_RPATH . "oy_functions/public_func.php");
require_once(CORE_RPATH . "oy_functions/message.func.php");

if (CATE_EN == TRUE) {
    func_include("categories");
}
if (LOC_EN == TRUE) {
    func_include("locations");
}

if (HAS_DB) {
    require_once(CORE_RPATH . "oy_functions/post.func.php"); //Get loader
    require_once(CORE_RPATH . "oy_classes/post_query.class.php"); //Get loader
    if (TYPE_DB == 'MYSQL')
        require_once(CORE_RPATH . "oy_classes/db-mysql.class.php");
    elseif (TYPE_DB == 'MSSQL')
        class_include('db-mssql');
    // require_once(CORE_RPATH."oy_classes/db-mssql.class.php");  
    global $dbase;
    $dbase = new oy_db(STR_DB);
}


if (AUTOLOADER) {
}


///USER
if (USER_TYPE) {
    require_once(CORE_RPATH . "oy_classes/user.class.php");
    require_once(CORE_RPATH . "oy_functions/user.func.php");
    global $userID;
    define('USER_ID', $userID);

    global $user_arr, $ac;
    $ac = new oy_accounts($user_arr);
    if (!$ac->is_login())
        $ac->cookie_login();


    if (user_uid()) {
        global $user;
        $user = new oy_user(user_uid());
    }
}

if (isset($_POST)) {
    foreach ($_POST as $key => $value) {
        if (is_array($_POST[$key])) {
            foreach ($_POST[$key] as $key2 => $value2) {
                $_POST[$key2] = $dbase->escap_single($value2);
            }
        } else
            $_POST[$key] = $dbase->escap_single($value);
    }
}

if (isset($_GET)) {
    foreach ($_GET as $key => $value) {
        $_GET[$key] = $dbase->escap_single($value);
    }
}

if (LANG_EN) {
    oy_core_include(DIRECTORY_SEPARATOR . 'oy_languages' . DIRECTORY_SEPARATOR . 'config.php');
}


if (!is_get('API') and !is_get('xml') and !is_get('rss')) {
    if (AUTO_MINIFY) {
        if (ob_get_length()) ob_end_clean();

        ob_start('sanitize_output');
    } else {
        if (ob_get_length()) {
            ob_end_clean();
        }
        ob_start();
    }
}

function __autoload($class_name)
{
    class_include($class_name);
}
