<?php 

$buscar = $_POST['buscar'];
$criterio = $_POST['criterio'];




$db = new PDO("mysql:host=localhost;dbname=dispmedico", "root", "");

if ($buscar ==''){
	$response = $db->query("SELECT * FROM medico");
}else{
	$response = $db->query("SELECT * FROM medico where ".$criterio." LIKE "."'%".$buscar."%'");
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