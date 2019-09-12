<?php
function theme_path($dir = ''){
    echo CRR_THEME_PATH . $dir;
}

function get_theme_path($dir = ''){
    return CRR_THEME_PATH . $dir;
}
function theme_pg_include($file){
    if(is_get('pg'))
        theme_include(is_get('pg') . DIRECTORY_SEPARATOR . $file); //include CRR_THEME_RPATH.is_get('pg').DIRECTORY_SEPARATOR.$file; 
    elseif(is_get('oypg'))
        theme_include(is_get('oypg') . DIRECTORY_SEPARATOR . $file); //include CRR_THEME_RPATH.is_get('oypg').DIRECTORY_SEPARATOR.$file; 
    else
        theme_include($file); // include CRR_THEME_RPATH.DIRECTORY_SEPARATOR.$file; 
}
function pg_include($name){
    include(CRR_PG_RPATH . $name);
}

function dev_include($name,$one=true){
    $name = str_ireplace('.php', '', $name);
    if(file_exists(RHOME . "oy_include".DIRECTORY_SEPARATOR."oy_developer".DIRECTORY_SEPARATOR . $name . '.php'))
        $path =  (RHOME . "oy_include".DIRECTORY_SEPARATOR."oy_developer".DIRECTORY_SEPARATOR . $name . '.php');
    elseif(file_exists(DEV_CORE_RPATH .DIRECTORY_SEPARATOR. $name . '.php'))
        $path =  (DEV_CORE_RPATH .DIRECTORY_SEPARATOR. $name  . '.php');
    else{
        $path=false; set_error("File Can't Fine :".$name.'.php'); //print_r( get_error());
    }
    if($path){
        if($one)
            include_once ($path);
        else
          include ($path);
    }
 
}


function load_page(){
    if(file_exists(PAGE_RPATH . '/config.php'))
        require_once(PAGE_RPATH . '/config.php');
    elseif(file_exists(CORE_PAGE_RPATH . '/config.php'))
         require_once(CORE_PAGE_RPATH . '/config.php');
    else{
        
    }
}
function theme_al_path($dir = '', $echo = true){
    if($echo)
    echo CORE_PATH . "oy_theme".DIRECTORY_SEPARATOR."def";
else
    return CORE_PATH . "oy_theme".DIRECTORY_SEPARATOR."def";
}
function theme_al_include($name){
    $name = str_ireplace('.php', '', $name);
    include_once (CORE_RPATH . "oy_theme".DIRECTORY_SEPARATOR."def".DIRECTORY_SEPARATOR . $name . '.php');
}
//CUSTOME THEME Include
//function theme_cu_include($name){
//        include_once (CORE_RPATH."oy_theme/def/".$name.'.php');
//}
function theme_include($name, $one = true){
    $name = str_ireplace('.php', '', $name);
 $name = str_ireplace('/', DIRECTORY_SEPARATOR, $name);
     $name = str_ireplace('\\', DIRECTORY_SEPARATOR, $name);
    if(file_exists(CRR_THEME_RPATH . $name . '.php'))
        $path =  (CRR_THEME_RPATH . $name . '.php');
    else
        $path =  (CORE_RPATH . "oy_theme".DIRECTORY_SEPARATOR."def".DIRECTORY_SEPARATOR . $name . '.php');
    
    if($one)
        include_once ($path);
        else
          include ($path);
        
      
}
function include_lang($name){
   $name = str_ireplace('.php', '', $name);
    if(file_exists(RHOME . "oy_languages" .DIRECTORY_SEPARATOR. $name . '.php'))
        include_once (RHOME . "oy_languages".DIRECTORY_SEPARATOR . $name . '.php');
    elseif(file_exists(CORE_RPATH . "oy_languages".DIRECTORY_SEPARATOR . $name . '.php'))
      include_once (CORE_RPATH . "oy_languages".DIRECTORY_SEPARATOR . $name . '.php');
}
function get_template($name, $language=array()){
     $name = str_ireplace('.tmp', '', $name);
    if(file_exists(RHOME . "oy_custom".DIRECTORY_SEPARATOR."template/" . $name . '.tmp'))
       $res = file_get_contents (RHOME . "oy_custom".DIRECTORY_SEPARATOR."template/" . $name . '.tmp');
    else
      $res =  file_get_contents (DATA_CORE_RPATH . "/template/" . $name . '.tmp');
    if(!empty($language))
      $res = translate_temp($res, $language);
    return $res;
}
function translate_temp($vl, $ar){
    foreach ($ar as $find => $replace)
      $vl =  str_ireplace($find, $replace, $vl);
    return $vl;
}

