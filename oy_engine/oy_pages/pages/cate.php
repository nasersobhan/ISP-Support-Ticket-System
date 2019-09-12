<?php
//global $dbase;
//$tbl = TBL_PIX.'categories';
//$SQL_TBL = "
//CREATE TABLE IF NOT EXISTS `{$tbl}` (
//  `cat_id` int(11) NOT NULL,
//  `cat_name` varchar(150) NOT NULL,
//  `cat_slug` varchar(150) NOT NULL,
//  `cat_parent` int(11) NOT NULL DEFAULT '0',
//  `cat_type` varchar(30) NOT NULL DEFAULT 'jobs',
//  `cat_uid` int(11) NOT NULL DEFAULT '0',
//  `cat_order` int(11) NOT NULL DEFAULT '0'
//) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
//$SQL_TBL1 = "ALTER TABLE `{$tbl}`
//    ADD PRIMARY KEY (`cat_id`),  ADD UNIQUE(`cat_name`);";
//$SQL_TBL2 = "ALTER TABLE `{$tbl}`
//    MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;";
//
//
//
//$x = get_setting('cate_built');
//
//if(!$x){
//    if(!$dbase->table_exist($tbl)){
//         $dbase->query($SQL_TBL);
//         $dbase->query($SQL_TBL1);
//         $dbase->query($SQL_TBL2);
//         echo 'tablenot exist';
//     
//    }
//    echo 'Table Exist but not value';
//     set_setting('cate_built', 1);
//}


?>