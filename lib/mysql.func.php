<?php
/**
 * @return mysqli
 * 连接数据库
 */
function connect(){
    $conn=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME,DB_PORT) or die('数据库连接失败Error:'.mysqli_errno($conn).':'.mysqli_error($conn));
    mysqli_set_charset($conn,DB_CHARSET);
    return $conn;
}

function insert($table,$array){
    $keys=implode(',',array_keys($array));
    $vals="'".implode(',',array_values($array))."''";
    
}