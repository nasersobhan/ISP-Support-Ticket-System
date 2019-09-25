<?php
 global $dbase; 
 $tbl = 'sob_leaves';
 $pfx = 'lea_';
$uid = user_uid();
$rank = user_rank();
$site = user_site();
$dep = user_dep();
//ifhave_premssion('ticket-list');
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
    set_pgtitle('لیست درخواستهای رخصتی');
    $where = "";

    $where =" AND {$pfx}uid = {$uid}";

    if(is_get('requests') == 1){
        $where = " AND {$pfx}uid <> {$uid} AND {$pfx}replaceaccept=0 AND {$pfx}replacement ='{$uid}' ";
        set_pgtitle('لیست درخواستهای جایگزینی');
    }

    if(is_get('requests') == 2 && $rank >= 2){
          //lea_uid <> {$uid} AND
          $where = " AND {$pfx}uid <> {$uid} AND {$pfx}accepted=0 AND  {$pfx}site='{$site}' AND {$pfx}replaceaccept=1 AND {$pfx}dep ='{$dep}' ";
          set_pgtitle('لیست درخواستهای رخصتی');
    }

    if(is_get('requests') == 3 && $rank >= 3){
        //lea_uid <> {$uid} AND
        $where = " ";
        set_pgtitle('لیست درخواستهای رخصتی');
    }


    if (is_get('s_accepted')) {
        $value = is_get('s_accepted');
        if($value == 5)
            $where .=" AND {$pfx}accepted = 0 ";
        else
            $where .=" AND {$pfx}accepted = $value ";
    }

    if (is_get('s_type')) {
        $query = is_get('s_type');
        $where .=" AND {$pfx}type = $query ";
    }




    if (is_get('s_cid')) {
        $query = is_get('s_cid');
        if(is_numeric($query) == FALSE)
            $query = user_idbyname($query);
        $where .=" AND {$pfx}uid = $query ";
    }

    if (is_get('s_priority')) {
        $query = is_get('s_priority');
        $where .=" AND {$pfx}priority = $query ";
    }
    

    if (is_get('s_category')) {
        $query = is_get('s_category');
        $where .=" AND {$pfx}category = $query ";
    }

    if (is_get('order_time')) {
        if (is_get('order_time')=='a') {
            $orderby = " ORDER BY {$pfx}time ASC";
        } else {
            $orderby = " ORDER BY {$pfx}time DESC";
        }
    } 
    elseif (is_get('order_title')) {
        if(is_get('order_title')=='a')
            $orderby = " ORDER BY {$pfx}title ASC";
        else
            $orderby = " ORDER BY {$pfx}title DESC";      
    }
    elseif (is_get('order_cat')) {
        if(is_get('order_cat')=='a')
            $orderby = " ORDER BY {$pfx}category ASC";
        else
            $orderby = " ORDER BY {$pfx}category DESC";      
    }
    else {
        $orderby = " ORDER BY {$pfx}id DESC";
    }
   
    global $pagin, $total;
    $total = $dbase->num_rows($main_query . $where);
            
    $left_rec = $total - ($page * $max_num);
    $limit = " LIMIT {$offset},{$max_num}";
   
    $ss_query = $main_query . $where . $orderby . $limit;
    //set_message($ss_query);

    set_buttons('<a data-toggle="modal" data-target="#Uni-modal" class="pull-left" href="'.get_link('hr').' #main-form"><i class="fas fa-plus-circle"></i></a> <a class="pull-left" href="'.get_current_url().'"><i class="fas fa-sync-alt"></i></a>');


    post_query($ss_query);
    $pagin = pagination_local($total, $max_num, $page + 1, get_current_url());        
    theme_pg_include('leaves');