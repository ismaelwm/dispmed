<?php
$nombre = $_POST['nombre'];
$cedula = $_POST['cedula'];
$especialidad = $_POST['especialidad'];
$tanda = $_POST['tanda'];
$estado = $_POST['estado'];
session_start();
$username = $_SESSION['username'];
$fecha = date('Y-m-d');


$conn_dispmedico = new PDO("mysql:host=localhost;dbname=dispmedico", "root", "");

$result = $conn_dispmedico->query("SELECT * FROM medico WHERE cedula='".$cedula."'");
if ($row = $result->fetch() == null) {
	$query_medico = "INSERT INTO medico (usuario, nombre, cedula, especialidad, tanda, estado, fecha) values ('$username', '$nombre', '$cedula', '$especialidad', '$tanda', '$estado', '$fecha')";
	
	$run_medico_q = $conn_dispmedico->query($query_medico);
	$status = '';
	echo $status;
}
else {
	$status = 1;
	echo $status;
}
?>
