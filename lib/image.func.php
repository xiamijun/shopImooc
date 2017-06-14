<?php
require_once 'string.func.php';
//通过GD库做验证码
//创建画布
$width=80;
$height=28;
$image=imagecreatetruecolor($width,$height);
$white=imagecolorallocate($image,255,255,255);
$black=imagecolorallocate($image,0,0,0);
//用矩形填充画布
imagefilledrectangle($image,1,1,$width-2,$height-2,$white);

$chars=buildRandomString(1,4);
$_SESSION['verify']=$chars;

$fontfiles=array('msyh.ttf','msyhbd.ttf','simhei.ttf','simkai.ttf','simsun.ttc');
for ($i=0;$i<4;$i++){
    $size=mt_rand(14,18);
    $angle=mt_rand(-15,15);
    $x=5+$i*$size;
    $y=mt_rand(20,26);
    $color=imagecolorallocate($image,mt_rand(50,90),mt_rand(80,200),mt_rand(90,180));
    $fontfile='../fonts'.$fontfiles[mt_rand(0,count($fontfiles)-1)];
    $text=substr($chars,$i,1);
    imagettftext($image,$size,$angle,$x,$y,$color,$fontfile,$text);
}

header('content-type:image/gif');
imagegif($image);
imagedestroy($image);