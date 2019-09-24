<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of media
 *
 * @author naser
 */


//CREATE TABLE `kfz_cpbs`.`cpb_datafiles` (
//  `dat_id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
//  `dat_url` VARCHAR(255) NOT NULL COMMENT '',
//  `dat_time` TIMESTAMP NULL DEFAULT TIMESTAMP COMMENT '',
//  `dat_uid` INT NULL COMMENT '',
//  `dat_access` INT NULL DEFAULT 0 COMMENT '',
//  `dat_type` VARCHAR(15) NULL COMMENT '',
//  `dat_ext` VARCHAR(4) NULL COMMENT '',
//  `dat_category` VARCHAR(10) NULL COMMENT '',
//  `dat_title` VARCHAR(100) NULL COMMENT '',
//  PRIMARY KEY (`dat_id`)  COMMENT '');


class oy_media
{
    //put your code here
    private $src_rpath;
    private $src_path;
    private $src_lpath = HOME;
    private $upload_limite;
    private $userID;
    private $blocked_ext = array();
    private $db = true;
            
    public function __construct($rpath, $path)
    {
        //$dbase =  $this->db;
        $this->src_path =$path;// COREHOME.'/media/';
        $this->src_rpath = $rpath;// CORE_RPATH.'/media/';
        $this->upload_limite = 101454;
        $this->blocked_ext = array('php','asp','js','other','py');
        $this->userID = 0;
        //$this->db = $dbase;
    }
    public function get_fileurl($dat_id)
    {
        if ($dat_id) {
            $url  = $this->src_lpath."?id=".$dat_id;
            $xxx = trim(file_get_contents($url));
            return $xxx;
        } else {
            return DEF_IMG;
        }
//    $dbase =  $this->db; $tbl = TBL_PIX.'datafiles_oy';
//    $file = $dbase->get_single($tbl, 'dat_id', $dat_id, 'dat_url');
//    if($file){
//        $re = MEDIAHOME.$file;
//        $re = str_ireplace("///", "/", $re);
//        $re = PORT.'://'.  str_ireplace("//",'/',str_ireplace(PORT.'://', "", $re));
//        return ($re);
//    }else
//        return DEF_IMG;
    }
    public function get_filesize($dat_id)
    {
        if ($dat_id) {
            $link  = $this->get_fileurl($dat_id);
         
            $head = array_change_key_case(get_headers($link, true));
            $filesize = $head['content-length'];
            return $filesize;
        } else {
            return 0;
        }
    }
    
    public function get_filepage($dat_id)
    {
        if ($dat_id) {
            $url  = $this->src_lpath."?pg=api&getpage=".$dat_id;
            $xxx = trim(file_get_contents($url));
            return $xxx;
        } else {
            return DEF_IMG;
        }
    }
    
    public function img_cropper($fid, $d)
    {
        if ($d['x']==0) {
            $d['x'] = 1;
        }
        if ($d['y']==0) {
            $d['y'] = 1;
        }
        $url  = $this->src_path."?pg=crop&id=".$fid."&w=".$d['width']."&h=".$d['height']."&x=".$d['x']."&y=".$d['y'].'&uid='.$d['uid'];
        $xxx = json_decode(file_get_contents($url), true);
       

        return $xxx;
    }

    
    public function img_upload()
    {
    }
    
    public function fil_upload()
    {
    }
    
    public function confirm($id)
    {
        $target_url = $this->src_path.'?pg=api&confirm='.$id.'&token=1';

        $homepage = file_get_contents($target_url);
        return $homepage;
          
          
//
//	$post = array(
//            'id' => $id
//            );
//
//        $ch = curl_init();
//	curl_setopt($ch, CURLOPT_URL,$target_url);
//	curl_setopt($ch, CURLOPT_POST,1);
//	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
//	$result=curl_exec ($ch);
//	curl_close ($ch);
//	return json_decode($result,true);
    }
    
