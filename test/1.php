<?php
$str='123asd';
$str_array=str_split($str);
$str_array=array_count_values($str_array);
print_r($str_array);