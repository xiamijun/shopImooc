<html>
<head>

</head>
<body>
<table>
    <tr>
        <th>操作系统</th>
        <td><?php echo PHP_OS; ?></td>
    </tr>
    <tr>
        <th>Apache版本</th>
        <td><?php echo apache_get_version(); ?></td>
    </tr>
    <tr>
        <th>PHP版本</th>
        <td><?php echo PHP_VERSION; ?></td>
    </tr>
    <tr>
        <th>运行方式</th>
        <td><?php echo PHP_SAPI; ?></td>
    </tr>
</table>
</body>
</html>