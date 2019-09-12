<?php

function clean_post($_P){
   
    
}

function to_mysqldate($date){
    $date = date('Y-m-d', strtotime(str_replace('-', '/', $date)));
    return $date;
}
function get_pre($value){
    $val = substr($value,0,3);
    return $val.'_';
}

function is_owner($pid, $tbl=''){
    if(is_loggedin()){
        if($tbl=='')
            $tbl=is_get('pg');
        global $dbase;

        $uid = user_uid();
        $fld_pre = get_pre(str_ireplace(TBL_PIX, '', $tbl));
        $tbl = TBL_PIX.str_ireplace(TBL_PIX, '', $tbl);
        $count = $dbase->num_rows("Select * from {$tbl} where {$fld_pre}uid={$uid} AND {$fld_pre}id={$pid}"); 
        return $count;
    }else{
        return false;
    }
}

function status2str($id){
    if($id=='0')
            $vl = '<span class="text-warning">Suspend</span>';
    elseif($id=='1')
        $vl = '<span class="text-success">Published</span>';
    elseif($id=='100')
        $vl = '<span class="text-danger">Deleted</span>';
    else
        $vl = 'Unknow';
    return $vl;
}


function post_content($part, $echo =false){
      $part = html_entity_decode($part);
    $part = str_ireplace('img src=&#39;', 'img src="', $part);
     $part = str_ireplace('&#39; alt=&#39;&#39;></figure>', '" alt=" Image Ooyta '.rand(0,11111).'"></figure>', $part);
      $part = str_ireplace('&#39;', '"', $part);
         if($echo)
              return '<p class="post-content">'.$part.'</p>';
             else
    return '<p class="post-content">'.$part.'</p>';
}

//////POST
	function r_f($fu){
		
		if (function_exists($fu)) 
			call_user_func($fu);
		else
		return '';
		
	}
	

	
	
function have_access($id, $type){
	global $dbase;
	$query = "SELECT acc_lvl FROM user_access WHERE acc_pid='".$id."' AND acc_uid='".user_uid()."' AND acc_type='".$type."' limit 1";
	//$result = $dbase->query($query);
	//if($result)
	$re = $dbase->fetch_row($query);
	return $re[0];
	//else
		//return false;
}
	
function to_date($val){
    return date('Y-m-d', strtotime($val)); 
}
function curr_date($format = 'Y-m-d'){
	echo date($format);
}
	
function post_query($query){
   
    
     unset($posts); unset($post); unset($post_count); unset($post_index);
    global $dbase;
    $post = null;
    $post_count = 0;
    $post_index = 0;
    global $posts, $post_count,$post_index ;
    $posts = array();
    
    //$maxtor = $dbase->query($query);
    
    $posts  =  $dbase->query2arr($query,true);
    if(have_post()){
        have_post();
        the_post();
        mk_func();
    }
}


//HAVE_POST FUNCTION
function have_post() {
global $posts, $post_count, $post_index;

if ($posts && ($post_index <= $post_count)){
    $post_count = count($posts);
    return true;

}
else {
    $post_count = 0;
    return false;
}
}

//THE_POST FUNCTION
function the_post() {
global $posts, $post, $post_count, $post_index;

//$post = new query($post1);
// make sure all the posts haven't already been looped through
if ($post_index > $post_count) {
    return false;
}
//$post = $posts[$post_count];
// retrieve the post data for the current index
if($post_index)
$post = $posts[$post_index-1];
else
$post = $posts[0];
//$posts = new query($job);
// increment the index for the next time this method is called
$post_index++;

return $post;

}
function reset_postquery($newpost){
     global $posts, $post;
     
     
      unset($posts); unset($post); unset($post_count); unset($post_index);
    global $dbase;
    $post = null;
    $post_count = 0;
    $post_index = 0;
    global $post_count,$post_index ;
   // $posts = array();
     
     
     $posts = $newpost;
     
     if(have_post()){
    have_post();
    the_post();
    mk_func();
    }
}
function clear_post(){
    
    global $posts, $post, $post_count, $post_index;
   unset($posts); unset($post); unset($post_count); unset($post_index);
}

