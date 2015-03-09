<?php 

$username = $_POST['username'];
$password = $_POST['password'];


$db= new PDO("mysql:host=localhost;dbname=dispmedico", "root", "root");
$result = $db->query("SELECT * FROM users WHERE username ='".$username. "' AND password='".$password."'");

if($row=$result->fetch() == null){

	echo 'La contraseña o el usuario es inválido!';
} else {
	session_start();
	$_SESSION['username']=1;
	session_write_close();
}

?>

