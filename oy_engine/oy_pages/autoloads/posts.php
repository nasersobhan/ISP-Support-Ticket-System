<?php
global $dbase,$excp,$action;
$tbl = 'posts';
$_GET['tbl'] = $tbl;
$tbl = TBL_PIX.'posts';
//$SQL_TBL = "
//CREATE TABLE IF NOT EXISTS `{$tbl}` (
//  `cat_id` int(11) NOT NULL,
//  `cat_name` varchar(150) NOT NULL,
//  `cat_slug` varchar(150) NOT NULL,
//  `cat_parent` int(11) NOT NULL DEFAULT '0',
//  `cat_type` varchar(30) NOT NULL DEFAULT 'jobs',
//  `cat_uid` int(11) NOT NULL DEFAULT '0',
//  `cat_order` int(11) NOT NULL DEFAULT '0'
//) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
//$SQL_TBL1 = "ALTER TABLE `{$tbl}`
//    ADD PRIMARY KEY (`cat_id`),  ADD UNIQUE(`cat_slug`);";
//$SQL_TBL2 = "ALTER TABLE `{$tbl}`
//    MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;";
//
//
//
//$x = get_setting('cate_built');
//
//if(!$x){
//    if(!$dbase->table_exist($tbl)){
//         $dbase->query($SQL_TBL);
//         $dbase->query($SQL_TBL1);
//         $dbase->query($SQL_TBL2);
//         echo 'tablenot exist';
//     
//    }
//    echo 'Table Exist but not value';
//     set_setting('cate_built', 1);
//}
//


$excp['title']='Website Posts';

 $action = (is_get('action') ? is_get('action')  : 'list');

if($action=='add' || $action=='edit'){
    
    
    
    load_jsplug('select2');
load_jsplug('kendo');
load_jsplug('form'); load_jsplug('boot-select');
     $excp['submit'] = '<div class="form-group"><button type="submit" class="btn btn-info">Save</button></div>'; //Change Value (label)
    $excp['flds'] = 'title,category,content,tags'; 
    $excp['fbuilder']['title'] = array('label' => 'Post Title', 'type' => 'text','att' => ' required ');
     $excp['fbuilder']['content'] = array('label' => 'Post Content', 'type' => 'area','att' => ' required ','class'=>'editor');
    if(is_post('oy_form_validate')){
        $_POST['pos_slug'] = get_slug( $_POST['pos_title'], $tbl, 'pos_slug');
        
    }
    
//    $cats = $dbase->tbl2array($tbl, 'cat_id', 'cat_name',  " ");
   // $imm = get_category2arr('ALL') ;
   // $cats[0] = 'No Parent';

 //   $excp['fbuilder']['parent'] =  array('label' => 'Parent Value','type' => 'select',  'options' => $cats, 'def' => 0,'class'=>'form-control select3', 'att' => ' data-live-search="true"  title="Please select a parent ..." ');
     $excp['fbuilder']['uid'] = array('type' => 'hidden',  'def' => user_uid());
     $cats = $dbase->tbl2array(TBL_PIX . 'categories_oy', 'cat_id', 'cat_name', ' WHERE cat_type = \'posts\' AND ((cat_uid=0) OR (cat_uid= ' . user_uid() . '))');
   // $cats = $dbase->tbl2array($tbl, 'cat_type', 'cat_type',  " ");
    $excp['fbuilder']['category'] =  array('label' => 'Category','type' => 'select','options'=>$cats,'class'=>'  form-control select3', 'att' => ' data-live-search="true"  title="Please select a type ..." ');
   
    
$con = " $('.select3').selectpicker(); ";
addlinejs($con);
    
    
    
}else{

    if( $action=='view'){
        $excp['flds'] = '*'; 
        $excp['func4value']['parent'] = 'get_cate_name';
        
        
    }else
$excp['flds'] = 'title,category'; 

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
    $excp['search']['theme'] = get_template('tables'.DIRECTORY_SEPARATOR.'searchbox',$ax);

} 
 $excp['fld_label']['option'] = 'Variable Name';
$excp['fld_label']['value'] = 'Value';



?>