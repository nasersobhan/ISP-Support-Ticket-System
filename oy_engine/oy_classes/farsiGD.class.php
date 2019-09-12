<?php

class farsiGD {

    public function utf8_strlen($str) {
        return preg_match_all('/[\x00-\x7F\xC0-\xFD]/', $str, $dummy);
    }

    public $p_chars = array(
        'Ø¢' => array('ïº‚', 'ïº‚', 'Ø¢'),
        'Ø§' => array('ïºŽ', 'ïºŽ', 'Ø§'),
        'Ø¨' => array('ïº�', 'ïº’', 'ïº‘'),
        'Ù¾' => array('ï­—', 'ï­™', 'ï­˜'),
        'Øª' => array('ïº–', 'ïº˜', 'ïº—'),
        'Ø«' => array('ïºš', 'ïºœ', 'ïº›'),
        'Ø¬' => array('ïºž', 'ïº ', 'ïºŸ'),
        'Ú†' => array('ï­»', 'ï­½', 'ï­¼'),
        'Ø­' => array('ïº¢', 'ïº¤', 'ïº£'),
        'Ø®' => array('ïº¦', 'ïº¨', 'ïº§'),
        'Ø¯' => array('ïºª', 'ïºª', 'ïº©'),
        'Ø°' => array('ïº¬', 'ïº¬', 'ïº«'),
        'Ø±' => array('ïº®', 'ïº®', 'ïº­'),
        'Ø²' => array('ïº°', 'ïº°', 'ïº¯'),
        'Ú˜' => array('ï®‹', 'ï®‹', 'ï®Š'),
        'Ø³' => array('ïº²', 'ïº´', 'ïº³'),
        'Ø´' => array('ïº¶', 'ïº¸', 'ïº·'),
        'Øµ' => array('ïºº', 'ïº¼', 'ïº»'),
        'Ø¶' => array('ïº¾', 'ï»€', 'ïº¿'),
        'Ø·' => array('ï»‚', 'ï»„', 'ï»ƒ'),
        'Ø¸' => array('ï»†', 'ï»ˆ', 'ï»‡'),
        'Ø¹' => array('ï»Š', 'ï»Œ', 'ï»‹'),
        'Øº' => array('ï»Ž', 'ï»�', 'ï»�'),
        'Ù�' => array('ï»’', 'ï»”', 'ï»“'),
        'Ù‚' => array('ï»–', 'ï»˜', 'ï»—'),
        'Ú©' => array('ï»š', 'ï»œ', 'ï»›'),
        'Ú¯' => array('ï®“', 'ï®•', 'ï®”'),
        'Ù„' => array('ï»ž', 'ï» ', 'ï»Ÿ'),
        'Ù…' => array('ï»¢', 'ï»¤', 'ï»£'),
        'Ù†' => array('ï»¦', 'ï»¨', 'ï»§'),
        'Ùˆ' => array('ï»®', 'ï»®', 'ï»­'),
        'ÛŒ' => array('ï¯½', 'ï¯¿', 'ï¯¾'),
        'Ùƒ' => array('ï»š', 'ï»œ', 'ï»›'),
        'ÙŠ' => array('ï»²', 'ï»´', 'ï»³'),
        'Ø£' => array('ïº„', 'ïº„', 'ïºƒ'),
        'Ø¤' => array('ïº†', 'ïº†', 'ïº…'),
        'Ø¥' => array('ïºˆ', 'ïºˆ', 'ïº‡'),
        'Ø¦' => array('ïºŠ', 'ïºŒ', 'ïº‹'),
        'Ø©' => array('ïº”', 'ïº˜', 'ïº—')
    );
    public $tahoma = array(
        'Ù‡' => array('ï®«', 'ï®­', 'ï®¬')
    );
    public $normal = array(
        'Ù‡' => array('ï»ª', 'ï»¬', 'ï»«')
    );
    public $mp_chars = array('Ø¢', 'Ø§', 'Ø¯', 'Ø°', 'Ø±', 'Ø²', 'Ú˜', 'Ùˆ', 'Ø£', 'Ø¥', 'Ø¤');
    public $ignorelist = array('', 'ÙŒ', 'Ù�', 'Ù‹', 'Ù�', 'Ù�', 'ÙŽ', 'Ù‘', 'Ù“', 'Ù°', 'Ù”', 'ï¹¶', 'ï¹º', 'ï¹¸', 'ï¹¼', 'ï¹¾', 'ï¹´', 'ï¹°', 'ï±ž', 'ï±Ÿ', 'ï± ', 'ï±¡', 'ï±¢', 'ï±£',);
    public $openClose = array('>', ')', '}', ']', '<', '(', '{', '[');
    public $en_chars = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'); 
///
    public function persianText($str, $z="", $method='tahoma', $farsiNumber=true) {
        $en_str = '';
        $runWay = '';
        if ($method == 'tahoma') {
            $this->p_chars = array_merge($this->p_chars, $this->tahoma);
        } else {
            $this->p_chars = array_merge($this->p_chars, $this->normal);
        }
        $str_len = $this->utf8_strlen($str);
        preg_match_all("/./u", $str, $ar);
        for ($i = 0; $i < $str_len; $i++) {
            $gatherNumbers = false;
            $runWay = null;
            $str1 = $ar[0][$i];
            if (in_array($ar[0][$i + 1], $this->ignorelist)) {
                $str_next = $ar[0][$i + 2];
                if ($i == 2)
                    $str_back = $ar[0][$i - 2];
                if ($i != 2)
                    $str_back = $ar[0][$i - 1];
            }elseif (!in_array($ar[0][$i - 1], $this->ignorelist)) {
                $str_next = $ar[0][$i + 1];
                if ($i != 0)
                    $str_back = $ar[0][$i - 1];
            }else {
                if (isset($ar[0][$i + 1]) && !empty($ar[0][$i + 1])) {
                    $str_next = $ar[0][$i + 1];
                } else {
                    $str_next = $ar[0][$i - 1];
                }
                if ($i != 0)
                    $str_back = $ar[0][$i - 2];
            }
            if (!in_array($str1, $this->ignorelist)) {
                if (array_key_exists($str1, $this->p_chars)) {
                    if (!$str_back or $str_back == " " or !array_key_exists($str_back, $this->p_chars)) {
                        if (!array_key_exists($str_back, $this->p_chars) and !array_key_exists($str_next, $this->p_chars))
                            $output = $str1 . $output;
                        else
                            $output = $this->p_chars[$str1][2] . $output;
                        continue;
                    }elseif (array_key_exists($str_next, $this->p_chars) and array_key_exists($str_back, $this->p_chars)) {
                        if (in_array($str_back, $this->mp_chars) and array_key_exists($str_next, $this->p_chars)) {
                            $output = $this->p_chars[$str1][2] . $output;
                        } else {
                            $output = $this->p_chars[$str1][1] . $output;
                        }
                        continue;
                    } elseif (array_key_exists($str_back, $this->p_chars) and !array_key_exists($str_next, $this->p_chars)) {
                        if (in_array($str_back, $this->mp_chars)) {
                            // just font FREEFARSI work for H at end of sth that not connected like Dah!
                            $output =  $str1 . $output;
                        } else {
                            $output = $this->p_chars[$str1][0] . $output;
                        }
                        continue;
                    }
                } elseif ($z == "fa") {

                    $number = array("Ù ", "Ù¡", "Ù¢", "Ù£", "Ù¤", "Ù¥", "Ù¦", "Ù§", "Ù¨", "Ù©", "Û´", "Ûµ", "Û¶", "0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
                    switch ($str1) {
                        case ")" : $str1 = "(";
                            break;
                        case "(" : $str1 = ")";
                            break;
                        case "}" : $str1 = "{";
                            break;
                        case "{" : $str1 = "}";
                            break;
                        case "]" : $str1 = "[";
                            break;
                        case "[" : $str1 = "]";
                            break;
                        case ">" : $str1 = "<";
                            break;
                        case "<" : $str1 = ">";
                            break;
                    }
                    if (in_array($str1, $number)) {
                        if ( $farsiNumber ) {
                            $num .= $this->fa_number($str1);
                            $runWay[] = '1';
                        } else {
                            $num .= $str1;
                            $runWay[] = '2';
                        }
                        $str1 = "";
                    }
                    
                    if ( !in_array($str_next, $number) ) {
                        if ( in_array(strtolower($str1), $this->en_chars) or (($str1==' ' or $str1=='.') and $en_str!='' and !in_array($str_next, $this->p_chars)) ) {
                            $en_str .= $str1 . $num;
                            $str1 = '';
                            $runWay[] = '3';
                        } else {
                            if ( $en_str!='' ) {
                                if ( $i+1==$str_len ) {
                                    $runWay[] = '3.5';
                                    $str1 = $str1.$num;
                                } else {
                                    $en_str .= $str1 .$num;
                                    $runWay[] = '4';
                                }
                            } else {
                                $str1 = $str1.$num;
                                $runWay[] = '5';
                            }    
                           
                        }
                        $num = '';
                    }
                    if ( $en_str!='' or ($str1!='' and $i==0 and ( !array_key_exists($str_next, $this->p_chars) and $str_next!=' ' ))  or $gatherNumbers ) { //or ($str1!='' and $i==0)

                        if ( !array_key_exists($str1, $this->p_chars) ) {
                            if ( !array_key_exists($str_next, $this->p_chars) and $str_next!=' ' and !in_array($str_next, $this->openClose) ) { 
                                $en_str = $en_str.$str1;                               
                                $runWay[] = '6';
                            } else {
                                if ( in_array($ar[0][$i+2], $this->en_chars) ) {
                                   $en_str = $en_str.$str1;
                                   $runWay[] = '7';
                                } else {
                                    
                                    if ( $str_next==' ' and ( in_array($ar[0][$i+2], $number) or in_array(strtolower($ar[0][$i+2]), $this->en_chars) ) ) {
                                        $en_str = $en_str.$str1;
                                        $runWay[] = '8';
                                    } else {
                                        //if ( in_array($str_next, $this->openClose) and in_array(strtolower($str_back), $this->en_chars) ) {
                                        // $output = $output . $en_str;
                                        // $en_str = '';
                                         //   $en_str = $en_str.$str1;
                                         //   $i++;
                                        //    continue;
                                            //$output = $output . $en_str;
                                            //$en_str='';
                                         //   $runWay[] = '9.5';
                                       // } else {
                                            $output = $en_str . $output;
                                            $en_str = '';
                                            $runWay[] = '9';
                                       // }
                                    }
                                    
                                }
                            }
                            
                        } else {
                            if ( $num ) {
                                $en_str = $en_str .$num;
                                $runWay[] = '10';
                            } else {
                                $output = $en_str . $str1 . $output ;
                                $en_str = '';
                                $runWay[] = '11';
                            }
                        }
                        
                    } else {
                        
                        if ( in_array($str1, $number) and $str_next=='.' and in_array($ar[0][$i+2], $number) ) {
                            $en_str = $str1;
                            $runWay[] = '12';
                        } else {
                            //if ( in_array($str1, $this->openClose) and in_array($str_next, $this->en_chars) ) {
                            //    $output = $str1.$output ;
                            //    $runWay[] = '13';
                           //} else {
                                $output = $str1. $output ;
                                $runWay[] = '14';
                           // }
                        }
                    }    
                } else {
                    if (($str1 == "ØŒ") or ($str1 == "ØŸ") or ($str1 == "Ø¡") or (array_key_exists($str_next, $this->p_chars) and array_key_exists($str_back, $this->p_chars)) or
                            ($str1 == " " and array_key_exists($str_back, $this->p_chars)) or ($str1 == " " and array_key_exists($str_next, $this->p_chars))) {
                        if ($e_output) {
                            $output = $e_output . $output;
                            $e_output = "";
                        }
                        $output = $str1 . $output;
                    } else {
                        $e_output.=$str1;
                        if (array_key_exists($str_next, $this->p_chars) or $str_next == "") {
                            $output = $e_output . $output;
                            $e_output = "";
                        }
                    }
                }
            } else {
                $output = $str1 . $output;
            }
            
            //fb("str1: {$str1} | num: {$num} | output: {$output} | enSter: {$en_str} | strNex: {$str_next} | strBack: {$str_back}| path: ". implode('-',$runWay) );
            
            $str_next = null;
            $str_back = null;
        }

        if ( $en_str!='' ) {
            $output = $en_str . $output ;
        }
        return $output;
    }

    public function fa_number($num) {
        $AF = array(
            0 => "Ù ",
            1 => "Ù¡",
            2 => "Ù¢",
            3 => "Ù£",
            4 => "Û´",
            5 => "Ûµ",
            6 => "Û¶",
            7 => "Ù§",
            8 => "Ù¨",
            9 => "Ù©"
        );

        $af_date = NULL;
        $chars = preg_split('//', $num, -1, PREG_SPLIT_NO_EMPTY);
        foreach ($chars as $key => $val) {
            $af_num = NULL;
            switch ($val) {
                case "0";
                    $af_num = $AF[0];
                    break;
                case "1":
                    $af_num = $AF[1];
                    break;
                case "2":
                    $af_num = $AF[2];
                    break;
                case "3":
                    $af_num = $AF[3];
                    break;
                case "4":
                    $af_num = $AF[4];
                    break;
                case "5":
                    $af_num = $AF[5];
                    break;
                case "6":
                    $af_num = $AF[6];
                    break;
                case "7":
                    $af_num = $AF[7];
                    break;
                case "8":
                    $af_num = $AF[8];
                    break;
                case "9":
                    $af_num = $AF[9];
                    break;
                default :
                    $af_num = $val;
            }
            $af_date .=$af_num;
        }
        return $af_date;
    }

}


class Color
{
    /**
     * @var int
     */
    protected $red;

