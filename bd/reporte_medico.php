<?php 

$from = str_replace(",","",$_POST['from']);
$until= str_replace(",","",$_POST['until']);


$db = new PDO("mysql:host=localhost;dbname=dispmedico", "root", "");

if($from =='' and $until ==''){
	$response = $db->query("SELECT * FROM medico");
}

if($from == '' and $until != '' ){
	$date= new DateTime($until);
	$until = $date->format('Y-m-d');
	$response = $db->query("SELECT * FROM medico where fecha <= '".$until."'");
}

	
if($from != '' and $until == ''){
	$date= new DateTime($from);
	$from = $date->format('Y-m-d');
	$response = $db->query("SELECT * FROM medico where fecha >= '".$from."'");	
}

if($from != '' and $until != ''){
	$date= new DateTime($from);
	$from = $date->format('Y-m-d');
	$date= new DateTime($until);
	$until = $date->format('Y-m-d');

	$response = $db->query("SELECT * FROM medico WHERE fecha BETWEEN '".$from."' AND '".$until."'");
}


$data = '';
while ($res = $response->fetch()) {

	$data .= $res['usuario'].'*';
	$data .= $res['Nombre'].'*';
	$data .= $res['Cedula'].'*';
	$data .= $res['Tanda'].'*';
	$data .= $res['Especialidad'].'*';
	$data .= $res['Estado'].'*';
	$data .= $res['fecha'].'*';
	$data .= 'tr'.'*';
}

echo $data;

?>