function mk_func($post=''){
if($post==''){	
    global $post;
	
}
    $postx = $post;

    foreach ($postx as $key => $value) {
        if (is_int($key)) {
            unset($postx[$key]);
        }
    }

	foreach ($postx as $key => $value){
		
			eval( 'function ' . $key . '() { 
					global $post;
					 echo  $post[\''.$key.'\'];
                                         
					}');  
		
	}
	foreach ($postx as $key => $value){
		
			eval( 'function get_' . $key . '() { 
					 global $post;
					 return  $post[\''.$key.'\'];
                                          
					}');  
		
	}
	
	
}



function get_query($parm){
    
            $table = $parm['tbl'];
            $max = $parm['max'];
             $join = $parm['join'];
             $fields = $parm['fields'];
          //  $total = $parm['total'];
            
             global $dbase; //, $total, $max_num, $curpage;
           // $curpage = (is_get('page') ? is_get('page') : 1);
            
           // if ($curpage <= 0) $curpage = 1;
            // $max_num = (is_get('max') ? is_get('max'): 40);
             
             
           // $startpoint = ($curpage * $max_num) - $max_num;
            $order=" ORDER BY job_id DESC";
            $limit = " LIMIT $max";
            $join = " LEFT JOIN company ON jobs.job_employer=company.com_id";
            $main_query ="SELECT job_id,job_title, job_employer,job_provinces, job_closingdate, job_experience,company.com_name, job_slug  FROM jobs ";
            $where = " where job_status=0 ";
            $ss_query = $main_query .$join.$where.$order.$limit;
            $total = $dbase->num_rows($main_query .$join.$where.$order);
            global $total, $max_num;
}



///////////END POST

function upload_it($file,$settings = array()){
    $tmpfile = $file['tmp_name'];
    $filename = basename($file['name']);

//    $data = array('oy_upload' => curl_file_create($tmpfile, $file['type'], $filename),);
//
//    $ch = curl_init(get_api_url('media').'&key=399dnKdn&uid='.user_uid());   
//    curl_setopt($ch, CURLOPT_POST, true);
//    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
//
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//    $result = curl_exec($ch);
//   curl_close($ch);
//   //echo $result;
// 
//  // $result = rtrim($result, "\0");
//   $return = json_decode($result);
//   //echo json_last_error();
////var_dump($return);
//     // if(isset($return['error'])){
//    // return $return['error'];
//    //  }
//  // else{
    $uid = (user_uid() ? user_uid() : 0);
    
    $uppath =  UPLOAD_RPATH.'/'.$uid.'/'.date('m-Y').'/';
  $uppath =  str_ireplace('//', '/', $uppath);  
        if (!file_exists($uppath) && !is_dir($uppath)) 
              mkdir($uppath,0777);   
    
      chmod($uppath,0777); 
    $uppathpublic = str_ireplace(COREHOME,'',UPLOAD_PATH.'/'.$uid.'/'.date('m-Y').'/');
    $errors= array();
      $file_name = $file['name'];
      $file_size =$file['size'];
      $file_tmp =$file['tmp_name'];
      $file_type=$file['type'];
      $ex = (explode('.',$filename));
      $file_ext=strtolower(end($ex));
      
      $expensions= array("jpeg","jpg","png","doc","pdf","docx","xls","gif");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 5097152){
         $errors[]='File size must be excately 5 MB';
      }
      
      
      $upname = str_ireplace('.'.$file_ext,'',($file_name.'-'.rand(0,99999))).'.'.$file_ext;
      if(empty($errors)==true){
         if(!move_uploaded_file($file_tmp,  str_ireplace('//', '/', $uppath.$upname))){
             print_r($file);
             
             if (!is_writeable($uppathchmod )) {
                    echo ("Cannot write to destination file");
                 }
             
             //echo '<br/>'.$uppath.$upname;
         }else{
                    global $dbase;
                $dv['dat_type'] = $file_type;// $return->file_path; 
                 $dv['dat_url'] = $uppathpublic.$upname;// $return->file_path; 
                 $dv['dat_ext'] = $file_ext;//$return->file_dst_name_ext;
                 $dv['dat_access'] =(isset($settings['access']) ? $settings['access'] : 0);
                 $dv['dat_uid'] = (isset($settings['uid']) ? $settings['uid'] : user_uid());
                 $dv['dat_category'] = (isset($settings['category']) ? $settings['category'] : 'nocat');

                 $dbase->RowInsert( TBL_PIX."datafiles_oy",$dv);
                   // echo 'success';
                 $return['id']= $dbase->lastinserted_id();
                return $return;
         }
        // echo "Success";
      }else{
         return ($errors);
      }
    
    
    
    
    
  
   
     
    //   }
   

  
}




function pagination($total, $per_page = 10, $page = 1, $url = '?'){
    global $dbase;
    //$query = "SELECT COUNT(*) as `num` FROM {$query}";
    // $row = $dbase->fetch_array($quer);
    //$total = $dbase->num_rows($query);
    $adjacents = "2";
    $prevlabel = "&laquo;".g_lbl('pervious');
    $nextlabel = g_lbl('next')." &raquo;";
    $lastlabel = g_lbl('last')." &rsaquo;&rsaquo;";
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
?>