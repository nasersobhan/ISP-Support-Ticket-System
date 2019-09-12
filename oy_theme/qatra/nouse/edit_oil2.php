<?php get_header(); global $curr, $sizetype; ?>
<div class="content-box">
    <div class="sidex">
          
      <div class="panel panel-default" >
    <div class="panel-heading "><h3><?php echo g_lbl('edit') ?>: <?php echo get_pgtitle() ?></h3></div>
    <div class="panel-body ">     
        
 
<form  method="post" enctype="application/x-www-form-urlencoded" name="add"  id="oilexp" lang="fa">
    <table align="center" width="650">
        
            <tr>
        <td colspan="4" class=" text-center"><strong class="trhead">مشخصات اولیه</strong></td>
  </tr>
<!--   <tr>
       <td colspan="4">تاریخ : </td>
  </tr>-->

  <tr>
    <td width="120">نام شرکت:</td>
    <td><input value="<?Php echo get_cate_name(get_imp_name()) ?>" required onBlur="validate(this.id, this.value);" name="imp_name" id="name" type="text" />
    <span style="color:red" name="qay" id="qay_name"></span>
    </td>
  </tr>
  <tr>
    <td>نوع تیل:</td>
    <td><select  name="imp_koo">
            
            <?php
             $oild =  cat_2arr_l('oiltype',0,'fa_AF');
             $koo_now = get_imp_koo();
            foreach($oild as $id => $label){
                 echo '<option '.($koo_now==$id ? 'selected' : '').' value="'.$id.'">'.$label.'</option>';
                 
            }
            ?>

    </select></td>
    
     <td>نام مخزن:</td>
    <td><select  name="imp_st">
  <?php 
             $oild =  cat_2arr_l('house',0,'fa_AF');
             $st_now = get_imp_st();
            foreach($oild as $id => $label){
                 echo '<option '.($st_now==$id ? 'selected' : '').' value="'.$id.'">'.$label.'</option>';   
            }
?>

    </select></td>
    
    
  </tr>


  

 <tr>
    <td>مقدار ترازو:</td>
    <td><input  size="6"  required name="imp_amount" value="<?Php imp_amount() ?>" onBlur="validate(this.id, this.value,'num');" id="imp_amountx" type="text" />
     <span style="color:red" name="qay" id="qay_imp_amountx"></span>
    </td>
    
    <td width="100">قیمت به <?php echo $curr ?>:</td>
    <td>
    <input  size="10" required onBlur="validate(this.id, this.value,'num');addNumbers('*','imp_amountx',this.id,'totalz',1000);" name="imp_price" value="<?Php imp_price() ?>" id="pricex" type="text" />
    <span style="color:red" name="qay" id="qay_pricex"></span>
    </td>
  </tr>
  
  <tr>
    <td>جمع کل ترازو:</td>
    <td><input required  name="imp_total" value="<?Php imp_total() ?>" disabled id="totalz" type="text" /></td>
  </tr>
  
    <tr>
       
        <td width="100">مقدار سمیر:</td>
    <td><input  required name="imp_s_amont" value="<?php imp_s_amont() ?>" onBlur="validate(this.id, this.value,'num');addNumbers('*','pricex',this.id,'totalsem',1000); addNumbers('-','imp_amountx',this.id,'imp_overamnt',1); " id="imp_semamnt" type="text" />
     <span style="color:red" name="qay" id="qay_imp_semamnt"></span>
    </td>
    <td width="100">جمع کل سمیر:</td>
    <td>
        
        <input required  name="imp_s_total" value="<?Php imp_s_total() ?>"  disabled id="totalsem" type="text" />
        
   
    </td>
  </tr>
  
