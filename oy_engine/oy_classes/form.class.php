<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class oy_form{
    
    var $method = "POST";
    var $action = "action.php";
    var $name = 'oy_aform';
    var $attr = '';
    var $prfx = '';
    var $flds = array();
     var $fldop = array();
      var $fldvl = array();
      var $fld_theme = '::label ::input';
      var $th_start = '';
       var $th_bfh = '';
      var $th_afh = '';
       
      var $th_end = ''; 
      
   function __construct($method,$action, $attr){
       $this->method = $method;
       $this->action = $action;
       $this->attr = $attr;
    
   } 
    
    function set_htmls($start, $bfr_head, $aftr_head,$end){
         $this->th_bfh = $bfr_head;
       $this->th_afh = $aftr_head;
       $this->th_end = $end;
        $this->th_start = $start;
    }
    function set_flds($flds){
//         $fldsx = explode(',',$flds);
//         $fflds = '';
//                foreach ($fldsx as $fld){
//                    $fld = str_ireplace (static::$_fldpfx, '', $fld);
//                    $com = ($flds[0]==$fld ? '' : ', ');
//                    $fflds .= $com.static::$_fldpfx.$fld;
//                }
        
        
        //$flds = explode(',', $flds);
        if(is_array($flds))
             $this->flds = $flds;
        else 
            $this->flds = explode(',',$flds);
    }
    
    function set_fld_theme($flds){
        if(!empty($flds))
        $this->fld_theme = $flds;
    }
    
      function set_fld_option($fldop){
        $this->fldop = $fldop;
    }
    
     function set_prfx($fldop){
       $this->prfx = $fldop;
    }
    function set_values($fldop){
       $this->fldvl = $fldop;
    }
     function set_btn($fldop){
       //$this->fldvl = $fldop;
    }
    
    function set_formname($name){
       $this->name = $name;
    }
    
    
    function get(){
   
        
        
        $form = '<!--FORM-GENERATRO-->';
        $form .= $this->th_start.'<form enctype="multipart/form-data" action="'.$this->action.'" method="'.$this->method.'" '.$this->attr.' name="'.$this->name.'">'.$this->th_bfh;
        $form .='<input type="hidden" value="true" name="oy_form_validate" /> ';
        $form .=$this->form_builder();
        $form .=$this->form_submit();
        $form .=$this->th_afh.'</form>'.$this->th_end;
        return $form;
    }
    
    function form_submit(){
        $button = '';
        return $button;
    }
    
    function printfrm(){
        
    }
function form_builder(){
      
$fld_theme = $this->fld_theme;
      $print_x = '';

         $fdls = $this->flds;
         $excp = $this->fldop;
         //if(!empty($this->fldvl))
        // $vals = ;
          $prfx = $this->prfx;
          
        foreach($fdls as $fdl) {

             //$print_x .='<tr>';
             if(isset($excp[$fdl])){
                $fdlx = $fdl;
                 $fdl = $excp[$fdl];
                  if(!isset($fdl['name']))
                    $fdl['name'] = $this->prfx.$fdlx; //key($x);
                
                 if(!isset($fdl['label']))
                    $fdl['label'] = $fdl['name'];
                 
                 if(!empty($this->fldvl) && is_array($this->fldvl))
                      $fdl['def'] = $this->fldvl[$prfx.$fdl].'valute';
                // $fdl['def'] = $this->fldvl[key($fdl)];
                 
                 if($fdl['type']=='hidden'){
                     $printer =$this->input_builder($fdl);
                     
                 }else{
                    $printer = str_ireplace('::label', $fdl['label'], $fld_theme) ;
                  $printer = str_ireplace('::input', $this->input_builder($fdl), $printer) ;
                 }
                  $print_x .=$printer;
                 
             }else{
            
               if(!empty($this->fldvl) && is_array($this->fldvl))
                      $val = $this->fldvl[$prfx.$fdl]; 
               else
                   $val='';
               
             //  $def = (($hasval) ? 'value="'.$post[static::$_fldpfx.$fdl].'"' : 'not-edit' );
               // $dis = ((static::$_fldpfx.$fdl==static::$_fldpfx.$this->_primkey) ? ' disabled=disabled ' : '');
                $input = $this->gen_input(array('name'=>$prfx.$fdl,'label'=>$fdl, 'def'=>$val));
               
                 $printer = str_ireplace('::label', $fdl, $fld_theme) ;
                  $printer = str_ireplace('::input', $input, $printer) ;
                  $print_x .=$printer;
                
               // $print_x .='<td class="w300">'.  $fdl.': </td><td>'.$input.'</td></tr>';
                  
             }
            // $print_x .='</tr>';
         } 
//}
      
      return $print_x;
     
}
    
    
    
    function input_builder($arr){
        if(isset($arr['name'])){
               $type = (isset($arr['type']) ? $arr['type'] : 'text');
               if($type=='select')
                    $export = $this->gen_select($arr);
               elseif($type=='area')
                    $export = $this->gen_area($arr);
               else
                    $export = $this->gen_input($arr);    
            
    
        }else
            $export = 'not a valid data';
        
        return $export;
    }

    function gen_opt($arr, $sel){
        $ex ='';
        if(is_array($arr))
            foreach ($arr as $val => $op){
            $selx = ($val==$sel ? 'selected="selected"' : '');
                $ex .='<option '.$selx.' value="'.$val.'">'.$op.'</option>';
            }
        else
           $ex = '<option>No Values</option>';

            return $ex;
    }

        
function gen_select($arr){
     $att ='';
     
     if(isset($arr['def']))
        $oval =$arr['def'];
     else
         $oval = '';
     
    if(isset($arr['type']))
       $opts = $this->gen_opt($arr['options'],$oval);
    else
         $opts .='<option>No Values</option>';
    
    if(isset($arr['name']))
        $att .=' name="'.$this->prfx. str_ireplace ($this->prfx, '', $arr['name']).'" '; 
    
   // if(isset($arr['ph']))
       //  $att .=' placeholder="'.$arr['ph'].'" ';
   
    if(isset($arr['id']))
         $att .=' id="'.$arr['id'].'" ';
    else
         $att .=' id="'.$arr['name'].'" ';
    if(isset($arr['att']))
        $att .=$arr['att'];
     if(isset($arr['class']))
        $att .=' class="'.$arr['class'].'" ';
     
     
     
     if(isset($arr['ext']))
        $ext = $arr['ext'];
     else
         $ext = '';
     
     $text = '<select '.$att.' >'.$opts.'</select>'. $ext;
     return $text;
     
     
}



function gen_area($arr){
     $att ='';

    if(isset($arr['name']))
        $att .=' name="'.$this->prfx. str_ireplace ($this->prfx, '', $arr['name']).'" '; 
    
   // if(isset($arr['ph']))
       //  $att .=' placeholder="'.$arr['ph'].'" ';
   
    if(isset($arr['id']))
         $att .=' id="'.$arr['id'].'" ';
    else
         $att .=' id="'.$arr['name'].'" ';
    if(isset($arr['att']))
        $att .=$arr['att'];
     if(isset($arr['class']))
        $att .=' class="'.$arr['class'].'" ';
     
     if(isset($arr['def']))
        $oval = $arr['def'];
     else
         $oval = '';
     
     
      if(isset($arr['ext']))
        $ext = $arr['ext'];
     else
         $ext = '';
     
     
     $text = '<textarea '.$att.' >'.$oval.'</textarea>'.$ext;
     return $text;
     
     
}




function gen_input($arr){
    $att='';
    
    if(isset($arr['type']))
        $att .=' type="'.$arr['type'].'" ';
    else
         $att .=' type="text" ';
    
    if(isset($arr['name']))
        $att .=' name="'.$this->prfx.str_ireplace ($this->prfx, '', $arr['name']).'" '; 
    
    if(isset($arr['ph']))
         $att .=' placeholder="'.$arr['ph'].'" ';
   
    if(isset($arr['id']))
         $att .=' id="'.$arr['id'].'" ';
    else
         $att .=' id="'.$arr['name'].'" ';
    if(isset($arr['att']))
        $att .=$arr['att'];
     if(isset($arr['class']))
        $att .=' class="'.$arr['class'].'" ';
     
     if(isset($arr['def']))
        $att .=' value="'.$arr['def'].'" ';
     
      if(isset($arr['ext']))
        $ext = $arr['ext'];
     else
         $ext = '';

$text = '<input '.$att.' />'.$ext;
     return $text;
}

    
//function gen_hide($arr){
//   $att='';
//    
//    if(isset($arr['type']))
//        $att .=' type="'.$arr['type'].'" ';
//    else
//         $att .=' type="text" ';
//    
//    if(isset($arr['name']))
//        $att .=' name="'.$this->prfx.str_ireplace ($this->prfx, '', $arr['name']).'" '; 
//    
//    if(isset($arr['ph']))
//         $att .=' placeholder="'.$arr['ph'].'" ';
//   
//    if(isset($arr['id']))
//         $att .=' id="'.$arr['id'].'" ';
//    else
//         $att .=' id="'.$arr['name'].'" ';
//    if(isset($arr['att']))
//        $att .=$arr['att'];
//     if(isset($arr['class']))
//        $att .=' class="'.$arr['class'].'" ';
//     
//     if(isset($arr['def']))
//        $att .=' value="'.$arr['def'].'" ';
//     
//      if(isset($arr['ext']))
//        $ext = $arr['ext'];
//     else
//         $ext = '';
//
//$text = '<input '.$att.' />'.$ext;
//     return $text;  
//    
//}
    
    
    
}

