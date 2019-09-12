<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(is_get('key')=='MyKey03'){
  
global $dbase;
error_reporting(E_ALL); ini_set('display_errors', 1); 

$tbl = TBL_PIX.'joapp';
	$query = "SELECT * FROM {$tbl} WHERE joa_emaisent=0 LIMIT 20";
	$res =  $dbase->query($query);
		
	while($row = mysqli_fetch_array($res))
            {
		 $xbody= false;
            $fname = user_name_ex($row['joa_uid']);
            $att = str_ireplace(HOME,RHOME, get_fileurl($row['joa_files']));
            //echo $att;
            $toemail = $row['joa_toemail'];
            if(!empty($row['joa_body']))
                $xbody= true;
            $body = html_entity_decode($row['joa_body']);
                $ax['{BODY}']=$body;
                $ax['{title}']=$row['joa_title'];
                $ax['{FOOTER}']='Sent by Ooyta Job Portal, Online Apply';
//                $ax['::LINK_ADDNEW']=get_tbllink(is_get('tbl'), 'add');
//                $ax['::LINK_ALL']=get_tbllink(is_get('tbl')).'&list=all';
//                $ax['::LINK_MY']=get_tbllink(is_get('tbl'));
   $body = get_template('application'.DIRECTORY_SEPARATOR.'email',$ax);
            
            
            
       if(check_email_address($row['joa_email']) AND ($xbody)){
           
            send_mail($toemail,get_pagename($row['joa_to']),$row['joa_title'],$body,$row['joa_email'],$fname,$att);
           // echo 'SENT';
       }
       
       $dbase->RowUpdate($tbl, array('joa_emaisent'=>1), 'WHERE joa_id='.$row['joa_id']);
            }			

    //echo 'IN';

		
	

}