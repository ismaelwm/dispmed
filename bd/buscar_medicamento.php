<?php 

$buscar = $_POST['buscar'];
$criterio = $_POST['criterio'];

$db = new PDO("mysql:host=localhost;dbname=dispmedico", "root", "");

if ($buscar ==''){
	$response = $db->query("SELECT * FROM medicamento");
}else{
	$response = $db->query("SELECT * FROM medicamento where ".$criterio." LIKE "."'%".$buscar."%'");
}

$data = '';
while ($res = $response->fetch()) {

	$data .= $res['Nombre'].'*';
	$data .= $res['tipoFarmaco'].'*';
	$data .= $res['Marca'].'*';
	$data .= $res['cantidad'].'*';
	$data .= $res['ubicacion'].'*';
	$data .= 'tr'.'*';
}

echo $data;
$response->closeCursor();
?>