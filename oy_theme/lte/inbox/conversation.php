

<?php
global $dbase;
$id = is_get('id');
$uid = user_uid();
$rows = $dbase->tbl2array2('sob_message','*',' WHERE mes_id='.$id);
$dbase->RowUpdate('sob_message',['mes_read'=>1],' WHERE mes_tid = '.$uid.' AND mes_id='.$id);
$rows = array_reverse($rows);
$row = $rows[0];
    ?>


<div class="modal-header">
    <h4 class="modal-title"><?php echo ($row['mes_title']);?></h4>
</div>
 <div class="modal-body">



<div class="messagebox">
<?php echo nl2br($row['mes_body']);?>

</div>
<small><?php echo user_name_ex($row['mes_uid']) ?> در <?php echo $row['mes_time'] ?></small>
</div>
<form reset ajaxform id="replayMessage" action="<?php echo HOME.'?pg=inbox&send='.is_get('id') ?>" method="POST">
<div class="pull-right col-md-12">
<div class="messagebox messagebox-me">

<input name="to" type="hidden" value="u:<?php echo ($row['mes_uid']);?>">
    <div class="form-group row">
        <input name="title" class="form-control col-md-12" type="text" value="پاسخ: <?php echo ($row['mes_title']);?>">
    </div>
    <div class="form-group row">
        <textarea name="body" rows="4" class="form-control"></textarea>
    </div>
</div>


</div>
<div class="modal-footer">
<button type="submit" class="btn btn-success btn-sm">ارسال</button>
</form>
</div>
