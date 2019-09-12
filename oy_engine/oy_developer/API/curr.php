<?php 
//define("ENVIRONMENT",'Development' ); 
//require_once '../oy_engine/oy_core/oy_classes/db-mysql.class.php';
//error_reporting(1);
//ini_set('display_errors', 'On');
//                     //   ini_set("error_log", "/var/www/html/errors.txt");
//
//
//  $constring="localhost:jobportal:root:Naser433@11";
//   $dbase = new oy_db($constring);

global $dbase;
      $dat = date('Y-m-d');
$check = $dbase->check_duplicate_m('sob_currencyex', " cur_date='{$dat}'");

if(!$check){

$homepage = file_get_contents('http://dab.gov.af/en/DAB/currency');
$source = get_tbl($homepage);
//echo $source;

$arr = explode('<tr>', $source);

unset($arr[0]);
unset($arr[1]);
unset($arr[2]);
foreach($arr as $curr){
  $cur= explode('<td>', $curr);

  $cury=trim(str_ireplace('</td>','', $cur[1]));
  $curx = convert_to($cury);
   $db['cur_currencyto']=14234;
   $db['cur_date']=$dat;
    $db['cur_currency']=$curx;
    $db['cur_sell']=$cur[2];
    $db['cur_buy']=$cur[3];
 
$dbase->RowInsert('sob_currencyex', $db);
  echo 'cur_currency='.$curx.', cur_currencyto=14234: '.' cur_sell='.$cur[2].', cur_buy='.$cur[3].', cur_date='.$dat.'<br/>';
}
}else{
    echo 'Already Done.';
}


    
    function convert_to($cury){
        switch ($cury) {
    case 'USD':
        $curx = 14384;
        break;
     case 'EURO':
        $curx = 14282;
        break;
     case 'POUND':
        $curx = 14285;
        break;
    
     case 'SWISS':
        $curx = 14262;
        break;
     case 'INR':
        $curx = 14300;
        break;
     case 'PKR':
        $curx = 14351;
        break;
     case 'TOMAN':
        $curx = 14302;
        break;
     case 'RIYAL':
        $curx = 14359;
        break;
     case 'DIRHAM':
        $curx = 14233;
        break;
    
}
        
        return $curx;
    }
    
    
    function get_tbl( $xml ) {
    //<h4><strong>Date</strong>: 02 February 2016</h4>
        $dtext = date('d F Y'); //echo $dtext;
        $tag_regex = '/<h4><strong>Date<\\/strong>[^>]*'.$dtext.'<\\/h4>[^>]*<table>(.*?)<\\/table>/si';

        preg_match($tag_regex,$xml,$matches);
        return (isset($matches[1]) ? $matches[1] :'');
    }
    
?>