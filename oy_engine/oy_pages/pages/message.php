<?php
    $uid = user_uid(); //Get Current User ID
$fld_pre = 'con_';  // table Feild Prefix
$tbl = TBL_PIX . 'conversation'; // Table Name for this page
$pg_n = is_get('pg'); // current page name $_GET['pg']
Global $dbase; //Load Database Object    



global $dbase,$ac;        
        //$max_num = (is_get('max') ? is_get('max'): 20);
        $table_name = 'conversation';
        $primey_key = 'con_id';


        if(is_get('view')){
           
           $max_num = 20;
            $c_id= is_get('view');
           if(is_post('replay')){
               
              
               $data = array();
               $data['cor_reply']=is_post('replay');
               $data['cor_uid']= user_uid();
               $data['cor_ip']= get_userIP();
               $data['cor_cid']= (is_get('view') ? is_get('view') : is_post('cid_x'));
               $cid = $data['cor_cid'];
               $dbase->RowInsert('conversation_reply',$data);
               
              $dbase->RowUpdate('conversation',array('con_luid'=>user_uid())," where con_id='".$cid."'");
              $dbase->RowUpdate('conversation_reply',array('cor_read'=>1)," where cor_uid <> '".user_uid()."' and cor_cid='".$cid."'");
               Set_message("Replaid");
   
               echo '
                   
    <div class="media">
                    <div class="pull-left media-object">
                        <a href="#">
                            <img src="" width="60" alt="" />
                        </a>
                    </div>
                    <div class="media-body message">
                        <div class="panel panel-default">
                            <div class="panel-heading panel-heading-white">
                                <div class="pull-right">
                                    <small class="text-muted">Just Now</small>
                                </div>
                                <a href="">You</a>
                            </div>
                            <div class="panel-body">'.nl2br(is_post('replay')).' 
                            </div>
                        </div>
                    </div>
                </div>';
               
               
           }else{

                $limit = " ";
                $main_query ="SELECT R.rep_uid, R.rep_id,R.rep_time,R.rep_reply,U.sob_id,U.sob_user,U.sob_email FROM sob_users U, sob_repay_con R ";
                $where = "WHERE R.rep_uid=U.sob_id and R.rep_cid='$c_id' ";
                $order = "ORDER BY R.rep_id ASC";
                $ss_query = $main_query .$where.$order.$limit;
                global $total, $max_num;
                post_query($ss_query);
                set_pgtitle('Conversition');
               addjs(DATA_CORE_PATH.'/js/messageing.php?cid='.$c_id);
               theme_al_include('message/view.php');
           }
            
        }elseif(is_get('last')){
           $cid= is_get('last');
            if(is_post('con_luid')){
                 $dbase->RowUpdate('conversation',array('con_luid'=>0)," where con_id='".$cid."'");
            }else{
                   $max_num = 1;
                   $value_id=is_get('last');

                   $limit = " LIMIT {$max_num}";
                   $main_query ="SELECT con_luid FROM {$table_name} ";
                   $where = " where {$primey_key}='{$value_id}' ";
                   $ss_query = $main_query .$where.$limit;
                   global $total, $max_num;
                   post_query($ss_query);
                   con_luid();
            }
        }elseif(is_get('user')){
            echo user_uid();
            
            
        }elseif(is_get('new')){
         
            
            
            
            
            $data['con_uid1'] = user_uid();
            $data['con_luid'] = user_uid();
            $data['con_uid2'] = is_post('touser');
           $data['con_ip'] = get_userIP();
            $dbase->RowInsert('conversation',$data);
            $cid = $dbase->lastinserted_id();
            $data2['cor_cid'] =  $cid ;
            $data2['cor_uid'] = user_uid();
            $data2['cor_ip'] = get_userIP();
            $data2['cor_reply'] = is_post('message');
            $dbase->RowInsert('conversation_reply',$data2);
            //echo get_link('message','view', $cid );
            //redirect_to(get_link('message','view',$cid));
            
        }elseif(is_get('list')){
            
           // load_jsplug('tblsorter');
            global $dbase, $total, $max_num, $curpage;
            if(is_get('list')=='all'){
                    $curpage = (is_get('page') ? is_get('page') : 1);
                if ($curpage <= 0) $curpage = 1;
                
                $startpoint = ($curpage * $max_num) - $max_num;
                $order=" ORDER BY job_id DESC";
                $limit = " LIMIT {$startpoint} , {$max_num}";
                $join = " LEFT JOIN company ON jobs.job_employer=company.com_id";
                $main_query ="SELECT job_id,job_title, job_employer,job_provinces, job_closingdate, job_experience,company.com_name, job_slug  FROM jobs ";
                $where = " where job_status != 2 ";
                $ss_query = $main_query .$join.$where.$order.$limit;
                $total = $dbase->num_rows($main_query .$join.$where.$order);
               
            }else{
               // load_jsplug('widearea');
             
                
            }
            
            global $total, $max_num;
            post_query($ss_query);
            theme_pg_include('list.php');
            
        }elseif(is_get('add')){
           allow_only('user');
            if(is_post('job_title') && is_get('add')=='save'){
              
                $_POST['job_provinces']= implode('|',$_POST['job_provinces']);
                $_POST['job_employer'] = 16; //Employer ID Get by Session
                $_POST['job_slug'] = get_slug($_POST['job_title'],'jobs','job_slug');
                
                
                $dbase->RowInsert('jobs',$_POST);
                
                
                //print_r($_POST);
                $id = $dbase->lastinserted_id();
                redirect_to(get_link('jobs','edit',$id));
            }else{
              load_jsplug('pickaday');
              load_jsplug('select2');
              load_jsplug('widearea');
              load_jsplug('form');
              theme_pg_include('add.php');
                
            }
        }elseif(is_get('search')){
       
        
            
        }elseif(is_get('city')){
            global $dbase, $total, $max_num, $curpage,$homepage;
            $curpage = (is_get('page') ? is_get('page') : 1);
            
            if ($curpage <= 0) $curpage = 1;
             
             
             
            $city = get_ccid(dirty_url(is_get('city')));
            $homepage = get_link('jobs','city',is_get('city'));
            //echo dirty_url(is_get('city'));
            $startpoint = ($curpage * $max_num) - $max_num;
            
            $order=" ORDER BY job_id DESC";
            $limit = " LIMIT {$startpoint} , {$max_num}";
            $join = " LEFT JOIN company ON jobs.job_employer=company.com_id";
            $main_query ="SELECT job_id,job_title, job_employer,job_provinces, job_closingdate, job_experience,company.com_name, job_slug  FROM jobs ";
            $where = " where job_status=1 and job_provinces like '%".$city."%' ";
            $ss_query = $main_query .$join.$where.$order.$limit;
            $total = $dbase->num_rows($main_query .$join.$where.$order);
            global $total, $max_num;
            post_query($ss_query);
            //echo $main_query .$join.$where.$order.$limit;
            theme_pg_include('home.php');
            
        }elseif(is_get('employer')){
            global $dbase, $total, $max_num, $curpage, $homepage;
            $curpage = (is_get('page') ? is_get('page') : 1);
            
            if ($curpage <= 0) $curpage = 1;
           
             
             
            $company = get_companyid(dirty_url(is_get('employer')));
            $homepage = get_link('jobs','employer',is_get('employer'));
            $startpoint = ($curpage * $max_num) - $max_num;
            $order=" ORDER BY job_id DESC";
            $limit = " LIMIT {$startpoint} , {$max_num}";
            $join = " LEFT JOIN company ON jobs.job_employer=company.com_id";
            $main_query ="SELECT job_id,job_title, job_employer,job_provinces, job_closingdate, job_experience,company.com_name, job_slug  FROM jobs ";
            $where = " where job_status=1 and job_employer = '".$company."' ";
            $ss_query = $main_query .$join.$where.$order.$limit;
            $total = $dbase->num_rows($main_query .$join.$where.$order);
            //global $total, $max_num, $homepage;
            post_query($ss_query);
            theme_pg_include('home.php');
        }else{
            // allow_only('user');
            
             loginrequired();
            global $dbase, $total, $max_num, $curpage, $homepage;
            $curpage = (is_get('page') ? is_get('page') : 1);
            
            if ($curpage <= 0) $curpage = 1;
            
             
            
            //$total = $dbase->num_rows($main_query .$join.$where.$order);
            //global $total, $max_num, $homepage;
            //post_query($ss_query);
            //
            //
            //
            //
            //
            //
            //
            //
            //
            //
            //
           
       
            
            
            global $total;
    if(is_get('lim'))
        $max_num = is_get('lim');
    else
        $max_num = TBL_LIMITE;
//    $today = date('Y-m-d');
//    if(is_get('list') == 'all')
//        $where = " where {$fld_pre}status<>100 AND {$fld_pre}uid = {$uid}";
//    elseif(is_get('list') == 'act')
//        $where = " where {$fld_pre}status<>100 AND {$fld_pre}uid = {$uid} AND {$fld_pre}status=1";
//    elseif(is_get('list') == 'sus')
//        $where = " where {$fld_pre}status<>100 AND {$fld_pre}uid = {$uid} AND {$fld_pre}status=0";
//    elseif(is_get('list') == 'exp')
//        $where = " where {$fld_pre}status<>100 AND {$fld_pre}uid = {$uid} AND {$fld_pre}closingdate<'{$today}'";
//    else
//        $where = " where {$fld_pre}status<>100 AND {$fld_pre}uid = {$uid} ";

//    if(is_get('order'))
//        $ord = is_get('order');
//    else
//        $ord = 'ASE';
//    $orderby = " ORDER BY {$fld_pre}id {$ord}";
   // $total = $dbase->num_rows("select {$fld_pre}id from {$tbl} " . $where);
//    $page = is_get('page');
//    if(is_get('page')){
//        $page = (int) $page - 1;
//        $offset = $max_num * $page;
//    }else{
//        $page = 0;
//        $offset = 0;
//    }
//    $left_rec = $total - ($page * $max_num);
//    $limit = " LIMIT {$offset},{$max_num}";
   // $ss_query = $where . $limit;
    
    
    
    
    $user_one = user_uid();
            $tbl_pre = TBL_PIX;
            
            
            
            if(is_get('lim'))
        $max_num = is_get('lim');
    else
        $max_num = TBL_LIMITE;
            
            $page = is_get('page');
            $homepage = get_link('message','','');
            $page = ($curpage * $max_num) - $max_num;
            $order=" ORDER BY c.con_id DESC";
            $limit = " LIMIT {$page} , {$max_num}";
            $join = " ";
            
           
            $main_query = "SELECT c.con_time,u.sob_id,c.con_id,u.sob_user,u.sob_email
                            FROM {$tbl} c, {$tbl_pre}users u
                            ";
             $where = " WHERE CASE 
                            WHEN c.con_uid1 = {$user_one}
                            THEN c.con_uid2 = u.sob_id
                            WHEN c.con_uid2 = {$user_one}
                            THEN c.con_uid1= u.sob_id
                            END 
                            AND (
                            c.con_uid1 ={$user_one}
                            OR c.con_uid2 ={$user_one}
                            ) ";
            
            $ss_query = $main_query .$join.$where.$order.$limit;
    
    $total = $dbase->num_rows($ss_query);
    
    
            post_query($ss_query);
    
    
    
    
    
    $vtbl = new oy_table($fld_pre . 'list', 'table jobs_TBL table-hover');
    $vtbl->addTSection('thead');
    $vtbl->addRow('blue_head');
    $vtbl->addCell('<input id="checkAll" type="checkbox" />', '', 'header');
    $vtbl->addCell('From', '', 'header');
    $vtbl->addCell('Time', '', 'header');
    $vtbl->addCell('Replies', '', 'header');
   
    $action_btns = '<div class="btn-group" role="group" aria-label="Allowed Action">
  <a href="' . get_link($pg_n, 'edit', '{ID}') . '" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
  <a href="' . get_link($pg_n, 'sus', '{ID}') . '"class="btn btn-default btn-sm btn-warning"><i class="glyphicon glyphicon-ban-circle"></i></a>
  <a href="' . get_link($pg_n, 'del', '{ID}') . '" class="btn btn-default btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
</div>';
    $action_btns2 = '<div class="btn-group" role="group" aria-label="Allowed Action">
  <a href="' . get_link($pg_n, 'edit', '{ID}') . '" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
  <a href="' . get_link($pg_n, 'act', '{ID}') . '"class="btn btn-default btn-sm btn-success"><i class="glyphicon glyphicon-ok-circle"></i></a>
  <a href="' . get_link($pg_n, 'del', '{ID}') . '" class="btn btn-default btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
</div>';
  //  $vtbl->addCell('Actions', '', 'header');
    $vtbl->addTSection('/thead');
    //
    //$posts = $dbase->tbl2array2($tbl, ' * ', $where . $limit);
    global $posts;
    
    foreach($posts as $post){
        $vtbl->addRow();
        $vtbl->addCell('<input name="jid[]" value="' . $post[$fld_pre . 'id'] . '" type="checkbox" />');
        $vtbl->addCell($post['sob_user']);
        $vtbl->addCell($post['con_time']);
        //$vtbl->addCell('');
        $app_num = $dbase->num_rows('select joa_id from sob_joapp where joa_status=1 AND joa_jpost=' . $post[$fld_pre . 'id']);
        $vtbl->addCell('<a title="' . $app_num . ' Job Seekers Applied" href="' . get_link($fld_pre . 'app', 'job', $post[$fld_pre . 'id']) . '">(' . $app_num . ')</a> <span class="label label-default">' .' '. ' hits</span> ');
//        if($post[$fld_pre . 'status'] == 1)
//            $vtbl->addCell(str_ireplace('{ID}', $post[$fld_pre . 'id'], $action_btns));
//        else
//            $vtbl->addCell(str_ireplace('{ID}', $post[$fld_pre . 'id'], $action_btns2));
    } global $page_content, $pagin;
    $page_content = $vtbl->display();
  $pagin = pagination($total, $max_num, $page + 1, get_link($pg_n, 'list', is_get('list')) . '&');
    load_jsplug('table');
    set_pgtitle('Message Inbox');
            
            
            
            
            
            
            theme_al_include('list.php');	
        }
        
        
        
        
        ////function for this part