<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//loginrequired();
if(is_get('key')=='399dnKdn'){
if(isset($_GET['uid']))
    $uid = $_GET['uid'];
else
    $uid = 0;



class_include('ext.upload');
if(isset($_POST['oy_upload'])){ echo 'fuck it is not file';}

if(isset($_FILES['oy_upload'])){
//echo 'Enter to file : '.UPLOAD_RPATH.'<br/>';
$upload = new Upload($_FILES['oy_upload']); 
if ($upload->uploaded) {
   // save uploaded image with no changes
    
   $upload->Process(UPLOAD_RPATH.'/'.$uid.'/'.date('m-Y').'/');
   if ($upload->processed) {
     //echo $upload->log;
       //echo $upload->file_dst_path.$upload->file_dst_name;
       
       
       $return['file_dst_path'] = utf8_encode($upload->file_dst_path);
       $return['file_dst_name'] = utf8_encode($upload->file_dst_name);
       $return['file_dst_name_ext'] = utf8_encode($upload->file_dst_name_ext);
       $return['file_dst_pathname'] = utf8_encode($upload->file_dst_pathname);
       $return['file_is_image'] = utf8_encode($upload->file_is_image);
       $return['file_src_size'] = utf8_encode($upload->file_src_size);
       $return['file_path'] = ('/'.str_ireplace('\\', '/', str_ireplace(BASE_RPATH, '', UPLOAD_RPATH)).'/'.$uid.'/'.date('m-Y').'/'.$upload->file_dst_name);
       
        
//        global $dbase;
//       
//        $dv['dat_url'] =$return['file_path']; 
//	$dv['dat_access'] =is_get('access');
//	$dv['dat_uid'] = is_get('uid');
//	$dv['dat_category'] = is_get('cat');
//	$dv['dat_ext'] = $return['file_dst_name_ext'];// $return->file_dst_name_ext;
//	$dbase->RowInsert(TBL_PIX."datafiles_oy",$dv);
//        $return['dt_id'] = $dbase->lastinserted_id();
      
      // print_r($return);
   } else {
     $return['error'] = $upload->error;
   }
   
   
//   // save uploaded image with a new name
//   $upload->file_new_name_body = 'foo';
//   $upload->Process(UPLOAD_PATH);
//   if ($upload->processed) {
//     echo 'image renamed "foo" copied';
//   } else {
//     echo 'error : ' . $upload->error;
//   }   
//   // save uploaded image with a new name,
//   // resized to 100px wide
//   $upload->file_new_name_body = 'image_resized';
//   $upload->image_resize = true;
//   $upload->image_convert = gif;
//   $upload->image_x = 100;
//   $upload->image_ratio_y = true;
//   $upload->Process(UPLOAD_PATH);
//   if ($upload->processed) {
//     echo 'image renamed, resized x=100
//           and converted to GIF';
//     $upload->Clean();
//   } else {
//     echo 'error : ' . $upload->error;
//   } 
} 

}else{
  //  echo 'what? what the fuck do you want here dude, get fuck out of here now!!!';
   $return['error'] = 'what? what the fuck do you want here dude, get fuck out of here now!!!'; 
}

 ob_clean();
    header('Content-type: text/json; charset=utf-8');
    echo json_encode($return);
}