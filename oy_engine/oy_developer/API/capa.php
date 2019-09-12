<?php


//session_start();

/*
* File: CaptchaSecurityImages.php
* Author: Simon Jarvis
* Copyright: 2006 Simon Jarvis
* Date: 03/08/06
* Updated: 07/02/07
* Requirements: PHP 4/5 with GD and FreeType libraries
* Link: http://www.white-hat-web-design.co.uk/articles/php-captcha.php
* 
* This program is free software; you can redistribute it and/or 
* modify it under the terms of the GNU General Public License 
* as published by the Free Software Foundation; either version 2 
* of the License, or (at your option) any later version.
* 
* This program is distributed in the hope that it will be useful, 
* but WITHOUT ANY WARRANTY; without even the implied warranty of 
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the 
* GNU General Public License for more details: 
* http://www.gnu.org/licenses/gpl.html
*
*/

//echo DEV_CORE_RPATH.'/API/monofont.ttf';

class CaptchaSecurityImages {

	var $font = DIRECTORY_SEPARATOR. 'monofont.ttf';

	function generateCode($characters) {
		/* list all possible characters, similar looking characters and vowels have been removed */
		$possible = '23456789bcdfghjkmnpqrstvwxyz';
		$code = '';
		$i = 0;
		while ($i < $characters) { 
			$code .= substr($possible, mt_rand(0, strlen($possible)-1), 1);
			$i++;
		}
		return $code;
	}

	function __construct($width='120',$height='40',$characters='6') {
            
            $fontfull_uri =dirname(__FILE__).$this->font;
           // echo dirname(__FILE__).$this->font;
		$code = $this->generateCode($characters);
		/* font size will be 75% of the image height */
		$font_size = $height * 0.75;
		$image = @imagecreate($width, $height) or die('Cannot initialize new GD image stream');
		/* set the colours */
		$background_color = imagecolorallocate($image, 255, 255, 255);
		$text_color = imagecolorallocate($image, 20, 40, 100);
		$noise_color = imagecolorallocate($image, 100, 120, 180);
		/* generate random dots in background */
		for( $i=0; $i<($width*$height)/3; $i++ ) {
			imagefilledellipse($image, mt_rand(0,$width), mt_rand(0,$height), 1, 1, $noise_color);
		}
		/* generate random lines in background */
		for( $i=0; $i<($width*$height)/150; $i++ ) {
			imageline($image, mt_rand(0,$width), mt_rand(0,$height), mt_rand(0,$width), mt_rand(0,$height), $noise_color);
		}
                
               // echo $fontfull_uri;
		/* create textbox and add text */
		$textbox = imagettfbbox($font_size, 0, $fontfull_uri, $code) or die('Error in imagettfbbox function');
		
                $x = ($width - $textbox[4])/2;
		$y = ($height - $textbox[5])/2;
		imagettftext($image, $font_size, 0, $x, $y, $text_color, $fontfull_uri , $code) or die('Error in imagettftext function');
		/* output captcha image to browser */
		//ob_clean();
                header('Content-Type: image/jpeg');
		imagejpeg($image);
		imagedestroy($image);
		$_SESSION['security_code'] = $code;
	}

}

$width = isset($_GET['width']) ? $_GET['width'] : '120';
$height = isset($_GET['height']) ? $_GET['height'] : '40';
$characters = isset($_GET['characters']) && $_GET['characters'] > 1 ? $_GET['characters'] : '6';

$captcha = new CaptchaSecurityImages($width,$height,$characters);

