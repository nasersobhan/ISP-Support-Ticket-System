<?php get_header(); 

$id = is_get('id');
$uid = user_uid();
$pfx_uid = 'u:'.$uid;
$site = user_site();
?>
<div class="content-box">


     
    <div class="col-md-6">
    
<?php theme_pg_include('add'); ?>
            
       
    </div>

    <div class="col-md-6">
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



  
    </div>
</div> 

<?php get_footer() ?>