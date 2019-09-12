<?php
function set_oycookie($name,$value){
    setcookie($name, $value, time() + 30*24*60*60, '/');
}
function get_oycookie($name){
    return $_COOKIE[$name];
}


function set_error($text){
   // if(isset($_SESSION['error']))
      $_SESSION['error'][] = $text;
    //else{
   //    $_SESSION['error'][time()] = $text;  
    //}
        
}
function is_error(){
    if(isset($_SESSION['error']))
        return true;
    else
        return false;
}
function get_error(){
    if(isset($_SESSION['error'])){
        $text = $_SESSION['error']; unset($_SESSION['error']);
        return $text;
    }else
        return false;
}


function is_autoloader(){
    global $autoloader;
    if($autoloader && is_get('tbl'))
        return TRUE;
    else
        return false;
}




 function format_interval(DateInterval $interval) {
    $result = "";
    if ($interval->y) { $result .= $interval->format("%y years "); }
    if ($interval->m) { $result .= $interval->format("%m months "); }
//    if ($interval->d) { $result .= $interval->format("%d days "); }
//    if ($interval->h) { $result .= $interval->format("%h hours "); }
//    if ($interval->i) { $result .= $interval->format("%i minutes "); }
//    if ($interval->s) { $result .= $interval->format("%s seconds "); }

    return $result;
}









function get_linkhas($link = ''){
    if($link == '')
        $link = get_current_url();
    return parse_url($link, PHP_URL_FRAGMENT);
}
function get_link($section, $action = '', $value = ''){
    $sec = false;
    $act = false;
    $id = false;
    if(!empty($section))
        $sec = true;
    if(!empty($action))
        $act = true;
    if(!empty($value))
        $id = true;
    if(DYNAMIC_URL == false){
        if($sec && $act && $id)
            $result = '?pg=' . $section . '&' . $action . '=' . $value;
        elseif($sec && !$act)
            $result = '?pg=' . $section;
        else 
            $result = HOME;
        return HOME . $result;
        
    }else{
        if($sec && $act && $id)
            $result = $section . '/' . $action . '/' . $value;
        elseif($sec && !$act)
            $result = $section;
        return HOME . $result;
    }
}
function set_hit($tbl, $fld, $where){
    global $dbase;
    $tbl = TBL_PIX . str_ireplace(TBL_PIX, '', $tbl);
    $dbase->query("UPDATE {$tbl} SET {$fld} = {$fld}+1 WHERE " . $where);
}
function echo_link($section, $action = '', $value = ''){
    echo get_link($section, $action, $value);
}
//PAGES
function autoload_page(){
    require_once(CORE_PAGE_RPATH . '/autoloader.php');
}

function get_slug($slug, $tbl = 'meta_slug', $feild = 'slu_value'){
    global $dbase;
    //$slug = trim($slug);

   // $slug = preg_replace('/[^A-Za-z0-9\u0600-\u06FF-]+/', '-', ($slug));
 // $slug =   preg_replace('/([^\x{0600}-\x{06FF}A-Za-z0-9+])/u', '-', ($slug));
    //$slug = strtolower($slug);
  $slug = clean_url($slug);
    if($dbase->check_duplicate($slug, $tbl, $feild)){
        global $i;
        $slug = str_replace($i, '', $slug);
        $i = ((int) (str_replace('-', '', $i))) + ((int) 1);
        return get_slug($slug . $i, $tbl, $feild);
    }else{
        return $slug;
    }
}

function clean_urlx($text)
{
    $text = trim($text);
    $result_with_dashes = true; //set this to false if you want output with spaces as a separator
    $input_is_english_only = true; //set this to false if your input contains non english words
    
    $text = str_replace(array('"','+',"'"), array('',' ',''), urldecode($text));
    if($input_is_english_only === true)
    {
        $text = preg_replace('/[~`\!\@\#\$\%\^\&\*\(\)\_\=\+\/\?\>\<\,\[\]\:\;\|\\\]/', " ", $text);
    }
    else
    {
        $text = preg_replace('/[^A-Za-z0-9\s\s+\.\)\(\{\}\-]/', " ", $text);
    }
    $bad_brackets = array("(", ")", "{", "}");
    $text = str_replace($bad_brackets, " ", $text);
    $text = preg_replace('/\s+/', ' ', $text);
    $text = trim($text,' .-');
    if($result_with_dashes === true)
    {
        $text = str_replace(' ','-',$text);
    }
    $text = preg_replace('/-+/', '-', $text);
    return strtolower($text);
}


