<?php
function thumb($filename,$destination=null,$dst_w=null,$dst_h=null,$isReversedSource=false, $scale=0.5){
    list($src_w,$src_h,$imagetype)=getimagesize($filename);
    if (is_null($dst_w)||is_null($dst_h)){
        $dst_w=ceil($src_w*$scale);
        $dst_h=ceil($src_h*$scale);
    }
    $mime=image_type_to_mime_type($imagetype);
    //image/jpeg
    $createFun=str_replace('/','createfrom',$mime);
//imagejpeg()
    $outFun=str_replace('/',null,$mime);
    $src_image=$createFun($filename);
    $dst_image=imagecreatetruecolor($dst_w,$dst_h);
    imagecopyresampled($dst_image,$src_image,0,0,0,0,$dst_w,$dst_h,$src_w,$src_h);
    if ($destination&&!file_exists(dirname($destination))){
        mkdir(dirname($destination),0777,true);
    }
    $dstFilename=$destination==null?getUniName().'.'.getExt($filename):$destination;
    $outFun($dst_image,$dstFilename);
    imagedestroy($src_image);
    imagedestroy($dst_image);
    if (!$isReversedSource){
        unlink($filename);
    }
    return $dstFilename;
}




