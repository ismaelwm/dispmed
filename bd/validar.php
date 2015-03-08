<?php 

$username = $_POST['username'];
$password = $_POST['password'];


$db= new PDO("mysql:host=localhost;dbname=dispmedico", "root", "");
$result = $db->query("SELECT * from users where username ='".$username."'");

if($row=$result->fetch()){
	
	if($row['password']== $password){
		session_start();
		$_SESSION['username']=1;
		session_write_close();
		header("location: ../medicamento.php");
	}
	else
	{
		//password incorrecto
		$validacion = 1;
	}

}
else
{
	//username no existe
	$validacion =2;
}

echo $validacion;

?>

