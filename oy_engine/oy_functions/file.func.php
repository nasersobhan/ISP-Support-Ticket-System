<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function get_fileurl($dat_id){
    global $dbase; $tbl = TBL_PIX.'datafiles_oy';
    $file = $dbase->get_single($tbl, 'dat_id', $dat_id, 'dat_url');
    if($file){  
        $re = COREHOME.$file;
        $re = str_ireplace("///", "/", $re);
        $re = PORT.'://'.  str_ireplace("//",'/',str_ireplace(PORT.'://', "", $re));
        return ($re);
    }else
        return DEF_IMG;
}

function to_croped($src,$w,$h=''){
  $src =  str_ireplace(COREHOME, '', $src);
    if($h!='')
        $q = '&h='.$h;
    //$result = COREHOME.'oy_core/oy_developer/live/timthumb.php?src='.$src.'&w='.$w.$q;
  $result = COREHOME.'i/'.$w.'-'.$h.'/'.$src;
    return $result;
    
}
function to_croped_ex($src,$w,$h=''){
  $src =  str_ireplace(UPLOAD_PATH, '', $src);
    if($h!='')
        $q = '&h='.$h;
    $result = COREHOME.'oy_core/oy_developer/live/thumb-ext.php?src='.$src.'&w='.$w.$q;
    return $result;
    
}
function mk_AjaxImgUploader($cat){
   $form = '<form method="post" name="multiple_upload_form" id="multiple_upload_form" enctype="multipart/form-data" action="'.HOME.'/?API=file&upload=imgmaj">
    

<input type="hidden" name="image_form_submit" value="1"/>
   
    <input type="hidden" name="imgcat" id="categorytype" value="'.$cat.'"  >
        
   <input type="hidden" name="crop222" id="cropwh22" value="500-350"  >
   

<div class="fileUpload btn btn-primary">
    <span><i class="glyphicon glyphicon-picture"></i> Upload Images</span>
    <input type="file" name="images[]" class="upload" id="images" multiple >
</div>


    
    <div class="uploading none">
        <label>&nbsp;</label>
        <img src="http://demos.codexworld.com/upload-multiple-images-jquery-ajax-php/uploading.gif" alt="uploading......"/>
    </div>
</form>';
   
  return $form;
   
}

function connectfile($id2,$id1,$type='file4post'){
    global $dbase;
    
    $db['con_id2'] = $id2;
    $db['con_id1'] = $id1;
    $db['con_type'] = $type;
    $tbl = TBL_PIX.'connections';
    $dbase->RowInsert($tbl,$db);
    return $dbase->insert_id();
}

function get_postfiles($id,$type='file4post'){
    global $dbase; 
    $tbl = TBL_PIX.'connections';
    $xxx = $dbase->tbl2array2($tbl, 'con_id1', "WHERE con_id2={$id}");
    $xx=array();
    foreach($xxx as $x)
        $xx[] = get_fileurl($x['con_id1']);
        
    return $xx;
}
function mk_ImgGallery($cat,$sizew=false,$sizeh=false){
$x ='<div class="row">';
   // $x = '<ul class="jFiler-item-list">';
        $uid = get_dea_uid();
      //  $type = 'dea-'.get_dea_id();
        $queryx = "select dat_url,dat_id from sob_datafiles where dat_status=1 AND dat_uid={$uid} AND dat_category='{$cat}'";
          
        
 
        get_rows($queryx);
             if(posts_av()) {while(posts_av()) :get_record();
   
           if($sizew && $sizeh){
            $img =  to_croped(HOME.get_dat_url(),$sizew,$sizeh);
            }elseif($sizew && !$sizeh)
                $img =  to_croped(HOME.get_dat_url(),$sizew);
            else
                $img = HOME.get_dat_url();
            

            
            $x.='<div id="img-'.get_dat_id().'" class="col-md-4 col-sm-6 col-xs-12">
            <div class="post-container">
              <div class="post-option">
                <ul class="list-options">
                  <li><a href="'.get_link('media','view',get_dat_id()).'"><i class="fa fa-plus"></i> <span>Detail</span></a></li>
                 <li><a href="'.get_link('media','view',get_dat_id()).'"><i class="glyphicon glyphicon-eye-open"></i> <span>View</span></a></li>
                  <li><a  class="btn-del-fil" id="'.get_dat_id().'" href="#"><i class="glyphicon glyphicon-remove"></i> <span>Delete</span></a></li>
                  
                </ul>
              </div>
              <div class="post-image">
                <a href="'.HOME.get_dat_url().'" class="img-group-gallery" title="Lorem ipsum dolor sit amet"><img src="'.$img.'" class="img-responsive" alt="fransisca gallery"></a>
              </div>
             <!--  <div class="post-meta">
                <ul class="list-meta list-inline">
                  <li><i class="fa fa-eye"></i> 117</li>
                  <li><i class="fa fa-comment"></i> 7</li>
                  <li><i class="fa fa-cloud-download"></i> 8</li>
                  <li><i class="fa fa-heart"></i> 9</li>
                </ul>
              </div>
             <div class="post-desc">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
              </div>-->
            </div>
          </div>';
            
            
            
    //  $x.='<div class="col-lg-3 col-md-4 col-xs-6 thumb">';
         
          //      $x.='<span id="img-'.get_dat_id().'"  class="thumbnail2" >';
               //     $x.='<img class="btn-del-fil" id="'.get_dat_id().'" src="http://cdn1.iconfinder.com/data/icons/diagona/icon/16/101.png" >';
              //     $x.='<a href="'.HOME.get_dat_url().'"> <img id="img'.get_dat_id().'"  class="img-responsive2 up-img2" src="'.$img.'" alt=""></a>';
             //   $x.='</span>            </div>';
     
     endwhile; } 
     
     
   //  $x.='<div id="images_preview"></div></div></div>';
        $x.='<div id="images_preview"></div></div>';
  return $x;
       
}


