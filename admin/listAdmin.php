<?php
require_once '../include.php';
$rows=getAllAdmin();
if (!$rows){
    alertMes('没有管理员，请添加','addAdmin.php');
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
<input type="button" value="添加" onclick="addAdmin()">
<table>
    <thead>
    <tr>
        <th>编号</th>
        <th>管理员名称</th>
        <th>管理员邮箱</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($rows as $row):
    ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><input type="button" value="修改" onclick="editAdmin(<?php echo $row['id'];  ?>)"><input type="button" value="删除" onclick="delAdmin(<?php echo $row['id'];  ?>)"></td>
    </tr>
    <?php
    endforeach;
    ?>
    </tbody>
</table>
</body>
<script type="text/javascript">
    function addAdmin() {
        window.location='addAdmin.php';
    }
    function editAdmin(id) {
        window.location='editAdmin.php?id='+id;
    }
    function delAdmin(id) {
        if(window.confirm('确定删除？')){
            window.location='doActionAdmin.php?act=delAdmin&id='+id;
        }

    }
</script>
</html>