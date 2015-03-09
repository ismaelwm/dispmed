<?php
$nombre = $_POST['nombre'];
$cedula = $_POST['cedula'];
$especialidad = $_POST['especialidad'];
$tanda = $_POST['tanda'];
$estado = $_POST['estado'];

//Mm no sé mucho sobre Materialize, so mete mano aquí.

if ($estado == 0){
	$estado = 'Activo';
}else{
	$estado = 'Inactivo';
}

if ($tanda == 0){
	$tanda = 'Matutina';
}else{
	$tanda = 'Vespertina';
}

//vamo allá
$conn_dispmedico = new PDO("mysql:host=localhost;dbname=dispmedico", "root", "");
$result = $conn_dispmedico->query("SELECT * FROM medico WHERE cedula='".$cedula."'");
if ($row = $result->fetch() == null) {
	$query_medico = "INSERT INTO medico (nombre, cedula, especialidad, tanda, estado) values ('$nombre', '$cedula', '$especialidad', '$tanda', '$estado')";
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
