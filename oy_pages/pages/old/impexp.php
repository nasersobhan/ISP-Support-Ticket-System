<?php
loginrequired();
global $dbase,$curr,$sizetype;
$curr = get_cate_name(get_setting('currency'));
$sizetype = (get_setting('sizetype'));
//echo ($_GET['eoe']==1? EXOIL : IMOIL);
$myhome = HOME.'?pg=impexp';
load_jsplug('bootstrap') ;
class_include('jdatetime');
load_jsplug('sdate') ;

load_jsplug('jquery-ui') ;
load_jsplug('uicomplete') ;
load_jsplug('form') ;
if(is_get('add')){

    
    $data = $_POST;
    $data['imp_name'] = cate2db(is_post('imp_name'),'company');
    $data['imp_uid'] = user_uid();
    $data['imp_eoe'] = is_get('eoe');
    
    
    
//     $data['imp_date'] = date('Y-m-d');
//     $data['imp_sdate'] = get_jdate('Y-m-d');
     
      $str = 'Y-m-d';
    if(tis_shamsi()){
        $data['imp_date'] =  jalali_to_gregorian($data['imp_sdate'],$str);
    }else{
        $data['imp_sdate'] = gregorian_to_jalali($data['imp_date'],$str);
    }
     
     
     
     if(is_get('eoe')==2) {
      $data['imp_m_name'] = cate2db(is_post('imp_m_name'),'mcompany');
       $data['imp_o_name'] = cate2db(is_post('imp_o_name'),'ocompany');
        $data['imp_t_cname'] = cate2db(is_post('imp_t_cname'),'tcompany');
     }
     
     
 IF($dbase->RowInsert('sob_impexp',$data))
         ECHO g_lbl('saved');   
 ELSE
     ECHO g_lbl('errortry');   
    

}elseif(is_get('edit')){
   $oid= is_get('edit');
    if(is_post('imp_name')){
        
          $data = $_POST;
    $data['imp_name'] = cate2db(is_post('imp_name'),'company');
    $data['imp_uid'] = user_uid();
    
        $str = 'Y-m-d';
    if(tis_shamsi()){
        $data['imp_date'] =  jalali_to_gregorian($data['imp_sdate'],$str);
    }else{
        $data['imp_sdate'] = gregorian_to_jalali($data['imp_date'],$str);
    }
    
   // $data['imp_eoe'] = is_get('eoe');
    // $data['imp_date'] = date('Y-m-d');
    // $data['imp_sdate'] = get_jdate('Y-m-d');
    
      $whereedit = " WHERE imp_id='".$oid."'";
 IF($dbase->RowUpdate('sob_impexp',$data,$whereedit ))
         ECHO g_lbl('edited');   
 ELSE
     ECHO g_lbl('errortry');   
    }else{
    $main_query ="SELECT * FROM sob_impexp where imp_stat=0";
    $where = " AND imp_id='".$oid."'";
    $limit = " LIMIT 1";
    $ss_query = $main_query . $where . $limit;
    post_query($ss_query);
        if(have_post()){
        while(have_post()) : the_post();  
            set_pgtitle(get_imp_eoe()==1? 'فروش به '.get_cate_name(get_imp_name()) : 'خرید از '.get_cate_name(get_imp_name()));
            theme_include('pages\edit_oil');  
        endwhile;}
    
    }
}elseif(is_get('eoe')){
    
    
    
    set_pgtitle($_GET['eoe']==1? 'فروش روغنیات' : 'خرید روغنیات');
            theme_include('pages\oilexp');
            
  
}elseif(is_get('del')){
    $id = is_get('del');
    IF($dbase->RowDelete('sob_impexp'," imp_id=".$id))
         ECHO g_lbl('deleted');
 ELSE
    ECHO g_lbl('errortry');         
            
}else{
    set_pgtitle('لیست');
        if(is_get('lim'))
        $max_num = is_get('lim');
        
    elseif(is_get('loader'))
        $max_num = 5;
    else{
      if(isset($_COOKIE['jobtheme']) && $_COOKIE['jobtheme'] == 'tbl')
            $max_num = 40;
      else
            $max_num = TBL_LIMITE;
    }
    
    
    
    
        $page = is_get('page');

    if(is_get('page')){
        $page = (int) $page - 1;
        $offset = $max_num * $page;
    }else{
        $page = 0;
        $offset = 0;
    }

    
    
    $main_query ="SELECT * FROM sob_impexp where imp_stat=0";
    
    
    $where = "";
    $orderby = " ORDER BY imp_id DESC";
      global $pagin, $total;
    $total = $dbase->num_rows($main_query . $where);
    if($myhome && $total < 1)
        //redirect_to(get_link('jobs'));

    $left_rec = $total - ($page * $max_num);
    $limit = " LIMIT {$offset},{$max_num}";
    
    //$ss_query = "SELECT * FROM sob_impexp where imp_stat=0 $where ORDER BY imp_time LIMIT $start_from, $per_page";
    
    
            $ss_query = $main_query . $where . $orderby . $limit;
         post_query($ss_query);
    if(is_get('pg') == 'impexp')
        $pagin = pagination($total, $max_num, $page + 1, get_current_url());
    else
        $pagin = pagination($total, $max_num, $page + 1, get_current_url().'?pg=impexp');
 
    
    
    
    
    
    theme_include('pages\lists'); 
    
}
