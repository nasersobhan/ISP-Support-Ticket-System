<div id="todolists">
    <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#Inbox" aria-controls="Inbox" role="tab" data-toggle="tab">برای امروز</a></li>
    <li role="presentation"><a href="#Outbox" aria-controls="Outbox" role="tab" data-toggle="tab">انجام نشده ها</a></li>
    <li role="presentation"><a href="#Unread" aria-controls="Unread" role="tab" data-toggle="tab">انجام شده ها</a></li>
    <li role="presentation"><a href="#Unread" aria-controls="Unread" role="tab" data-toggle="tab">تیمی ها</a></li>
  </ul>


  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="Inbox">
    <br>
    <table id="todolist1" class="table">
        <?php
        $id = is_get('id');
        global $dbase;
        $rows = $dbase->tbl2array2('sob_todolist','*'," WHERE tod_uid = ".user_uid()." ORDER BY tod_time DESC LIMIT 20");

        foreach($rows as $row){
            $pro = ($row['tod_level']==2 ? 'text-danger' : ($row['tod_level']==1 ? 'text-warning' : ''));
            $classes = ($row['tod_status'] == 0 ? 'txt-bold' : '').' '.($row['tod_id'] == $id ? 'active' : '');
            echo '<tr data-id="#todo-'.$row['tod_id'].'" class="show-hider-hover">';
            echo '<td width="30px"><a class="tickbox" style="visibility: hidden;" href="#"><i class=" fas fa-check-square"></i> </a></td>';
            echo '<td><i class="fas fa-flag '.$pro.'"></i> <span>'.$row['tod_title'].'</span></td>';
            echo '<td>'.$row['tod_edate'].'</td>';
            echo '</tr>';
        } 
        ?>
     </table>


    </div>
    <div role="tabpanel" class="tab-pane" id="Outbox">
    <br>

    
    </div>
    <div role="tabpanel" class="tab-pane" id="Unread">
   
    
    </div>

  </div>
   
        </div> </div>
        </div>