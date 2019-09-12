<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//class_include("form");
//class_include("table");
class oy_page{

    var $_pagelist = array();
    var $_Excp = array();
    var $_message = '';
    var $_primkey = 'id';
    var $fld_sep = '::TEXT';
    var $tbl = '';
    var $tbl_c = '';
    var $tbl_pfx = TBL_PIX;
    var $flds = '';
    var $flds_pfx;
    var $theme;
//        function md_sepi($f){
//        $f = str_ireplace(':S', '', $f);
//        $f = str_ireplace('S:', '', $f);
//        return str_ireplace('::TEXT', $f, $this->fld_sep);
//    }
//
//    function is_sepi($v){
//        if((substr($v, -2) == ':S') && substr(strrev($v), -2) == ":S")
//            return true;
//        else
//            return false;
//    }
//    
    
    
    function __construct($tbl, $pri = ''){
        $this->flds_pfx = get_pre($tbl);
        $this->tbl_c = $tbl;
        $this->tbl = $this->tbl_pfx.$tbl;
        $this->set_primkey($pri);
        
    }

    function pr_pglist(){
        return ($this->_pagelist);
    }

    function set_primkey($keyname = ''){

        global $dbase, $tbl_pre;
        if($keyname == '')
            $query = str_ireplace($this->flds_pfx, '', $dbase->get_prim_key($this->tbl));
        else
            $this->_primkey = $keyname;
    }

    function Excp($arr){
        if(!isset($arr['title']))
            $arr['title'] = $this->tbl_c;
        if(isset($arr['flds']))
             $this->flds =$arr['flds'];
        $this->_Excp = $arr;
       
    }

    function load_page(){
        $tbl = $this->tbl_c;

        //page_include("autoloads/page");
        if(!isset($this->_Excp['actions']))
            $this->_Excp['actions'] = true;

        if(!isset($this->_Excp['title']))
            $this->_Excp['title'] = 'Page : ' . $tbl;
            set_pgtitle($this->_Excp['title']);

        if(!isset($this->_Excp['caption']))
            $this->_Excp['caption'] = $this->_Excp['title'];

        global $dbase;
        $page_action = is_get('action');
        $page_value = is_get('value');

        $fpx = $this->flds_pfx;
        $tpx = $this->tbl_pfx;


        if($this->_Excp['flds']='option,value' OR $this->_Excp['flds']='id,option,value')
                $this->_Excp['flds']='';
            
        

        if($page_action){
            if($page_action == 'bulk'){
                $this->action_bulk();
            }

            if($page_action=='search')
                 $this->get_home();

            if($page_value){
                if($page_action == 'edit'){
                    $this->action_edit();
                }elseif($page_action == 'del'){
                   $this->action_del();
                }elseif($page_action == 'sus'){
                   $this->action_sus();
                }elseif($page_action == 'act'){
                   $this->action_act();
                }elseif($page_action == 'view'){
                    $this->action_view();
                }
            }else{
                if($page_action == 'add'){
                    $this->action_insert();
                }
            }
        }else{
            $this->get_home();
        }
    }
    function action_del(){
       global $dbase;
       tbl_access($this->tbl_c,'delete');
       $dbase->RowUpdate($this->tbl, $db = array($this->flds_pfx ."status" => '100'), $this->flds_pfx . $this->_primkey . '=' . is_get('value'));
       set_message('Deleted');
       redirect_to(get_tbllink($this->tbl_c));
    }
    
    function action_sus(){
       global $dbase;
       tbl_access($this->tbl_c,'edit');
       $dbase->RowUpdate($this->tbl, $db = array($this->flds_pfx ."status" => '0'), $this->flds_pfx . $this->_primkey . '=' . is_get('value'));
       set_message('Deleted');
       redirect_to(get_tbllink($this->tbl_c));
    }
    
