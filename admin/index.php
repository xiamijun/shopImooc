<?php
require_once '../include.php';
checkLogined();
?>
<html>
<head>

</head>
<body>
欢迎您
<?php
if (isset($_SESSION['adminName'])){
    echo $_SESSION['adminName'];
}elseif(isset($_COOKIE['adminName'])){
    echo $_COOKIE['adminName'];
}
?>
<a href="doAdminAction.php?act=logout">退出登录</a>
<div class="content clearfix">
    <div class="main">
        <!--右侧内容-->
        <iframe src="main.php" frameborder="0" name="mainFrame" width="100%" height="522"></iframe>
    </div>
    <div class="menu">
        <!--左侧列表-->
        <ul class="mList">
            <li>
                <h3><span>+</span>管理员管理</h3>
                <dl>
                    <dd><a href="addAdmin.php" target="mainFrame">添加管理员</a></dd>
                    <dd><a href="listAdmin.php" target="mainFrame">管理员列表</a></dd>
                </dl>
            </li>
        </ul>
    </div>
</div>
</body>
</html>