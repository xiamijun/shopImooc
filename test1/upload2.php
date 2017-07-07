<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="doAction2.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
    请选择上传文件:<input type="file" name="myFile[]"><br>
    请选择上传文件:<input type="file" name="myFile[]"><br>
    请选择上传文件:<input type="file" name="myFile[]"><br>
    <input type="submit" value="上传">
</form>
</body>
</html>