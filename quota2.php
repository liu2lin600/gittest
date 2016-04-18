<?php
/**
 * Created by PhpStorm.
 * User: liull
 * Date: 2016-3-18
 * Time: 16:52
 */
$a = [1,2,3,4,5,6,8,98,45,12,65,65,89,78,212,12,89];
for($i=0; $i<20000; $i++){
    $a[] = $i;
}
function printArray(&$arr){
    print(count($arr));

}
function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

$time_start = microtime_float();
//printArray($a);

$time_end = microtime_float();
$time = $time_end - $time_start;


$var1 = 1;
$var2 = 2;
function test(){
    global $var1,$var2;
//    $var2 = &$var1;
    $var1 = 5;
}
test();
echo $var1;
echo $var2;

