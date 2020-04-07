<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

   define ('M_SVR', "ssl://smtp.gmail.com");
          define ('M_USR', "youmail@gmail");
          define ('M_PASS', "YourPassword");
          define ('M_PORT', 587);
          define ('M_AUTH', TRUE);
          
          
  
          class_include('phpmailer');   
           class_include('smtp');   
          
          
function send_message($da = array(), $mailit = true){
    global $dbase;
    
   $d['mes_uid'] = (isset($da['fid']) ? $da['fid'] : user_uid());
    $d['mes_fromemail'] = $da['fmail'];
    $d['mes_tid'] = $da['tid']; //$toemail;
    $d['mes_toemail'] = $da['tmail'];
    $d['mes_title'] =$da['title'] ;
    $d['mes_body'] = $da['body'];
    $d['mes_attachments'] = $da['attach'];
    if(!$mailit)
    $d['mes_email'] = 0;
    
    $tblm = TBL_PIX.'message';
   return $dbase->RowInsert($tblm,$d); 
}          
          
          
          
function send_mail($to,$tname,$title,$body,$from,$fname, $attch = false){
        //class_include("phpmailer");
        $mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
        $mail->IsSMTP(); // telling the class to use SMTP    
        try {
            $mail->Host       = M_SVR; // SMTP server
                              // enables SMTP debug information (for testing)
            $mail->SMTPAuth   = M_AUTH;                  // enable SMTP authentication

            $mail->Port       = M_PORT;                    // set the SMTP port for the GMAIL server
            $mail->Username   = M_USR; // SMTP account username
            $mail->Password   = M_PASS;        // SMTP account password
            $mail->SMTPKeepAlive = true;
            $mail->SMTPDebug  = 0;   
         
            $mail->CharSet = "UTF-8";
            
            $mail->AddReplyTo($from, $fname);
            $mail->SetFrom(M_USR, $fname);
            
            $to = explode('|', $to);
            foreach($to as $emto)
            $mail->AddAddress($emto, $tname);
             
           // $mail->AddCC($from, $fname); 
        if($attch){
            $attchx = explode('|', $attch);
            foreach($attchx as $att)
                if(file_exists($att))
                    $mail->AddAttachment($att);
        }

            $mail->Subject = $title;
            $mail->AltBody ='Shamal Mail'; // optional - MsgHTML will create an alternate automatically
            $mail->IsHTML(true);
            $mail->MsgHTML($body); //file_get_contents('contents.html'));
            //$mail->AddAttachment('images/phpmailer.gif');      // attachment
            //$mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
            $mail->Send();
            return true;
      } catch (phpmailerException $e) {
            return nl2br($e->errorMessage()); //Pretty error messages from PHPMailer
      } catch (Exception $e) {
            return nl2br($e->getMessage()); //Boring error messages from anything else!
      }
}
