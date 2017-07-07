<?php

function p($i){
    $N=14;
    if ($i==1){
        return 3/$N;
    }elseif ($i==7||$i==10){
        return 2/$N;
    }elseif ($i==3||$i==4||$i==5||$i==6||$i==9||$i==8||$i==2){
        return 1/$N;
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

for ($s=1;$s<=10;$s++){
    echo log(bigP($s))+log(1-bigP($s))+H($s)/bigP($s)+(H(10)-H($s))/(1-bigP($s)).'</br>';
}

