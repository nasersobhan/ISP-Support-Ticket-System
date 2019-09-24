<?php

func_include('posts');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//echo where_is_it(get_ex_curr);

    function add_fin($arr=array(),$inorout='i'){
        $db['fin_cid']=$arr['cid'];
         $db['fin_amont']=$arr['amont'];
          $db['	fin_mt']=$arr['mt'];
           $db['fin_outorin']=$inorout;
            $db['fin_refid']=$arr['rid'];
             $db['fin_reftbl']=$arr['tbl'];
             global $dbase;
           return  $dbase->RowInsert($db,'sob_finance');
    }
    
    
    function Agotime_fa($date){
    if(empty($date)){
        return "تاریخ مورد قبول نیست";
    }
    $periods = array("ثانیه", "دقیقه", "ساعت", "روز", "هفته", "ماه", "سال", "قرن");
    $lengths = array("60", "60", "24", "7", "4.35", "12", "10");
    $now = time();
    $unix_date = strtotime($date);
    // check validity of date
    if(empty($unix_date)){
        return "تاریخ غلط";
    }
    // is it future date or past date
    if($now > $unix_date){
        $difference = $now - $unix_date;
        $tense = "پیش";
    }else{
        $difference = $unix_date - $now;
        $tense = "بعد";
    }
    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; $j++){
        $difference /= $lengths[$j];
    }
    $difference = round($difference);
    if($difference != 1){
        $periods[$j].= "";
    }
    return "$difference $periods[$j] {$tense}";
}

 







 //class_include('jdatetime');
function get_jdate($str = "l j F Y H:i:s"){
    
//     $date = new jDateTime(true, true, 'Asia/kabul');
//    if(!$y OR !$m OR !$d){
//         
//    }
//    
//   //$result =  $date->date($str);
//    
//    $re = $date->toJalali($y,$m,$d);
//    $time =  $date->mktime(0,0,0,$re[1],$re[2],$re[0]);
//    //echo $y.$m.$d;
//    
            $y = date('Y-m-d'); 
         //  $m=date('m');
          // $d = date('d');// echo $y.$m.$d;
   return gregorian_to_jalali($y,$str);
  //  return  $date->date("Y/m/d", $time);
}


function jalali_to_gregorian($fromdate,$sep='l j F Y H:i:s'){
        
     $date = new jDateTime(true, true, 'Asia/kabul');
//    if(!$y OR !$m OR !$d){
//           $y = date('y'); 
//           $m=date('m');
//           $d = date('d'); 
//    }
    
  // $result =  $date->date($str);
    
     $time=strtotime($fromdate);
    $m=date("m",$time);
    $y=date("Y",$time);
     $d=date("d",$time);
     
     
     $h=date("H",$time);
     $i=date("i",$time);
     $s=date("s",$time);
    
     
     
     
    $re = $date->toGregorian($y,$m,$d);
    $time =  $date->mktime($h,$i,$s,$re[1],$re[2],$re[0]);
    //echo $y.$m.$d;
    return $date->date($sep, $time,false);
}

function gregorian_to_jalali($fromdate,$sep='l j F Y H:i:s'){
        
     $date = new jDateTime(true, true, 'Asia/kabul');
    
     $time=strtotime($fromdate);
    $m=date("m",$time);
    $y=date("Y",$time);
     $d=date("d",$time);
     
     
     $h=date("H",$time);
     $i=date("i",$time);
     $s=date("s",$time);
    
     
    $re = $date->toJalali($y,$m,$d);
    $time =  $date->mktime($h,$i,$s,$re[1],$re[2],$re[0]);
    //echo $y.$m.$d;
    
   // date($format, $stamp = false, $convert = null, $jalali = null, $timezone = null)
    return $date->date($sep, $time,false);
}

function valDate($value,$format ="j F Y"){
    if(tis_shamsi()){
    $ret =  gregorian_to_jalali($value,$format)   ;
    }else{
        $ret =  date($format, strtotime($value)); 
    }
    
    return $ret;
    
}

function tis_shamsi(){
    $value = get_setting('datetype');
    if($value=='2')
        return true;
    elseif($value=='1')
        return false;
    
}


function get_comtype($value){
   $value = get_typeof($value);
   return g_lbl($value);
}


