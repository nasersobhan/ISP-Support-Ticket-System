<?php 
global $dbase;
$uid =  user_uid();

if(is_get('upload')){

//error_reporting(0);
//session_start();
//include('db.php');
//$session_id='1'; //$session id
define ("MAX_SIZE","154455000"); // 2MB MAX file size

// Valid image formats 
$valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") 
{
    
    $nowdate = date('m-Y');
$uploaddir = UPLOAD_PATH.'/'.user_uid().'/'.$nowdate.'/'; //Image upload directory
if (!file_exists($uploaddir)) {
    mkdir($uploaddir, 0777, true);
}

  $images_arr = array();
    foreach($_FILES['images']['name'] as $key=>$val){
        //display images without stored
        $extra_info = getimagesize($_FILES['images']['tmp_name'][$key]);
        $images_arr[] = "data:" . $extra_info["mime"] . ";base64," . base64_encode(file_get_contents($_FILES['images']['tmp_name'][$key]));
       
    }




foreach ($_FILES['images']['name'] as $name => $value)
{
$filename = stripslashes($_FILES['images']['name'][$name]);
$size=filesize($_FILES['images']['tmp_name'][$name]);
//Convert extension into a lower case format
$ext = getExtension($filename);
$ext = strtolower($ext);
//File extension check
if(in_array($ext,$valid_formats))
{
//File size check
if ($size < (MAX_SIZE*1024))
{ 
$image_name=time().'-'.$filename; 
echo "<img src='".$uploaddir.$image_name."' class='imgList'>"; 
$newname=$uploaddir.$image_name; 
//Moving file to uploads folder
if (move_uploaded_file($_FILES['images']['tmp_name'][$name], $newname)) 
{ 
//$time=time(); 
//Insert upload image files names into user_uploads table
//mysql_query("INSERT INTO user_uploads(image_name,user_id_fk,created) VALUES('$image_name','$session_id','$time')");
    //`dat_url`, `dat_uid`, `dat_access`, `dat_type`, `dat_ext`, `dat_category`, `dat_title`
 $db['dat_uid'] = user_uid();
 $db['dat_access'] = 1;
    $db['dat_type'] = 'image';
    $db['dat_ext'] = $ext; 
    
    
    $url =  '/'.str_ireplace('\\', '/', str_ireplace(RHOME, '', UPLOAD_PATH)).'/'.user_uid().'/'.$nowdate.'/'.$image_name;
    
    if(is_post('crop')){
       $x = explode('-',is_post('crop'));
        $data['w']=$x[0];
       $data['h']=$x[1];
       $data['x']=0;
               $data['y'] =0;
       $db['dat_url'] = crop(RHOME.$url, $image_name, $ext, $data);
    }else{
      $db['dat_url'] =$url;  
    }
    
    
    if(is_post('imgcat'))
    $db['dat_category'] = is_post('imgcat'); 
    else
       $db['dat_category'] = 'unknow';   
    $db['dat_title'] = $image_name; 
    
    global $dbase;
    $dbase->RowInsert( TBL_PIX. 'datafiles',$db);
    
}
else 
{ 
echo '<span class="imgList">You have exceeded the size limit! so moving unsuccessful! </span>'; } 
}

else 
{ 
echo '<span class="imgList">You have exceeded the size limit!</span>'; 
} 

} 

else 
{ 
echo '<span class="imgList">Unknown extension!</span>'; 
} 

} //foreach end

} 















//
//
//
//
//
//     if(isset($_FILES)){
//                            foreach($_FILES as $key => $file){
//                                if($_FILES[$key]['size'] == 0) {
//                                    unset($_FILES[$key]);
//                                }else{
//                                $ $up = upload_it($file);
//                                echo $up->dt_id;
//                                }
//                                
//                                }
//                        }
//                        
                        
                        
                      
    
    ?>

<?php
if(!empty($images_arr)){ 
    
   
    
    foreach($images_arr as $image_src){ ?>




           
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="<?php echo $image_src; ?>" alt="">
                </a>
            </div>


<?php } 
}















}
if(is_get('del')){
    
   $xid =is_post('did');
    if($dbase->RowUpdate( TBL_PIX .'datafiles',array('dat_status'=>'100')," dat_id={$xid} AND dat_uid={$uid}")){
    
    
    echo 'Delete :'.$xid;
    
    }else{
        echo 'Faild';
    }
}
?>
