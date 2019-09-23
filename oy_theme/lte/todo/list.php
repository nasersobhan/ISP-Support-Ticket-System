<div id="todolists">
    <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#list" aria-controls="Inbox" role="tab" data-toggle="tab">انجام نشده ها</a></li>

    <li role="presentation"><a href="#done" aria-controls="done" role="tab" data-toggle="tab">انجام شده ها</a></li>

  </ul>


  <div id="todolist" class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="list">
    <br>


    <div id="todolist" class="list-group">
                <div class="in-todolist">
                    <?php
                    global $dbase;
                    $rows = $dbase->tbl2array2('sob_todolist','*'," WHERE tod_status=0 AND tod_groupshare=0 AND tod_uid = ".user_uid()." ORDER BY tod_level,tod_id DESC LIMIT 50");

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



    </div>
    <div role="tabpanel" class="tab-pane" id="done">


    <div  class="list-group">
                <div class="in-todolist">
                    <?php
                    global $dbase;
                    $rows = $dbase->tbl2array2('sob_todolist','*'," WHERE tod_status=1 AND tod_groupshare=0 AND tod_uid = ".user_uid()." ORDER BY tod_level,tod_id DESC LIMIT 50");

                    foreach($rows as $row){
                        $level = '';
                        if($row['tod_level']==1){
                            $level = '<span class="label label-default">کم اهمیت</span> ';
                        }elseif($row['tod_level']==2) {
                            $level = '<span class="label label-danger">مهم</span> ';
                        }
                        echo '<label title="' . $row['tod_note'] . '" data-id="' . $row['tod_id'] . '" id="todo' . $row['tod_id'] . '" class="list-group-item tip">
                        <input type="checkbox" value="option1" checked> <span style="text-decoration:line-through" class="text-danger todotitle">'.$level.$row['tod_title'].'</span>
                      </label>';
                    } 
                    ?>
                </div>
                </div>



    
    </div>
  

  </div>
   
        </div> </div>
        </div>