    /**
     * @var int
     */
    protected $green;

    /**
     * @var int
     */
    protected $blue;

    /**
     * @var int|null
     */
    protected $alpha;

    /**
     * @param int $red Value of red component 0-255
     * @param int $green Value of green component 0-255
     * @param int $blue Value of blue component 0-255
     * @param int $alpha A value between 0 and 127. 0 indicates completely opaque while 127 indicates completely transparent.
     */
    public function __construct($red = 0, $green = 0, $blue = 0, $alpha = null)
    {
        $this->red = $red;
        $this->green = $green;
        $this->blue = $blue;
        $this->alpha = $alpha;
    }

    /**
     * @param resource $image GD image resource
     * @return int Returns the index of the specified color+alpha in the palette of the image,
     *             or -1 if the color does not exist in the image's palette.
     */
    public function getIndex($image)
    {
        if ($this->hasAlphaChannel()) {
            return imagecolorexactalpha(
                $image,
                $this->red,
                $this->green,
                $this->blue,
                $this->alpha
            );
        } else {
            return imagecolorexact(
                $image,
                $this->red,
                $this->green,
                $this->blue
            );
        }
    }

    /**
     * @return bool TRUE when alpha channel is specified, FALSE otherwise
     */
    public function hasAlphaChannel()
    {
        return $this->alpha !== null;
    }
}




class Box
{
    /**
     * @var resource
     */
    protected $im;

