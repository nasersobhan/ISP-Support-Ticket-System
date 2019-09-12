<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(is_get('key')=='MyKey03x'){
  
global $dbase;
error_reporting(E_ALL); ini_set('display_errors', 1); 

$tbl = TBL_PIX.'message';
	$query = "SELECT * FROM {$tbl} WHERE mes_email=1 and mes_status=1 ORDER BY mes_id DESC LIMIT 20";
	$res =  $dbase->query($query);
		
	while($row = mysqli_fetch_array($res))
            {
		//$xbody= false;
            $fname = user_name_ex($row['mes_uid']);
            $att =false;
            
            //echo $att;
           // $toemail = $row['joa_toemail'];
//            if(!empty($row['mes_body']))
//                $xbody= true;
               
                $ax['{BODY}']=html_entity_decode($row['mes_body']);;
                $ax['{title}']=$row['mes_title'];
                $ax['{FOOTER}']='Sent by Ooyta Job Portal, Online Apply';

                $body = get_template('application'.DIRECTORY_SEPARATOR.'email',$ax);
            
               // $toemail = explode('|', $row['mes_toemail']);
                 $toname = user_name_ex($row['mes_tid']);
                if($row['mes_tid']==7)
                    $toname = 'Ooyta Mailer';
               
            
                if(!empty($row['mes_attachments'])){
                    $atts = explode('|', $row['mes_attachments']);
                    $attz=array();
                    foreach($atts as $at)
                        $attz[] = str_ireplace(HOME,RHOME, get_fileurl($at));
                    $att = implode('|', $attz);
                  
                    //$att = $row['mes_attachments'];
                }
      // if(check_email_address($row['joa_email']) AND ($xbody)){
          // foreach($toemail as $tom){
            if(send_mail($row['mes_toemail'],$toname,$row['mes_title'],$body,$row['mes_fromemail'],$fname,$att)){
            $dbase->RowUpdate($tbl, array('mes_email'=>2), 'WHERE mes_id='.$row['mes_id']);echo 'SENT';}
          // }
           
      // }
       
       
            }			

    //echo 'IN';

		
	

}