

<?php
global $dbase;
$id = is_get('id');
global $row;
$rows = $dbase->tbl2array2('sob_tickets','*',' WHERE tic_id='.$id);

$rows = array_reverse($rows);
$row = $rows[0];

    ?>
<h1><?php echo ($row['tic_title']);?></h1>
<div class="col-md-12">


<?php echo nl2br($row['tic_body']);?>



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