    /**
     * @var int
     */
    protected $fontSize = 12;

    /**
     * @var Color
     */
    protected $fontColor;

    /**
     * @var string
     */
    protected $alignX = 'left';

    /**
     * @var string
     */
    protected $alignY = 'top';

    /**
     * @var float
     */
    protected $lineHeight = 1.25;

    /**
     * @var float
     */
    protected $baseline = 0.2;

    /**
     * @var string
     */
    protected $fontFace = null;

    /**
     * @var bool
     */
    protected $debug = false;

    /**
     * @var bool|array
     */
    protected $textShadow = false;

    /**
     * @var array
     */
    protected $box = array(
        'x' => 0,
        'y' => 0,
        'width' => 100,
        'height' => 100
    );

    public function __construct(&$image)
    {
        $this->im = $image;
        $this->fontColor = new Color(0, 0, 0);
    }

    /**
     * @param Color $color Font color
     */
    public function setFontColor(Color $color)
    {
        $this->fontColor = $color;
    }

    /**
     * @param string $path Path to the font file
     */
    public function setFontFace($path)
    {
        $this->fontFace = $path;
    }

    /**
     * @param int $v Font size in *pixels*
     */
    public function setFontSize($v)
    {
        $this->fontSize = $v;
    }

    /**
     * @param Color $color Shadow color
     * @param int $xShift Relative shadow position in pixels. Positive values move shadow to right, negative to left.
     * @param int $yShift Relative shadow position in pixels. Positive values move shadow to bottom, negative to up.
     */
    public function setTextShadow(Color $color, $xShift, $yShift)
    {
        $this->textShadow = array(
            'color' => $color,
            'x' => $xShift,
            'y' => $yShift
        );
    }

