<?php
require_once '../include.php';
$page=$_POST['page']?$_POST['page']:1;
$sql="select * from imooc_cate";
$totalRows=getResultNum($sql);
$pageSize=2;
$totalPage=ceil($totalRows/$pageSize);
if ($page<1||$page==null||!is_numeric($page)){
    $page=1;
}
if ($page>=$totalPage){
    $page=$totalPage;
}
$offset=($page-1)*$pageSize;
$sql="select id,cName from imooc_cate ORDER BY id ASC limit $offset,$pageSize";
$rows=fetchAll($sql);
if (!$rows){
    alertMes('没有分类，请添加','addCate.php');
    exit();
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<input type="button" value="添加" onclick="addCate()">
<table>
    <thead>
    <tr>
        <th>编号</th>
        <th>分类名称</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($rows as $row):
        ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['cName']; ?></td>
            <td><input type="button" value="修改" onclick="editCate(<?php echo $row['id'];  ?>)"><input type="button" value="删除" onclick="delCate(<?php echo $row['id'];  ?>)"></td>
        </tr>
        <?php
    endforeach;
    if ($rows>$pageSize):
        ?>
        <tr>
            <td colspan="44">
                <?echo showPage($page,$totalPage);?>
            </td>
        </tr>
        <?php
    endif;
    ?>
    </tbody>
</table>
</body>
<script type="text/javascript">
    function addCate() {
        window.location='addCate.php';
    }
    function editCate(id) {
        window.location='editCate.php?id='+id;
    }
    function delAdmin(id) {
        if(window.confirm('确定删除？')){
            window.location='doActionAdmin.php?act=delCate&id='+id;
        }

    }
</script>
</html>
