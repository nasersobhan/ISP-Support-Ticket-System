<?php get_header();
global $curr; ?>
<div class="content-box">



    <div class="sidex Pull-left col-md-5" style="">
        <span  id="reportx">



<?php theme_include('parts/moneystat'); ?>









            <div class="panel panel-default" >
                <div class="panel-heading "><h3><?php echo get_pgtitle() ?></h3></div>
                <div class="panel-body ">     
<?php
global $dbase;
$nx = $_GET['eoe'];
$day = date('Y-m-d');
$todaymond = 0;
$result = $dbase->query("SELECT mon_doller FROM sob_money where mon_stat=0 and mon_eoe='$nx' and mon_date='$day' ORDER BY mon_time");
$todayoild = 0;
while($row = $dbase->fetch_array($result)){
    $todaymond = $row['mon_doller'] + $todaymond;
}



echo ' کل موجودی دخل ';

//echo getsafemon();
?> |  <?php
                    if($_GET['eoe'] == 1)
                        echo 'بردگی از دخل امروز';
                    elseif($_GET['eoe'] == 2)
                        echo 'دریافتی دخل امروز';
                    elseif($_GET['eoe'] == 5)
                        echo 'بردگی متفرقه از دخل امروز';
                    else
                        echo 'دریافتی متفرقه دخل امروز';


                    echo $todaymond;
                    ?>





                    <p style="color:green">آخرین اطلاعات ذخیره شده </p>

<?php
$nx = $_GET['eoe'];
$day = date('Y-m-d');
$result = $dbase->query("SELECT * FROM sob_money where mon_eoe='$nx'   ORDER BY mon_id DESC LIMIT 5");
?>
                    <table id="datatbl" class="table table-responsive" >
                        <tr>
                            <th>نام</th>
                            <th >نوع پول</th>
                            <th>مقدار</th>
                            <th>یک دالر</th>
                            <th>به دالر</th>
                            <th>توضیحات</th>
                        </tr>





<?php
while($row = $dbase->fetch_array($result)){
    ?>

                            <tr>
                                <td><a class="viewlink" href="<?php echo HOME . "?pg=mexp&edit=" . $row['mon_id'] ?>" target="_blank" data-url="<?php echo HOME . "?pg=mexp&view=" . $row['mon_id'] ?> #view" title="go to page"><?Php echo get_cate_name($row['mon_name']) ?></a></td>
                                <td><?Php echo get_cate_name($row['mon_mt']) ?></td>
                                <td><?Php echo $row['mon_rmoney'] ?></td>
                                <td><?Php echo $row['mon_rated'] ?></td>
                                <td><?Php echo $row['mon_doller'] ?></td>
                                <td><?Php echo $row['mon_discription'] ?></td>
                            </tr>



    <?php
}
?>


                    </table>
                    </span>  

                </div></div>

            <span id="viewportal">

            </span>
    </div>

    <div class="sidex col-md-7">

        <div class="panel panel-default" >
            <div class="panel-heading ">
                <h3>
                <?php
                if($_GET['eoe'] == 1)
                    echo 'پرداخت پول از دخل';
                elseif($_GET['eoe'] == 2)
                    echo 'دریافت پول به دخل';
                elseif($_GET['eoe'] == 5)
                    echo 'پرداخت پول متفرقه';
                else
                    echo 'دریافت پول متفرقه';
                ?>
                </h3>
            </div>
            <div class="panel-body ">     
                <table align="center" class="table table-responsive" >
                    <form data-rid="#reportx"  ajaxform  id="oilexp"  reset="1" method="post" name="add" action="<?php echo HOME ?>?pg=mexp&eoe=<?php echo is_get('eoe'); ?>&add=1" >
                        <tr>
                            <td>تاریخ : 

                            </td>
                            <td>
<?php if(tis_shamsi()){ ?>
                                    <input class="form-control" readonly required name="mon_sdate" id="shamsidate" type="text" style="width: 50px" />
<?php }else{ ?>
                                    <input class="form-control" required name="mon_date" id="meladidate" type="date"  />
<?php } ?>
                            </td>
                        </tr>

                        <tr>
                            <td><label>نام شرکت:</label></td>
                            <td>

                                <input required rtxt="نام شرکت را وارد کنید"  class="form-control sacui"   name="mon_name" id="name" type="text" />

                        <tr>
                            <td><label>پرداخت برای:</label></td>
                            <td><select class="form-control" name="comtype">
                                    <option value="company">شرکت</option>
                                    <option value="ocompany">اضافه بار</option>
                                    <option value="mcompany">محصول</option>
                                    <option value="tcompany">بار چالانی</option>
                                </select>
                            </td>
                        </tr>
                        
                        
                        
                        
                         <tr>
                            <td><label><?php echo ((is_get('eoe')==2 OR is_get('eoe')==7) ? g_lbl('to,account') : g_lbl('from,account')); ?>:</label></td>
                            <td>   <select style="width: 40px" name="st_cat">
  <?php 
             $oild =  cat_2arr_l('accounts',0,'fa_AF');
            foreach($oild as $id => $label){
                 echo '<option value="'.$id.'">'.$label.'</option>';   
            }
            ?></select>
                            </td>
                        </tr>  
                        
                        
<?php //}  ?>
                        <tr>
                            <td><label><?php e_lbl('currancy'); ?>:</label></td>
                            <td><select class="form-control" name="mon_mt">
                        <?php $oild = cat_2arr_l('currency', 0, 'fa_AF');
                        foreach($oild as $id => $label)
                            echo '<option value="' . $id . '">' . $label . '</option>'; ?>
                                </select></td>
                        </tr>




                        <tr>
                            <td><label>مقدار:</label></td>
                            <td><input rtxt="مقدار را وارد کنید" class="form-control"  size="6"  required name="mon_rmoney" onBlur="validate(this.id, this.value, 'num');" id="amountx" type="number" />
                                <span style="color:red" name="qay" id="qay_amountx"></span>
                            </td>
                        </tr>
                        <tr>
                            <td><label>یک <?php echo $curr ?> :</label></td>
                            <td>
                                <input step="0.0001" min="0" rtxt="قیمت دالر را وارد کنید" class="form-control"  required onBlur="validate(this.id, this.value, 'num');
                                        addNumbers('/', 'amountx', this.id, 'totalz');" name="mon_rated" id="ratea" type="number" />
                                <span style="color:red" name="qay" id="qay_ratea"></span>
                            </td>
                        </tr>
                        <tr>
                            <td><label>به <?php echo $curr ?>:</label></td>
                            <td><input class="form-control" required name="mon_doller" readonly id="totalz" type="number" /></td>
                        </tr>

                        <tr>
                            <td valign="top"><label>توضیحات:</label></td>
                            <td>
                                <textarea class="form-control" id="dis" name="mon_discription" cols="30" rows="5"></textarea></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td>
                                <input class="btn btn-success btn-sm Pull-left" 
                                      id="load_reportx" type="submit" name="btnsub"
                                       value="ذخیره و جدید"  

                                       /></td>
                            <!--    onclick="javascript: formget(this.form,'');"-->
                        </tr>
                    </form>
                </table>




            </div></div></div>







</div>





<?php get_footer() ?>