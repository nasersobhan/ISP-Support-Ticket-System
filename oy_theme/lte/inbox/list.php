<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">اینباکس</h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                <form action="<?php echo get_current_url(); ?>" method="POST">
                  <input type="text" name='s' class="form-control input-sm" placeholder="جستجو">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                  </form>
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
         
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>


                  <?php
        global $dbase;
       $uid =  user_uid();
       $where = ' ';
      if(is_get('sent')){
        $where .= ' AND mes_uid='.$uid;
      }
      if(is_post('s')){
        $query = is_post('s');
        $where .= " AND (mes_title LIKE '%$query%' OR mes_body LIKE '%$query%') ";
      }
      $status = ' AND mes_status=1 ';
      if(is_get('deleted')){
        $status = ' AND mes_status=100 ';
      }
        $rows = $dbase->tbl2array2('sob_message','*'," WHERE mes_tid = ".user_uid()." {$where} {$status} ORDER BY mes_time DESC LIMIT 50");
        $id = is_get('id');
        foreach($rows as $row){
            $classes = ($row['mes_read'] == 0 ? 'txt-bold' : '').' '.($row['mes_id'] == $id ? 'active' : ''); ?>

<tr>
                    <td><div class="icheckbox_flat-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                    <td class="mailbox-name"><a href="<?php echo HOME.'?pg=inbox&id='.$row['mes_id'] ?>"><?php echo user_name_ex($row['mes_uid']) ?></a></td>
                    <td class="mailbox-subject"><b><?php echo $row['mes_title'] ?></b> - لورم ایپسوم متن ساختگی برای استفاده طراحان گرافیک است.
                    </td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date"><?php echo Agotime_fa($row['mes_time']); ?></td>
                  </tr>

            <?Php
           // echo '<a href="'.HOME.'?pg=inbox&id='.$row['mes_id'].'" class="list-group-item '.($classes).'">'.$row['mes_title'] .' - '.user_name_ex($row['mes_uid']).'</a>';
        } 
        ?>
           
                  
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              
         
            </div>
          </div>