function eoe2label($num,$type='o'){
    $retu = '';
    if($type=='m'){
        switch ($num) {
            case 1:
                $retu = g_lbl('eoe1mon');;
                break;
            case 2:
                $retu =  g_lbl('eoe2mon');
                break;
            case 5:
                $retu =  g_lbl('eoe5mon');
                break;
            case 7:
                $retu =  g_lbl('eoe7mon');
                break;
            default:
                $retu =  g_lbl('unvalid');
        }
    }
    
    
        if($type=='o'){
        switch ($num) {
            case 1:
                $retu =  g_lbl('eoe1oil');
                break;
            case 2:
                $retu =  g_lbl('eoe2oil');
                break;
            default:
                $retu =  g_lbl('unvalid');
        }
    }
    
 return $retu;   
}



function get_15daysre(){
//    $date = date("Y-m-d");// current date
//    $xdays = 10;

//$dates = array();
//for ($i = 1; $i <= $xdays; $i++) {
//    $dates[$i] = date('Y-m-d',strtotime(date("Y-m-d", strtotime($date)) . "-".$i." day"));
//}
// 
 $dshamsi = '';
       if(tis_shamsi()){
           $dshamsi = 's';
       }
 global $dbase;
 
 $datex2 = array();
 
$result = $dbase->query("SELECT imp_{$dshamsi}date as dateon,sum(imp_total) as tolx FROM `sob_impexp` where imp_eoe=1 GROUP BY imp_{$dshamsi}date ORDER by imp_{$dshamsi}date DESC LIMIT 15");

 while($row = $dbase->fetch_array($result))
	  {
		if(!empty($row['tolx']))
                    $datex2[$row['dateon']]['sell'] = $row['tolx'];
                    else
                       $datex2[$row['dateon']]['sell'] =0; 
	  }
          
//$row = $dbase->fetch_array($result);


 //}
 
 
  //foreach($dates as $i => $date2){
$result2 = $dbase->query("SELECT imp_{$dshamsi}date as dateon,sum(imp_total) as tolx FROM `sob_impexp` where imp_eoe=2 GROUP BY imp_{$dshamsi}date ORDER by imp_{$dshamsi}date DESC LIMIT 15");

 while($row2 = $dbase->fetch_array($result2)){
    if(!empty($row2['tolx']))
    $datex2[$row2['dateon']]['buy'] = $row2['tolx'];
    else
       $datex2[$row2['dateon']]['buy'] =0; 
 }

    
 //}
return $datex2;
    
    
}


function allcoms(){
    global $dbase;
 $result2 = $dbase->query("SELECT DISTINCT(`imp_name`) FROM `sob_impexp` WHERE imp_stat=0"); 
 $row2 = $dbase->fetch_array($result2);
 $imp_cos = $row2;
 
  $result3 = $dbase->query("SELECT DISTINCT(`mon_name`) FROM `sob_money` where mon_stat=0"); 
 $row3 = $dbase->fetch_array($result3);
 $mon_cos = $row3;
 $allcomes = join($row2,$row3);
 return $allcomes;
}


function checkforupdate(){
    $res=false;
    if(!newupdate()){
    $curentVer = trim(get_licence());
    $getVersions = file_get_contents('http://update.ooyta.com/qatra/ver.php?id=18884&ver='.$curentVer);

if ($getVersions != '')
{
    $versionList = explode("\n", $getVersions);
    foreach ($versionList as $aV)
	{
          $aVs = explode("*", trim($aV));
            $aV = trim($aVs[0]);

		if ( $aV > $curentVer){
                $res = $aV; set_setting('update', 1);}

        }

}
    }
  return $res;      
}
function newupdate(){
   $res = (get_setting('update')=='1' ? true : false);
    return $res; 
}


function get_licence(){
    
    $res = get_setting('licence');
    if(!$res){
        set_setting('licence', 'TRIAL');
        set_setting('TRIAL', date('Y-m-d'));
        $res = "TRIAL";
    }
  // $res = (=='0' ? true : false);
    return $res; 
}


function get_sitever(){
    return  file_get_contents('./ver');
}

function set_ver($er){
    file_put_contents('./ver', $er);
}


