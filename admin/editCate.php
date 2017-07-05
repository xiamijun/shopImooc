<?php
require_once '../include.php';
$id=$_REQUEST['id'];
$sql="select id,username,password,email from imooc_cate where id=".$id;
$row=fetchOne($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h3>编辑分类</h3>
<form action="doAdminAction.php?act=editCate&id=<?php echo $id; ?>" method="post">
    <table>
        <tr>
            <td>分类名称</td>
            <td><input type="text" name="cName" placeholder="<?php echo $row['cName']; ?>"></td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td><input type="submit" value="编辑分类"></td>
        </tr>
    </table>
</form>
</body>
</html>