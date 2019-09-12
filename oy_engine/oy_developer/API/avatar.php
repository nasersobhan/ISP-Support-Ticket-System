<?php
global $dbase, $update_flag;
$update_flag= false;



if(isset($_GET['action'])){
			$action_x=$_GET['action'];
	if($action_x=='info'){
				
	
	}else{
		
	}


	
	
}elseif(isset($_GET['user'])){
	
		$quer = ''; $h=0; $w=0;
		if(isset($_GET['w']))
                    $w = $_GET['w'];
		if(isset($_GET['h']))
                    $h = $_GET['h'];
		
		if($w or $h)
                    $filex = to_croped(get_user($_GET['user']), $w, $h);
                else
                    $filex = get_user($_GET['user']);//($_GET['user']);
		ob_clean();
		header('Content-type: image/jpeg');
		echo file_get_contents($filex);
}elseif(isset($_GET['info'])){
	
$response = array(
									'state'  => 200,
									'message' => 'Good',
									'result' => HOME.get_user($_GET['info'])
								);					
				ob_clean();
				//header('Content-type: text/json');
				echo json_encode($response);	
}




function get_user($idx){
		global $dbase;
		$id = $idx;//$ac->getUserData_id($idx);
                
                $ac = new oy_user($id);
		if($id){
                return $ac->get_avatar_url();
//				$result = $dbase->fetch_row("SELECT inf_avatar FROM user_info  WHERE inf_aid='".$id."'");
//				if(isset($result['inf_avatar'])){
//					$file_id =  $result['inf_avatar'];	
//					if($file_id=='0')
//						return DEF_AVTAR;
//					else{
//						$xxx = $dbase->fetch_row("SELECT df_url FROM data_files  WHERE df_id='".$file_id."'");
//				
//						$basen = basename($xxx['df_url']);
//						$path = str_replace($basen, '', $xxx['df_url']);
//						$croped = $path.'croped_'.$basen;
//						return $croped;
//					}
	
//			}else{
//				return 'Avatar Not Avilable';
//			}
		
		}else
			return 'User Not Defeind';
}
?>