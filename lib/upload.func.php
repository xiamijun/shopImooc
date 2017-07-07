<?php
function buildInfo(){
    if (!$_FILES){
        return false;
    }
    $i=0;
    foreach ($_FILES as $v){
        //判断单文件上传还是多文件上传
        if (is_string($v['name'])){
            $files[$i]=$v;
            $i++;
        }else{
            //多文件
            foreach ($v as $key=>$val){
                $files[$i]['name']=$val;
                $files[$i]['size']=$v['size'][$key];
                $files[$i]['tmp_name']=$v['tmp_name'][$key];
                $files[$i]['error']=$v['error'][$key];
                $files[$i]['type']=$v['type'][$key];
                $i++;
            }
        }
        return $files;
    }
}

function uploadFile($path='uploads',$allowExt=array('gif','jpg','jpeg','png'),$maxSize=1048576,$imgFlag=true){
    //检测目录是否存在
    if (!file_exists($path)){
        mkdir($path,0777,true);
    }
    $i=0;
    $files=buildInfo();
    if (!($files&&is_array($files))){
        return false;
    }
    foreach ($files as $file){
        if ($file['error']==UPLOAD_ERR_OK){
            //获取扩展名
            $ext=getExt($file['filename']);
            //限制上传文件类型
            if (!in_array($ext,$allowExt)){
                exit('非法文件类型');
            }
            if ($file['size']>$maxSize){
                exit('文件过大，上传失败');
            }
            if ($imgFlag){
                //验证图片是否是一个真正的图片类型
                $info=getimagesize($file['tmp_name']);
                if (!$info){
                    exit('不是真正的图片');
                }
            }

            //判断是否通过post上传
            if (!is_uploaded_file($file['tmp_name'])){
                exit('文件不是通过HTTP POST方式上传上来的');
            }

            //唯一文件名
            $filename=getUniName().'.'.$ext;
            //上传目录
            $destination=$path.'/'.$filename;

            if (move_uploaded_file($file['tmp_name'],$destination)){
                $file['name']=$filename;
                unset($file['error'],$file['tmp_name'],$file['type'],$file['size']);
                $uploadFiles[$i]=$file;
                $i++;
            }
        }else{
            switch ($file['error']){
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
            echo $mes;
        }
    }

    return $uploadFiles;
}
