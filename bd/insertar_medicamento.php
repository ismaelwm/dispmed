<?php
$nombre = $_POST['nombre'];
$marca = $_POST['marca'];
$cantidad = $_POST['cantidad'];
$tipofarmaco = $_POST['tipoFarmaco'];
$tramo = $_POST['tramo'];
$celda = $_POST['celda'];
$estante = $_POST['estante'];

if ($tipofarmaco == 1)
	$tipofarmaco = 'Capsula';

if($tipofarmaco== 2)
	$tipofarmaco = 'Comprimido';

if($tipofarmaco== 3)	
	$tipofarmaco='Jarabe';

$ubicacion = "Tramo ".$tramo." Estante ".$estante." Celda ".$celda;

//vamo allá
$conn_dispmedico = new PDO("mysql:host=localhost;dbname=dispmedico", "root", "");
$result = $conn_dispmedico->query("SELECT * FROM medicamento WHERE ubicacion='".$ubicacion."'");
if ($row = $result->fetch() == null) {

	$query_medicamento = "INSERT INTO medicamento (nombre, marca, cantidad, tipofarmaco, ubicacion) values ('$nombre', '$marca', '$cantidad', '$tipofarmaco', '$ubicacion')";
	//Mete mano ahora!
	$run_medicamento_q = $conn_dispmedico->query($query_medicamento);
	
	$status = '';
	echo $status;
}
else {
	$status = 1;
	echo $status;
}

?>