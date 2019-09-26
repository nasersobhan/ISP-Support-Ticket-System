<?php
 global $dbase; 
 $tbl = 'sob_overtime';
 $pfx = 'ove_';
$uid = user_uid();
$rank = user_rank();
$site = user_site();
$dep = user_dep();
//ifhave_premssion('ticket-list');
$orderby = " ORDER BY {$pfx}id DESC";
    if(is_get('lim'))
        $max_num = is_get('lim');
    else
        $max_num = get_setting('listsize');

    $page = is_get('page');
    if(is_get('page')){
        $page = (int) $page - 1;
        $offset = $max_num * $page;
    }else{
        $page = 0;
        $offset = 0;
    }

    $main_query ="SELECT * FROM {$tbl} where {$pfx}status=1";
    set_pgtitle('لیست اضافه کاریها');
    $where = "";

    $where =" AND {$pfx}uid = {$uid}";

    if(is_get('need') == 'approve' && $rank >= 2){
        
        $where = " AND {$pfx}uid <> {$uid} AND {$pfx}approve=0 AND {$pfx}auid=0 AND {$pfx}site='{$site}' AND {$pfx}dep ='{$dep}' ";
        if($rank >= 3)
            $where = " AND {$pfx}uid <> {$uid} AND {$pfx}approve=0 AND {$pfx}auid=0 ";
        set_pgtitle('لیست درخواستهای اضافه کاری');
    }

    if(is_get('all') == 'yes' && $rank >= 2){
          //lea_uid <> {$uid} AND
          $where = " AND {$pfx}site='{$site}' AND {$pfx}dep ='{$dep}' ";
          if($rank >= 3)
            $where = " ";
          set_pgtitle('لیست اضافه کاریها');
    }




    if (is_get('s_accepted')) {
        $value = is_get('s_accepted');
        if($value == 5)
            $where .=" AND {$pfx}approve = 0 ";
        else
            $where .=" AND {$pfx}approve = $value ";
    }

    if (is_get('s_text')) {
        $query = is_get('s_text');
        $where .=" AND ({$pfx}why LIKE '%$query%' OR {$pfx}what LIKE '%$query%') ";
    }




    // if (is_get('s_cid')) {
    //     $query = is_get('s_cid');
    //     if(is_numeric($query) == FALSE)
    //         $query = user_idbyname($query);
    //     $where .=" AND {$pfx}uid = $query ";
    // }



    // if (is_get('order_time')) {
    //     if (is_get('order_time')=='a') {
    //         $orderby = " ORDER BY {$pfx}time ASC";
    //     } else {
    //         $orderby = " ORDER BY {$pfx}time DESC";
    //     }
    // } 
    // else {
    //     $orderby = " ORDER BY {$pfx}id DESC";
    // }
   
    global $pagin, $total;
    $total = $dbase->num_rows($main_query . $where);
            
    $left_rec = $total - ($page * $max_num);
    $limit = " LIMIT {$offset},{$max_num}";
   
    $ss_query = $main_query . $where . $orderby . $limit;
    //set_message($ss_query);

    set_buttons('<a data-toggle="modal" data-target="#Uni-modal" class="pull-left" href="'.get_link('hr').' #main-form"><i class="fas fa-plus-circle"></i></a> <a class="pull-left" href="'.get_current_url().'"><i class="fas fa-sync-alt"></i></a>');


    post_query($ss_query);
    $pagin = pagination_local($total, $max_num, $page + 1, get_current_url());        
    theme_pg_include('overtimes');