<?Php 
class oy_user{
	private $userID = 0;
	private $usertbl = 'infouser_oy';
	private $culPri = 'inf_';
	private $tblPri = "";
                
	function __construct($userID){
		$this->userID = $userID;
                $this->tblPri =  TBL_PIX;
		
	}
	function get_info($value){
		global $dbase;
		$result = $dbase->fetch_row("SELECT ".$this->culPri.$value." FROM ".$this->tblPri.$this->usertbl."  WHERE ".$this->culPri."id=".$this->userID);
		return $result[$this->culPri.$value];
		
	}
	
	function get_usernameByID($value){
            
		global $dbase;
		$result = $dbase->fetch_row("SELECT ".$this->culPri."name FROM ".$this->tblPri.$this->usertbl."  WHERE ".$this->culPri."aid=".$value);
		return $result[$this->culPri.'name'];
		
	}
        
        
        function set_lang($lang){
            global $dbase;
            $id = $this->get_uid();
            //"SELECT ".$this->culPri."name FROM ".$this->tblPri.$this->usertbl."  WHERE ".$this->culPri."aid=".$value
            $db[$this->culPri.'lang'] = $lang;
            $tbl = $this->tblPri.$this->usertbl;
            return $dbase->RowUpdate($tbl,$db,"WHERE ".$this->culPri."id={$id}");
            
        }
//	
//	function get_IDByusername($id){
//            
//		global $dbase;
//		$result = $dbase->fetch_row("SELECT ".$this->culPri."aid FROM ".$this->tblPri.$this->usertbl."  WHERE ".$this->culPri."username=".$value);
//		return $result[$this->culPri.'name'];
//		
//	}
	
	
	function get_uid(){
	return $this->userID;	
		
	}
	
	function get_name(){
	return $this->get_info('name');	
		
	}
        function get_lang(){
	return $this->get_info('lang');	
		
	}
        function get_sname(){
	return $this->get_info('sname');	
		
	}
	
	function set_info($option, $value){
		global $dbase;
		$result = $dbase->query("UPDATE ".$this->tblPri.$this->usertbl." SET ".$this->culPri.$option."='".$value."' WHERE ".$this->culPri."id=".$this->userID);
		return $result;
		
	}
	
	function get_avatar_url(){
		global $dbase;
		$id = $this->get_info('avatar');
                $pr = TBL_PIX;
		if($id=='0')
			return DEF_AVTAR;
		else{
//		$result = $dbase->fetch_row("SELECT dat_url FROM ".$pr."datafiles  WHERE dat_id='".$id."'");
//		$basen = basename($result['dat_url']);
//		$path = str_replace($basen, '', $result['dat_url']);
		//$croped = $path.'croped_'.$basen;
		//if (file_exists($croped)) {
    		return get_fileurl($id);
			
		}
		//} else {
    		//return HOME.$result['df_url'];
		//}
		
		//return HOME.$result['df_url'];
		
	}
	
	function get_cover_url(){
		global $dbase;
                   $pr = TBL_PIX;
		$id = $this->get_info('cover');
                if($id=='0')
			return DEF_COVER;
		else{
//		$result = $dbase->fetch_row("SELECT dat_url FROM ".$pr."datafiles  WHERE dat_id='".$id."'");
//		$basen = basename($result['dat_url']);
//		$path = str_replace($basen, '', $result['dat_url']);
		//$croped = $path.'croped_'.$basen;
		//if (file_exists($croped)) {
    		return get_fileurl($id);
                }
		//} else {
    		//return HOME.$result['df_url'];
		//}
		
		//return HOME.$result['df_url'];
		
	}
	
}



?>