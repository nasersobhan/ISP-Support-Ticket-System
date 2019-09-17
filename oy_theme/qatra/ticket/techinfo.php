<?php global $customer; ?>

<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="installedinfo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseinstalledinfo" aria-expanded="false" aria-controls="collapseinstalledinfo">
         مشخصات تخنیکی </a>
      </h4>
    </div>
    <div id="collapseinstalledinfo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="installedinfo">

      <form method="post" 
      ajaxform  
      action="<?php echo HOME ?>?pg=customer&update=<?php echo $customer['cus_id'];?>" 
      name="updatecustomer"  
      id="updatecustomer">
      
<table class="table table-condensed">
    <tr class="info">
        <th colspan="2">مشخصات مشتری</th>
    </tr>

    <tr>
        <td>شناسه مشتری:</td>
        <td><input type="text" class="form-control input-sm col-md-12" name="cus_cid" value="<?php echo $customer['cus_cid']; ?>" id="cus_cid"></td>
    </tr>


    <tr>
        <td>PPPoE نام:</td>
        <td><input type="text" class="form-control input-sm col-md-12" name="cus_pppoename" value="<?php echo $customer['cus_pppoename']; ?>" id="cus_pppoename"></td>
    </tr>


    <tr>
        <td>پکیج:</td>
        <td><input type="text" class="form-control input-sm col-md-12" name="cus_package" value="<?php echo $customer['cus_package']; ?>" id="cus_package"></td>
    </tr>

    <tr>
        <td>تاریخ نصب:</td>
        <td><input type="date" class="form-control input-sm col-md-12" name="cus_installdate" value="<?php echo $customer['cus_installdate']; ?>" id="cus_installdate"></td>
    </tr>

    <tr>
        <td>تاریخ فعال شدن:</td>
        <td><input type="date" class="form-control input-sm col-md-12" name="cus_activedate" value="<?php echo $customer['cus_activedate']; ?>" id="cus_activedate"></td>
    </tr>


    <tr class="info">
        <th colspan="2">وسایل استفاده شده</th>
    </tr>

    <tr>
        <td>آنتن:</td>
        <td><input type="text" class="form-control input-sm col-md-12" name="cus_usedantenna" value="<?php echo $customer['cus_usedantenna']; ?>" id="cus_usedantenna"></td>
    </tr>


    <tr>
        <td>روتر:</td>
        <td><input type="text" class="form-control input-sm col-md-12" name="cus_usedrouter" value="<?php echo $customer['cus_usedrouter']; ?>" id="cus_usedrouter"></td>
    </tr>

    <tr>
        <td>کابل:</td>
        <td><input type="text" class="form-control input-sm col-md-12" name="cus_usedcable" value="<?php echo $customer['cus_usedcable']; ?>" id="cus_usedcable"></td>
    </tr>

    <tr>
        <td>RJ:</td>
        <td><input type="text" class="form-control input-sm col-md-12" name="cus_usedjs" value="<?php echo $customer['cus_usedjs']; ?>" id="cus_usedjs"></td>
    </tr>


    <tr class="info">
        <th colspan="2">مشخصات تخنیکی</th>
    </tr>

    <tr>
        <td>AP:</td>
        <td><input type="text" class="form-control input-sm col-md-12" name="cus_ap" value="<?php echo $customer['cus_ap']; ?>" id="cus_ap"></td>
    </tr>

    <tr>
        <td>Signal:</td>
        <td><input type="text" class="form-control input-sm col-md-12" name="cus_signal" value="<?php echo $customer['cus_signal']; ?>" id="cus_signal"></td>
    </tr>

    <tr>
        <td>CCQ:</td>
        <td><input type="text" class="form-control input-sm col-md-12" name="cus_ccq" value="<?php echo $customer['cus_ccq']; ?>" id="cus_ccq"></td>
    </tr>

    <tr>
        <td>PPPoE IP:</td>
        <td><input type="text" class="form-control input-sm col-md-12" name="cus_pppoeip" value="<?php echo $customer['cus_pppoeip']; ?>" id="cus_pppoeip"></td>
    </tr>

    <tr>
        <td>Public IP:</td>
        <td><input type="text" class="form-control input-sm col-md-12" name="cus_publicip" value="<?php echo $customer['cus_publicip']; ?>" id="cus_publicip"></td>
    </tr>

    <tr>
        <td>Local IP:</td>
        <td><input type="text" class="form-control input-sm col-md-12" name="cus_localip" value="<?php echo $customer['cus_localip']; ?>" id="cus_localip"></td>
    </tr>

    <tr>
        <td></td>
        <td> <button class="btn btn-success btn-sm btn-block"  type="submit">ثبت</button></td>
    </tr>
</table>




       

    </form>

    </div>
  </div>