<?php
global $dbase,$excp,$action;

 
//$excp['title'] = 'Record List';
 $excp['fld_label']['id'] = 'ID';
$excp['fld_label']['uid'] = 'User Name ID';
 $excp['fld_label']['Time'] = 'Inserted Date';
//$excp['fld_label']['value'] = 'Value';

 $action = (is_get('action') ? is_get('action')  : 'list');

if($action=='add' || $action=='edit'){
    
    
       load_jsplug('pickaday');
   load_jsplug('select2');
   load_jsplug('widearea');
   load_jsplug('form');   
     //$excp['submit'] = '<div class="form-group"><button type="submit" class="btn btn-info">Save</button></div>'; //Change Value (label)
    //$excp['flds'] = 'option,value'; 
    $excp['fbuilder']['option'] = array('label' => 'Variable Name', 'type' => 'text','class'=>'form-control', 'att' => ' required ');
    $excp['fbuilder']['value'] = array('label' => 'Value', 'type' => 'text','class'=>'form-control', 'att' => ' required ');
    $excp['fld-theme'] = '<tr><td>::label</td><td>::input</td></tr>';

$excp['fld_sep'] = '<tr  class="tbl_head"><td  colspan="2">::TEXT</td></tr><tr>';
$excp['bfr-form'] = '<table class="table jobs_TBL">';
$excp['afr-form'] = '</table>';
$excp['submit'] = '<tr><td  colspan="2"><button type="submit" class="btn btn-info">Submit Form</button></td></tr><tr>';
    
    if($action=='add')
        $excp['title'] = 'Insert a New';
    else
        $excp['title'] = 'Edit';
    
    
}elseif($action=='list')   {
     
 $excp['search']['form-class'] = 'navbar-form navbar-left row';
    $excp['search']['flds'] = 'text';
    $excp['search']['fld-theme'] = '<div class="form-group">::input</div>';
    $excp['search']['fld-theme-class'] = 'form-control input-sm m-a-2';
    $excp['search']['submit'] = '<button type="submit" class="btn btn-sm">Search</button>';
    
    $ax['::LINK_PUBLISHED']=get_tbllink(is_get('tbl')).'&status=act';
    $ax['::LINK_SUS']=get_tbllink(is_get('tbl')).'&status=sus';
    $ax['::LINK_DEL']=get_tbllink(is_get('tbl')).'&status=del';
    $ax['::LINK_ADDNEW']=get_tbllink(is_get('tbl'), 'add');
    $ax['::LINK_ALL']=get_tbllink(is_get('tbl')).'&list=all';
    $ax['::LINK_MY']=get_tbllink(is_get('tbl'));
    $excp['search']['theme'] = get_template('tables\searchbox',$ax);
    
}else{
 
  
    
//$excp['flds'] = 'id,option,value';  

} 
 $excp['fld_label']['option'] = 'Variable Name';
$excp['fld_label']['value'] = 'Value';
page_include("autoloads/".is_get('tbl'));

?>