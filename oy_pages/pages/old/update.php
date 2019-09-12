<?php
ini_set('max_execution_time',60);
//Check For An Update








?>



<?php get_header(); ?>
<div class="content-box">
      <div  class="sidex col-md-5 Pull-left">

<div class="panel panel-default" >
    <div class="panel-heading "><h3> Change Log:</h3></div>
    <div class="panel-body ">  

      
       
       
       sfsdfs
       d
       fs
       d
       fs
       df
       s
       df


</div></div>
    
   


</div>
    <div class="sidex col-md-7">
        
      <div class="panel panel-default" >
    <div class="panel-heading "><h3><?php e_lbl('update') ?></h3></div>
    <div class="panel-body ">     
        
 <?php
 
 $updated=false;
$currentURL = RHOME;
$curentVer = get_sitever();
echo '<p class="text-danger">'.g_lbl('current,version').': v'.$curentVer.'</p>';
$getVersions = file_get_contents('http://update.ooyta.com/qatra/ver.php?id=18884&ver='.$curentVer);

if ($getVersions != '')
{
	
    
        
	echo '<p class="text-warning">'.g_lbl('readreleaselist').'<span class="text-success">('.g_lbl('done').')</span></p>';
	$versionList = explode("\n", $getVersions);
        
	foreach ($versionList as $aV)
	{
                
                
           // $aV = trim($aV);
            $aVs = explode("*", trim($aV));
            $aV = $aVs[0];
            $link = $aVs[1];
//               echo 'ver: '.$aV.'<br/>';
//            echo 'link:'.$link.'<br/>';
		if ( $aV > get_sitever()) {
			echo '<p>'.g_lbl('newupdatefound').': v'.$aV.'</p>';
                        set_setting('update', 1);
			$found = true;
			
			//Download The File If We Do Not Have It
			if ( !is_file(  $currentURL.DIRECTORY_SEPARATOR.'UPDATES'.DIRECTORY_SEPARATOR.$aV.'.zip' )) {
				
				$newUpdate = file_get_contents($link);
                               // echo $link.'<br/>';
                               // echo $newUpdate;
                                if($newUpdate)
                                    echo '<p class="text-success">'.g_lbl('downloadingupdate').'...<span class="text-success">('.g_lbl('done').')</span></p>';
                                else
                                   echo '<p class="text-success">'.g_lbl('cannotdownload').'...<span class="text-success">('.g_lbl('error').')</span></p>';
				if ( !is_dir( $currentURL.DIRECTORY_SEPARATOR.'UPDATES'.DIRECTORY_SEPARATOR ) ) mkdir ( $currentURL.DIRECTORY_SEPARATOR.'UPDATES'.DIRECTORY_SEPARATOR );
				$dlHandler = fopen($currentURL.DIRECTORY_SEPARATOR.'UPDATES'.DIRECTORY_SEPARATOR.$aV.'.zip', 'w');
				if ( !fwrite($dlHandler, $newUpdate) ) { echo '<p class="text-warning">'.g_lbl('cannosave').'</p>'; break; ; }
				fclose($dlHandler);
				echo '<p class="text-success">'.g_lbl('updatedownloaded').'</p>';
			} else echo '<p>'.g_lbl('aleadydownloaded').'</p>';
                        
                        
			if((is_get('doUpdate'))){
		
				//Open The File And Do Stuff
				$zipHandle = zip_open($currentURL.DIRECTORY_SEPARATOR.'UPDATES'.DIRECTORY_SEPARATOR.$aV.'.zip');
				echo '<ul class="well text-left">';
				while ($aF = zip_read($zipHandle) ) 
				{
					$thisFileName = zip_entry_name($aF);
					$thisFileDir = dirname($thisFileName);
					
					//Continue if its not a file
					if ( substr($thisFileName,-1,1) == '/') continue;
					
	
					//Make the directory if we need to...
					if ( !is_dir ( $currentURL.'/'.$thisFileDir ) )
					{
						 mkdir ( $currentURL.'/'.$thisFileDir );
						 echo 'Created Directory '.$thisFileDir.'<br/>';
					}
					
					//Overwrite the file
					if ( !is_dir($currentURL.'/'.$thisFileName) ) {
						echo ''.$thisFileName.'...........';
						$contents = zip_entry_read($aF, zip_entry_filesize($aF));
						$contents = str_replace("\r\n", "\n", $contents);
						$updateThis = '';
						
						//If we need to run commands, then do it.
						if ( $thisFileName == 'upgrade.php' )
						{
							$upgradeExec = fopen ('upgrade.php','w');
							fwrite($upgradeExec, $contents);
							fclose($upgradeExec);
							include ('upgrade.php');
							unlink('upgrade.php');
							echo' EXECUTED<br/>';
						}
						else
						{
							$updateThis = fopen($currentURL.'/'.$thisFileName, 'w');
							fwrite($updateThis, $contents);
							fclose($updateThis);
							unset($contents);
							echo' UPDATED<br/>';
						}
					}
				}
				echo '</ul>';
				$updated = TRUE;
                                 set_setting('update', 0);
			
                        }
			else echo '<p>'.g_lbl('updateready').'<br/><a class="btn btn-success" href="'.HOME.'?pg=update&doUpdate=true">&raquo; '.g_lbl('installupdate').' v'.$aV.'</a></p>';
			break;
		}else{
                    $found=false;    
                }
	}
	
	if ($updated == true)
	{
		set_ver($aV);
		echo '<p class="text-success">&raquo; '.g_lbl('updated,to,v').' '.$aV.'</p>';
	}
	else if ($found != true) echo '<p class="text-success">&raquo; '.g_lbl('noupdatefound').'.</p>';

	
}
else echo '<p class="text-danger">'.g_lbl('cannotreadupdates').'</p>';
 
 ?>


</div>
    
    
    
      </div></div>
 
 

</div>
    
    </div>
<?php get_footer() ?>