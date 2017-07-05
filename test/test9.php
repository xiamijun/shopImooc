<?php
global $arr1;
$arr1=array();
global $arr2;
$arr2=array();
function mypush($node)
{
    global $arr1;
    array_push($arr1,$node);
}
function mypop()
{
    global $arr1;
    global $arr2;
    if (empty($arr2)){
        while (!empty($arr1)){
            $node=array_pop($arr1);
            array_push($arr2,$node);
        }
    }
    return array_pop($arr2);
}