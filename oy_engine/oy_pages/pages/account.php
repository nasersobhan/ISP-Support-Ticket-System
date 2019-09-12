<?php
//redirect_to()
global $ac,$dbase;;

if(is_get('user')){
    if(is_get('user') == 'signout'){
        set_pgtitle('Sign Out');
        if($ac->do_logout())
            Set_message("Sign Out Successfuly!");
        else
            Set_message("Sign Out Not Successfuly!");
        redirect_to(HOME,'', false);
       // theme_include('account/login.php');
    }elseif(is_get('user') == 'signup'){
        set_pgtitle('Signup to Ooyta System');
        if(PUB_REGISTER){
            if($ac->is_login())
                redirect_to(get_link('account', 'user', 'profile'), '', false);
            if(is_post('uname')){
                // is_post('uname'),is_post('password'),is_post('passwordre'), is_post('fullname'),is_post('email')
                if($_POST['security_code']== $_SESSION['security_code']){
                    unset($_POST['security_code']);
                    $result = $ac->do_register($_POST);
                    if($result=='Success'){
                        Set_message(res_rabon($result, 'Success'));
                        
                       
                        
                        
                         
                          redirect_to(get_link('account', 'user', 'signin'), '', false);
                        
                    }else Set_message(res_rabon($result, false));
                }else Set_message(res_rabon('Captcha is not correct', false));
                
                
            }

            load_jsplug('form');

            theme_include('account/register.php');
        }else{
            oy_die('Registration Not Available');
        }
    }elseif(is_get('user') == 'signin'){
        set_pgtitle('Sign In');
        if($ac->is_login())
          redirect_to(get_link('profile'), '', false);
        if(is_get('red'))
            $_SESSION['redirectorx'] = is_get('red');
        if(is_post('user')){
            if(is_post('rememberme'))
                $rm = 1;
            else
                $rm = 0; //$rm = (is_post['rememberme']==1) ?true : false; else $rm= false;
            $message = $ac->do_login(is_post('user'), is_post('password'), $rm);
            
            if($message == 'Success'){
                if(isset($_SESSION['redirectorx']))
                    redirect_to($_SESSION['redirectorx'], '', false);
                else
                    redirect_to(get_link('profile'), '', false);
            }else{
                    set_message(res_rabon($message,false )); 
            }
        }
        theme_include('account/login.php');
        
    
             
        
       

    }elseif(is_get('user') == 'profile'){
         redirect_to(get_link('profile'), '', false);
//        global $dbase;
//        $max_num = 1;
//        $value_id = user_uid();
//
//        class_include("table");
//
//        global $vtbl;
//        $vtbl = new oy_table('view_profile', 'table');
//        $vtbl->addCaption('Update my Profile', 'cap', array('id' => 'tblCap'));
//
//        $vtbl->addRow();
//        $vtbl->addCell('Feild Name', 'first', 'header');
//        $vtbl->addCell('Value', '', 'header');
//        $flds = '*';
//        if($dbase->num_rows("SELECT * FROM " . TBL_PIX . 'user_info' . ' where inf_id=' . user_uid()) == 0)
//            $dbase->RowInsert(TBL_PIX . 'user_info', array('inf_id' => user_uid()));
//
//        post_query("SELECT * FROM " . TBL_PIX . 'user_info' . ' where inf_id=' . user_uid());
//        //$vtbl_arr = $dbase->get_single_row_arr(TBL_PIX.'user_info', $flds, ' where inf_id='.user_uid());
////                             foreach($vtbl_arr[0] as $key => $value) {
////                               // list($name, $unit_price, $doz_price ) = $product;
////                                    $vtbl->addRow();
////                                
////                                    $vtbl->addCell($key, 'num' );
////                                    $vtbl->addCell($value, 'num' );
////                            }
//
//
//        load_jsplug('pickaday');
//        load_jsplug('select2');
//        load_jsplug('widearea');
//        load_jsplug('form');
//        theme_pg_include('update_profile.php');
    }elseif(is_get('user') == 'var'){
        if(is_get('id') AND is_get('ref')){
            $id = is_get('id');
            $token = is_get('ref');
            $tblx = $ac->get_tblname();
            $primkey = $ac->get_primkey();
            $statuskey = $ac->get_statuskey();
            $tokenkey = $ac->get_tokenkey();
            $where = " ".$primkey ."={$id} AND ".$tokenkey."='$token' AND ".$statuskey."=0 ";
           $check = $dbase->check_duplicate_m($tblx,$where );
           if($check){
                $dbase->RowUpdate($tblx,array($statuskey=>'1'),$where);
                Set_message(res_rabon(true, 'Verified'));
                redirect_to(get_link('account', 'user', 'signin'), '', false);
                
           }else{
                Set_message(res_rabon(false, 'Not a valid Verifiction ID Or Expired'));
                redirect_to(get_link('account', 'user', 'signin'), '', false);
           }
                        
        }
    }else{
        echo 'what?';
    }

 }elseif(is_get('eml') == 'change'){
    if(is_post('oldpass')){
        
        global $ac;
        if(is_post('neweml')==is_post('reneweml')){       
               echo  $ac->changeEML(is_post('oldpass'),is_post('neweml'));
        }else
            echo ' New Email Are not match';
  
    }else{
        echo 'NO Page';
    }   
 }elseif(is_get('info') == 'change'){
    if(is_post('myname')){
        global $user_arr;

        $db[$user_arr['FPX'].'name']=is_post('myname');
         $db[$user_arr['FPX'].'phone']=is_post('myphone');
        
         
         $dbase->RowUpdate($user_arr['TBL'],$db,' WHERE '.$user_arr['FPX'].'id='.  user_uid());
         echo 'Info Saved';
    }else{
        echo 'NO Page';
    }   
    
}elseif(is_get('pwd') == 'change'){
    if(is_post('oldpass')){
        
        global $ac;
        if(is_post('newpass')==is_post('renewpass') && is_post('renewpass')!=is_post('oldpass')){       
               echo  $ac->changePWD(is_post('oldpass'),is_post('newpass'));
        }else
            echo ' New Password Are not match';
  
    }else{
        echo 'NO Page';
    }
}else{
    load_jsplug('form');
    loginrequired();
   set_pgtitle("Account Settings");
   theme_pg_include('settings.php');
}