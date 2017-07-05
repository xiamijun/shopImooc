<?php

function p($i){
    $N=8;
    if ($i==1){
        return 3/$N;
    }elseif ($i==2||$i==3||$i==4){
        return 1/$N;
    }elseif ($i==5){
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

for ($s=1;$s<=5;$s++){
    echo log(bigP($s))+log(1-bigP($s))+H($s)/bigP($s)+(H(5)-H($s))/(1-bigP($s)).'</br>';
}

echo H(5);