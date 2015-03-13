<?php 

$username = $_POST['username'];
$password = $_POST['password'];
$tipo = $_POST['tipo'];

$salt = '123asd!@#';
$p_salt = sha1(md5($salt . $password));

if($username != '' and $password !=''){

$db= new PDO("mysql:host=localhost;dbname=dispmedico", "root", "");
$result = $db->query("SELECT * FROM users WHERE username ='".$username. "'");

if($row=$result->fetch() == null){

$query_registro = "INSERT INTO users (username, password, tipo) values ('$username', '$p_salt', '$tipo')";
	
	$run_registro_q = $db->query($query_registro);
	echo 'El  usuario '.'"'.$username.'"'.' ha sido registrado!';
} else {
	
	echo 'El  usuario '.'"'.$username.'"'.' ya existe!';

}
}else{

	echo 'Tiene que rellenar los campos!';

}

?>