function page_include($file){
    $file = str_ireplace('.php', '', $file);
    //$file = str_ireplace(DIRECTORY_SEPARATOR, '', $file);
    if(file_exists(PAGE_RPATH . DIRECTORY_SEPARATOR . $file . '.php'))
        include PAGE_RPATH . DIRECTORY_SEPARATOR . $file . '.php';
    
    else{
        if(file_exists(CORE_RPATH . DIRECTORY_SEPARATOR."oy_pages".DIRECTORY_SEPARATOR . $file . '.php'))
            include CORE_RPATH . DIRECTORY_SEPARATOR."oy_pages".DIRECTORY_SEPARATOR . $file . '.php';
        //else
         //echo CORE_RPATH . DIRECTORY_SEPARATOR."oy_pages".DIRECTORY_SEPARATOR . $file . '.php';
    }
    
    
}
function class_include($file){
    $file = str_ireplace('.php', '', strtolower($file));
    //$file = str_ireplace(DIRECTORY_SEPARATOR, '', $file);
    $file = str_ireplace('.class', '', $file);
    include CORE_RPATH . "oy_classes/" . $file . '.class.php';
}
function func_include($file){
    $file = str_ireplace('.php', '', $file);
    //$file = str_ireplace(DIRECTORY_SEPARATOR, '', $file);
    $file = str_ireplace('.func', '', $file);
    include CORE_RPATH . "oy_functions/" . $file . '.func.php';
}
function oy_include($name){
    if(file_exists(RHOME . $name))
        include_once (RHOME . $name);
    else
        set_error('File Not Exists to include: '.RHOME . $name);
}
function oy_core_include($name){
    include_once (BASE_RPATH . $name);
}
function get_header($num = ''){
    $type= is_get('t');
    if(is_get('t') AND file_exists(CRR_THEME_RPATH.'header'.DIRECTORY_SEPARATOR.$type.'.php')){
        
        theme_include('header'.DIRECTORY_SEPARATOR.$type.'.php');  
    }else{
    if($num == '')
        theme_include('header.php');
    else
        theme_include('header-' . $num . '.php');
        }
}
function get_footer($num = ''){
      $type= is_get('t');
    if(is_get('t') AND file_exists(CRR_THEME_RPATH.'footer'.DIRECTORY_SEPARATOR.$type.'.php')){
        
        theme_include('footer'.DIRECTORY_SEPARATOR.$type.'.php');  
    }else{
    if($num == '')
        theme_include('footer.php');
    else
        theme_include('footer-' . $num . '.php');
    }
    //theme_include('footer.php');
}
function get_sidebar($num = ''){
        $type= is_get('t');
        
        
        if($type){
           // if($num == '')
                $type=$type.'-'.$num;
            if(is_get('t') AND file_exists(CRR_THEME_RPATH.'sidebar'.DIRECTORY_SEPARATOR.$type.'.php')){
                    theme_include('sidebar'.DIRECTORY_SEPARATOR.$type.'.php');  
                }else{
                if($num == '')
                    theme_include('sidebar.php');
                else
                    theme_include('sidebar-' . $num . '.php');
                }
            
        }else{
            
     
    if($num == '')
        theme_include('sidebar.php');
    else
        theme_include('sidebar-' . $num . '.php');
    }
}

function get_pg_sidebar($num = ''){
    if($num == '')
        theme_pg_include('sidebar.php');
    else
        theme_pg_include('sidebar-' . $num . '.php');
}


class temLoader{
    public $styles = array();
    public $headline = array();
    public $scripts = array();
    public $plugin_url;
    public $inlinejs = array();
    public function __construct(){
        //  $this->plugin_url = plugins_url( DIRECTORY_SEPARATOR, __FILE__ );
    }
    
