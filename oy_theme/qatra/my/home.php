<?php get_header(); 

$id = is_get('id');
$uid = user_uid();
$pfx_uid = 'u:'.$uid;
$site = user_site();
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
            Panel footer
         </div>

            </div>
        </div>
            
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a>
                    فعالیتهای شما
                    </a>
                </h4>
                </div>
                <div class = "panel-footer">
            Panel footer
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
                   تکتهای باز
                    </a>
                </h4>
                </div>
       
                      
                <div class="list-group">
                    <?php
                    global $dbase;
                    $where = " WHERE tic_progress<>100 AND tic_site='{$site}' AND (tic_assigned ='{$pfx_uid}' OR tic_assigned IN (SELECT concat('g:',ugr_gid) FROM sob_ugroups WHERE ugr_userid={$uid})) ORDER BY tic_priority DESC LIMIT 6";
                    $rows = $dbase->tbl2array2('sob_tickets','*',$where);
                    foreach($rows as $row){
                        echo '<span class="list-group-item">
                        <a href="'.HOME.'?pg=ticket&id='.$row['tic_id'].'" >'.$row['tic_title'].'</a>
                        <span class="label label-info">'.get_cate_name($row['tic_tag']).'</span>
                        <div style="margin-top:5px;" class="progress"><div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="'.$row['tic_progress'].'" aria-valuemin="0" aria-valuemax="100" style="width: '.$row['tic_progress'].'%;">'.$row['tic_progress'].'% </div></div>
                        </span>';
                    } 
                    ?>
                </div>
                <div class = "panel-footer text-center">
                    <!-- Large modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addticket">تکت جدید</button>
<?php theme_pg_include('tech'); ?>
              
                </div>
                
            </div>
        </div>
            
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a>
                   گروپهایکه شما شامل هستید
                    </a>
                </h4>
                </div>
       
               
                <div class="list-group">
                    <?php
                    global $dbase;
                    $where = " WHERE ugr_userid={$uid} AND ugr_status=1 LIMIT 6";
                    $rows = $dbase->tbl2array2('sob_ugroups','ugr_gid,ugr_id',$where);
                    foreach($rows as $row){
                        echo '<span class="list-group-item"><a href="'.HOME.'?pg=groups&id='.$row['ugr_id'].'" >'.get_cate_name($row['ugr_gid']).'</a></span>';
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
                    $rows = $dbase->tbl2array2('sob_message','*'," WHERE mes_tid = ".user_uid()." ORDER BY mes_time DESC LIMIT 6");

                    foreach($rows as $row){
                        $classes = ($row['mes_read'] == 0 ? 'txt-bold' : '').' '.($row['mes_id'] == $id ? 'active' : '');
                        echo '<a href="'.HOME.'?pg=inbox&id='.$row['mes_id'].'" class="list-group-item '.($classes).'">'.$row['mes_title'] .' - '.user_name_ex($row['mes_uid']).'</a>';
                    } 
                    ?>
                </div>

                <div class = "panel-footer text-center">
                    <a href="">کل پیامها</a>
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
       
                <div id="todolist" class="list-group">
                <div id="in-todolist">
                <!-- <label class="list-group-item">
                        <input type="text" class="form-control col-md-12" > 
                      </label> -->
                    <?php
                    global $dbase;
                    $rows = $dbase->tbl2array2('sob_todolist','*'," WHERE tod_status=0 AND tod_groupshare=0 AND tod_uid = ".user_uid()." ORDER BY tod_level,tod_id DESC LIMIT 6");

                    foreach($rows as $row){
                        echo '<label data-id="' . $row['tod_id'] . '" id="todo' . $row['tod_id'] . '" class="list-group-item">
                        <input type="checkbox" value="option1"> <span class="todotitle">'.$row['tod_title'].'</span>
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