check_licence();
function check_licence(){
 /*  $le = get_licence();

       $leinfo = true; //file_get_contents('http://update.ooyta.com/qatra/li.php?id='.$le.'&ver='.get_sitever());
       
       if($leinfo){
            $json_a = json_decode($leinfo, true);
            set_setting('TRIAL', date('Y-m-d'));
            set_setting('companyname', $json_a['company']);
            if($json_a['status']!='active')
                 oy_die('Liecence Expired');
       
       }else{
            $tdate = get_setting('TRIAL');
       $ndate = date('Y-m-d');
       if(!$tdate)
           oy_die('Liecence Expired');
       if ($tdate < $ndate) {
           oy_die('Liecence Expired');
       }
       }

*/
   
}
function get_ssmsg(){
    
     $curentVer = trim(get_licence());
    $getVersions = file_get_contents('http://update.ooyta.com/qatra/msg.php?id='.$curentVer);
    
    if ($getVersions != ''){
        set_setting('ssmsg',$getVersions);
        return $getVersions;
    }else{
        return get_setting('ssmsg');
    }
}



function get_userList($dep = 0, $site = 0, $rank = 0, $term = false){

    global $dbase;
    $where = ' WHERE sob_status = 1 ';

    if($dep <> 0){
        $where .= ' AND sob_dep='.$dep; 
    }

    if($site <> 0){
        $where .= ' AND sob_site='.$site; 
    }

    if($rank <> 0){
        $where .= ' AND sob_rank='.$rank; 
    }

    if($term) {
        $where .= " AND (sob_name LIKE'%".$term."%' OR sob_user LIKE'%".$term."%' OR sob_email LIKE'%".$term."%') "; 
    }
    $rows = $dbase->tbl2array2('sob_users','sob_id,sob_name',$where);
    return $rows;
}


function add_notification($title, $uid, $type, $url, $color = 'info', $label = false){
    $tbl = 'sob_notifications';
    global $dbase;
    if($color)
        $data['not_color'] = $color;
    if($label)
        $data['not_label'] = $label;

    $data['not_title'] = $title;
    $data['not_uid'] = $uid;
    $data['not_type'] = $type;
    $data['not_url'] = $url;
    $dbase->RowInsert($tbl,$data);
}

function read_notification($id = false){
    global $dbase;
    $uid = user_uid();
    if(!$id && is_get('nrid'))
        $id = is_get('nrid');
     if($id) {
        $where = ' WHERE not_uid='.$uid;
        $where .= ' AND not_id='.$id;
        $dbase->RowUpdate('sob_notifications', ['not_status'=>2], $where);
     }  

}
if(is_get('nrid')){
    read_notification();
}


function toidlabel($id){
    if(substr($id, 0, 2 ) === "u:") {
        $id = str_replace("u:",'',$id);
        $label = user_name_ex($id);
      } 
      else {
        $id = str_replace("d:",'',$id);
        $id = str_replace("g:",'',$id);
        $id = str_replace("s:",'',$id);
        $label = get_cate_name($id);
      }
      return $label;
}


// function user_site(){
//     return $_SESSION[UKEY]['site'];
// }

// function user_dep(){
//     return $_SESSION[UKEY]['dep'];
// }


function get_usersfromgroup($gid){
    global $dbase;
    $gid = str_replace("g:",'',$gid);
    $userlist = [];
    $rows = $dbase->tbl2array2('sob_ugroups','ugr_userid', " WHERE ugr_status=1 AND ugr_gid={$gid}");
    foreach($rows as $user)
    $userlist[] = $user['ugr_userid'];
    return $userlist;
  }

  function personlistype($id){
    if (substr($id, 0, 2) === "u:") {
        return 'user';
    }elseif(substr($id, 0, 2) === "g:"){
        return 'group';
    }elseif(substr($id, 0, 2) === "s:"){
        return 'site';
    }elseif(substr($id, 0, 2) === "d:"){
        return 'dep';
    }
  }



  /// tickets

  function get_ticket($pid, $field){

    global $dbase;
    $tbl = 'tickets';
    $uid = user_uid();
    $fld_pre = get_pre(str_ireplace(TBL_PIX, '', $tbl));
    $tbl = TBL_PIX.str_ireplace(TBL_PIX, '', $tbl);
    $field_value = $dbase->get_single($tbl, $fld_pre.'id', $pid, $fld_pre.$field); 
    return $field_value;
  }


  function get_highrankuid($uid = false){
    $uid = user_uid();
    $site = user_site();
    $dep = user_dep();
    $rank = user_rank();
    $hrank = 99;
    if($rank == 1)
        $hrank = 2;
    elseif($rank == 2)
        $hrank = 3;
    
    $users = get_userList($dep, $site, $hrank);
    return $users;
  }



  function get_unread_messages(){
    global $dbase;
    $uid = user_uid();
    $where = ' WHERE mes_read=0 AND mes_status = 1 AND mes_tid='.$uid;
    return $dbase->num_rows('SELECT mes_id FROM sob_message'. $where);
  }

  
  
