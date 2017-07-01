<?php
/**
 * 管理员验证
 * @param $sql
 * @return array|null
 */
function checkAdmin($sql){
    return fetchOne($sql);
}

/**
 * 验证管理员是否登录
 */
function checkLogined(){
    if ($_SESSION['adminId']==''&&$_COOKIE['adminId']==''){
        alertMes('请先登录','../admin/login.php');
    }
}

/***
 * 注销管理员
 */
function logout(){
    $_SESSION=array();
    if (isset($_COOKIE[session_name()])){
        setcookie(session_name(),'',time()-1);
    }
    if (isset($_COOKIE['adminId'])){
        setcookie('adminId','',time()-1);
    }
    if (isset($_COOKIE['adminName'])){
        setcookie('adminName','',time()-1);
    }
    session_destroy();
    header('location:../admin/login.php');
}

/**
 * 添加管理员
 */
function addAdmin(){
    $arr=$_POST;
    if (insert('imooc_admin',$arr)){
        $mes="添加成功<br/><a href='addAdmin.php'>继续添加</a>|<a href='listAdmin.php'>查看管理员</a>";
    }else{
        $mes="添加失败<br/><a href='../admin/addAdmin.php'>重新添加</a>";
    }
    return $mes;
}

/**
 * 得到所有管理员
 * @return array|null
 */
function getAllAdmin(){
    $sql="select id,username,email from imooc_admin";
    $rows=fetchAll($sql);
    return $rows;
}

/**
 * 编辑管理员
 * @param $id
 * @return string
 */
function editAdmin($id){
    $arr=$_POST;
    if (update('imooc_admin',$arr,$id)){
        $mes="编辑成功<a href='../admin/listAdmin.php'>查看管理员列表</a>";
    }else{
        $mes="编辑失败<a href='../admin/listAdmin.php'>重新修改</a>";
    }
    return $mes;
}

/**
 * 删除管理员
 * @param $id
 * @return string
 */
function delAdmin($id){
    if (delete('imooc_admin',"id=$id")){
        $mes="删除成功<a href='../admin/listAdmin.php'>查看管理员列表</a>";
    }else{
        $mes="删除失败<a href='../admin/listAdmin.php'>重新删除</a>";
    }
    return $mes;
}