function clean_url($text)
        {
          // replace non letter or digits by -
         // $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

          // trim
          $text = trim($text, '-');

          // transliterate
//          if (function_exists('iconv'))
//          {
//            $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
//          }

          // lowercase
        // $text = strtolower($text);

          // remove unwanted characters
          //$text = preg_replace('~[^-\w]+~', '', $text);
            $text =   preg_replace('/([^\x{0600}-\x{06FF}A-Za-z0-9+])/u', '-', ($text));
          
          //  $text = preg_replace('/[~`\!\@\#\$\%\^\&\*\(\)\_\=\+\/\?\>\<\,\[\]\:\;\|\\\]/', "-", $text);
          //$text =  preg_replace('/(?=\P{Nd})\P{L}/u', '-', $text);
      //  $text = preg_replace("/(?![.=$'€%-])\p{P}/u", "-", $text);
          $text = preg_replace('/[\s-]{2,}/u', '-', $text);
            
            if(!is_arabic($text))
                $text = strtolower($text);
          if (empty($text))
          {
            return 'n-a';
          }

          return $text;
        }   
function dirty_url($string){
    // $string = str_replace('--', '-', $string);
    // $string = str_replace('-',' ', $string); 
    //$string = str_replace('-A-','&', $string);
    return $string;
}


function is_get($get){
    if(isset($_GET[$get]) && !empty($_GET[$get]) && $_GET[$get] != NULL && $_GET[$get] != '')
        return $_GET[$get];
    else
        return false;
}
function is_post($post){
    if(isset($_POST[$post]) && !empty($_POST[$post]) && $_POST[$post] != NULL && $_POST[$post] != '')
        return $_POST[$post];
    else
        return false;
}
//
//function create_slug($slug, $type){
//    global $dbase;
//    $DATA['slu_value'] = get_slug($slug);
//    $DATA['slu_type'] = $type;
//    if($dbase->RowInsert('meta_slug', $DATA))
//        return $dbase->lastinserted_id();
//    else
//        return false;
//}
function get_data_path(){
    echo DATA_CORE_PATH;
}
function get_upload_path(){
    echo PUBLIC_FILES_PATH;
}
function get_path($type = ''){
    echo CRR_PATH;
}
function get_api_url($api){
    return HOME . '?API=' . $api;
}
function get_current_url($update = ''){
    $protocol = PORT;
    $actual_link = "$protocol://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    return $actual_link;
}

function get_current_url_static(){
$protocol = PORT; //strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https')=== FALSE ? 'http' : 'https';
$host     = $_SERVER['HTTP_HOST'];
$script   = $_SERVER['SCRIPT_NAME'];
$params   = $_SERVER['QUERY_STRING'];
 
$currentUrl = $protocol.'://' . $host . $script . '?' . $params;
 
return $currentUrl;
}
function remove_querystring_var($url, $key) { 
	$url = preg_replace('/(.*)(?|&)' . $key . '=[^&]+?(&)(.*)/i', '$1$2$4', $url . '&'); 
	$url = substr($url, 0, -1); 
	return $url; 
}