function pagination_local($total, $per_page = 10, $page = 1, $url = '?'){
    global $dbase;
    //$query = "SELECT COUNT(*) as `num` FROM {$query}";
    // $row = $dbase->fetch_array($quer);
    //$total = $dbase->num_rows($query);
    $adjacents = "2";
    $prevlabel = "&laquo; قبلی";
    $nextlabel = "بعدی &raquo;";
    $lastlabel = "آخرین &rsaquo;&rsaquo;";
    $page = ($page == 0 ? 1 : $page);
    $start = ($page - 1) * $per_page;
    $prev = $page - 1;
    $next = $page + 1;
    $lastpage = ceil($total / $per_page);
    $lpm1 = $lastpage - 1; // //last page minus 1
    $pagination = "";
    //if(is_get('page'))
    $url = remove_querystring_var($url, 'page');
  //$str = preg_replace('/\bblank$/', '', $str);

        $prx_url='&';
    
    
    if($lastpage > 1){
        $pagination .= "<ul class=\"pagination\" style=\"margin:0; padding:0\">";
        // $pagination .= "<li class='next'>Page {$page} of {$lastpage}</li>";
        if($page > 1)
            $pagination.= "<li><a href='{$url}{$prx_url}page={$prev}'>{$prevlabel}</a></li>";
        if($lastpage < 7 + ($adjacents * 2)){
            for($counter = 1; $counter <= $lastpage; $counter++){
                if($counter == $page)
                    $pagination.= "<li class=\"active\"><a >{$counter}</a></li>";
                else{
                    if($counter == 1)
                        $pagination.= "<li><a href='{$url}'>{$counter}</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}{$prx_url}page={$counter}'>{$counter}</a></li>";
                }
            }
        } elseif($lastpage > 5 + ($adjacents * 2)){
            if($page < 1 + ($adjacents * 2)){
                for($counter = 1; $counter < 4 + ($adjacents * 2); $counter++){
                    if($counter == $page)
                        $pagination.= "<li class=\"active\"><a >{$counter}</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}{$prx_url}page={$counter}'>{$counter}</a></li>";
                }
              //  $pagination.= "<li class='dot'>...</li>";
                $pagination.= "<li><a href='{$url}{$prx_url}page={$lpm1}'>{$lpm1}</a></li>";
                $pagination.= "<li><a href='{$url}{$prx_url}page={$lastpage}'>{$lastpage}</a></li>";
            } elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)){
                $pagination.= "<li><a href='{$url}'>1</a></li>";
                $pagination.= "<li><a href='{$url}{$prx_url}page=2'>2</a></li>";
               // $pagination.= "<li class='dot'>...</li>";
                for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++){
                    if($counter == $page)
                        $pagination.= "<li class=\"active\"><a >{$counter}</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}{$prx_url}page={$counter}'>{$counter}</a></li>";
                }
               // $pagination.= "<li class=\"active\">..</li>";
                $pagination.= "<li><a href='{$url}{$prx_url}page={$lpm1}'>{$lpm1}</a></li>";
                $pagination.= "<li><a href='{$url}{$prx_url}page={$lastpage}'>{$lastpage}</a></li>";
            } else{
                $pagination.= "<li><a href='{$url}'>1</a></li>";
                $pagination.= "<li><a href='{$url}{$prx_url}page=2'>2</a></li>";
               // $pagination.= "<li class='dot'>..</li>";
                for($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++){
                    if($counter == $page)
                        $pagination.= "<li class=\"active\"><a>{$counter}</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}{$prx_url}page={$counter}'>{$counter}</a></li>";
                }
            }
        }
        if($page < $counter - 1){
            $pagination.= "<li><a href='{$url}{$prx_url}page={$next}'>{$nextlabel}</a></li>";
           // $pagination.= "<li><a href='{$url}{$prx_url}page=$lastpage'>{$lastlabel}</a></li>";
        }
        $pagination.= "</ul>";
    }
    if(DYNAMIC_URL){
        $pagination = str_replace('&page=', '/page/', $pagination);
        $pagination = str_replace('?page=', '/page/', $pagination);
        return $pagination;
    }else
        return $pagination;
}


function user_image($uid = false){
    if($uid == false)
    $uid = user_uid();
    return HOME.'files/'.user_photo($uid);

}