<?php get_header();global $curr; ?>
<div class="content-box">
  
    
    
    
    
<div class="sidex Pull-left col-md-5" style="">
 <span  id="reportx">
     
     
     
     
     
     <div class="panel panel-default" >
    <div class="panel-heading "><h3> آخرین اطلاعات ذخیره شده</h3></div>
    <div class="panel-body ">  

        <table style="table-layout:fixed" id="datatbl" class="table table-responsive">
	
            	<tr>
    <th width="80px">زمان ثبت شده به شمسی</th>

    <td width="80px"><?php echo valDate(get_mon_time(),'l j F Y H:i:s'); ?></td>

  </tr>
    

	<tr>
    <th width="80px">نام ثبت کننده</th>

    <td width="80px"><?php echo user_name_ex(get_mon_uid()); ?></td>

  </tr>

  	<tr>
    <th width="80px">نوع</th>

    <td width="80px"><?php echo eoe2label(get_mon_eoe(),'m') ;  ?></td>

  </tr>





</table>


</div></div>
     
     
     
     
     
     
     
 

</div>

  <div class="sidex col-md-7">
        
         <div class="panel panel-default" >
    <div class="panel-heading "><h3>
        <?php 
        
        $_GET['eoe']=get_mon_eoe();
	if($_GET['eoe']==1)
	echo 'پرداخت پول از دخل' ;
	elseif($_GET['eoe']==2)
	echo 'دریافت پول به دخل' ;
	elseif($_GET['eoe']==5)
	echo 'پرداخت پول متفرقه' ;
	else
	echo 'دریافت پول متفرقه' ;
?>
    
        
        
        <?php //echo get_pgtitle() ?></h3></div>
             
             
             
             <div class="panel-body ">     
                <table align="center" class="table table-responsive" >
                    <form data-rid="#reportx"  ajaxform  id="oilexp"  method="post" name="edit" action="<?php echo HOME ?>?pg=mexp&edit=<?php echo is_get('edit'); ?>" >
                        <tr>
                            <td>تاریخ : 

                            </td>
                            <td>
<?php if(tis_shamsi()){ ?>
                                <input rtxt="تاریخ را وارد کنید" class="form-control" value="<?php mon_sdate(); ?>" readonly required name="mon_sdate" id="shamsidate" type="text" style="width: 50px" />
<?php }else{ ?>
                                    <input  rtxt="تاریخ را وارد کنید" class="form-control" value="<?php mon_date(); ?>" required name="mon_date" id="meladidate" type="date"  />
<?php } ?>
                            </td>
                        </tr>

                        <tr>
                            <td><label>نام شرکت:</label></td>
                            <td>

                                <input required rtxt="نام شرکت را وارد کنید"  class="form-control sacui" value="<?php echo get_cate_name(get_mon_name()); ?>"   name="mon_name" id="name" type="text" />

                            </td>
                        </tr>

                        <tr>
                            <td><label>پرداخت برای:</label></td>
                            <td><select class="form-control" name="comtype">
                                    <?php 
                    $type = get_typeof(get_mon_name());
                    
                    ?>
        <option <?php echo ($type=='company' ? 'selected' : ''); ?> value="company">شرکت</option>
         <option <?php echo ($type=='ocompany' ? 'selected' : ''); ?> value="ocompany">اضافه بار</option>
          <option <?php echo ($type=='mcompany' ? 'selected' : ''); ?> value="mcompany">محصول</option>
           <option <?php echo ($type=='tcompany' ? 'selected' : ''); ?> value="tcompany">بار چالانی</option>
        </select>
                            </td>
                        </tr>

                        <tr>
                            <td><label>نوع پول:</label></td>
                            <td><select class="form-control" name="mon_mt">
                         
        <?php 
             $oild =  cat_2arr_l('currency',0,'fa_AF');
              $koo_now = get_mon_mt();
            foreach($oild as $id => $label){
                 echo '<option '.($koo_now==$id ? 'selected' : '').' value="'.$id.'">'.$label.'</option>';
                 
            }

?>
                                </select>
                            
                            
                            
                            
                            
                            </td>
                        </tr>




                        <tr>
                            <td><label>مقدار:</label></td>
                            <td><input value="<?php mon_rmoney() ?>" rtxt="مقدار را وارد کنید" class="form-control"  size="6"  required name="mon_rmoney" onBlur="validate(this.id, this.value, 'num');" id="amountx" type="number" />
                                <span style="color:red" name="qay" id="qay_amountx"></span>
                            </td>
                        </tr>
                        <tr>
                            <td><label>یک <?php echo $curr ?> :</label></td>
                            <td>
                                <input step="0.0001" min="0"  value="<?php mon_rated() ?>"  rtxt="قیمت دالر را وارد کنید" class="form-control"   required onBlur="validate(this.id, this.value, 'num');
                                        addNumbers('/', 'amountx', this.id, 'totalz');" name="mon_rated" id="ratea" type="number" />
                                <span style="color:red" name="qay" id="qay_ratea"></span>
                            </td>
                        </tr>
                        <tr>
                            <td><label>به <?php echo $curr ?>:</label></td>
                            <td><input  value="<?php mon_doller() ?>" class="form-control" required name="mon_doller" readonly id="totalz" type="number" /></td>
                        </tr>

                        <tr>
                            <td valign="top"><label>توضیحات:</label></td>
                            <td>
                                <textarea class="form-control" id="dis" name="mon_discription" cols="30" rows="5"><?php mon_discription() ?></textarea></td>
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




            </div>
    </div></div>  
 
</div>





<?php get_footer() ?>