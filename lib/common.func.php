<?php
/**
 * 弹出信息并跳转
 * @param $mes
 * @param $url
 */
function alertMes($mes,$url){
    echo "<script>alert('{$mes}')</script>";
    echo "<script>window.location.href='{$url}'</script>";
}