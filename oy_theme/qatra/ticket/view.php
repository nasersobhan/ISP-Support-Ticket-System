

<?php
global $dbase;
$id = is_get('id');
global $row, $customer;
$rows = $dbase->tbl2array2('sob_tickets','*',' WHERE tic_id='.$id);
$customer = false;
$rows = array_reverse($rows);
$row = $rows[0];
if(!empty($row['tic_cid'])){
    $id = $row['tic_cid'];
    $tbl = 'sob_customerinfo';
    $customer = $dbase->tbl2array2($tbl,'*',' WHERE cus_id='.$id)[0];
    if (count($customer)) {
        $title = 'نصب جدید مشتری '. $customer['cus_name'];
    } else {
      $customer = FALSE;
    }
  }

    ?>
<h1><?php echo ($row['tic_title']);?></h1>
<div class="col-md-12">
<div class="well">

<?php echo nl2br($row['tic_body']); ?>
</div>


<?Php

if($customer && $row['tic_type']==1){ ?>

<table class="table">
      <tr>
        <th colspan="2">
         نیازها
        </th>

      </tr>

      <tr>
        <td>
        پهنا باند
        </td>
        <td>
          <?Php echo $customer['cus_bw']; ?>
        </td>
      </tr>

      <tr>
        <td>
        هزینه خدمات
        </td>
        <td>
          <?Php echo $customer['cus_servicecharge']; ?>
        </td>
      </tr>

      <tr>
        <td>
        آنتن
        </td>
        <td>
          <?Php echo $customer['cus_antenna']; ?>
        </td>
      </tr>

      <tr>
        <td>
        روتر
        </td>
        <td>
          <?Php echo $customer['cus_router']; ?>
        </td>
      </tr>

      <tr>
        <td>
        کابل
        </td>
        <td>
          <?Php echo $customer['cus_cable']; ?>
        </td>
      </tr>

      <tr>
        <td>
        ای پی
        </td>
        <td>
          <?Php echo $customer['cus_ip']; ?>
        </td>
      </tr>
      </table>

<?php
  
}
?>





<hr>


<?php theme_include('comments'); ?>

</div>