//get_pager_url();
function get_pager_url($num=1){
    // find out the domain:
//$domain = $_SERVER['HTTP_HOST'];
//// find out the path to the current file:
//$path = $_SERVER['SCRIPT_NAME'];
//// find out the QueryString:
//$queryString = $_SERVER['QUERY_STRING'];
//// put it all together:
//$url = "http://" . $domain . $path . "?" . $queryString;
////echo $url.'<br/>';
//
//// An alternative way is to use REQUEST_URI instead of both
//// SCRIPT_NAME and QUERY_STRING, if you don't need them seperate:
//$url = "http://" . $domain . $_SERVER['REQUEST_URI'];
////echo $url.'<br/>';
//get_current_url();
parse_str($_SERVER['QUERY_STRING'], $query_string);
$query_string['page'] = $num;
$rdr_str = http_build_query($query_string);
return "http://$_SERVER[HTTP_HOST]/".$rdr_str;
}
function get_page_url($pagename = '', $action = '', $echo = true){
    if($pagename == '%this')
        $pagename = is_get('pg');
    if($action == '%this')
        $action = is_get('action');
    if($pagename == '')
        $result = '';
    else{
        if(DYNAMIC_URL)
            $result = HOME . $pagename;
        else
            $result = HOME . '?pg=' . $pagename;
    }
    if(!empty($action)){
        if(DYNAMIC_URL)
            $result = $result . '/' . $action;
        else
            $result = $result . '/' . $action;
        if(isset($_GET['id']))
            $result = $result . '/' . $_GET['id'];
    }
    if(DYNAMIC_URL)
        $result = $result . '.html';
    if($echo)
        echo $result;
    else
        return $result;
}
function page_is($page, $value = 'return'){
    if(isset($_GET['pg'])){
        if($_GET['pg'] == $page){
            if($value = 'return')
                return true;
            else
                echo $value;
        }else{
            if($value = 'return')
                return false;
            else
                echo '';
        }
    }else
        echo '';
}
function page_id($page){
    if(isset($_GET['pg'])){
        if($_GET['pg'] == $page)
            return true;
        else
            return false;
    }else
        return false;
}

//function get_orgs($att){
//	global $dbase;
//	echo $dbase->tbl2options('info_pages', 'pag_id', 'pag_title', $att,  " where pag_uid='".user_uid()."' and pag_status=1");
//	
//}


function home_url(){
    echo HOME;
}
function home_path(){
    echo HOME;
}
function get_home_url(){
    return HOME;
}
function get_home_path(){
    return HOME;
}


function res_rabon($value, $success_text = true){
    if($success_text){
        return '<p class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check"></i> ' . $success_text . '</p>';
    }else{
        return '<p  class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-exclamation-triangle yellow" ></i>  ' . $value . '</p>';
    }
}

