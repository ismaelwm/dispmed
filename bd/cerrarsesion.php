<?php 
session_start();
unset($_SESSION['username']);

session_write_close();
header("location: ../index.php");

 ?>