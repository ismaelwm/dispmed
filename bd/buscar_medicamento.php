<?php 

$nombre = $_POST['buscar'];

$db = new PDO("mysql:host=localhost;dbname=dispmedico", "root", "");

if ($nombre ==''){
	$response = $db->query("SELECT * FROM medicamento");
}else{
	$response = $db->query("SELECT * FROM medicamento where Nombre='".$nombre."'");
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