/////Global Message
function set_message($value){
    //global $_SESSION['message'];
    $_SESSION[UKEY]['message'] = $value;
}
function get_message($echo = true){
    //global $_SESSION['message'];
    $message = (isset($_SESSION[UKEY]['message']) ? $_SESSION[UKEY]['message'] : '');
    $_SESSION[UKEY]['message'] = '';
    if($echo)
        echo $message;
    else
        return $message;
}
function oy_die($text = 'DIED',$page = '999'){
    $bt = debug_backtrace();
    $deb = array_shift($bt); //$deb['file'] $deb['line']
    if($page=='403')
        $text = $text .'<br/> <strong> Contact Administrator </strong> You Do not have Access to This page ';
    else
       $text = $text .'<br/> <strong> Contact Admin</strong> '.$text; 
    set_message($text);
    theme_include('error/'.$page);
    exit();
}
//////validators CHECK
function check_max_field_lengths($field_length_array){
    $field_errors = array();
    foreach($field_length_array as $fieldname => $maxlength){
        if(strlen(trim(mysql_cleanup($_POST[$fieldname]))) > $maxlength){
            $field_errors[] = $fieldname;
        }
    }
    return $field_errors;
}
function redirect_to($location = NULL, $r = false){
    if($location == 'login')
        $location = get_link('account', 'user', 'signin');
    if($location != NULL){
        if($r)
           return '<meta http-equiv="REFRESH" content="0;url=' . $location . '">';
        else
           echo '<meta http-equiv="REFRESH" content="0;url=' . $location . '">';
        exit;
    }
}
function is_selected($xc, $xy){
    echo ($xc == $xy ? 'select' : '');
}
function check_required_fields($required_array){
    $field_errors = array();
    if(is_array($required_array)){
        foreach($required_array as $fieldname){
            if(!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]) && $_POST[$fieldname] != 0)){
                $field_errors[] = $fieldname;
            }
        }
    }else{
        if(!isset($required_array) || (empty($required_array) && $required_array != 0)){
            $field_errors[] = $fieldname;
        }
    }
    return $field_errors;
}
function check_required_field($required_field){
    if(!isset($required_field) || (empty($required_field)) || $required_field == "")
        return false;
    else
        return true;
}
function check_number($element){
    return !preg_match("/[^0-9]/", $element);
}
function check_email_address($email){
    $email = trim($email);
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }else{
        return false;
    }
}
function get_setting($value){
    global $dbase;
    $query = "SELECT set_value FROM " . TBL_PIX . "settings_oy WHERE set_option='{$value}'";
    if($row = $dbase->fetch_assoc($query,true))
        return $row['set_value'];
    else{
        
    return false;
    
    }
}
function set_setting($option, $value){
    global $dbase;
    $tbl = TBL_PIX . "settings_oy";
    $where = "  set_option='{$option}'";
   
    if($dbase->check_duplicate_m($tbl,$where)){
        $query = "UPDATE {$tbl} SET set_value='{$value}' WHERE " .$where;
        $res = $dbase->query($query);
    }else{
        $query = "INSERT INTO {$tbl} (set_option, set_value) VALUES ('{$option}', '{$value}')";
        $res = $dbase->query($query);
    }
       
}
function set_debugger(){
    
    $crr = (get_setting('debug_counter')) + 1;
    set_setting('debug_counter', $crr);
   
}
//function login_url($arr = ''){
//    if($arr != '')
//        $arr = '&rdurl=' . $arr;
//    $result = BASE_PATH . 'accounts/index.php?pg=login' . $arr;
//    return $result;
//}
/////ADD SIMPLE THINGS
//function add_web_account($acc, $type, $status = 1){
//    global $dbase;
//    $arr['wa_user'] = $acc;
//    $arr['wa_type'] = $type;
//    $arr['wa_status'] = $status;
//    $arr['wa_uid'] = user_uid();
//    if(!$dbase->check_duplicate($acc, 'user_web_accounts', 'wa_user'))
//        $dbase->RowInsert("user_web_accounts", $arr);
//}
/* START FILES */
function reArrayFiles(&$file_post){
    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);
    for($i = 0; $i < $file_count; $i++){
        foreach($file_keys as $key){
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }
    return $file_ary;
}

function fixFilesArray(&$files)
{
    $names = array( 'name' => 1, 'type' => 1, 'tmp_name' => 1, 'error' => 1, 'size' => 1);

    foreach ($files as $key => $part) {
        // only deal with valid keys and multiple files
        $key = (string) $key;
        if (isset($names[$key]) && is_array($part)) {
            foreach ($part as $position => $value) {
                $files[$position][$key] = $value;
            }
            // remove old key reference
            unset($files[$key]);
        }
    }
}



function array2list($arr, $di){
    $tit = '';
    $numItems = count($arr);
    $i = 0;
    foreach($arr as $ci){
        $tit = $tit . trim($ci) . ( ++$i != $numItems ? $di : '');
    }
    return $tit;
}

/* END FILES */
function Agotime($date){
    
    
    $lang = get_lang();
    
    
    if(empty($date)){
        return "No date provided";
    }
//    if($lang=='fa_AF')
//         $periods = array("ثانیه", "دقیقه", "ساعت", "روز", "هفته", "ماه", "سال", "دهه");
//    else
        $periods = array(g_lbl("second"), g_lbl("minute"), g_lbl("hour"), g_lbl("day"), g_lbl("week"), g_lbl("month"), g_lbl("year"), g_lbl("decade"));
    $lengths = array("60", "60", "24", "7", "4.35", "12", "10");
    $now = time();
    $unix_date = strtotime($date);
    // check validity of date
    if(empty($unix_date)){
        return "Bad date";
    }
    // is it future date or past date
    if($now > $unix_date){
        $difference = $now - $unix_date;
         $tense = g_lbl("ago");
    }else{
        $difference = $unix_date - $now;
        
       
            $tense = g_lbl("fromnow");
        
    }
    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; $j++){
        $difference /= $lengths[$j];
    }
    $difference = round($difference);
    if($difference != 1){
        if($lang!='fa_AF')
            $periods[$j].= "s";
        else
             $periods[$j].= ""; 
    }
    return "$difference $periods[$j] {$tense}";
}







