<?php


$language['{user}'] = 'Naser sobhan';
$body = get_template('emails/signup', $language);

//send_mail('msobhan@irdglobal.org','Welcome to Ooyta',$body);
$con=mysqli_connect("localhost","ooyta_helper","*c(+oQxdIq5w","ooyta_asbsixni_jobsaf");
//$con_export=mysqli_connect("localhost","root","","jobportal");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}




//<h2 class="job-title">Position Title: Supervisor –Indirect Sales</h2>

function get_title( $xml ) {
        $tag_regex = '/Position[^>]*Title:(.*?)<\\/h2>/si';

        preg_match($tag_regex,
        $xml,
        $matches);
        return $matches[1];
    }
    
    
  ///<p class="date_posted">Date Posted: 07 Apr, 2016 &nbsp; Expire Date: 20 Apr, 2016</p>  
    
    
    function get_cdate( $xml ) {
        $tag_regex = '/<p[^>]*class="date_posted">[^>]*Expire Date:(.*?)<\\/p>/si';

        preg_match($tag_regex,
        $xml,
        $matches);
        return $matches[1];
    }
    
    
    
    ///<h3 class="job-description">Job Requirements:</h3>
    
    
    function get_qualify( $xml ) {
        $tag_regex = '/<h3[^>]*class="job-description">[^>]*Job Requirements:<\\/h3>(.*?)<\\/div>/si';

        preg_match($tag_regex,
        $xml,
        $matches);
        return $matches[1];
    }
    
     function get_jobdes( $xml,$value ) {
        $tag_regex = '/<h3[^>]*class="job-description">[^>]*'.$value.'<\\/h3>(.*?)<\\/div>/si';

        preg_match($tag_regex,
        $xml,
        $matches);
        return $matches[1];
    }
    
    function get_empabout($xml){
         $tag_regex = '/<h3[^>]*class="job-description">[^>]*About[^>]*<\\/h3>(.*?)<\\/div>/si';

        preg_match($tag_regex,
        $xml,
        $matches);
        return $matches[1];
    }
    	function get_fromtop( $xml,$text ) {
            
            //<th>Category:</th>
            //<td>Telecommunications</td>
        $tag_regex = '/<th>'.$text.'<\\/th>[^>]*<td>(.*?)<\\/td>/si';

        preg_match($tag_regex,
        $xml,
        $matches);
        return $matches[1];
    }
    



	
	
	$result = mysqli_query($con,"SELECT * FROM datafrom_links2 where stat=0 order by id DESC limit 60 ");

while($row = mysqli_fetch_array($result)) {

	   $one = $row['link'];
	   $idxxxx = $row['id'];



$datax['job_category']=  clean_cate(get_fromtop( $row['part1'],'Category:' ));; //c
$datax['job_education']= get_fromtop( $row['part1'],'Education:' );//$education; //c


 $datax['job_title'] = get_title($row['part1']);

$datax['job_provinces']= clean_city(get_fromtop($row['part1'],'Job Location:' ));//exp_place($place); //char to ID
//check for organization
$companyabout = get_empabout( $row['part1']);;

$datax['job_employer']= clean_emp(get_fromtop($row['part1'],'Organization:' ),$companyabout,get_jobdes( $row['part1'],'Submission Email: ' )); 
//$datax['job_location']= $location;

$datax['job_country']= 'AF';
//get_qualify( $xml )
$datax['job_duration']= get_fromtop($row['part1'],'Contract Duration:');;
$datax['job_closingdate']=date('Y-m-d', strtotime(get_cdate( $row['part1'] )));
$datax['job_posts']= get_fromtop($row['part1'],'No. Of Jobs:' );;
$datax['job_type']= get_fromtop($row['part1'],'Employment Type:' );;
$datax['job_duties']= get_jobdes( $row['part1'],'Job Description:' );
$datax['job_qualifications']= get_qualify($row['part1']);
$datax['job_guidline']= get_jobdes( $row['part1'],'Submission Guideline:' );;
$datax['job_experience']= trim(str_ireplace('years','',get_fromtop($row['part1'],'Years of Experience:')));;
//$datax['job_skills']=// get_jobdes( $row['part1'] );

$datax['job_email']= get_jobdes( $row['part1'],'Submission Email: ' );//(isset($email) ? $email : '') ;
$datax['job_code']= get_fromtop($row['part1'],'Vacancy Number:');;

//def
$datax['job_status']= 1;
$datax['job_showemail']= 1;
$datax['job_uid']= 7;
$datax['job_slug']=  get_slug($datax['job_title'], TBL_PIX . 'jobs', 'job_slug');; //get slug


//foreach ($datax as $key => $val){
//    
//    echo '<b>'.$key.'</b>: '.$val.'<br/>';
//    
//}
//print_r($datax);
global $dbase;
$tbl = TBL_PIX.'jobs';

//unset($datax['job_location']);
$dbase->RowInsert($tbl,$datax);
$id = '';


echo $one.': DONE <br/>';

mysqli_query($con,"UPDATE datafrom_links2 SET stat=1 where id={$idxxxx}");
}


