<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class oy_builtinDB {
    private $dbase;
    private $tbl_px;
    private $user;
    
    
   // public $cate_tbl = 'categories';
    //public $user_tbl = 'categories';
    
    
    
    function __construct($constr, $tbl_px='oyt_'){
        global $dbase;
        $dbase_n = $dbase;
        
         $this->tbl_px = TBL_PIX; 
        if($constr!='CURRENT'){ 
           $dbase_n = new oy_db($constr);    
           $this->tbl_px = $tbl_px;
        }
        $this->dbase = $dbase_n;
        
    }
    //ADVANCE OPTION
    function query($query){return $this->dbase->query($query);}
    
    
    
    
    
    function cat2arr($cat, $user){
        $pref = $this->tbl_px;
        $query = "SELECT cat_id, cat_name FROM {$pref}categories WHERE cat_type = '" . $cat ."' AND cat_uid='{$user}'  ORDER BY cat_order ASC";
	$res =  $this->dbase->query($query);
	$respne= array();
        $i = 0;
	while($row = mysqli_fetch_assoc($res))
        {
            $respne[$i]['cat_id'] = $row['cat_id']; 
            $respne[$i]['cat_name'] = $row['cat_name']; $i++; 
	}
	return $respne;

    }
    
    function cat2name(){}
    function addcat(){}
    function editcat(){}
    function cat2opt(){}
    
    
    
    
}
