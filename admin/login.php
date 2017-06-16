<html>
<head>
    <title>登录</title>
</head>
<body>
<h3>欢迎登陆</h3>
<form action="doAction.php" method="post">
    <li>管理员帐号</li>
    <input type="text" name="username">
    <li>密码</li>
    <input type="password" name="password">
    <li>验证码</li>
    <img src="getVerify.php" alt="验证码">
    <input type="checkbox"><label>自动登录</label>
    <input type="submit" value="登录">
</form>
</body>
</html>