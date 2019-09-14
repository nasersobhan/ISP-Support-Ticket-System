

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
<div class="well">

<?php echo nl2br($row['tic_body']);?>
</div>

<hr>


<?php theme_include('comments'); ?>

</div>
