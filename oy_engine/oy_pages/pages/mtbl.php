<?php

global $the_tbl;
$action=is_get('a');
$id = is_get('id');
$ajax = is_get('ajax');
if($action=='del'){
    
}elseif($action=='sus'){

    
    
}elseif($action=='up'){
    
}elseif(is_get('del-det')){
    
    
     if(is_owner(is_get('del-det'), 'choices') OR user_rank() > 50){
   
    
            if(user_rank() > 50){
               $the_tbl->del_detial(is_get('del-det'));
            }else{
                  $the_tbl->set_detial_status(is_get('del-det'),100);
            }
            echo g_lbl('deleted');
         
    }else
    echo g_lbl('nopermission');
    
    
//   if())
//            echo g_lbl('deleted');
//    else echo  g_lbl('error');  

}elseif(is_get('detail')){
   if(is_get('pid')){
      $db['det_pid'] = is_get('pid');
       $db['det_key'] = is_get('detail');
      // $db['det_type'] = 'choice';
       
    $db['det_value'] = is_post('det_title');
     $db['det_uid'] = user_uid();
     $db['det_lang'] = get_lang();
    global $dbase;
    
   // if($dbase->RowInsert($tbl_pfx.'choices',$db))
    if($the_tbl->add_detial($db))
            echo 'Saved';
    else echo 'error';
   }
}elseif(is_get('add')){
     if(is_post()){
       $_POST['type'] = (is_post('type') ? is_post('type') : is_get('add'));
       $result = $the_tbl->add_new($_POST);  
       if($result) 
           echo $result;
       else
           echo 'error';
    }
}
