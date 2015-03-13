<?php 
session_start();
unset($_SESSION['username']);
unset($_SESSION['tipo']);
session_write_close();
header("location: ../index.php");
 ?>