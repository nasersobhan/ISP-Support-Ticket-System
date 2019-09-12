<?php 

global $dbase;
$dat = date('Y-m-d',strtotime("-1 days"));

$tbl = TBL_PIX.'jobs';
$res = "SELECT * FROM {$tbl} WHERE job_status=1 AND job_closingdate='$dat' LIMIT 100";
 post_query($res);
   if(have_post()) { while(have_post()) : the_post();  

  $toemail=false;
  if(!empty(get_job_email()))
   $toemail  = get_job_email();
  else{
      $guid = get_job_guidline();
      $ems = extract_emails_from($guid);
     // print_R($ems);
      if(count($ems) > 0)
          $toemail = implode('|', $ems);//$ems[0];
  }
     // echo ($toemail);
   if($toemail){
            $ch['{TITLE}'] = get_job_title();
             $ch['{JOBURL}'] = get_url_job(get_job_slug());
            $ch['{ORG}'] = get_pagename(get_job_employer());
            
            $ch['{HITS}'] = get_job_hits();
            $ch['{APP}'] = get_job_appnum(get_job_id());
            $ch['{APPURL}'] = get_link('application','jobid',get_job_id());
            $ch['{EDATE}']=get_job_closingdate();
            $text = get_template('application'.DIRECTORY_SEPARATOR.'jobsreport',$ch);
   
   
//    $d['mes_uid'] = 7;
//    $d['mes_fromemail'] = 'report@ooyta.com';
//    $d['mes_tid'] = get_job_uid(); //$toemail;
//    $d['mes_toemail'] = $toemail;
//    $d['mes_title'] = 'Job Posting Report: '.get_job_title();
//    $d['mes_body'] = $text;
//    $tblm = TBL_PIX.'message';
//    $dbase->RowInsert($tblm,$d);
    
    $da['fid']= 7;
    $da['fmail'] = 'report@ooyta.com';
    $da['tid']= get_job_uid(); //$toemail;
   $da['tmail']= $toemail;
    $da['title']= 'Job Posting Report: '.get_job_title() ;
    $da['body']= $text;
    send_message($da);
    echo 'done';
   }
  
//   $where = "job_id=" . get_sob_id();
//   $dbase->RowUpdate($tbl, $db = array("job_status" => '99'), $where);

   
   endwhile; }
?>