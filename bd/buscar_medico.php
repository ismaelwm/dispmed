<?php 

$nombre = $_POST['buscar'];

$db = new PDO("mysql:host=localhost;dbname=dispmedico", "root", "");

if ($nombre ==''){
	$response = $db->query("SELECT * FROM medico");
}else{
	$response = $db->query("SELECT * FROM medico where Nombre='".$nombre."'");
}

$data = '';
while ($res = $response->fetch()) {

	$data .= $res['Nombre'].'*';
	$data .= $res['Cedula'].'*';
	$data .= $res['Tanda'].'*';
	$data .= $res['Especialidad'].'*';
	$data .= $res['Estado'].'*';
	$data .= 'tr'.'*';
}

echo $data;
$response->closeCursor();
?>