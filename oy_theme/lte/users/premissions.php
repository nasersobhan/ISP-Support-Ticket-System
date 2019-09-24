<?php get_header(); 

$id = is_get('premissions');
$rank = user_rank($id);
$dep = user_dep($id);
global $dbase;
$per = [];
if($rank == 3){
    if($dep == get_setting('techdep')){
        $per['ticket-add'] =  'checked Disabled';
        $per['ticket-view'] = 'checked Disabled';
        $per['ticket-edit'] = 'checked Disabled';
        $per['ticket-list'] = 'checked Disabled';
        $per['ticket-manage'] = 'checked Disabled';
        $per['ticket-close'] = 'checked Disabled';
    }
    elseif($dep == get_setting('salesdep')) {
        $per['customer-add'] = 'checked Disabled';
        $per['customer-view'] = 'checked Disabled';
        $per['customer-edit'] = 'checked Disabled';
        $per['customer-list'] = 'checked Disabled';
        $per['customer-other'] = 'checked Disabled';
        $per['customer-manage'] = 'checked Disabled';
    }
} 

if($rank == 2){
    if($dep == get_setting('techdep')){
        $per['ticket-add'] =  'checked Disabled';
        $per['ticket-view'] = 'checked Disabled';
        $per['ticket-edit'] = 'checked Disabled';
        $per['ticket-list'] = 'checked Disabled';
        //$per['ticket-manage'] = 'checked Disabled';
        //$per['ticket-close'] = 'checked Disabled';
    }
    elseif($dep == get_setting('salesdep')) {
        $per['customer-add'] = 'checked Disabled';
        $per['customer-view'] = 'checked Disabled';
        $per['customer-edit'] = 'checked Disabled';
        $per['customer-list'] = 'checked Disabled';
        //$per['customer-other'] = 'checked Disabled';
        //$per['customer-manage'] = 'checked Disabled';
    }
} 
$rowx = $dbase->tbl2array2('sob_permissions','per_label'," WHERE per_uid={$id} AND per_allow=1");
foreach($rowx as $upermission){
    $per[$upermission['per_label']] = 'checked';
}

?>
<div class="content-box">


     
   


<div id="main-content" class="col-md-12 panel panel-body" >
<div class="modal-header ">
    <h4 class="modal-title" id="myModalLabel"><?php echo get_pgtitle(); ?></h4>
  </div>
  

        <?php echo get_message();
        global $premissions;
print_r($premissions);
        ?>
   <form ajaxform action="<?Php echo HOME.'?pg=users&premissions='.is_get('premissions') ?>"  method="POST" />
   <input name="uid" value="<?Php echo user_uid(); ?>" type="hidden" />
   <div class="modal-body">
<table class="table">
<tr>
<th>عملیه</th>
<th>ایجاد</th>
<th>نمایش</th>
<th>ویرایش</th>
<th>مدیریت</th>
<th>لیست</th>
<th>دیگر</th>
</tr>


<tr>
<th>تکتها</th>
<td><div class="checkbox">
                      <label>
                        <input name="ticket-add" value="1" <?php echo (isset($per['ticket-add']) ? $per['ticket-add'] : ''); ?> type="checkbox">
                      </label>
                    </div>
                    </td>


<td><div class="checkbox">
                      <label>
                        <input name="ticket-view" value="1" <?php echo (isset($per['ticket-view']) ? $per['ticket-view'] : ''); ?> type="checkbox">
                      </label>
                    </div>
                    </td>
<td><div class="checkbox">
                      <label>
                        <input name="ticket-edit" value="1" <?php echo (isset($per['ticket-edit']) ? $per['ticket-edit'] : ''); ?> type="checkbox">
                      </label>
                    </div></td>
<td><div class="checkbox">
                      <label>
                        <input name="ticket-manage" value="1" <?php echo (isset($per['ticket-manage']) ? $per['ticket-manage'] : ''); ?> type="checkbox">
                      </label>
                    </div></td>
<td><div class="checkbox">
                      <label>
                        <input name="ticket-list" value="1" <?php echo (isset($per['ticket-list']) ? $per['ticket-list'] : ''); ?> type="checkbox">
                      </label>
                    </div></td>
<td><div class="checkbox">
                      <label>
                        <input name="ticket-close" value="1" <?php echo (isset($per['ticket-close']) ? $per['ticket-close'] : ''); ?> type="checkbox">
                      </label>
                    </div></td>
</tr>




<tr>
<th>مشتریان</th>

<td><div class="checkbox">
                      <label>
                        <input name="customer-add" value="1" <?php echo (isset($per['customer-add']) ? $per['customer-add'] : ''); ?> type="checkbox">
                      </label>
                    </div>
                    </td>



<td><div class="checkbox">
                      <label>
                        <input name="customer-view" value="1" <?php echo (isset($per['customer-view']) ? $per['customer-view'] : ''); ?> type="checkbox">
                      </label>
                    </div>
                    </td>
<td><div class="checkbox">
                      <label>
                        <input name="customer-edit" value="1" <?php echo (isset($per['customer-edit']) ? $per['customer-edit'] : ''); ?> type="checkbox">
                      </label>
                    </div></td>
<td><div class="checkbox">
                      <label>
                        <input name="customer-manage" value="1" <?php echo (isset($per['customer-manage']) ? $per['customer-manage'] : ''); ?> type="checkbox">
                      </label>
                    </div></td>
<td><div class="checkbox">
                      <label>
                        <input name="customer-list" value="1" <?php echo (isset($per['customer-list']) ? $per['customer-list'] : ''); ?> type="checkbox">
                      </label>
                    </div></td>
<td><div class="checkbox">
                      <label>
                        <input name="customer-other" value="1" <?php echo (isset($per['customer-other']) ? $per['customer-other'] : ''); ?> type="checkbox">
                      </label>
                    </div></td>
</tr>

</table>

</div>
  <div class="modal-footer">
    <button class="btn btn-success btn-sm"  type="submit">ثبت</button>
  </div>
  </form>

</div>

    </div>
</div> 

<?php get_footer() ?>