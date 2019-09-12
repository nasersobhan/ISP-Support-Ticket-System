<?php
function theme_path($dir = ''){
    echo CRR_THEME_PATH . $dir;
}
function theme_pg_include($file){
    if(is_get('pg'))
        theme_include(is_get('pg') . '/' . $file); //include CRR_THEME_RPATH.is_get('pg').'/'.$file; 
    elseif(is_get('oypg'))
        theme_include(is_get('oypg') . '/' . $file); //include CRR_THEME_RPATH.is_get('oypg').'/'.$file; 
    else
        theme_include($file); // include CRR_THEME_RPATH.'/'.$file; 
}
function pg_include($name){
    include(CRR_PG_RPATH . $name);
}

function dev_include($name){
    include(DEV_CORE_RPATH . $name);
}
function theme_al_path($dir = '', $echo = true){
    if($echo)
    echo CORE_PATH . "oy_theme/def";
else
    return CORE_PATH . "oy_theme/def";
}
function theme_al_include($name){
    $name = str_ireplace('.php', '', $name);
    include_once (CORE_RPATH . "oy_theme/def/" . $name . '.php');
}
//CUSTOME THEME Include
//function theme_cu_include($name){
//        include_once (CORE_RPATH."oy_theme/def/".$name.'.php');
//}
function theme_include($name, $one = true){
    $name = str_ireplace('.php', '', $name);
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
    if(file_exists(RHOME . "oy_languages/LANG-" . $name . '.php'))
        include_once (RHOME . "oy_languages/LANG-" . $name . '.php');
    else
      include_once (CORE_RPATH . "oy_languages/LANG-" . $name . '.php');
}
function get_template($name, $language=array()){
     $name = str_ireplace('.tmp', '', $name);
    if(file_exists(RHOME . "oy_custom/template/" . $name . '.tmp'))
       $res = file_get_contents (RHOME . "oy_custom/template/" . $name . '.tmp');
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
    //$file = str_ireplace('/', '', $file);
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
    //$file = str_ireplace('/', '', $file);
    $file = str_ireplace('.class', '', $file);
    include CORE_RPATH . "oy_classes/" . $file . '.class.php';
}
function func_include($file){
    $file = str_ireplace('.php', '', $file);
    //$file = str_ireplace('/', '', $file);
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
    if($num == '')
        theme_include('footer.php');
    else
        theme_include('footer-' . $num . '.php');
    //theme_include('footer.php');
}
function get_sidebar($num = ''){
    if($num == '')
        theme_include('sidebar.php');
    else
        theme_include('sidebar-' . $num . '.php');
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
        //  $this->plugin_url = plugins_url( '/', __FILE__ );
    }
    
    public function addstyle($url){
        $this->styles[] = $url;
    }
    public function addscript($url){
        $this->scripts[] = $url;
    }
    public function addinlinejs($url){
        $this->inlinejs[] = $url . PHP_EOL . '/* NEW */' . PHP_EOL;
    }
    public function enqueueAll(){
    }
    public function loadjs(){
        foreach($this->scripts as $js)
            echo ('<script src="' . $js . '" type="text/javascript"></script>' . PHP_EOL);
    }
    public function loadinlinejs(){
        echo '<script type="text/javascript">';
        foreach($this->inlinejs as $js)
            echo ($js);
        echo ' </script>' . PHP_EOL;
    }
     public function loadcss(){
        foreach($this->styles as $style)
            echo ('<link href="' . $style . '" rel="stylesheet" type="text/css" />' . PHP_EOL);
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
    $temLoader->loadinlinejs();
    echo '<!--- SYSTEM AUTO JS LOADER-END -->' . PHP_EOL;
}
function load_css(){
    global $temLoader;
    echo '<!--- SYSTEM AUTO CSS LOADER-START -->' . PHP_EOL;
    $temLoader->loadcss();
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
        //addjs(DATA_CORE_PATH."/".$url.'/'.$file);
        addjs(DATA_CORE_PATH . "/oy_jslib/" . $url . "/" . basename($file));
    }
    foreach(glob(DATA_CORE_RPATH . '/oy_jslib/' . $url . "/*.css") as $file){
        //addjs(DATA_CORE_PATH."/".$url.'/'.$file);
        addcss(DATA_CORE_PATH . "/oy_jslib/" . $url . '/' . basename($file));
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