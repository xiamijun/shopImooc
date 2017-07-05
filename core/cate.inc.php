<?php

/**
 * 添加分类
 * @return string
 */
function addCate(){
    $arr=$_POST;
    if (insert('imooc_cate',$arr)){
        $mes="分类添加成功<br><a href='addCate.php'>继续添加</a>|<a href='listCate.php'>查看分类</a>";
    }else{
        $mes="分类添加失败<br><a href='addCate.php'>重新添加</a>|<a href='listCate.php'>查看分类</a>";
    }
    return $mes;
}

function editCate($where){
    $arr=$_POST;
    if (update('imooc_cate',$arr,$where)){
        $mes="分类修改成功<br><a href='listCate.php'>查看分类</a>";
    }else{
        $mes="分类修改失败<br><a href='listCate.php'>查看分类</a>";
    }
    return $mes;
}

function delAdmin($where){
    if (delete('imooc_admin',$where)){
        $mes="删除成功<a href='../admin/listCate.php'>查看分类列表</a>";
    }else{
        $mes="删除失败<a href='../admin/listCate.php'>重新删除</a>";
    }
    return $mes;
}