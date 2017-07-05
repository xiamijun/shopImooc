<?php
function jumpFloor($number){
    if ($number<=0){
        return 0;
    }
    if ($number==1){
        return 1;
    }
    if ($number==2){
        return 2;
    }
    $a=1;
    $b=2;
    for ($i=2;$i<$number;$i++){
        $c=$a+$b;
        $a=$b;
        $b=$c;
    }
    return $c;
}