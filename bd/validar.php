<?php 

$username = $_POST['username'];
$password = $_POST['password'];

$salt = '123asd!@#';
$p_salt = sha1(md5($salt . $password));

$db= new PDO("mysql:host=localhost;dbname=dispmedico", "root", "");
$result = $db->query("SELECT * FROM users WHERE username ='".$username. "' AND password='".$p_salt."'");

if($row=$result->fetch() == null){

	echo 'Verifique su usuario y contraseña!';
} else {
	session_start();
	$_SESSION['username']=1;
	session_write_close();
}

?>