    /**
     * Allows to customize spacing between lines.
     * @param float $v Height of the single text line, in percents, proportionally to font size
     */
    public function setLineHeight($v)
    {
        $this->lineHeight = $v;
    }

    /**
     * @param float $v Position of baseline, in percents, proportionally to line height measuring from the bottom.
     */
    public function setBaseline($v)
    {
        $this->baseline = $v;
    }

    /**
     * Sets text alignment inside textbox
     * @param string $x Horizontal alignment. Allowed values are: left, center, right.
     * @param string $y Vertical alignment. Allowed values are: top, center, bottom.
     */
    public function setTextAlign($x = 'left', $y = 'top')
    {
        $xAllowed = array('left', 'right', 'center');
        $yAllowed = array('top', 'bottom', 'center');

        if (!in_array($x, $xAllowed)) {
            throw new \InvalidArgumentException('Invalid horizontal alignement value was specified.');
        }

        if (!in_array($y, $yAllowed)) {
            throw new \InvalidArgumentException('Invalid vertical alignement value was specified.');
        }

        $this->alignX = $x;
        $this->alignY = $y;
    }

    /**
     * Sets textbox position and dimensions
     * @param int $x Distance in pixels from left edge of image.
     * @param int $y Distance in pixels from top edge of image.
     * @param int $width Width of texbox in pixels.
     * @param int $height Height of textbox in pixels.
     */
    public function setBox($x, $y, $width, $height)
    {
        $this->box['x'] = $x;
        $this->box['y'] = $y;
        $this->box['width'] = $width;
        $this->box['height'] = $height;
    }

