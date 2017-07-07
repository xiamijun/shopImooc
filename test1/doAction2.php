<?php
function buildInfo(){
    $i=0;
    foreach ($_FILES as $fileinfo){
        //判断单文件上传还是多文件上传
        if (is_string($fileinfo['name'])){
            $infos[$i]=$fileinfo;
            $i++;
        }else{
            //多文件
            foreach ($fileinfo as $key_=>$value){
               foreach ($value as $key=>$info){
                   $infos[$key][$key_]=$info;
               }
            }
        }
    }
    return $infos;
}