    public function get_title($id)
    {
        $target_url = $this->src_path.'?pg=api&GetName='.$id.'&token=1';
            

        $homepage = file_get_contents($target_url);
        //print_r($homepage);
        //$res = json_decode($homepage,true);
        return $homepage;
    }
    
    public function upload_filebylink($file, $arr)
    {
        global $dbase;
        $headers = $this->check_externalLink($file);

        //$code = $headers[0];
        $code = substr($headers[0], 9, 3);
        if ($code == 200 or $code == 201) {
            $namef = basename($file);
            //$extx = ;
            $ext = explode('.', $namef);
            $ext = substr(end($ext), -4);
            $ext = strtolower($ext);
            $typex = mime_content_type_extra($file);
            if ($typex) {
                $db['dat_type'] = $typex;
            }
            $db['dat_url'] = ($file);
            $db['dat_ext'] = $ext;
            $db['dat_external'] = 1;
            $db['dat_access'] = (isset($arr['access']) ? $arr['access'] : 0);
            $db['dat_title'] = (isset($arr['title']) ? $arr['title'] : 'unknow');
            $db['dat_category'] = (isset($arr['category']) ? $arr['category'] : 0); // is_post('category');
            $db['dat_folderid'] = (isset($arr['folder']) ? $arr['folder'] : 0);

            $db['dat_uid'] = (isset($arr['uid']) ? $arr['uid'] : user_uid());
            // $query = ;
            if ($dbase->RowInsert(TBL_PIX . "datafiles_oy", $db)) {
                // echo 'Inseted';
                return true; //array('status' => 'success', 'code' => $code, 'db' => $db);
            } else {
                return 'Not Inserted to DB Unknow Reason';
            }//array('code' => $code, 'db' => $db, 'header' => $headers);
        } else {
            return 'File Not Accessable: CODE: '.$code ; //array('code' => $code, 'db' => $db, 'header' => $headers);
        }
    }

