<?php 

$username = $_POST['username'];
$password = $_POST['password'];


$db= new PDO("mysql:host=localhost;dbname=dispmedico", "root", "");
$result = $db->query("SELECT * FROM users WHERE username ='".$username. "' AND password='".$password."'");

if($row=$result->fetch() == null){

	echo 'Verifique su usuario y contraseña!';
} else {
	session_start();
	$_SESSION['username']=1;
	session_write_close();
}

?>

