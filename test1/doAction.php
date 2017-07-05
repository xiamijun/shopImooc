<?php
require_once '../lib/string.func.php';
header('content-type:text/html;charset=utf-8');
$filename=$_FILES['myFile']['name'];
$type=$_FILES['myFile']['type'];
$tmp_name=$_FILES['myFile']['tmp_name'];
$error=$_FILES['myFile']['error'];
$size=$_FILES['myFile']['size'];
//允许上传的扩展名
$allowExt=array('gif','jpg','jpeg','png');
$maxSize=1048576;
$imgFlag=true;
if ($error==UPLOAD_ERR_OK){
    //获取扩展名
    $ext=getExt($filename);
    //限制上传文件类型
    if (!in_array($ext,$allowExt)){
        exit('非法文件类型');
    }
    if ($size>$maxSize){
        exit('文件过大，上传失败');
    }
    if ($imgFlag){
        //验证图片是否是一个真正的图片类型
        $info=getimagesize($tmp_name);
        if (!$info){
            exit('不是真正的图片');
        }
    }
    //唯一文件名
    $filename=getUniName().'.'.$ext;
    //上传目录
    $path='uploads';
    //检测目录是否存在
    if (!file_exists($path)){
        mkdir($path,0777,true);
    }
    $destination=$path.'/'.$filename;
    //判断是否通过post上传
    if (is_uploaded_file($tmp_name)){
        if (move_uploaded_file($tmp_name,$destination)){
            $mes='文件上传成功';
        }else{
            '文件移动失败';
        }
    }else{
        $mes='文件不是通过post上传';
    }
}else{
    switch ($error){
        case 1:
            $mes='超过配置文件允许上传文件大小,默认2M';
            break;
        case 2:
            $mes='超过表单允许上传文件大小,默认8M';
            break;
        case 3:
            $mes='文件部分未上传';
            break;
        case 4:
            $mes='没有文件被上传';
            break;
        case 6:
            $mes='未找到临时目录';
            break;
        case 7:
            $mes='文件不可写';
            break;
        case 8:
            $mes='由于php扩展程序中断文件上传';
            break;
    }
}
echo $mes;