<?php

$tbl = TBL_PIX . 'infouser_oy';
$fld_pre = 'inf_';
loginrequired();




global $ac, $user, $dbase;
$user = new oy_user(user_uid());


if(is_get('action')){
    if(is_get('action') == 'avatar'){
        if(isset($_FILES['avatar_file'])){
            $sdata = str_replace('&acute;', '"', $_POST['avatar_data']);
            $sdata = str_replace('´', '"', $sdata);
            $sdata = str_replace('&acute;', '"', $sdata);
            $sdata1 = str_replace(' ', ',', $sdata);
            $sdata = json_decode($sdata1, true);
            $widthArray = array();
            $sss = datafile_upload('avatar_file', 1, 'avatar', $widthArray);


            $dst = UPLOAD_PATH . '/' . user_uid() . '/' . date('m-Y') . '/';


            $img_path = crop($sss['url'], basename($sss['url']), $sss['ext'], $sdata);

            if(isset($img_path['id'])){
                $user->set_info('avatar', $img_path['id']);
            }else
                echo $sss;
            $response = array(
                'state' => 200,
                'message' => $img_path['dat_url'],
                'result' => COREHOME . $img_path['dat_url']
            );
            echo json_encode($response);
        }
    }elseif(is_get('action') == 'cover'){
        if(isset($_FILES['avatar_file'])){
            $sdata = str_replace('&acute;', '"', is_post('avatar_data'));
            $sdata = str_replace('´', '"', $sdata);
            $sdata = str_replace('&acute;', '"', $sdata);
            $sdata1 = str_replace(' ', ',', $sdata);
            $sdata = json_decode($sdata1, true);

            $widthArray = array();
            $sss = datafile_upload('avatar_file', 1, 'avatar', $widthArray);
            //if(is_array($sss)) $user->set_info('cover',$sss['id']); else echo $sss;


            $img_path = crop($sss['url'], basename($sss['url']), $sss['ext'], $sdata);

            if(isset($img_path['id'])){
                $user->set_info('cover', $img_path['id']);
            }else
                echo $sss;

            $response = array(
                'state' => 200,
                'message' => $img_path['dat_url'],
                'result' => COREHOME . $img_path['dat_url']
            );
            echo json_encode($response);
        }else{

            $src['cover'] = $user->get_avatar_url();

            echo json_encode($src);
        }
        // $widthArray = array();
        //datafile_upload('avatar_file', 1, 'avatar',$widthArray );
        //echo 'Cover';
    }
}elseif(is_get('save') == 'single'){
    if(isset($_POST)){
        
        $dt = array();
        if(is_post('vlx') AND is_post('nmx'))
                        $dt[is_post('nmx')] = (is_post('vlx'));
        
        
        if(!empty($dt)){
            $uid = user_uid();
            $tbl = TBL_PIX.'infouser_oy';
            $dbase->RowUpdate($tbl,$dt," inf_id=".$uid);
            echo 'Saved';
            //print_r($_POST);
        }else{
            echo 'not saved';
            redirect_to(get_link('profile'));
        }
        
    }
    
}else{
    set_pgtitle('Update Your Profile');
    if((is_post('inf_name'))){
        if(is_post('inf_dob')){
            $_POST['inf_dob'] = to_date(is_post('inf_dob')); // cate2db($_POST['mai_village'],'village',$_POST['mai_district'],0);
        }

        //$_POST['job_cities'] = implode('|',$_POST['job_cities']);
        $aid = user_uid();
        //$_POST['job_slug'] = get_slug($_POST['job_title'], 'buz_jobs', 'job_slug');
        //$_POST['job_uid'] = user_uid();
        //$whereu =  "job_id='".$jid."' and job_uid='".$uid."'";
        $whereu = " WHERE inf_id='" . $aid . "' ";
        set_message(res_rabon($dbase->RowUpdate($tbl, $_POST, $whereu), 'Successfuly Updated!'));
        //redirect_to(get_link('%this','',false));
    }


    $uid = user_uid();
    //$where = " where job_uid = $uid AND job_id='$jid' limit 1";
    $where = " WHERE (inf_id='" . $uid . "') ";
    $main_query = "SELECT * FROM " . $tbl . $where;
    $numro = $dbase->num_rows($main_query);
    if($numro < 1){
        $dbase->RowInsert($tbl, array('inf_id' => $uid, 'inf_name' => user_info('name')));
    }

    post_query($main_query);
    $update_flag = true;
    load_jsplug('cropmaster');

    load_jsplug('select2');
    load_jsplug('boot-select');
    load_jsplug('kendo');
    load_jsplug('form');


    theme_pg_include('edit-profile.php');
}
?>