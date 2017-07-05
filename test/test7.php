<?php

function p($i){
    $N=5;
    if ($i==1||$i==2||$i==3){
        return 1/$N;
    }elseif ($i==4){
        return 2/$N;
    }
}

function H($s){
    $Hs=0;
    for ($i=1;$i<=$s;$i++){
        $Hs-=p($i)*log(p($i));
    }
    return $Hs;
}

function bigP($s){
    $Ps=0;
    for ($i=1;$i<=$s;$i++){
        $Ps+=p($i);
    }
    return $Ps;
}

for ($s=1;$s<=4;$s++){
    echo log(bigP($s))+log(1-bigP($s))+H($s)/bigP($s)+(H(4)-H($s))/(1-bigP($s)).'</br>';
}

