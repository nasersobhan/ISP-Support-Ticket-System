<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * source: https://www.programmingalgorithms.com/algorithm/simple-substitution-cipher?lang=PHP
 */


class oy_encryptor{
   // public $mainAlphabete = "abcdefghijklmnopqrstuvwxyz1234567890!@#%&*()_+|}{':?<>ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    public $aZ = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    public $zero2nine = "1234567890";
    public $spchars = "!@#%&*()_+|}{': ?<>";
    
    private $pKey;
    private $simpleKey = "THis@i5the#k3y&*com";
    public function __construct($key,$alph){
        ;
    }
    
    public function GenerateKey($alpha = ''){
        $newAlphabet = $this->get_chars();  
        $length = strlen($newAlphabet);
        $key = (substr(str_shuffle($newAlphabet), 0, $length));
        return $key;
    }
    
    public function set_privatekey($key){
        $this->pKey = $key;
    }


    private function get_chars(){
        return $aZ.$zero2nine.$spchars;
    }
    private function get_pkey(){
        return $this->pKey;
    }
    public function Encrypt($input,$key){}
    public function Decrypt($input,$key){}
    
    public function Encryptit($input){
        
    }
    public function Decryptit($input){
        
    }
    
}


 global $mainAlpha;
$mainAlpha = "abcdefghijklmnopqrstuvwxyz1234567890!@#%&*()_+|}{':?<>ABCDEFGHIJKLMNOPQRSTUVWXYZ";
function enc_str($string, $key = 'oy_defencrypt'){
    $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, $key, ($string), MCRYPT_MODE_ECB, $iv);
    return utf8_encode($encrypted_string);
    
}
function dec_str($string,$key = 'oy_defencrypt'){
    
    $string = utf8_decode($string);
    $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $decrypted_string = mcrypt_decrypt(MCRYPT_BLOWFISH, $key, $string, MCRYPT_MODE_ECB, $iv);
    return ($decrypted_string);
}



function str_encrypt($input, $key){
    global $mainAlpha;
    $newAlphabet =$mainAlpha;
    $length = strlen($newAlphabet);
    $oldAlphabet = $key;
    $inputLen = strlen($input);
    $output = "";	
	if (strlen($oldAlphabet) != strlen($newAlphabet)){
		return false;
        }
	for ($i = 0; $i < $inputLen; ++$i)
	{
		$oldCharIndex = strpos($oldAlphabet, ($input[$i]));
		if ($oldCharIndex !== false) $output .= $newAlphabet[$oldCharIndex];
			//$output .= ctype_upper($input[$i]) ? strtoupper($newAlphabet[$oldCharIndex]) : $newAlphabet[$oldCharIndex];
		else
			$output .= $input[$i];
	}
	return $output; 
}
function str_decrypt($input, $key){
        $output = "";	
        $newAlphabet =$key; 
        
         global $mainAlpha;
    $oldAlphabet =$mainAlpha;
      
          $length = strlen($oldAlphabet);
        $inputLen = strlen($input);
	if (strlen($oldAlphabet) != strlen($newAlphabet)){
		return false;
        }
	for ($i = 0; $i < $inputLen; ++$i)
	{
		$oldCharIndex = strpos($oldAlphabet, ($input[$i]));

		if ($oldCharIndex !== false) $output .= $newAlphabet[$oldCharIndex];
			//$output .= ctype_upper($input[$i]) ? strtoupper($newAlphabet[$oldCharIndex]) : $newAlphabet[$oldCharIndex];
		else
			$output .= $input[$i];
	}
	return $output;
}

function do_encrypt($input)
{
	$output = "";
          global $mainAlpha;
    $newAlphabet =$mainAlpha;
        $length = strlen($newAlphabet);
        $key = (substr(str_shuffle($newAlphabet), 0, $length));
       return (str_encrypt($input, $key).enc_str('{'.$length.'}').enc_str($key,'THis@i5the#k3y&*com'));
}


function do_decrypt($inputx)
{
        $output = "";	 
         // $inputx = dec_str($inputx); //echo $inputx;
          global $mainAlpha;
    $oldAlphabet =$mainAlpha;
       
         $length = strlen($oldAlphabet);
         $input2 = explode(enc_str('{'.$length.'}'),$inputx);
        $key = dec_str($input2[1],'THis@i5the#k3y&*com');
          $input = ($input2[0]); //$input2[0];
          return str_decrypt($input, $key);   
          
}


?>
