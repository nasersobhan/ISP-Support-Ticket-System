<h1>DYNAMIC UPDATE SYSTEM</h1>
<?php
ini_set('max_execution_time',60);
//Check For An Update

$currentURL = 'C:\\xampp\\htdocs\\ooyta\\update\\php-auto-updater-1.0\\';
$getVersions = file_get_contents('http://naserlap2/ooyta/update/php-auto-updater-1.0/current-release-versions.php') or die ('ERROR');
if ($getVersions != '')
{
	echo '<p>CURRENT VERSION: '.get_siteInfo('CMS-Version').'</p>';
	echo '<p>Reading Current Releases List</p>';
	$versionList = explode("\n", $getVersions);	
	foreach ($versionList as $aV)
	{
            $aV = trim($aV);
		if ( $aV > get_siteInfo('CMS-Version')) {
			echo '<p>New Update Found: v'.$aV.'</p>';
			$found = true;
			
			//Download The File If We Do Not Have It
			if ( !is_file(  $currentURL.'/UPDATES/MMD-CMS-'.$aV.'.zip' )) {
				echo '<p>Downloading New Update</p>';
				$newUpdate = file_get_contents('http://naserlap2/ooyta/update/php-auto-updater-1.0/MMD-CMS-'.($aV).'.zip');
				if ( !is_dir( $currentURL.'/UPDATES/' ) ) mkdir ( $currentURL.'/UPDATES/' );
				$dlHandler = fopen($currentURL.'/UPDATES/MMD-CMS-'.$aV.'.zip', 'w');
				if ( !fwrite($dlHandler, $newUpdate) ) { echo '<p>Could not save new update. Operation aborted.</p>'; exit(); }
				fclose($dlHandler);
				echo '<p>Update Downloaded And Saved</p>';
			} else echo '<p>Update already downloaded.</p>';	
			
			if ($_GET['doUpdate'] == true) {
				//Open The File And Do Stuff
				$zipHandle = zip_open($currentURL.'/UPDATES/MMD-CMS-'.$aV.'.zip');
				echo '<ul>';
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
						 echo '<li>Created Directory '.$thisFileDir.'</li>';
					}
					
					//Overwrite the file
					if ( !is_dir($currentURL.'/'.$thisFileName) ) {
						echo '<li>'.$thisFileName.'...........';
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
							echo' EXECUTED</li>';
						}
						else
						{
							$updateThis = fopen($currentURL.'/'.$thisFileName, 'w');
							fwrite($updateThis, $contents);
							fclose($updateThis);
							unset($contents);
							echo' UPDATED</li>';
						}
					}
				}
				echo '</ul>';
				$updated = TRUE;
			}
			else echo '<p>Update ready. <a href="?doUpdate=true">&raquo; Install Now?</a></p>';
			break;
		}
	}
	
	if ($updated == true)
	{
		set_setting('site','CMS',$aV);
		echo '<p class="success">&raquo; CMS Updated to v'.$aV.'</p>';
	}
	else if ($found != true) echo '<p>&raquo; No update is available.</p>';

	
}
else echo '<p>Could not find latest realeases.</p>';


function get_siteInfo (){
    return '1.03';
}

function set_setting (){
    return '1.02';
}