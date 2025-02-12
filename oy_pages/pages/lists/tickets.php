<?php
 global $dbase; 

ifhave_premssion('ticket-list');
$rank = user_rank();
$dep = user_dep();
$site = user_site();
    if(is_get('lim'))
        $max_num = is_get('lim');
    else
        $max_num = get_setting('listsize');
        set_pgtitle('لیست تکتهای خدماتی');
    $page = is_get('page');
    if(is_get('page')){
        $page = (int) $page - 1;
        $offset = $max_num * $page;
    }else{
        $page = 0;
        $offset = 0;
    }

    $main_query ="SELECT * FROM sob_tickets where tic_status=1";

    $where = "";


    if($rank < 3){
        $where .=" AND tic_site = {$site} ";
    }

    if (is_get('s_site') && $rank >= 3 && ($dep == get_setting('techdep') || $rank==99)) {
        $query = is_get('s_site');
        $where .=" AND tic_site = {$query} ";
    }


    // Searches
    if (is_get('s_text')) {
        $query = is_get('s_text');
        $where .=" AND (tic_title LIKE '%$query%' OR  tic_body LIKE '%$query%')";
    }

    if (is_get('s_type')) {
        $query = is_get('s_type');
        $where .=" AND tic_type = $query ";
    }

    if (is_get('s_completed')) {
        if(is_get('s_completed')==100)
            $where .=" AND tic_progress = 100 ";
        else
            $where .=" AND tic_progress <> 100 ";
    }

    if (is_get('s_tag')) {
        $query = is_get('s_tag');
        $where .=" AND tic_tag = $query ";
    }

    if (is_get('s_cid')) {
        $query = is_get('s_cid');
        $where .=" AND tic_cid = $query ";
    }

    if (is_get('s_priority')) {
        $query = is_get('s_priority');
        $where .=" AND tic_priority = $query ";
    }
    

    if (is_get('s_category')) {
        $query = is_get('s_category');
        $where .=" AND tic_category = $query ";
    }

    if (is_get('order_time')) {
        if (is_get('order_time')=='a') {
            $orderby = " ORDER BY tic_time ASC";
        } else {
            $orderby = " ORDER BY tic_time DESC";
        }
    } 
    elseif (is_get('order_title')) {
        if(is_get('order_title')=='a')
            $orderby = " ORDER BY tic_title ASC";
        else
            $orderby = " ORDER BY tic_title DESC";      
    }
    elseif (is_get('order_cat')) {
        if(is_get('order_cat')=='a')
            $orderby = " ORDER BY tic_category ASC";
        else
            $orderby = " ORDER BY tic_category DESC";      
    }
    else {
        $orderby = " ORDER BY tic_id DESC";
    }
   
    global $pagin, $total;
    $total = $dbase->num_rows($main_query . $where);
            
    $left_rec = $total - ($page * $max_num);
    $limit = " LIMIT {$offset},{$max_num}";

    $ss_query = $main_query . $where . $orderby . $limit;
    post_query($ss_query);
    $pagin = pagination_local($total, $max_num, $page + 1, get_current_url());        
    theme_pg_include('tickets');