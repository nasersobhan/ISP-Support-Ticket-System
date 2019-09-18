<?php get_header(); 

$id = is_get('id');
$uid = user_uid();
$pfx_uid = 'u:'.$uid;
$site = user_site();
$dep = user_dep();
?>
<div class="content-box">


     
    <div class="col-md-4">
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a>
                   موارد قابل توجه
                    </a>
                </h4>
                </div>
       
               
                <div class="list-group">



<!-- USER  -->
<?php
                    global $dbase;
                    //lea_uid <> {$uid} AND
                    $where = " WHERE lea_status=0 AND  lea_replaceaccept=0  AND lea_replacement ='{$uid}' ORDER BY lea_id LIMIT 5";
                    $rows = $dbase->tbl2array2('sob_leaves','*',$where);
                    foreach($rows as $row){
                        echo '<span class="list-group-item">
                        <a data-toggle="modal" data-target="#Uni-modal"  href="'.HOME.'?pg=hr&lid='.$row['lea_id'].' #main-form" >جایگزینی: '.user_name_ex($row['lea_uid']).'</a>
                        <span class="label label-warning">نیاز به تایید</span>
                        </span>';
                    } 
                    ?>

<!-- ADMIN ONLY -->

                <?php
                    global $dbase;
                    //AND ove_uid <> {$uid}
                    $where = " WHERE ove_status=1 and ove_approve=0  AND ove_site='{$site}' AND ove_dep ='{$dep}' ORDER BY ove_id LIMIT 5";
                    $rows = $dbase->tbl2array2('sob_overtime','*',$where);
                    foreach($rows as $row){
                        echo '<span class="list-group-item">
                        <a data-toggle="modal" data-target="#Uni-modal"  href="'.HOME.'?pg=hr&overtime=view&oid='.$row['ove_id'].' #main-form" >اضافه کاری: '.user_name_ex($row['ove_uid']).'</a>
                        <span class="label label-warning">نیاز به تایید شما.</span>
                        </span>';
                    } 
                    ?>

                <?php
                    global $dbase;
                    //lea_uid <> {$uid} AND
                    $where = " WHERE lea_accepted=0 AND  lea_site='{$site}' AND lea_replaceaccept=1 AND lea_dep ='{$dep}' ORDER BY lea_id LIMIT 5";
                    $rows = $dbase->tbl2array2('sob_leaves','*',$where);
                    foreach($rows as $row){
                        echo '<span class="list-group-item">
                        <a data-toggle="modal" data-target="#Uni-modal"  href="'.HOME.'?pg=hr&lid='.$row['lea_id'].' #main-form" >رخصتی: '.user_name_ex($row['lea_uid']).'</a>
                        <span class="label label-warning">نیاز به تایید</span>
                        </span>';
                    } 
                    ?>

                    <?php
                    global $dbase;
                    $where = " WHERE tic_progress<>100 AND tic_site='{$site}' AND tic_assigned ='' ORDER BY tic_priority DESC LIMIT 5";
                    $rows = $dbase->tbl2array2('sob_tickets','*',$where);
                    foreach($rows as $row){
                        echo '<span class="list-group-item">
                        <a href="'.HOME.'?pg=ticket&id='.$row['tic_id'].'" >تکت: '.$row['tic_title'].'</a>
                        <span class="label label-danger">نیاز به تغیین مسئول</span>
                        </span>';
                    } 
                    ?>
                </div>

                <div class = "panel-footer">
                <a data-toggle="modal" data-target="#Uni-modal" class="btn btn-success btn-sm" href="<?Php echo HOME.'?pg=hr'; ?> #main-form">درخواست رخصتی</a>
                <a data-toggle="modal" data-target="#Uni-modal" class="btn btn-success btn-sm" href="<?Php echo HOME.'?pg=hr&overtime=addnew'; ?> #main-form">درخواست اضافه کاری</a>
         </div>

            </div>
        </div>
            
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a>
                    آخرین کاربران
                    </a>
                    <a href="<?php echo HOME.'?pg=users '; ?> #main-form" data-toggle="modal" data-target="#Uni-modal" class="pull-right" ><i class="fas fa-user-plus"></i></a>

                </h4>
                </div>
             
                
                <div id="userlist" class="list-group">
                <div id="in-userlist">
                    <?php
                    global $dbase;
                    $where = '';
                    if(is_get('us')){
                        $q = is_get('us');
                        $where = " AND (sob_name LIKE '%{$q}%' OR sob_title LIKE '%{$q}%') ";
                    }
                    $rows = $dbase->tbl2array2('sob_users','*'," WHERE sob_status=1 AND sob_rank<>99 {$where} ORDER BY sob_id DESC LIMIT 10");

                    foreach($rows as $row){
                        echo '<span data-id="' . $row['sob_id'] . '" id="user' . $row['sob_id'] . '" class="list-group-item">
                        <span class="todotitle">'.$row['sob_name'].' ('.$row['sob_title'].')</span>
                        <span class="pull-right">
                        <a href="'.HOME.'?pg=users&eid='. $row['sob_id'].' #main-form" data-toggle="modal" data-target="#Uni-modal" class="tip" title="ویرایش"><i class="fas fa-user-edit"></i></a>&nbsp;
                        <a href="'.HOME.'?pg=users&vu=1&eid='. $row['sob_id'].' #main-form" data-toggle="modal" data-target="#Uni-modal" class="tip" title="نمایش کارت"><i class="fas fa-id-card"></i></a>&nbsp;
                        <a href="'.HOME.'?pg=inbox&toid=u:'. $row['sob_id'].' #addbox"  data-toggle="modal" data-target="#Uni-modal" class="tip" title="ارسال پیام خصوصی"><i class="far fa-envelope"></i></a>
                        </span>
                        
                      </span>';
                    } 
                    ?>
                </div>
                </div>

                <div class ="panel-footer text-center ">
                    <div class="input-group col-md-12">
                    <input autocomplete="off" placeholder="جستجو" type="text" name="us" id="myUserSearch" class="form-control input-sm" >  
                    </div>
                </div>



            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a>
                   تکتهای فعال
                    </a>
                </h4>
                </div>
       
                      
                <div id="opentickets" class="list-group">
                    <?php
                    global $dbase;
                    $where = " WHERE tic_progress<>100 AND tic_site='{$site}' AND ((tic_assigned ='{$pfx_uid}' OR tic_assigned IN (SELECT concat('g:',ugr_gid) FROM sob_ugroups WHERE ugr_userid={$uid})) OR tic_uid={$uid}) ORDER BY tic_priority DESC LIMIT 6";
                    $rows = $dbase->tbl2array2('sob_tickets','*',$where);
                    foreach($rows as $row){
                        echo '<span class="list-group-item">
                        <a href="'.HOME.'?pg=ticket&id='.$row['tic_id'].'" >'.$row['tic_title'].'</a>
                        <span class="label label-info">'.get_cate_name($row['tic_tag']).'</span>
                        <div style="margin-top:5px;" class="progress"><div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="'.$row['tic_progress'].'" aria-valuemin="0" aria-valuemax="100" style="width: '.$row['tic_progress'].'%;"></div></div>
                        </span>';
                    } 
                    ?>
                </div>
                <div class = "panel-footer">
                <button href="<?php echo HOME.'?pg=ticket #mainticket'; ?>" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Uni-modal" >تکت جدید</button>
                </div>
                
            </div>
        </div>
            
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="<?Php echo HOME.'?pg=categories&t=groups'; ?>">
                   گروپ هایکه شما شامل هستید
                    </a>
                </h4>
                </div>
       
               
                <div class="list-group">
                    <?php
                    global $dbase;
                    $where = " WHERE ugr_userid={$uid} AND ugr_status=1 LIMIT 6";
                    $rows = $dbase->tbl2array2('sob_ugroups','ugr_gid,ugr_id',$where);
                    foreach($rows as $row){
                        $num = $dbase->num_rows("Select ugr_id From sob_ugroups WHERE ugr_status=1 AND ugr_gid=".$row['ugr_gid']);
                        echo '<span class="list-group-item"><a href="'.HOME.'?pg=groups&id='.$row['ugr_gid'].'" ><i class="fas fa-users"></i> '.get_cate_name($row['ugr_gid']).'</a><span class="label label-info pull-right">'.$num .' نفر</span></span>';
                    } 
                    ?>
                </div>


                <div class = "panel-footer text-center">
                    <a href="">ایجاد گروپ</a>
                </div>
            </div>
        </div>
    </div>



    <div class="col-md-4">
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a>
آخرین پیامها                    </a>
                </h4>
                </div>
       
        
                
                <div class="list-group">
                    <?php
                    global $dbase;
                    $rows = $dbase->tbl2array2('sob_message','*'," WHERE mes_tid = ".user_uid()." ORDER BY mes_time DESC LIMIT 8");

                    foreach($rows as $row){
                        $classes = ($row['mes_read'] == 0 ? 'txt-bold' : '').' '.($row['mes_id'] == $id ? 'active' : '');
                        echo '<a href="'.HOME.'?pg=inbox&id='.$row['mes_id'].' #addbox" data-toggle="modal" data-target="#Uni-modal" class="list-group-item '.($classes).'">'.$row['mes_title'] .' - '.user_name_ex($row['mes_uid']).'</a>';
                    } 
                    ?>
                </div>

                <div class = "panel-footer">
   
                <a data-toggle="modal" data-target="#Uni-modal" class="btn btn-success btn-sm" href="<?Php echo HOME.'?pg=inbox'; ?> #addbox">ارسال پیام</a>
                    <a class="pull-right btn btn-info btn-sm" href="">کل پیامها</a>
                </div>
            </div>
        </div>
            
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="<?Php echo HOME.'?pg=todo'; ?>">
                     کارهای قابل اجرا
                    </a>
                </h4>
                </div>
                <div id="todolist">
                <div id="in-todolist"  class="list-group">
                <!-- <label class="list-group-item">
                        <input type="text" class="form-control col-md-12" > 
                      </label> -->
                    <?php
                    global $dbase;
                    $rows = $dbase->tbl2array2('sob_todolist','*'," WHERE tod_status=0 AND tod_groupshare=0 AND tod_uid = ".user_uid()." ORDER BY tod_id DESC LIMIT 12");

                    foreach($rows as $row){
                        $level = '';
                        if($row['tod_level']==1){
                            $level = '<span class="label label-default">کم اهمیت</span> ';
                        }elseif($row['tod_level']==2) {
                            $level = '<span class="label label-danger">مهم</span> ';
                        }
                        echo '<label title="' . $row['tod_note'] . '" data-id="' . $row['tod_id'] . '" id="todo' . $row['tod_id'] . '" class="list-group-item tip">
                        <input type="checkbox" value="option1"> <span class="todotitle">'.$level.$row['tod_title'].'</span>
                      </label>';
                    } 
                    ?>
                </div>
                </div>

                <div class ="panel-footer text-center ">
                <form method="post" action="<?php echo HOME ?>?pg=todo&add=go" 
                    noreturn
                    data-source="<?php echo get_current_url(); ?> #in-todolist" 
                    data-selector="#todolist" 
                    ajaxform reset  enctype="application/x-www-form-urlencoded" name="add"  id="addtodolist">
                    <div class="input-group col-md-12">
                    <input placeholder="ایجاد جدید..." type="text" name="title" id="title" class="form-control input-sm" >  
                    </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div> 








<?php get_footer() ?>