<?php if(get_imp_eoe()!=1) { ?>
    <tr>
        <td colspan="4" class=" text-center"> <hr/>  <strong class="trhead">محصولات</strong></td>
  </tr>
  


    <tr>
    <td width="100">نام محصول کننده:</td>
    <td><input size="30" required onBlur="validate(this.id, this.value);"  name="imp_m_name"  value="<?Php echo get_cate_name(get_imp_m_name()) ?>"  id="name" type="text" />
    <span style="color:red" name="qay" id="qay_name"></span>
    </td>
  </tr>

       <tr>
       
        <td width="100">قیمت محصول به <?php echo $curr ?>:</td>
    <td><input  size="6"  required value="<?Php imp_m_price() ?>" name="imp_m_price" onBlur="validate(this.id, this.value,'num');addNumbers('*','imp_semamnt',this.id,'mahsoltotal',1000);" id="imp_mahsolprice" type="text" />
     <span style="color:red" name="qay" id="qay_imp_mahsolprice"></span>
    </td>
    <td width="100">مجموع محصول:</td>
    <td>
        <input  size="10" required  disabled value="<?Php imp_m_total() ?>" name="imp_m_total" id="mahsoltotal" type="text" />
   
    </td>
  </tr>
  
  
      <tr>
        <td colspan="4" class=" text-center"> <hr/>  <strong class="trhead">اضافه بار</strong></td>
  </tr>
  
    <tr>
    <td width="100">نام صاحب اضافه بار:</td>
    <td><input size="30" required onBlur="validate(this.id, this.value);" value="<?Php echo get_cate_name(get_imp_o_name()) ?>" name="imp_o_name" id="name" type="text" />
    <span style="color:red" name="qay" id="qay_name"></span>
    </td>
    
    <td width="100">مقدار اضافه بار:</td>
    <td><input  size="6" disabled  required value="<?Php imp_o_amont() ?>" name="imp_o_amont" onBlur="validate(this.id, this.value,'num');" id="imp_overamnt" type="text" />
     <span style="color:red" name="qay" id="qay_imp_imp_overamnt"></span>
    </td>
    
  </tr>
       <tr>
       
        
    <td width="100">قیمت اضافه بار به <?php echo $curr ?>:</td>
    <td>
    <input  size="10" required onBlur="validate(this.id, this.value,'num');addNumbers('*','imp_overamnt',this.id,'over_total',1000);" value="<?Php imp_m_name() ?>" name="imp_o_price" id="imp_overprice" type="text" />
    <span style="color:red" name="qay" id="qay_imp_overprice"></span>
    </td>
    
    
     <td>مجموع اضافه بار:</td>
    <td><input required value="<?Php imp_o_total() ?>" name="imp_o_total" disabled id="over_total" type="text" /></td>
  </tr>
  
  
 
  
     
  
  
    <tr>
        <td colspan="4" class=" text-center"> <hr/>  <strong class="trhead">انتقال</strong></td>
  </tr>
      <tr>
    <td width="100">بارچالانی:</td>
    <td><input size="30" required onBlur="validate(this.id, this.value);" value="<?Php echo get_cate_name(get_imp_t_cname()) ?>" name="imp_t_cname" id="name" type="text" />
    <span style="color:red" name="qay" id="qay_name"></span>
    </td>
    
         <td width="100">نام دریور:</td>
    <td><input  required value="<?Php imp_drivername() ?>" name="imp_drivername" id="driver" type="text" /></td>
  </tr>
  

   <tr>
  
    <td width="100">نمبر موتر:</td>
    <td><input   required value="<?Php imp_trucknum() ?>" name="imp_trucknum" id="car"  onBlur="validate(this.id, this.value,'num');" type="text" />
     <span style="color:red" name="qay" id="qay_car"></span></td>
    
    
      <td width="100">قیمت کرایه به <?php echo $curr ?>:</td>
    <td><input  size="6"  required value="<?Php imp_t_price() ?>" name="imp_t_price" onBlur="validate(this.id, this.value,'num');addNumbers('*','imp_semamnt',this.id,'rent_total',1000);" id="imp_rentprice" type="text" />
     <span style="color:red" name="qay" id="qay_imp_rentprice"></span>
    </td>
  </tr>

  
  <tr>
    <td>مجموع کرایه:</td>
    <td><input required value="<?Php imp_t_total() ?>" name="imp_t_total" disabled id="rent_total" type="text" /></td>
  </tr>
  <?php } ?>

 

  
       
  
 <tr>
      <td colspan="4"><hr/></td>
  </tr>
   <tr>
    <td valign="top">توضیحات:</td>
    <td colspan="3">
        <textarea class="form-control" id="dis"  name="imp_dis" cols="30" rows="5"><?Php echo nl2br(get_imp_dis()) ?></textarea></td>
  </tr>

   <tr>
    <td align="center" colspan="4">

        <input class="btn btn-success Pull-left" style="margin-top: 5px;" data-url="<?php echo HOME ?>?pg=impexp&eoe=<?php echo is_get('eoe'); ?> #reportx" id="load_reportx" type="button" name="Send" value="ذخیره و جدید"
    onclick="javascript: formget(this.form,'<?php echo HOME ?>?pg=impexp&edit=<?php imp_id() ?>');" >


    </td>

  </tr>



</table>
</form>
        
        

<span style="color:red" name="mess" id="mess">
    </span>
</div>
    
    
    
      </div></div>
    <span id="reportx" >
 <div  class="sidex  Pull-left">





<div class="panel panel-default" >
    <div class="panel-heading "><h3> آخرین اطلاعات ذخیره شده</h3></div>
    <div class="panel-body ">  

	<table style="table-layout:fixed" id="datatbl" width="550" >
	
            	<tr>
    <th width="80px">زمان ثبت شده به شمسی</th>

    <td width="80px"><?php echo valDate(get_imp_time(),'l j F Y H:i:s'); ?></td>

  </tr>
    

	<tr>
    <th width="80px">نام ثبت کننده</th>

    <td width="80px"><?php echo user_name_ex(get_imp_uid()); ?></td>

  </tr>

  	<tr>
    <th width="80px">نوع</th>

    <td width="80px"><?php echo (get_imp_eoe()==1? 'فروش روغنیات' : 'خرید روغنیات');  ?></td>

  </tr>





</table>


</div></div></div>

</div>
    
    </div>
<?php get_footer() ?>