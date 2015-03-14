<?php
$file = date('j M, Y');
$file = $_POST['tiporeporte'].$file;
header("Content-type: application/vnd.ms-excel; name='excel'");
header('Content-Disposition: filename="'.$file.'".xls"');
header("Pragma: no-cache");
header("Expires: 0");
echo utf8_decode($_POST['datos_a_enviar']);

?>
