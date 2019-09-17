<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
         مکالمات تیمی: 
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
      <?php theme_include('groups/chats'); ?>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          خدمات تخنیکی
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
        
      <div id="opentickets" class="list-group">
                    <?php
                    global $dbase;
                    $gid = 'g:'.is_get('id');
                    $where = " WHERE tic_progress<>100 AND tic_assigned='{$gid}' ORDER BY tic_priority DESC LIMIT 12";
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




      </div>
    </div>
  </div>

</div>