    /**
     * Enables debug mode. Whole textbox and individual lines will be filled with random colors.
     */
    public function enableDebug()
    {
        $this->debug = true;
    }

    /**
     * Draws the text on the picture.
     * @param string $text Text to draw. May contain newline characters.
     */
    public function draw($text)
    {
        if (!isset($this->fontFace)) {
            throw new \InvalidArgumentException('No path to font file has been specified.');
        }

        $lines = array();
        // Split text explicitly into lines by \n, \r\n and \r
        $explicitLines = preg_split('/\n|\r\n?/', $text);
        foreach ($explicitLines as $line) {
            // Check every line if it needs to be wrapped
            $words = explode(" ", $line);
            //$line = $words[0];
            $line = $words[count($words)-1];
            //for ($i = 1; $i < count($words); $i++) {
            for ($i = count($words)-1 ; $i != -1; $i--) {
                 $line = $words[count($words)-1];
                //$box = $this->calculateBox($line." ".$words[$i]);
                $box = $this->calculateBox($words[$i]." ".$line);
                if (($box[4]-$box[6]) >= $this->box['width']) {
                    $lines[] = $line;
                    $line = $words[$i];
                } else {
                    //$line .= " ".$words[$i];
                    $line =  $words[$i] ." ". $line;
                }
            }
            $lines[] = $line;
        }

        if ($this->debug) {
            // Marks whole texbox area with color
            $this->drawFilledRectangle(
                $this->box['x'],
                $this->box['y'],
                $this->box['width'],
                $this->box['height'],
                new Color(rand(180, 255), rand(180, 255), rand(180, 255), 80)
            );
        }

        $lineHeightPx = $this->lineHeight * $this->fontSize;
        $textHeight = count($lines) * $lineHeightPx;
        
        switch ($this->alignY) {
            case 'center':
                $yAlign = ($this->box['height'] / 2) - ($textHeight / 2);
                break;
            case 'bottom':
                $yAlign = $this->box['height'] - $textHeight;
                break;
            case 'top':
            default:
                $yAlign = 0;
        }
        
        $n = 0;
        foreach ($lines as $line) {
            $box = $this->calculateBox($line);
            $boxWidth = $box[2] - $box[0];
            switch ($this->alignX) {
                case 'center':
                    $xAlign = ($this->box['width'] - $boxWidth) / 2;
                    break;
                case 'right':
                    $xAlign = ($this->box['width'] - $boxWidth);
                    break;
                case 'left':
                default:
                    $xAlign = 0;
            }
            $yShift = $lineHeightPx * (1 - $this->baseline);

            // current line X and Y position
            $xMOD = $this->box['x'] + $xAlign;
            $yMOD = $this->box['y'] + $yAlign + $yShift + ($n * $lineHeightPx);
            
            if ($this->debug) {
                // Marks current line with color
                $this->drawFilledRectangle(
                    $xMOD,
                    $this->box['y'] + $yAlign + ($n * $lineHeightPx),
                    $boxWidth,
                    $lineHeightPx,
                    new Color(rand(1, 180), rand(1, 180), rand(1, 180))
                );
            }
            
            if ($this->textShadow !== false) {
                $this->drawInternal(
                    $xMOD + $this->textShadow['x'],
                    $yMOD + $this->textShadow['y'],
                    $this->textShadow['color'],
                    $line
                );
            }

            $this->drawInternal(
                $xMOD,
                $yMOD,
                $this->fontColor,
                $line
            );

            $n++;
        }
    }

    protected function getFontSizeInPoints()
    {
        return 0.75 * $this->fontSize;
    }

    protected function drawFilledRectangle($x, $y, $width, $height, Color $color)
    {
        imagefilledrectangle($this->im, $x, $y, $x + $width, $y + $height,
            $color->getIndex($this->im)
        );
    }

    protected function calculateBox($text)
    {
        return imageftbbox($this->getFontSizeInPoints(), 0, $this->fontFace, $text);
    }

    protected function drawInternal($x, $y, Color $color, $text)
    {
        imagefttext(
            $this->im,
            $this->getFontSizeInPoints(),
            0, // no rotation
            $x,
            $y,
            $color->getIndex($this->im),
            $this->fontFace,
            $text
        );
    }
}

?>
