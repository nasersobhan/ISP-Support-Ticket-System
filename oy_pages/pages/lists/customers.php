<?php 
 global $dbase; 

ifhave_premssion('customer-list');
$rank = user_rank();
$dep = user_dep();
$site = user_site();
    if(is_get('lim'))
        $max_num = is_get('lim');
    else
        $max_num = get_setting('listsize');
        set_pgtitle('لیست مشتریان');
    $page = is_get('page');
    if(is_get('page')){
        $page = (int) $page - 1;
        $offset = $max_num * $page;
    }else{
        $page = 0;
        $offset = 0;
    }

    $main_query ="SELECT * FROM sob_customerinfo where cus_status=1";

    $where = "";
    // Searches
    if (is_get('s_text')) {
        $query = is_get('s_text');
        $where .=" AND (cus_name LIKE '%$query%' OR  cus_label LIKE '%$query%')";
    }
    if (is_get('s_cid')) {
        $query = is_get('s_cid');
        $where .=" AND cus_cid = $query ";
    }

    if (is_get('s_active')) {
        if (is_get('s_active') ==  'no') {
            $query = is_get('s_active');
            $where .=" AND cus_active = 0 ";
        }else{
            $query = is_get('s_active');
            $where .=" AND cus_active = 1 ";
        }
    }

    if($rank < 3){
        $where .=" AND cus_site = {$site} ";
    }

    if (is_get('s_site') && $rank >= 3 && ($dep == get_setting('salesdep') || $rank==99)) {
        $query = is_get('s_site');
        $where .=" AND cus_site = {$query} ";
    }


    if (is_get('order_time')) {
        if (is_get('order_time')=='a') {
            $orderby = " ORDER BY cus_activedate ASC";
        } else {
            $orderby = " ORDER BY cus_activedate DESC";
        }
    } 
    elseif (is_get('order_name')) {
        if(is_get('order_name')=='a')
            $orderby = " ORDER BY cus_name ASC";
        else
            $orderby = " ORDER BY cus_name DESC";      
    }
    elseif (is_get('order_package')) {
        if(is_get('order_package')=='a')
            $orderby = " ORDER BY cus_package ASC";
        else
            $orderby = " ORDER BY cus_package DESC";      
    }
    else {
        $orderby = " ORDER BY cus_id DESC";
    }
   
    global $pagin, $total;
    $total = $dbase->num_rows($main_query . $where);
            
    $left_rec = $total - ($page * $max_num);
    $limit = " LIMIT {$offset},{$max_num}";

    $ss_query = $main_query . $where . $orderby . $limit;
    post_query($ss_query);
    $pagin = pagination_local($total, $max_num, $page + 1, get_current_url());        
    theme_pg_include('customers');