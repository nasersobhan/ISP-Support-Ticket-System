<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$arr = get_defined_functions();


//$arr = get_declared_classes ();
//echo count($arr['user']);
//print_r($arr['user']);




$functions = get_defined_functions();
$functions_list = array();
foreach ($functions['user'] as $func) {
        $f = new ReflectionFunction($func);
        $args = array();
        foreach ($f->getParameters() as $param) {
                $tmparg = '';
                if ($param->isPassedByReference()) $tmparg = '&';
                if ($param->isOptional()) {
                        $tmparg = '[' . $tmparg . '$' . $param->getName() . ' = ' . $param->getDefaultValue() . ']';
                } else {
                        $tmparg.= '&' . $param->getName();
                }
                $args[] = $tmparg;
                unset ($tmparg);
        }
        $functions_list[] = 'function ' . $func . ' ( ' . implode(', ', $args) . ' )' . PHP_EOL;
}
foreach ($functions_list as $fun)
    echo $fun.'<br/>';

//print_r($functions_list);
exit();