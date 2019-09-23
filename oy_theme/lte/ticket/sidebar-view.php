<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<?php global $row, $customer;

 //if($row['tic_type']==1) {
  theme_pg_include('techinfo');
 //}  
 ?>


<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="ticketstatus">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#ticketstatusid" aria-expanded="true" aria-controls="ticketstatusid">
           وضعیت تکت
        </a>
      </h4>
    </div>
    <div id="ticketstatusid" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="ticketstatus">

        <table id="tic_status" class="table">
            <tr>
                <th>وضعیت</th>
                <td>
                <?php 
                $progressbarclass = 'progress-bar-warning';
                if($row['tic_progress']==100){
                  echo '<span class="label label-success">انجام شده</span>';
                  $progressbarclass = 'progress-bar-success';
                }else {
                  echo '<span class="label label-info">'.get_cate_name($row['tic_tag']).'</span>';
                }
                
                 ?>
                </td>
            </tr>
            <tr>
                <th>پیشرفت کار</th>
                <td><div class="progress">
  <div class="progress-bar <?=$progressbarclass?>" role="progressbar" aria-valuenow="<?php echo $row['tic_progress']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $row['tic_progress']; ?>%;">
  <?php echo $row['tic_progress']; ?>% </div>
</div>

                
                </td>
            </tr>
            <tr>
                <th>مسئول برسی</th>
                <td><?php echo toidlabel($row['tic_assigned']); ?></td>
            </tr>
            <tr>
                <th>زمان شروع کار</th>
                <td><?php echo date('Y-m-d h:i a',strtotime($row['tic_sdate'])); ?></td>
            </tr>
            <?php if($row['tic_type']!=1){ ?>
              <tr>
                <th>دسته بندی</th>
                <td><?php echo get_cate_name($row['tic_category']); ?></td>
            </tr>
            <?Php } ?>
        

            <tr>
                <th>اولویت</th>
                <td><?php echo get_cate_name($row['tic_priority']); ?></td>
            </tr>

            <tr>
                <th>زمان ثبت تکت</th>
                <td><?php echo date('Y-m-d h:i a',strtotime($row['tic_time'])) ?> توسط <?php echo user_name_ex($row['tic_uid']) ?></td>
            </tr>
     
        </table>

    </div>
  </div>


  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a id="customer-info" data-id="<?php echo $customer['cus_id']; ?>" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          مشخصات مشتری
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div id="customer-infobox" >
      در حال اجراء
      </div>
    </div>
  </div>


  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          مدیریت تکت
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
      <form method="post" action="<?php echo HOME ?>?pg=ticket&manage=<?php echo is_get('id');?>" name="add"  id="addticket">
      <div class="modal-body">
      <?php

        if(empty($row['tic_assigned']) OR $row['tic_assigned']=='0'){ ?>
<div class="form-group">
<label for="tic_assigned" class="control-label"> سپردن مسئولیت:</label>
  
  <select name="tic_assigned" id="tic_assigned" class="col-md-9 form-control">
<option value="<?php echo user_uid(); ?>">خودم (<?php echo trim(user_name()); ?>)</option>
        <?php
                 if(user_rank() != 1 && user_dep() == get_setting('techdep')){
                    $groups =  cat_2arr_luid('groups',0,'fa_AF',true);
                    print_r($groups);
                  
                    foreach($groups as $id => $label){
                       echo '<option value="g:'.$id.'">'.g_lbl('groups').': '.$label.'</option>';
                    }
                    $users =  get_userList(user_dep(), user_site());
                    foreach($users as $user) {
                     echo '<option value="u:'.$user['sob_id'].'">'.$user['sob_name'].'</option>';
                     }
                 }
           
                 ?>
  </select>
</div>



<?php
            
        } else {

        ?>

<div class="form-group">
<label for="tic_progress" class="control-label"> پیشرفت کار: <span id="tic_progress_value"><?php echo $row['tic_progress'] ?>%</span></label>
  
  <input name="tic_progress" id="tic_progress" value="<?php echo $row['tic_progress'] ?>" min="1" max="99" type="range" class=" form-control">

</div>

<div class="form-group">
<label for="tic_tag" class="control-label"> وضعیت: </label>
<select class="form-control col-md-12" name="tic_tag">
               
               <?php
                  $oild =  cat_2arr_l('tickettags',0,'fa_AF');
                 foreach($oild as $id => $label){
                      echo '<option value="'.$id.'">'.$label.'</option>';
                 }
                 ?>
               </select>

</div>

        <?php } ?>
    

       
      </div><br>
      <div class="modal-footer">
        <button class="btn btn-success btn-sm"  type="submit">اعمال</button>
      </div>
    </form>
      </div>
    </div>
  </div>


  <?php if($row['tic_progress'] < 100) { ?>
  

  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          بستن تکت
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
      <form method="post" action="<?php echo HOME ?>?pg=ticket&manage=<?php echo is_get('id');?>" name="manag"  id="manageticket">
      
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">تکمیلی کار </h4>
      </div>
      
      <div class="modal-body">
    

            <label for="tic_completenote" class="control-label">توضیح دهید:</label>
  
            <textarea name="tic_completenote" class="form-control autogrow" rows="5">طبق نیاز انجام شد.</textarea>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success btn-sm"  type="submit">بستن تکت</button>
      </div>
    </form>
      </div>
    </div>
  </div>


   
  <?Php } ?>
</div>