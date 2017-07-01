<?php
$string='hello world';
    $arr=explode(' ',$string);
    $s=implode(' ',array_reverse($arr));
    echo $s;