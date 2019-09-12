<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


global $_LANG;




//messages
$_LANG['douwant2dl']='Are you sure you want to delete this item?';
$_LANG['saved']='successfully saved';
$_LANG['deleted']='item has been deleted.';
$_LANG['edited']='Edited Succesfully.';
$_LANG['errortry']='Something happend Please try again.';





//settings
$_LANG['english']='English';
$_LANG['dari']='دری';

$_LANG['maincurr']='Main Currancy';
$_LANG['measurement']='Oil Measurement';
$_LANG['datetype']='Date Format';
$_LANG['reporttext']='Report Text';
$_LANG['headertxt']='Header Text';
$_LANG['footertxt']='Footr Text';
$_LANG['currentsettings']='Current Settings';
$_LANG['value']='value';



//profile
$_LANG['editprofile']='Edit Profile';
$_LANG['logout']='Logout';
//user settings
$_LANG['settings']='settings';

//css classes
$_LANG['otherside']='pull-right';
$_LANG['rightside']='pull-left';
 include_lang('def-'.  get_lang());
if(is_get('t'))
    include_lang(is_get('t').'-'.  get_lang());



//if(is_get('pg')=='jobs')
    include_lang('LANG-EN');
    
    
    
    
    ///pages
$_LANG['about']='About';
$_LANG['jobs']='Jobs';
$_LANG['rfq']='RFQ/RFP/RFA';

 $_LANG['comments']='Comments';  
  $_LANG['more']='More';






$_LANG['house']='wharehouse';
         $_LANG['type']='Type';

         
         
         
         //cometype
         
          $_LANG['company']='Company';  
  $_LANG['mcompany']='Tax';
   $_LANG['tcompany']='Transport';
    $_LANG['ocompany']='Overflow';

    #eoe 
    
    $_LANG['eoe1mon']='Pay';
    $_LANG['eoe2mon']='Get';
    $_LANG['eoe5mon']='پرداخت متفرقه';
    $_LANG['eoe7mon']='دریافت متفرقه';
    
      $_LANG['eoe1oil']='Sell';
    $_LANG['eoe2oil']='Buy';
    
    
    $_LANG['unvalid']='invalid';