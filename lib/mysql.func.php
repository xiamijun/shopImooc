<?php
/**
 * @return mysqli
 * 连接数据库
 */
function connect(){
    global $conn;
    $conn=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME,DB_PORT) or die('数据库连接失败Error:'.mysqli_errno($conn).':'.mysqli_error($conn));
    mysqli_set_charset($conn,DB_CHARSET);
    return $conn;
}

/**
 * @param $table
 * @param $array
 * @return bool|int|string
 * 插入
 */
function insert($table,$array){
    global $conn;
    $keys=implode(',',array_keys($array));
    $vals="'".implode(',',array_values($array))."''";
    $sql="INSERT INTO {$table}({$keys}) VALUES ({$vals})";
    $result=mysqli_query($conn,$sql);
    if ($result){
        return mysqli_insert_id($conn);
    }else{
        return false;
    }
}

/**
 * 更新
 * @param $table
 * @param $array
 * @param null $where
 * @return bool|int
 */
function update($table,$array,$where=null){
    global $conn;
    $str='';
    foreach ($array as $key=>$val){
        if ($str==null){
            $sep='';
        }else{
            $sep=',';
        }
        $str.=$sep.$key."='".$val."'";
    }
    $sql="UPDATE {$table} set {$str}".($where==null?null:"where".$where);
    $result=mysqli_query($conn,$sql);
    if ($result){
        return mysqli_affected_rows($conn);
    }else{
        return false;
    }
}

/**
 * 删除
 * @param $table
 * @param null $where
 * @return bool|int
 */
function delete($table,$where=null){
    global $conn;
    $where=$where==null?null:"where".$where;
    $sql="delete from {$table} {$where}";
    $result=mysqli_query($conn,$sql);
    if ($result){
        return mysqli_affected_rows($conn);
    }else{
        return false;
    }
}

/**
 * 获取其中一条记录
 * @param $sql
 * @param int $result_type
 * @return array|null
 */
function fetchOne($sql,$result_type=MYSQLI_ASSOC){
    global $conn;
    $result=mysqli_query($conn,$sql);
    if ($result){
        return mysqli_fetch_array($result,$result_type);
    }else{
        return false;
    }
}

/**
 * 获取所有记录
 * @param $sql
 * @param int $result_type
 * @return array|null
 */
function fetchAll($sql,$result_type=MYSQLI_ASSOC){
    global $conn;
    $result=mysqli_query($conn);
    while (@$row=mysqli_fetch_array($result,$result_type)){
        $rows=$row;
    }
    return $rows;
}

/**
 * 获取记录条数
 * @param $sql
 * @return bool|int
 */
function getResultNum($sql){
    global $conn;
    $result=mysqli_query($conn,$sql);
    if ($result){
        return mysqli_num_rows($result);
    }else{
        return false;
    }
}