    public function addstyle($url){
        $url = str_ireplace('\\', '/', $url);
        $this->styles[] = $url;
    }
    public function addscript($url){
        $url = str_ireplace('\\', '/', $url);
        $this->scripts[] = $url;
    }
    public function addinlinejs($url){
        $this->inlinejs[] = $url . PHP_EOL . '/* NEW */' . PHP_EOL;
    }
    public function enqueueAll(){
    }
    public function loadjs(){
        foreach($this->scripts as $js)
            echo ('<script src="' . str_ireplace(DIRECTORY_SEPARATOR, '/', $js) . '" type="text/javascript"></script>' . PHP_EOL);
    }
    public function loadinlinejs(){
        echo '<script type="text/javascript">';
        foreach($this->inlinejs as $js)
            echo ($js);
        echo ' </script>' . PHP_EOL;
    }
    public function loadcss(){
        foreach($this->styles as $style)
            echo ('<link href="' . str_ireplace(DIRECTORY_SEPARATOR, '/', $style) . '" rel="stylesheet" type="text/css" />' . PHP_EOL);
    }
     public function getjsfiles(){
        $var = $this->scripts;
        return $var;
    }
    public function getcssfiles(){
        $var = $this->styles;
        return $var;
    }
    public function addheadline($line){
        $this->headline[] = $line;
    }
    public function loadhead(){
        foreach($this->headline as $line)
            echo ($line.PHP_EOL);
    }
}
$temLoader = new temLoader;
function load_js(){
 
if(is_error()){
 
 $OK = "
$(function() {

$.notify({
	// options
	icon: 'glyphicon glyphicon-warning-sign',
	title: '::title',
	message: \"::text\",
	url: 'https://github.com/mouse0270/bootstrap-notify',
	target: '_blank'
},{
	// settings
	type: \"::type\",
	allow_dismiss: true,
	newest_on_top: true,
	showProgressbar: true,
	placement: {
		from: \"bottom\",
		align: \"right\"
	},
	delay: 20000,
	timer: 1000,
	animate: {
		enter: 'animated fadeInRight',
		exit: 'animated fadeOutRight'
	},
	template: '<div data-notify=\"container\" class=\"col-xs-11 col-sm-3 alert alert-{0}\" role=\"alert\">' +
		'<button type=\"button\" aria-hidden=\"true\" class=\"close\" data-notify=\"dismiss\">×</button>' +
		'' +
		'<h4 data-notify=\"title\">{1}</h4> ' +
		'<span data-notify=\"message\">{2}</span>' +
		'<div class=\"progress\" data-notify=\"progressbar\">' +
			'<div class=\"progress-bar progress-bar-{0}\" role=\"progressbar\" aria-valuenow=\"0\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 0%;\"></div>' +
		'</div>' +
		'' +
	'</div>' 
});



});

 ";
$x = get_error();
foreach($x as $y){
   $contents = str_replace(array_keys($y), array_values($y),$OK);addlinejs($contents);
}

}

    global $temLoader;
    echo '<!--- SYSTEM AUTO JS LOADER-START -->' . PHP_EOL;
    $temLoader->loadjs();
    //echo '<script src="' . HOME.'?API=js' . '" type="text/javascript"></script>';
    $temLoader->loadinlinejs();
    echo '<!--- SYSTEM AUTO JS LOADER-END -->' . PHP_EOL;
}
function load_css(){
    global $temLoader;
    echo '<!--- SYSTEM AUTO CSS LOADER-START -->' . PHP_EOL;
    $temLoader->loadcss();
   //echo '<link href="' . HOME.'?API=css' . '" rel="stylesheet" type="text/css" />';
   // echo HOME.'?API=css';
    //$temLoader->loadinlinejs();
    echo '<!--- SYSTEM AUTO CSS LOADER-END -->' . PHP_EOL;
}

