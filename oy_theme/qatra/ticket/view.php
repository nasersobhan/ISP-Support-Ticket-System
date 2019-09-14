

<?php
global $dbase;
$id = is_get('id');

$rows = $dbase->tbl2array2('sob_tickets','*',' WHERE tic_id='.$id);

$rows = array_reverse($rows);
$row = $rows[0];
    ?>
<h1><?php echo ($row['tic_title']);?></h1>
<div class="col-md-12">
مشتری: <?php echo ($row['tic_cid']);?><br>
دسته بندی: <?php echo get_cate_name($row['tic_category']);?><br>
اولویت: <?php echo get_cate_name($row['tic_priority']);?><br>
نوعیت: <?php echo ($row['tic_type']);?><br>
<div class="messagebox">
<?php echo nl2br($row['tic_body']);?>

</div>
<small><?php echo user_name_ex($row['tic_uid']) ?> در <?php echo $row['tic_time'] ?></small>
</div>

<div class="pull-right col-md-12">
<div class="messagebox messagebox-me">
<form reset ajaxform id="replayMessage" action="<?php echo HOME.'?pg=inbox&send='.is_get('id') ?>" method="POST">
<input name="to" type="hidden" value="u:<?php echo ($row['tic_uid']);?>">
    <div class="form-group">
        <input name="title" class="form-input" type="text" value="پاسخ: <?php echo ($row['tic_title']);?>">
    </div>
  
    <div class="form-group">
        <textarea name="body" class="form-input"></textarea>
    </div>
<button type="submit" class="btn btn-sm">ارسال</button>

</form>
</div>
</div>