    function action_act(){
       global $dbase;
       tbl_access($this->tbl_c,'edit');
       $dbase->RowUpdate($this->tbl, $db = array($this->flds_pfx ."status" => '1'), $this->flds_pfx . $this->_primkey . '=' . is_get('value'));
       set_message('Deleted');
       redirect_to(get_tbllink($this->tbl_c));
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
    function action_view(){
        global $dbase;
        $page_value = is_get('value');                
                        $vtbl = new oy_table('view_' . $this->tbl_c . '_' . $page_value, 'table');
                        //$vtbl->addCaption($this->_Excp['title'], 'cap', array('id' => 'tblCap'));

                        $vtbl->addRow('bg-success');
                        $vtbl->addCell('Field Name', 'first', 'header');
                        $vtbl->addCell('Value', '', 'header');
                        $flds = $this->get_fields4db();
                        $vtbl_arr = $dbase->get_single_row_arr($this->tbl, $flds, ' where ' . $this->flds_pfx . $this->_primkey . '=' . $page_value);
                            $values = $vtbl_arr[0];
                         $flds =$this->get_fields();   
                        foreach($flds as $key){
                            
                            if($this->is_sepi($key)){
                                $value = $this->md_sepi($key);
                                  
                                $vtbl->addRow('tbl_head');
                                $vtbl->addCell(($value), 'num','data',array('colspan'=>'2'));
                                //$vtbl->addCell($value, 'num');
                            }else{
                                $value=$values[$this->flds_pfx.trim($key)];
                                $vtbl->addRow();
                                $vtbl->addCell($this->get_label($key), 'num');
                                $vtbl->addCell($this->pr_value($value, $key), 'num');
                            }
                        }
        global $printup;
        
        $printup = $vtbl->display();
        
       if(!isset($this->_Excp['theme']))
             theme_include('autoloader/view');
        else
            theme_include($this->_Excp['theme']);
      
    }

    function action_edit(){
       tbl_access($this->tbl_c,'edit',is_get('value'));
        global $dbase;
        
        
        if(is_post('oy_form_validate')){

                        if(isset($_FILES)){
                            foreach($_FILES as $key => $file){
                                if($_FILES[$key]['size'] == 0){
                                    unset($_FILES[$key]);
                                }else{
                                    $up = upload_it($file);
                                    $_POST[$key] = ($up->dt_id); //echo 'Yes it"s here';
                                }
                            }
                        }

                        unset($_POST['oy_form_validate']);
                        unset($_POST[$this->flds_pfx . $this->_primkey]);
                        unset($_POST[$this->_primkey]);
                        $uid_f = $this->flds_pfx . 'uid';
                        if($dbase->field_exist($this->tbl,$uid_f))
                            $_POST[$uid_f]=  user_uid();
                        $postdata = array_filter($_POST);

                        $dbase->RowUpdate($this->tbl, $postdata, $this->flds_pfx . $this->_primkey . '=' . is_get('value'));
                        $this->set_message('Row Updated');
       }
       
       
        if(!isset($this->_Excp['theme']))
            theme_include('autoloader/form');
        else
            theme_include($this->_Excp['theme']);
    }
    
    
    
    function action_insert(){
       // field_exist($tbl,$fld)
         //access_check_oy();
        tbl_access($this->tbl_c,'add');
        global $dbase;
        $page_action = is_get('action');
        $page_value = is_get('value');
        $tbl = $this->tbl;
        $tbl_c = $this->tbl_c;
        if(is_post('oy_form_validate')){



                        if(isset($_FILES)){
                            foreach($_FILES as $key => $file){
                                if($_FILES[$key]['size'] == 0){
                                    unset($_FILES[$key]);
                                }else{
                                    $up = upload_it($file);
                                    $_POST[$key] = ($up->dt_id); //echo 'Yes it"s here';
                                }
                            }
                        }



                        unset($_POST['oy_form_validate']);
                        unset($_POST[$this->flds_pfx . $this->_primkey]);
                        unset($_POST[$this->_primkey]);
                        $uid_f = $this->flds_pfx . 'uid';
                        if($dbase->field_exist($this->tbl,$uid_f))
                            $_POST[$uid_f]=  user_uid();
                        
                        $postdata = array_filter($_POST);
                        
                        



                        $dbase->RowInsert($this->tbl, $postdata);
                        $this->set_message('Row Inserted');
                        if(!isset($this->_Excp['theme']))
                            theme_al_include('autoloader/form');
                        else
                            theme_include('autoloader/' . $this->_Excp['theme']);
                    }else{


                        if(!isset($this->_Excp['theme']))
                            theme_include('autoloader/form');
                        else
                            theme_include($this->_Excp['theme']);
                    }
    }
    function action_bulk(){
        tbl_access($this->tbl_c,'delete');
        $PrimiryKey = $this->flds_pfx . $this->_primkey;
        $fld_pre = $this->flds_pfx;
        $uid = user_uid();
        $tbl = $this->tbl;
        global $dbase;
        if(is_post('pid')){
            if(is_post('ac') == 'del'){
                if(is_array($_POST['pid'])){
                   
                    foreach((array) $_POST['pid'] as $id){
                        $id = (int) $id;
                        if($id) $ids[] = $id;
                        
                        $where = " {$PrimiryKey}=" . $id; echo $tbl.' '.$where;
                        $dbase->RowUpdate($tbl, $db = array("{$fld_pre}status" => '100'), $where);
                    }
                    if(is_get('ajax'))
                        echo 'post deleted succesfuly!!!' . implode(', ', $ids);
                    else{
                        Set_message('post deleted succesfuly!!!' . implode(', ', $ids));
                        redirect_to(get_tbllink($this->tbl_c), false);
                    }
                }
            }
            
            elseif(is_post('ac') == 'sus'){
                if(is_array($_POST['pid'])){
                   
                    foreach((array) $_POST['pid'] as $id){
                        $id = (int) $id;
                        if($id) $ids[] = $id;
                        
                        $where = " {$PrimiryKey}=" . $id; echo $tbl.' '.$where;
                        $dbase->RowUpdate($tbl, $db = array("{$fld_pre}status" => '0'), $where);
                    }
                    if(is_get('ajax'))
                        echo 'post deleted succesfuly!!!' . implode(', ', $ids);
                    else{
                        Set_message('post deleted succesfuly!!!' . implode(', ', $ids));
                        redirect_to(get_tbllink($this->tbl_c), false);
                    }
                }
            }
            
            elseif(is_post('ac') == 'act'){
                if(is_array($_POST['pid'])){
                   
                    foreach((array) $_POST['pid'] as $id){
                        $id = (int) $id;
                        if($id) $ids[] = $id;
                        
                        $where = " {$PrimiryKey}=" . $id; echo $tbl.' '.$where;
                        $dbase->RowUpdate($tbl, $db = array("{$fld_pre}status" => '1'), $where);
                    }
                    if(is_get('ajax'))
                        echo 'post deleted succesfuly!!!' . implode(', ', $ids);
                    else{
                        Set_message('post deleted succesfuly!!!' . implode(', ', $ids));
                        redirect_to(get_tbllink($this->tbl_c), false);
                    }
                }
            }
            
              
        }else{
            if(is_get('ajax'))
                echo 'Please Select a record or records';
            else{
                Set_message('Please Select a record or records');
                redirect_to(get_tbllink($this->tbl_c), false);
            }
        }
    }

    function get_home(){
       
        
        

        load_jsplug('table');
        load_jsplug('form');
        $tbl = $this->tbl;
        $PrimiryKey = $this->flds_pfx . $this->_primkey;
        $statuskey = $this->flds_pfx . 'status';
        $fld_pre = $this->flds_pfx;
        $uid = user_uid();
        $page_action = is_get('action');
        $page_value = is_get('value');
        global $vtbl, $dbase;
        $vtbl = new oy_table('list_' . $this->tbl_c, 'table table-condensed');
//  $vtbl->addCaption($this->_Excp['caption'], 'cap', array('id' => 'tblCap'));

        $vtbl->addRow('blue_head');
        $flds = (isset($this->_Excp['flds']) ? $this->_Excp['flds'] : $this->get_fields4db());
        $fldin_array = explode(',', $flds);
       // print_r($fldin_array);
        if (!in_array($PrimiryKey, $fldin_array)) 
                $flds = $PrimiryKey.','.$flds;

        
        $fld2arr = explode(',', $flds);
        $a_flds = array();

        foreach($fld2arr as $fld){
            if(cln_fld($fld, $fld_pre) == $this->_primkey ){
                if($this->_Excp['actions'])
                $vtbl->addCell('<input id="checkAll" type="checkbox" />', '', 'header');
                else
                  $vtbl->addCell('ID', '', 'header');  
            } else
                $vtbl->addCell($this->get_label($fld), 'style6', 'header');
            $a_flds[] = $this->flds_pfx . $this->rm_fpfx($fld);
        }
        if($this->_Excp['actions'])
            $vtbl->addCell('Actions', 'style6', 'header');

        $r_flds = $this->get_fields4db();


        if(is_get('lim'))
            $max_num = is_get('lim');
        else
            $max_num = TBL_LIMITE;
        $page = is_get('page');

        if(is_get('page')){
            $page = (int) $page - 1;
            $offset = $max_num * $page;
        }else{
            $page = 0;
            $offset = 0;
        }


        if(is_get('order'))
            $ord = is_get('order');
        else
            $ord = 'DESC';
        $orderby = " ORDER BY {$PrimiryKey} {$ord} ";
        
        if(is_get('list')=='all'){
            $uid_w = '';
            if(!is_access($this->tbl_c,'view'))
                $uid_w = "AND {$fld_pre}uid = {$uid}";
        }        else
          $uid_w = "AND {$fld_pre}uid = {$uid}"; 
        
        $where = " where {$fld_pre}status<>100 ";
        if(is_get('status')=='act')
            $where="where {$fld_pre}status=1 ";
        elseif(is_get('status')=='sus')
             $where="where {$fld_pre}status=0 ";
        elseif(is_get('status')=='del')
             $where="where {$fld_pre}status=100 ";
        elseif(is_get('status')=='all')
            $where="where  {$fld_pre}status<>-1 ";
            
        $where = $where.$uid_w;
        if(is_get('action')=='search'){
            $pz = $_POST;//print_r($pz);
            $keys = $this->add_fpfx(array_keys($pz));
            //print_r($keys);
            $flds = $dbase->fetch_field($this->tbl);
           //print_r($flds);
            $data = array_intersect($keys,$flds);
           //print_r($data);
            $sets = [];
            
            foreach($data as $value){
                $vl = (isset($pz[$value]) ? $pz[$value] : $pz[$this->rm_fpfx($value)]);
                if(!empty($vl))
                    $sets[] = "`" . $flds[array_search ($value, $flds)] . "` like '%" . $vl . "%'";
            }
            $sql = implode(' AND ', $sets);

            if(count($sets)>0)
                $where .= " AND ". $sql;
        }

        $main_query = "SELECT {$r_flds} FROM {$tbl} " . $where;


        global $pagin, $total;
        $total = $dbase->num_rows($main_query);
        
      
        $pagin = pagination($total, $max_num, $page + 1, get_current_url());

        $left_rec = $total - ($page * $max_num);
        if(TYPE_DB=="MYSQL")
            $limit = " LIMIT {$offset},{$max_num}";
        else
           $limit = " OFFSET  {$offset} ROWS FETCH NEXT {$max_num} ROWS ONLY";  
       
        
        
         $r_flds = $r_flds.','.$statuskey; 
         $fldin_array = explode(',', $r_flds);
         if (!in_array($PrimiryKey, $fldin_array)) 
                $r_flds = $PrimiryKey.','.$r_flds;
       
        $vtbl_arr = $dbase->tbl2array2($this->tbl, $r_flds, $where . $orderby . $limit);


     
            $bfr_tbl=''; $aft_tbl ='';
            //$vtbl->addCaption($search);
            
            if($this->_Excp['actions']){
                 
                $bfr_tbl ='<form ajaxform id="baction" method="POST" action="'.get_tbllink(is_get('tbl'),'bulk').'&ajax=1" role="search"> ';

                $aft_tbl='</form>';
                
            }
            
            if(isset($this->_Excp['search']['flds'])){
                    $x = $this->_Excp['search'];
                    $x['tbl'] = $this->tbl_c;
                    $search = $this->mk_searchform($x);
                    $bfr_tbl = $search.$bfr_tbl;
                }
        foreach($vtbl_arr as $rowx){
             if($this->_Excp['actions']){
                $vtbl->addRow();
                $vtbl->addCell('<input name="pid[]" value="' . $rowx[$PrimiryKey] . '" type="checkbox" />');
             }else{
                $vtbl->addRow();
                $vtbl->addCell($rowx[$PrimiryKey]); 
             }
             
              
             
             
             
            foreach($rowx as $cellkey => $cell){
            
                if(($cellkey != $statuskey) AND ($cellkey!=$PrimiryKey))
                    $vtbl->addCell($this->pr_value($cell, $cellkey)); 
                
            } 

            if($this->_Excp['actions']){
                   
               $link_x = is_get('tbl');
                $edit = '<a title="Edit" href="' . get_tbllink($link_x, 'edit', $rowx[$PrimiryKey]) . '" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>';
                
                $del = '<a title="Delete" href="' . get_tbllink($link_x, 'del', $rowx[$PrimiryKey]) . '" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>';
                $view = '<a title="View" target="_blank" href="' . get_tbllink($link_x, 'view', $rowx[$PrimiryKey]) . '" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-eye-open"></i></a>';
                 $sus = '<a title="Publish" href="' . get_tbllink($link_x, 'act', $rowx[$PrimiryKey]) . '" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-ban-circle"></i></a>';
                if($rowx[$this->flds_pfx.'status']==1)
                    $sus = '<a title="un-Publish" href="' . get_tbllink($link_x, 'sus', $rowx[$PrimiryKey]) . '" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-ban-circle"></i></a>';
                
                if($rowx[$this->flds_pfx.'status']==100){
                    $del = '<a title="Un-Delete" href="' . get_tbllink($link_x, 'act', $rowx[$PrimiryKey]) . '" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-ok"></i></a>';
                    $sus = '';
                    
                }
                $print_x = '<div class="btn-group" role="group" aria-label="Allowed Action">';
                $print_x .= (is_access($link_x,'edit',$rowx[$PrimiryKey])) ? $edit : '';
                $print_x .= (is_access($link_x,'edit',$rowx[$PrimiryKey])) ? $sus : '';
                $print_x .= (is_access($link_x,'delete',$rowx[$PrimiryKey])) ? $del : '';
                $print_x .= (is_access($link_x,'view',$rowx[$PrimiryKey])) ? $view : '';
                $print_x .='</div>';
                    


             
                $vtbl->addCell($print_x);
            }
        }
        
        
        global $printup;
        
        $printup = $bfr_tbl.$vtbl->display();
        

            theme_include('autoloader/home');

    }
    
  function mk_searchform($excp){
      
       $s_frm = new oy_page($excp['tbl']);
       if(isset($excp))
       $s_frm->Excp($excp);
      
      $flds = $excp['flds'];
      $class = '';
      if(isset($excp['form-class']))
          $class = 'class="'.$excp['form-class'].'"';
        $form_print = new oy_form('POST', $this->get_link(), 'id="search_' . $this->tbl_c . '" '.$class);
        $form_print->action = get_tbllink($this->tbl_c,'search');
        $form_print->set_flds($flds);
        $form_print->set_prfx($s_frm->flds_pfx);
   

        $excp['fbuilder'][$this->_primkey]['att'] = ' disabled ';
        $excp['fbuilder'][$this->_primkey]['def'] = ' primkey ';
        $excp['fbuilder'][$this->_primkey]['label'] = ' Uniqe Key ';

        if(isset($excp['fld-theme-class'])){
            $flds = $s_frm->get_fields();
            foreach($flds as $fl){
                if(!isset($excp['fbuilder'][$fl]['class']) || empty($excp['fbuilder'][$fl]['class']))
                    $excp['fbuilder'][$fl]['class'] = $excp['fld-theme-class'];
            }
        }

        if(isset($excp['submit']))
            $fbtn = $excp['submit'];
        else
            $fbtn = '<button type="submit" class="btn btn-info">Submit Form</button>';
        
        if(isset($excp['fld-theme']))
            $fld_tem = $excp['fld-theme'];
        else
            $fld_tem = '';
        if(isset($excp['bfr-form']))
            $bf_head = $excp['bfr-form'];
        else
            $bf_head = '';
        if(isset($excp['afr-form']))
            $af_head = $excp['afr-form'];
        else
            $af_head = '';
        
        $form_print->set_fld_option($excp['fbuilder']);
        $form_print->set_submit($fbtn);
        
        $form_print->set_fld_theme($fld_tem);

        $form_print->set_htmls('', $bf_head, $af_head, '');
        $form_exported = $form_print->get();
        if(isset($excp['theme'])){
            $form_exported = str_ireplace('{::FORM}', $form_exported, $excp['theme']);
        }
        return $form_exported;
         
  }  
    
    
function add_fpfx($value){
    if(is_array($value)){
        $vls=[];
        foreach($value as $val){
            $vls[]= $this->add_fpfx($val);
        }
        return $vls;
    }else
       return ($this->flds_pfx.$this->rm_fpfx($value));
    
}
function rm_fpfx($fld){
           return (str_replace($this->flds_pfx, '', $fld));
}


    function pr_value($value, $fld){
        if(isset($this->_Excp['func4value'][$this->rm_fpfx($fld)]))
            return call_user_func($this->_Excp['func4value'][$this->rm_fpfx($fld)], $value);
        else
            return $value;
    }

    function set_message($value){
        set_message($value);
        $this->_message = $value;
    }

    function get_message(){
        $ret = $this->_message;
        $this->_message = '';
        return $this->_message;
    }

    function get_fields($tbl = ''){
        if($tbl == '')
            $tbl = $this->tbl_c;
        global $dbase;
        

        $prx = $this->tbl_pfx;
        $flds = $this->flds;
           
            $excp = $this->_Excp;
          //  print_r($excp);
                if($flds=='option,value' OR $flds=='imp_option,imp_value' OR $flds=='*')
                $flds='';
             //echo $flds;
        if(isset($excp['query'])){
            $fields = $dbase->fetch_field_q($this->query_builder());
        }elseif(!empty($flds)  && (!isset($excp['query']))){
            //echo 'here1 ';
           // $flds_a = $excp['flds'];
           // if(!empty($flds)){
               $fields = explode(',', ($flds));  //echo 'here';
           // }else{
               //   $fields = $dbase->fetch_field($prx . $tbl);
          // }
        }else{
            $fields = $dbase->fetch_field($prx . $tbl);
        }
        $rfdls = array();
        foreach($fields as $fld)
            $rfdls[] = str_ireplace($this->flds_pfx, '', $fld);
        return $rfdls;
        print_r( $rfdls);
    }

    function get_fields4db($tbl = ''){
        $flds = $this->get_fields();
        $exp = array();
        foreach($flds as $key => $fld){
            if(!$this->is_sepi($fld))
                $exp[] = $this->flds_pfx . $this->rm_fpfx(trim($fld));
        }
        return implode(',', $exp);
    }

    function query_builder(){

        $excp = $this->_Excp;

        if(isset($excp['query']) && !empty($excp['query'])){
            $result = $excp['query'];
        }elseif(!isset($excp['query']) && (isset($excp['flds']))){
            $flds_a = $excp['flds'];
            if($flds_a == '' || $flds_a == '*' || !$flds_a){
                $fflds = '*';
            }else{

                $flds = explode(',', $flds_a);
                $fflds = '';
                $xcom =false;
                 $fldsx = array();
                foreach($flds as $fld){
                    
                    $fld = str_ireplace($this->flds_pfx, '', $fld);
                   
                   
                     if(!$this->is_sepi($fld))
                        $fldsx[] = $this->flds_pfx .$fld;
//                           $com = ($flds[0] == $fld ? '' : '');
////                         $com = '';
//                         $fx = '';
//                        
//                       
//                     }else{
//                         $fx =$this->flds_pfx . $fld;
//                         
//                         if($flds[0] == $fld){
//                            $com =  '' ;
//                         }else{
//                              if($this->is_sepi($flds[0]))
//                                $com = '';
//                              else
//                                $com = ', ';
//                           
//                         }
//                     }
                     
//                     if($xcom)
//                        $com='';
//                    else 
//                       $com = ($flds[0] == $fld ? '' : ', ');
                   
                     
                }
                 $fflds = implode(',', $fldsx);// $this->flds_pfx . $fld;
            }
            $result = "SELECT " . $fflds . " FROM " . $this->tbl_pfx . $this->tbl_c;
        }else{
// if(is_get('edit') & is_get('value') && !is_post('def_edit')){
            $result = "select * FROM " . $this->tbl_pfx . $this->tbl_c;
// }
        }


        if(isset($excp['join']) && !empty($excp['join'])){
            $join = $excp['join'];
        }else
            $join = '';

        if(isset($excp['where']) && !empty($excp['where'])){
            if(is_array($excp['where'])){
                $wr = ' WHERE ';
                $total = count($excp['where']);
                $i = 0;

                foreach($excp['where'] as $fld => $vlu){
                    $i++;
                    $wr .=$fld . '=\'' . $vlu . '\'';
                    if($total != $i)
                        $wr .= ' AND ';
                }
            }else{
                $wr = " " . trim($excp['where']);
            }
        }else{
            if(is_get('action') == 'edit' && is_get('value'))
                $wr = " WHERE " . $this->flds_pfx . $this->_primkey . "='" . is_get('value') . "'";
            else
                $wr = '';
        }
        return $result . $join . $wr;

//          $order=" ORDER BY {$fpx}id DESC";
//                    $max_num = 50;
//                    $limit = " LIMIT {$max_num}";
//                    $main_query ="SELECT * FROM ".$tpx.$tbl;
//                    $where = "";
//                    
//                    $main_query .$where.$order.$limit
    }

//    function get_page($pg){
//        if(isset($this->_pagelist[$pg]['name'])) 
//            return $this->_pagelist[$pg]['name'];
//        else
//            return false;
//    }


   

    

    function get_label($fld){

        $fld = $this->rm_fpfx($fld);
        $a_fld = $this->flds_pfx . $fld;
        $excp = $this->_Excp;
       
        if(isset($this->_Excp['fld_label'][$fld])){
                return $this->_Excp['fld_label'][$fld];
        }elseif(isset($this->_Excp['fld_label'][$a_fld])){
                return $this->_Excp['fld_label'][$a_fld];
    
        }elseif(isset($excp['fbuilder'][$fld]['label'])){
            return $excp['fbuilder'][$fld]['label'];
        }elseif(isset($excp['fbuilder'][$a_fld]['label'])){
            return $excp['fbuilder'][$a_fld]['label'];
        }else
            return ucfirst($fld);
        
    }
  

    function get_frm($excp=0){
        $ftbl = $this->tbl_pfx . $this->tbl_c;
        global $dbase;
// $fdl = get_fields();
        $hasval = FALSE;
        $action = is_get('value');
        if(is_get('value')){
            $hasval = true;
//$fdl = implode(', ',$this->get_fields());
            $query = $this->query_builder();
         // $post =  $this->srecord_builder($query);
           $post = $dbase->fetch_assoc($query,true);
        }

        $msg = $this->_message;
        if($excp==0)
            $excp = $this->_Excp;

        if(isset($excp['fld-theme']))
            $fld_tem = $excp['fld-theme'];
        else
            $fld_tem = '';

        if(isset($excp['bfr-form']))
            $bf_head = $excp['bfr-form'];
        else
            $bf_head = '';

        if(isset($excp['afr-form']))
            $af_head = $excp['afr-form'];
        else
            $af_head = '';


        if(isset($excp['submit']))
            $fbtn = $excp['submit'];
        else
            $fbtn = '<button type="submit" class="btn btn-info">Submit Form</button>';


        if(isset($excp['title']))
            $title = $excp['title'];
        else
            $title = '&nbsp;&nbsp ' . ucfirst(is_get('action')) . ' Post to ' . ucfirst($this->tbl_c);


        $form_print = new oy_form('POST', $this->get_link(), 'id="add_' . $this->tbl_c . '"');
//  print_r($this->get_fields());
        $form_print->set_flds($this->get_fields());
        $form_print->set_prfx($this->flds_pfx);
        if($hasval){
            
          //  global $post;
            $form_print->set_values($post);
//print_r($post);
        }

        $excp['fbuilder'][$this->_primkey]['att'] = ' disabled ';
        $excp['fbuilder'][$this->_primkey]['def'] = ' primkey ';
        $excp['fbuilder'][$this->_primkey]['label'] = ' Uniqe Key ';
        
        
        
         $excp['fbuilder']['uid']['att'] = ' disabled ';
        $excp['fbuilder']['uid']['def'] = user_username();
        $excp['fbuilder']['uid']['label'] = ' Author ';

        
        $date = new DateTime();
        $time =  $date->format('Y-m-d H:i:s');
         $excp['fbuilder']['time']['att'] = ' disabled ';
        $excp['fbuilder']['time']['def'] =$time;
        $excp['fbuilder']['time']['label'] = ' Post Time ';

        $arr = array(0=>'Draft',1=>'Published', 100=>'Deleted');
         $excp['fbuilder']['status']['type'] = 'select';
        $excp['fbuilder']['status']['options'] = $arr;
        $excp['fbuilder']['status']['label'] = ' Post Status ';

        
        if(isset($excp['fld-theme-class'])){
            $flds = $this->get_fields();
            foreach($flds as $fl){
                if(!$this->is_sepi($fl)){
                    if(!isset($excp['fbuilder'][$fl]['class']) || empty($excp['fbuilder'][$fl]['class']))
                        $excp['fbuilder'][$fl]['class'] = $excp['fld-theme-class'];
                    if(isset($excp['fld_label'][$fl]))
                        $excp['fbuilder'][$fl]['label'] = $excp['fld_label'][$fl];
                }
            }
        }
          
  //  $form_print->th_end = '</table>';
//if(isset($excp['fbuilder']))
        
        unset($excp['fld_label']);
        $form_print->set_fld_option($excp['fbuilder']);
        $form_print->set_submit($fbtn);
        $form_print->set_fld_theme($fld_tem);
//$form_print->set_button($fld_tem);
        
        if(isset($this->fld_sep)){
            $form_print->set_septheme($excp['fld_sep']);//['fld_sep'] = $this->fld_sep; 
        }
        $form_print->set_htmls('', $bf_head, $af_head, '');
         
        $print_x = $form_print->get();


        $print_x = str_ireplace('::title', $title, $print_x);
        $print_x = str_ireplace('::submit-btn', $fbtn, $print_x);
        $print_x = str_ireplace('::error', $msg, $print_x);
        $print_x = str_ireplace('value=""', '', $print_x);
        return $print_x;
    }

    /*
      function form_builder(){

      // global $post;
      // $post = $posts[0];
      $excp = $this->_Excp;
      $print_x = '';
      //      if(isset($excp['fbuilder'])){
      //
      //          $x = $excp['fbuilder'];
      //
      //            foreach($x as $fdl) {
      //                if(!isset($fdl['name']))
      //                    $fdl['name'] = $this->flds_pfx.array_search($fdl, $x); //key($x);
      //
      //                 if(!isset($fdl['label']))
      //                    $fdl['label'] = $fdl['name'];
      //           // $print_x .=  $this->input_builder($fdl);
      //
      //          $print_x .='<tr>';
      //          $print_x .='<td class="w300">'.  $fdl['label'].': </td><td>'.$this->input_builder($fdl).' </td></tr>';
      //           $print_x .='</tr>';
      //
      //
      //            }
      //
      //      }else{
      $fdls = $this->get_fields();
      //          $xprt_feild = $this->make_form($fdls,$excp['fbuilder']);


      foreach($fdls as $fdl) {

      $print_x .='<tr>';
      if(isset($excp['fbuilder'][$fdl])){
      $fdlx = $fdl;
      $fdl = $excp['fbuilder'][$fdl];
      if(!isset($fdl['name']))
      $fdl['name'] = $this->flds_pfx.$fdlx; //key($x);

      if(!isset($fdl['label']))
      $fdl['label'] = $fdl['name'];

      $print_x .='<td class="w300">'.  $fdl['label'].': </td><td>'.$this->input_builder($fdl).' </td></tr>';

      }else{

      $hasval = false;
      $cvalue = ucfirst(rm_fpfx($fdl));
      $def = (($hasval) ? 'value="'.$post[$this->flds_pfx.$fdl].'"' : 'not-edit' );
      $dis = (($this->flds_pfx.$fdl==$this->flds_pfx.$this->_primkey) ? ' disabled=disabled ' : '');

      $print_x .='<td class="w300">'.  $cvalue.': </td><td><input '.$dis.$def.' type="text" id="'.$this->flds_pfx.$fdl.'" name="'.$this->flds_pfx.$fdl.'"   placeholder="Please Enter '.$fdl.'" /> </td></tr>';

      }
      $print_x .='</tr>';
      }
      //}

      return $print_x;

      }



      function input_builder($arr){
      //$name = key($arr); echo $name;
      // echo $arr['name'];
      if(isset($arr['name'])){


      //$name = $arr['name'];
      //    $label = (isset($arr['label']) ? $arr['label'] : '');
      $type = (isset($arr['type']) ? $arr['type'] : 'text');
      //    $def = (isset($arr['def']) ? $arr['def'] : '');
      //    //$options = $arr['options'];
      //    $att = (isset($arr['att']) ? $arr['att'] : '');
      //    //$label = $arr['label'];
      //    $id = (isset($arr['id']) ? $arr['id'] : '');
      //    $class = (isset($arr['class']) ? $arr['calss'] : '');
      //    $ph = (isset($arr['ph']) ? $arr['ph'] : '');
      //
      //

      if($type=='select')
      $export = $this->gen_select($arr);
      else
      $export = $this->gen_input($arr);


      return $export;

      }


      }

      function gen_opt($arr){
      $ex ='';
      if(is_array($arr))
      foreach ($arr as $val => $op)
      $ex .='<option value="'.$val.'">'.$op.'</option>';
      else
      $ex = '<option>No Values</option>';

      return $ex;
      }


      function gen_select($arr){
      $att ='';
      if(isset($arr['type']))
      $opts = $this->gen_opt($arr['options']);
      else
      $opts .='<option>No Values</option>';

      if(isset($arr['name']))
      $att .=' name="'.$arr['name'].'" ';

      // if(isset($arr['ph']))
      //  $att .=' placeholder="'.$arr['ph'].'" ';

      if(isset($arr['id']))
      $att .=' id="'.$arr['id'].'" ';
      else
      $att .=' id="'.$arr['name'].'" ';
      if(isset($arr['att']))
      $att .=$arr['att'];
      if(isset($arr['class']))
      $att .=' calss="'.$arr['class'].'" ';

      if(isset($arr['def']))
      $oval .=' value="'.$arr['def'].'" ';



      $text = '<select '.$att.' >'.$opts.'</select>';
      return $text;


      }
      function gen_input($arr){
      $att='';

      if(isset($arr['type']))
      $att .=' type="'.$arr['type'].'" ';
      else
      $att .=' type="text" ';

      if(isset($arr['name']))
      $att .=' name="'.$arr['name'].'" ';

      if(isset($arr['ph']))
      $att .=' placeholder="'.$arr['ph'].'" ';

      if(isset($arr['id']))
      $att .=' id="'.$arr['id'].'" ';
      else
      $att .=' id="'.$arr['name'].'" ';
      if(isset($arr['att']))
      $att .=$arr['att'];
      if(isset($arr['class']))
      $att .=' calss="'.$arr['class'].'" ';

      if(isset($arr['def']))
      $att .=' value="'.$arr['def'].'" ';

      $text = '<input '.$att.' />';
      return $text;
      }

     */

//    function srecord_builder($query){
//
//
////
////        unset($post);
//        global $dbase;
////        $post = null;
////
////        global $posts, $post_count, $post_index;
////        $posts = array();
//
//// $maxtor = $dbase->query($this->query_builder());
//
//       
//       
//        return $post;
//    }

    function get_link(){
        if(is_get('action') && is_get('value'))
            return HOME . '?tbl=' . $this->tbl_c . '&action=' . is_get('action') . '&value=' . is_get('value');
        elseif(is_get('action') && !is_get('value'))
            return HOME . '?tbl=' . $this->tbl_c . '&action=' . is_get('action');
        else
            return HOME . '?tbl=' . $this->tbl_c;
    }

}
?>

