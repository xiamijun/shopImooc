<?php

function p($i){
    $N=9;
    if ($i==1||$i==7){
        return 2/$N;
    }elseif ($i==2||$i==4||$i==5||$i==6){
        return 1/$N;
    }elseif ($i==3){
        return 3/$N;
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

//for ($s=1;$s<=6;$s++){
//    echo log(bigP($s))+log(1-bigP($s))+H($s)/bigP($s)+(H(6)-H($s))/(1-bigP($s)).'</br>';
//}

echo log(1-bigP(3))+(H(6)-H(3))/(1-bigP(3));