function compressImage($ext, $uploadedfile, $path, $actual_image_name, $newwidth){
    if($ext == "jpg" || $ext == "jpeg"){
        $src = imagecreatefromjpeg($uploadedfile);
    }else if($ext == "png"){
        $src = imagecreatefrompng($uploadedfile);
    }else if($ext == "gif"){
        $src = imagecreatefromgif($uploadedfile);
    }else{
        $src = imagecreatefrombmp($uploadedfile);
    }
    list($width, $height) = getimagesize($uploadedfile);
    $newheight = ($height / $width) * $newwidth;
    $tmp = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
    $filename = $path . $newwidth . '_' . $actual_image_name;
    imagejpeg($tmp, $filename, 100);
    imagedestroy($tmp);
    return $filename;
}
function getExtension($str){
    $i = strrpos($str, ".");
    if(!$i){
        return "";
    }
    $l = strlen($str) - $i;
    $ext = substr($str, $i + 1, $l);
    return $ext;
}
function getd_img($filename, $echo = true){
    if($echo)
        echo DATA_CORE_PATH . '/img/' . $filename;
    else
        return;
}
function crop($src, $name, $ext, $data){
    //	$src = $srcx;
    $nowdate =date('m-Y');
    $dst = UPLOAD_RPATH .'/'.user_uid() . '/' . $nowdate . '/';
    $ressss = 'good';
    //$result = imagecopyresampled($dst_img, $src_img, 0, 0, $data -> x, $data -> y, 220, 220, $data -> width, $data -> height);
    // imagejpeg($dst_img, $dst);
    $dt = $nowdate;
    //$actual_image_name =  $name;
    $dst = $dst . 'cro_'.$data['width'].'-'.$data['height'].'_' . $name;
    $img_path = $dst;//UPLOAD_PATH .'/'. user_uid() . '/' . $dt . '/croped_' . $name;
    if(!empty($src) && !empty($dst) && !empty($data)){
        switch($ext){
            case 'gif':
                $src_img = imagecreatefromgif($src);
                break;
            case 'jpeg':
                $src_img = imagecreatefromjpeg($src);
                break;
            case 'jpg':
                $src_img = imagecreatefromjpeg($src);
                break;
            case 'png':
                $src_img = imagecreatefrompng($src);
                break;
        }
        if(!$src_img){
            $ressss = "Failed to read the image file";
            return;
        }
//$xxxx = $this->compressImage($this -> extension,$src, UPLOAD_PATH.user_uid().'/'.date('m-Y').'/' ,$actual_image_name, $data::width  );
        //echo '<hr/>'.$xxxx.'<hr/>';
        $dst_img = imagecreatetruecolor($data['width'], $data['height']);
        $result = imagecopyresampled($dst_img, $src_img, 0, 0, $data['x'], $data['y'], $data['width'], $data['height'], $data['width'], $data['height']);
        // imagejpeg($dst_img, 'fgsdffg.jpg', 100);
        //$this->compressImage($this -> extension,$src, UPLOAD_PATH.user_uid().'/'.date('m-Y').'/' ,$actual_image_name, $data -> width  );
        if($result){
            switch($ext){
                case 'gif':
                    $result = imagegif($dst_img, $dst);
                    break;
                case 'jpeg':
                    $result = imagejpeg($dst_img, $dst);
                    break;
                case 'jpg':
                    $result = imagejpeg($dst_img, $dst);
                    break;
                case 'png':
                    $result = imagepng($dst_img, $dst);
                    break;
            }
            if(!$result){
                $ressss = "Failed to save the cropped image file";
            }
        }else{
            $ressss = "Failed to crop the image file";
        }
        //$filename = $path.$newwidth.'_'.$actual_image_name;
        // $this -> msg = $dst;
        //imagedestroy($src_img);
        //imagedestroy($dst_img);
        $x = '/'.str_ireplace('\\', '/', str_ireplace(CORE_RPATH, '', UPLOAD_RPATH)).'/'.user_uid().'/'.$nowdate.'/'.basename($img_path);;
        if($ressss == 'good'){
            $dv['dat_url'] = $x;
            $dv['dat_access'] = 1;
            $dv['dat_uid'] = user_uid();
            $dv['dat_category'] = 'cropedimg';
            $dv['dat_ext'] = $ext;
            global $dbase;
            $dbase->RowInsert(TBL_PIX . "datafiles_oy", $dv);
            $dv['id'] =$dbase->lastinserted_id();
            return $dv;
            
            
        }else
            return $ressss;
    }
}


