<?php
global $dbase,$excp,$action,$tbl;
$link = 'access';
$tbl = 'tbl2rank_oy';




$excp['title']='Access System Table';

 $action = (is_get('action') ? is_get('action')  : 'list');

if($action=='add' || $action=='edit'){
    
    
    
    load_jsplug('select2');
load_jsplug('kendo');
load_jsplug('form');
     $excp['submit'] = '<div class="form-group"><button type="submit" class="btn btn-info">Save</button></div>'; //Change Value (label)
    $excp['flds'] = 'name,rank,action,pid'; 
    
    $arr_table = $dbase->list_tables();
    $arr= array();
    foreach ($arr_table as $tblx){
        $arr[tbl_clean($tblx)] = tbl_clean($tblx);
    }
    
    $excp['fbuilder']['name'] = array('label' => 'Table Name', 'type' => 'select','options' => $arr);
    
    $arr_rank = array('99'=>'Super Admins',1 =>'Normal',0=>'Everyone',2=>'2');
      $excp['fbuilder']['rank'] = array('label' => 'user rank', 'type' => 'select','options' => $arr_rank);
    
  $arr_action = array(0=>'Block',1 =>'Add Only',2=>'View/Add',3=>'view/edit/add',4=>'view/add/delete',5=>'Full Access');
  
  $excp['fbuilder']['action'] = array('label' => 'user action', 'type' => 'select','options' => $arr_action);
    
  global $user_arr;

  $arr_user = $dbase->tbl2array($user_arr['TBL'], $user_arr['FPX'].'id', $user_arr['FPX'].'user',  " ");
  $arr_user[0] = 'All';
  $excp['fbuilder']['pid'] = array('label' => 'User ID', 'type' => 'select','options' => $arr_user);
      
      if(is_post('oy_form_validate')){
        //$_POST['cat_slug'] = get_slug( $_POST['cat_name'], $tbl, 'cat_slug');
        
    }
    
    
    
}else{

    if( $action=='view'){
        $excp['flds'] = '*'; 
        $excp['func4value']['parent'] = 'get_cate_name';
        
        
    }else
$excp['flds'] = 'name,action,rank'; 

    $excp['actions'] = true;

    $excp['search']['form-class'] = 'navbar-form navbar-left row';
    $excp['search']['flds'] = 'name,type';
    $excp['search']['fld-theme'] = '<div class="form-group">::input</div>';
    $excp['search']['fld-theme-class'] = 'form-control input-sm m-a-2';
    $excp['search']['submit'] = '<button type="submit" class="btn btn-sm">Search</button>';
    $type = cat_2arr('project_type');
    $type[0] = 'All';
    $excp['search']['fbuilder']['type'] = array('label' => 'Activity Type', 'type' => 'select', 'options' => $type);
    $excp['search']['fbuilder']['name'] = array('label' => 'Activity Type', 'type' => 'text', 'att' => ' style="width:130px;" placeholder="Project Name"');
    //$excp['search']['fbuilder']['pcode'] = array('label' => 'Activity Type', 'type' => 'text', 'att' => ' style="width:130px;" placeholder="Project Code"');
    
    $ax['::LINK_PUBLISHED']=get_tbllink(is_get('tbl')).'&status=act';
    $ax['::LINK_SUS']=get_tbllink(is_get('tbl')).'&status=sus';
    $ax['::LINK_DEL']=get_tbllink(is_get('tbl')).'&status=del';
    $ax['::LINK_ADDNEW']=get_tbllink(is_get('tbl'), 'add');
    $ax['::LINK_ALL']=get_tbllink(is_get('tbl')).'&list=all';
    $ax['::LINK_MY']=get_tbllink(is_get('tbl'));
    $excp['search']['theme'] = get_template('tables\searchbox',$ax);

} 
 $excp['fld_label']['option'] = 'Variable Name';
$excp['fld_label']['value'] = 'Value';

function tbl_clean($tbl){
    $tbl = str_ireplace(TBL_PIX, '', $tbl);
    // $tbl = str_ireplace('_', ' ', $tbl);
     // $tbl = str_ireplace('oy', '', $tbl);
       //$tbl = ucwords($tbl);
return $tbl;
       
}

?>