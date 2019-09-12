<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//require_once "Mail.php";

class oy_message{

    function sendMessage($from, $to, $title, $body, $parent = 0){
      $data['mes_uid'] = $from;
      $data['mes_title'] = $title;
      $data['mes_body'] = $body;
      $data['mes_parent'] = 0;
      $data['mes_type'] = 'message';
      $data['mes_parent'] = $parent;

      $realto = $to;
      if(substr($to, 0, 2 ) === "u:") {
        $to = str_replace("u:",'',$to);
        $data['mes_tid'] = $to;
        $data['mes_group'] = 0;
        $this->AddMessage($data);
      } 
      else {
        if(substr($to, 0, 2 ) === "g:") {
          $to = str_replace("g:",'',$to);
          $to = $this->get_usersfromgroup($to);
        } 
        elseif(substr($to, 0, 2 ) === "d:") {
          $to = str_replace("d:",'',$to);
          $to = $this->get_usersfromdep($to);
        }
        elseif(substr($to, 0, 2 ) === "s:") {
          $to = str_replace("s:",'',$to);
          $to = $this->get_usersfromsite($to);
        }
        if(is_array($to)){
          foreach($to as $toid) {
            $data['mes_tid'] = $toid;
            $data['mes_group'] = $realto;
            $this->AddMessage($data);
          }
        }
      }

  
    }

    function AddMessage($data){
      global $dbase;
      $tbl = 'sob_message';
      // $data['mes_uid'] = $from;
      // $data['mes_tid'] = $toid;
      // $data['mes_title'] = $title;
      // $data['mes_body'] = $body;
      // $data['mes_parent'] = 0;
      // $data['mes_type'] = 'message';
      // $data['mes_group'] = $group;
      $dbase->RowInsert($tbl,$data);
      $mid = $dbase->lastinserted_id();
      add_notification('پیام جدید از طرف '.user_name_ex($data['mes_uid']), $data['mes_tid'], 'inbox',$mid);
    }
    function sendEmail($from,$to,$title,$body){
             $host = "ssl://rsj13.rhostjh.com";
     $port = "465";
     $username = "info@ooyta.com";
     $password = "naser433";
        
        
        
        $headers = array ('MIME-Version' => '1.0rn',
        'Content-Type' => "text/html; charset=ISO-8859-1rn",
        'From' => $from,
        'To' => $to,
        'Subject' => $title
     );
      $smtp = Mail::factory('smtp',
        array ('host' => $host,
     'port' => $port,
     'auth' => true,
     'username' => $username,
     'password' => $password)); 
    $mail = $smtp->send($to, $headers, $body);
     if (PEAR::isError($mail)) {
       return ($mail->getMessage());
      }else{
          return true;
      }
    }
 
  private function get_usersfromgroup($gid){
    global $dbase;
    $userlist = [];
    $rows = $dbase->tbl2array2('sob_ugroups','ugr_userid', " WHERE ugr_status=1 AND ugr_gid={$gid}");
    foreach($rows as $user)
    $userlist[] = $user['ugr_userid'];
    return $userlist;
  }

  private function get_usersfromdep($gid){
    global $dbase;
    $userlist = [];
    $rows = $dbase->tbl2array2('sob_users','sob_id', " WHERE sob_status=1 AND sob_dep={$gid}");
    foreach($rows as $user)
      $userlist[] = $user['sob_id'];
    return $userlist;
  }

  private function get_usersfromsite($gid){
    global $dbase;
    $userlist = [];
    $rows = $dbase->tbl2array2('sob_users','sob_id', " WHERE sob_status=1 AND sob_site={$gid}");
    foreach($rows as $user)
      $userlist[] = $user['sob_id'];
    return $userlist;
  }
    
}