mysqli_close($con);








function clean_cate($cate){
    
if(!empty($cate))
    $cate =  get_cate_id_byname($cate,'jobs');
else
  $cate =($cate ? $cate : '14971');

return $cate;
}

function clean_city($place){
   


//$place= str_replace(","," ",$place);


//
//
//$matchFound = preg_match_all(
//                "/\b(" . implode($badWords,"|") . ")\b/i", 
//               $place, 
//                $matches
//              );
//
//if ($matchFound) {
//  $words = array_unique(array_map("StrToLower",$matches[0]));
//  $place =implode('-', $words); //implode('-',($words));
// // echo $newplace.'<br/>';
//
//}else{
//   // $place= str_ireplace(", Afghanistan","",$place);
//    $x = explode(',',$place);
//    $place= $x[0];// cleanup(trim($x[0]));

//} 
$badWords = array("Badakhshan","Badghis","Baghlan","Balkh","Bamian","Daykundi","Farah","Faryab","Ghazni","Ghor","Helmand","Herat","Jowzjan","Kabul","Kandahar","Kapisa","Khost","Kunar","Kunduz","Laghman","Logar","Wardak","Nangarhar","Nimruz","Nuristan","Paktia","Paktika","Panjshir","Parwan","Samangan","Sar-e Pol","Takhar","Oruzgan","Zabul","Jawzjan");
$matches = array();

  foreach ( $badWords as $keyword ) 
  {
    if ( strpos( $place, $keyword ) !== FALSE )
     { $matches[] = $keyword; }
  }
  if(!empty($matches))
        $arr_p = $matches;

  //$arr_p = explode ('-',$place);
    $loc_id = array();
    $i=0;
    foreach($arr_p as $value){
        
        if(!empty($value))
            $loc_id[$i] =  get_cate_id_byname($value,'location');
        else
          $loc_id[$i] =($loc_id[$i] ? $loc_id[$i] : '0');

        $i++;
       //$loc_id[] = get_location_id2($value,282);
    }
    $returnx = implode('-', $loc_id);// implode('-', $loc_id);//implode('-',$loc_id);
    return $returnx;
//return $place;
}



function clean_emp($org ,$about,$email=''){
    global $dbase;

$resultx = $dbase->query("SELECT * FROM sob_pages where pag_title = '".$org."'");
$num = $dbase->num_rows($resultx,false); 
if($num >= 1){
	while($rowx = mysqli_fetch_array($resultx)) {
		$org = $rowx['pag_id'];
		//$emp_email = $rowx['email'];
	}
}else{
    
        $slug_org = get_slug($org, TBL_PIX . 'pages', 'pag_slug');
        //$email= implode('|',extract_emails_from($guid));
	$dbase->query("insert into sob_pages (pag_title, pag_about, pag_slug,pag_uid,pag_category,pag_type, pag_status,pag_email) values ('{$org}','{$about}','{$slug_org}',7,14475,14473,1,'{$email}')");
	$org = $dbase->lastinserted_id();
}
return $org;
}


function clean_date(){
    
}

?>