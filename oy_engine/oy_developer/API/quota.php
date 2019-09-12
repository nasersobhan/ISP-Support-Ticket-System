<?php
global $dbase;
 $pref = TBL_PIX;

    
// 
//        if(is_get('type')){
//            $type = is_get('type');
//            $wherepart = " AND cat_type='{$type}' ";
//        }else{
//        $wherepart ='';}
   $type = (is_get('type') ? is_get('type') : 23563);     
$sql = "SELECT quo_text, quo_author FROM {$pref}quotes WHERE quo_type='{$type}' ORDER BY RAND() LIMIT 1";
    /** @var $result MySQLi_result */

    $result = $dbase->query($sql);

           
            while($row = $result->fetch_array())
            {
               
               $auo =($row['quo_text']); //utf8_encode(($row['cat_name']));
$aut =($row['quo_author']);
            }
if(is_get('script')){       
            $xtexts = "document.write('<style> quota { color: #fff; background:#000; position :fixed; bottom:0; padding:10px:width:100% } </style>')";
$xtext = '<quota>'.$auo.'</quota>';
ob_clean();
header('content-type: text/javascript;charset=UTF-8');
 mb_internal_encoding('UTF-8'); 
mb_http_output('UTF-8'); 
mb_http_input('UTF-8'); 
mb_regex_encoding('UTF-8'); 
    ob_start("mb_output_handler");
//echo 'document.write("'.($xtext).'");';
echo 'document.write (\'<quota><iframe scrolling=no width=100% height=20 border=0 frameborder=0 allowtransparency="true" src="http://naserlap/ooytav1/html/?API=quota" ></iframe></div>\');';
exit();
}else{?>
    <html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
        <body style="margin:0px ">
            <div style="background-color:rgba(0,0,0,0.8) ; font:8pt tahoma; height:20px; color: #ccc; font-weight: bold;padding:5px; text-align:center;margin:0; direction: rtl ">
            
               <?php echo $auo; ?>
                  
                 </div></body></html>

<?php } ?>