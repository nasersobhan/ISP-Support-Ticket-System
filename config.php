<?php
//URis
define("RHOME", dirname(__FILE__) . DIRECTORY_SEPARATOR);
define('HOME', 'http://stark.test/'); // Public URL For Core
define('COREHOME', 'http://stark.test/oy_engine/'); // Public URL For Core
define('PUNAME', 'info');
//Query
define('TBL_LIMITE', 20); ///need to get fixed
//Optimization Configurations
define('THEME', 'lte');
define('DYNAMIC_URL', FALSE); ///need to get fixed
define('ENVIRONMENT', 'development');
//Defulte Values
define('DEF_PGDESC', 'خدمات انترنت من');
define('DEF_PGKEYWORD', 'keywords,for,ooyta');
define("DEF_IMG", COREHOME . "oy_core/oy_theme/def/images/def/404-img.gif");
define("DEF_AVTAR", HOME . "uploads/def/avatar.png");
define("DEF_COVER", HOME . "uploads/def/avatar.png");

//SECURITY Configurations
define("HASH_COST_FACTOR", "10");
define("COOKIE_RUNTIME", 1209600);
define("COOKIE_DOMAIN", ".*");
define("COOKIE_SECRET_KEY", "1gp@TMPS{+$78sfpMJFe-92s");

/// BUILT-IN Databse{
define('BDB', TRUE); // Active Built-in Database System but can be deffrint database from system database
define('TDB', FALSE); // access built-in data using Access Token
define('BDB_CONSTR', 'CURRENT'); // Built-in Database Connection String
define('TDB_TOKEN', ''); // Built-in data engine Token
define('USER_TYPE', 'DB'); // BDB = get from deffrent databse, TDB = get from URL (using API), DB= in the current Database, false= No User system
define('BTBL_PIX', 'oyt_');
define('AUTOLOADER', TRUE);
$autoloader = AUTOLOADER;
define('HAS_DB', TRUE);
$constring = 'localhost:stark_sys:root:';
define('TYPE_DB', 'MYSQL'); //MYSQL, SQLITE, MSSQL
define('STR_DB', $constring);
define('TBL_PIX', 'sob_');
define('PUB_REGISTER', TRUE);
global $user_arr;
$user_arr['TBL'] = TBL_PIX . "users";
$user_arr['FPX'] = TBL_PIX;
global $user_arr;
///VISUAL 
define('STATISTC_EN', FALSE);
define('LIK_EN', TRUE);

//CATEGORY Functions
define('CATE_EN', TRUE);
//LOCATION Functions
define('LOC_EN', TRUE);
//FILE FUnctions - FIL_EN
define('FIL_EN', TRUE);
// TEST Define
global $userID;
$userID = 1;
define('PUBLIC_FILES_PATH', RHOME . 'uploads');
define('LANG_EN', TRUE);

?>