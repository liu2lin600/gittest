<?php
/**
 * Created by PhpStorm.
 * User: liull
 * Date: 2016-3-28
 * Time: 18:04
 */
/**
 * 解决约瑟夫问题
 * $arr 数组
 * $k 指定开始的位置
 * $m 数到m的那个人出列(或者整数倍的m)
 **/

function doJosephus($arr,$k,$m){
    //静态变量（存在数据不能计时清除的危险）
    static $storage = array();
    $temp = array();
    $cnt = count($arr);
    //判断数组是否有元素，否则退出执行
    if ($cnt) {
        $k_mod = ($cnt-$k+1)%$m-$m;//为下一次调用时设置的开始位置
        static $start = 1;//初始化开始位置为1
        for ($i=0;$i<$cnt;$i++){
            if ($i>=$k-1) { //从大于等于$k位置（计为1），开始处理
                if (!($start%$m)) {
                    $storage[] = array_shift($arr);//等于$m长度则入库
                }else{
                    $temp[] = array_shift($arr);//不属于$m长度的则计入下一个处理的数组
                }
                //指针在一个环内不断的往前走（加1）
                $start++;
            }else{
                //在$k位置之前的元素全部进入下一次循环
                $temp[] = array_shift($arr);
            }
        }
        //递归调用开始（模拟链接环的作用）
        doJosephus($temp,$k_mod,$m);
    }
    return $storage;
}

$arr = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20];
$num = doJosephus($arr,0,3);
var_dump($num);