function load_headline(){
    global $temLoader;
    $temLoader->loadhead();
}
function addheadline($url){
    global $temLoader;
    $temLoader->addheadline($url);
}
function addcss($url){
    global $temLoader;
    $temLoader->addstyle($url);
}
function addjs($url){
    global $temLoader;
    $temLoader->addscript($url);
}
function addlinejs($script){
    global $temLoader;
    $temLoader->addinlinejs($script);
}
function load_jsplug($url){
    foreach(glob(DATA_CORE_RPATH . '/oy_jslib/' . $url . "/*.js") as $file){
        //addjs(DATA_CORE_PATH."/".$url.DIRECTORY_SEPARATOR.$file);
        addjs(DATA_CORE_PATH . "/oy_jslib/" . $url . "/" . basename($file));
    }
    foreach(glob(DATA_CORE_RPATH . '/oy_jslib/' . $url . "/*.css") as $file){
        //addjs(DATA_CORE_PATH."/".$url.DIRECTORY_SEPARATOR.$file);
        addcss(DATA_CORE_PATH . "/oy_jslib/" . $url . DIRECTORY_SEPARATOR . basename($file));
    }
}









//Header
function get_pgtitle(){
    global $oy_pagetitle;
    echo $oy_pagetitle;
}
function set_pgtitle($title){
    global $oy_pagetitle;
    $oy_pagetitle = $title;
}


function get_pgdesc(){
    global $oy_pagedesc;
if(empty($oy_pagedesc))
   $oy_pagedesc = DEF_PGDESC; 
            
    echo $oy_pagedesc;
}

function get_pgphoto(){
    global $oy_pgphoto;
if(empty($oy_pgphoto))
   $oy_pgphoto = "https://ooyta.com/oy_engine/oy_theme/def/images/sociallogo.jpg"; 
            
    echo str_ireplace('https:', 'http:', $oy_pgphoto);
}

function get_pgcolor($echo = true){
    global $oy_pgcolor;
if(empty($oy_pgcolor))
   $oy_pgcolor = "blue-light"; 
            if($echo)
    echo $oy_pgcolor;
            else 
                return $oy_pgcolor;
}

function set_pgcolor($value){
    global $oy_pgcolor;
    $oy_pgcolor = $value;
}

function set_pgphoto($title){
    global $oy_pgphoto;
    $oy_pgphoto = $title;
}

function set_pgdesc($title){
    global $oy_pagedesc;
    $oy_pagedesc = $title;
}

function get_pgkeyword(){
    global $oy_pagekeyword;
    if(empty($oy_pagedesc))
   $oy_pagedesc = DEF_PGKEYWORD; 
    
    echo $oy_pagekeyword;
}
function set_pgkeyword($title){
    global $oy_pagekeyword;
    $oy_pagekeyword = $title;
}




function sanitize_output($buffer) {
    require_once(CORE_RPATH.'oy_classes/min/lib/Minify/HTML.php');
    require_once(CORE_RPATH.'oy_classes/min/lib/Minify/CSS.php');
    require_once(CORE_RPATH.'oy_classes/min/lib/JSMin.php');
    $buffer = Minify_HTML::minify($buffer, array(
        'cssMinifier' => array('Minify_CSS', 'minify'),
        'jsMinifier' => array('JSMin', 'minify')
    ));
	
	$search = array(
        '/\>[^\S ]+/s',  // strip whitespaces after tags, except space
        '/[^\S ]+\</s',  // strip whitespaces before tags, except space
        '/(\s)+/s'       // shorten multiple whitespace sequences
    );

    $replace = array(
        '>',
        '<',
        '\\1'
    );

$buffer = preg_replace($search, $replace, $buffer);
$buffer =  str_replace(PHP_EOL, ' ', $buffer);
$buffer =  str_replace("\n", ' ', $buffer);
//$buffer =  str_replace(DIRECTORY_SEPARATOR, "/", $buffer);
//$buffer =  str_replace(HOME, './', $buffer);
//Emotions
//$buffer =  str_ireplace(":d", '<img src="'.DATA_CORE_PATH.'/img/yemoicon/4.gif" />', $buffer);
//$buffer =  str_ireplace("|-)", '<img src="'.DATA_CORE_PATH.'/img/yemoicon/28.gif" />', $buffer);
//$buffer =  str_ireplace("i-)", '<img src="'.DATA_CORE_PATH.'/img/yemoicon/28.gif" />', $buffer);
//$buffer =  str_ireplace(":x", '<img src="'.DATA_CORE_PATH.'/img/yemoicon/8.gif" />', $buffer);
//$buffer =  str_ireplace("<3", '<img src="'.DATA_CORE_PATH.'/img/yemoicon/8.gif" />', $buffer);
    return $buffer;
}
?>