    public function check_externalLink($link)
    {
        $headers = get_headers($link);

        // $code = $headers[0];
        return $headers;
    }
    
    
    public function upload_file($file, $arr)
    {
        $target_url = $this->src_path.'?pg=post&token=1';
 
        $namef = basename($file);
        if (!file_exists($file)) {
            return false;
            exit();
        }
        $mime = mime_content_type_extra($file);
        $post = array(
            'user_id' => (isset($arr['uid']) ? $arr['uid'] : user_uid()),
            'filename' => (isset($arr['filename']) ? $arr['filename'] : $namef),
            'title' => (isset($arr['title']) ? $arr['title'] : $namef),
            'category' => (isset($arr['category']) ? $arr['category'] : '0'),
            'access' => (isset($arr['access']) ? $arr['access'] : 0),
            'folder' => (isset($arr['folder']) ? $arr['folder'] : 0) ,
            'file_contents' => new CurlFile($file, $mime, $namef)
            );
 
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $target_url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result=curl_exec($ch);
        curl_close($ch);
        $res = json_decode($result, true);
        // echo $target_url; print_r($res);
        return json_decode($result, true);
    }
    public function fil_upload_input()
    {
    }
    public function img_upload_input()
    {
    }
//
    // function datafile_upload($filename, $access,$category, $widtharray = array(200)){
    // $dbase =  $this->db;
//
    //$my= date('m-Y');
    //$path = $this->src_rpath.user_uid().'/'.$my.'/';
    //$xpath = $this->src_path.user_uid().'/'.$my.'/';
    //$oldmask = umask(0);
    //if (!file_exists($path)) {
//    mkdir($path, 0777, true);
    //	chmod($path, 0777);
    //}
    //umask($oldmask);
//
    //$actual_image_name="asdfasf.jpg";
    //$valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
    //if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
    //{
    //	//include_once 'includes/getExtension.php';
    //	$imagename = $_FILES[$filename]['name'];
    //	$size = $_FILES[$filename]['size'];
    //		$returnresult = array();
    //	if(strlen($imagename))
    //	{
    //		$ext = strtolower(getExtension($imagename));
    //		if(in_array($ext,$valid_formats))
    //		{
    //			if($size<(1024*1024*1024))
    //			{
    //				$txt = 'text';
    //				$actual_image_name = 'img_'.rand(0,9999).'-'.time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
    //				$uploadedfile = $_FILES[$filename]['tmp_name'];
    //				//include 'includes/compressImage.php';
//
//
    //				if(move_uploaded_file($uploadedfile, $path.$actual_image_name))
    //				{
//
    //					$dv['df_url'] =str_replace(BASE_RPATH,'',$path.$actual_image_name);
    //					$dv['df_access'] =$access;
    //					$dv['df_uid'] =user_uid();
    //					$dv['df_category'] = $category;
    //					$dv['df_ext'] = $ext;
    //				$dbase->RowInsert("data_files",$dv);
    //				$newwidth='0';
    //				$idlist[$newwidth]=$dbase->lastinserted_id();
//
    //				$widthArray = $widtharray;
    //				foreach($widthArray as $newwidth)
    //				{
    //				$filename=compressImage($ext,$uploadedfile,$path,$actual_image_name,$newwidth);
    //				$dv['df_size'] = $newwidth;
    //				$dbase->RowInsert("data_files",$dv);
    //				//echo "<b>Width:</b> ".$newwidth."px  <br/><b>File Name:</br> ".$filename."<br/><br/>";
    //				$idlist[$newwidth]=$dbase->lastinserted_id();
    //				}
//
//
//
//
    //				//echo "<img src='".$path.$actual_image_name."'  class='preview'><br/>";
    //				//echo "<b>Original Image</b>  <br/><b>File Name:</br> ".$filename."<br/><br/>";
    //				$returnresult['id'] = $idlist[$newwidth];
    //				$returnresult['url'] = $xpath.$actual_image_name;
    //				$returnresult['result'] = "success";
    //				$returnresult['ext'] = $ext;
    //				return $returnresult;//.$_POST['filexxx'];
    //				}
    //				else
    //				return "Fail upload folder with read access.";
    //			}
    //			else
    //			return "Image file size max 1 MB";
    //		}
    //		else
    //		return "Invalid file format..";
    //	}
    //	else
    //	return "Please select image..!";
    //	exit;
    //}
//
//
//
//
    //}
    
