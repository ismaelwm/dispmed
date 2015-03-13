<?php 

$from = $_POST['from'];
$until = $_POST['until'];


$db = new PDO("mysql:host=localhost;dbname=dispmedico", "root", "");

if($from =='' and $until ==''){
	$response = $db->query("SELECT * FROM medicamento");
}

if($from == '' and $until != '' ){
	$date= new DateTime($until);
	$until = $date->format('Y-m-d');
	$response = $db->query("SELECT * FROM medicamento");
}

$date= new DateTime($from);
	$from = $date->format('Y-m-d');

	
if($until != ''){
	$date= new DateTime($until);
	$until = $date->format('Y-m-d');
}else{
	$until = date('Y-m-d');
}



else{
	$response = $db->query("SELECT * FROM medicamento where ".$criterio." LIKE "."'%".$buscar."%'");
}

$data = '';
while ($res = $response->fetch()) {

	$data .= $res['usuario'].'*';
	$data .= $res['Nombre'].'*';
	$data .= $res['tipoFarmaco'].'*';
	$data .= $res['Marca'].'*';
	$data .= $res['cantidad'].'*';
	$data .= $res['ubicacion'].'*';
	$data .= $res['fecha'].'*';
	$data .= 'tr'.'*';
}

echo $data;
$response->closeCursor();
?>


?>