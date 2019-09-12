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
    public $fld_sep = '<br/>::TEXT';
    var $th_end = '';
    var $submit = '<input type="submit" class="btn btn-info" value="Submit Form"/ >';

    function __construct($method, $action, $attr = ''){
        $this->method = $method;
        $this->action = $action;
        $this->attr = $attr;
    }

    function set_htmls($start, $bfr_head, $aftr_head, $end){
        $this->th_bfh = $bfr_head;
        $this->th_afh = $aftr_head;
        $this->th_end = $end;
        $this->th_start = $start;
    }
public function set_septheme($theme){
    $this->fld_sep = $theme;
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
            $this->flds = explode(',', $flds);
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
        $form .= $this->th_start . '<form enctype="multipart/form-data" action="' . $this->action . '" method="' . $this->method . '" ' . $this->attr . ' id="' . $this->name . '" name="' . $this->name . '">' . $this->th_bfh;
        $form .='<input type="hidden" value="true" name="oy_form_validate" /> ';
        $form .=$this->form_builder();
        $form .=$this->get_submit();
        $form .=$this->th_afh . '</form>' . $this->th_end;
        return $form;
    }

    function __toString(){
        $this->get();
    }

    function get_submit(){
        return $this->submit;
    }
 function set_submit($val){
       $this->submit = $val;
    }
    function printfrm(){
        echo $this->get();
    }

    function form_builder(){

        $fld_theme = $this->fld_theme;
        $print_x = '';

        $fdls = $this->flds;
        $excp = $this->fldop;
        //if(!empty($this->fldvl))
        // $vals = ;
        $prfx = $this->prfx;
        //print_r($fdls);
       // echo '<br/>---<br/>';
       // print_r($this->fldvl);
        foreach($fdls as $key => $fdl){

                $varindex = $fdl;
                
              //  echo $thisvalue.'<br/>';
            if(isset($excp[$fdl])){
               $actual_fld =str_ireplace($prfx, "",$fdl); //$fdl;
                $fdl = $excp[$fdl];
                
            
                //print_r($excp);
                if(!isset($fdl['type']) || $fdl['type'] == '')
                    $fdl['type'] = 'text';


                if(!isset($fdl['name']))
                $fdl['name'] =  $actual_fld;

               // $fld['ame'] = str_ireplace($prfx, "", $fdl['name']);
                $fdl['name'] = $prfx . str_ireplace($prfx, "",$fdl['name']); //str_ireplace($prfx, "", str_ireplace ('[]', '',$fdl['name']));
               // 
                
               // print($fdl['name'] . '<br/>');
                if(!isset($fdl['label']))
                    $fdl['label'] = ucwords($actual_fld);

                $fdl_val= $prfx.$varindex;
              //  echo $fdl_val.'-'.key($excp).'<br/>';
                if(isset($this->fldvl[$fdl_val])){
                    
                    if(isset($excp['func4value'][$fdl['name']]) || isset($excp['func4value'][$actual_fld])){
                        if(isset($excp['func4value'][$actual_fld]))
                            $func = $excp['func4value'][$actual_fld];
                        else
                            $func = $excp['func4value'][$fdl['name']];
                        $fdl['def'] = call_user_func($func,$this->fldvl[$fdl_val]);
                    }else
                        $fdl['def'] = $this->fldvl[$fdl_val];

//                       if(isset($this->_Excp['func4value'][$this->cln_fld($fld)]))
//            return 
                }
               // print($this->fldvl['job_provinces']) . ', ' . $fdl['name'] . '<br/>';
                // echo $fdl['name'].'--'.$fdl['def'].'<br/>';
                
                
                if(!isset($fdl['label']))
                    $fdl['label'] = $actual_fld;

                if($fdl['type'] == 'hidden'){
                    $printer = $this->input_builder($fdl);
                }else{
                    $printer = str_ireplace('::label', $fdl['label'], $fld_theme);
                    $printer = str_ireplace('::input', $this->input_builder($fdl), $printer);
                     $printer = str_ireplace('::name', $fdl['name'], $printer);
                }
                $print_x .=$printer;
              
            }else{

                    $clean_full_fld = $prfx . str_ireplace($prfx, "",$fdl);

                if($this->is_sepi(str_ireplace($prfx, "",$fdl))){
                    $print_x .= $this->md_sepi($fdl);
                }else{

                    if(!empty($this->fldvl) && is_array($this->fldvl))
                        $val = $this->fldvl[$clean_full_fld];
                    else
                        $val = '';

                    $input = $this->gen_input(array('name' => $prfx . $fdl, 'label' => $fdl, 'def' => $val));




                    $printer = str_ireplace('::label', str_ireplace($prfx, "",$fdl), $fld_theme);
                    $printer = str_ireplace('::input', $input, $printer);
                    $printer = str_ireplace('::name', $fdl, $printer);
                    $print_x .=$printer;
                }
            }
        }


        return $print_x;
    }

    function md_sepi($f){
        $f = str_ireplace(':S', '', $f);
        $f = str_ireplace('S:', '', $f);
        return str_ireplace('::TEXT', $f, $this->fld_sep);
    }

    function is_sepi($v){
        if((substr($v, -2) == ':S') && substr(strrev($v), -2) == ":S")
            return true;
        else
            return false;
    }

    function input_builder($arr){
        if(isset($arr['name'])){
            $type = (isset($arr['type']) ? $arr['type'] : 'text');
            if($type == 'select')
                $export = $this->gen_select($arr);
            elseif($type == 'area')
                $export = $this->gen_area($arr);
            else
                $export = $this->gen_input($arr);
        }else
            $export = 'not a valid data';

        return $export;
    }

    function gen_opt($arr, $sel){
        $ex = '';
        if(is_array($arr))
            foreach($arr as $val => $op){
                if(is_array($sel)){
                    $selx = (in_array($val, $sel) ? 'selected="selected"' : ''); // die( 'is array.............................');
                }else
                    $selx = ($val == $sel ? 'selected="selected"' : '');  //echo $val .' = '.$sel.'<br/>';}
                $ex .='<option ' . $selx . ' value="' . $val . '">' . ucwords($op) . '</option>';
            }else
            $ex = '<option>No Values</option>';

        return $ex;
    }

    function gen_select($arr){
        $att = '';




        if(isset($arr['def']))
            $oval = $arr['def'];
        else
            $oval = '';

        if(isset($arr['type']))
            $opts = $this->gen_opt($arr['options'], $oval);
        else
            $opts .='<option>No Values</option>';

        if(isset($arr['name']))
            $att .=' name="' . $this->prfx . str_ireplace($this->prfx, '', $arr['name']) . '" ';

        // if(isset($arr['ph']))
        //  $att .=' placeholder="'.$arr['ph'].'" ';

        if(isset($arr['id']))
            $att .=' id="' . $arr['id'] . '" ';
        else
            $att .=' id="' . $arr['name'] . '" ';
        if(isset($arr['att']))
            $att .=$arr['att'];
        
        if(isset($arr['class']))
            $att .=' class="' . $arr['class'] . '" ';



        if(isset($arr['ext']))
            $ext = $arr['ext'];
        else
            $ext = '';
        if(isset($arr['prx']))
            $prx = $arr['prx'];
        else
            $prx = '';
        $text = $prx . '<select ' . $att . ' >' . $opts . '</select>' . $ext;
        return $text;
    }

    function gen_area($arr){
        $att = '';

        if(isset($arr['name']))
            $att .=' name="' . $this->prfx . str_ireplace($this->prfx, '', $arr['name']) . '" ';

        // if(isset($arr['ph']))
        //  $att .=' placeholder="'.$arr['ph'].'" ';

        if(isset($arr['id']))
            $att .=' id="' . $arr['id'] . '" ';
        else
            $att .=' id="' . $arr['name'] . '" ';
        if(isset($arr['att']))
            $att .=$arr['att'];
        if(isset($arr['class']))
            $att .=' class="' . $arr['class'] . '" ';

        if(isset($arr['def']))
            $oval = $arr['def'];
        else
            $oval = '';


        if(isset($arr['ext']))
            $ext = $arr['ext'];
        else
            $ext = '';

        if(isset($arr['prx']))
            $prx = $arr['prx'];
        else
            $prx = '';
        $text = $prx . '<textarea ' . $att . ' >' . $oval . '</textarea>' . $ext;
        return $text;
    }

    function gen_input($arr){
        $att = '';

        if(isset($arr['type']))
            $att .=' type="' . $arr['type'] . '" ';
        else
            $att .=' type="text" ';

        if(isset($arr['name']))
            $att .=' name="' . $this->prfx . str_ireplace($this->prfx, '', $arr['name']) . '" ';

        if(isset($arr['ph']))
            $att .=' placeholder="' . $arr['ph'] . '" ';

        if(isset($arr['id']))
            $att .=' id="' . trim($arr['id']) . '" ';
        else
            $att .=' id="' . $arr['name'] . '" ';
        if(isset($arr['att']))
            $att .=$arr['att'];
        if(isset($arr['class']))
            $att .=' class="' . $arr['class'] . '" ';

        if(isset($arr['def']))
            $att .=' value="' . $arr['def'] . '" ';

        if(isset($arr['ext']))
            $ext = $arr['ext'];
        else
            $ext = '';

        if(isset($arr['prx']))
            $prx = $arr['prx'];
        else
            $prx = '';

        $text = $prx . '<input ' . $att . ' />' . $ext;
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

function get_form($class){

    global $$class;
    $$class->printfrm();
}