    public function to_croped($src, $w, $h='')
    {
        $src =  str_ireplace(COREHOME, '', $src);
        if ($h!='') {
            $q = '&h='.$h;
        }
        //$result = COREHOME.'oy_core/oy_developer/live/timthumb.php?src='.$src.'&w='.$w.$q;
        $result = COREHOME.'i/'.$w.'-'.$h.'/'.$src;
        return $result;
    }
    public function to_croped_ex($src, $w, $h='')
    {
        $src =  str_ireplace(UPLOAD_PATH, '', $src);
        $q='';
        if ($h!='') {
            $q = '&h='.$h;
        }
        $result = COREHOME.'oy_developer/live/echo.php?src='.$src.'&w='.$w.$q;
        return $result;
    }
    public function mk_AjaxImgUploader($cat)
    {
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

    public function connectfile($id2, $id1, $type='file4post')
    {
        global $dbase;
    
        $db['con_id2'] = $id2;
        $db['con_id1'] = $id1;
        $db['con_type'] = $type;
        $tbl = TBL_PIX.'connections';
        $dbase->RowInsert($tbl, $db);
        return $dbase->insert_id();
    }

    public function get_postfiles($id, $type='file4post')
    {
        $dbase =  $this->db;
        $tbl = TBL_PIX.'connections';
        $xxx = $dbase->tbl2array2($tbl, 'con_id1', "WHERE con_id2={$id}");
        $xx=array();
        foreach ($xxx as $x) {
            $xx[] = get_fileurl($x['con_id1']);
        }
        
        return $xx;
    }
    public function mk_ImgGallery($cat, $sizew=false, $sizeh=false)
    {
        $x ='<div class="row">';
        // $x = '<ul class="jFiler-item-list">';
        $uid = get_dea_uid();
        //  $type = 'dea-'.get_dea_id();
        $queryx = "select dat_url,dat_id from sob_datafiles where dat_status=1 AND dat_uid={$uid} AND dat_category='{$cat}'";
          
        
 
        get_rows($queryx);
        if (posts_av()) {
            while (posts_av()) :get_record();
   
            if ($sizew && $sizeh) {
                $img =  to_croped(HOME.get_dat_url(), $sizew, $sizeh);
            } elseif ($sizew && !$sizeh) {
                $img =  to_croped(HOME.get_dat_url(), $sizew);
            } else {
                $img = HOME.get_dat_url();
            }
            

            
            $x.='<div id="img-'.get_dat_id().'" class="col-md-4 col-sm-6 col-xs-12">
            <div class="post-container">
              <div class="post-option">
                <ul class="list-options">
                  <li><a href="'.get_link('media', 'view', get_dat_id()).'"><i class="fa fa-plus"></i> <span>Detail</span></a></li>
                 <li><a href="'.get_link('media', 'view', get_dat_id()).'"><i class="glyphicon glyphicon-eye-open"></i> <span>View</span></a></li>
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
     
            endwhile;
        }
     
     
        //  $x.='<div id="images_preview"></div></div></div>';
        $x.='<div id="images_preview"></div></div>';
        return $x;
    }


    public function compressImage($ext, $uploadedfile, $path, $actual_image_name, $newwidth)
    {
        if ($ext == "jpg" || $ext == "jpeg") {
            $src = imagecreatefromjpeg($uploadedfile);
        } elseif ($ext == "png") {
            $src = imagecreatefrompng($uploadedfile);
        } elseif ($ext == "gif") {
            $src = imagecreatefromgif($uploadedfile);
        } else {
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

    public function getd_img($filename, $echo = true)
    {
        if ($echo) {
            echo DATA_CORE_PATH . '/img/' . $filename;
        } else {
            return;
        }
    }
    public function crop($src, $name, $ext, $data)
    {
        //	$src = $srcx;
        // $nowdate =date('m-Y');
        //$dst = UPLOAD_RPATH .'/'.user_uid() . '/' . $nowdate . '/';
        // $ressss = 'good';
        //$result = imagecopyresampled($dst_img, $src_img, 0, 0, $data -> x, $data -> y, 220, 220, $data -> width, $data -> height);
        // imagejpeg($dst_img, $dst);
        // $dt = $nowdate;
        //$actual_image_name =  $name;
        $dstname = 'cro_'.$data['width'].'-'.$data['height'].'_' . $name;

        $srcpath = realpath('./tmp/').'/'.$name;
          
        $dst = realpath('./tmp/croped/').$dstname;
        $file = copy($src, $srcpath);
      
      
        $src = realpath('./tmp/').'/'.$name;
    
        if (!empty($src) && !empty($dst) && !empty($data)) {
            switch ($ext) {
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
            if (!$src_img) {
                $ressss = "Failed to read the image file";
                return;
            }
            //$xxxx = $this->compressImage($this -> extension,$src, UPLOAD_PATH.user_uid().'/'.date('m-Y').'/' ,$actual_image_name, $data::width  );
            //echo '<hr/>'.$xxxx.'<hr/>';
            $dst_img = imagecreatetruecolor($data['width'], $data['height']);
            $result = imagecopyresampled($dst_img, $src_img, 0, 0, $data['x'], $data['y'], $data['width'], $data['height'], $data['width'], $data['height']);
            // imagejpeg($dst_img, 'fgsdffg.jpg', 100);
            //$this->compressImage($this -> extension,$src, UPLOAD_PATH.user_uid().'/'.date('m-Y').'/' ,$actual_image_name, $data -> width  );
            if ($result) {
                switch ($ext) {
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
                if (!$result) {
                    $ressss = "Failed to save the cropped image file";
                }
            } else {
                $ressss = "Failed to crop the image file";
            }
            //$filename = $path.$newwidth.'_'.$actual_image_name;
            // $this -> msg = $dst;
            //imagedestroy($src_img);
            //imagedestroy($dst_img);
            //
            //
            //
        
            $arr['uid'] = user_uid();
            $arr['name'] = $dstname;
            // $arr['uid'] = user_uid();
        
        
            return upload_file($dst, $arr);
//        $x = '/'.str_ireplace('\\', '/', str_ireplace(CORE_RPATH, '', UPLOAD_RPATH)).'/'.user_uid().'/'.$nowdate.'/'.basename($img_path);;
//        if($ressss == 'good'){
//            $dv['dat_url'] = $x;
//            $dv['dat_access'] = 1;
//            $dv['dat_uid'] = user_uid();
//            $dv['dat_category'] = 'cropedimg';
//            $dv['dat_ext'] = $ext;
//            global $dbase;
//            $dbase->RowInsert(TBL_PIX . "datafiles_oy", $dv);
//            $dv['id'] =$dbase->lastinserted_id();
//            return $dv;
//
//
//        }else
//            return $ressss;
        }
    }


    public function datafile_upload($filename, $access, $category, $widtharray = array(200))
    {
        global $dbase;
        $my = date('m-Y');
        $path = UPLOAD_RPATH .'/'. user_uid() . '/' . $my . '/';
        $xpath = UPLOAD_PATH .'/'. user_uid() . '/' . $my . '/';
        $oldmask = umask(0);
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
            chmod($path, 0777);
        }
        umask($oldmask);
        $actual_image_name = "asdfasf.jpg";
        $valid_formats = array("jpg", "png", "gif", "bmp", "jpeg", "PNG", "JPG", "JPEG", "GIF", "BMP");
        if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
            //include_once 'includes/getExtension.php';
            $imagename = $_FILES[$filename]['name'];
            $size = $_FILES[$filename]['size'];
            $returnresult = array();
            if (strlen($imagename)) {
                $ext = strtolower(getExtension($imagename));
                if (in_array($ext, $valid_formats)) {
                    if ($size < (1024 * 1024 * 1024)) {
                        $txt = 'text';
                        $actual_image_name = 'img_' . rand(0, 9999) . '-' . time() . substr(str_replace(" ", "_", $txt), 5) . "." . $ext;
                        $uploadedfile = $_FILES[$filename]['tmp_name'];
                        //include 'includes/compressImage.php';
                        if (move_uploaded_file($uploadedfile, $path . $actual_image_name)) {
                            $dv['dat_url'] = '/'.str_replace(CORE_RPATH, '', $path . $actual_image_name);
                            $dv['dat_access'] = $access;
                            $dv['dat_uid'] = user_uid();
                            $dv['dat_category'] = $category;
                            $dv['dat_ext'] = $ext;
                            $dbase->RowInsert(TBL_PIX . "datafiles_oy", $dv);
                            $newwidth = '0';
                            $idlist[$newwidth] = $dbase->lastinserted_id();
                            $widthArray = $widtharray;
                            foreach ($widthArray as $newwidth) {
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
                        } else {
                            return "Fail upload folder with read access.";
                        }
                    } else {
                        return "Image file size max 1 MB";
                    }
                } else {
                    return "Invalid file format..";
                }
            } else {
                return "Please select image..!";
            }
            exit;
        }
    }
//    function get_fileurl($df_id){
//     // $query2 = "SELECT df_url FROM data_files WHERE df_id = {$df_id}";
//   // $row2 = $dbase->fetch_assoc($query2);
//    $dbase =  $this->db;
//    return $dbase->get_single('data_files', 'df_id', $df_id, 'df_url');
//
//    // return home_url().$row2['df_url'];
//}
}









/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function img_cropper($fid, $d)
{
    global $media;
    return $media->img_cropper($fid, $d);
}



function get_fileurl($dat_id)
{
//    global $dbase; $tbl = TBL_PIX.'datafiles_oy';
//    $file = $dbase->get_single($tbl, 'dat_id', $dat_id, 'dat_url');
//    if($file){
//        $re = COREHOME.$file;
//        $re = str_ireplace("///", "/", $re);
//        $re = PORT.'://'.  str_ireplace("//",'/',str_ireplace(PORT.'://', "", $re));
//        return ($re);
//    }else
//        return DEF_IMG;
    if ($dat_id==1485) {
        return 'https://m.ooyta.com/uploads/def/com_cover.jpg';
    }
    if ($dat_id==1483) {
        return 'https://m.ooyta.com/uploads/def/avatar.png';
    }
    if ($dat_id==1482) {
        return 'https://m.ooyta.com/uploads/def/default.jpg';
    }
    global $media;
    return $media->get_fileurl($dat_id);
}

function to_croped($src, $w, $h='')
{
    //global $media;
    return to_croped_ex($src, $w, $h);//to_croped_ex($src,$w,$h='') $media->to_croped($src,$w,$h='');
}
function to_croped_ex($src, $w, $h='')
{
    global $media;
    return $media->to_croped_ex($src, $w, $h);
}
function mk_AjaxImgUploader($cat)
{
    global $media;
    return $media->mk_AjaxImgUploader($cat);
}

function connectfile($id2, $id1, $type='file4post')
{
    global $media;
    return $media->connectfile($id2, $id1, $type='file4post');
}

function get_postfiles($id, $type='file4post')
{
    global $media;
    return $media->get_postfiles($id, $type='file4post');
}
function mk_ImgGallery($cat, $sizew=false, $sizeh=false)
{
    global $media;
    return $media->mk_ImgGallery($cat, $sizew=false, $sizeh=false);
}


function compressImage($ext, $uploadedfile, $path, $actual_image_name, $newwidth)
{
    global $media;
    return $media->compressImage($ext, $uploadedfile, $path, $actual_image_name, $newwidth);
}
function getExtension($str)
{
    $i = strrpos($str, ".");
    if (!$i) {
        return "";
    }
    $l = strlen($str) - $i;
    $ext = substr($str, $i + 1, $l);
    return $ext;
}
function getd_img($filename, $echo = true)
{
    global $media;
    return $media->getd_img($filename, $echo = true);
}
function crop($src, $name, $ext, $data)
{
    global $media;
    return $media->crop($src, $name, $ext, $data);
}


function datafile_upload($filename, $access, $category, $widtharray = array(200))
{
    global $media;
    return $media->datafile_upload($filename, $access, $category, $widtharray = array(200));
}

function upload_filebylink($arr, $arrx=false)
{
    global $media;
   
    if (!$arrx) {
        $arrx['uid'] = user_uid();
    }
    return $media->upload_filebylink($arr, $arrx);
}
function upload_file($arr, $arrx=false)
{
    global $media;
   
    if (!$arrx) {
        $arrx['uid'] = user_uid();
    }
    return $media->upload_file($arr, $arrx);
}
function confirm_file($id)
{
    global $media;
    return $media->confirm($id);
}
function get_title($id)
{
    global $media;
    return $media->get_title($id);
}
function get_filepage($id)
{
    global $media;
    return $media->get_filepage($id);
}
function upload_fileform($arr, $arrx = false)
{
    // return print_r($arr);
    $name = $arr['name'];
    $tem = $arr['tmp_name'];
    $URL = realpath('./tmp/').'/'.$arr['name'];
    $file = move_uploaded_file($tem, $URL);
    if (!$arrx) {
        $arrx['uid'] = user_uid();
    }
    global $media;
    $re = $media->upload_file($URL, $arrx);
    if ($re) {
        unlink($URL);
        return $re;
    } else {
        return false;
    }
}

//function get_thumb($id,$w,$h){
//    $url = MEDIAHOME.'img/'.$id.'-'.$w.'-'.$h.'.jpg';
//    return $url;
//}




function get_img_thumb($id, $w, $h)
{
    $pid = $id;
    if (!$pid) {
        $pid == '1482';
    }
    
    $path = MEDIA_R_HOME;
    
    $dst =  'oy_content'.DIRECTORY_SEPARATOR.'tmp'.DIRECTORY_SEPARATOR;
    $image = $dst . 'tmp_'.$w.'-'.$h.'_' . $pid .'.jpg';
    $src = $path. $image;
    //echo $src;
    if (file_exists($src)) {
        return MEDIAHOME.$image;
    } else {
        if (empty($pid) || $pid =='' || !$pid) {
            $pid == '1482';
        }
 
        $url = MEDIAHOME.'img/'.$pid.'-'.$w.'-'.$h.'.jpg';
        if ($url == MEDIAHOME.'img/-'.$w.'-'.$h.'.jpg') {
            $url = get_cate_thumb(1482, $w, $h);
        }//MEDIAHOME.'img/1482-'.$w.'-'.$h.'.jpg';
        return $url;
    }
}



 function mime_content_type_extra($filename)
 {
     $mime_types = array(

            'txt' => 'text/plain',
            'htm' => 'text/html',
            'html' => 'text/html',
            'php' => 'text/html',
            'css' => 'text/css',
            'js' => 'application/javascript',
            'json' => 'application/json',
            'xml' => 'application/xml',
            'swf' => 'application/x-shockwave-flash',
            'flv' => 'video/x-flv',

            // images
            'png' => 'image/png',
            'jpe' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'jpg' => 'image/jpeg',
            'gif' => 'image/gif',
            'bmp' => 'image/bmp',
            'ico' => 'image/vnd.microsoft.icon',
            'tiff' => 'image/tiff',
            'tif' => 'image/tiff',
            'svg' => 'image/svg+xml',
            'svgz' => 'image/svg+xml',

            // archives
            'zip' => 'application/zip',
            'rar' => 'application/x-rar-compressed',
            'exe' => 'application/x-msdownload',
            'msi' => 'application/x-msdownload',
            'cab' => 'application/vnd.ms-cab-compressed',

            // audio/video
            'mp3' => 'audio/mpeg',
            'qt' => 'video/quicktime',
            'mov' => 'video/quicktime',

            // adobe
            'pdf' => 'application/pdf',
            'psd' => 'image/vnd.adobe.photoshop',
            'ai' => 'application/postscript',
            'eps' => 'application/postscript',
            'ps' => 'application/postscript',

            // ms office
            'doc' => 'application/msword',
            'rtf' => 'application/rtf',
            'xls' => 'application/vnd.ms-excel',
            'ppt' => 'application/vnd.ms-powerpoint',
            
            //help files
            'chm' => 'application/vnd.ms-htmlhelp',
            
            // open office
            'odt' => 'application/vnd.oasis.opendocument.text',
            'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
        );
     $namef = basename($filename);
     $extx = explode('.', $namef);
     $ext = strtolower(array_pop($extx));
     if (array_key_exists($ext, $mime_types)) {
         return $mime_types[$ext];
     } elseif (function_exists('finfo_open')) {
         $finfo = finfo_open(FILEINFO_MIME);
         $mimetype = finfo_file($finfo, $filename);
         finfo_close($finfo);
         return $mimetype;
     } else {
         return 'application/octet-stream';
     }
 }

function get_fileuri($id)
{
    $root_path = '/mnt/backupsvr/public/media/';
    $url = get_fileurl($id);
    $uri = $root_path.(str_ireplace(MEDIAHOME, '', $url));
    return $uri;
}
