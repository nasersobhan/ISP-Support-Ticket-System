<?php

$uid = user_uid(); //Get Current User ID
$fld_pre = 'pos_'; // table Feild Prefix
$tbl = TBL_PIX . 'posts'; // Table Name for this page
$pg_n = $_GET['pg'];
Global $dbase; //Load Database Object

if(is_get('view')){
    
     
    $get_id = trim(is_get('view'));
  
    
    
    
    if(is_numeric($get_id) && (int) $get_id == $get_id)
        $pid = $get_id;
    else
        $pid = $dbase->get_single($tbl, "{$fld_pre}slug", $get_id, "{$fld_pre}id");

 
    $main_query = "SELECT * FROM {$tbl} ";
    $where = " where {$fld_pre}id='{$pid}'";
    $status = " AND ({$fld_pre}status=1 OR {$fld_pre}status=99)  ";
    if(is_owner($pid, 'posts')){
        $status = " AND {$fld_pre}status<>100  ";
    }
    $limit = " LIMIT 1";
    $where = $where . $status;
    $ss_query = $main_query . $where . $limit; 
    global $total, $max_num;
    post_query($ss_query);
    if(have_post()){
        while(have_post()) : the_post();
           // load_jsplug('form');
            set_pgtitle(get_pos_title());
               
            theme_include('content'.DIRECTORY_SEPARATOR.'view.php');
        endwhile;
    }else{
        theme_include('error'.DIRECTORY_SEPARATOR.'404.php');
    }
}



