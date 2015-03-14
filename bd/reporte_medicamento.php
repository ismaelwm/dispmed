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
	$response = $db->query("SELECT * FROM medicamento where fecha <= '".$until."'");
}

	
if($from != '' and $until == ''){
	$date= new DateTime($from);
	$from = $date->format('Y-m-d');
	$response = $db->query("SELECT * FROM medicamento where fecha >= '".$from."'");	
}

if($from != '' and $until != ''){
	$date= new DateTime($from);
	$from = $date->format('Y-m-d');
	$date= new DateTime($until);
	$until = $date->format('Y-m-d');

	$response = $db->query("SELECT * FROM medicamento WHERE fecha BETWEEN '".$from."' AND '".$until."'");
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

?>


