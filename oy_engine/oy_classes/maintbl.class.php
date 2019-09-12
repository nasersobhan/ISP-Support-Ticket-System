<?php


class oy_table{
   var $_version = "1.0";
   var $_lastupdate = "9/05/2016";
   var $_author = "Naser";
    
//   private $connect = false;
//   private $host = 'localhost';
//   private $database = 'ooyta';
//   private $username = 'sde';
//   private $password = '';
   public $counter = 0;
   public $custom_db = false;
   public $dbase = false;
   public $lang = 'fa';
   public $pfx = 'sob_';
   public $details_tbl = '';
   public $tbl_name = 'sob_categories_oy';
   public $uid = false;
   public $userrank = false;
   
   
   function __construct($set){
       $this->lang =isset($set['lang']) ? $set['lang'] : false ;
       $this->tbl_name =isset($set['table']) ? $set['table'] : 'sob_categories_oy' ;
       $this->details_tbl =isset($set['helper_tbl']) ? $set['helper_tbl'] : 'sob_details_oy' ;
       $this->custom_db =isset($set['customdb']) ? $set['customdb'] : false;;
        $this->uid =isset($set['userid']) ? $set['userid'] : false;;
        $this->userrank =isset($set['userrank']) ? $set['userrank'] : 0;
       $dbase = $set['DBS'];
       
       
       
       if($this->custom_db){
        class_include('db-mssql'); 
        $this->dbase = new oy_db($dbase);
       }else
        $this->dbase = $dbase;
    }
    
    private function get_lang(){
        
    }
    
    public function get_valbyid($id,$fld){
        $tbl = $this->tbl_name;
        $dbase = $this->dbase;
        
       
        $row = $dbase->get_single_row($tbl, 'cat_'.$fld, " cat_id='{$id}' AND cat_status=1");
    if(isset($row['cat_'.$fld]))
        return $row['cat_'.$fld];
    else return false;
    }
    
    function get_slug($title){
       // global $dbase;
        $feild = 'cat_slug';
        $tbl = $this->tbl_name;
        //$slug = trim($slug);
        $dbase = $this->dbase;
       // $slug = preg_replace('/[^A-Za-z0-9\u0600-\u06FF-]+/', '-', ($slug));
     // $slug =   preg_replace('/([^\x{0600}-\x{06FF}A-Za-z0-9+])/u', '-', ($slug));
        //$slug = strtolower($slug);
      $slug = clean_url($title);
        if($dbase->check_duplicate($slug, $tbl, $feild)){
            global $i;
            $slug = str_replace($i, '', $slug);
            $i = ((int) (str_replace('-', '', $i))) + ((int) 1);
            return get_slug($slug . $i, $tbl, $feild);
        }else{
            return $slug;
        }
    }
    public function add_new($array,$allow_duplicats=false){
        //clean feild values
        $dv['cat_name']=$array['name'];
        $dv['cat_content']=$array['body'];
        $dv['cat_uid']=(isset($array['uid']) ? $array['uid'] : $this->uid);
        $dv['cat_type']=(isset($array['type']) ? is_post('type') : '');
        $dv['cat_section']=(isset($array['section']) ? is_post('section') : '');
        $dv['cat_category']=(isset($array['category']) ? is_post('category') : 0);
        $dv['cat_lang']=(isset($array['lang']) ? $array['lang'] : get_lang());
        $dv['cat_status']=(isset($array['status']) ? $array['status'] :1);
        $dv['cat_slug']=(isset($array['slug']) ? $array['slug'] : $this->get_slug($dv['cat_name'])); 
        
        
        
        $tbl = $this->tbl_name;
        $dbase = $this->dbase;
        
        
       //get_slug($dv['cat_name'], $tbl_pfx. 'categories_oy',  'cat_slug');
      //  $array['cat_uid']=(isset($array['cat_uid']) ? $array['cat_uid'] : $this->uid ); //get_slug($dv['cat_name'], $tbl_pfx. 'categories_oy',  'cat_slug');
        
        if($dbase->RowInsert($tbl,$dv))
            return $dbase->insert_id();
        else
            return false;
        
    }
        public function del_detial($did){
        $tbl = $this->details_tbl;
        $dbase = $this->dbase;
        if($dbase->RowDelete($tbl,' det_id='.$did))
            return true;
        else
            return false;
    }
    
    
    public function set_detial_status($id,$value=0){
         $tbl = $this->details_tbl;
        $dbase = $this->dbase;
        if($dbase->RowUpdate($tbl,array('det_status'=>$value),' det_id='.$did))
            return true;
        else
            return false; 
    }
    
    
    
    public function add_detial($db){
        $tbl = $this->details_tbl;
        $dbase = $this->dbase;
        if($dbase->RowInsert($tbl,$db))
            return $dbase->insert_id();
        else
            return false;
    }
     public function add_detials(){
        
    }
    public function get_name($id,$lang=false){
        
        $dbase = $this->dbase;
        if(!$lang)
        $lang = $this->lang;
         if(!empty($id) AND is_numeric($id)){
        
//        if($lang){
//            $lang = get_lang();
//            $id = get_actualID($id,$lang);
//        }
//            
        
        $tbl = TBL_PIX.'categories_oy';
        $query = "SELECT cat_name FROM {$tbl} WHERE cat_id = {$id}";
        $row = $dbase->fetch_assoc($query,true);
        return $row['cat_name'];
        }else{
            return $id;
        }
    }
}