<?php
global $ac;
///DO NOT EDIT
//$ac->login_req();
loginrequired();    
allowByrank(99);
global $autoloader, $tbl_pre,$fld_pre,$excp,$dbase,$oy_pg;

 
       if($autoloader){
           
           
           global $tbl;
           
            //page_include("autoloads/settings.php");
            
            $tbl_pre =   TBL_PIX; 
           
           
            func_include("autoloader");
            
             class_include("autoloader");
            $tbl = (isset($tbl) ? $tbl : som2tum(is_get('tbl')));//$tbl=som2tum(is_get('tbl'));
            $action = (is_get('action') ? is_get('action')  : 'list');
            global $oy_pg;
            autoload_setting(); 
            $oy_pg = new oy_page($tbl);
            if(isset($excp)){
               // print_r($excp);
                $oy_pg->Excp($excp);
                $oy_pg->load_page();
            }
           // echo $oy_pg->tbl;
      }
 
 
?>      