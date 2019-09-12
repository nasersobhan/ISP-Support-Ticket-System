<?php



class Sectionx{
    
    public $themes = array();
    public $query = array();
    public $queryt = array();
    public $query_tbl = array();
    public $query_fed = array();
    
    
    
    public function printOut(){
        $action = is_get('action');
        $value = is_get('value');
        $search = is_get('search');
        
        
        if($this->get_queryt($action)=='insert'){
           $result = $dbase->RowInsert(get_query_tbl($action),get_query_fed($action));
                        
                       
        }elseif($this->get_queryt($action)=='update'){
           
        }elseif($this->get_queryt($action)=='delete'){
            
        }elseif($this->get_queryt($action)=='select'){
             post_query($ss_query);
        }
     
        
        
        echo $this->get_theme($action);
        
        
    }
    
    
    
    
}

?>