//
//$_SESSION['captcha'] = simple_php_captcha();
//$_SESSION['security_code'] = $_SESSION['captcha']['code'];
////header('Content-Type: image/jpeg');
//	//	echo ($_SESSION['captcha']['image_src']);
//		//imagedestroy($_SESSION['captcha']['image_src']);
//	echo $_SESSION['captcha']['image_src'];	
//
//
//
//function simple_php_captcha($config = array()) {
//    // Check for GD library
//    if( !function_exists('gd_info') ) {
//        throw new Exception('Required GD library is missing');
//    }
//    $bg_path = dirname(__FILE__) . '/backgrounds/';
//    $font_path = dirname(__FILE__) . '';
//    // Default values
//    $captcha_config = array(
//        'code' => '',
//        'min_length' => 5,
//        'max_length' => 5,
//        'backgrounds' => array(
//            $bg_path . '45-degree-fabric.png',
//            $bg_path . 'cloth-alike.png',
//            $bg_path . 'grey-sandbag.png',
//            $bg_path . 'kinda-jean.png',
//            $bg_path . 'polyester-lite.png',
//            $bg_path . 'stitched-wool.png',
//            $bg_path . 'white-carbon.png',
//            $bg_path . 'white-wave.png'
//        ),
//        'fonts' => array(
//            $font_path . 'monofont.ttf'
//        ),
//        'characters' => 'ABCDEFGHJKLMNPRSTUVWXYZabcdefghjkmnprstuvwxyz23456789',
//        'min_font_size' => 28,
//        'max_font_size' => 28,
//        'color' => '#666',
//        'angle_min' => 0,
//        'angle_max' => 10,
//        'shadow' => true,
//        'shadow_color' => '#fff',
//        'shadow_offset_x' => -1,
//        'shadow_offset_y' => 1
//    );
//    // Overwrite defaults with custom config values
//    if( is_array($config) ) {
//        foreach( $config as $key => $value ) $captcha_config[$key] = $value;
//    }
//    // Restrict certain values
//    if( $captcha_config['min_length'] < 1 ) $captcha_config['min_length'] = 1;
//    if( $captcha_config['angle_min'] < 0 ) $captcha_config['angle_min'] = 0;
//    if( $captcha_config['angle_max'] > 10 ) $captcha_config['angle_max'] = 10;
//    if( $captcha_config['angle_max'] < $captcha_config['angle_min'] ) $captcha_config['angle_max'] = $captcha_config['angle_min'];
//    if( $captcha_config['min_font_size'] < 10 ) $captcha_config['min_font_size'] = 10;
//    if( $captcha_config['max_font_size'] < $captcha_config['min_font_size'] ) $captcha_config['max_font_size'] = $captcha_config['min_font_size'];
//    // Generate CAPTCHA code if not set by user
//    if( empty($captcha_config['code']) ) {
//        $captcha_config['code'] = '';
//        $length = mt_rand($captcha_config['min_length'], $captcha_config['max_length']);
//        while( strlen($captcha_config['code']) < $length ) {
//            $captcha_config['code'] .= substr($captcha_config['characters'], mt_rand() % (strlen($captcha_config['characters'])), 1);
//        }
//    }
//    // Generate HTML for image src
//    if ( strpos($_SERVER['SCRIPT_FILENAME'], $_SERVER['DOCUMENT_ROOT']) ) {
//        $image_src = substr(__FILE__, strlen( realpath($_SERVER['DOCUMENT_ROOT']) )) . '?_CAPTCHA&amp;t=' . urlencode(microtime());
//        $image_src = '/' . ltrim(preg_replace('/\\\\/', '/', $image_src), '/');
//    } else {
//        $_SERVER['WEB_ROOT'] = str_replace($_SERVER['SCRIPT_NAME'], '', $_SERVER['SCRIPT_FILENAME']);
//        $image_src = substr(__FILE__, strlen( realpath($_SERVER['WEB_ROOT']) )) . '?_CAPTCHA&amp;t=' . urlencode(microtime());
//        $image_src = '/' . ltrim(preg_replace('/\\\\/', '/', $image_src), '/');
//    }
//    $_SESSION['_CAPTCHA']['config'] = serialize($captcha_config);
//    return array(
//        'code' => $captcha_config['code'],
//        'image_src' => $image_src
//    );
//}
//if( !function_exists('hex2rgb') ) {
//    function hex2rgb($hex_str, $return_string = false, $separator = ',') {
//        $hex_str = preg_replace("/[^0-9A-Fa-f]/", '', $hex_str); // Gets a proper hex string
//        $rgb_array = array();
//        if( strlen($hex_str) == 6 ) {
//            $color_val = hexdec($hex_str);
//            $rgb_array['r'] = 0xFF & ($color_val >> 0x10);
//            $rgb_array['g'] = 0xFF & ($color_val >> 0x8);
//            $rgb_array['b'] = 0xFF & $color_val;
//        } elseif( strlen($hex_str) == 3 ) {
//            $rgb_array['r'] = hexdec(str_repeat(substr($hex_str, 0, 1), 2));
//            $rgb_array['g'] = hexdec(str_repeat(substr($hex_str, 1, 1), 2));
//            $rgb_array['b'] = hexdec(str_repeat(substr($hex_str, 2, 1), 2));
//        } else {
//            return false;
//        }
//        return $return_string ? implode($separator, $rgb_array) : $rgb_array;
//    }
//}
//// Draw the image
//if( isset($_GET['_CAPTCHA']) ) {
//    session_start();
////    $captcha_config = unserialize($_SESSION['_CAPTCHA']['config']);
////    if( !$captcha_config ) exit();
////    unset($_SESSION['_CAPTCHA']);
//    // Pick random background, get info, and start captcha
//    $background = $captcha_config['backgrounds'][mt_rand(0, count($captcha_config['backgrounds']) -1)];
//    list($bg_width, $bg_height, $bg_type, $bg_attr) = getimagesize($background);
//    $captcha = imagecreatefrompng($background);
//    $color = hex2rgb($captcha_config['color']);
//    $color = imagecolorallocate($captcha, $color['r'], $color['g'], $color['b']);
//    // Determine text angle
//    $angle = mt_rand( $captcha_config['angle_min'], $captcha_config['angle_max'] ) * (mt_rand(0, 1) == 1 ? -1 : 1);
//    // Select font randomly
//    $font = $captcha_config['fonts'][mt_rand(0, count($captcha_config['fonts']) - 1)];
//    // Verify font file exists
//    if( !file_exists($font) ) throw new Exception('Font file not found: ' . $font);
//    //Set the font size.
//    $font_size = mt_rand($captcha_config['min_font_size'], $captcha_config['max_font_size']);
//    $text_box_size = imagettfbbox($font_size, $angle, $font, $captcha_config['code']);
//    // Determine text position
//    $box_width = abs($text_box_size[6] - $text_box_size[2]);
//    $box_height = abs($text_box_size[5] - $text_box_size[1]);
//    $text_pos_x_min = 0;
//    $text_pos_x_max = ($bg_width) - ($box_width);
//    $text_pos_x = mt_rand($text_pos_x_min, $text_pos_x_max);
//    $text_pos_y_min = $box_height;
//    $text_pos_y_max = ($bg_height) - ($box_height / 2);
//    if ($text_pos_y_min > $text_pos_y_max) {
//        $temp_text_pos_y = $text_pos_y_min;
//        $text_pos_y_min = $text_pos_y_max;
//        $text_pos_y_max = $temp_text_pos_y;
//    }
//    $text_pos_y = mt_rand($text_pos_y_min, $text_pos_y_max);
//    // Draw shadow
//    if( $captcha_config['shadow'] ){
//        $shadow_color = hex2rgb($captcha_config['shadow_color']);
//        $shadow_color = imagecolorallocate($captcha, $shadow_color['r'], $shadow_color['g'], $shadow_color['b']);
//        imagettftext($captcha, $font_size, $angle, $text_pos_x + $captcha_config['shadow_offset_x'], $text_pos_y + $captcha_config['shadow_offset_y'], $shadow_color, $font, $captcha_config['code']);
//    }
//    // Draw text
//    imagettftext($captcha, $font_size, $angle, $text_pos_x, $text_pos_y, $color, $font, $captcha_config['code']);
//    // Output image
//    header("Content-type: image/png");
//    imagepng($captcha);
//}
//?>