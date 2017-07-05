<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h3>添加分类</h3>
<form action="doAdminAction.php?act=addCate" method="post">
    <table>
        <tr>
            <td>分类名称</td>
            <td><input type="text" name="cName" placeholder="请输入分类名称"></td>
        </tr>

        <tr>
            <td colspan="2"></td>
            <td><input type="submit" value="添加分类"></td>
        </tr>
    </table>
</form>
</body>
</html>