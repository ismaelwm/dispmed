<?php
$nombre = $_POST['nombre'];
$marca = $_POST['marca'];
$cantidad = $_POST['cantidad'];
$tipofarmaco = $_POST['tipoFarmaco'];
$tramo = $_POST['tramo'];
$celda = $_POST['celda'];
$estante = $_POST['estante'];
session_start();
$username = $_SESSION['username'];
$fecha = date('Y-m-d');

$ubicacion = "Tramo ".$tramo." Estante ".$estante." Celda ".$celda;


$conn_dispmedico = new PDO("mysql:host=localhost;dbname=dispmedico", "root", "");
$result = $conn_dispmedico->query("SELECT * FROM medicamento WHERE ubicacion='".$ubicacion."'");
if ($row = $result->fetch() == null) {

	$query_medicamento = "INSERT INTO medicamento (usuario, nombre, marca, cantidad, tipofarmaco, ubicacion, fecha) values ('$username', '$nombre', '$marca', '$cantidad', '$tipofarmaco', '$ubicacion', '$fecha')";
	
	$run_medicamento_q = $conn_dispmedico->query($query_medicamento);
	
	$status = '';
	echo $status;
}
else {
	$status = 1;
	echo $status;
}

?>