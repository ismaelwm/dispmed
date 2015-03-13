<?php 

$username = $_POST['username'];
$password = $_POST['password'];

$salt = '123asd!@#';
$p_salt = sha1(md5($salt . $password));

$db= new PDO("mysql:host=localhost;dbname=dispmedico", "root", "");
$result = $db->query("SELECT * FROM users WHERE username ='".$username. "' AND password='".$p_salt."'");

$row=$result->fetch();
if($row== null){

	echo 'Verifique su usuario y contraseña!';
} else {
	session_start();
	$_SESSION['username']=$username;
	$_SESSION['tipo']= $row['tipo'];
	session_write_close();
}

?>

