<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
func_include('encryptor');

//
$text = "Hello Encryption World!!!";
////$cipherAlphabet = "ih2k1qgvxf6ol3ua4p90wm5tzecjdbsnri78";
////$plainAlphabet = "abcdefghijklmnopqrstuvwxyz1234567890~!@#%^&*()_+=-|< ";
////$length = strlen($plainAlphabet);
////$cipherAlphabet = substr(str_shuffle($plainAlphabet), 0, $length);
//$cipherText;
//$plainText;
//
$encrypted = do_encrypt($text) ;
$decrypted = do_decrypt($encrypted) ;
echo '<b>Text</b>: '.$text .' <br/> ';
echo '<b>Encrepted</b>: '.$encrypted .' <br/> ';
echo '<b>Decrepted</b>: '.$decrypted .' <br/> ';
//echo '<hr/>';
//$encrypted = enc_str($text) ;
//$decrypted = dec_str($encrypted) ;
//echo '<b>Text</b>: '.$text .' <br/> ';
//echo '<b>Encrepted</b>: '.$encrypted .' <br/> ';
//echo '<b>Decrepted</b>: '.$decrypted .' <br/> ';
//echo '<hr/>';
//
//

?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

    <head>
        <meta charset="utf-8" />
        <title><?php echo get_pgtitle(); ?></title>

        <?php load_css(); ?> <link rel="stylesheet" href="<?php theme_path() ?>/theme/style.css" />
        
        
    </head>
    <body style="text-align: left; direction: ltr;">


<form action="<?php echo HOME.'?pg=test' ?>" method="POST">
    <textarea style="width:100%; height: 200px" name="plantext"><?php if(is_post('entext')) { echo do_decrypt(is_post('entext')) ; } ?></textarea>
     <input type="submit" value="Encrypt">
  
</form>

<hr/>
<?php if(is_post('plantext')) { echo do_encrypt(is_post('plantext')).'<hr/>' ; } ?>
<form action="<?php echo HOME.'?pg=test' ?>" method="POST">
    <textarea style="width:100%; height: 200px" name="entext"><?php if(is_post('plantext')) { echo do_encrypt(is_post('plantext')); } ?></textarea>
    
    <input type="submit" value="Decrypt"/>
</form>

        
    </body>
</html>