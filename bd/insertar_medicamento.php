<?php
$nombre = $_POST['nombre'];
$marca = $_POST['marca'];
$cantidad = $_POST['cantidad'];
$tipofarmaco = $_POST['tipoFarmaco'];
$tramo = $_POST['tramo'];
$celda = $_POST['celda'];
$estante = $_POST['estante'];
//Mm no sé mucho sobre Materialize, so mete mano aquí.

if ($tipofarmaco == 1){
	$tipofarmaco = 'Capsula';
}elseif($tipofarmaco== 2){
	$tipofarmaco = 'Comprimido';
}else{
	$tipofarmaco='Jarabe';
}

$ubicacion = "Tramo ".$tramo." Estante ".$estante." Celda ".$celda;


//vamo allá
$conn_dispmedico = new PDO("mysql:host=localhost;dbname=dispmedico", "root", "");
$query_medicamento = "INSERT INTO medicamento (nombre, marca, cantidad, tipofarmaco, ubicacion) values ('$nombre', '$marca', '$cantidad', '$tipofarmaco', '$ubicacion')";
//Mete mano ahora!
$run_medicamento_q = $conn_dispmedico->query($query_medicamento);
?>