function oy_date($format,$date){
   // $date =strtotime($date);
    return date($format, $date);
}







function removeLink($str){
    $regex = '/<a (.*)<\/a>/isU';
    preg_match_all($regex, $str, $result);
    foreach($result[0] as $rs){
        $regex = '/<a (.*)>(.*)<\/a>/isU';
        $text = preg_replace($regex, '$2', $rs);
        $str = str_replace($rs, $text, $str);
    }
    return $str;
}
function extract_emails_from($string){
    
    $pattern = '/[a-z0-9_\-\+]+@[a-z0-9\-]+\.([a-z]{2,3})(?:\.[a-z]{2})?/i';
    $oldpatt = "/[\._a-zA-Z0-9-]+@[\._a-zA-Z0-9-]+/i";
// preg_match_all returns an associative array
//preg_match_all($pattern, $string, $matches);

// the data you want is in $matches[0], dump it with var_export() to see it
//var_export($matches[0]);
    
    
    preg_match_all($oldpatt, $string, $matches);
    return (array_unique($matches[0]));
}

//function dea_thumb($id){
//
//    global $dbase;
//    $query = "SELECT dim_datid FROM deals_images WHERE dim_deaid = {$id} limit 1";
//    $row = $dbase->fetch_assoc($query);
//    $dat_id = $row['dim_datid'];
//    $query2 = "SELECT dat_url FROM datafiles_oy WHERE dat_id = {$dat_id}";
//    $row2 = $dbase->fetch_assoc($query2);
//    return home_url() . $row2['dat_url'];
//}
//string function
function keepXlines($str, $num = 10){
    $lines = explode("\n", $str);
    $firsts = array_slice($lines, 0, $num);
    return implode("\n", $firsts);
}
///CONVERTS
function human_filesize($bytes, $decimals = 2){
    $sz = 'BKMGTP';
    $factor = floor((strlen($bytes) - 1) / 3);
    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
}


//$TBL2SO['accesslist']= 'tbl2access';
//function tbl4som(){
//    
//}
//function som4tbl(){
//    
//}
function get_tbllink($section,$action='',$value=''){
   
    
    $sec=false;$act=false;$id=false;
    if(!empty($section))
            $sec = true;
        if(!empty($action))
            $act=true;
        if(!empty($value))
            $id=true;
    if(DYNAMIC_URL==false){
        
        
        if($sec && $act && $id)
            $result = '?tbl='.$section.'&action='.$action.'&value='.$value;
         elseif($sec && !$act)
            $result = '?tbl='.$section;
         elseif($sec && $act && !$value)
              $result = '?tbl='.$section.'&action='.$action; 
         return HOME.$result;
        
    }else{
        if($sec && $act && $id)
            $result = $action.'/'.$section.'/'.$value.'.htm';
         elseif($sec && !$act)
            $result = 'tbl/'.$section.'.htm';
          elseif($sec && $act && !$value)
              $result = $action.'/'.$section.'.htm';
            return HOME.$result;
    }
    
}
function som2tum($x){
    global $som2tum;
    if(isset($som2tum[$x]))
        return $som2tum[$x];
    else 
        return $x;
}



function tbl_wop($tbl){

   return (str_replace(TBL_PIX, '', $tbl));
}

function getDomain($url)
{
    $host = @parse_url($url, PHP_URL_HOST);
    // If the URL can't be parsed, use the original URL
    // Change to "return false" if you don't want that
    if (!$host)
        $host = $url;
    // The "www." prefix isn't really needed if you're just using
    // this to display the domain to the user
    if (substr($host, 0, 4) == "www.")
        $host = substr($host, 4);
    // You might also want to limit the length if screen space is limited
    if (strlen($host) > 50)
        $host = substr($host, 0, 47) . '...';
    return $host;
}

