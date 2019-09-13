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
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#todolist" aria-expanded="false" aria-controls="collapseThree">
         لیست برای انجام
        </a>
      </h4>
    </div>
    <div id="todolist" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div id= class="panel-body">
       

   
    <table id="todotable" class="table">
    <tr>
    <th></th>
    <th>عنوان</th>
    <th>توسط</th>
    <th>تاریخ قابل اجرا</th>
    </tr>
        <?php
        $id = is_get('id');
        global $dbase;
        $rows = $dbase->tbl2array2('sob_todolist','*'," WHERE tod_groupshare = ".$id." ORDER BY tod_time DESC LIMIT 20");

        foreach($rows as $row){
            $edate = ($row['tod_edate'] != '0000-00-00' ? $row['tod_edate'] : 'تعیین نشده');
            $pro = ($row['tod_level']==2 ? '<i class="fas fa-flag text-danger"></i> ' : ($row['tod_level']==1 ? '<i class="fas fa-flag text-warning"></i> ' : ''));
            $classes = ($row['tod_status'] == 0 ? 'txt-bold' : '').' '.($row['tod_id'] == $id ? 'active' : '');
            echo '<tr data-id="#todo-'.$row['tod_id'].'" class="show-hider-hover">';
            echo '<td width="30px"><a class="tickbox" style="visibility: hidden;" href="#"><i class=" fas fa-check-square"></i> </a></td>';
            echo '<td>' . $pro . '<a target="_blank" href="'.HOME.'?pg=todo&id='.$row['tod_id'].'">'.$row['tod_title'].'</a></td>';
            echo '<td>'. user_name_ex($row['tod_uid']).'</td>';
            echo '<td>'.$edate.'</td>';
            echo '</tr>';
        } 
        ?>
     </table>




      </div>
    </div>
  </div>
</div>