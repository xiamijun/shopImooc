<?php
require_once '../include.php';
$act=$_REQUEST['act'];
$id=$_REQUEST['id'];
if ($act=='logout'){
    logout();
}elseif ($act=='addAdmin'){
    $mes=addAdmin();
}elseif ($act=='editAdmin'){
    $mes=editAdmin($id);
}elseif($act=='delAdmin'){
    $mes=delAdmin($id);
}elseif($act=='addCate'){
    $mes=addCate();
}elseif($act=='editCate'){
    $where="id=".$id;
    $mes=editCate($where);
}elseif($act=='delCate'){
    $where="id=".$id;
    $mes=delCate($where);
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
<?php
if ($mes){
    echo $mes;
}
?>
</body>
</html>