function datafile_upload($filename, $access, $category, $widtharray = array(200)){
    global $dbase;
    $my = date('m-Y');
    $path = UPLOAD_RPATH .'/'. user_uid() . '/' . $my . '/';
    $xpath = UPLOAD_PATH .'/'. user_uid() . '/' . $my . '/';
    $oldmask = umask(0);
    if(!file_exists($path)){
        mkdir($path, 0777, true);
        chmod($path, 0777);
        
    }
    umask($oldmask);
    $actual_image_name = "asdfasf.jpg";
    $valid_formats = array("jpg", "png", "gif", "bmp", "jpeg", "PNG", "JPG", "JPEG", "GIF", "BMP");
    if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
        //include_once 'includes/getExtension.php';
        $imagename = $_FILES[$filename]['name'];
        $size = $_FILES[$filename]['size'];
        $returnresult = array();
        if(strlen($imagename)){
            $ext = strtolower(getExtension($imagename));
            if(in_array($ext, $valid_formats)){
                if($size < (1024 * 1024 * 1024)){
                    $txt = 'text';
                    $actual_image_name = 'img_' . rand(0, 9999) . '-' . time() . substr(str_replace(" ", "_", $txt), 5) . "." . $ext;
                    $uploadedfile = $_FILES[$filename]['tmp_name'];
                    //include 'includes/compressImage.php';	
                    if(move_uploaded_file($uploadedfile, $path . $actual_image_name)){
                        $dv['dat_url'] = '/'.str_replace(CORE_RPATH, '', $path . $actual_image_name);
                        $dv['dat_access'] = $access;
                        $dv['dat_uid'] = user_uid();
                        $dv['dat_category'] = $category;
                        $dv['dat_ext'] = $ext;
                        $dbase->RowInsert(TBL_PIX . "datafiles_oy", $dv);
                        $newwidth = '0';
                        $idlist[$newwidth] = $dbase->lastinserted_id();
                        $widthArray = $widtharray;
                        foreach($widthArray as $newwidth){
                            $filename = compressImage($ext, $uploadedfile, $path, $actual_image_name, $newwidth);
                            $dv['dat_size'] = $newwidth;
                            $dbase->RowInsert(TBL_PIX . "datafiles_oy", $dv);
                            //echo "<b>Width:</b> ".$newwidth."px  <br/><b>File Name:</br> ".$filename."<br/><br/>";
                            $idlist[$newwidth] = $dbase->lastinserted_id();
                        }
                        //echo "<img src='".$path.$actual_image_name."'  class='preview'><br/>";
                        //echo "<b>Original Image</b>  <br/><b>File Name:</br> ".$filename."<br/><br/>";
                        $returnresult['id'] = $idlist[$newwidth];
                        $returnresult['url'] = $xpath . $actual_image_name;
                        $returnresult['result'] = "success";
                        $returnresult['ext'] = $ext;
                        return $returnresult; //.$_POST['filexxx'];
                    }else
                        return "Fail upload folder with read access.";
                }else
                    return "Image file size max 1 MB";
            }else
                return "Invalid file format..";
        }else
            return "Please select image..!";
        exit;
    }
}
