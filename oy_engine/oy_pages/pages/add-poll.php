<?php 
global $dbase;
if(is_post('pollname')){
    
$pid = is_get('id');
if($pid){
    
    $db['cho_pid'] = $pid;
    $db['cho_text'] = is_post('pollname');
     $db['cho_uid'] = user_uid();
    global $dbase;
    if($dbase->RowInsert('sob_choices',$db))
            echo 'Added';
}
    
}elseif(is_get('sub') && is_post('cid')){
                 
               //  $id1 = add_ifnotexist($food,$xtype);              
                    $datax['fol_uid']= user_uid();
                    $datax['fol_url']= is_post('cid');
                    $datax['fol_pid']= is_post('pid');
                    $datax['fol_type']= 'poll';
                    $tblff = TBL_PIX.'follow';
                  //  $qu = "select * from ".$tblff." where fol_pid='".$datax['fol_pid']."' AND fol_type='poll'";
                   // echo $qu;
               // $rwos = $dbase->num_rows($qu); 
                    if(is_polled($datax['fol_pid']))
                        un_poll($datax['fol_pid']);
                        
                        
                        if( $dbase->RowInsert($tblff,$datax))
                           echo g_lbl('thanksforvote');
                 //
}elseif(is_get('yesno') && is_post('value')){
                 
               //  $id1 = add_ifnotexist($food,$xtype);   
    $val = (is_post('value')=='yes' ? 1 : 2);
                    $datax['fol_uid']= user_uid();
                    $datax['fol_url']= $val;
                    $datax['fol_pid']= is_post('pid');
                    $datax['fol_type']= 'yesno';
                    $tblff = TBL_PIX.'follow';
                  //  $qu = "select * from ".$tblff." where fol_pid='".$datax['fol_pid']."' AND fol_type='poll'";
                   // echo $qu;
               // $rwos = $dbase->num_rows($qu); 
                    if(is_yesno($datax['fol_pid']))
                        un_yesno($datax['fol_pid']);
                        
                        
                        if( $dbase->RowInsert($tblff,$datax))
                                echo yesno_count($datax['fol_pid'],$val);
                          // echo g_lbl('thanksforvote');
}else{
    load_jsplug('form');

    
    theme_al_include('page/add-poll');
}