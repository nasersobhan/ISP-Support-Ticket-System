<?php
loginrequired();
global $dbase,$curr,$sizetype;
$curr = ' '.get_cate_name(get_setting('currency'));
$sizetype = ' '.(get_setting('sizetype'));
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$page = is_get('view');
 theme_include('reports/'.$page.'.php');