function lim4str($string,$count=200,$work=true){
    $string = strip_tags($string);

if (strlen($string) > $count) {

    // truncate string
    // make sure it ends in a word so assassinate doesn't become ass...
    if($work){
        $stringCut = substr($string, 0, $count);
        $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'..'; 
    }else{
        $string = substr($string,0,$count).'..';
    }
    return $string;
}else
    return $string;
}

function where_is_it($fun){
    $r = new ReflectionFunction($fun);
    $file = $r->getFileName();
    $startLine = $r->getStartLine();
    echo $startLine.'    '.$file;
}

function get_fileWlink($id){
        $file = get_fileurl($id);
        return '<a href="'.$file.'" target="_blank">'.basename($file).'</a>';
}

//arbic detector
function auto_direction($string) {
    if(is_arabic($string)) {
         return '<p style="direction: rtl;text-align: right;">'.nl2br($string).'</p>';
    }else
    return nl2br($string);
}
function is_arabic($text){
if (preg_match('~\p{Arabic}~u', $text))
    return true;
else
    return false;
}

function logit2txt($page){
    $page = "\n\t$page\n---------\n";
     $page .= file_get_contents("errors.txt");
     file_put_contents("errors.txt", $page);
}


function set_statistics(){
    
   global $dbase,$ac; 
            $tbl = TBL_PIX.'statistics';
            $info['sta_browser'] = $ac->getBrowser($_SERVER['HTTP_USER_AGENT']);
            $info['sta_ip'] = $_SERVER['REMOTE_ADDR'];
            $info['sta_os'] =  $ac->getOS($_SERVER['HTTP_USER_AGENT']);
            $info['sta_ref'] = (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '');
            $info['sta_uid'] = user_uid();
            $info['sta_url'] = get_current_url();
            $dbase->RowInsert($tbl,$info);
    
}

function is_serialized($value, &$result = null)
{
	// Bit of a give away this one
	if (!is_string($value))
	{
		return false;
	}
	// Serialized false, return true. unserialize() returns false on an
	// invalid string or it could return false if the string is serialized
	// false, eliminate that possibility.
	if ($value === 'b:0;')
	{
		$result = false;
		return true;
	}
	$length	= strlen($value);
	$end	= '';
        
        
        if(!is_array($value)){
            $result = false;
		return true;
        } 
            
            switch ($value[0])
            {
                    case 's':
                            if ($value[$length - 2] !== '"')
                            {
                                    return false;
                            }
                    case 'b':
                    case 'i':
                    case 'd':
                            // This looks odd but it is quicker than isset()ing
                            $end .= ';';
                    case 'a':
                    case 'O':
                            $end .= '}';
                            if ($value[1] !== ':')
                            {
                                    return false;
                            }
                            switch ($value[2])
                            {
                                    case 0:
                                    case 1:
                                    case 2:
                                    case 3:
                                    case 4:
                                    case 5:
                                    case 6:
                                    case 7:
                                    case 8:
                                    case 9:
                                    break;
                                    default:
                                            return false;
                            }
                    case 'N':
                            $end .= ';';
                            if ($value[$length - 1] !== $end[0])
                            {
                                    return false;
                            }
                    break;
                    default:
                            return false;
            }
        
        
	if (($result = @unserialize($value)) === false)
	{
		$result = null;
		return false;
	}
	return true;
}

//addjs(DATA_CORE_PATH."/js/jquery-1.11.3.min.js");
//jquery-3.4.1.min.js
addjs(DATA_CORE_PATH."/js/jquery-3.4.1.min.js");
addjs(DATA_CORE_PATH."/js/def/js.js?url=".HOME);
addcss(DATA_CORE_PATH."/js/def/css.css?ver=27");
load_jsplug('bootstrap');
addcss(DATA_CORE_PATH."/font-awesome/css/font-awesome.min.css");
//load_jsplug('bootstrap-notify'); ?>