<?php

function p($i){
    $N=11;
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

for ($s=1;$s<=7;$s++){
    echo @log(bigP($s-1))+log(1-bigP($s-1))+H($s-1)/bigP($s-1)+(H(7)-H($s-1))/(1-bigP($s-1)).'</br>';
}
