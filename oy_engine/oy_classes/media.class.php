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


class oy_media {
    //put your code here
    private $src_rpath;
    private $src_path;
    private $upload_limite;
    private $userID;
    private $blocked_ext = array();
    private $db = true;
            
    function __construct(){
        global $dbase;
        $this->src_path = COREHOME.'/media/';
        $this->src_rpath = CORE_RPATH.'/media/';
        $this->upload_limite = 101454;
        $this->blocked_ext = array('php','asp','js','other','py');
        $this->userID = 0;
        $this->db = $dbase;
    }
    
    
    function img_upload(){
        
        
    }
    
    function fil_upload(){
        
    }
    
    function fil_upload_input(){}
    function img_upload_input(){}
    
 function datafile_upload($filename, $access,$category, $widtharray = array(200)){
 global $dbase;

$my= date('m-Y');
$path = $this->src_rpath.user_uid().'/'.$my.'/';
$xpath = $this->src_path.user_uid().'/'.$my.'/';
$oldmask = umask(0);
if (!file_exists($path)) {
    mkdir($path, 0777, true);
	chmod($path, 0777);
}
umask($oldmask);

$actual_image_name="asdfasf.jpg";
$valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
	//include_once 'includes/getExtension.php';
	$imagename = $_FILES[$filename]['name'];
	$size = $_FILES[$filename]['size'];
		$returnresult = array();			
	if(strlen($imagename))
	{
		$ext = strtolower(getExtension($imagename));
		if(in_array($ext,$valid_formats))
		{
			if($size<(1024*1024*1024))
			{
				$txt = 'text';
				$actual_image_name = 'img_'.rand(0,9999).'-'.time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
				$uploadedfile = $_FILES[$filename]['tmp_name'];
				//include 'includes/compressImage.php';	
											 
												
				if(move_uploaded_file($uploadedfile, $path.$actual_image_name))
				{	
					
					$dv['df_url'] =str_replace(BASE_RPATH,'',$path.$actual_image_name); 
					$dv['df_access'] =$access;
					$dv['df_uid'] =user_uid();
					$dv['df_category'] = $category;
					$dv['df_ext'] = $ext;
				$dbase->RowInsert("data_files",$dv);
				$newwidth='0';
				$idlist[$newwidth]=$dbase->lastinserted_id();
				
				$widthArray = $widtharray;
				foreach($widthArray as $newwidth)
				{
				$filename=compressImage($ext,$uploadedfile,$path,$actual_image_name,$newwidth);
				$dv['df_size'] = $newwidth;
				$dbase->RowInsert("data_files",$dv);
				//echo "<b>Width:</b> ".$newwidth."px  <br/><b>File Name:</br> ".$filename."<br/><br/>";
				$idlist[$newwidth]=$dbase->lastinserted_id();
				}
				
				
				
				
				//echo "<img src='".$path.$actual_image_name."'  class='preview'><br/>";
				//echo "<b>Original Image</b>  <br/><b>File Name:</br> ".$filename."<br/><br/>";
				$returnresult['id'] = $idlist[$newwidth];
				$returnresult['url'] = $xpath.$actual_image_name;
				$returnresult['result'] = "success";
				$returnresult['ext'] = $ext;
				return $returnresult;//.$_POST['filexxx'];
				}
				else
				return "Fail upload folder with read access.";
			}
			else
			return "Image file size max 1 MB";					
		}
		else
		return "Invalid file format..";	
	}
	else
	return "Please select image..!";
	exit;
}




}
    
    
    function get_fileurl($df_id){
     // $query2 = "SELECT df_url FROM data_files WHERE df_id = {$df_id}";
   // $row2 = $dbase->fetch_assoc($query2);
    global $dbase;
    return $dbase->get_single('data_files', 'df_id', $df_id, 'df_url');
    
    // return home_url().$row2['df_url'];
}
}
