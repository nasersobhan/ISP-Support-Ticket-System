<?php 


function cache_set($key, $val) {
   $val = var_export($val, true);
   // HHVM fails at __set_state, so just use object cast for now
   $val = str_replace('stdClass::__set_state', '(object)', $val);
   // Write to temp file first to ensure atomicity
   $tmp = CACHE_DIR."fc/$key." . uniqid('', true) . '.tmp';
   if(file_exists($tmp))
   file_put_contents($tmp, '<?php $val = ' . $val . ';', LOCK_EX);
// loggersave('save cache'.$tmp);
   //rename($tmp, "/var/www/html/cache/$key");
}


function cache_get($key,$cache_time = 60) {
$cfile = CACHE_DIR."fc/$key";
if(file_exists($cfile))
	if(time() - $cache_time < filemtime($cfile))
    	@include $cfile;
	else
    	unlink($cfile);
return isset($val) ? $val : false;
}



function get_cache_part($name){
   global $LastTableUpdateTime;
   $lang = (is_get('lang') ? is_get('lang') : 'en');
  $islogin= is_loggedin();
  $uid = user_uid();
if(!isset($LastTableUpdateTime) OR empty($LastTableUpdateTime))
  $t = 'live';
else 
  $t = md5($LastTableUpdateTime);

  //oyLog($name .' : '.$LastTableUpdateTime . ' URL: ' .get_current_url(), 'cache');

$cache_file =  CACHE_DIR.$name.$lang.$t.$uid.'.c';

if($t != 'live' AND file_exists($cache_file)){
  if(strtotime($LastTableUpdateTime) > filemtime($cache_file)){
    array_map('unlink', glob(CACHE_DIR.$name."*.c"));
  }
}
return ($cache_file); 

}


function cache_part_set($cache_file){
  $output = ob_get_contents();
  $output = sanitize_output($output);
  file_put_contents($cache_file, $output); 
  ob_end_flush();
}